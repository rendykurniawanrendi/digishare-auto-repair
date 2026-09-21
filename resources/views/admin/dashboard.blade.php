<x-layouts.auto-repair
    title="Dashboard Admin"
    description="Kelola sistem Auto Repair melalui halaman administrasi"
>

    <div class="w-full max-w-none">

        {{-- =====================================================
             WELCOME
        ====================================================== --}}
        <div class="relative mb-8 overflow-hidden rounded-2xl bg-slate-900 px-8 py-8">
        <div class="relative z-10">

            <p class="mb-2 text-sm font-medium text-slate-400">
                AUTO REPAIR CENTER
            </p>

            <h1 class="text-3xl font-bold tracking-tight text-white">
                Selamat Datang, {{ auth()->user()->name }} 👋
            </h1>

            <p class="mt-3 text-sm text-slate-300">
                Kelola sistem Auto Repair melalui halaman administrasi.
            </p>

        </div>

        {{-- Ornamen --}}
        <div class="absolute -right-16 -top-20 h-64 w-64 rounded-full border-[40px] border-slate-800"></div>

        <div class="absolute -bottom-24 right-32 h-48 w-48 rounded-full border-[30px] border-slate-800"></div>

    </div>


    {{-- =====================================================
         STATISTICS
    ====================================================== --}}
    <div class="mb-8 grid gap-5 md:grid-cols-3">

        {{-- PANDUAN PERBAIKAN --}}
        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-sm text-slate-500">
                        Panduan Perbaikan
                    </p>

                    <p class="mt-2 text-3xl font-bold text-slate-800">
                        {{ \App\Models\RepairGuide::count() }}
                    </p>

                    <p class="mt-1 text-xs text-slate-400">
                        Panduan tersedia
                    </p>

                </div>

                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-blue-100 text-blue-600">

                    <svg
                        class="h-6 w-6"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="1.8"
                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5S19.832 5.477 21 6.253v13C19.832 18.477 18.246 18 16.5 18s-3.332.477-4.5 1.253"
                        />
                    </svg>

                </div>

            </div>

        </div>


        {{-- FILE REFERENSI --}}
        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-sm text-slate-500">
                        File Referensi
                    </p>

                    <p class="mt-2 text-3xl font-bold text-slate-800">
                        {{ \App\Models\ReferenceFile::count() }}
                    </p>

                    <p class="mt-1 text-xs text-slate-400">
                        File tersedia
                    </p>

                </div>

                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-emerald-100 text-emerald-600">

                    <svg
                        class="h-6 w-6"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="1.8"
                            d="M7 3h8l4 4v14H7a2 2 0 01-2-2V5a2 2 0 012-2z"
                        />

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="1.8"
                            d="M15 3v5h5"
                        />
                    </svg>

                </div>

            </div>

        </div>


        {{-- TEKNISI --}}
        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-sm text-slate-500">
                        Teknisi
                    </p>

                    <p class="mt-2 text-3xl font-bold text-slate-800">
                        {{ \App\Models\User::where('role', 'teknisi')->count() }}
                    </p>

                    <p class="mt-1 text-xs text-slate-400">
                        Teknisi terdaftar
                    </p>

                </div>

                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-amber-100 text-amber-600">

                    <svg
                        class="h-6 w-6"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="1.8"
                            d="M17 20h5v-2a4 4 0 00-4-4h-1M9 20H4v-2a4 4 0 014-4h1m4-8a4 4 0 11-8 0 4 4 0 018 0zm6 4a3 3 0 10-6 0 3 3 0 006 0z"
                        />
                    </svg>

                </div>

            </div>

        </div>

    </div>


    {{-- =====================================================
         CONTENT
    ====================================================== --}}
    <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">

        {{-- MENU UTAMA --}}
        <div class="lg:col-span-2">

            <div class="mb-5">

                <h2 class="text-lg font-bold text-slate-800">
                    Menu Utama
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    Akses cepat ke pengelolaan sistem.
                </p>

            </div>


            <div class="grid gap-6 md:grid-cols-2">

                {{-- PANDUAN --}}
                <a
                    href="{{ route('admin.repair-guides.index') }}"
                    class="group rounded-2xl border border-slate-200 bg-white p-7 shadow-sm transition hover:-translate-y-1 hover:shadow-lg"
                >

                    <div class="flex items-start justify-between">

                        <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-slate-900">

                            <svg
                                class="h-7 w-7 text-white"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.7"
                                    d="M9 5H7a2 2 0 00-2 2v11a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2"
                                />

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.7"
                                    d="M9 5a3 3 0 006 0"
                                />

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.7"
                                    d="M8 12h8M8 16h5"
                                />
                            </svg>

                        </div>

                        <span class="text-slate-300 transition group-hover:translate-x-1 group-hover:text-slate-700">
                            →
                        </span>

                    </div>

                    <h3 class="mt-6 text-lg font-bold text-slate-800">
                        Panduan Perbaikan
                    </h3>

                    <p class="mt-2 text-sm leading-6 text-slate-500">
                        Kelola panduan perbaikan kendaraan lengkap
                        beserta data dan dokumentasi perbaikan.
                    </p>

                    <div class="mt-6 text-sm font-semibold text-slate-800">
                        Kelola Panduan →
                    </div>

                </a>


                {{-- FILE REFERENSI --}}
                <a
                    href="{{ route('admin.reference-files.index') }}"
                    class="group rounded-2xl border border-slate-200 bg-white p-7 shadow-sm transition hover:-translate-y-1 hover:shadow-lg"
                >

                    <div class="flex items-start justify-between">

                        <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-slate-100">

                            <svg
                                class="h-7 w-7 text-slate-700"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.7"
                                    d="M7 3h7l4 4v14H7a2 2 0 01-2-2V5a2 2 0 012-2z"
                                />

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.7"
                                    d="M14 3v5h5"
                                />
                            </svg>

                        </div>

                        <span class="text-slate-300 transition group-hover:translate-x-1 group-hover:text-slate-700">
                            →
                        </span>

                    </div>

                    <h3 class="mt-6 text-lg font-bold text-slate-800">
                        File Referensi
                    </h3>

                    <p class="mt-2 text-sm leading-6 text-slate-500">
                        Kelola file referensi yang digunakan
                        untuk membantu pekerjaan teknisi.
                    </p>

                    <div class="mt-6 text-sm font-semibold text-slate-800">
                        Kelola File →
                    </div>

                </a>

            </div>

        </div>


        {{-- INFORMASI SISTEM --}}
        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">

            <h3 class="text-base font-semibold text-slate-800">
                Informasi Sistem
            </h3>

            <div class="mt-5 space-y-4">

                {{-- USER --}}
                <div>

                    <p class="text-xs text-slate-400">
                        Pengguna
                    </p>

                    <p class="mt-1 text-sm font-semibold text-slate-700">
                        {{ auth()->user()->name }}
                    </p>

                </div>


                {{-- ROLE --}}
                <div>

                    <p class="text-xs text-slate-400">
                        Role
                    </p>

                    <p class="mt-1 text-sm font-semibold text-slate-700">
                        Administrator
                    </p>

                </div>


                {{-- SISTEM --}}
                <div>

                    <p class="text-xs text-slate-400">
                        Sistem
                    </p>

                    <p class="mt-1 text-sm font-semibold text-slate-700">
                        Auto Repair
                    </p>

                </div>


                {{-- STATUS --}}
                <div>

                    <p class="text-xs text-slate-400">
                        Status
                    </p>

                    <div class="mt-1 flex items-center gap-2">

                        <span class="h-2 w-2 rounded-full bg-emerald-500"></span>

                        <span class="text-sm font-semibold text-emerald-600">
                            Sistem Aktif
                        </span>

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-layouts.auto-repair>