<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();

        $user->fill($request->validated());

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        // Super Admin
        if ($user->role === 'super_admin') {
            return redirect()
                ->route('super_admin.dashboard')
                ->with('success', 'Profil Super Admin berhasil diperbarui.');
        }

        // Admin
        if ($user->role === 'admin') {
            return redirect()
                ->route('admin.dashboard')
                ->with('success', 'Profil Admin berhasil diperbarui.');
        }

        // Teknisi
        if ($user->role === 'teknisi') {
            return redirect()
                ->route('teknisi.dashboard')
                ->with('success', 'Profil Teknisi berhasil diperbarui.');
        }

        return redirect()
            ->route('login')
            ->with('success', 'Profil berhasil diperbarui.');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();
        $role = $user->role;

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        if ($role === 'teknisi') {
            return redirect()->route('teknisi.login');
        }

        if ($role === 'admin') {
            return redirect()->route('admin.login');
        }

        return redirect()->route('login');
    }
}
