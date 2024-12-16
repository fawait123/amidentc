<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Absence;
use App\Models\Post;
use App\Services\EducationService;
use Illuminate\Support\Facades\Auth;
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
        Absence::updateOrCreate(
            [
                'title' => $education,
                'date' => date('Y-m-d'),
                'participant_id' =>  Auth::guard('participant')->user()->id ?? 0
            ],
            [
                'title' => $education,
                'date' => date('Y-m-d'),
                'participant_id' => Auth::guard('participant')->user()->id ?? 0,
            ]
        );
        return Inertia::render('Education/EducationDetail', [
            'education' => $education,
        ]);
    }
}
