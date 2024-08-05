<?php

namespace Danydev\Rocket\Utils;

class Response {
    static function successful(array $data = ['message' => "Operación exitosa"]): array {
        return [
            'data' => $data,
            'status' => true,
            'statusCode' => 200,
        ];
    }
}