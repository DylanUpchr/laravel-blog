<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $primaryKey = 'media_id';
    protected $fillable = [
        'media_id',
        'media_type',
        'media_name'
    ];
}
