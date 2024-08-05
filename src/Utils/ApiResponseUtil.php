<?php

namespace Danydev\Rocket\Utils;

use Illuminate\Http\JsonResponse;

class ApiResponseUtil {

    public static function error(string $message, int $statusCode =  500): array {
        return [
            'successful' => false,
            'status' => $statusCode,
            'message' => $message,
            'data' => null,
            'timestamp' => now()->toDateTimeString(),
        ];
    }

}