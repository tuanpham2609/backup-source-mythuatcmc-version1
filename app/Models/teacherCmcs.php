<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class teacherCmcs extends Model
{
    protected $table = 'teacher_cmcs';
    protected $fillable = [
        'description','image','name'
    ];
}
