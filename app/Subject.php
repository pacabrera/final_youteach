<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $table = "subjects";
    protected $primaryKey = "subject_id";
    public $timestamps = false;

    protected $fillable = [
        'subject_code',
        'subject_desc'
    ];

    public function Klase(){
        return $this->hasMany('App\Klase', 'subject_id', 'subject_id');
    }
}
