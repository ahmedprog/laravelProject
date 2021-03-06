<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //


    public $table = 'posts';
    public function comments(){
        return $this->hasMany('App\Comment');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function forum(){
        return $this->belongsTo('App\Forum');
    }
}
