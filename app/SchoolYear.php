<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolYear extends Model
{
    public function klase(){
    return $this->belongsTo('App\Klase', 'class_id');
  }
}
