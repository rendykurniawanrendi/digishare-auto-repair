<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Teknisi - Auto Repair</title>

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
                    Edit Teknisi
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    Perbarui informasi akun teknisi Auto Repair.
                </p>

            </div>


            {{-- FORM CONTAINER --}}
            <div class="w-full overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">

                {{-- PROFILE HEADER --}}
                <div class="border-b border-slate-200 px-6 py-5 lg:px-8">

                    <div class="flex items-center gap-4">

                        <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-blue-100 text-lg font-bold text-blue-700">
                            {{ strtoupper(substr($technician->name, 0, 1)) }}
                        </div>

                        <div>
                            <h3 class="text-base font-semibold text-slate-800">
                                {{ $technician->name }}
                            </h3>

                            <p class="text-sm text-slate-500">
                                Akun Teknisi
                            </p>
                        </div>

                    </div>

                </div>


                {{-- FORM --}}
                <form
                    method="POST"
                    action="{{ route('admin.technicians.update', $technician) }}"
                    class="p-6 lg:p-8"
                >

                    @csrf
                    @method('PUT')


                    {{-- TWO COLUMNS --}}
                    <div class="grid grid-cols-1 gap-8 lg:grid-cols-2">

                        {{-- LEFT COLUMN --}}
                        <div>

                            <div class="mb-5">

                                <h4 class="text-sm font-semibold text-slate-800">
                                    Informasi Teknisi
                                </h4>

                                <p class="mt-1 text-xs text-slate-500">
                                    Informasi dasar akun teknisi.
                                </p>

                            </div>


                            {{-- NAME --}}
                            <div class="mb-6">

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
                                    value="{{ old('name', $technician->name) }}"
                                    required
                                    autofocus
                                    class="w-full rounded-lg border border-slate-300 px-4 py-2.5 text-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                                >

                                @error('name')
                                    <p class="mt-1.5 text-xs text-red-600">
                                        {{ $message }}
                                    </p>
                                @enderror

                            </div>


                            {{-- ROLE --}}
                            <div>

                                <label class="mb-2 block text-sm font-semibold text-slate-700">
                                    Role
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
                                            Role ditentukan oleh sistem.
                                        </p>
                                    </div>

                                </div>

                            </div>

                        </div>


                        {{-- RIGHT COLUMN --}}
                        <div>

                            <div class="mb-5">

                                <h4 class="text-sm font-semibold text-slate-800">
                                    Informasi Akun
                                </h4>

                                <p class="mt-1 text-xs text-slate-500">
                                    Email dan password untuk login teknisi.
                                </p>

                            </div>


                            {{-- EMAIL --}}
                            <div class="mb-6">

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
                                    value="{{ old('email', $technician->email) }}"
                                    required
                                    class="w-full rounded-lg border border-slate-300 px-4 py-2.5 text-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                                >

                                @error('email')
                                    <p class="mt-1.5 text-xs text-red-600">
                                        {{ $message }}
                                    </p>
                                @enderror

                            </div>


                            {{-- PASSWORD --}}
                            <div class="mb-6">

                                <label
                                    for="password"
                                    class="mb-2 block text-sm font-semibold text-slate-700"
                                >
                                    Password Baru
                                    <span class="font-normal text-slate-400">
                                        (opsional)
                                    </span>
                                </label>

                                <input
                                    id="password"
                                    name="password"
                                    type="password"
                                    placeholder="Kosongkan jika tidak diubah"
                                    class="w-full rounded-lg border border-slate-300 px-4 py-2.5 text-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                                >

                                @error('password')
                                    <p class="mt-1.5 text-xs text-red-600">
                                        {{ $message }}
                                    </p>
                                @enderror

                            </div>


                            {{-- CONFIRM PASSWORD --}}
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
                                    placeholder="Ulangi password baru"
                                    class="w-full rounded-lg border border-slate-300 px-4 py-2.5 text-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                                >

                            </div>

                        </div>

                    </div>


                    {{-- INFORMATION --}}
                    <div class="mt-8 rounded-lg border border-amber-100 bg-amber-50 px-4 py-3">

                        <div class="flex gap-3">

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="mt-0.5 h-5 w-5 shrink-0 text-amber-600"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M12 9v3.75m0 3.75h.008M10.29 3.86l-7.5 13A1.5 1.5 0 004.09 19h15.82a1.5 1.5 0 001.3-2.25l-7.5-13a1.5 1.5 0 00-2.6 0z"
                                />
                            </svg>

                            <p class="text-sm text-amber-700">
                                Jika password tidak ingin diubah, biarkan kolom
                                <strong>Password Baru</strong> dan
                                <strong>Konfirmasi Password Baru</strong> kosong.
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
                            Simpan Perubahan
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </main>

</body>
</html>