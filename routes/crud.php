<?php

use App\Http\Controllers\AbsenceController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {
    Route::resource('participants', ParticipantController::class);
    Route::resource('users', UserController::class);
    Route::resource('posts', PostController::class);
    Route::resource('quizzes', QuizController::class);
    Route::resource('questions', QuestionController::class);
    Route::get('absence', [AbsenceController::class, 'index'])->name('absence.index');
});
