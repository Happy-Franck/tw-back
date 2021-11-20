<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MessageGoogle extends Mailable
{
    use Queueable, SerializesModels;

    public $data; // Données pour la vue

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        $attachments = [
            [
                "path" => 'D:/user.jpg',
               // "as" => "Purchase Invoice NO 005.pdf",
               // "mime" => "application/pdf",
            ],
            [
                "path" => 'D:/test.pdf',
               // "as" => "Purchase Invoice NO 007.pdf",
               // "mime" => "application/pdf",
            ],
        ];


        $email = $this->from("lol@gmail.com") // L'expéditeur
                    ->subject("test") // Le sujet
                    ->view('emails.message-google');
        $email->attach('D:/user.jpg');
        $email->attach('D:/test.pdf');

        return $email;
    }
}
?>
