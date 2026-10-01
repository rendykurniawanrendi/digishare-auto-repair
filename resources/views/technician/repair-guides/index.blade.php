<x-layouts.auto-repair
    title=""
    description=""
>

    <div class="w-full max-w-none">



            {{-- =====================================================
                 PAGE HEADER
            ====================================================== --}}
            <div class="mb-6 rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">

                <div class="flex flex-col gap-5 lg:flex-row lg:items-center lg:justify-between">

                    <div>

                        <p class="mb-1 text-sm font-semibold text-blue-600">
                            Technical Knowledge
                        </p>

                        <h2 class="text-2xl font-bold tracking-tight text-slate-800">
                            Panduan Perbaikan
                        </h2>

                        <p class="mt-1 text-sm text-slate-500">
                            Panduan perbaikan yang telah diverifikasi oleh Super Admin.
                        </p>

                    </div>


                    {{-- TOTAL --}}
                    <div class="rounded-xl bg-emerald-50 px-4 py-3 text-sm font-semibold text-emerald-700">

                        {{ $guides->total() }} Panduan Tersedia

                    </div>

                </div>

            </div>


            {{-- =====================================================
                 SEARCH
            ====================================================== --}}
            <div class="mb-6 rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">

                <form
                    method="GET"
                    action="{{ route('teknisi.repair-guides.index') }}"
                    class="flex flex-col gap-4 lg:flex-row lg:items-end"
                >

                    {{-- SEARCH --}}
                    <div class="flex-1">

                        <label class="mb-2 block text-sm font-semibold text-slate-700">
                            Cari Panduan
                        </label>

                        <div class="relative">

                            <input
                                type="text"
                                name="search"
                                value="{{ $search }}"
                                placeholder="Judul DTR, dealer, nomor polisi, model..."
                                class="w-full rounded-xl border border-slate-300 px-4 py-3 pl-11 text-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                            >

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="absolute left-4 top-3.5 h-5 w-5 text-slate-400"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M21 21l-4.35-4.35m2.35-5.65a8 8 0 11-16 0 8 8 0 0116 0z"
                                />
                            </svg>

                        </div>

                    </div>


                    {{-- BUTTON --}}
                    <div class="flex gap-2 lg:w-80">

                        <button
                            type="submit"
                            class="flex-1 rounded-xl bg-slate-800 px-5 py-3 text-sm font-semibold text-white transition hover:bg-slate-700"
                        >
                            Cari
                        </button>

                        @if ($search)

                            <a
                                href="{{ route('teknisi.repair-guides.index') }}"
                                class="rounded-xl border border-slate-300 bg-white px-5 py-3 text-sm font-semibold text-slate-600 transition hover:bg-slate-50"
                            >
                                Reset
                            </a>

                        @endif

                    </div>

                </form>

            </div>


            {{-- =====================================================
                 SUCCESS MESSAGE
            ====================================================== --}}
            @if (session('success'))

                <div class="mb-6 rounded-xl border border-emerald-200 bg-emerald-50 px-5 py-4 text-sm font-medium text-emerald-700">

                    {{ session('success') }}

                </div>

            @endif


            {{-- =====================================================
                 DATA DTR
            ====================================================== --}}
            <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

                {{-- HEADER DATA --}}
                <div class="border-b border-slate-200 px-6 py-5">

                    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

                        <div>

                            <h3 class="text-base font-semibold text-slate-800">
                                Panduan Terverifikasi
                            </h3>

                            <p class="mt-1 text-sm text-slate-500">
                                Daftar panduan yang dapat digunakan oleh Teknisi.
                            </p>

                        </div>


                        <div class="rounded-xl bg-emerald-50 px-4 py-2 text-sm font-semibold text-emerald-700">

                            {{ $guides->total() }} Panduan

                        </div>

                    </div>

                </div>


                {{-- =================================================
                     LIST
                ================================================== --}}
                @if ($guides->count())

                    <div class="divide-y divide-slate-100">

                        @foreach ($guides as $guide)

                            <div class="p-6 transition hover:bg-slate-50">

                                <div class="flex flex-col gap-6 xl:flex-row xl:items-center xl:justify-between">


                                    {{-- DATA --}}
                                    <div class="min-w-0 flex-1">

                                        {{-- BADGE --}}
                                        <div class="mb-3 flex flex-wrap items-center gap-2">

                                            <span class="rounded-lg bg-blue-50 px-2.5 py-1 text-xs font-bold text-blue-700">
                                                Panduan #{{ $guide->id }}
                                            </span>

                                            <span class="rounded-lg bg-emerald-50 px-2.5 py-1 text-xs font-semibold text-emerald-700">
                                                APPROVED
                                            </span>

                                        </div>


                                        {{-- JUDUL --}}
                                        <h4 class="text-lg font-bold text-slate-800">
                                            {{ $guide->judul_dtr }}
                                        </h4>


                                        {{-- INFORMASI --}}
                                        <div class="mt-4 grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">


                                            {{-- DEALER --}}
                                            <div>

                                                <p class="text-xs font-medium text-slate-400">
                                                    Dealer
                                                </p>

                                                <p class="mt-1 text-sm font-semibold text-slate-700">
                                                    {{ $guide->nama_dealer }}
                                                </p>

                                            </div>


                                            {{-- NO POLISI --}}
                                            <div>

                                                <p class="text-xs font-medium text-slate-400">
                                                    No. Polisi
                                                </p>

                                                <p class="mt-1 text-sm font-semibold text-slate-700">
                                                    {{ $guide->no_polisi }}
                                                </p>

                                            </div>


                                            {{-- MODEL --}}
                                            <div>

                                                <p class="text-xs font-medium text-slate-400">
                                                    Model
                                                </p>

                                                <p class="mt-1 text-sm font-semibold text-slate-700">
                                                    {{ $guide->model }}
                                                </p>

                                            </div>


                                            {{-- TANGGAL --}}
                                            <div>

                                                <p class="text-xs font-medium text-slate-400">
                                                    Tgl. Perbaikan
                                                </p>

                                                <p class="mt-1 text-sm font-semibold text-slate-700">
                                                    {{ $guide->tgl_perbaikan?->format('d M Y') }}
                                                </p>

                                            </div>

                                        </div>

                                    </div>


                                    {{-- =================================================
                                         ACTION
                                    ================================================== --}}
                                    <div class="flex shrink-0 flex-col gap-2 sm:flex-row">


                                        {{-- DETAIL --}}
                                        <a
                                            href="{{ route('teknisi.repair-guides.show', $guide) }}"
                                            class="inline-flex items-center justify-center gap-2 rounded-xl border border-slate-300 bg-white px-5 py-3 text-sm font-semibold text-slate-700 transition hover:bg-slate-50"
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
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                                                />

                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542-7-4.477-8.268-8.268-2.943-9.542-7z"
                                                />
                                            </svg>

                                            Lihat Detail

                                        </a>


                                        {{-- PDF --}}
                                        <a
                                            href="{{ route('teknisi.repair-guides.pdf', $guide) }}"
                                            class="inline-flex items-center justify-center gap-2 rounded-xl bg-blue-600 px-5 py-3 text-sm font-semibold text-white transition hover:bg-blue-700"
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
                                                    d="M12 16V4m0 12l-4-4m4 4l4-4M5 20h14"
                                                />
                                            </svg>

                                            Download PDF

                                        </a>

                                    </div>

                                </div>

                            </div>

                        @endforeach

                    </div>


                @else

                    {{-- EMPTY --}}
                    <div class="px-6 py-16 text-center">

                        <div class="mx-auto mb-4 flex h-14 w-14 items-center justify-center rounded-full bg-slate-100 text-slate-400">

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-7 w-7"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
                                />
                            </svg>

                        </div>

                        <h3 class="font-semibold text-slate-700">
                            Belum Ada Panduan
                        </h3>

                        <p class="mt-1 text-sm text-slate-400">
                            Belum ada DTR yang disetujui oleh Super Admin.
                        </p>

                    </div>

                @endif

            </div>


            {{-- =====================================================
                 PAGINATION
            ====================================================== --}}
            @if ($guides->hasPages())

                <div class="mt-6">

                    {{ $guides->links() }}

                </div>

            @endif

    </div>

    </div>

</x-layouts.auto-repair>