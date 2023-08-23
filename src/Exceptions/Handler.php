<?php


namespace DeveloperHouse\Rocket\Exceptions;

use DeveloperHouse\Rocket\Utils\ApiResponseUtil;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler {

    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash
        = [
            'password',
            'password_confirmation',
        ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register() {
        //
    }

    public function report(Throwable $e) {
        parent::report($e);
    }

    public function render($request, Throwable $e): \Illuminate\Http\Response|JsonResponse|Response {

        if (($e instanceof HttpException) && $request->expectsJson()) {
            $data = ApiResponseUtil::errorResponse(trans('rocket::message.unauthorized'), 401);
            return response()->json($data, 403);
        }

        if (($e instanceof AuthorizationException) && $request->expectsJson()) {
            $data = ApiResponseUtil::errorResponse('Unauthorized, verifique los parámetros enviados.', 401);
            return response()->json($data, 401);
        }

        if (($e instanceof ModelNotFoundException) && $request->expectsJson()) {
            $data = ApiResponseUtil::errorResponse(trans('rocket::message.unauthorized'), 401);
            return response()->json($data, 401);
        }

        if (($e instanceof NotFoundHttpException) && $request->expectsJson()) {
            $data = ApiResponseUtil::errorResponse('Resource not found', 401);
            return response()->json($data, 404);
        }

        if (($e instanceof ValidationException) && $request->expectsJson()) {
            $data = ApiResponseUtil::errorResponse($e->getMessage(), 401);
            return response()->json($data, 404);
        }

        return parent::render($request, $e);

    }

    /**
     * @param Request                 $request
     * @param AuthenticationException $exception
     *
     * @return JsonResponse|RedirectResponse|Response
     */
    protected function unauthenticated($request, AuthenticationException $exception): JsonResponse|Response|RedirectResponse {
        $data = ApiResponseUtil::errorResponse('Token inválido.', 401);
        return response()->json($data, 401);
    }


}