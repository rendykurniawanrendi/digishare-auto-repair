<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Teknisi - Auto Repair</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-100 text-slate-800">

    {{-- TOP NAVBAR --}}
    <header class="fixed left-0 right-0 top-0 z-50 h-16 border-b border-slate-200 bg-white">
        <div class="flex h-full items-center justify-between px-6">

            {{-- BRAND --}}
            <div class="flex items-center gap-3">

                <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-blue-600 text-white">
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
                            d="M10.5 6h3m-6.75 4.5h9.5M7.5 15h9m-7.5 3h3m6.75-12.75a9 9 0 11-12.728 0A9 9 0 0118.75 5.25z"
                        />
                    </svg>
                </div>

                <div>
                    <h1 class="text-sm font-bold text-slate-800">
                        Auto Repair
                    </h1>

                    <p class="text-xs text-slate-400">
                        Admin System
                    </p>
                </div>

            </div>


            {{-- USER --}}
            <div class="flex items-center gap-3">

                <div class="hidden text-right sm:block">
                    <p class="text-sm font-semibold text-slate-700">
                        {{ Auth::user()->name }}
                    </p>

                    <p class="text-xs text-slate-400">
                        Administrator
                    </p>
                </div>

                <div class="flex h-9 w-9 items-center justify-center rounded-full bg-blue-100 text-sm font-bold text-blue-700">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>

            </div>

        </div>
    </header>


    {{-- SIDEBAR --}}
    @include('admin.components.sidebar')


    {{-- MAIN CONTENT --}}
    <main class="ml-64 min-h-screen bg-slate-100 pt-16">

        <div class="w-full px-6 py-8 lg:px-10 xl:px-12">

            {{-- HEADER --}}
            <div class="mb-7">

                <a
                    href="{{ route('admin.technicians.index') }}"
                    class="mb-4 inline-flex items-center gap-2 text-sm font-medium text-slate-500 transition hover:text-blue-600"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-4 w-4"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M15 19l-7-7 7-7"
                        />
                    </svg>

                    Kembali ke Daftar Teknisi
                </a>

                <p class="mb-1 text-sm font-medium text-blue-600">
                    Manajemen Teknisi
                </p>

                <h2 class="text-2xl font-bold tracking-tight text-slate-800">
                    Tambah Teknisi
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    Buat akun baru untuk teknisi Auto Repair.
                </p>

            </div>


            {{-- FORM CONTAINER --}}
            <div class="w-full overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">

                {{-- HEADER FORM --}}
                <div class="border-b border-slate-200 px-6 py-5 lg:px-8">

                    <div class="flex items-center gap-4">

                        <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-blue-100 text-blue-600">

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-6 w-6"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M18 9a6 6 0 11-12 0 6 6 0 0112 0z"
                                />

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M3 21a9 9 0 0118 0"
                                />
                            </svg>

                        </div>

                        <div>

                            <h3 class="text-base font-semibold text-slate-800">
                                Informasi Akun Teknisi
                            </h3>

                            <p class="text-sm text-slate-500">
                                Masukkan data akun yang akan digunakan teknisi untuk login.
                            </p>

                        </div>

                    </div>

                </div>


                {{-- FORM --}}
                <form
                    method="POST"
                    action="{{ route('admin.technicians.store') }}"
                    class="p-6 lg:p-8"
                >

                    @csrf


                    {{-- TWO COLUMNS --}}
                    <div class="grid grid-cols-1 gap-8 lg:grid-cols-2">

                        {{-- LEFT --}}
                        <div>

                            <div class="mb-5">

                                <h4 class="text-sm font-semibold text-slate-800">
                                    Informasi Teknisi
                                </h4>

                                <p class="mt-1 text-xs text-slate-500">
                                    Informasi dasar teknisi yang akan dibuat.
                                </p>

                            </div>


                            {{-- NAME --}}
                            <div>

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
                                    value="{{ old('name') }}"
                                    required
                                    autofocus
                                    placeholder="Contoh: Budi Santoso"
                                    class="w-full rounded-lg border border-slate-300 px-4 py-2.5 text-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                                >

                                @error('name')
                                    <p class="mt-1.5 text-xs text-red-600">
                                        {{ $message }}
                                    </p>
                                @enderror

                            </div>


                            {{-- ROLE --}}
                            <div class="mt-6">

                                <label class="mb-2 block text-sm font-semibold text-slate-700">
                                    Role Akun
                                </label>

                                <div class="flex items-center gap-3 rounded-lg border border-slate-200 bg-slate-50 px-4 py-3">

                                    <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-blue-100 text-blue-600">

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
                                                d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z"
                                            />

                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M4.5 20.25a8.25 8.25 0 0115 0"
                                            />
                                        </svg>

                                    </div>

                                    <div>

                                        <p class="text-sm font-semibold text-slate-700">
                                            Teknisi
                                        </p>

                                        <p class="text-xs text-slate-400">
                                            Role ditentukan otomatis oleh sistem.
                                        </p>

                                    </div>

                                </div>

                            </div>

                        </div>


                        {{-- RIGHT --}}
                        <div>

                            <div class="mb-5">

                                <h4 class="text-sm font-semibold text-slate-800">
                                    Informasi Login
                                </h4>

                                <p class="mt-1 text-xs text-slate-500">
                                    Data yang digunakan teknisi untuk masuk ke sistem.
                                </p>

                            </div>


                            {{-- EMAIL --}}
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
                                    value="{{ old('email') }}"
                                    required
                                    placeholder="Contoh: teknisi@email.com"
                                    class="w-full rounded-lg border border-slate-300 px-4 py-2.5 text-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                                >

                                @error('email')
                                    <p class="mt-1.5 text-xs text-red-600">
                                        {{ $message }}
                                    </p>
                                @enderror

                            </div>


                            {{-- PASSWORD --}}
                            <div class="mt-6">

                                <label
                                    for="password"
                                    class="mb-2 block text-sm font-semibold text-slate-700"
                                >
                                    Password
                                </label>

                                <input
                                    id="password"
                                    name="password"
                                    type="password"
                                    required
                                    placeholder="Masukkan password"
                                    class="w-full rounded-lg border border-slate-300 px-4 py-2.5 text-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                                >

                                @error('password')
                                    <p class="mt-1.5 text-xs text-red-600">
                                        {{ $message }}
                                    </p>
                                @enderror

                            </div>


                            {{-- CONFIRM PASSWORD --}}
                            <div class="mt-6">

                                <label
                                    for="password_confirmation"
                                    class="mb-2 block text-sm font-semibold text-slate-700"
                                >
                                    Konfirmasi Password
                                </label>

                                <input
                                    id="password_confirmation"
                                    name="password_confirmation"
                                    type="password"
                                    required
                                    placeholder="Ulangi password"
                                    class="w-full rounded-lg border border-slate-300 px-4 py-2.5 text-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                                >

                            </div>

                        </div>

                    </div>


                    {{-- INFO --}}
                    <div class="mt-8 rounded-lg border border-blue-100 bg-blue-50 px-4 py-3">

                        <div class="flex gap-3">

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="mt-0.5 h-5 w-5 shrink-0 text-blue-600"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                />
                            </svg>

                            <p class="text-sm text-blue-700">
                                Akun yang dibuat melalui halaman ini akan otomatis memiliki role
                                <strong>Teknisi</strong>.
                            </p>

                        </div>

                    </div>


                    {{-- BUTTON --}}
                    <div class="mt-8 flex flex-col-reverse gap-3 border-t border-slate-200 pt-6 sm:flex-row sm:justify-end">

                        <a
                            href="{{ route('admin.technicians.index') }}"
                            class="rounded-lg border border-slate-300 bg-white px-5 py-2.5 text-center text-sm font-semibold text-slate-600 transition hover:bg-slate-50"
                        >
                            Batal
                        </a>

                        <button
                            type="submit"
                            class="rounded-lg bg-blue-600 px-5 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700"
                        >
                            Simpan Teknisi
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </main>

</body>
</html>