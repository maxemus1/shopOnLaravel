<?php

namespace App\Http\Controllers;

use App\Services\CartInfo;
use App\Services\CartManager;
use App\Services\EmailSend;
use App\Model\Cart;
use App\Model\User;
use App\Model\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * @var EmailSend
     */
    protected $emailSend;
    protected $cartManeger;

    /**
     * CartController constructor.
     * @param EmailSend $emailSend
     */
    public function __construct(EmailSend $emailSend,CartManager $cartManeger)
    {
        $this->emailSend = $emailSend;
        $this->cartManeger=$cartManeger;
    }

    /**
     * Возращяет карзину пользователя
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function step()
    {
        $cartInfo =['cartInfo' => $this->cartManeger->getCartInfo()];
        return view('cart.step', $cartInfo);
    }

    /**
     * @param $date
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function stepOrders($date)
    {
        $cart = Cart::getUserOrders($date);
        $sum = $cart->sum('prise');
        return view('orders.single', ['cart' => $cart, 'sum' => $sum]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function dateOrders()
    {
        $date = Cart::getUserDateOrders();
        return view('orders.date', ['date' => $date]);
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
        $user = User::find(Auth::id());
        $this->emailSend->send($user);
        Cart::cartDone();
        return redirect()->route('home');
    }
}
