<?php

namespace App\Http\Controllers;

use App\Model\Cart;
use App\Model\Products;
use Illuminate\Http\Request;

class CartController extends Controller
{
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
