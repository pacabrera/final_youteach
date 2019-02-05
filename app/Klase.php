<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
class Klase extends Model
{
  use LogsActivity;

  protected $primaryKey = 'class_id';
  protected $table = 'classes';
  public $incrementing = false;
  
    protected $fillable = [
        'class_id',
        'instructor_id',
        'class_name',
        'subject_id',
        'section_id',
        'class_active'
    ];

  protected static $logAttributes = ['class_name'];

  public function subject(){
    return $this->belongsTo('App\Subject', 'subject_id', 'subject_id');
  }

  public function section(){
    return $this->belongsTo('App\Section', 'section_id', 'section_id');
  }

   public function class_members(){
        return $this->hasMany('App\ClassMembers', 'class_id', 'class_id');
    }

  public function user_profile(){
    return $this->belongsTo('App\UserProfile', 'instructor_id', 'id');
  }

    public function user(){
    return $this->belongsTo('App\User', 'instructor_id', 'id');
  }

    public function thread(){
        return $this->hasMany('App\Thread', 'class_id');
    }

        public function grade(){
        return $this->hasMany('App\Grade', 'class_id');
    }

    public function assignment(){
        return $this->hasMany('App\Assignment', 'class_id');
    }

    public function quiz_event(){
        return $this->hasMany('App\QuizEvent', 'class_id');
    }

    public function schedule(){
        return $this->belongsTo('App\Schedule', 'class_id', 'class_id');
    }

    

  
}

