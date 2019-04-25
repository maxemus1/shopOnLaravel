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
    protected $cart;
    protected $sum;

    /**
     * @return mixed
     */
    public function getCart()
    {
        return $this->cart;
    }

    /**
     * @param mixed $cart
     */
    public function setCart($cart)
    {
        $this->cart = $cart;
    }

    /**
     * @return mixed
     */
    public function getSum()
    {
        return $this->sum;
    }

    /**
     * @param mixed $sum
     */
    public function setSum($sum)
    {
        $this->sum = $sum;
    }


}