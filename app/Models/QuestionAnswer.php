<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuestionAnswer extends Model
{
    protected $fillable  = ['question', 'uuid', 'answer', 'quote', 'code_block', 'heading', 'subject', 'language', 'status','like','dislike'];

    public function scopeGetAll($query)
    {
        return  $query;
    }
    public function scopeId($query, $uuid)
    {
        return $query->where('uuid', $uuid);
    }
    public function scopeLanguage($query)
    {
        return $query;
    }
   public function likes(){
    return $this->hasMany(LikeDislike::class, 'question_answer_id', 'id');
   }
   
}
