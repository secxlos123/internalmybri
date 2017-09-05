<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \App\Http\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            // \Illuminate\Session\Middleware\AuthenticateSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [
            'throttle:60,1',
            'bindings',
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [

        /* Middleware for Menus */
        'auth' => \App\Http\Middleware\Authenticate::class,
        'leads' => \App\Http\Middleware\MenuAccessor\Leads::class,
        'eform' => \App\Http\Middleware\MenuAccessor\EForm::class,
        'developers' => \App\Http\Middleware\MenuAccessor\Developers::class,
        'dashboard' => \App\Http\Middleware\MenuAccessor\Dashboard::class,
        'debitur' => \App\Http\Middleware\MenuAccessor\Debitur::class,
        'scheduler' => \App\Http\Middleware\MenuAccessor\Scheduler::class,
        'calculator' => \App\Http\Middleware\MenuAccessor\Calculator::class,
        'tracking' => \App\Http\Middleware\MenuAccessor\Tracking::class,
        'others' => \App\Http\Middleware\MenuAccessor\Others::class,
        'user' => \App\Http\Middleware\MenuAccessor\User::class,
        'role' => \App\Http\Middleware\MenuAccessor\Role::class,
        /* End of Middleware Menu */

        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'bindings' => \Illuminate\Routing\Middleware\SubstituteBindings::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
    ];
}
