<?php
/**
 * Created by PhpStorm.
 * User: macms
 * Date: 19/04/2019
 * Time: 07:10
 */

namespace App\Services;

/**
 *
 * Class для задания значений письма
 *
 * @package App\Services
 */
class CartManager
{
    /**
     * Возвращяет карзину и сумму корзины
     *
     * @param $cart
     *
     * @return CartInfo
     */
    public function getCartInfo($cart)
    {
        $cartInfo = new CartInfo();
        $cartInfo->setCart($cart);
        $cartInfo->setSum($cart->sum('prise'));
        return $cartInfo;

    }
}
