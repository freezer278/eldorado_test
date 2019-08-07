<?php


namespace App\Repositories;


use App\Http\Requests\GetSongsRequest;
use App\Http\Requests\GetSongsRequestInterface;
use App\Song;
use Illuminate\Support\Facades\Cache;

class SongRepository implements SongRepositoryInterface
{
    const CACHE_TAG = 'songs';

    /**
     * @param GetSongsRequestInterface $request
     * @return iterable
     */
    public function getByRequest(GetSongsRequestInterface $request): iterable
    {
        return Cache::tags(self::CACHE_TAG)->rememberForever(
            $this->getCacheKey($request),
            function () use ($request) {
                return Song::query()
                    ->orderBy($request->getOrderBy(), $request->getOrderByDirection())
                    ->limit($request->getLimit())
                    ->get($request->getFields());
            });
    }

    /**
     * @param GetSongsRequestInterface $request
     * @return string
     */
    private function getCacheKey(GetSongsRequestInterface $request): string
    {
        return 'getByRequest_'
            . $request->getOrderBy()
            . $request->getOrderByDirection()
            . $request->getLimit()
            . implode(',', $request->getFields());
    }

    /**
     * @param array $attributes
     * @return Song
     */
    public function create(array $attributes): Song
    {
        $this->flushCache();
        return Song::create($attributes);
    }

    /**
     * @param Song $song
     * @param array $attributes
     * @return Song
     * @throws \Exception
     */
    public function update(Song $song, array $attributes): Song
    {
        $this->flushCache();
        $song->update($attributes);
        return $song;
    }

    /**
     * @param Song $song
     * @return Song
     * @throws \Exception
     */
    public function delete(Song $song): Song
    {
        $this->flushCache();
        $song->delete();
        return $song;
    }

    /**
     *
     */
    private function flushCache()
    {
        Cache::tags(self::CACHE_TAG)->flush();
    }
}