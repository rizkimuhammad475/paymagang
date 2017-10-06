<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'id','name','gender','nis','created_at','updated_at','grade_id',
    ];

    public function grades()
    {
        return $this->belongsTo(Grade::class,'grade_id');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class,'student_id','id');
    }
}
