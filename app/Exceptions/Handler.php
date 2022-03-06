<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Throwable;

class Handler extends ExceptionHandler
{
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
        $this->reportable(function (Throwable $e) {
            //
        });

        $this->renderable(function (\Exception $e) {
            if (request()->is('api/*') || request()->wantsJson()) {
                if ($e instanceof \Illuminate\Auth\AuthenticationException) return response()->json(Response::unauthenticated("User is not logged in"));
                if ($e instanceof \Symfony\Component\HttpKernel\Exception\NotFoundHttpException) return response()->json(Response::notFound($e->getMessage()));
                if ($e instanceof \Symfony\Component\Routing\Exception\RouteNotFoundException) return response()->json(Response::notFound($e->getMessage()));
                if ($e instanceof \Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException) return response()->json(Response::unauthrorized("You are not authorized to perform this action"));
                if ($e instanceof \Symfony\Component\HttpKernel\Exception\HttpException) return response()->json(Response::unauthrorized($e->getMessage()));
                if ($e instanceof \Illuminate\Database\QueryException) {
                    Log::error($e);
                    return response()->json(Response::error(500, $e->getMessage()));
                }
                Log::error($e);
                return response()->json(Response::error(500, $e->getMessage()));
            }
        });
    }
}
