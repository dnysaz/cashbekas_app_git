<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewAdsMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $data; 
    public function __construct($data) //get data from page controller
    {
        $this->data = $data; //initialize data
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.new_ads')
        ->subject('NEW ADS HAS BEEN PUBLISHED') //subject email
        ->from(env('MAIL_FROM_ADDRESS')) //pengirim email terhubung ke file .env
        ->with($this->data); //parsing data ke view
    }
}
