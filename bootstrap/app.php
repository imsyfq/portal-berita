<?php

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
        $middleware->alias([
            // 'adminer-access' => \App\Http\Middleware\AdminerMiddleware::class,
        ]);

        $middleware->redirectGuestsTo(function (Illuminate\Http\Request $request) {
            $path = $request->getPathInfo();
            if (str_contains($path, 'user')) {
                return route('user.login');
            }

            return route('login');
        });

        $middleware->redirectUsersTo(function (Illuminate\Http\Request $request) {
            $user = $request->user();
            if ($user instanceof \App\Models\User) {
                return '/';
            }

            return route('home');
        });
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
