<?php

use App\Http\Middleware\HandleInertiaRequests;
use App\Http\Middleware\ParticipantAuthMiddleware;
use App\Http\Middleware\ParticipantGuardMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->web(append: [
            HandleInertiaRequests::class,
        ]);

        $middleware->alias(
            [
                'auth.participant' => ParticipantAuthMiddleware::class,
                'guard.participant' => ParticipantGuardMiddleware::class,
            ]
        );
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
