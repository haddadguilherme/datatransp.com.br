<?php

namespace App\Providers;

use App\Http\Middleware\MatchEmpresaMiddleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class MiddlewareServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Alias personalizado para middleware de correspondência de empresa
        Route::aliasMiddleware('empresa.match', MatchEmpresaMiddleware::class);
    }
}
