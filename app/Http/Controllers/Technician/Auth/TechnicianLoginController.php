<?php

namespace App\Http\Controllers\Technician\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TechnicianLoginController extends Controller
{
    public function create()
    {
        return view('auth.technician-login');
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt([
            'email' => $credentials['email'],
            'password' => $credentials['password'],
            'role' => 'teknisi',
        ], $request->boolean('remember'))) {
            $request->session()->regenerate();

            return redirect()->intended('/teknisi/dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password Teknisi tidak sesuai.',
        ])->onlyInput('email');
    }
}
