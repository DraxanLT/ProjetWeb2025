<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommonLife extends Model
{
    protected $primaryKey = 'task_id';

    protected $table = 'common_life';

    protected $fillable = [
        'user_id',
        'title',
        'description'
    ];

    protected $casts = [
        'completed' => 'boolean',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class, 'task_id', 'task_id')->latest();
    }
}
