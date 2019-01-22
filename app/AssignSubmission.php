<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssignSubmission extends Model
{
    public function user()
   {
      return $this->belongsTo(User::Class);
   }
    public function user_profile(){
        return $this->belongsTo('App\UserProfile', 'usr_id', 'id');
    }
    public function assignSubmissionFile()
    {
        return $this->hasMany('App\AssignSubmissionFile', 'submission_id', 'id');
    }
}
