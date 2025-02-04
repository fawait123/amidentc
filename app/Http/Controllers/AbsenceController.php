<?php

namespace App\Http\Controllers;

use App\Services\AbsenceService;
use Illuminate\Http\Request;

class AbsenceController extends Controller
{
    public function __construct(
        public AbsenceService $absenceService
    ) {}
    public function index(Request $request)
    {
        return view(
            'absence.index',
            [
                'participants' => $this->absenceService->data(date: $request->date ?? date('Y-m-d')),
                'posts' => $this->absenceService->posts(),
                'date' => $request->date ?? date('Y-m-d')
            ]
        );
    }
}
