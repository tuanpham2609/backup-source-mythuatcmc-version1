<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aboutscmc extends Model
{   
    protected $table = 'about';
    protected $fillable = [
        'content','image'
    ];
}
