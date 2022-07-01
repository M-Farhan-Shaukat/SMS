<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Mail\SendEmailTest;
use Mail;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $details;
    public $user;
    public $type;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($details,$user,$type)
    {
        // dd( $this->details);
        $this->details=$details;
        $this->user=$user;
        $this->type=$type;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $email = new SendEmailTest($this->details,$this->user,$this->type);
        Mail::to($this->details,$this->user)->send($email);
    }
}
