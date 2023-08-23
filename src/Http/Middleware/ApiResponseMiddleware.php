<?php

namespace DeveloperHouse\Rocket\Http\Middleware;

use Closure;
use Illuminate\Http\JsonResponse;

class ApiResponseMiddleware {
    public function handle($request, Closure $next) {

        $request->headers->set('Accept', 'application/json');

        $response = $next($request);
        $response->header('Content-Type', 'application/json');

        if ($response instanceof JsonResponse) {
            return response()->json($response->getData(), $response->getStatusCode());
        }

        return $response;
    }
}