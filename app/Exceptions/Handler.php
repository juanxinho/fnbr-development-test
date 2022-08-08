<?php

namespace App\Exceptions;

use App\Exceptions\Custom\BadRequestException;
use App\Exceptions\Custom\ConflictException;
use App\Exceptions\Custom\NotFoundException;
use App\Traits\ApiRestResponse;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{

  use ApiRestResponse;

  /**
   * A list of the exception types that are not reported.
   *
   * @var array<int, class-string<Throwable>>
   */
  protected $dontReport = [
    //
  ];

  /**
   * A list of the inputs that are never flashed for validation exceptions.
   *
   * @var array<int, string>
   */
  protected $dontFlash = [
    'current_password',
    'password',
    'password_confirmation',
  ];

  /**
   * Register the exception handling callbacks for the application.
   *
   * @return void
   */
  public function register()
  {
    $this->renderable(function (Throwable $exception, $request) {
      if ($exception instanceof ModelNotFoundException) {
        $model = strtolower(class_basename($exception->getModel()));
        return $this->error($request->getPathInfo(), $exception,
          'No se encontró un recurso disponible para el modelo: ', ['model' => $model], Response::HTTP_NOT_FOUND);
      }

      if ($exception instanceof NotFoundHttpException) {
        $code = $exception->getStatusCode();
        return $this->error($request->getPathInfo(), $exception, 'Ruta no encontrada', $code);
      }

      if ($exception instanceof AccessDeniedHttpException) {
        return $this->error($request->getPathInfo(), $exception, 'Acceso a este recurso no permitido.', Response::HTTP_FORBIDDEN);
      }

      if ($exception instanceof MethodNotAllowedHttpException) {
        return $this->error($request->getPathInfo(), $exception, 'Método no permitido', Response::HTTP_METHOD_NOT_ALLOWED);
      }

      if ($exception instanceof HttpException) {
        $code = $exception->getStatusCode();
        return $this->error($request->getPathInfo(), $exception,'La petición se ha efectuado con errores.', $code);
      }

      if ($exception instanceof AuthenticationException) {
        return $this->error($request->getPathInfo(), $exception, 'Usuario no autenticado.', Response::HTTP_UNAUTHORIZED);
      }

      if ($exception instanceof AuthorizationException) {
        return $this->error($request->getPathInfo(), $exception,
          'No tiene autorización para acceder a este recurso.', Response::HTTP_FORBIDDEN);
      }

      if ($exception instanceof ValidationException) {
        $errors = $exception->validator->errors()->all();

        return $this->error($request->getPathInfo(), $exception,
          $errors, Response::HTTP_BAD_REQUEST);
      }

      if ($exception instanceof ConflictException
        || $exception instanceof BadRequestException
        || $exception instanceof NotFoundException
      ) {
        $code = $exception->getStatusCode();
        $message = $exception->getMessage();
        return $this->error($request->getPathInfo(), $exception, $message, $code);
      }

      if (config('app.debug')) {
        return $this->error($request->getPathInfo(), $exception, $exception->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
      }

      return $this->error($request->getPathInfo(), $exception, 'Ha ocurrido un error interno en el servidor', Response::HTTP_INTERNAL_SERVER_ERROR);
    });
  }
}
