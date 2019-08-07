<?php

namespace App\Jobs;

use App\Repositories\SongRepositoryInterface;
use App\Song;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class CreateSongJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    /**
     * @var array
     */
    private $data;

    /**
     * Create a new job instance.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $songRepository = app()->make(SongRepositoryInterface::class);
        $songRepository->create($this->data);
    }
}
