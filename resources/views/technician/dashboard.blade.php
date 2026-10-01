<x-layouts.auto-repair
    title="Dashboard Teknisi"
    description="."
>

    {{-- =========================================================
         WELCOME
    ========================================================== --}}
    <section class="relative mb-8 overflow-hidden rounded-2xl bg-slate-900 px-8 py-8 shadow-sm">

        <div class="relative z-10">

            <p class="text-sm font-semibold uppercase tracking-wider text-slate-400">
                DigiShare
            </p>

            <h2 class="mt-2 text-3xl font-bold tracking-tight text-white">
                Selamat Datang, {{ Auth::user()->name }} 👋
            </h2>

            <p class="mt-3 max-w-2xl text-sm leading-6 text-slate-300">
                Akses panduan perbaikan dan file referensi untuk membantu proses pekerjaan Teknisi.
            </p>

        </div>

        {{-- ORNAMEN --}}
        <div class="absolute -right-16 -top-20 h-56 w-56 rounded-full border border-slate-700">
        </div>

        <div class="absolute -bottom-24 right-20 h-44 w-44 rounded-full border border-slate-700">
        </div>

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
                Informasi singkat mengenai panduan dan file yang tersedia untuk Teknisi.
            </p>

        </div>


        <div class="grid grid-cols-1 gap-5 md:grid-cols-2 xl:grid-cols-3">


            {{-- PANDUAN --}}
            <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">

                <div class="flex items-start justify-between">

                    <div>

                        <p class="text-sm font-medium text-slate-500">
                            Panduan Perbaikan
                        </p>

                        <p class="mt-3 text-3xl font-bold text-slate-800">
                            {{ \App\Models\RepairGuide::where('status', 'approved')->count() }}
                        </p>

                    </div>

                    <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-blue-100 text-blue-600">

                        {{-- ICON --}}
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="1.8"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5S19.832 5.477 21 6.253v13C19.832 18.477 18.246 18 16.5 18s-3.332.477-4.5 1.253"
                            />
                        </svg>

                    </div>

                </div>

                <p class="mt-3 text-xs text-slate-400">
                    Panduan yang telah disetujui Super Admin
                </p>

            </div>


            {{-- FILE REFERENSI --}}
            <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">

                <div class="flex items-start justify-between">

                    <div>

                        <p class="text-sm font-medium text-slate-500">
                            File Referensi
                        </p>

                        <p class="mt-3 text-3xl font-bold text-slate-800">
                            {{ \App\Models\ReferenceFile::where('status', 'approved')->count() }}
                        </p>

                    </div>

                    <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-amber-100 text-amber-600">

                        {{-- ICON --}}
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="1.8"
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

                <p class="mt-3 text-xs text-slate-400">
                    File referensi yang telah disetujui Super Admin
                </p>

            </div>


            {{-- STATUS TEKNISI --}}
            <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">

                <div class="flex items-start justify-between">

                    <div>

                        <p class="text-sm font-medium text-slate-500">
                            Status Teknisi
                        </p>

                        <p class="mt-3 text-3xl font-bold text-slate-800">
                            Aktif
                        </p>

                    </div>

                    <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-emerald-100 text-emerald-600">

                        {{-- ICON --}}
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="1.8"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM5 21a7 7 0 0114 0"
                            />
                        </svg>

                    </div>

                </div>

                <p class="mt-3 text-xs text-slate-400">
                    Akun Teknisi siap digunakan
                </p>

            </div>

        </div>

    </section>


    {{-- =========================================================
         AKSES TEKNISI
    ========================================================== --}}
    <section>

        <div class="mb-5">

            <h3 class="text-lg font-bold text-slate-800">
                Akses Teknisi
            </h3>

            <p class="mt-1 text-sm text-slate-500">
                Akses panduan perbaikan dan file referensi yang telah diverifikasi.
            </p>

        </div>


        <div class="grid grid-cols-1 gap-5 xl:grid-cols-2">


            {{-- PANDUAN PERBAIKAN --}}
            <a
                href="{{ route('teknisi.repair-guides.index') }}"
                class="group rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition hover:-translate-y-0.5 hover:shadow-md"
            >

                <div class="flex items-start justify-between">

                    <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-blue-100 text-blue-600">

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="1.8"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5S19.832 5.477 21 6.253v13C19.832 18.477 18.246 18 16.5 18s-3.332.477-4.5 1.253"
                            />
                        </svg>

                    </div>

                    <span class="text-slate-300 transition group-hover:translate-x-1 group-hover:text-blue-600">
                        →
                    </span>

                </div>

                <h3 class="mt-5 text-lg font-bold text-slate-800">
                    Panduan Perbaikan
                </h3>

                <p class="mt-2 text-sm leading-6 text-slate-500">
                    Lihat panduan perbaikan kendaraan yang telah diverifikasi dan disetujui oleh Super Admin.
                </p>

                <div class="mt-5 text-sm font-semibold text-slate-700">
                    Lihat Panduan →
                </div>

            </a>


            {{-- FILE REFERENSI --}}
            <a
                href="{{ route('teknisi.reference-files.index') }}"
                class="group rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition hover:-translate-y-0.5 hover:shadow-md"
            >

                <div class="flex items-start justify-between">

                    <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-amber-100 text-amber-600">

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="1.8"
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

                    <span class="text-slate-300 transition group-hover:translate-x-1 group-hover:text-amber-600">
                        →
                    </span>

                </div>

                <h3 class="mt-5 text-lg font-bold text-slate-800">
                    File Referensi
                </h3>

                <p class="mt-2 text-sm leading-6 text-slate-500">
                    Lihat dan download file referensi yang telah disetujui oleh Super Admin.
                </p>

                <div class="mt-5 text-sm font-semibold text-slate-700">
                    Lihat File →
                </div>

            </a>

        </div>

    </section>

</x-layouts.auto-repair>