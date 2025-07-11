<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class LogSimpleMessage implements ShouldQueue
{
     use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $message;
    
    public function __construct($message)
    {
         $this->message = $message;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Log::info('Queued Log Message: ' . $this->message);
    }
}
