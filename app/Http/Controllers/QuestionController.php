<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\QuestionRequest;
use App\Models\Answer;
use App\Models\Quiz;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $questions = Quiz::with('questions')->paginate();

        return view('question.index', compact('questions'))
            ->with('i', ($request->input('page', 1) - 1) * $questions->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $question = new Question();
        $quiz = Quiz::all()->pluck('title', 'id');
        return view('question.create', compact('question', 'quiz'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(QuestionRequest $request): RedirectResponse
    {
        DB::beginTransaction();
        try {
            foreach ($request->question_text as $index => $value) {
                $question = Question::create([
                    'quiz_id' => $request->quiz_id,
                    'question_text' => $value
                ]);

                Answer::create([
                    'question_id' => $question->id,
                    'answer_text' => $request->options[$index]['option_1'],
                    'is_correct' => $request->answer[$index] == "option_1" ? true : false
                ]);

                Answer::create([
                    'question_id' => $question->id,
                    'answer_text' => $request->options[$index]['option_2'],
                    'is_correct' => $request->answer[$index] == "option_2" ? true : false
                ]);

                Answer::create([
                    'question_id' => $question->id,
                    'answer_text' => $request->options[$index]['option_3'],
                    'is_correct' => $request->answer[$index] == "option_3" ? true : false
                ]);

                Answer::create([
                    'question_id' => $question->id,
                    'answer_text' => $request->options[$index]['option_4'],
                    'is_correct' => $request->answer[$index] == "option_4" ? true : false
                ]);
            }

            DB::commit();
            return Redirect::route('questions.index')
                ->with('success', 'Question created successfully.');
        } catch (\Throwable $th) {
            DB::rollBack();
            return Redirect::route('questions.index')
                ->with('error', 'Question created failed.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $question = Quiz::find($id);

        return view('question.show', compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $question = Quiz::find($id);
        $quiz = Quiz::all()->pluck('title', 'id');

        return view('question.edit', compact('question', 'quiz'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(QuestionRequest $request, $id): RedirectResponse
    {
        DB::beginTransaction();
        try {
            Answer::whereIn('question_id', Question::where('quiz_id', $id)->pluck('id')->toArray())->delete();
            Question::where('quiz_id', $id)->delete();
            foreach ($request->question_text as $index => $value) {
                $question = Question::create([
                    'quiz_id' => $request->quiz_id,
                    'question_text' => $value
                ]);

                Answer::create([
                    'question_id' => $question->id,
                    'answer_text' => $request->options[$index]['option_1'],
                    'is_correct' => $request->answer[$index] == "option_1" ? true : false
                ]);

                Answer::create([
                    'question_id' => $question->id,
                    'answer_text' => $request->options[$index]['option_2'],
                    'is_correct' => $request->answer[$index] == "option_2" ? true : false
                ]);

                Answer::create([
                    'question_id' => $question->id,
                    'answer_text' => $request->options[$index]['option_3'],
                    'is_correct' => $request->answer[$index] == "option_3" ? true : false
                ]);

                Answer::create([
                    'question_id' => $question->id,
                    'answer_text' => $request->options[$index]['option_4'],
                    'is_correct' => $request->answer[$index] == "option_4" ? true : false
                ]);
            }

            DB::commit();
            return Redirect::route('questions.index')
                ->with('success', 'Question created successfully.');
        } catch (\Throwable $th) {
            dd($th);
            DB::rollBack();
            return Redirect::route('questions.index')
                ->with('error', 'Question created failed.');
        }
    }

    public function destroy($id): RedirectResponse
    {
        Answer::whereIn('question_id', Question::where('quiz_id', $id)->pluck('id')->toArray())->delete();
        Question::where('quiz_id', $id)->delete();

        return Redirect::route('questions.index')
            ->with('success', 'Question deleted successfully');
    }
}
