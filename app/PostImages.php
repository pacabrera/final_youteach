<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostImages extends Model
{
  	public function post()
  	{
    	return $this->belongsTo('App\Post', 'post_id');
  	}
}
