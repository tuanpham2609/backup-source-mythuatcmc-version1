<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table ='comment';
    protected $fillable = [
        'idPost','content'
    ];
    public function post(){
        return $this->belongsTo('App/Models/Post','idPost','id');
    }
}
