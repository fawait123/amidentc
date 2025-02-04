<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Participant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class AuthController extends Controller
{
    public function index()
    {
        return Inertia::render('Auth/Login');
    }

    public function post(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $participant = Participant::updateOrCreate(
            [
                'name' => $request->name,
            ],
            [
                'name' => $request->name,
            ]
        );

        Auth::guard('participant')->login($participant);

        return redirect()->back();
    }

    public function logout(Request $request)
    {
        try {
            Auth::guard('participant')->logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->back();
        } catch (\Throwable $th) {
            dd($th);
        }
    }
}
