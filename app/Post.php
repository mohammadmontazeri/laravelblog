<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable=[
        'title','detail','summery','image','cat_id','viewed','likes','tags'
    ];
}
