<nav class="fixed left-0 right-0 top-0 z-50 h-16 border-b border-slate-200 bg-white">
    <div class="flex h-full items-center justify-between px-6">

        {{-- Brand --}}
        <div class="flex items-center gap-3">

            <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-slate-900">
                <svg
                    class="h-5 w-5 text-white"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="1.8"
                        d="M12 3l8 4.5v9L12 21l-8-4.5v-9L12 3z"
                    />
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="1.8"
                        d="M8 9.5l4 2.2 4-2.2M12 12v4.5"
                    />
                </svg>
            </div>

            <div>
                <p class="text-sm font-bold leading-tight text-slate-900">
                    Auto Repair
                </p>

                <p class="text-[10px] leading-tight text-slate-400">
                    Technician System
                </p>
            </div>

        </div>


        {{-- User --}}
        <div class="flex items-center gap-3">

            <div class="hidden text-right sm:block">
                <p class="text-sm font-semibold text-slate-800">
                    {{ auth()->user()->name }}
                </p>

                <p class="text-xs text-slate-400">
                    Teknisi
                </p>
            </div>

            <div class="flex h-9 w-9 items-center justify-center rounded-full bg-slate-900 text-xs font-bold text-white">
                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
            </div>

        </div>

    </div>
</nav>