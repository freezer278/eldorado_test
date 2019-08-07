<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
    ];
}
