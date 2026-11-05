<?php

use App\Http\Middleware\EnsureUserHasRole;
use Illuminate\Auth\Middleware\RedirectIfAuthenticated;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )

    ->withMiddleware(function (Middleware $middleware) {

        $middleware->web(append: [
            \App\Http\Middleware\AutoLogout::class,
        ]);

        /*
        |--------------------------------------------------------------------------
        | Role Middleware
        |--------------------------------------------------------------------------
        */

        $middleware->alias([
            'role' => EnsureUserHasRole::class,
        ]);

        /*
        |--------------------------------------------------------------------------
        | Redirect User Yang Sudah Login
        |--------------------------------------------------------------------------
        |
        | Jangan arahkan ke / atau /dashboard karena project ini memiliki
        | dashboard berbeda berdasarkan role.
        |
        */

        RedirectIfAuthenticated::redirectUsing(function (Request $request) {

            $user = $request->user();

            if ($user && $user->isAdmin()) {
                return route('admin.dashboard');
            }

            if ($user) {
                return route('guru.dashboard');
            }

            return route('login');
        });
    })

    ->withExceptions(function (Exceptions $exceptions) {
        //
    })

    ->create();