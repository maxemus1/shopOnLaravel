<?php

namespace App\Http\Controllers;

use Mail;
use App\Model\Cart;
use App\Model\User;
use App\Model\Products;
use Illuminate\Http\Request;
use App\Mail\mailClass;
use Illuminate\Support\Facades\Auth;

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

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Cart::destroy($id);
        return redirect()->route('cart.step');
    }


    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function email()
    {
        $cart = Cart::getUserCart();
        $sum = $cart->sum('prise');
        $id = Auth::id();
        $user = User::find($id);
        Mail::to('loftschool91@mail.ru')->send(new mailClass($cart, $sum, $user));
        Cart::where('user_id', $id)
            ->delete();
        return redirect()->route('home');
    }
}
