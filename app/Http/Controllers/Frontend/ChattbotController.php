<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Services\ChattBotService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ChattbotController extends Controller
{
    public function __construct(
        public ChattBotService $chattbotService
    ) {}
    public function index()
    {
        return Inertia::render('Chattbot/Chattbot', [
            'data' => fn() => $this->chattbotService->data()
        ]);
    }

    public function message(Request $request)
    {
        $this->chattbotService->message($request->content);

        return redirect()->back();
    }
}
