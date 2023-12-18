<?php

namespace DeveloperHouse\Rocket\Http\Controllers;

use App\Models\User;
use DeveloperHouse\Rocket\Http\Mail\ResetPasswordMail;
use DeveloperHouse\Rocket\Http\Request\AuthRequest;
use DeveloperHouse\Rocket\Http\Request\EmailPasswordRequest;
use DeveloperHouse\Rocket\Http\Request\ResetPasswordRequest;
use DeveloperHouse\Rocket\Utils\ApiResponseUtil;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Throwable;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use DeveloperHouse\Rocket\Http\Mail\EmailPasswordMail;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller {
    public function login(AuthRequest $request) {

        try {

            if (!Auth::attempt($request->only([config('rocket.login.field'), 'password']))) {
                $data = ApiResponseUtil::errorResponse(trans('rocket::message.login.error'), 401);
                return response()->json($data, 401);
            }

            $user = User::where(config('rocket.login.field'), $request->get(config('rocket.login.field')))->first();

            if ($user->state_id == 1001) {

                // Hacemos caducar los tokens del usuario
                $user->tokens()->delete();

                $expiresAt = Carbon::now()->addMinutes(config('rocket.sanctum.expiration'));
                $token     = $user->createToken('token-name', ['*'], $expiresAt)->plainTextToken;

                return ApiResponseUtil::successResponse([
                    'message' => 'User Logged In Successfully',
                    'token' => $token,
                ]);

            } else {
                $data = ApiResponseUtil::errorResponse($user->state->description, 401);
                return response()->json($data, 401);
            }


        } catch (Throwable $th) {
            $data = ApiResponseUtil::errorResponse($th->getMessage(), 401);
            return response()->json($data, 500);
        }

    }

    public function logout(Request $request) {

        $request->user()->currentAccessToken()->delete();

        return ApiResponseUtil::successResponse([
            'message' => 'Session cerrada correctamente',
        ]);
    }

    public function emailPassword(EmailPasswordRequest $request) {

        $user = $this->getUserByEmail($request->get(config('rocket.login.field')));

        if ($user) {

            try {

                $this->deleteOldTokens($user->email);
                $token = $this->generateAndSaveToken($user->email);
                $this->sendEmailPasswordMail($user, $token);

                return ApiResponseUtil::successResponse([
                    'message' => trans('rocket::password.email.success.send'),
                ]);

            } catch (\Exception $e) {
                dd($e);
                Log::error($e);
                return ApiResponseUtil::errorResponse(
                    trans('rocket::password.email.error.send')
                );
            }

        } else {
            return ApiResponseUtil::noFound(trans('rocket::password.not_found'));
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

                return ApiResponseUtil::successResponse([
                    'message' => trans('rocket::password.reset.success.reset'),
                ]);

            } else {
                return ApiResponseUtil::noFound(trans('rocket::password.reset.error.token'));
            }

        } else {
            return ApiResponseUtil::noFound(trans('rocket::password.not_found'));
        }
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