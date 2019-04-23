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
class EmailOptions
{

    /**
     * Возращяет карзину пользователя для формирования email
     *
     * @return mixed
     */
    public static function getCartEmail()
    {
      return  Cart::getUserCart();
    }

    /**
     * Возращяет сумму товара в корзине
     *
     * @return mixed
     */
    public static function getSumCartEmail()
    {
        return EmailOptions::getCartEmail()->sum('prise');

    }
}
