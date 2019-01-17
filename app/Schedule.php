<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    public function klase(){
    return $this->hasMany('App\Klase', 'class_id', 'class_id');
  }
}
