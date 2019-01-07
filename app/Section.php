<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    public function Klase(){
        return $this->hasMany('App\Klase', 'section_id', 'section_id');
    }

    public function sections(){
    	return $this;
    }
}
