<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        {{ $repairGuide->judul_dtr }} - Auto Repair
    </title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-100 text-slate-800">

    {{-- NAVBAR --}}

    <header class="fixed left-0 right-0 top-0 z-50 h-16 border-b border-slate-200 bg-white">

        <div class="flex h-full items-center justify-between px-6">

            <div class="flex items-center gap-3">

                <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-slate-900 text-white">

                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="h-5 w-5"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor"
                         stroke-width="2">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M10.5 6h3m-6.75 4.5h9.5M7.5 15h9m-7.5 3h3m6.75-12.75a9 9 0 11-12.728 0A9 9 0 0118.75 5.25z" />

                    </svg>

                </div>

                <div>

                    <h1 class="text-sm font-bold text-slate-800">
                        Auto Repair
                    </h1>

                    <p class="text-xs text-slate-400">
                        Technician System
                    </p>

                </div>

            </div>


            <div class="flex items-center gap-3">

                <div class="hidden text-right sm:block">

                    <p class="text-sm font-semibold text-slate-700">
                        {{ Auth::user()->name }}
                    </p>

                    <p class="text-xs text-slate-400">
                        Teknisi
                    </p>

                </div>

                <div class="flex h-9 w-9 items-center justify-center rounded-full bg-slate-900 text-sm font-bold text-white">

                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}

                </div>

            </div>

        </div>

    </header>


    {{-- SIDEBAR --}}

    @include('technician.components.sidebar')


    {{-- MAIN --}}

    <main class="ml-64 min-h-screen bg-slate-100 pt-16">

        <div class="w-full px-6 py-8 lg:px-10 xl:px-12">

            {{-- BACK --}}

            <a href="{{ route('teknisi.repair-guides.index') }}"
               class="mb-5 inline-flex items-center gap-2 text-sm font-medium text-slate-500 transition hover:text-blue-600">

                <svg xmlns="http://www.w3.org/2000/svg"
                     class="h-4 w-4"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor"
                     stroke-width="2">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          d="M15 19l-7-7 7-7" />

                </svg>

                Kembali ke Panduan Perbaikan

            </a>


            {{-- HEADER --}}

            <div class="mb-6 flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">

                <div>

                    <div class="mb-2 flex flex-wrap items-center gap-2">

                        <span class="rounded-lg bg-blue-50 px-3 py-1 text-xs font-bold text-blue-700">
                            DTR #{{ $repairGuide->id }}
                        </span>

                        <span class="rounded-lg bg-green-50 px-3 py-1 text-xs font-bold text-green-700">
                            APPROVED
                        </span>

                    </div>

                    <h2 class="text-2xl font-bold tracking-tight text-slate-800">
                        {{ $repairGuide->judul_dtr }}
                    </h2>

                    <p class="mt-1 text-sm text-slate-500">
                        {{ $repairGuide->nama_dealer }}
                    </p>

                </div>


                {{-- DOWNLOAD PDF --}}

                <a href="{{ route('teknisi.repair-guides.pdf', $repairGuide) }}"
                   class="inline-flex items-center justify-center gap-2 rounded-xl bg-blue-600 px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700">

                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="h-5 w-5"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor"
                         stroke-width="2">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M12 16V4m0 12l-4-4m4 4l4-4M5 20h14" />

                    </svg>

                    Download PDF Laporan

                </a>

            </div>


            {{-- INFORMASI DTR --}}

            <section class="mb-6 overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

                <div class="border-b border-slate-200 px-6 py-5">

                    <h3 class="font-semibold text-slate-800">
                        Informasi DTR
                    </h3>

                </div>

                <div class="grid grid-cols-1 gap-6 p-6 md:grid-cols-2">

                    <div>
                        <p class="text-xs font-semibold uppercase text-slate-400">
                            Nama Dealer
                        </p>

                        <p class="mt-1 font-semibold text-slate-700">
                            {{ $repairGuide->nama_dealer }}
                        </p>
                    </div>

                    <div>
                        <p class="text-xs font-semibold uppercase text-slate-400">
                            Judul DTR
                        </p>

                        <p class="mt-1 font-semibold text-slate-700">
                            {{ $repairGuide->judul_dtr }}
                        </p>
                    </div>

                </div>

            </section>


            {{-- DATA KENDARAAN --}}

            <section class="mb-6 overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

                <div class="border-b border-slate-200 px-6 py-5">

                    <h3 class="font-semibold text-slate-800">
                        Data Kendaraan
                    </h3>

                </div>

                <div class="grid grid-cols-1 gap-6 p-6 sm:grid-cols-2 lg:grid-cols-3">

                    @php
                        $vehicleData = [
                            'No. Polisi' => $repairGuide->no_polisi,
                            'Model' => $repairGuide->model,
                            'Kode Model' => $repairGuide->kode_model,
                            'Tahun Pembuatan' => $repairGuide->tahun_pembuatan,
                            'No. Rangka' => $repairGuide->no_rangka,
                            'No. Mesin' => $repairGuide->no_mesin,
                            'Tgl. Penyerahan' => $repairGuide->tgl_penyerahan?->format('d M Y'),
                            'Tgl. Perbaikan' => $repairGuide->tgl_perbaikan?->format('d M Y'),
                            'Jarak Tempuh' => number_format($repairGuide->jarak_tempuh, 0, ',', '.') . ' km',
                        ];
                    @endphp

                    @foreach ($vehicleData as $label => $value)

                        <div>

                            <p class="text-xs font-semibold uppercase text-slate-400">
                                {{ $label }}
                            </p>

                            <p class="mt-1 font-semibold text-slate-700">
                                {{ $value ?: '-' }}
                            </p>

                        </div>

                    @endforeach

                </div>

            </section>


            {{-- CHECKLIST --}}

            <section class="mb-6 overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

                <div class="border-b border-slate-200 px-6 py-5">

                    <h3 class="font-semibold text-slate-800">
                        Checklist Pemeriksaan
                    </h3>

                    <p class="mt-1 text-sm text-slate-500">
                        Dokumentasi pemeriksaan kendaraan.
                    </p>

                </div>


                <div class="space-y-5 p-6">

                    @forelse ($repairGuide->checklists as $checklist)

                        <div class="rounded-2xl border border-slate-200 bg-slate-50 p-5">

                            <div class="mb-5 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">

                                <h4 class="font-semibold text-slate-800">

                                    {{ $loop->iteration }}.
                                    {{ $checklist->nama_checklist }}

                                </h4>


                                @if ($checklist->is_checked)

                                    <span class="w-fit rounded-lg bg-green-100 px-3 py-1 text-xs font-bold text-green-700">
                                        SUDAH DIPERIKSA
                                    </span>

                                @else

                                    <span class="w-fit rounded-lg bg-red-100 px-3 py-1 text-xs font-bold text-red-700">
                                        BELUM DIPERIKSA
                                    </span>

                                @endif

                            </div>


                            {{-- FOTO --}}

                            @if ($checklist->photos->count())

                                <div class="mb-5">

                                    <h5 class="mb-3 text-sm font-semibold text-slate-700">
                                        Foto Pemeriksaan
                                    </h5>

                                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">

                                        @foreach ($checklist->photos as $photo)

                                            <div class="overflow-hidden rounded-xl border border-slate-200 bg-white">

                                                <img src="{{ asset('storage/' . $photo->foto) }}"
                                                     alt="Foto pemeriksaan"
                                                     class="h-48 w-full object-cover">

                                                @if ($photo->caption)

                                                    <div class="p-3 text-xs text-slate-500">

                                                        {{ $photo->caption }}

                                                    </div>

                                                @endif

                                            </div>

                                        @endforeach

                                    </div>

                                </div>

                            @endif

