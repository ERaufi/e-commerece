<?php

use App\Http\Middleware\isAdminMiddleware;
use App\Http\Middleware\LogAfterResponse;
use App\Http\Middleware\LogUserDetailsMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
        $middleware->append(LogAfterResponse::class);
        $middleware->append(LogUserDetailsMiddleware::class);



        $middleware->alias([
            'isAdmin' => isAdminMiddleware::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
