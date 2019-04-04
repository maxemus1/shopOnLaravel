<?php

namespace App\Http\Controllers;

use App\Model\Cart;
use App\Model\Products;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function step()
    {
        if (Auth()->check()) {
            $cart = Cart::getUserCart();
            $sum = $cart->sum('prise');
            return view('cart.step', ['cart' => $cart, 'sum' => $sum]);
        } else {
            return redirect('login');
        }
    }

    /**
     * @param Products $products
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function addToCart(Products $products)
    {
        if (Auth()->check()) {
            Cart::storeProducts($products);
            return redirect()->route('cart.step');
        } else {
            return redirect('login');
        }
    }
}
