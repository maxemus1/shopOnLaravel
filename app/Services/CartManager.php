<?php
/**
 * Created by PhpStorm.
 * User: macms
 * Date: 19/04/2019
 * Time: 07:10
 */

namespace App\Services;
use App\Model\Cart;

/**
 *
 * Class для задания значений письма
 *
 * @package App\Services
 */
class CartManager
{
    /**
     * @return CartInfo
     */
    public function getCreateCart()
    {
        return $this->getCartInfo(Cart::getUserCart());
    }

    /**
     * @param $date
     * @return CartInfo
     */
    public function getDoneCart($date)
    {
        return $this->getCartInfo(Cart::getUserOrders($date));
    }

    /**
     * Возвращяет карзину и сумму корзины
     *
     * @param $cart
     *
     * @return CartInfo
     */
    private function getCartInfo($cart)
    {
        $cartInfo = new CartInfo();
        $cartInfo->setCart($cart);
        $cartInfo->setSum($cart->sum('prise'));
        return $cartInfo;
    }
}
