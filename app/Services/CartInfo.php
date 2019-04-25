<?php
/**
 * Created by PhpStorm.
 * User: macms
 * Date: 24/04/2019
 * Time: 15:53
 */

namespace App\Services;

/**
 * Class CartInfo
 * @package App\Services
 */
class CartInfo
{
    public $cart;
    public $sum;

    public function setCart($cart)
    {
        $this->cart= $cart;
    }

    /**
     * @return mixed
     */
    public function setSum($sum)
    {
        $this->sum = $sum;
    }

}