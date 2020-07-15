<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = 'category';
    protected $fillable = [
        'name','slug',
    ];
    public function post(){
        return $this->hasMany('App/Models/Post','idCategory','id');
    }
}
