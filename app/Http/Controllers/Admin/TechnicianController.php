<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class TechnicianController extends Controller
{
    /**
     * Menampilkan daftar teknisi.
     */
    public function index(Request $request)
    {
        $search = trim($request->input('search', ''));

        $technicians = User::query()
            ->where('role', 'teknisi')
            ->when($search !== '', function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', '%' . $search . '%')
                        ->orWhere('email', 'like', '%' . $search . '%');
                });
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.technicians.index', compact(
            'technicians',
            'search'
        ));
    }

    /**
     * Menampilkan form tambah teknisi.
     */
    public function create()
    {
        return view('admin.technicians.create');
    }

    /**
     * Menyimpan teknisi baru.
     */
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
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => 'teknisi',
        ]);

        return redirect()
            ->route('admin.technicians.index')
            ->with('success', 'Teknisi berhasil ditambahkan.');
    }

    /**
     * Menampilkan form edit teknisi.
     */
    public function edit(User $technician)
    {
        abort_unless($technician->role === 'teknisi', 404);

        return view('admin.technicians.edit', compact('technician'));
    }

    /**
     * Mengubah data teknisi.
     */
    public function update(Request $request, User $technician)
    {
        abort_unless($technician->role === 'teknisi', 404);

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
                Rule::unique('users', 'email')->ignore($technician->id),
            ],

            'password' => [
                'nullable',
                'confirmed',
                Password::defaults(),
            ],
        ]);

        $technician->name = $validated['name'];
        $technician->email = $validated['email'];

        if (!empty($validated['password'])) {
            $technician->password = Hash::make($validated['password']);
        }

        $technician->save();

        return redirect()
            ->route('admin.technicians.index')
            ->with('success', 'Data teknisi berhasil diperbarui.');
    }

    /**
     * Menghapus teknisi.
     */
    public function destroy(User $technician)
    {
        abort_unless($technician->role === 'teknisi', 404);

        $technician->delete();

        return redirect()
            ->route('admin.technicians.index')
            ->with('success', 'Teknisi berhasil dihapus.');
    }
}
