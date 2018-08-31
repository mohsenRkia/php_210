<?php

namespace App\Jobs;

use App\Mail\OrderSubmit;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $useremail;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($useremail)
    {
        $this->useremail = $useremail;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $useremail = $this->useremail;
        Mail::to($useremail)->send(new OrderSubmit());
    }
}