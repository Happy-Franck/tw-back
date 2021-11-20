<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PostulerEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
        $this->subject($data['poste']);
        $this->from($data['email'], $data['poste']);
    }

    /**
     * Build the message.
     *
     * @return $this
     */

    public function build()
    {
        $email = $this->view('recrutement.postuler');
        $email->attach($this->data['cv']);
        $email->attach($this->data['lm']);
    }
}
