<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\QuizRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $quizzes = Quiz::paginate();

        return view('quiz.index', compact('quizzes'))
            ->with('i', ($request->input('page', 1) - 1) * $quizzes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $quiz = new Quiz();

        return view('quiz.create', compact('quiz'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(QuizRequest $request): RedirectResponse
    {
        Quiz::create($request->validated());

        return Redirect::route('quizzes.index')
            ->with('success', 'Quiz created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $quiz = Quiz::find($id);

        return view('quiz.show', compact('quiz'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $quiz = Quiz::find($id);

        return view('quiz.edit', compact('quiz'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(QuizRequest $request, Quiz $quiz): RedirectResponse
    {
        $quiz->update($request->validated());

        return Redirect::route('quizzes.index')
            ->with('success', 'Quiz updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Quiz::find($id)->delete();

        return Redirect::route('quizzes.index')
            ->with('success', 'Quiz deleted successfully');
    }
}
