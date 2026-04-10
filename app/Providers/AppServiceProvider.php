<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Mendefinisikan Gate 'manage-product'
        // Gate ini hanya akan mengembalikan nilai true jika role user adalah 'admin'
        Gate::define('manage-product', function (User $user) {
            return $user->role === 'admin';
        });
    }
}