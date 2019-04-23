<?php
/**
 * Created by PhpStorm.
 * User: macms
 * Date: 10/04/2019
 * Time: 03:44
 */

namespace App\Services;

use Mail;
use App\Model\EmailOrder;
use App\Mail\mailClass;
use Illuminate\Support\Facades\Auth;

/**
 *
 * Class для отправки писем
 * @package App\Services
 */
class EmailSend
{
    /**
     *Отправка заказа
     *
     * @return void
     */
    public function send($cart,$sum,$user)
    {
        $email = EmailOrder::all('email');
        Mail::to($email)->send(new mailClass($cart, $sum, $user));
    }
}
