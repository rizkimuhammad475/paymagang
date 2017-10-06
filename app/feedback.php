<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class feedback extends Model
{
    protected $fillable = [
        'id','feedback_text','is_read','created_at','updated_at',
    ];
}
