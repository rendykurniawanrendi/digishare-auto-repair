<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    {{-- FAVICON DIGISHARE --}}
    <link
        rel="icon"
        type="image/png"
        href="{{ asset('images/digishare-icon.png') }}"
    >

    <title>Login - DigiShare</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>


<body class="min-h-screen bg-slate-100">

    <div class="flex min-h-screen">


        {{-- ================================================= --}}
        {{-- LEFT BRAND PANEL --}}
        {{-- ================================================= --}}

        <div class="relative hidden w-[46%] overflow-hidden bg-slate-900 lg:flex">

            {{-- Background decoration --}}
            <div class="absolute -right-24 -top-24 h-72 w-72 rounded-full bg-blue-600/20 blur-3xl"></div>

            <div class="absolute -bottom-32 -left-24 h-80 w-80 rounded-full bg-cyan-500/10 blur-3xl"></div>


            <div class="relative flex w-full flex-col justify-between p-12">


                {{-- BRAND --}}
                <div>

                    <div class="flex items-center gap-4">

                        {{-- LOGO MOBIL --}}
                        <div class="flex h-14 w-14 items-center justify-center overflow-hidden rounded-xl bg-white">

                            <img
                                src="{{ asset('images/digishare-login.png') }}"
                                alt="DigiShare"
                                class="h-full w-full object-contain"
                            >

                        </div>


                        <div>

                            <h1 class="text-xl font-bold text-white">
                                DigiShare
                            </h1>

                            <p class="text-xs text-slate-400">
                                Data List & Knowledge Sharing
                            </p>

                        </div>

                    </div>

                </div>



                {{-- CENTER CONTENT --}}
                <div class="max-w-md">

                    <p class="mb-4 text-sm font-semibold uppercase tracking-[0.2em] text-blue-400">
                        Welcome Back
                    </p>


                    <h2 class="text-4xl font-bold leading-tight text-white">

                        Kelola pekerjaan

                        <span class="text-blue-400">
                            perbaikan
                        </span>

                        dengan lebih mudah.

                    </h2>


                    <p class="mt-5 text-sm leading-7 text-slate-400">

                        Akses panduan perbaikan, dokumentasi kendaraan,
                        dan file referensi dalam satu sistem.

                    </p>



                    {{-- FEATURES --}}
                    <div class="mt-8 space-y-4">


                        {{-- FEATURE 1 --}}
                        <div class="flex items-center gap-3">

                            <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-white/5">

                                <svg
                                    class="h-4 w-4 text-blue-400"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="1.8"
                                        d="M5 13l4 4L19 7"
                                    />
                                </svg>

                            </div>

                            <span class="text-sm text-slate-300">
                                Panduan perbaikan kendaraan
                            </span>

                        </div>


                        {{-- FEATURE 2 --}}
                        <div class="flex items-center gap-3">

                            <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-white/5">

                                <svg
                                    class="h-4 w-4 text-blue-400"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="1.8"
                                        d="M5 13l4 4L19 7"
                                    />
                                </svg>

                            </div>

                            <span class="text-sm text-slate-300">
                                Dokumentasi Before & After
                            </span>

                        </div>


                        {{-- FEATURE 3 --}}
                        <div class="flex items-center gap-3">

                            <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-white/5">

                                <svg
                                    class="h-4 w-4 text-blue-400"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="1.8"
                                        d="M5 13l4 4L19 7"
                                    />
                                </svg>

                            </div>

                            <span class="text-sm text-slate-300">
                                File referensi teknisi
                            </span>

                        </div>


                    </div>

                </div>



                {{-- FOOTER --}}
                <div>

                    <p class="text-xs text-slate-500">
                        © {{ date('Y') }} DigiShare
                    </p>

                </div>


            </div>

        </div>



        {{-- ================================================= --}}
        {{-- RIGHT LOGIN PANEL --}}
        {{-- ================================================= --}}

        <div class="flex w-full items-center justify-center bg-white px-6 py-10 lg:w-[54%]">

            <div class="w-full max-w-md">


                {{-- MOBILE BRAND --}}
                <div class="mb-10 flex items-center gap-3 lg:hidden">

                    <div class="flex h-11 w-11 items-center justify-center overflow-hidden rounded-lg bg-white">

                        <img
                            src="{{ asset('images/digishare-login.png') }}"
                            alt="DigiShare"
                            class="h-full w-full object-contain"
                        >

                    </div>


                    <div>

                        <p class="text-sm font-bold text-slate-900">
                            DigiShare
                        </p>

                        <p class="text-[10px] text-slate-400">
                            Data List & Knowledge Sharing
                        </p>

                    </div>

                </div>



                {{-- HEADER --}}
                <div class="mb-8">

                    <p class="text-sm font-medium text-blue-600">
                        Login
                    </p>


                    <h2 class="mt-2 text-3xl font-bold tracking-tight text-slate-900">
                        Selamat datang kembali
                    </h2>


                    <p class="mt-2 text-sm leading-6 text-slate-500">
                        Masukkan email dan password untuk melanjutkan.
                    </p>

                </div>



                {{-- SESSION STATUS --}}
                @if (session('status'))

                    <div class="mb-5 border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-700">

                        {{ session('status') }}

                    </div>

                @endif



                {{-- VALIDATION ERRORS --}}
                @if ($errors->any())

                    <div class="mb-5 border border-red-200 bg-red-50 px-4 py-3">

                        <ul class="space-y-1 text-sm text-red-600">

                            @foreach ($errors->all() as $error)

                                <li>
                                    {{ $error }}
                                </li>

                            @endforeach

                        </ul>

                    </div>

                @endif



                {{-- LOGIN FORM --}}
                <form
                    method="POST"
                    action="{{ route('login') }}"
                    class="space-y-5"
                >

                    @csrf


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
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            autofocus
                            autocomplete="username"
                            placeholder="Masukkan email"
                            class="h-12 w-full rounded-xl border border-slate-200 bg-slate-50 px-4 text-sm text-slate-800 outline-none transition placeholder:text-slate-400 focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-50"
                        >

                    </div>



                    {{-- PASSWORD --}}
                    <div>

                        <div class="mb-2 flex items-center justify-between">

                            <label
                                for="password"
                                class="block text-sm font-semibold text-slate-700"
                            >
                                Password
                            </label>


                            @if (Route::has('password.request'))

                                <a
                                    href="{{ route('password.request') }}"
                                    class="text-xs font-medium text-blue-600 hover:text-blue-800"
                                >
                                    Lupa password?
                                </a>

                            @endif

                        </div>


                        <input
                            id="password"
                            type="password"
                            name="password"
                            required
                            autocomplete="current-password"
                            placeholder="Masukkan password"
                            class="h-12 w-full rounded-xl border border-slate-200 bg-slate-50 px-4 text-sm text-slate-800 outline-none transition placeholder:text-slate-400 focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-50"
                        >

                    </div>



                    {{-- REMEMBER --}}
                    <div class="flex items-center">

                        <label class="flex cursor-pointer items-center gap-2">

                            <input
                                type="checkbox"
                                name="remember"
                                class="h-4 w-4 rounded border-slate-300 text-blue-600 focus:ring-blue-500"
                            >

                            <span class="text-sm text-slate-500">
                                Ingat saya
                            </span>

                        </label>

                    </div>



                    {{-- LOGIN BUTTON --}}
                    <button
                        type="submit"
                        class="flex h-12 w-full items-center justify-center rounded-xl bg-blue-600 text-sm font-semibold text-white transition hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-100"
                    >

                        Masuk ke Sistem

                        <svg
                            class="ml-2 h-4 w-4"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.8"
                                d="M5 12h14m-5-5l5 5-5 5"
                            />
                        </svg>

                    </button>

                </form>



                {{-- REGISTER --}}
                @if (Route::has('register'))

                    <div class="mt-8 border-t border-slate-100 pt-6 text-center">

                        <p class="text-sm text-slate-500">
                            Belum memiliki akun?
                        </p>


                        <a
                            href="{{ route('register') }}"
                            class="mt-2 inline-block text-sm font-semibold text-blue-600 hover:text-blue-800"
                        >
                            Daftar sebagai Teknisi
                        </a>

                    </div>

                @endif


            </div>

        </div>


    </div>

</body>

</html>