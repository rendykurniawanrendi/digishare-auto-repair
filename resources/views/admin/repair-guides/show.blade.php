<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $repairGuide->judul_dtr }} - Auto Repair</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-100 text-slate-800">

    {{-- NAVBAR --}}
    <nav class="fixed left-0 right-0 top-0 z-50 h-16 border-b border-slate-200 bg-white">
        <div class="flex h-full items-center justify-between px-6">

            <div class="flex items-center gap-3">

                <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-slate-900 text-sm font-bold text-white">
                    AR
                </div>

                <div>
                    <h1 class="text-sm font-bold tracking-wide text-slate-800">
                        AUTO REPAIR
                    </h1>

                    <p class="text-[10px] text-slate-400">
                        Internal Management System
                    </p>
                </div>

            </div>


            <div class="flex items-center gap-3">

                <div class="hidden text-right sm:block">
                    <p class="text-sm font-semibold text-slate-700">
                        {{ auth()->user()->name }}
                    </p>

                    <p class="text-xs text-slate-400">
                        Administrator
                    </p>
                </div>

                <div class="flex h-9 w-9 items-center justify-center rounded-full bg-slate-800 text-sm font-semibold text-white">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>

            </div>

        </div>
    </nav>


    {{-- SIDEBAR --}}
    @include('admin.components.sidebar')


    {{-- MAIN --}}
    <main class="ml-64 pt-16">

        <div class="px-6 py-6">

            {{-- HEADER --}}
            <div class="mb-6">

                <div class="mb-2 flex items-center gap-2 text-xs font-medium text-slate-400">
                    <a href="{{ route('admin.repair-guides.index') }}"
                       class="transition hover:text-slate-700">
                        Daftar DTR
                    </a>

                    <span>/</span>

                    <span>Detail DTR</span>
                </div>


                <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">

                    <div>

                        <h2 class="text-2xl font-bold text-slate-800">
                            {{ $repairGuide->judul_dtr }}
                        </h2>

                        <p class="mt-1 text-sm text-slate-500">
                            Detail Data Technical Report #{{ $repairGuide->id }}
                        </p>

                    </div>


                    <div class="flex items-center gap-2">

                        <a href="{{ route('admin.repair-guides.index') }}"
                           class="inline-flex items-center gap-2 rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm font-semibold text-slate-600 transition hover:bg-slate-50">

                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="h-4 w-4"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke="currentColor"
                                 stroke-width="2">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M15 19l-7-7 7-7"/>

                            </svg>

                            Kembali

                        </a>


                        <a href="{{ route('admin.repair-guides.edit', $repairGuide) }}"
                           class="inline-flex items-center gap-2 rounded-xl bg-blue-600 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-blue-700">

                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="h-4 w-4"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke="currentColor"
                                 stroke-width="2">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/>

                            </svg>

                            Edit DTR

                        </a>

                    </div>

                </div>

            </div>


            {{-- SUCCESS --}}
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

                    <span>
                        {{ session('success') }}
                    </span>

                </div>

            @endif


            {{-- STATUS --}}
            <div class="mb-6 rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">

                <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

                    <div>

                        <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">
                            Status DTR
                        </p>

                        <div class="mt-2">

                            @if($repairGuide->status === 'approved')

                                <span class="inline-flex items-center gap-2 rounded-full bg-emerald-50 px-3 py-1.5 text-xs font-semibold text-emerald-700">

                                    <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>

                                    Disetujui

                                </span>

                            @elseif($repairGuide->status === 'rejected')

                                <span class="inline-flex items-center gap-2 rounded-full bg-red-50 px-3 py-1.5 text-xs font-semibold text-red-700">

                                    <span class="h-1.5 w-1.5 rounded-full bg-red-500"></span>

                                    Ditolak

                                </span>

                            @else

                                <span class="inline-flex items-center gap-2 rounded-full bg-amber-50 px-3 py-1.5 text-xs font-semibold text-amber-700">

                                    <span class="h-1.5 w-1.5 rounded-full bg-amber-500"></span>

                                    Menunggu Verifikasi

                                </span>

                            @endif

                        </div>

                    </div>


                    <div class="text-sm text-slate-400">

                        Dibuat
                        <span class="font-medium text-slate-600">
                            {{ $repairGuide->created_at->format('d M Y H:i') }}
                        </span>

                    </div>

                </div>

            </div>


            {{-- INFORMASI DTR --}}
            <div class="mb-6 rounded-2xl border border-slate-200 bg-white shadow-sm">

                <div class="border-b border-slate-100 px-6 py-4">

                    <h3 class="text-base font-bold text-slate-800">
                        Informasi DTR
                    </h3>

                    <p class="mt-1 text-xs text-slate-400">
                        Informasi utama Data Technical Report.
                    </p>

                </div>


                <div class="grid gap-6 p-6 md:grid-cols-2">

                    <div>
                        <p class="text-xs font-medium text-slate-400">
                            Nama Dealer
                        </p>

                        <p class="mt-1 text-sm font-semibold text-slate-700">
                            {{ $repairGuide->nama_dealer }}
                        </p>
                    </div>


                    <div>
                        <p class="text-xs font-medium text-slate-400">
                            Judul DTR
                        </p>

                        <p class="mt-1 text-sm font-semibold text-slate-700">
                            {{ $repairGuide->judul_dtr }}
                        </p>
                    </div>

                </div>

            </div>


            {{-- DATA KENDARAAN --}}
            <div class="mb-6 rounded-2xl border border-slate-200 bg-white shadow-sm">

                <div class="border-b border-slate-100 px-6 py-4">

                    <h3 class="text-base font-bold text-slate-800">
                        Data Kendaraan
                    </h3>

                    <p class="mt-1 text-xs text-slate-400">
                        Informasi kendaraan yang diperiksa.
                    </p>

                </div>


                <div class="grid gap-x-8 gap-y-6 p-6 sm:grid-cols-2 lg:grid-cols-3">

                    <div>
                        <p class="text-xs text-slate-400">No. Polisi</p>
                        <p class="mt-1 text-sm font-semibold text-slate-700">
                            {{ $repairGuide->no_polisi }}
                        </p>
                    </div>


                    <div>
                        <p class="text-xs text-slate-400">Model</p>
                        <p class="mt-1 text-sm font-semibold text-slate-700">
                            {{ $repairGuide->model }}
                        </p>
                    </div>


                    <div>
                        <p class="text-xs text-slate-400">Kode Model</p>
                        <p class="mt-1 text-sm font-semibold text-slate-700">
                            {{ $repairGuide->kode_model }}
                        </p>
                    </div>


                    <div>
                        <p class="text-xs text-slate-400">Tahun Pembuatan</p>
                        <p class="mt-1 text-sm font-semibold text-slate-700">
                            {{ $repairGuide->tahun_pembuatan }}
                        </p>
                    </div>


                    <div>
                        <p class="text-xs text-slate-400">No. Rangka</p>
                        <p class="mt-1 break-all text-sm font-semibold text-slate-700">
                            {{ $repairGuide->no_rangka }}
                        </p>
                    </div>


                    <div>
                        <p class="text-xs text-slate-400">No. Mesin</p>
                        <p class="mt-1 break-all text-sm font-semibold text-slate-700">
                            {{ $repairGuide->no_mesin }}
                        </p>
                    </div>


                    <div>
                        <p class="text-xs text-slate-400">Tgl Penyerahan</p>
                        <p class="mt-1 text-sm font-semibold text-slate-700">
                            {{ $repairGuide->tgl_penyerahan?->format('d M Y') ?? '-' }}
                        </p>
                    </div>


                    <div>
                        <p class="text-xs text-slate-400">Tgl Perbaikan</p>
                        <p class="mt-1 text-sm font-semibold text-slate-700">
                            {{ $repairGuide->tgl_perbaikan?->format('d M Y') ?? '-' }}
                        </p>
                    </div>


                    <div>
                        <p class="text-xs text-slate-400">Jarak Tempuh</p>
                        <p class="mt-1 text-sm font-semibold text-slate-700">
                            {{ number_format($repairGuide->jarak_tempuh, 0, ',', '.') }} km
                        </p>
                    </div>

                </div>

            </div>


            {{-- CHECKLIST --}}
            <div class="mb-6 rounded-2xl border border-slate-200 bg-white shadow-sm">

                <div class="border-b border-slate-100 px-6 py-4">

                    <h3 class="text-base font-bold text-slate-800">
                        Checklist Pemeriksaan
                    </h3>

                    <p class="mt-1 text-xs text-slate-400">
                        Daftar pemeriksaan dan dokumentasi setiap checklist.
                    </p>

                </div>


                <div class="divide-y divide-slate-100">

                    @forelse($repairGuide->checklists as $checklist)

                        <div class="p-6">

                            {{-- Checklist Header --}}
                            <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">

                                <div class="flex items-center gap-3">

                                    <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-slate-100 text-sm font-bold text-slate-600">
                                        {{ $loop->iteration }}
                                    </div>

                                    <div>

                                        <p class="text-sm font-semibold text-slate-800">
                                            {{ $checklist->nama_checklist }}
                                        </p>

                                        <p class="mt-0.5 text-xs text-slate-400">
                                            Checklist pemeriksaan
                                        </p>

                                    </div>

                                </div>


                                @if($checklist->is_checked)

                                    <span class="inline-flex w-fit items-center gap-2 rounded-full bg-emerald-50 px-3 py-1.5 text-xs font-semibold text-emerald-700">

                                        <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>

                                        Sudah Diperiksa

                                    </span>

                                @else

                                    <span class="inline-flex w-fit items-center gap-2 rounded-full bg-slate-100 px-3 py-1.5 text-xs font-semibold text-slate-500">

                                        <span class="h-1.5 w-1.5 rounded-full bg-slate-400"></span>

                                        Belum Diperiksa

                                    </span>

                                @endif

                            </div>


                            {{-- FOTO --}}
                            @if($checklist->photos->count())

                                <div class="mt-6">

                                    <div class="mb-3 flex items-center justify-between">

                                        <h4 class="text-sm font-semibold text-slate-700">
                                            Foto Pemeriksaan
                                        </h4>

                                        <span class="text-xs text-slate-400">
                                            {{ $checklist->photos->count() }} foto
                                        </span>

                                    </div>


                                    <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">

                                        @foreach($checklist->photos as $photo)

                                            <div class="overflow-hidden rounded-xl border border-slate-200 bg-slate-50">

                                                <a href="{{ asset('storage/' . $photo->foto) }}"
                                                   target="_blank">

                                                    <img
                                                        src="{{ asset('storage/' . $photo->foto) }}"
                                                        alt="{{ $photo->caption ?? 'Foto pemeriksaan' }}"
                                                        class="h-48 w-full object-cover transition hover:scale-[1.02]"
                                                    >

                                                </a>


                                                @if($photo->caption)

                                                    <div class="border-t border-slate-200 bg-white px-4 py-3">

                                                        <p class="text-xs leading-5 text-slate-600">
                                                            {{ $photo->caption }}
                                                        </p>

                                                    </div>

                                                @endif

                                            </div>

                                        @endforeach

                                    </div>

                                </div>

                            @endif


                            {{-- VIDEO --}}
                            @if($checklist->videos->count())

                                <div class="mt-6">

                                    <div class="mb-3 flex items-center justify-between">

                                        <h4 class="text-sm font-semibold text-slate-700">
                                            Video Pemeriksaan
                                        </h4>

                                        <span class="text-xs text-slate-400">
                                            {{ $checklist->videos->count() }} video
                                        </span>

                                    </div>


                                    <div class="grid gap-5 lg:grid-cols-2">

                                        @foreach($checklist->videos as $video)

                                            <div class="overflow-hidden rounded-xl border border-slate-200 bg-slate-50">

                                                <video
                                                    controls
                                                    preload="metadata"
                                                    class="h-56 w-full bg-black object-contain">

                                                    <source
                                                        src="{{ asset('storage/' . $video->video) }}">

                                                    Browser Anda tidak mendukung video.

                                                </video>


                                                @if($video->caption)

                                                    <div class="border-t border-slate-200 bg-white px-4 py-3">

                                                        <p class="text-xs leading-5 text-slate-600">
                                                            {{ $video->caption }}
                                                        </p>

                                                    </div>

                                                @endif

                                            </div>

                                        @endforeach

                                    </div>

                                </div>

                            @endif


                            {{-- EMPTY DOCUMENTATION --}}
                            @if(!$checklist->photos->count() && !$checklist->videos->count())

                                <div class="mt-5 rounded-xl border border-dashed border-slate-200 bg-slate-50 px-4 py-5 text-center">

                                    <p class="text-xs text-slate-400">
                                        Belum ada foto atau video untuk checklist ini.
                                    </p>

                                </div>

                            @endif

                        </div>

                    @empty

                        <div class="px-6 py-12 text-center">

                            <p class="text-sm text-slate-400">
                                Belum ada checklist pemeriksaan.
                            </p>

                        </div>

                    @endforelse

                </div>

            </div>


            {{-- FILE PENDUKUNG --}}
            <div class="mb-6 rounded-2xl border border-slate-200 bg-white shadow-sm">

                <div class="border-b border-slate-100 px-6 py-4">

                    <h3 class="text-base font-bold text-slate-800">
                        File Pendukung
                    </h3>

                    <p class="mt-1 text-xs text-slate-400">
                        Dokumen pendukung yang dilampirkan pada DTR.
                    </p>

                </div>


                <div class="p-6">

                    @forelse($repairGuide->files as $file)

                        <div class="mb-3 flex flex-col gap-4 rounded-xl border border-slate-200 bg-slate-50 p-4 sm:flex-row sm:items-center sm:justify-between">

                            <div class="flex min-w-0 items-center gap-3">

                                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-white text-slate-500 shadow-sm">

                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         class="h-5 w-5"
                                         fill="none"
                                         viewBox="0 0 24 24"
                                         stroke="currentColor"
                                         stroke-width="1.8">

                                        <path stroke-linecap="round"
                                              stroke-linejoin="round"
                                              d="M7 7V3h6l4 4v14H7a2 2 0 01-2-2V7h2z"/>

                                        <path stroke-linecap="round"
                                              stroke-linejoin="round"
                                              d="M13 3v5h5"/>

                                    </svg>

                                </div>


                                <div class="min-w-0">

                                    <p class="truncate text-sm font-semibold text-slate-700">
                                        {{ $file->nama_file }}
                                    </p>

                                    @if($file->deskripsi)

                                        <p class="mt-1 text-xs text-slate-400">
                                            {{ $file->deskripsi }}
                                        </p>

                                    @endif

                                </div>

                            </div>


                            <a href="{{ asset('storage/' . $file->file) }}"
                               target="_blank"
                               class="inline-flex shrink-0 items-center justify-center gap-2 rounded-lg border border-slate-200 bg-white px-4 py-2 text-xs font-semibold text-slate-600 transition hover:bg-slate-100">

                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="h-4 w-4"
                                     fill="none"
                                     viewBox="0 0 24 24"
                                     stroke="currentColor"
                                     stroke-width="2">

                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>

                                </svg>

                                Buka File

                            </a>

                        </div>

                    @empty

                        <div class="rounded-xl border border-dashed border-slate-200 bg-slate-50 px-4 py-8 text-center">

                            <p class="text-sm text-slate-400">
                                Belum ada file pendukung.
                            </p>

                        </div>

                    @endforelse

                </div>

            </div>


            {{-- CATATAN KESELURUHAN --}}
            <div class="mb-6 rounded-2xl border border-slate-200 bg-white shadow-sm">

                <div class="border-b border-slate-100 px-6 py-4">

                    <h3 class="text-base font-bold text-slate-800">
                        Catatan Keseluruhan
                    </h3>

                </div>


                <div class="p-6">

                    @if($repairGuide->catatan_keseluruhan)

                        <div class="rounded-xl bg-slate-50 p-5">

                            <p class="whitespace-pre-line text-sm leading-7 text-slate-600">
                                {{ $repairGuide->catatan_keseluruhan }}
                            </p>

                        </div>

                    @else

                        <p class="text-sm text-slate-400">
                            Tidak ada catatan keseluruhan.
                        </p>

                    @endif

                </div>

            </div>


            {{-- VERIFICATION INFO --}}
            @if($repairGuide->verified_by || $repairGuide->verified_at || $repairGuide->rejection_reason)

                <div class="mb-6 rounded-2xl border border-slate-200 bg-white shadow-sm">

                    <div class="border-b border-slate-100 px-6 py-4">

                        <h3 class="text-base font-bold text-slate-800">
                            Informasi Verifikasi
                        </h3>

                    </div>


                    <div class="grid gap-6 p-6 sm:grid-cols-2">

                        @if($repairGuide->verifiedBy)

                            <div>

                                <p class="text-xs text-slate-400">
                                    Diverifikasi Oleh
                                </p>

                                <p class="mt-1 text-sm font-semibold text-slate-700">
                                    {{ $repairGuide->verifiedBy->name }}
                                </p>

                            </div>

                        @endif


                        @if($repairGuide->verified_at)

                            <div>

                                <p class="text-xs text-slate-400">
                                    Waktu Verifikasi
                                </p>

                                <p class="mt-1 text-sm font-semibold text-slate-700">
                                    {{ $repairGuide->verified_at->format('d M Y H:i') }}
                                </p>

                            </div>

                        @endif

                    </div>


                    @if($repairGuide->rejection_reason)

                        <div class="border-t border-slate-100 px-6 py-5">

                            <p class="text-xs font-semibold text-red-500">
                                Alasan Penolakan
                            </p>

                            <p class="mt-2 whitespace-pre-line text-sm leading-6 text-slate-600">
                                {{ $repairGuide->rejection_reason }}
                            </p>

                        </div>

                    @endif

                </div>

            @endif


            {{-- FOOTER ACTION --}}
            <div class="flex justify-end pb-8">

                <a href="{{ route('admin.repair-guides.index') }}"
                   class="inline-flex items-center gap-2 rounded-xl border border-slate-200 bg-white px-5 py-3 text-sm font-semibold text-slate-600 transition hover:bg-slate-50">

                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="h-4 w-4"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor"
                         stroke-width="2">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M15 19l-7-7 7-7"/>

                    </svg>

                    Kembali ke Daftar DTR

                </a>

            </div>

        </div>

    </main>

</body>

</html>