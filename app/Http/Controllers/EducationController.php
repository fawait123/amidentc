<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Inertia\Inertia;

class EducationController extends Controller
{
    public function index()
    {
        return Inertia::render('Education/Education', [
            'educations' => fn () => Post::latest()->get(),
        ]);
    }

    public function show(Post $education)
    {
        return Inertia::render('Education/EducationDetail', [
            'education' => $education,
        ]);
    }
}
