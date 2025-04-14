<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\CommonLife;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    // Store a comment linked to a task
    public function store(Request $request)
    {
        $validated = $request->validate([
            'task_id' => 'required|exists:common_life,task_id',
            'comment' => 'nullable|string|max:1000',
        ]);

        $commonLife = CommonLife::where('task_id', $validated['task_id'])->firstOrFail();

        Comment::create([
            'task_id' => $commonLife->task_id,
            'task_title' => $commonLife->title,
            'user_id' => Auth::id(),
            'comment' => $validated['comment'],
        ]);

        return redirect()->route('common-life.index');
    }
}
