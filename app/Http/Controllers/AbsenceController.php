<?php

namespace App\Http\Controllers;

use App\Services\AbsenceService;
use Illuminate\Http\Request;

class AbsenceController extends Controller
{
    public function __construct(
        public AbsenceService $absenceService
    ) {}
    public function index()
    {
        return view(
            'absence.index',
            [
                'participants' => $this->absenceService->data(),
                'posts' => $this->absenceService->posts(),
            ]
        );
    }
}
