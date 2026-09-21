<?php

namespace App\Http\Controllers\SuperAdmin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuperAdminLoginController extends Controller
{
    public function create()
    {
        return view('auth.super-admin-login');
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
            'role' => 'super_admin',
        ], $request->boolean('remember'))) {
            $request->session()->regenerate();

            return redirect()->intended('/super-admin/dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password Super Admin tidak sesuai.',
        ])->onlyInput('email');
    }
}
