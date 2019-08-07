<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetSongsRequest;
use App\Http\Requests\UpdateSongRequest;
use App\Http\Resources\SongResource;
use App\Jobs\CreateSongJob;
use App\Jobs\DeleteSongJob;
use App\Jobs\UpdateSongJob;
use App\Repositories\SongRepositoryInterface;
use App\Song;
use Exception;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class SongsController extends Controller
{
    /**
     * @var SongRepositoryInterface
     */
    private $songRepository;

    /**
     * SongsController constructor.
     * @param SongRepositoryInterface $songRepository
     */
    public function __construct(SongRepositoryInterface $songRepository)
    {
        $this->songRepository = $songRepository;
    }

    /**
     * @param GetSongsRequest $request
     * @return AnonymousResourceCollection
     */
    public function index(GetSongsRequest $request)
    {
        return SongResource::collection($this->songRepository->getByRequest($request));
    }

    /**
     * @param UpdateSongRequest $request
     * @return SongResource
     */
    public function create(UpdateSongRequest $request)
    {
        CreateSongJob::dispatch($request->getData());

        return response()->json();
    }

    /**
     * @param Song $song
     * @param UpdateSongRequest $request
     * @return SongResource
     */
    public function update(Song $song, UpdateSongRequest $request)
    {
        UpdateSongJob::dispatch($song, $request->getData());

        return response()->json();
    }

    /**
     * @param Song $song
     * @return SongResource
     * @throws Exception
     */
    public function delete(Song $song)
    {
        DeleteSongJob::dispatch($song);

        return response()->json();
    }
}
