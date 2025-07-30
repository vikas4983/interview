<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LikeDislike extends Model
{
    protected $fillable = ['question_answer_id', 'action', 'ip'];
}
