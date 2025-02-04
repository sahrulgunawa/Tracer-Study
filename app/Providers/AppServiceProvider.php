<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Register application services
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Add the "admin" namespace for views
        View::addNamespace('admin', resource_path('views/admin'));
    }
}
