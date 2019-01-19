<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Section extends Model
{

	 use LogsActivity;

    public function Klase(){
        return $this->hasMany('App\Klase', 'section_id', 'section_id');
    }

    public function sections(){
    	return $this;
    }

     protected $fillable = ['section_name'];
    protected static $logAttributes = ['section_name'];
}
