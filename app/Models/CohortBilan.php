<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CohortBilan extends Model
{
    use HasFactory;

    protected $table = 'cohort_bilans';

    protected $fillable = [
        'cohort_id',
        'knowledge_id',
        'grade',
    ];
}
