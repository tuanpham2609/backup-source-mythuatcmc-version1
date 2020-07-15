<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $table = 'post';
    protected $fillable = [
        'idCategory','name','slug','short_content','description','image','new_highlights'
    ];
    public function Categories(){
        return $this->belongsTo('App/Models/Categories','idCategory','id');
    }
    public function Comment(){
        return $this->hasMany('App/Models/Comment','idPost','id');
    }
}
