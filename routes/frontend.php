<?php

use App\Http\Controllers\Frontend\AuthController;
use App\Http\Controllers\Frontend\EducationController;
use App\Http\Controllers\Frontend\QuizController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::group(['middleware' => 'guard.participant'], function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'post'])->name('login.post');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::group(['middleware' => 'auth.participant'], function () {
    Route::get('/', fn() => Inertia::render('Welcome/Welcome'))->name('welcome');
    Route::get('/chattbot', fn() => Inertia::render('Chattbot/Chattbot'))->name('chattbot');
    Route::get('/quiz', [QuizController::class, 'index'])->name('quiz');
    Route::get('/quiz/{quiz}', [QuizController::class, 'show'])->name('quiz.work');
    Route::post('/quiz', [QuizController::class, 'post'])->name('quiz.post');
    Route::get('/education', [EducationController::class, 'index'])->name('education');
    Route::get('/education/{education}', [EducationController::class, 'show'])->name('education.show');
});
