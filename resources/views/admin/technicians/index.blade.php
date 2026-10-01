<x-layouts.auto-repair
    title=""
    description=""
>

    <div class="w-full max-w-none">

            {{-- PAGE HEADER --}}
            <div class="mb-7 flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">

                <div>
                    <p class="mb-1 text-sm font-medium text-blue-600">
                        Manajemen Teknisi
                    </p>

                    <h2 class="text-2xl font-bold tracking-tight text-slate-800">
                        Daftar Teknisi
                    </h2>

                    <p class="mt-1 text-sm text-slate-500">
                        Kelola akun teknisi yang dapat mengakses sistem Auto Repair.
                    </p>
                </div>

                <a
                    href="{{ route('admin.technicians.create') }}"
                    class="inline-flex items-center justify-center gap-2 rounded-lg bg-blue-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700"
                >
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
                            d="M12 4v16m8-8H4"
                        />
                    </svg>

                    Tambah Teknisi
                </a>

            </div>


            {{-- SUCCESS MESSAGE --}}
            @if (session('success'))
                <div class="mb-5 flex items-center gap-3 rounded-lg border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-700">
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
                            d="M9 12.75L11.25 15 15 9.75"
                        />
                    </svg>

                    {{ session('success') }}
                </div>
            @endif


            {{-- SEARCH --}}
            <div class="mb-5 rounded-xl border border-slate-200 bg-white p-4 shadow-sm">

                <form
                    method="GET"
                    action="{{ route('admin.technicians.index') }}"
                    class="flex flex-col gap-3 sm:flex-row"
                >

                    <div class="relative flex-1">

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="pointer-events-none absolute left-3 top-1/2 h-5 w-5 -translate-y-1/2 text-slate-400"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M21 21l-4.35-4.35m1.35-5.15a6.5 6.5 0 11-13 0 6.5 6.5 0 0113 0z"
                            />
                        </svg>

                        <input
                            type="text"
                            name="search"
                            value="{{ $search }}"
                            placeholder="Cari nama atau email teknisi..."
                            class="w-full rounded-lg border border-slate-300 py-2.5 pl-10 pr-4 text-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                        >

                    </div>

                    <button
                        type="submit"
                        class="rounded-lg bg-slate-800 px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-slate-900"
                    >
                        Cari
                    </button>

                    @if ($search)
                        <a
                            href="{{ route('admin.technicians.index') }}"
                            class="rounded-lg border border-slate-300 bg-white px-5 py-2.5 text-center text-sm font-semibold text-slate-600 transition hover:bg-slate-50"
                        >
                            Reset
                        </a>
                    @endif

                </form>

            </div>


            {{-- TECHNICIAN LIST --}}
            <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">

                {{-- TABLE HEADER --}}
                <div class="hidden border-b border-slate-200 bg-slate-50 px-6 py-3 md:grid md:grid-cols-[1.4fr_1.5fr_1fr_150px] md:items-center md:gap-6">

                    <div class="text-xs font-semibold uppercase tracking-wide text-slate-500">
                        Teknisi
                    </div>

                    <div class="text-xs font-semibold uppercase tracking-wide text-slate-500">
                        Email
                    </div>

                    <div class="text-xs font-semibold uppercase tracking-wide text-slate-500">
                        Terdaftar
                    </div>

                    <div class="text-center text-xs font-semibold uppercase tracking-wide text-slate-500">
                        Aksi
                    </div>

                </div>


                @forelse ($technicians as $technician)

                    <div class="border-b border-slate-200 px-6 py-4 last:border-b-0 hover:bg-slate-50">

                        <div class="grid grid-cols-1 gap-4 md:grid-cols-[1.4fr_1.5fr_1fr_150px] md:items-center md:gap-6">

                            {{-- NAME --}}
                            <div class="flex items-center gap-3">

                                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-blue-100 font-semibold text-blue-700">
                                    {{ strtoupper(substr($technician->name, 0, 1)) }}
                                </div>

                                <div class="min-w-0">
                                    <p class="truncate text-sm font-semibold text-slate-800">
                                        {{ $technician->name }}
                                    </p>

                                    <p class="text-xs text-slate-400">
                                        Teknisi
                                    </p>
                                </div>

                            </div>


                            {{-- EMAIL --}}
                            <div class="min-w-0">
                                <p class="truncate text-sm text-slate-600">
                                    {{ $technician->email }}
                                </p>
                            </div>


                            {{-- CREATED --}}
                            <div>
                                <p class="text-sm text-slate-600">
                                    {{ $technician->created_at?->format('d M Y') }}
                                </p>
                            </div>


                            {{-- ACTION --}}
                            <div class="flex items-center justify-start gap-2 md:justify-center">

                                {{-- EDIT --}}
                                <a
                                    href="{{ route('admin.technicians.edit', $technician) }}"
                                    class="inline-flex items-center gap-1.5 rounded-lg border border-blue-200 bg-blue-50 px-3 py-2 text-xs font-semibold text-blue-700 transition hover:bg-blue-100"
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
                                            d="M16.862 3.487a2.25 2.25 0 113.182 3.182L7.5 19.213 3 20.5l1.287-4.5L16.862 3.487z"
                                        />
                                    </svg>

                                    Edit
                                </a>


                                {{-- DELETE --}}
                                <form
                                    method="POST"
                                    action="{{ route('admin.technicians.destroy', $technician) }}"
                                    onsubmit="return confirm('Yakin ingin menghapus teknisi {{ $technician->name }}?');"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="inline-flex items-center gap-1.5 rounded-lg border border-red-200 bg-red-50 px-3 py-2 text-xs font-semibold text-red-600 transition hover:bg-red-100"
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
                                                d="M6 7h12M10 11v6M14 11v6M9 7V4h6v3m-9 0l1 13h8l1-13"
                                            />
                                        </svg>

                                        Hapus
                                    </button>
                                </form>

                            </div>

                        </div>

                    </div>

                @empty

                    <div class="px-6 py-14 text-center">

                        <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-full bg-slate-100 text-slate-400">
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
                                    d="M17 20h5v-2a4 4 0 00-4-4h-1M9 20H4v-2a4 4 0 014-4h1m4-8a4 4 0 11-8 0 4 4 0 018 0zm6 4a3 3 0 10-6 0 3 3 0 006 0z"
                                />
                            </svg>
                        </div>

                        <h3 class="mt-4 text-sm font-semibold text-slate-700">
                            Belum ada teknisi
                        </h3>

                        <p class="mt-1 text-sm text-slate-500">
                            Tambahkan teknisi untuk mulai mengelola akun teknisi.
                        </p>

                        <a
                            href="{{ route('admin.technicians.create') }}"
                            class="mt-5 inline-flex items-center rounded-lg bg-blue-600 px-4 py-2.5 text-sm font-semibold text-white hover:bg-blue-700"
                        >
                            Tambah Teknisi
                        </a>

                    </div>

                @endforelse


                {{-- PAGINATION --}}
                @if ($technicians->hasPages())

                    <div class="border-t border-slate-200 px-6 py-4">
                        {{ $technicians->links() }}
                    </div>

                @endif
            </div>

        </div>

    </div>

</x-layouts.auto-repair>