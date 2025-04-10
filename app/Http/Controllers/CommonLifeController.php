<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CommonLife;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CommonLifeController extends Controller
{
    use AuthorizesRequests;

    // Shows all tasks
    public function index()
    {
        $commonLifes = CommonLife::all();
        return view('pages.commonLife.index', compact('commonLifes'));
    }

    // Stores a new task
    public function store(Request $request)
    {
        $this->authorize('create', CommonLife::class);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
        ]);

        CommonLife::create([
            'user_id' => Auth::id(),
            'title' => $validated['title'],
            'description' => $validated['description'],
        ]);

        return redirect()->route('common-life.index');
    }


    // Deletes the selected task
    public function destroy(CommonLife $commonLife)
    {
        $this->authorize('delete', $commonLife); // Verify if the user can delete the task

        $commonLife->delete();
        return redirect()->route('common-life.index');
    }

    // Updates the selected task
    public function update(Request $request, CommonLife $commonLife)
    {
        $this->authorize('update', $commonLife); // Verify if the user can update the task

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
        ]);

        $commonLife->update([
            'title' => $validated['title'],
            'description' => $validated['description'],
        ]);

        return redirect()->route('common-life.index');
    }
}
