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

    public static function errorResponse(string $message, int $statusCode =  500): array {
        return [
            'data' => null,
            'status' => false,
            'statusCode' => $statusCode,
            'message' => $message,
        ];
    }

    public static function noFound(string $message): array {
        return [
            'data' => null,
            'status' => false,
            'statusCode' => 400,
            'message' => $message,
        ];
    }
}