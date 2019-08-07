<?php


namespace App\Http\Requests;


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
}