<?php

namespace App\Http\Controllers;

use App\Models\AnswerQuestion;
use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Inertia\Inertia;

class QuizController extends Controller
{
    public function index()
    {
        return Inertia::render('Quiz/Quiz', [
            'quizes' => Quiz::latest()->get(),
        ]);
    }

    public function show(Quiz $quiz)
    {
        return Inertia::render('Quiz/WorkQuiz', [
            'quiz' => $quiz,
            'questions' => Question::with('answers')->paginate(1),
        ]);
    }

    public function post(Request $request)
    {
        $request->validate([
            'answer_id' => 'required',
        ]);

        AnswerQuestion::updateOrCreate(
            [
                'answer_id' => $request->answer_id,
                'quiz_id' => $request->quiz_id,
                'question_id' => $request->question_id,
                'user_id' => 1,
            ],
            [
                'answer_id' => $request->answer_id,
                'quiz_id' => $request->quiz_id,
                'question_id' => $request->question_id,
                'user_id' => 1,
            ]
        );

        return redirect()->back(status: 302);
    }
}