{{-- VIDEO --}}
@if ($checklist->videos->count())

    <div>

        <h5 class="mb-3 text-sm font-semibold text-slate-700">
            Video Pemeriksaan
        </h5>

        <div class="grid grid-cols-1 gap-5 lg:grid-cols-2">

            @foreach ($checklist->videos as $video)

                <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

                    {{-- VIDEO PLAYER --}}
                    <div class="bg-black">

                        <video
                            controls
                            preload="metadata"
                            class="aspect-video w-full"
                        >
                            <source
                                src="{{ asset('storage/' . $video->video) }}"
                                type="video/{{ strtolower(pathinfo($video->video, PATHINFO_EXTENSION)) }}"
                            >

                            Browser Anda tidak mendukung pemutaran video.
                        </video>

                    </div>


                    {{-- VIDEO INFO --}}
                    <div class="p-4">

                        <div class="flex items-start justify-between gap-4">

                            <div class="min-w-0">

                                <p class="text-sm font-semibold text-slate-800">
                                    Video {{ $loop->iteration }}
                                </p>

                                @if ($video->caption)

                                    <p class="mt-1 text-sm leading-6 text-slate-500">
                                        {{ $video->caption }}
                                    </p>

                                @else

                                    <p class="mt-1 text-xs text-slate-400">
                                        Tidak ada caption.
                                    </p>

                                @endif

                            </div>


                            {{-- DOWNLOAD --}}
                            <a
                                href="{{ route('teknisi.repair-guides.videos.download', [
                                    'repairGuide' => $repairGuide,
                                    'video' => $video,
                                ]) }}"
                                class="inline-flex shrink-0 items-center gap-2 rounded-xl bg-blue-600 px-4 py-2.5 text-xs font-semibold text-white transition hover:bg-blue-700"
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

                                Download

                            </a>

                        </div>


                        {{-- FILE NAME --}}
                        <p class="mt-3 truncate text-xs text-slate-400">
                            {{ basename($video->video) }}
                        </p>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

