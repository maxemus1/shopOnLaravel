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

    public function setCart($value)
    {
        $this->cart= $value;
    }

    /**
     * @return mixed
     */
    public function setSum($value)
    {
        $this->sum = $value;
    }

}