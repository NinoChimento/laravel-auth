<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $fillable = [
        "post_id",
        "name",
        "body"
    ];

    public function post()
    {
        return $this->belongsTo('App\Post');
    }
}
