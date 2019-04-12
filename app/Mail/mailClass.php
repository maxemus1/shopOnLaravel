<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class mailClass extends Mailable
{
    use Queueable, SerializesModels;

    public $cart;
    public $sum;
    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($cart, $sum, $user)
    {
        $this->cart = $cart;
        $this->sum = $sum;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('gemsmark@mail.com')
            ->view('mail.mail')
            ->text('mail.mail')
            ->subject('Поступил новый заказ');
    }
}
