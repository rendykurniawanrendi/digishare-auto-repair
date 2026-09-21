
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Akun - Auto Repair</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-100 text-slate-800">

    {{-- Navbar --}}
    <header class="fixed top-0 right-0 left-64 z-30 h-16 border-b border-slate-200 bg-white">
        <div class="flex h-full items-center justify-between px-8">

            <div>
                <h1 class="text-lg font-bold text-slate-800">
                    Edit Akun
                </h1>

                <p class="text-xs text-slate-500">
                    Mengubah data akun Admin atau Teknisi
                </p>
            </div>

            <div class="flex items-center gap-3">

                <div class="hidden text-right sm:block">
                    <p class="text-sm font-semibold text-slate-700">
                        {{ auth()->user()->name }}
                    </p>

                    <p class="text-xs text-slate-500">
                        Super Admin
                    </p>
                </div>

                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-slate-800 text-sm font-bold text-white">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>

            </div>

        </div>
    </header>


    {{-- Sidebar --}}
    @include('super_admin.components.sidebar')


    {{-- Main Content --}}
    <main class="ml-64 min-h-screen pt-16">

        <div class="p-8">

            {{-- Back --}}
            <div class="mb-6">

                <a
                    href="{{ route('super_admin.users.index') }}"
                    class="text-sm font-medium text-slate-500 transition hover:text-slate-800"
                >
                    ← Kembali ke Kelola Admin dan Teknisi
                </a>

            </div>


            {{-- Form Container --}}
            <div class="mx-auto max-w-4xl">

                <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

                    {{-- Header --}}
                    <div class="border-b border-slate-200 px-8 py-6">

                        <div class="flex items-center gap-4">

                            <div class="flex h-12 w-12 items-center justify-center rounded-full bg-slate-100 text-lg font-bold text-slate-700">
                                {{ strtoupper(substr($user->name, 0, 1)) }}
                            </div>

                            <div>

                                <h2 class="text-xl font-bold text-slate-800">
                                    Edit Data Akun
                                </h2>

                                <p class="mt-1 text-sm text-slate-500">
                                    Perbarui informasi akun {{ $user->name }}.
                                </p>

                            </div>

                        </div>

                    </div>


                    {{-- Form --}}
                    <form
                        method="POST"
                        action="{{ route('super_admin.users.update', $user) }}"
                    >

                        @csrf
                        @method('PUT')


                        <div class="space-y-6 px-8 py-8">

                            {{-- Validation Error --}}
                            @if($errors->any())

                                <div class="rounded-xl border border-red-200 bg-red-50 p-4">

                                    <div class="flex gap-3">

                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="h-5 w-5 flex-shrink-0 text-red-500"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                            stroke-width="2"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M12 9v2m0 4h.01M5.07 19h13.86c1.54 0 2.5-1.67 1.73-3L13.73 4c-.77-1.33-2.69-1.33-3.46 0L3.34 16c-.77 1.33-.77 3 1.73 3z"
                                            />
                                        </svg>

                                        <div>

                                            <p class="text-sm font-semibold text-red-700">
                                                Terdapat kesalahan pada data.
                                            </p>

                                            <ul class="mt-2 list-disc pl-5 text-sm text-red-600">

                                                @foreach($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach

                                            </ul>

                                        </div>

                                    </div>

                                </div>

                            @endif


                            {{-- Informasi Akun --}}
                            <div>

                                <h3 class="mb-4 text-sm font-bold uppercase tracking-wide text-slate-700">
                                    Informasi Akun
                                </h3>

                                <div class="grid gap-6 md:grid-cols-2">

                                    {{-- Nama --}}
                                    <div class="md:col-span-2">

                                        <label
                                            for="name"
                                            class="mb-2 block text-sm font-semibold text-slate-700"
                                        >
                                            Nama Lengkap
                                        </label>

                                        <input
                                            id="name"
                                            name="name"
                                            type="text"
                                            value="{{ old('name', $user->name) }}"
                                            required
                                            autofocus
                                            class="w-full rounded-xl border-slate-300 px-4 py-3 text-sm shadow-sm focus:border-slate-500 focus:ring-slate-500"
                                        >

                                        @error('name')
                                            <p class="mt-1 text-xs text-red-600">
                                                {{ $message }}
                                            </p>
                                        @enderror

                                    </div>


                                    {{-- Email --}}
                                    <div>

                                        <label
                                            for="email"
                                            class="mb-2 block text-sm font-semibold text-slate-700"
                                        >
                                            Email
                                        </label>

                                        <input
                                            id="email"
                                            name="email"
                                            type="email"
                                            value="{{ old('email', $user->email) }}"
                                            required
                                            class="w-full rounded-xl border-slate-300 px-4 py-3 text-sm shadow-sm focus:border-slate-500 focus:ring-slate-500"
                                        >

                                        @error('email')
                                            <p class="mt-1 text-xs text-red-600">
                                                {{ $message }}
                                            </p>
                                        @enderror

                                    </div>


                                    {{-- Role --}}
                                    <div>

                                        <label
                                            for="role"
                                            class="mb-2 block text-sm font-semibold text-slate-700"
                                        >
                                            Role Akun
                                        </label>

                                        <select
                                            id="role"
                                            name="role"
                                            required
                                            class="w-full rounded-xl border-slate-300 px-4 py-3 text-sm shadow-sm focus:border-slate-500 focus:ring-slate-500"
                                        >

                                            <option
                                                value="admin"
                                                {{ old('role', $user->role) === 'admin' ? 'selected' : '' }}
                                            >
                                                Admin
                                            </option>

                                            <option
                                                value="teknisi"
                                                {{ old('role', $user->role) === 'teknisi' ? 'selected' : '' }}
                                            >
                                                Teknisi
                                            </option>

                                        </select>

                                        @error('role')
                                            <p class="mt-1 text-xs text-red-600">
                                                {{ $message }}
                                            </p>
                                        @enderror

                                    </div>

                                </div>

                            </div>


                            {{-- Password --}}
                            <div class="border-t border-slate-200 pt-6">

                                <h3 class="mb-1 text-sm font-bold uppercase tracking-wide text-slate-700">
                                    Ubah Password
                                </h3>

                                <p class="mb-4 text-xs text-slate-500">
                                    Kosongkan password jika tidak ingin mengubah password akun.
                                </p>

                                <div class="grid gap-6 md:grid-cols-2">

                                    {{-- Password Baru --}}
                                    <div>

                                        <label
                                            for="password"
                                            class="mb-2 block text-sm font-semibold text-slate-700"
                                        >
                                            Password Baru
                                        </label>

                                        <input
                                            id="password"
                                            name="password"
                                            type="password"
                                            autocomplete="new-password"
                                            placeholder="Masukkan password baru"
                                            class="w-full rounded-xl border-slate-300 px-4 py-3 text-sm shadow-sm focus:border-slate-500 focus:ring-slate-500"
                                        >

                                        @error('password')
                                            <p class="mt-1 text-xs text-red-600">
                                                {{ $message }}
                                            </p>
                                        @enderror

                                    </div>


                                    {{-- Konfirmasi --}}
                                    <div>

                                        <label
                                            for="password_confirmation"
                                            class="mb-2 block text-sm font-semibold text-slate-700"
                                        >
                                            Konfirmasi Password Baru
                                        </label>

                                        <input
                                            id="password_confirmation"
                                            name="password_confirmation"
                                            type="password"
                                            autocomplete="new-password"
                                            placeholder="Ulangi password baru"
                                            class="w-full rounded-xl border-slate-300 px-4 py-3 text-sm shadow-sm focus:border-slate-500 focus:ring-slate-500"
                                        >

                                    </div>

                                </div>

                            </div>


                            {{-- Account Information --}}
                            <div class="rounded-xl border border-slate-200 bg-slate-50 p-5">

                                <div class="flex gap-3">

                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-5 w-5 flex-shrink-0 text-slate-500"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                        stroke-width="2"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M13 16h-1v-4h-1m1-4h.01M12 20a8 8 0 100-16 8 8 0 000 16z"
                                        />
                                    </svg>

                                    <div>

                                        <p class="text-sm font-semibold text-slate-700">
                                            Informasi Akun
                                        </p>

                                        <p class="mt-1 text-xs leading-5 text-slate-500">
                                            Role saat ini:
                                            <strong>
                                                {{ $user->role === 'admin' ? 'Admin' : 'Teknisi' }}
                                            </strong>
                                            <br>
                                            Akun ini dikelola oleh Super Admin.
                                        </p>

                                    </div>

                                </div>

                            </div>

                        </div>


                        {{-- Footer --}}
                        <div class="flex flex-col-reverse gap-3 border-t border-slate-200 bg-slate-50 px-8 py-5 sm:flex-row sm:justify-end">

                            <a
                                href="{{ route('super_admin.users.index') }}"
                                class="inline-flex items-center justify-center rounded-xl border border-slate-300 bg-white px-5 py-3 text-sm font-semibold text-slate-600 transition hover:bg-slate-100"
                            >
                                Batal
                            </a>

                            <button
                                type="submit"
                                class="inline-flex items-center justify-center gap-2 rounded-xl bg-slate-800 px-5 py-3 text-sm font-semibold text-white transition hover:bg-slate-700"
                            >

                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-5 w-5"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    stroke-width="2"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M5 13l4 4L19 7"
                                    />
                                </svg>

                                Simpan Perubahan

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </main>

</body>
</html>