<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewSliderEmail extends Mailable
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

        return $this->subject('Regnbow Market: New Slider')
        ->cc('zwikky@gmail.com', 'Zwakele Mkhatshwa')
            ->markdown('email.user.new_slider')
            ->with([
                'name' => 'New Slider',
                'link' => 'http://market.regnbows.com/public/sliders',
                'email_data' => $this->email_data
            ]);
    }
}