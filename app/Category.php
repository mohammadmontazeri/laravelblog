<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name','parent','is_parent','image'
    ];

    public function posts()
    {
        return $this->hasMany('App\Post','cat_id');
    }
}
