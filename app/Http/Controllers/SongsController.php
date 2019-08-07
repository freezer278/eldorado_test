<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetSongsRequest;
use App\Http\Requests\UpdateSongRequest;
use App\Http\Resources\SongResource;
use App\Song;
use Illuminate\Http\Request;

class SongsController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(GetSongsRequest $request)
    {
        $songs = Song::query()
            ->orderBy($request->getOrderBy(), $request->getOrderByDirection())
            ->get($request->getLimit());

        return SongResource::collection($songs);
    }

    /**
     * @param Song $song
     * @return SongResource
     */
    public function getSingle(Song $song)
    {
        return new SongResource($song);
    }

    /**
     * @param UpdateSongRequest $request
     * @return SongResource
     */
    public function create(UpdateSongRequest $request)
    {
        $song = Song::create($request->getData());

        return new SongResource($song);
    }

    /**
     * @param Song $song
     * @param Request $request
     * @return SongResource
     */
    public function update(Song $song, UpdateSongRequest $request)
    {
        $song->update($request->getData());

        return new SongResource($song);
    }

    /**
     * @param Song $song
     * @return SongResource
     * @throws \Exception
     */
    public function delete(Song $song)
    {
        $song->delete();

        return new SongResource($song);
    }
}
