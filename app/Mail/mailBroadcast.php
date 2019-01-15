<?php

namespace App\Mail;

use App\Models\Email;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class mailBroadcast extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $email_bcc;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Email $user)
    {
        $this->email_bcc = json_decode($user->email);
        $this->user = $user;
        $this->subject($user->subject);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        dd($this->email_bcc);
        return $this->view('email.mail')->with([
       'konten' => $this->user->konten
        ])->bcc($this->email_bcc);
    }
}
