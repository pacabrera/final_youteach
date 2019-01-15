<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $table = "attendances";

   public function attendanceQr()
   {
      return $this->belongsTo(AttendanceQr::Class);
   }

    public function user_profile(){
        return $this->belongsTo('App\UserProfile', 'usr_id');
    }

}
