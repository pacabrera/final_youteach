<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssignScore extends Model
{
        protected $primaryKey = null;
    public $timestamps = false;
    public $incrementing = false;

    protected $fillable = [
        'student_id',
        'assign_id',
        'score',
        'recorded_on'
    ];

        public function user_profile(){
        return $this->belongsTo('App\UserProfile', 'student_id', 'id');
    }
}
