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
use App\Model\Cart;
use App\Model\EmailOrder;
use App\Mail\mailClass;
use Illuminate\Support\Facades\Auth;

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
        $email = EmailOrder::all('email');
        Mail::to($email)->send(new mailClass($cart, $sum, $user));
        Cart::where('user_id', $id)
            ->delete();
    }
}
