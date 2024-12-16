<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Services\EducationService;
use Inertia\Inertia;

class EducationController extends Controller
{
    public function __construct(
        public EducationService $education
    ) {}
    public function index()
    {
        return Inertia::render('Education/Education', [
            'educations' => fn() => $this->education->data(),
        ]);
    }

    public function show(string $education)
    {
        return Inertia::render('Education/EducationDetail', [
            'education' => $education,
        ]);
    }
}
