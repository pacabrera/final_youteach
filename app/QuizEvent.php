<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuizEvent extends Model
{
    protected $table = "quiz_events";
    protected $primaryKey = "quiz_event_id";
    // public $timestamps = false;


    protected $fillable = [
        'quiz_event_name',
        'questionnaire_id',
        'class_id',
        'quiz_event_status'
    ];

    public function klase(){
        return $this->hasOne('App\Klase', 'class_id', 'class_id');
    }

    public function subject(){
        return $this->hasOne('App\Subject', 'subject_id', 'subject_id');
    }

    public function user(){
        return $this->hasOne('App\User', 'id', 'instructor_id');
    }

    public function questionnaire(){
        return $this->hasOne('App\Questionnaire', 'questionnaire_id', 'questionnaire_id');
    }
    public function class_members(){
        return $this->hasOne('App\ClassMembers', 'class_id', 'class_id');
    }
}
