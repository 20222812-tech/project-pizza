<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
        // Auto-login as admin - không cần đăng nhập
        if (!\auth()->check()) {
            $admin = \App\Models\User::where('role', 'admin')->first();
            if ($admin) {
                \auth()->login($admin);
            }
        }
    }
}
