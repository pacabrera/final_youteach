<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssignFile extends Model
{
  public function assignment(){
    return $this->belongsTo('App\Assignment', 'assgn_id');
  }
}
