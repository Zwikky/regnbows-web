<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewAdvertEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->email_data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Regnbow Market: New Advert')
        ->to(env('MAIL_TO_ADMIN'))
        ->cc('zwikky@gmail.com', 'Zwakele Mkhatshwa')
            ->markdown('email.user.new_advert')
            ->with([
                'name' => 'New Advert',
                'link' => 'http://market.regnbows.com/public/adverts',
                'email_data' => $this->email_data
            ]);
    }
}