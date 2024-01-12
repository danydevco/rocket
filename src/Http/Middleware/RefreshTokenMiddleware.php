<?php

namespace DeveloperHouse\Rocket\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Laravel\Sanctum\PersonalAccessToken;
use Illuminate\Http\Request;

class RefreshTokenMiddleware {
    public function handle(Request $request, Closure $next) {

        $token = $request->bearerToken();

        if ($token) {
            $accessToken = PersonalAccessToken::findToken($token);

            if ($accessToken) {
                // Extiende la fecha de expiración del token
                $expiresAt = Carbon::now()->addMinutes(config('rocket.sanctum.expiration'));

                $accessToken->expires_at = $expiresAt;
                $accessToken->save();
            }
        }
        return $next($request);
    }
}
