<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $table = "user_profiles";
    protected $primaryKey = "id";

    protected $fillable = [
        'id',
        'given_name',
        'family_name',
        'middle_name',
        'ext_name',
        'gender',
        'profile_pic'

    ];

    public function user(){
        return $this->belongsTo('App\User', 'id', 'id');
    }

    public function posts()
    {
        return $this->hasMany('App\User', 'id', 'id');
    }

    public function classmembers()
    {
        return $this->hasMany('App\ClassMembers', 'student_id', 'id');
    }

    public function klase()
    {
        return $this->hasMany('App\Klase', 'instructor_id', 'id');
    }

    public function attendance()
    {
        return $this->hasMany('App\Attendance', 'usr_id');
    }

}
