<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class Post extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    
    protected $fillable = [
        'thread_id',
        'body',
        'usr_id',
    ];
    public function thread()
    {
        return $this->belongsTo('App\Thread', 'thread_id');
    }

    public function user(){
        return $this->belongsTo('App\User', 'usr_id', 'id');
    }

    public function user_profile(){
        return $this->belongsTo('App\UserProfile', 'usr_id', 'id');
    }

    public function postFiles()
    {
        return $this->hasMany('App\PostFiles', 'post_id');
    }

    public function postImages()
    {
        return $this->hasMany('App\PostImages', 'post_id', 'id');
    }
}
