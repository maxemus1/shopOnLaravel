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

    public function __construct()
    {
        $cartInfo=New CartInfo();
        $cartInfo->setCart($this->getCartEmail());
        $cartInfo->setSum($this->getSumCartEmail());
    }

    /**
     * Возращяет карзину пользователя для формирования email
     *
     * @return mixed
     */
    public function getCartEmail()
    {
      return  Cart::getUserCart();
    }

    /**
     * Возращяет сумму товара в корзине
     *
     * @return mixed
     */
    public function getSumCartEmail()
    {
        return $this->getCartEmail()->sum('prise');

    }
}
