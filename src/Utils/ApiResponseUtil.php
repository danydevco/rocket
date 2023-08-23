<?php

namespace DeveloperHouse\Rocket\Utils;

class ApiResponseUtil {
    public static function successResponse(array $data): array {
        return [
            'data' => $data,
            'status' => true,
            'statusCode' => 200,
        ];
    }

    public static function errorResponse(string $message, int $statusCode): array {
        return [
            'data' => null,
            'status' => false,
            'statusCode' => $statusCode,
            'message' => $message,
        ];
    }
}