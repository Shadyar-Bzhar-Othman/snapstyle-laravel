<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
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
        Model::unguard();

        // Middleware gate to know If the currecnt user is admin or not to redirect them
        Gate::define('admin', function (User $user) {
            return $user->role === "1";
        });

        // Blade component to check if it's admin
        Blade::if('admin', function () {
            return request()->user()?->can('admin');
        });
    }
}
