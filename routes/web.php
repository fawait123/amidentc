<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', fn () => Inertia::render('Welcome/Welcome'))->name('welcome');
Route::get('/login', fn () => Inertia::render('Auth/Login'))->name('login');
Route::get('/chattbot', fn () => Inertia::render('Chattbot/Chattbot'))->name('chattbot');
Route::get('/quiz', fn () => Inertia::render('Quiz/Quiz'))->name('quiz');
Route::get('/quiz/{question}', fn () => Inertia::render('Quiz/WorkQuiz'))->name('quiz.work');
Route::get('/education', fn () => Inertia::render('Education/Education'))->name('education');
Route::get('/education/{education}', fn () => Inertia::render('Education/EducationDetail'))->name('education.show');
