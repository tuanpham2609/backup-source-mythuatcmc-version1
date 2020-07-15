<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sliders extends Model
{
    protected $table = 'slider';
    protected $fillable = [
        'image','name','slug'
    ];
}
