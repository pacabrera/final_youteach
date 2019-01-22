<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassMembers extends Model
{
    protected $table = "class_members";

    protected $fillable = [
        'class_id',
        'student_id'
    ];
    
    public function klase(){
        return $this->belongsTo('App\Klase', 'class_id', 'class_id');
    }

    public function user_profile(){
        return $this->belongsTo('App\UserProfile', 'student_id', 'id');
    }

    public function student_score(){
        return $this->hasOne('App\StudentScore', 'student_id', 'student_id');
    }

    public function quiz_event(){
        return $this->belongsTo('App\QuizEvent', 'quiz_event_id', 'quiz_event_id');
    }

}
