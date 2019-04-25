<?php
/**
 * Created by PhpStorm.
 * User: macms
 * Date: 19/04/2019
 * Time: 07:10
 */

namespace App\Services;

use App\Model\Cart;
use App\Services\CartInfo;

/**
 *
 * Class для задания значений письма
 *
 * @package App\Services
 */
class CartManager
{
    /**
     * Возращяет карзину пользователя для формирования email
     *
     * @return mixed
     */
    protected function getCart()
    {
        return Cart::getUserCart();
    }

    /**
     * Возращяет сумму товара в корзине
     *
     * @return mixed
     */
    protected function getSumCart()
    {
        return $this->getCart()->sum('prise');
    }

    public function getCartInfo()
    {
        $cartInfo = new CartInfo();
        $cartInfo->setCart($this->getCart());
        $cartInfo->setSum($this->getSumCart());
        return $cartInfo;

    }
}
