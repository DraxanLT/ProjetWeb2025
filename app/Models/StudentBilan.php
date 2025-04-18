<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentBilan extends Model
{
    protected $table = 'students_bilans';

    protected $fillable = [
        'student_id',
        'knowledge_id',
        'grade'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function knowledge()
    {
        return $this->belongsTo(Knowledge::class);
    }
}
