<?php

namespace App\Jobs;

use App\Models\Country;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\DB;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class ProcessDataChunk implements ShouldBeUnique
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 5; 
    public $maxExceptions = 2; 
    public $backoff = [15, 30, 45, 60];

    public function __construct(public array $chunks)
    {
       
    }   

    public function handle()
    {
        
        DB::transaction(function () {
            foreach ($this->chunks as $chunk) {
                $country = Country::create([
                    'name' => $chunk['name'],
                    'language' => $chunk['language'],
                    'bio' => $chunk['bio'],
                ]);
            }
        });
    }

    public function withBatchId(string $batchId)
    {
        $this->batchId = $batchId;
        return $this;
    }
}
