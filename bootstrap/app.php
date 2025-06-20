<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->render(function (AuthenticationException $e, Request $request) {
            // Hanya berikan custom response jika route-nya untuk API
            if ($request->is('api/*')) {
                return (new BaseController)->sendError('Unauthenticated.', [], 401);
            }

            // Default fallback (misalnya ke halaman login web)
            return redirect()->guest(route('login'));
        });
    })->create();
