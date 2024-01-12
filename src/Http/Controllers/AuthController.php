<?php

namespace DeveloperHouse\Rocket\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use DeveloperHouse\Rocket\Http\Mail\EmailPasswordMail;
use DeveloperHouse\Rocket\Http\Mail\ResetPasswordMail;
use DeveloperHouse\Rocket\Http\Request\AuthRequest;
use DeveloperHouse\Rocket\Http\Request\EmailPasswordRequest;
use DeveloperHouse\Rocket\Http\Request\ResetPasswordRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Throwable;

class AuthController extends RocketController {

    public function login(AuthRequest $request) {

        try {

            if (!Auth::attempt($request->only([config('rocket.login.field'), 'password']))) {
                return $this->error(trans('rocket::message.login.error'), 401);
            }

            $user = User::where(config('rocket.login.field'), $request->get(config('rocket.login.field')))->first();

            if ($user->state_id == 1001) {

                // Hacemos caducar los tokens del usuario
                $user->tokens()->delete();

                $expiresAt = Carbon::now()->addMinutes(config('rocket.sanctum.expiration'));

                $token = $user->createToken('token-name', ['*'], $expiresAt)->plainTextToken;

                $data = [
                    'token' => $token,
                    'first_name' => $user->first_names,
                    'last_name' => $user->last_names,
                    'photo' => $user->photo,
                ];

                return $this->success(
                    data: $data,
                    message: 'User Logged In Successfully'
                );

            } else {
                return $this->error(
                    $user->state->description, 401
                );
            }

        } catch (Throwable $th) {
            return $this->error(
                $th->getMessage(), 500
            );
        }

    }

    public function logout(Request $request) {
        $request->user()->currentAccessToken()->delete();
        return $this->success(message: 'Session cerrada correctamente');
    }

    public function emailPassword(EmailPasswordRequest $request) {

        $user = $this->getUserByEmail($request->get(config('rocket.login.field')));

        if ($user) {

            try {

                $this->deleteOldTokens($user->email);
                $token = $this->generateAndSaveToken($user->email);
                $this->sendEmailPasswordMail($user, $token);

                return $this->success(
                    message: trans('rocket::password.email.success.send')
                );

            } catch (\Exception $e) {
                Log::error($e);
                return $this->error(
                    message: trans('rocket::password.email.error.send'),
                    status: 500
                );
            }

        } else {
            return $this->noFound(
                trans('rocket::password.not_found')
            );
        }

    }

    public function resetPassword(ResetPasswordRequest $request) {

        $user = $this->getUserByEmail($request->get(config('rocket.login.field')));

        if ($user) {

            $token = $this->getToken($user->email, $request->get('token'));

            if ($token) {

                $this->updateUserPassword($user, $request->get('password'));
                $this->deleteOldTokens($user->email);
                $this->sendResetPasswordMail($user);

                return $this->success(
                    message: trans('rocket::password.reset.success.reset')
                );

            } else {
                return $this->noFound(message: trans('rocket::password.reset.error.token'));
            }

        } else {
            return $this->noFound(
                trans('rocket::password.not_found')
            );
        }
    }

    public function validateSession() {
        return $this->success(message: 'Session válida');
    }

    protected function getUserByEmail($email) {
        return User::where(config('rocket.login.field'), $email)->first();
    }

    protected function deleteOldTokens($email) {
        DB::table('password_reset_tokens')->where('email', $email)->delete();
    }

    protected function generateAndSaveToken($email) {
        $token = Str::random(6);
        DB::table('password_reset_tokens')->insert([
            'email' => $email,
            'token' => $token,
            'created_at' => Carbon::now(),
        ]);
        return $token;
    }

    protected function sendEmailPasswordMail($user, $token) {
        $names = $user->names . ' ' . $user->surnames;
        Mail::to($user->email)->send(new EmailPasswordMail($names, $token));
    }

    protected function updateUserPassword($user, $password) {
        $user->password = Hash::make($password);
        $user->save();
    }

    protected function getToken($email, $token) {
        return DB::table('password_reset_tokens')->where('email', $email)->where('token', $token)->first();
    }

    protected function sendResetPasswordMail($user) {
        $names = $user->names . ' ' . $user->surnames;
        Mail::to($user->email)->send(new ResetPasswordMail($names));
    }

}