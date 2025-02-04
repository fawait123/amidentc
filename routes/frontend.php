<?php

use App\Http\Controllers\Frontend\AuthController;
use App\Http\Controllers\Frontend\ChattbotController;
use App\Http\Controllers\Frontend\EducationController;
use App\Http\Controllers\Frontend\QuizController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::group(['middleware' => 'guard.participant'], function () {
    Route::get('/login', [AuthController::class, 'index'])->name('frontend.login');
    Route::post('/login', [AuthController::class, 'post'])->name('frontend.login.post');
});

Route::group(['middleware' => 'auth.participant'], function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('frontend.logout');
    Route::get('/', fn() => Inertia::render('Welcome/Welcome'))->name('welcome');
    Route::get('/chattbot', [ChattbotController::class, 'index'])->name('chattbot');
    Route::post('/chattbot', [ChattbotController::class, 'message'])->name('chattbot.message');
    Route::get('/quiz', [QuizController::class, 'index'])->name('quiz');
    Route::get('/quiz/{quiz}', [QuizController::class, 'show'])->name('quiz.work');
    Route::post('/quiz', [QuizController::class, 'post'])->name('quiz.post');
    Route::get('/education', [EducationController::class, 'index'])->name('education');
    Route::get('/education/{education}', [EducationController::class, 'show'])->name('education.show');
});
