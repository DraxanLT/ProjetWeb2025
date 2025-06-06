<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cohort extends Model
{
    protected $table = 'cohorts';

    protected $fillable = [
        'school_id',
        'name',
        'description',
        'start_date',
        'end_date'
    ];

    public function students()
    {
        return $this->belongsToMany(User::class, 'cohorts_students', 'cohort_id', 'student_id');
    }
}
