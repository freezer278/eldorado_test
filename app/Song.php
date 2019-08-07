<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    /**
     * @var array
     */
    const VISIBLE_FIELDS = [
        'id',
        'name',
        'created_at',
        'updated_at',
    ];

    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
    ];
}
