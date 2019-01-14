<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    public function assignfile(){
    return $this->hasMany('App\AssignFile', 'assgn_id');
  }
    public function thread(){
    return $this->hasMany('App\Thread');
  }

     public function klase(){
        return $this->belongsTo('App\Klase', 'class_id');
    }

}
