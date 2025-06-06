<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'task_id',
        'task_title',
        'task_description',
        'user_id',
        'comment',
    ];

    // Link with the task
    public function commonLife()
    {
        return $this->belongsTo(CommonLife::class);
    }

    // Link with the user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
