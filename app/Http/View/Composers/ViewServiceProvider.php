<?php

namespace App\Http\View\Composers;

use App\Model\Cart;
use App\Model\Category;
use App\Model\News;
use App\Model\Product;
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
            $categories = Category::all();
            $randomProductsOne = Product::orderBy(\DB::raw('RAND()'))
                ->first();
            $randomProducts = Product::orderBy(\DB::raw('RAND()'))
                ->limit(3)
                ->get();
            $lastNews = News::orderBy('id', 'desc')->limit(3)->get();
            $userCartCount = Cart::getUserCartCount();
            $view->with('categories', $categories);
            $view->with('randomProductsOne', $randomProductsOne);
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