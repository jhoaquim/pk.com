<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Positus\Laravel\Client;

class ResolveWhatsappRequest implements ShouldQueue
{
    public $data;
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        if (array_key_exists('messages', $this->data)) {
            $name   = $this->data['contacts'][0]['profile']['name'];
            $wa_id  = $this->data['contacts'][0]['wa_id'];
            $number = Client::number(['numberid' => '814e1f43-af0b-4ecb-a3ee-719c3481fabf', 'sandbox' => true]);
            $message = $number->sendText($wa_id, body:'Olá ' . $name);
        } else {
            //processa status
        }
    }
}
