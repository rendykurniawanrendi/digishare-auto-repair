<x-layouts.auto-repair
    title=""
    description=""
>

    <div class="w-full max-w-none">

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
                        Judul Panduan
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

                        'Tgl. Penyerahan' =>
                            $repairGuide->tgl_penyerahan?->format('d M Y'),

                        'Tgl. Perbaikan' =>
                            $repairGuide->tgl_perbaikan?->format('d M Y'),

                        'Jarak Tempuh' =>
                            number_format(
                                $repairGuide->jarak_tempuh,
                                0,
                                ',',
                                '.'
                            ) . ' km',

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

                                            <img
                                                src="{{ asset('storage/' . $photo->foto) }}"
                                                alt="Foto pemeriksaan"
                                                class="h-48 w-full object-cover"
                                            >

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

                            <div class="mt-6">

                                <h5 class="mb-3 text-sm font-semibold text-slate-700">
                                    Link Video Pemeriksaan Beserta File Pendukung
                                </h5>


                                <div class="grid grid-cols-1 gap-5 lg:grid-cols-2">

                                    @foreach ($checklist->videos as $video)

                                        <div class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm">

                                            <div class="flex items-start gap-3">

                                                {{-- ICON VIDEO --}}
                                                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-blue-50 text-blue-600">

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
                                                            d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 19h8a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"
                                                        />

                                                    </svg>

                                                </div>


                                                {{-- INFO VIDEO --}}
                                                <div class="min-w-0 flex-1">

                                                    <p class="text-sm font-semibold text-slate-800">
                                                        Panduan {{ $loop->iteration }}
                                                    </p>


                                                    @if ($video->caption)

                                                        <p class="mt-1 text-sm leading-6 text-slate-500">
                                                            {{ $video->caption }}
                                                        </p>

                                                    @else

                                                        <p class="mt-1 text-xs text-slate-400">
                                                            Tidak ada keterangan video.
                                                        </p>

                                                    @endif

                                                </div>

                                            </div>


                                            {{-- LINK VIDEO --}}
                                            <a
                                                href="{{ $video->video }}"
                                                target="_blank"
                                                rel="noopener noreferrer"
                                                class="mt-4 inline-flex w-full items-center justify-center gap-2 rounded-xl bg-blue-600 px-4 py-2.5 text-xs font-semibold text-white transition hover:bg-blue-700"
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
                                                        d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 00-2-2v-4M14 4h6m0 0v6m0-6L10 14"
                                                    />

                                                </svg>

                                                Lihat Video

                                            </a>

                                        </div>

                                    @endforeach

                                </div>

                            </div>

                        @endif


                        {{-- TIDAK ADA DOKUMENTASI --}}
                        @if (
                            !$checklist->photos->count() &&
                            !$checklist->videos->count()
                        )

                            <div class="mt-5 rounded-xl border border-dashed border-slate-200 bg-slate-50 px-4 py-5 text-center">

                                <p class="text-xs text-slate-400">
                                    Tidak ada dokumentasi untuk checklist ini.
                                </p>

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


      


        {{-- CATATAN --}}
        <section class="mb-6 overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

            <div class="border-b border-slate-200 px-6 py-5">

                <h3 class="font-semibold text-slate-800">
                    Catatan Keseluruhan
                </h3>

            </div>


            <div class="p-6">

                <div class="rounded-xl bg-slate-50 p-5 text-sm leading-7 text-slate-600">

                    {!! nl2br(
                        e(
                            $repairGuide->catatan_keseluruhan
                            ?: 'Tidak ada catatan keseluruhan.'
                        )
                    ) !!}

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

</x-layouts.auto-repair>