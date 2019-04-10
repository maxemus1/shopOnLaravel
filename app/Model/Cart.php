<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class Cart extends Model
{
    /**
     * @return mixed
     */
    public static function getUserCart()
    {
        return self::where('user_id', Auth::id())
            ->where('order_id', null)
            ->get();
    }

    /**
     * @return mixed
     */
    public static function getUserCartCount()
    {
        return self::where('user_id', Auth::id())
            ->where('order_id', null)
            ->count();
    }

    /**
     * @param Products $products
     * @return Cart
     */
    public static function storeProducts(Products $products)
    {
        $cart = new Cart;
        $cart->products_id = $products->id;
        $cart->order_id = null;
        $cart->prise = $products->prise;
        $cart->user_id = Auth::id();
        $cart->save();
        return $cart;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function products()
    {
        return $this->hasOne(Products::class, 'id', 'products_id');
    }


}
