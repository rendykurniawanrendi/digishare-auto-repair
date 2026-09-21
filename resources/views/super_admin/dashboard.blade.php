<x-layouts.auto-repair
    title="Dashboard Super Admin"
    description="Kelola verifikasi panduan, file referensi, serta akun Admin dan Teknisi melalui sistem Digi Share Manangemnt."
>

    {{-- =========================================================
         WELCOME
    ========================================================== --}}
    <section class="relative mb-8 overflow-hidden rounded-2xl bg-slate-900 px-8 py-8 shadow-sm">

        <div class="relative z-10">

            <p class="text-sm font-semibold uppercase tracking-wider text-slate-400">
                Digi Share Manangement
            </p>

            <h2 class="mt-2 text-3xl font-bold tracking-tight text-white">
                Selamat Datang, {{ Auth::user()->name }} 👋
            </h2>

            <p class="mt-3 max-w-2xl text-sm leading-6 text-slate-300">
                Kelola verifikasi panduan, file referensi, serta akun Admin dan Teknisi melalui sistem Digi Share Manangement.
            </p>

        </div>

        {{-- DECORATION --}}
        <div class="absolute -right-16 -top-20 h-56 w-56 rounded-full border border-slate-700"></div>

        <div class="absolute -bottom-24 right-20 h-44 w-44 rounded-full border border-slate-700"></div>

    </section>


    {{-- =========================================================
         RINGKASAN SISTEM
    ========================================================== --}}
    <section class="mb-8">

        <div class="mb-5">

            <h3 class="text-lg font-bold text-slate-800">
                Ringkasan Sistem
            </h3>

            <p class="mt-1 text-sm text-slate-500">
                Informasi singkat aktivitas dan pengguna sistem.
            </p>

        </div>


        <div class="grid grid-cols-1 gap-5 md:grid-cols-2 xl:grid-cols-4">


            {{-- TOTAL PANDUAN --}}
            <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">

                <div class="flex items-start justify-between">

                    <div>

                        <p class="text-sm font-medium text-slate-500">
                            Total Panduan Diajukan
                        </p>

                        <p class="mt-3 text-3xl font-bold text-slate-800">
                            {{ \App\Models\RepairGuide::count() }}
                        </p>

                    </div>

                    <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-blue-100 text-blue-600">

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
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5S19.832 5.477 21 6.253v13C19.832 18 18.246 18 16.5 18s-3.332.477-4.5 1.253"
                            />
                        </svg>

                    </div>

                </div>

                <p class="mt-4 text-xs text-slate-400">
                    Seluruh panduan yang masuk
                </p>

            </div>


            {{-- TOTAL FILE --}}
            <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">

                <div class="flex items-start justify-between">

                    <div>

                        <p class="text-sm font-medium text-slate-500">
                            Total File Referensi
                        </p>

                        <p class="mt-3 text-3xl font-bold text-slate-800">
                            {{ \App\Models\ReferenceFile::count() }}
                        </p>

                    </div>

                    <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-amber-100 text-amber-600">

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
                                d="M7 3h7l5 5v13a1 1 0 01-1 1H7a1 1 0 01-1-1V4a1 1 0 011-1z"
                            />

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M14 3v6h6"
                            />
                        </svg>

                    </div>

                </div>

                <p class="mt-4 text-xs text-slate-400">
                    Seluruh file referensi yang masuk
                </p>

            </div>


            {{-- TOTAL ADMIN --}}
            <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">

                <div class="flex items-start justify-between">

                    <div>

                        <p class="text-sm font-medium text-slate-500">
                            Total Admin
                        </p>

                        <p class="mt-3 text-3xl font-bold text-slate-800">
                            {{ \App\Models\User::where('role', 'admin')->count() }}
                        </p>

                    </div>

                    <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-violet-100 text-violet-600">

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
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                            />
                        </svg>

                    </div>

                </div>

                <p class="mt-4 text-xs text-slate-400">
                    Pengguna dengan role Admin
                </p>

            </div>


            {{-- TOTAL TEKNISI --}}
            <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">

                <div class="flex items-start justify-between">

                    <div>

                        <p class="text-sm font-medium text-slate-500">
                            Total Teknisi
                        </p>

                        <p class="mt-3 text-3xl font-bold text-slate-800">
                            {{ \App\Models\User::where('role', 'teknisi')->count() }}
                        </p>

                    </div>

                    <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-emerald-100 text-emerald-600">

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
                                d="M9 6a3 3 0 116 0v1a3 3 0 01-6 0V6zM5 21v-2a5 5 0 015-5h4a5 5 0 015 5v2"
                            />
                        </svg>

                    </div>

                </div>

                <p class="mt-4 text-xs text-slate-400">
                    Pengguna dengan role Teknisi
                </p>

            </div>

        </div>

    </section>


    {{-- =========================================================
         INFORMASI VERIFIKASI
    ========================================================== --}}
    <section class="grid grid-cols-1 gap-6 lg:grid-cols-2">


        {{-- VERIFIKASI PANDUAN --}}
        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">

            <div class="flex items-center gap-4">

                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-blue-100 text-blue-600">

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
                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5S19.832 5.477 21 6.253v13C19.832 18 18.246 18 16.5 18s-3.332.477-4.5 1.253"
                        />
                    </svg>

                </div>

                <div>

                    <h3 class="font-semibold text-slate-800">
                        Verifikasi Panduan
                    </h3>

                    <p class="mt-1 text-sm text-slate-500">
                        Periksa panduan perbaikan yang diajukan Admin.
                    </p>

                </div>

            </div>


            <div class="mt-5 rounded-xl bg-slate-50 p-4">

                <p class="text-xs font-medium uppercase tracking-wide text-slate-400">
                    Status Pending
                </p>

                <p class="mt-1 text-2xl font-bold text-slate-800">
                    {{ \App\Models\RepairGuide::where('status', 'pending')->count() }}
                </p>

            </div>

        </div>


        {{-- VERIFIKASI FILE --}}
        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">

            <div class="flex items-center gap-4">

                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-amber-100 text-amber-600">

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
                            d="M7 3h7l5 5v13a1 1 0 01-1 1H7a1 1 0 01-1-1V4a1 1 0 011-1z"
                        />

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M14 3v6h6"
                        />
                    </svg>

                </div>

                <div>

                    <h3 class="font-semibold text-slate-800">
                        Verifikasi File
                    </h3>

                    <p class="mt-1 text-sm text-slate-500">
                        Periksa file referensi yang diajukan Admin.
                    </p>

                </div>

            </div>


            <div class="mt-5 rounded-xl bg-slate-50 p-4">

                <p class="text-xs font-medium uppercase tracking-wide text-slate-400">
                    Menunggu Verifikasi
                </p>

                <p class="mt-1 text-2xl font-bold text-slate-800">
                    {{ \App\Models\ReferenceFile::where('status', 'pending')->count() }}
                </p>

            </div>

        </div>

    </section>

</x-layouts.auto-repair>