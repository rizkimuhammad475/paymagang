<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
	protected $table	= 'feedbacks';
   	protected $fillable = [
        'id','feedback_text','is_read','created_at','updated_at',
    ];
}
