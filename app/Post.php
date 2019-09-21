<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable=[
        'title','detail','summery','image','cat_id','viewed','likes','tags'
    ];

    public function instapost()
    {
        return $this->hasOne('App\Instapost');
    }
    public function category()
    {
        return $this->belongsTo('App\Category','cat_id');
    }
}
