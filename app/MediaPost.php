<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MediaPost extends Model
{
    protected $fillable = [
        'post_id',
        'media_id'
    ];
}
