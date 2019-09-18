<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable=[
        'name',
        'email',
        'phoneNumber',
        'instaUrl',
        'tellId',
        'detail',
        'image'
    ];
}
