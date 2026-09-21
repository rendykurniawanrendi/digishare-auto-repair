<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UserManagementController extends Controller
{
    public function index(Request $request)
    {
        $search = trim($request->input('search', ''));
        $role = $request->input('role', '');

        $users = User::query()
            ->whereIn('role', ['admin', 'teknisi'])
            ->when($search !== '', function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', '%' . $search . '%')
                        ->orWhere('email', 'like', '%' . $search . '%');
                });
            })
            ->when(
                in_array($role, ['admin', 'teknisi'], true),
                function ($query) use ($role) {
                    $query->where('role', $role);
                }
            )
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('super_admin.users.index', compact(
            'users',
            'search',
            'role'
        ));
    }

    public function create()
    {
        return view('super_admin.users.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                'unique:users,email',
            ],

            'password' => [
                'required',
                'confirmed',
                Password::defaults(),
            ],

            'role' => [
                'required',
                Rule::in(['admin', 'teknisi']),
            ],
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => $validated['role'],
        ]);

        return redirect()
            ->route('super_admin.users.index')
            ->with('success', 'Akun berhasil ditambahkan.');
    }

    public function edit(User $user)
    {
        abort_unless(
            in_array($user->role, ['admin', 'teknisi'], true),
            404
        );

        return view('super_admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        abort_unless(
            in_array($user->role, ['admin', 'teknisi'], true),
            404
        );

        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($user->id),
            ],

            'password' => [
                'nullable',
                'confirmed',
                Password::defaults(),
            ],

            'role' => [
                'required',
                Rule::in(['admin', 'teknisi']),
            ],
        ]);

        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->role = $validated['role'];

        if (!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }

        $user->save();

        return redirect()
            ->route('super_admin.users.index')
            ->with('success', 'Data akun berhasil diperbarui.');
    }

    public function destroy(User $user)
    {
        abort_unless(
            in_array($user->role, ['admin', 'teknisi'], true),
            404
        );

        $user->delete();

        return redirect()
            ->route('super_admin.users.index')
            ->with('success', 'Akun berhasil dihapus.');
    }
}
