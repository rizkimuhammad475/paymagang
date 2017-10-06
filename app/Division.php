<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'id','division_name','course_id'
    ];

    public function courses()
    {
        return $this->belongsTo(Course::class,'course_id');
    }

    public function grades()
    {
    	return $this->hasMany(Grade::class,'division_id','id');
    }
}
