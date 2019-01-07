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
    ];
    public function post()
    {
        return $this->hasMany('App\Post', 'thread_id');
    }

    public function user(){
        return $this->belongsTo('App\User', 'usr_id', 'id');
    }
}
