<?php

namespace App\Services;

use App\Models\Answer;
use App\Models\Post;
use App\Models\Quiz;
use Illuminate\Support\Facades\Auth;

class QuizService
{

    public function __construct(
        protected Answer  $answer,
        protected Quiz $quiz
    ) {}

    public function data()
    {
        return $this->quiz->latest()->get();
    }

    public function correctAnswer(int $answer_id, int $question_id)
    {
        $answer = $this->answer->where('id', $answer_id)->where('question_id', $question_id)->first();

        return $answer && $answer->is_correct ? true : false;
    }


    public function getQuizAnswer()
    {
        return $this->quiz->select('quizzes.*')
            ->selectRaw("(select count(id) from answer_questions where quiz_id = quizzes.id and is_correct = 1 and user_id = " . Auth::guard('participant')->user()->id . ") as total")
            ->selectRaw('(select count(id) from questions where quiz_id = quizzes.id) as total_question')
            ->selectRaw("(select count(id) from answer_questions where quiz_id = quizzes.id and user_id = " . Auth::guard('participant')->user()->id . ") as total_submit")
            ->get();
    }
}
