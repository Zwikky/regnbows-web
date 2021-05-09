<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewBusinessEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->email_data  = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Regnbow Market: New Business')
        ->cc('zwikky@gmail.com', 'Zwakele Mkhatshwa')
            ->markdown('email.user.new_business')
            ->with([
                'name' => 'New Business',
                'link' => 'http://market.regnbows.com/public/places',
                'email_data' => $this->email_data
            ]);
    }
}