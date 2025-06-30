<?php

namespace App\Providers;
use App\Models\Cart;
use Auth;
use Illuminate\Support\ServiceProvider;
use View;

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
        View::composer('*', function ($view) {
            $cartItems = [];

            if(Auth::check()) {
                $cartItems = Cart::with('product')
                  ->where('user_id', Auth::id())
                  ->get();
            }

            //pastikan ini adalah collection, bukan aray
            $view->with('cartItems', collect($cartItems));
        });
    }
}
