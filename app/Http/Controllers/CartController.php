<?php

namespace App\Http\Controllers;

use App\Services\EmailSend;
use App\Model\Cart;
use App\Model\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function step()
    {
        $cart = Cart::getUserCart();
        $sum = $cart->sum('prise');
        return view('cart.step', ['cart' => $cart, 'sum' => $sum]);
    }

    /**
     * @param Product $products
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function addToCart(Product $products)
    {
        Cart::storeProducts($products);
        return redirect()->route('cart.step');
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
        $email = new EmailSend();
        $email->email();
        return redirect()->route('home');
    }
}
