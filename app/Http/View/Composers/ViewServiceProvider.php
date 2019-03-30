<?php

namespace App\Http\View\Composers;

use App\Model\Cart;
use App\Model\Categories;
use App\Model\News;
use App\Model\Products;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {

        View::composer('*', function ($view) {
            $categories = Categories::all();
            $randomProducts = Products::orderBy(\DB::raw('RAND()'))
                ->first();
            $lastNews = News::orderBy('id', 'desc')->limit(3)->get();
            $userCartCount = Cart::getUserCartCount();
                $view->with('categories', $categories);
            $view->with('randomProducts', $randomProducts);
            $view->with('lastNews', $lastNews);
            $view->with('userCartCount', $userCartCount);
        });
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}