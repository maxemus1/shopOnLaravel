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
use App\Services\CartManager;

/**
 *
 * Class для отправки писем
 * @package App\Services
 */
class EmailSend
{
    /**
     * @var \App\Services\CartManager
     */
    protected $emailManager;

    /**
     * EmailSend constructor.
     * @param \App\Services\CartManager $emailManager
     */
    public function __construct(CartManager $emailManager)
    {
        $this->emailManager = $emailManager;
    }

    /**
     *Отправка заказа
     *
     * @return void
     */
    public function send($user)
    {
        $email = EmailOrder::all('email');
        Mail::to($email)->send(new mailClass($this->emailManager->getCartEmail(), $this->emailManager->getSumCartEmail(), $user));
    }
}
