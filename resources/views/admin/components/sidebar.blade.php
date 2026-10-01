<aside class="fixed inset-y-0 left-0 z-40 flex h-screen w-64 flex-col border-r border-slate-800 bg-slate-950 text-white">

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
                        Digi Share
                    </p>

                    <p class="text-[10px] text-slate-400">
                        Administrator
                    </p>
                </div>

            </div>
        </div>


        {{-- MENU --}}
        <nav class="flex-1 overflow-y-auto px-4 py-6">

            {{-- UTAMA --}}
            <div class="mb-7">

                <p class="mb-2 px-3 text-[10px] font-semibold uppercase tracking-[0.16em] text-slate-500">
                    Utama
                </p>

                {{-- DASHBOARD --}}
                <a
                    href="{{ route('admin.dashboard') }}"
                    class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium transition
                    {{ request()->routeIs('admin.dashboard')
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


            {{-- DATA & OPERASIONAL --}}
            <div>

                <p class="mb-2 px-3 text-[10px] font-semibold uppercase tracking-[0.16em] text-slate-500">
                    Data & Operasional
                </p>


                {{-- DAFTAR TEKNISI --}}
                <a
                    href="{{ route('admin.technicians.index') }}"
                    class="mb-1 flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium transition
                    {{ request()->routeIs('admin.technicians.*')
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
                            d="M17 20h5v-2a4 4 0 00-4-4h-1M9 20H4v-2a4 4 0 014-4h1m4-8a4 4 0 11-8 0 4 4 0 018 0zm6 4a3 3 0 10-6 0 3 3 0 006 0z"
                        />
                    </svg>

                    <span class="flex-1">
                        Daftar Teknisi
                    </span>

                </a>


                {{-- PANDUAN PERBAIKAN --}}
                <a
                    href="{{ route('admin.repair-guides.index') }}"
                    class="mb-1 flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium transition
                    {{ request()->routeIs('admin.repair-guides.*')
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
                            d="M9 5H7a2 2 0 00-2 2v11a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2"
                        />

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M9 5a3 3 0 006 0"
                        />

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M8 12h8M8 16h5"
                        />
                    </svg>

                    <span class="flex-1">
                        Panduan Perbaikan
                    </span>

                </a>


                {{-- FILE REFERENSI --}}
                <a
                    href="{{ route('admin.reference-files.index') }}"
                    class="mb-1 flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium transition
                    {{ request()->routeIs('admin.reference-files.*')
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
                            d="M7 3h7l4 4v14H7a2 2 0 01-2-2V5a2 2 0 012-2z"
                        />

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M14 3v5h5"
                        />
                    </svg>

                    <span class="flex-1">
                        File Referensi
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
            <form method="POST" action="{{ route('logout') }}">
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