<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CommonLife;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CommonLifeController extends Controller
{
    use AuthorizesRequests;
    public function index()
    {
        $commonLifes = CommonLife::all();
        return view('pages.commonLife.index', compact('commonLifes'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
        ]);

        CommonLife::create([
            'user_id' => Auth::id(),
            'title' => $validated['title'],
            'description' => $validated['description'],
        ]);

        return redirect()->route('common-life.index')->with('success', 'Tâche ajoutée avec succès');
    }


    public function destroy(CommonLife $commonLife)
    {
        $this->authorize('delete', $commonLife);

        $commonLife->delete();
        return redirect()->route('common-life.index');
    }
}
