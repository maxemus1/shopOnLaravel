<?php

namespace App\Http\Controllers;

use App\Model\Cart;
use App\Model\Products;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function step1()
    {
        $cart = Cart::getUserCart();

        return view('cart.step1', ['cart' => $cart]);
    }

    public function step2()
    {
        $cart = Cart::getUserCart();
        $sum = $cart->sum('prise');
        return view('cart.step2', ['cart' => $cart,'sum'=>$sum]);
    }

    public function addToCart(Products $products)
    {
        Cart::storeProducts($products);
        return redirect()->route('cart.step1');
    }
}
