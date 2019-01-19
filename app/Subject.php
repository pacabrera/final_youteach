<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Subject extends Model
{
    use LogsActivity;
    protected static $logAttributes = ['subject_code'];
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
