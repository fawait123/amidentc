<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AnswerQuestion;
use App\Models\Question;
use App\Models\Quiz;
use App\Services\QuizService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class QuizController extends Controller
{
    public function __construct(
        public QuizService $quizService
    ) {}
    public function index()
    {
        return Inertia::render('Quiz/Quiz', [
            'quizes' => fn() => $this->quizService->getQuizAnswer(),
        ]);
    }

    public function show(Quiz $quiz)
    {
        return Inertia::render('Quiz/WorkQuiz', [
            'quiz' => $quiz,
            'questions' => Question::selectRaw("(select answer_id from answer_questions where quiz_id = $quiz->id and question_id = questions.id and user_id = " . Auth::guard('participant')->user()->id . " limit 1) answer_id")
                ->selectRaw("questions.*")
                ->where('quiz_id', $quiz->id)
                ->with('answers')
                ->paginate(1),
        ]);
    }

    public function post(Request $request)
    {
        $request->validate([
            'answer_id' => 'required',
        ]);

        AnswerQuestion::updateOrCreate(
            [
                'quiz_id' => $request->quiz_id,
                'question_id' => $request->question_id,
                'user_id' => Auth::guard('participant')->user()->id ?? 0,
            ],
            [
                'answer_id' => $request->answer_id,
                'quiz_id' => $request->quiz_id,
                'question_id' => $request->question_id,
                'user_id' => Auth::guard('participant')->user()->id ?? 0,
                'is_correct' => $this->quizService->correctAnswer(answer_id: $request->answer_id, question_id: $request->question_id),
            ]
        );

        return redirect()->back(status: 302);
    }
}
