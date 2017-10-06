<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
	   public $timestamps = false;
    protected $fillable = [
        'id','created_at','updated_at','step_id','division_id',
    ];

    public function students()
    {
    	return $this->hasMany(Student::class,'grade_id','id');
    }

    public function divisions()
    {
        return $this->belongsTo(Division::class,'division_id');
    }

    public function steps()
    {
        return $this->belongsTo(Step::class,'step_id');
    }
}
