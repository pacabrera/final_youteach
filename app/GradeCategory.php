<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GradeCategory extends Model
{
    protected $table = "grade_categories";
    protected $primaryKey = 'id';

    public function grade()
   {
      return $this->hasMany('App\Grade', 'grade_id', 'category');
   }
}
