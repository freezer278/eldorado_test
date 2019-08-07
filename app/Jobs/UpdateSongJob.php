<?php

namespace App\Jobs;

use App\Song;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class UpdateSongJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    /**
     * @var Song
     */
    private $song;
    /**
     * @var array
     */
    private $data;

    /**
     * Create a new job instance.
     *
     * @param Song $song
     * @param array $data
     */
    public function __construct(Song $song, array $data)
    {
        $this->song = $song;
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->song->update($this->data);
    }
}
