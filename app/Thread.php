<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
	    protected $fillable = [
        'title',
        'class_id',
        'usr_id',
        'assign_id',
        'quiz_id',
    ];
    public function post()
    {
        return $this->hasMany('App\Post', 'thread_id');
    }

    public function user(){
        return $this->belongsTo('App\User', 'usr_id', 'id');
    }
    
    public function klase(){
        return $this->belongsTo('App\Klase', 'class_id');
    }


}
