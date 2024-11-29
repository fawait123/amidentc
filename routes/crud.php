<?php

use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {
    Route::resource('participants', ParticipantController::class);
    Route::resource('users', UserController::class);
    Route::resource('posts', PostController::class);
});
