<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuestionAnswer extends Model
{
    protected $fillable  = ['question', 'uuid', 'answer', 'quote', 'code_block', 'heading', 'subject', 'language', 'status'];

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

   
}
