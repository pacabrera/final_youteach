<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['title', 'venue', 'description','color','start_date','end_date'];
}
