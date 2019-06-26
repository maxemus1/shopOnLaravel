<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class Cart extends Model
{
    const CREATE = 'create';
    const DONE = 'done';

    /**
     * @return mixed
     */
    public static function getUserCart()
    {
        return self::where('user_id', Auth::id())
            ->where('status', Cart::CREATE)
            ->get();
    }

    /**
     * @return mixed
     */
    public static function getUserCartCount()
    {
        return self::where('user_id', Auth::id())
            ->where('status', Cart::CREATE)
            ->count();
    }

    /**
     * @return mixed
     */
    public static function getUserOrders($date)
    {
        return self::where('user_id', Auth::id())
            ->where('status', Cart::DONE)
            ->where('date_orders', $date)
                ->get();
    }

    public static function getUserDateOrders()
    {
        return self::all()
            ->where('user_id', Auth::id())
            ->groupBy('date_orders');
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
        $cart->status = Cart::CREATE;
        $cart->save();
        return $cart;
    }

    /**
     * @return mixed
     */
    public static function deleteCart()
    {
        return self::where('user_id', Auth::id())
            ->delete();
    }

    /**
     * @return mixed
     */
    public static function cartDone()
    {
        $dateOrders = Carbon::now();
        $cart = Cart::where('user_id', Auth::id())
            ->where('status', 'create')
            ->update(
                ['status' => Cart::DONE,
                    'date_orders' => $dateOrders->toDateString()
                ]);
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
