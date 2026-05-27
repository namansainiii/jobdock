<?php

use App\Http\Middleware\LogRequest;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        // web: __DIR__.'/../routes/web.php',
        web: __DIR__.'/../routes/web1.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
        $middleware->validateCsrfTokens(except: [
            // '/submit', '/submits', '/submitAny', '/api/users'
        ]);

        //global middleware
        // $middleware->append(LogRequest::class);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
