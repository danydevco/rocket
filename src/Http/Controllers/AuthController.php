<?php

namespace DeveloperHouse\Rocket\Http\Controllers;

use App\Models\User;
use DeveloperHouse\Rocket\Http\Request\AuthRequest;
use DeveloperHouse\Rocket\Http\Request\EmailPasswordRequest;
use DeveloperHouse\Rocket\Http\Request\ResetPasswordRequest;
use DeveloperHouse\Rocket\Utils\ApiResponseUtil;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Throwable;
use Carbon\Carbon;

class AuthController extends Controller {
    public function login(AuthRequest $request) {
        try {

            if (!Auth::attempt($request->only(['email', 'password']))) {
                $data = ApiResponseUtil::errorResponse(trans('rocket::message.login.error'), 401);
                return response()->json($data, 401);
            }

            $user = User::where('email', $request->email)->first();

            if ($user->state_id == 1001){

                // Hacemos caducar los tokens del usuario
                $user->tokens()->delete();

                $expiresAt = Carbon::now()->addMinutes(config('rocket.sanctum.expiration'));
                $token     = $user->createToken('token-name', ['*'], $expiresAt)->plainTextToken;

                return ApiResponseUtil::successResponse([
                    'message' => 'User Logged In Successfully',
                    'token' => $token,
                ]);

            }else{
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

    public function emailPassword(EmailPasswordRequest $request){

        $status = Password::sendResetLink(
            $request->only('email')
        );

        if($status === Password::RESET_LINK_SENT) {
            return response()->json(['message' => __($status)], 200);
        } else {
            throw ValidationException::withMessages([
                'email' => __($status)
            ]);
        }

    }

    public function resetPassword(ResetPasswordRequest $request) {
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) use ($request) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        if($status == Password::PASSWORD_RESET) {
            return response()->json(['message' => __($status)], 200);
        } else {
            throw ValidationException::withMessages([
                'email' => __($status)
            ]);
        }
    }

}