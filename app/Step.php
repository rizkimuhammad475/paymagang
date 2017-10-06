<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Step extends Model
{
	public $timestamps = false;
   	protected $fillable = [
        'id','step',
    ];

    public function grades()
    {
    	return $this->hasMany(Grade::class,'step_id','id');
    }
}
