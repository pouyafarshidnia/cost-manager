<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->redirectGuestsTo(fn() => route('auth'));
    })
    ->withExceptions(function (Exceptions $exceptions): void {

        $exceptions->renderable(function (Throwable $e) {

            if ($e instanceof AccessDeniedHttpException and request()->is('api/*'))
                return response()->json(['message' => 'You don`t have permission to this endpoint'], 403);

            if ($e instanceof NotFoundHttpException and request()->is('api/*'))
                return response()->json(['message' => 'Resource Not Found'], 404);
        });
    })->create();
