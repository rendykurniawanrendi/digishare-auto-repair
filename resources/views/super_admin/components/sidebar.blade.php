<aside class="fixed inset-y-0 left-0 z-40 flex w-64 flex-col border-r border-slate-800 bg-slate-950 text-white">
    <div class="flex h-full flex-col">

       {{-- BRAND --}}
<div class="flex h-16 shrink-0 items-center border-b border-slate-800 px-5">

    <div class="flex items-center gap-3">

        <img
            src="{{ asset('images/digishare-icon.png') }}"
            alt="DigiShare"
            class="h-9 w-9 rounded-lg object-cover"
        >

        <div>
            <p class="text-sm font-bold text-white">
                DigiShare
            </p>

            <p class="text-[10px] text-slate-400">
                Super Admin
            </p>
        </div>

    </div>

</div>

        {{-- MENU UTAMA --}}
        <nav class="flex-1 overflow-y-auto px-4 py-6">

            {{-- UTAMA --}}
            <div class="mb-7">

                <p class="mb-2 px-3 text-[10px] font-semibold uppercase tracking-[0.16em] text-slate-500">
                    Utama
                </p>

                <a
                    href="{{ route('super_admin.dashboard') }}"
                    class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium transition
                    {{ request()->routeIs('super_admin.dashboard')
                        ? 'bg-blue-600 font-semibold text-white shadow-sm'
                        : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}"
                >

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5 shrink-0"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0h6"
                        />
                    </svg>

                    <span>
                        Dashboard
                    </span>

                </a>

            </div>


            {{-- VERIFIKASI --}}
            <div class="mb-7">

                <p class="mb-2 px-3 text-[10px] font-semibold uppercase tracking-[0.16em] text-slate-500">
                    Verifikasi
                </p>


                {{-- VERIFIKASI PANDUAN --}}
                <a
                    href="{{ route('super_admin.repair-guides.index') }}"
                    class="mb-1 flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium transition
                    {{ request()->routeIs('super_admin.repair-guides.*')
                        ? 'bg-blue-600 font-semibold text-white shadow-sm'
                        : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}"
                >

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5 shrink-0"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5S19.832 5.477 21 6.253v13C19.832 18.477 18.246 18 16.5 18s-3.332.477-4.5 1.253"
                        />
                    </svg>

                    <span class="flex-1">
                        Verifikasi Panduan
                    </span>

                    @if(\App\Models\RepairGuide::where('status', 'pending')->count() > 0)

                        <span class="flex h-5 min-w-5 items-center justify-center rounded-full bg-amber-400 px-1.5 text-[10px] font-bold text-slate-900">
                            {{ \App\Models\RepairGuide::where('status', 'pending')->count() }}
                        </span>

                    @endif

                </a>


           {{-- VERIFIKASI FILE --}}
<a
    href="{{ route('super_admin.reference-files.index') }}"
    class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium transition
    {{ request()->routeIs('super_admin.reference-files.*')
        ? 'bg-blue-600 font-semibold text-white shadow-sm'
        : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}"
>

    <svg
        xmlns="http://www.w3.org/2000/svg"
        class="h-5 w-5 shrink-0"
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

    <span class="flex-1">
        Verifikasi File
    </span>


    {{-- JUMLAH FILE PENDING --}}
    @if(\App\Models\ReferenceFile::where('status', 'pending')->count() > 0)

        <span class="flex h-5 min-w-5 items-center justify-center rounded-full bg-amber-400 px-1.5 text-[10px] font-bold text-slate-900">

            {{ \App\Models\ReferenceFile::where('status', 'pending')->count() }}

        </span>

    @endif

</a>

            {{-- MANAJEMEN --}}
            <div>

                <p class="mb-2 px-3 text-[10px] font-semibold uppercase tracking-[0.16em] text-slate-500">
                    Manajemen
                </p>

                <a
                    href="{{ route('super_admin.users.index') }}"
                    class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium transition
                    {{ request()->routeIs('super_admin.users.*')
                        ? 'bg-blue-600 font-semibold text-white shadow-sm'
                        : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}"
                >

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5 shrink-0"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M16 21v-2a4 4 0 00-4-4H6a4 4 0 00-4 4v2m8-10a4 4 0 100-8 4 4 0 000 8zm8 10v-2a4 4 0 00-3-3.87m0-9a4 4 0 010 7.75"
                        />
                    </svg>

                    <span>
                        Kelola Admin dan Teknisi
                    </span>

                </a>

            </div>

        </nav>


        {{-- AKUN --}}
        <div class="shrink-0 border-t border-slate-800 px-4 py-5">

            <p class="mb-2 px-3 text-[10px] font-semibold uppercase tracking-[0.16em] text-slate-500">
                Akun
            </p>


            {{-- PROFIL --}}
            <a
                href="{{ route('profile.edit') }}"
                class="mb-1 flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium transition
                {{ request()->routeIs('profile.*')
                    ? 'bg-slate-800 font-semibold text-white'
                    : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}"
            >

                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-5 w-5 shrink-0"
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

                <span>
                    Profil
                </span>

            </a>


            {{-- LOGOUT --}}
            <form
                method="POST"
                action="{{ route('logout') }}"
            >

                @csrf

                <button
                    type="submit"
                    class="flex w-full items-center gap-3 rounded-xl px-4 py-3 text-left text-sm font-medium text-slate-300 transition hover:bg-red-500/10 hover:text-red-400"
                >

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5 shrink-0"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 01-2 2H6a2 2 0 01-2-2V7a2 2 0 012-2h5a2 2 0 012 2v1"
                        />
                    </svg>

                    <span>
                        Logout
                    </span>

                </button>

            </form>

        </div>

    </div>

</aside>