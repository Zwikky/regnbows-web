<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailtrapExample extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Regnbow Market: New Advert')
        ->cc('zwikky@gmail.com', 'Zwakele Mkhatshwa')
        ->bcc('zwakele.mkhatshwa@fnb.co.sz', 'Zwakele Mkhatshwa')
            ->markdown('mails.exmpl')
            ->with([
                'name' => 'New Business',
                'link' => 'http://market.regnbows.com/public/users'
            ]);
    }
}