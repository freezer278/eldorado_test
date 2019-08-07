<?php

namespace App\Jobs;

use App\Repositories\SongRepositoryInterface;
use App\Song;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class DeleteSongJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    /**
     * @var Song
     */
    private $song;

    /**
     * Create a new job instance.
     *
     * @param Song $song
     */
    public function __construct(Song $song)
    {
        $this->song = $song;
    }

    /**
     * Execute the job.
     *
     * @return void
     * @throws \Exception
     */
    public function handle()
    {
        $songRepository = app()->make(SongRepositoryInterface::class);
        $songRepository->delete($this->song);
    }
}
