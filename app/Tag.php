<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillibale=[
        "name",
    ];

    public function Posts()
    {
        return $this->belongsToMany('App\Post');
    }
}
