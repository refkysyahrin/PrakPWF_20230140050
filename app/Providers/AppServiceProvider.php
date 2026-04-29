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
        // Mendefinisikan Gate 'manage-product' (Tugas Sebelumnya)
        // Gate ini hanya akan mengembalikan nilai true jika role user adalah 'admin'
        Gate::define('manage-product', function (User $user) {
            return $user->role === 'admin';
        });

        // Mendefinisikan Gate 'manage-category' (TAMBAHAN UJIAN UCP 1)
        // Membatasi akses rute dan menu Kategori hanya untuk Admin
        Gate::define('manage-category', function (User $user) {
            return $user->role === 'admin';
        });
    }
}