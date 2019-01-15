<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttendanceQr extends Model
{
   	public function attendance()
   {
      return $this->hasMany(Attendance::Class, 'qr_id');
   }
}
