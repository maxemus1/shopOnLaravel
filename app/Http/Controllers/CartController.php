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
    public function __construct(EmailSend $emailSend, CartManager $cartManeger)
    {
        $this->emailSend = $emailSend;
        $this->cartManeger = $cartManeger;
    }

    /**
     * Возращяет карзину пользователя
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function step()
    {
        return view('cart.step', ['cartInfo' => $this->cartManeger->getCreateCart()]);
    }

    /**
     * Возращяет заказ согласно дате
     *
     * @param $date
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function stepOrders($date)
    {
        return view('orders.single', ['cartInfo' => $this->cartManeger->getDoneCart($date)]);
    }

    /**
     * Возращяет дату
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function dateOrders()
    {
        return view('orders.date', ['date' => Cart::getUserDateOrders()]);
    }

    /**
     * Запись карзины в бд
     *
     * @param Product $products
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function addToCart(Product $products)
    {
        Cart::storeProducts($products);
        return redirect()->route('cart.step');
    }

    /**
     * Удаляет записть из корзины
     *
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Cart::destroy($id);
        return redirect()->route('cart.step');
    }

    /**
     * Отправляет письмо администратору
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function email()
    {
        $this->emailSend->send(User::find(Auth::id()));
        Cart::cartDone();
        return redirect()->route('home');
    }
}
