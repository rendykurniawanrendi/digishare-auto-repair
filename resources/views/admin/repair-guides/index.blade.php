<x-layouts.auto-repair
    title="Panduan Perbaikan"
    description="Kelola dan pantau seluruh Data Technical Report"
>

    <div class="w-full max-w-none">

            {{-- HEADER --}}
            <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

                <div>
                    <div class="mb-1 flex items-center gap-2 text-xs font-medium text-slate-400">
                        <span>Admin</span>
                        <span>/</span>
                        <span>DTR</span>
                    </div>

                    <h2 class="text-2xl font-bold text-slate-800">
                        Daftar DTR
                    </h2>

                    <p class="mt-1 text-sm text-slate-500">
                        Kelola dan pantau seluruh Data Technical Report.
                    </p>
                </div>

                <a href="{{ route('admin.repair-guides.create') }}"
                   class="inline-flex items-center justify-center gap-2 rounded-xl bg-slate-900 px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-slate-800">

                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="h-4 w-4"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor"
                         stroke-width="2">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M12 4v16m8-8H4"/>
                    </svg>

                    Buat DTR
                </a>

            </div>


            {{-- SUCCESS MESSAGE --}}
            @if(session('success'))
                <div class="mb-5 flex items-start gap-3 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-700">

                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="mt-0.5 h-5 w-5 shrink-0"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor"
                         stroke-width="2">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>

                    <span>{{ session('success') }}</span>
                </div>
            @endif


            {{-- SEARCH --}}
            <div class="mb-5 rounded-2xl border border-slate-200 bg-white p-4 shadow-sm">

                <form method="GET"
                      action="{{ route('admin.repair-guides.index') }}">

                    <div class="flex flex-col gap-3 sm:flex-row">

                        <div class="relative flex-1">

                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="absolute left-3 top-1/2 h-4 w-4 -translate-y-1/2 text-slate-400"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke="currentColor"
                                 stroke-width="2">
                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M21 21l-4.35-4.35m1.35-5.65a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>

                            <input
                                type="text"
                                name="search"
                                value="{{ request('search') }}"
                                placeholder="Cari judul DTR, dealer, nomor polisi, atau model..."
                                class="w-full rounded-xl border border-slate-200 bg-slate-50 py-2.5 pl-10 pr-4 text-sm text-slate-700 outline-none transition placeholder:text-slate-400 focus:border-slate-400 focus:bg-white focus:ring-2 focus:ring-slate-100"
                            >

                        </div>

                        <button type="submit"
                                class="rounded-xl bg-slate-900 px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-slate-800">
                            Cari
                        </button>

                        @if(request('search'))
                            <a href="{{ route('admin.repair-guides.index') }}"
                               class="inline-flex items-center justify-center rounded-xl border border-slate-200 px-5 py-2.5 text-sm font-semibold text-slate-600 transition hover:bg-slate-50">
                                Reset
                            </a>
                        @endif

                    </div>

                </form>

            </div>


            {{-- TABLE --}}
            <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

                <div class="overflow-x-auto">

                    <table class="w-full min-w-[1050px] text-left">

                        {{-- TABLE HEADER --}}
                        <thead class="border-b border-slate-200 bg-slate-50">

                            <tr>

                                <th class="w-[19%] px-6 py-4 text-xs font-bold uppercase tracking-wide text-slate-500">
                                    DTR
                                </th>

                                <th class="w-[18%] px-6 py-4 text-xs font-bold uppercase tracking-wide text-slate-500">
                                    Kendaraan
                                </th>

                                <th class="w-[17%] px-6 py-4 text-xs font-bold uppercase tracking-wide text-slate-500">
                                    Dealer
                                </th>

                                <th class="w-[19%] px-6 py-4 text-xs font-bold uppercase tracking-wide text-slate-500">
                                    Data
                                </th>

                                <th class="w-[15%] px-6 py-4 text-xs font-bold uppercase tracking-wide text-slate-500">
                                    Status
                                </th>

                                <th class="w-[12%] px-6 py-4 text-right text-xs font-bold uppercase tracking-wide text-slate-500">
                                    Tindakan
                                </th>

                            </tr>

                        </thead>


                        {{-- TABLE BODY --}}
                        <tbody class="divide-y divide-slate-100">

                        @forelse($guides as $guide)

                            @php
                                $checklistCount = $guide->checklists->count();

                                $photoCount = $guide->checklists
                                    ->sum(fn ($checklist) => $checklist->photos->count());

                                $videoCount = $guide->checklists
                                    ->sum(fn ($checklist) => $checklist->videos->count());

                                $fileCount = $guide->files->count();
                            @endphp


                            <tr class="transition hover:bg-slate-50/70">


                                {{-- DTR --}}
                                <td class="px-6 py-5 align-middle">

                                    <div class="max-w-[220px]">

                                        <p class="truncate text-base font-bold text-slate-800"
                                           title="{{ $guide->judul_dtr }}">
                                            {{ $guide->judul_dtr }}
                                        </p>

                                        <p class="mt-1 text-xs font-medium text-slate-400">
                                            DTR #{{ $guide->id }}
                                        </p>

                                        <p class="mt-2 text-xs text-slate-400">
                                            Dibuat {{ $guide->created_at->format('d M Y') }}
                                        </p>

                                    </div>

                                </td>


                                {{-- KENDARAAN --}}
                                <td class="px-6 py-5 align-middle">

                                    <div class="space-y-1">

                                        <p class="text-sm font-semibold text-slate-800">
                                            {{ $guide->model }}
                                        </p>

                                        <p class="text-xs text-slate-500">
                                            Kode:
                                            <span class="font-medium text-slate-700">
                                                {{ $guide->kode_model }}
                                            </span>
                                        </p>

                                        <p class="text-xs text-slate-500">
                                            No. Polisi:
                                            <span class="font-medium text-slate-700">
                                                {{ $guide->no_polisi }}
                                            </span>
                                        </p>

                                        <p class="text-xs text-slate-400">
                                            Tahun {{ $guide->tahun_pembuatan }}
                                        </p>

                                    </div>

                                </td>


                                {{-- DEALER --}}
                                <td class="px-6 py-5 align-middle">

                                    <p class="max-w-[180px] text-sm font-semibold leading-5 text-slate-700">
                                        {{ $guide->nama_dealer }}
                                    </p>

                                </td>


                                {{-- DATA --}}
                                <td class="px-6 py-5 align-middle">

                                    <div class="grid grid-cols-2 gap-x-5 gap-y-3">

                                        {{-- Checklist --}}
                                        <div class="flex items-center gap-2">

                                            <div class="flex h-7 w-7 shrink-0 items-center justify-center rounded-lg bg-slate-100 text-slate-500">

                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                     class="h-4 w-4"
                                                     fill="none"
                                                     viewBox="0 0 24 24"
                                                     stroke="currentColor"
                                                     stroke-width="2">
                                                    <path stroke-linecap="round"
                                                          stroke-linejoin="round"
                                                          d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                                </svg>

                                            </div>

                                            <div>
                                                <p class="text-[11px] text-slate-400">
                                                    Checklist
                                                </p>

                                                <p class="text-sm font-bold text-slate-700">
                                                    {{ $checklistCount }}
                                                </p>
                                            </div>

                                        </div>


                                        {{-- Foto --}}
                                        <div class="flex items-center gap-2">

                                            <div class="flex h-7 w-7 shrink-0 items-center justify-center rounded-lg bg-slate-100 text-slate-500">

                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                     class="h-4 w-4"
                                                     fill="none"
                                                     viewBox="0 0 24 24"
                                                     stroke="currentColor"
                                                     stroke-width="2">
                                                    <path stroke-linecap="round"
                                                          stroke-linejoin="round"
                                                          d="M3 7h4l2-2h6l2 2h4v12H3V7z"/>
                                                    <circle cx="12"
                                                            cy="13"
                                                            r="3"/>
                                                </svg>

                                            </div>

                                            <div>
                                                <p class="text-[11px] text-slate-400">
                                                    Foto
                                                </p>

                                                <p class="text-sm font-bold text-slate-700">
                                                    {{ $photoCount }}
                                                </p>
                                            </div>

                                        </div>


                                        {{-- Video --}}
                                        <div class="flex items-center gap-2">

                                            <div class="flex h-7 w-7 shrink-0 items-center justify-center rounded-lg bg-slate-100 text-slate-500">

                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                     class="h-4 w-4"
                                                     fill="none"
                                                     viewBox="0 0 24 24"
                                                     stroke="currentColor"
                                                     stroke-width="2">
                                                    <path stroke-linecap="round"
                                                          stroke-linejoin="round"
                                                          d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                                                </svg>

                                            </div>

                                            <div>
                                                <p class="text-[11px] text-slate-400">
                                                    Video
                                                </p>

                                                <p class="text-sm font-bold text-slate-700">
                                                    {{ $videoCount }}
                                                </p>
                                            </div>

                                        </div>


                                        {{-- File --}}
                                        <div class="flex items-center gap-2">

                                            <div class="flex h-7 w-7 shrink-0 items-center justify-center rounded-lg bg-slate-100 text-slate-500">

                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                     class="h-4 w-4"
                                                     fill="none"
                                                     viewBox="0 0 24 24"
                                                     stroke="currentColor"
                                                     stroke-width="2">
                                                    <path stroke-linecap="round"
                                                          stroke-linejoin="round"
                                                          d="M7 7h10l4 4v8a2 2 0 01-2 2H7a2 2 0 01-2-2V7z"/>
                                                    <path stroke-linecap="round"
                                                          stroke-linejoin="round"
                                                          d="M7 7V3h6l4 4"/>
                                                </svg>

                                            </div>

                                            <div>
                                                <p class="text-[11px] text-slate-400">
                                                    File
                                                </p>

                                                <p class="text-sm font-bold text-slate-700">
                                                    {{ $fileCount }}
                                                </p>
                                            </div>

                                        </div>

                                    </div>

                                </td>


                                {{-- STATUS --}}
                                <td class="px-6 py-5 align-middle">

                                    @if($guide->status === 'approved')

                                        <span class="inline-flex items-center gap-2 rounded-full bg-emerald-50 px-3 py-1.5 text-xs font-semibold text-emerald-700">

                                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>

                                            Disetujui

                                        </span>

                                    @elseif($guide->status === 'rejected')

                                        <span class="inline-flex items-center gap-2 rounded-full bg-red-50 px-3 py-1.5 text-xs font-semibold text-red-700">

                                            <span class="h-1.5 w-1.5 rounded-full bg-red-500"></span>

                                            Ditolak

                                        </span>

                                    @else

                                        <span class="inline-flex items-center gap-2 whitespace-nowrap rounded-full bg-amber-50 px-3 py-1.5 text-xs font-semibold text-amber-700">

                                            <span class="h-1.5 w-1.5 rounded-full bg-amber-500"></span>

                                            Menunggu Verifikasi

                                        </span>

                                    @endif

                                </td>


                                {{-- TINDAKAN --}}
                                <td class="px-6 py-5 align-middle">

                                    <div class="flex items-center justify-end gap-2">

                                        {{-- Lihat --}}
                                        <a href="{{ route('admin.repair-guides.show', $guide) }}"
                                           class="inline-flex h-9 items-center justify-center rounded-lg border border-slate-200 bg-white px-3 text-xs font-semibold text-slate-600 transition hover:border-slate-300 hover:bg-slate-50 hover:text-slate-800">
                                            Lihat
                                        </a>


                                        {{-- Edit --}}
                                        <a href="{{ route('admin.repair-guides.edit', $guide) }}"
                                           class="inline-flex h-9 items-center justify-center rounded-lg border border-blue-200 bg-blue-50 px-3 text-xs font-semibold text-blue-700 transition hover:bg-blue-100">
                                            Edit
                                        </a>


                                        {{-- Hapus --}}
                                        <form action="{{ route('admin.repair-guides.destroy', $guide) }}"
                                              method="POST"
                                              onsubmit="return confirm('Apakah Anda yakin ingin menghapus DTR ini?')">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="inline-flex h-9 items-center justify-center rounded-lg border border-red-200 bg-red-50 px-3 text-xs font-semibold text-red-600 transition hover:bg-red-100">
                                                Hapus
                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="6"
                                    class="px-6 py-16 text-center">

                                    <div class="mx-auto flex max-w-sm flex-col items-center">

                                        <div class="mb-4 flex h-14 w-14 items-center justify-center rounded-2xl bg-slate-100 text-slate-400">

                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 class="h-7 w-7"
                                                 fill="none"
                                                 viewBox="0 0 24 24"
                                                 stroke="currentColor"
                                                 stroke-width="1.5">
                                                <path stroke-linecap="round"
                                                      stroke-linejoin="round"
                                                      d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                            </svg>

                                        </div>

                                        <h3 class="text-sm font-bold text-slate-700">
                                            Belum ada DTR
                                        </h3>

                                        <p class="mt-1 text-sm text-slate-400">
                                            Belum ada Data Technical Report yang tersedia.
                                        </p>

                                        <a href="{{ route('admin.repair-guides.create') }}"
                                           class="mt-5 rounded-xl bg-slate-900 px-4 py-2.5 text-xs font-semibold text-white transition hover:bg-slate-800">
                                            Buat DTR
                                        </a>

                                    </div>

                                </td>

                            </tr>

                        @endforelse

                        </tbody>

                    </table>

                </div>


                {{-- PAGINATION --}}
                @if($guides->hasPages())

                    <div class="border-t border-slate-100 px-6 py-4">
                        {{ $guides->links() }}
                    </div>

                @endif

                     </div>

        </div>

    </div>

</x-layouts.auto-repair>