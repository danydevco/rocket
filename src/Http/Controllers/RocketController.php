<?php

namespace DeveloperHouse\Rocket\Http\Controllers;

class RocketController extends Controller {
    private function response($data = null, $message = null, $status = 200) {
        $response = [
            'status' => $status,
            'message' => $message,
            'data' => $data,
        ];

        return response()->json($response, $status);
    }

    protected function error($message, $status = 400) {
        return $this->response($message, $status);
    }

    protected function success($data = null, $message = null, $status = 200) {
        return $this->response($data, $message, $status);
    }

    protected function noFound($message = null) {
        return $this->error($message ?? 'No se encontró el recurso solicitado.', 404);
    }

    protected function unauthorized($message = null) {
        return $this->response(message: $message ?? 'No estás autorizado a realizar esta acción.', status: 401);
    }
}
