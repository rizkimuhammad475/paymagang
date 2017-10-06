<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
	protected $fillable = [
        'id','pay','pay_at','created_at','updated_at','student_id','user_id',
    ];
    
    public function users()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function students()
    {
        return $this->belongsTo(Student::class,'student_id');
    }
}
