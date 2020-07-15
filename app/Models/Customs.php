<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customs extends Model
{
    protected $table = 'customs';
    protected $fillable = [
        'logo','imgPr','name1','content1','name2','content2','name3','name3','content3','name4','content4','imgcustom'
    ];
}
