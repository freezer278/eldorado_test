<?php


namespace App\Repositories;


use App\Http\Requests\GetSongsRequestInterface;
use App\Song;

interface SongRepositoryInterface
{
    /**
     * @param GetSongsRequestInterface $request
     * @return iterable
     */
    public function getByRequest(GetSongsRequestInterface $request): iterable;

    /**
     * @param array $attributes
     * @return Song
     */
    public function create(array $attributes): Song;

    /**
     * @param Song $song
     * @param array $attributes
     * @return Song
     * @throws \Exception
     */
    public function update(Song $song, array $attributes): Song;

    /**
     * @param Song $song
     * @return Song
     */
    public function delete(Song $song): Song;
}