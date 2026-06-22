<?php

namespace App\Providers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;
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
        //
        // Gate::define('isAdmin', function (User $user) {
        //     return $user->type === 'admin';
        // });

        // Gate::define('edit-product', function (User $user, Product $product) {
        //     return $user->id === $product->created_by;
        // });
    }
}
