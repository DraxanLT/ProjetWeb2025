<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Knowledge extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'languages',
        'questions_nbr',
        'answers_nbr',
    ];

    protected $casts = [
        'languages' => 'array',
    ];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function cohorts()
    {
        return $this->belongsToMany(Cohort::class, 'cohort_bilans');
    }
}
