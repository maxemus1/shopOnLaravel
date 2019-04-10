<?php
/**
 * Created by PhpStorm.
 * User: macms
 * Date: 10/04/2019
 * Time: 03:44
 */

namespace App\Services;

use Mail;
use App\Model\User;
use App\Mail\mailClass;

class EmailSend
{
    /**
     *
     */
    public function email()
    {
        $cart = Cart::getUserCart();
        $sum = $cart->sum('prise');
        $id = Auth::id();
        $user = User::find($id);
        Mail::to('loftschool91@mail.ru')->send(new mailClass($cart, $sum, $user));
        Cart::where('user_id', $id)
            ->delete();
    }
}