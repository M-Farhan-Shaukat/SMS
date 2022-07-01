<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmailTest extends Mailable
{
    use Queueable, SerializesModels;
    protected $details;
    protected $user;
    protected $type;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details,$user,$type)
    {
        $this->details = $details;
        $this->user = $user;
        $this->type = $type;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
       $user =$this->user;
       $type = $this->type;
        return $this->view('admin.email',compact('user','type'));
    }
}
