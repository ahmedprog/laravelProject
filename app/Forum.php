<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    //

    public $table = 'forums';
    public function posts(){
        return $this->hasMany('App\Post');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
}
