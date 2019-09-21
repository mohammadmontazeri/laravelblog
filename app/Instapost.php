<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instapost extends Model
{
    protected $fillable=[
        'url','post_id'
    ];

    public function post()
    {
        return $this->belongsTo('App\Post');
    }
}
