<?php 

namespace App\Jobs;

use Illuminate\Bus\Batchable;
use Illuminate\Bus\Queueable;
use App\Jobs\ProcessDataChunk;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class ImportJson implements ShouldQueue
{
    use Batchable, Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 5; 
    public $maxExceptions = 2; 
    public $backoff = [15, 30, 45, 60];

    public function __construct()
    {
        $this->onQueue('json');
    }

    public function handle()
    {
        try {
            $jsonData = json_decode(Storage::disk('public')->get('country.json'), true);
            if ($jsonData === null) {
               Log::error('Error decoding JSON: ' . json_last_error_msg());
               return;
            } 
            $chunks = array_chunk($jsonData, 1000);
            $importJobs = [];
            foreach ($chunks as $chunk) {
                $importJobs[] = new ProcessDataChunk($chunk);
            }
            $batch = Bus::batch($importJobs)
                    ->dispatch();
            return $batch->id;
        } catch (\Exception $e) {
            Log::error('Error reading file or decoding JSON: ' . $e->getMessage());
        }
    }
}
