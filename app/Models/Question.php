<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'knowledge_id',
        'question_text',
        'choices',
        'correct_answers',
        'difficulty',
    ];

    protected $casts = [
        'choices' => 'array',
        'correct_answers' => 'array',
    ];

    public function knowledges()
    {
        return $this->belongsTo(Knowledge::class);
    }
}
