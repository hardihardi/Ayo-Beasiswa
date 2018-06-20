<?php

namespace App\Mail;

use App\Models\Facilitator;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class mailFacilitator extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Facilitator $user)
    {
        $this->user = $user;
        $this->subject('Facilitator Confirmation');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.facilitator')->with([
                    'name' => 'Ayobeasiswa'
                    ]);
    }
}
