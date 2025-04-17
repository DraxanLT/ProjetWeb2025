<?php

namespace App\Http\Controllers;

use App\Models\Knowledge;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class KnowledgeController extends Controller
{
    /**
     * Display the page
     *
     * @return Factory|View|Application|object
     */
    public function index() {
        return view('pages.knowledge.index');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'languages' => 'required|array|min:1',
            'questions_nbr' => 'required|integer|min:1',
            'answers_nbr' => 'required|integer|min:2',
        ]);

        $bilan = Knowledge::create([
            'title' => $validated['title'],
            'languages' => $validated['languages'],
            'question_count' => $validated['question_count'],
            'answers_per_question' => $validated['answers_per_question'],
        ]);

        // Mistral ici

        return redirect()->route('knowledge.index', $bilan);
    }
}
