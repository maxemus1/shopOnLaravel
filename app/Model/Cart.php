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
            ->get();
    }

    /**
     * @return mixed
     */
    public static function getUserCartCount()
    {
        return self::where('user_id', Auth::id())
            ->count();
    }

    /**
     * @param Product $products
     * @return Cart
     */
    public static function storeProducts(Product $products)
    {
        $cart = new Cart;
        $cart->products_id = $products->id;
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
        return $this->hasOne(Product::class, 'id', 'products_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

}
