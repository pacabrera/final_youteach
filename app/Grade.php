<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    public function user_profile(){
        return $this->belongsTo('App\UserProfile', 'usr_id', 'id');
    }

    public function grade_category()
   {
      return $this->belongsTo('App\GradeCategory', 'category', 'grade_id');
   }
}
