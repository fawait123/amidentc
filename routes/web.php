<?php

use App\Http\Controllers\ProfileController;
use App\Models\Participant;
use App\Models\Post;
use App\Models\Quiz;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    $data = [
        'total_user' => User::count(),
        'total_quiz' => Quiz::count(),
        'total_participant' => Participant::count(),
        'total_education' => Post::count(),
    ];

    return view('dashboard', $data);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/crud.php';
require __DIR__ . '/frontend.php';
