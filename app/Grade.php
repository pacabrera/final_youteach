<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    public function user_profile(){
        return $this->belongsTo('App\UserProfile', 'usr_id', 'id');
    }
}
