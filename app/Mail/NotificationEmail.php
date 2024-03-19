<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotificationEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $notificationData;

    public function __construct($notificationData)
    {
        $this->notificationData = $notificationData;
    }

    public function build()
    {
        return $this->view('emails.notification')
                    ->with([
                        'titre' => $this->notificationData['titre'],
                        'message' => $this->notificationData['message'],
                    ]);
    }
}
