<?php

namespace App\Http\Controllers;

use App\Models\Knowledge;
use App\Models\Question;
use App\Models\StudentBilan;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class KnowledgeController extends Controller
{
    /**
     * Display the page
     *
     * @return Factory|View|Application|object
     */
    public function index() {

        $knowledges = Knowledge::all()->map(function ($knowledge) {
            $studentsBilans = StudentBilan::where('student_id', auth()->id())->where('knowledge_id', $knowledge->id)->first();

            $knowledge->answered = !is_null($studentsBilans);
            $knowledge->grade = $studentsBilans?->grade;

            return $knowledge;
        });

        return view('pages.knowledge.index', compact('knowledges'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'languages' => 'required|array|min:1',
            'questions_nbr' => 'required|integer|min:1',
            'answers_nbr' => 'required|integer|min:1',
        ]);

        // prompt to generate the test
        $languagesList = implode(', ', $validated['languages']);
        $prompt = "En français, génère un QCM avec {$validated['questions_nbr']} questions sur les langages : {$languagesList}.
        {$validated['answers_nbr']} propositions de réponse par questions (30% faciles, 40% moyennes, 30% difficiles) et avec une ou plusieurs bonnes réponses.
        Donne les résultats dans un JSON avec cette structure :
        [
          {
            \"question_text\": \"Question ?\",
            \"choices\": [\"Réponse A\", \"Réponse B\", \"Réponse C\", \"Réponse D\"],
            \"correct_answers\": [\"Réponse B\"],
            \"difficulty\": \"easy\" | \"medium\" | \"hard\"
          },
          ... (et on répète pour la prochaine question)
        ]
        N'explique rien, ne commente rien. Retourne que du JSON brut valide";

        // API key
        $key = 'jwVXdtjCOn2ohEb5FRAHk3T93KrFSJHe'; //env('MISTRAL_API_KEY'); // much more secure
        $response = Http::withOptions(['verify' => false,
        ])->withHeaders(['Authorization' => 'Bearer ' . $key, 'Content-Type' => 'application/json',])
            ->post('https://api.mistral.ai/v1/chat/completions', ['model' => 'mistral-small', 'messages' => [
                ['role' => 'user', 'content' => $prompt]
            ]
        ]);

        // get the answer from mistral
        $data = $response->json();
        $content = $data['choices'][0]['message']['content']; // Get the generated text (first answer)

        // Removes annoying characters
        $content = str_replace(['"""', "```json", "```"], '', trim($content));

        $questions = json_decode($content, true); // Json text to php array

        // store the knowledge test
        $knowledge = Knowledge::create([
            'title' => $validated['title'],
            'languages' => $validated['languages'],
            'questions_nbr' => $validated['questions_nbr'],
            'answers_nbr' => $validated['answers_nbr'],
        ]);

        // store questions
        foreach ($questions as $question) {
            Question::create([
                'knowledge_id' => $knowledge->id,
                'question_text' => $question['question_text'],
                'choices' => $question['choices'],
                'correct_answers' => $question['correct_answers'],
                'difficulty' => $question['difficulty'],
            ]);
        }

        return redirect()->route('knowledge.index');
    }

    public function fill(Knowledge $knowledge)
    {
        $user = auth()->user(); // get connected user

        $answered = StudentBilan::where('student_id', $user->id)->where('knowledge_id', $knowledge->id)->first(); // check if the bilan has already been answered

        if ($answered) { // redirect to the knowledge page if the bilan has been answered
            return view('pages.knowledge.already-submitted', ['knowledge' => $knowledge, 'grade' => $answered->grade,]);
        }

        $questions = $knowledge->questions;

        return view('pages.knowledge.answer', compact('knowledge', 'questions'));
    }

    public function submit(Request $request, Knowledge $knowledge)
    {
        $user = auth()->user(); // get connected user

        $answered = StudentBilan::where('student_id', $user->id)->where('knowledge_id', $knowledge->id)->exists();

        if ($answered) {
            return redirect()->route('knowledge.fill', $knowledge);
        }
        // get every answer submitted by the user
        $answers = $request->input('answers', []);
        $score = 0;
        $total = 0;

        // go through all questions
        foreach ($knowledge->questions as $question)
        {
            // get the answers given by the user for this question
            if (isset($answers[$question->id])) {
                $userAnswers = $answers[$question->id];
            } else {
                $userAnswers = [];
            }
            // get the correct answers
            $correctAnswers = $question->correct_answers;

            // Sort answers for btter comparisons
            sort($userAnswers);
            sort($correctAnswers);

            // increment the score if the user is correct
            if ($userAnswers === $correctAnswers) {
                $score++;
            }
            $total++;
        }
        // calculate the grade on 20, rounded to 2 (Ex : 14.50/20, 16.53/20)
        if ($total > 0) {
            $grade = round(($score / $total) * 20, 2);
        } else {
            $grade = 0;
        }

        // store the grade linked to the user and the bilan
        StudentBilan::create([
            'student_id' => $user->id,
            'knowledge_id' => $knowledge->id,
            'grade' => $grade,
        ]);

        return redirect()->route('knowledge.index', $knowledge);
    }

    public function destroy(Knowledge $knowledge)
    {
        $knowledge->delete();

        return redirect()->route('knowledge.index');
    }
}
