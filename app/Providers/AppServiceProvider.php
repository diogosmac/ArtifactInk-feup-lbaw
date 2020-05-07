<?php

namespace App\Providers;

use App\Category;
use App\Http\Controllers\CartController;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Make categories accessible everywhere
        View::composer(['*'], function($view) {
            $view->with('parent_categories', Category::where('id_parent', null)->get());
            $view->with('cart_items', CartController::get_user_cart_items());
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
