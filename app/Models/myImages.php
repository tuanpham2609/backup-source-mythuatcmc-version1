<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class myImages extends Model
{
    protected $table = 'my_images';
    protected $fillable = [
        'image','name'
    ];
}
