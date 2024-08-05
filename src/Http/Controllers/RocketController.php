<?php

namespace Danydevco\Rocket\Http\Controllers;

class RocketController extends Controller {
    private function response($data = null, $message = null, $successful = false, $status = 200) {
        $response = [
            'successful' => $successful,
            'status' => $status,
            'message' => $message,
            'data' => $data,
            'timestamp' => now()->toDateTimeString(),
        ];

        return response()->json($response, $status);
    }

    protected function error($message, $status = 400) {
        return $this->response(message: $message, status: $status);
    }

    protected function success($data = null, $message = null, $status = 200) {
        return $this->response(data: $data, message: $message, successful: true, status: $status);
    }

    protected function noFound($message = null) {
        return $this->response(message: $message ?? 'No se encontró el recurso solicitado.', status: 404);
    }

    protected function unauthorized($message = null) {
        return $this->response(message: $message ?? 'No estás autorizado a realizar esta acción.', status: 401);
    }
}
