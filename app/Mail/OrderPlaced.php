<?php

namespace Order\Mail;

use Order\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderPlaced extends Mailable
{
    use Queueable, SerializesModels;

    public $order;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to($this->order->billing_email, $this->order->billing_name)
                    ->bcc('luismarinnaveda@gmail.com')
                    ->cco('luismarinnaveda@gmail.com')
                    ->subject('Orden de pedido de iZabor Restaurant Orden #'.$this->order->id)
                    ->markdown('emails.orders.placed');
    }
}
