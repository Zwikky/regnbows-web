<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewUserEmail extends Mailable
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
        return $this->subject('Regnbow Market: New User')
        ->to('zwikky@gmail.com', 'Zwakele Mkhatshwa')
            ->markdown('email.admin.new_user')
            ->with([
                'name' => 'New User',
                'link' => 'http://market.regnbows.com/public/users',
                'email_data' => $this->email_data
            ]);
    }
}