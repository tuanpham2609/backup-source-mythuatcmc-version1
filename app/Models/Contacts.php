<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    protected $table ='contact';
    protected $fillable = [
        'name','content','phone','email','title'
    ];
}
