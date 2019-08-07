<?php


namespace App\Http\Requests;


use App\Song;

interface GetSongsRequestInterface
{
    /**
     * @return int
     */
    public function getLimit(): int;

    /**
     * @return int
     */
    public function getOrderBy(): string;

    /**
     * @return int
     */
    public function getOrderByDirection(): string;

    /**
     * @return array
     */
    public function getFields(): array;
}