@endif

                        </div>

                    @empty

                        <p class="text-sm text-slate-400">
                            Tidak ada checklist pemeriksaan.
                        </p>

                    @endforelse

                </div>

            </section>


            {{-- FILE PENDUKUNG --}}

            <section class="mb-6 overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

                <div class="border-b border-slate-200 px-6 py-5">

                    <h3 class="font-semibold text-slate-800">
                        File Pendukung
                    </h3>

                </div>

                <div class="space-y-3 p-6">

                    @forelse ($repairGuide->files as $file)

                        <div class="flex flex-col gap-3 rounded-xl border border-slate-200 bg-slate-50 p-4 sm:flex-row sm:items-center sm:justify-between">

                            <div>

                                <p class="text-sm font-semibold text-slate-700">
                                    {{ $file->nama_file }}
                                </p>

                                @if ($file->deskripsi)

                                    <p class="mt-1 text-xs text-slate-400">
                                        {{ $file->deskripsi }}
                                    </p>

                                @endif

                            </div>

                            <span class="w-fit rounded-lg bg-white px-3 py-1 text-xs font-semibold text-slate-500">

                                {{ strtoupper(pathinfo($file->file, PATHINFO_EXTENSION)) }}

                            </span>

                        </div>

                    @empty

                        <p class="text-sm text-slate-400">
                            Tidak ada file pendukung.
                        </p>

                    @endforelse

                </div>

            </section>


            {{-- CATATAN --}}

            <section class="mb-6 overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

                <div class="border-b border-slate-200 px-6 py-5">

                    <h3 class="font-semibold text-slate-800">
                        Catatan Keseluruhan
                    </h3>

                </div>

                <div class="p-6">

                    <div class="rounded-xl bg-slate-50 p-5 text-sm leading-7 text-slate-600">

                        {!! nl2br(e(
                            $repairGuide->catatan_keseluruhan
                            ?: 'Tidak ada catatan keseluruhan.'
                        )) !!}

                    </div>

                </div>

            </section>


            {{-- VERIFIKASI --}}

            <section class="overflow-hidden rounded-2xl border border-green-200 bg-green-50">

                <div class="p-6">

                    <div class="flex items-start gap-4">

                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-green-100 text-green-700">

                            ✓

                        </div>

                        <div>

                            <h3 class="font-semibold text-green-800">
                                Panduan Telah Diverifikasi
                            </h3>

                            <p class="mt-1 text-sm text-green-700">
                                Panduan ini telah disetujui oleh Super Admin dan dapat digunakan oleh Teknisi.
                            </p>

                            @if ($repairGuide->verifiedBy)

                                <p class="mt-3 text-xs text-green-700">

                                    Diverifikasi oleh:
                                    <strong>
                                        {{ $repairGuide->verifiedBy->name }}
                                    </strong>

                                    @if ($repairGuide->verified_at)

                                        pada
                                        {{ $repairGuide->verified_at->format('d M Y H:i') }}

                                    @endif

                                </p>

                            @endif

                        </div>

                    </div>

                </div>

            </section>

        </div>

    </main>

</body>
</html>