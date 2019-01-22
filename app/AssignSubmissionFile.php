<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssignSubmissionFile extends Model
{
    public function assignSubmission()
  	{
    	return $this->belongsTo('App\AssignSubmission', 'submission_id');
  	}
}
