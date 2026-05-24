<?php

namespace App\Providers;

use App\Models\Cart;
use App\Policies\CartPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Gate::policy(Cart::class, CartPolicy::class);
    }
}
