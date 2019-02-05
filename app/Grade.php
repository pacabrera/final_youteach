<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    public function user_profile(){
        return $this->belongsTo('App\UserProfile', 'usr_id', 'id');
    }

    public function user(){
        return $this->belongsTo('App\User', 'usr_id', 'id');
    }
    
    public function grades()
   {
      return $this->belongsTo('App\GradeCategory', 'category', 'grade_id');
   }

       public function klase(){
        return $this->belongsTo('App\Klase', 'class_id');
    }
}
