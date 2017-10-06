<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public $timestamps = false;
   	protected $fillable = [
        'id','course_name',
    ];

    public function users()
    {
    	return $this->hasMany(User::class,'course_id','id');
    }

    public function divisions()
    {
    	return $this->hasMany(Division::class,'course_id','id');
    }
}
