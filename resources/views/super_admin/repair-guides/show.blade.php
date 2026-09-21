<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Verifikasi DTR - Auto Repair</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-100 text-slate-800">

    {{-- NAVBAR --}}
    <header class="fixed left-0 right-0 top-0 z-50 h-16 border-b border-slate-200 bg-white">

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
                        Super Admin
                    </p>

                </div>


                <div class="flex h-9 w-9 items-center justify-center rounded-full bg-slate-900 text-sm font-bold text-white">

                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}

                </div>

            </div>

        </div>

    </header>


    {{-- SIDEBAR --}}
    @include('super_admin.components.sidebar')


    {{-- MAIN --}}
    <main class="ml-64 min-h-screen bg-slate-100 pt-16">

        <div class="px-6 py-7 lg:px-10">

            {{-- HEADER --}}
            <div class="mb-6">

                <a
                    href="{{ route('super_admin.repair-guides.index') }}"
                    class="mb-3 inline-flex items-center gap-2 text-sm font-medium text-slate-500 transition hover:text-slate-800">

                    ← Kembali ke Verifikasi Panduan

                </a>


                <div class="flex flex-col gap-4 lg:flex-row lg:items-end lg:justify-between">

                    <div>

                        <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">
                            Super Admin
                        </p>

                        <h2 class="mt-1 text-2xl font-bold text-slate-800">
                            Verifikasi DTR
                        </h2>

                        <p class="mt-1 text-sm text-slate-500">
                            Periksa Data Technical Report sebelum disetujui.
                        </p>

                    </div>


                    {{-- STATUS --}}
                    <div>

                        @if($repairGuide->status === 'approved')

                            <span class="inline-flex items-center gap-2 rounded-full bg-emerald-50 px-4 py-2 text-xs font-semibold text-emerald-700">

                                <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>

                                Disetujui

                            </span>

                        @elseif($repairGuide->status === 'rejected')

                            <span class="inline-flex items-center gap-2 rounded-full bg-red-50 px-4 py-2 text-xs font-semibold text-red-700">

                                <span class="h-1.5 w-1.5 rounded-full bg-red-500"></span>

                                Ditolak

                            </span>

                        @else

                            <span class="inline-flex items-center gap-2 rounded-full bg-amber-50 px-4 py-2 text-xs font-semibold text-amber-700">

                                <span class="h-1.5 w-1.5 rounded-full bg-amber-500"></span>

                                Menunggu Verifikasi

                            </span>

                        @endif

                    </div>

                </div>

            </div>


            {{-- SUCCESS --}}
            @if(session('success'))

                <div class="mb-6 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-700">

                    {{ session('success') }}

                </div>

            @endif


            {{-- =====================================================
                INFORMASI DTR
            ====================================================== --}}

            <div class="mb-6 overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

                <div class="border-b border-slate-100 px-6 py-5">

                    <h3 class="text-base font-bold text-slate-800">
                        Informasi DTR
                    </h3>

                    <p class="mt-1 text-xs text-slate-400">
                        Informasi utama Data Technical Report.
                    </p>

                </div>


                <div class="grid gap-6 p-6 md:grid-cols-2">

                    <div>

                        <p class="text-xs text-slate-400">
                            Judul DTR
                        </p>

                        <p class="mt-1 text-sm font-semibold text-slate-700">
                            {{ $repairGuide->judul_dtr }}
                        </p>

                    </div>


                    <div>

                        <p class="text-xs text-slate-400">
                            Nama Dealer
                        </p>

                        <p class="mt-1 text-sm font-semibold text-slate-700">
                            {{ $repairGuide->nama_dealer }}
                        </p>

                    </div>


                    <div>

                        <p class="text-xs text-slate-400">
                            Nomor DTR
                        </p>

                        <p class="mt-1 text-sm font-semibold text-slate-700">
                            #{{ $repairGuide->id }}
                        </p>

                    </div>


                    <div>

                        <p class="text-xs text-slate-400">
                            Dibuat
                        </p>

                        <p class="mt-1 text-sm font-semibold text-slate-700">
                            {{ $repairGuide->created_at->format('d M Y H:i') }}
                        </p>

                    </div>

                </div>

            </div>


            {{-- =====================================================
                DATA KENDARAAN
            ====================================================== --}}

            <div class="mb-6 overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

                <div class="border-b border-slate-100 px-6 py-5">

                    <h3 class="text-base font-bold text-slate-800">
                        Data Kendaraan
                    </h3>

                </div>


                <div class="grid gap-x-8 gap-y-6 p-6 sm:grid-cols-2 lg:grid-cols-3">

                    <div>
                        <p class="text-xs text-slate-400">No. Polisi</p>
                        <p class="mt-1 text-sm font-semibold">
                            {{ $repairGuide->no_polisi }}
                        </p>
                    </div>


                    <div>
                        <p class="text-xs text-slate-400">Model</p>
                        <p class="mt-1 text-sm font-semibold">
                            {{ $repairGuide->model }}
                        </p>
                    </div>


                    <div>
                        <p class="text-xs text-slate-400">Kode Model</p>
                        <p class="mt-1 text-sm font-semibold">
                            {{ $repairGuide->kode_model }}
                        </p>
                    </div>


                    <div>
                        <p class="text-xs text-slate-400">Tahun Pembuatan</p>
                        <p class="mt-1 text-sm font-semibold">
                            {{ $repairGuide->tahun_pembuatan }}
                        </p>
                    </div>


                    <div>
                        <p class="text-xs text-slate-400">No. Rangka</p>
                        <p class="mt-1 break-all text-sm font-semibold">
                            {{ $repairGuide->no_rangka }}
                        </p>
                    </div>


                    <div>
                        <p class="text-xs text-slate-400">No. Mesin</p>
                        <p class="mt-1 break-all text-sm font-semibold">
                            {{ $repairGuide->no_mesin }}
                        </p>
                    </div>


                    <div>
                        <p class="text-xs text-slate-400">Tgl Penyerahan</p>
                        <p class="mt-1 text-sm font-semibold">
                            {{ $repairGuide->tgl_penyerahan?->format('d M Y') ?? '-' }}
                        </p>
                    </div>


                    <div>
                        <p class="text-xs text-slate-400">Tgl Perbaikan</p>
                        <p class="mt-1 text-sm font-semibold">
                            {{ $repairGuide->tgl_perbaikan?->format('d M Y') ?? '-' }}
                        </p>
                    </div>


                    <div>
                        <p class="text-xs text-slate-400">Jarak Tempuh</p>
                        <p class="mt-1 text-sm font-semibold">
                            {{ number_format($repairGuide->jarak_tempuh, 0, ',', '.') }} km
                        </p>
                    </div>

                </div>

            </div>


            {{-- =====================================================
                CHECKLIST
            ====================================================== --}}

            <div class="mb-6 overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

                <div class="border-b border-slate-100 px-6 py-5">

                    <h3 class="text-base font-bold text-slate-800">
                        Checklist Pemeriksaan
                    </h3>

                    <p class="mt-1 text-xs text-slate-400">
                        Periksa status checklist dan dokumentasi.
                    </p>

                </div>


                <div class="divide-y divide-slate-100">

                    @forelse($repairGuide->checklists as $checklist)

                        <div class="p-6">

                            <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">

                                <div class="flex items-center gap-3">

                                    <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-slate-900 text-xs font-bold text-white">
                                        {{ $loop->iteration }}
                                    </div>

                                    <div>

                                        <p class="text-sm font-semibold text-slate-800">
                                            {{ $checklist->nama_checklist }}
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

                                <div class="mt-5">

                                    <h4 class="mb-3 text-sm font-semibold text-slate-700">
                                        Foto Pemeriksaan
                                    </h4>


                                    <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">

                                        @foreach($checklist->photos as $photo)

                                            <div class="overflow-hidden rounded-xl border border-slate-200">

                                                <a
                                                    href="{{ asset('storage/' . $photo->foto) }}"
                                                    target="_blank">

                                                    <img
                                                        src="{{ asset('storage/' . $photo->foto) }}"
                                                        alt="Foto pemeriksaan"
                                                        class="h-48 w-full object-cover">

                                                </a>


                                                @if($photo->caption)

                                                    <div class="border-t border-slate-200 px-4 py-3">

                                                        <p class="text-xs leading-5 text-slate-500">
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

                                    <h4 class="mb-3 text-sm font-semibold text-slate-700">
                                        Video Pemeriksaan
                                    </h4>


                                    <div class="grid gap-5 lg:grid-cols-2">

                                        @foreach($checklist->videos as $video)

                                            <div class="overflow-hidden rounded-xl border border-slate-200">

                                                <video
                                                    controls
                                                    preload="metadata"
                                                    class="h-56 w-full bg-black">

                                                    <source
                                                        src="{{ asset('storage/' . $video->video) }}">

                                                </video>


                                                @if($video->caption)

                                                    <div class="border-t border-slate-200 px-4 py-3">

                                                        <p class="text-xs leading-5 text-slate-500">
                                                            {{ $video->caption }}
                                                        </p>

                                                    </div>

                                                @endif

                                            </div>

                                        @endforeach

                                    </div>

                                </div>

                            @endif


                            @if(!$checklist->photos->count() && !$checklist->videos->count())

                                <div class="mt-5 rounded-xl border border-dashed border-slate-200 bg-slate-50 px-4 py-5 text-center">

                                    <p class="text-xs text-slate-400">
                                        Tidak ada dokumentasi untuk checklist ini.
                                    </p>

                                </div>

                            @endif

                        </div>

                    @empty

                        <div class="px-6 py-10 text-center">

                            <p class="text-sm text-slate-400">
                                Belum ada checklist pemeriksaan.
                            </p>

                        </div>

                    @endforelse

                </div>

            </div>


            {{-- =====================================================
                FILE PENDUKUNG
            ====================================================== --}}

            <div class="mb-6 overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

                <div class="border-b border-slate-100 px-6 py-5">

                    <h3 class="text-base font-bold text-slate-800">
                        File Pendukung
                    </h3>

                </div>


                <div class="p-6">

                    @forelse($repairGuide->files as $file)

                        <div class="mb-3 flex flex-col gap-3 rounded-xl border border-slate-200 bg-slate-50 p-4 sm:flex-row sm:items-center sm:justify-between">

                            <div>

                                <p class="text-sm font-semibold text-slate-700">
                                    {{ $file->nama_file }}
                                </p>

                                @if($file->deskripsi)

                                    <p class="mt-1 text-xs text-slate-400">
                                        {{ $file->deskripsi }}
                                    </p>

                                @endif

                            </div>


                            <a
                                href="{{ asset('storage/' . $file->file) }}"
                                target="_blank"
                                class="inline-flex w-fit items-center rounded-lg border border-slate-200 bg-white px-4 py-2 text-xs font-semibold text-slate-600 hover:bg-slate-100">

                                Buka File

                            </a>

                        </div>

                    @empty

                        <p class="text-sm text-slate-400">
                            Belum ada file pendukung.
                        </p>

                    @endforelse

                </div>

            </div>


            {{-- =====================================================
                CATATAN
            ====================================================== --}}

            <div class="mb-6 overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

                <div class="border-b border-slate-100 px-6 py-5">

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


            {{-- =====================================================
                ACTION VERIFIKASI
            ====================================================== --}}

            @if($repairGuide->status === 'pending')

                <div class="mb-10 rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">

                    <div class="mb-5">

                        <h3 class="text-base font-bold text-slate-800">
                            Keputusan Verifikasi
                        </h3>

                        <p class="mt-1 text-sm text-slate-400">
                            Pastikan seluruh data dan dokumentasi sudah benar sebelum mengambil keputusan.
                        </p>

                    </div>


                    <div class="flex flex-col gap-3 sm:flex-row sm:justify-end">

                        {{-- REJECT --}}
                        <button
                            type="button"
                            onclick="document.getElementById('rejectModal').classList.remove('hidden')"
                            class="rounded-xl border border-red-200 bg-red-50 px-6 py-3 text-sm font-semibold text-red-600 hover:bg-red-100">

                            Tolak DTR

                        </button>


                        {{-- APPROVE --}}
                        <form
                            action="{{ route('super_admin.repair-guides.approve', $repairGuide) }}"
                            method="POST">

                            @csrf
                            @method('PATCH')

                            <button
                                type="submit"
                                onclick="return confirm('Apakah Anda yakin ingin menyetujui DTR ini?')"
                                class="rounded-xl bg-emerald-600 px-6 py-3 text-sm font-semibold text-white hover:bg-emerald-700">

                                Setujui DTR

                            </button>

                        </form>

                    </div>

                </div>

            @endif


            {{-- =====================================================
                INFO VERIFIKASI
            ====================================================== --}}

            @if($repairGuide->verifiedBy || $repairGuide->verified_at)

                <div class="mb-10 rounded-2xl border border-slate-200 bg-white shadow-sm">

                    <div class="border-b border-slate-100 px-6 py-5">

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

                            <p class="text-xs font-semibold text-red-600">
                                Alasan Penolakan
                            </p>

                            <p class="mt-2 whitespace-pre-line text-sm leading-6 text-slate-600">
                                {{ $repairGuide->rejection_reason }}
                            </p>

                        </div>

                    @endif

                </div>

            @endif


        </div>

    </main>


    {{-- =============================================================
        MODAL REJECT
    ============================================================== --}}

    <div
        id="rejectModal"
        class="fixed inset-0 z-[100] hidden items-center justify-center bg-slate-900/50 p-4">

        <div class="w-full max-w-lg rounded-2xl bg-white shadow-xl">

            <div class="border-b border-slate-100 px-6 py-5">

                <h3 class="text-lg font-bold text-slate-800">
                    Tolak DTR
                </h3>

                <p class="mt-1 text-sm text-slate-400">
                    Masukkan alasan penolakan agar Admin dapat melakukan perbaikan.
                </p>

            </div>


            <form
                action="{{ route('super_admin.repair-guides.reject', $repairGuide) }}"
                method="POST">

                @csrf
                @method('PATCH')


                <div class="p-6">

                    <label
                        for="rejection_reason"
                        class="mb-2 block text-sm font-semibold text-slate-700">

                        Alasan Penolakan

                    </label>


                    <textarea
                        id="rejection_reason"
                        name="rejection_reason"
                        rows="6"
                        required
                        placeholder="Contoh: Foto pemeriksaan belum jelas, mohon upload ulang..."
                        class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm outline-none focus:border-slate-400 focus:bg-white focus:ring-2 focus:ring-slate-100"></textarea>

                </div>


                <div class="flex justify-end gap-3 border-t border-slate-100 px-6 py-4">

                    <button
                        type="button"
                        onclick="document.getElementById('rejectModal').classList.add('hidden')"
                        class="rounded-xl border border-slate-200 bg-white px-5 py-2.5 text-sm font-semibold text-slate-600 hover:bg-slate-50">

                        Batal

                    </button>


                    <button
                        type="submit"
                        class="rounded-xl bg-red-600 px-5 py-2.5 text-sm font-semibold text-white hover:bg-red-700">

                        Tolak DTR

                    </button>

                </div>

            </form>

        </div>

    </div>


    <script>

        const rejectModal =
            document.getElementById('rejectModal');

        if (rejectModal) {

            rejectModal.addEventListener(
                'click',
                function (event) {

                    if (event.target === rejectModal) {

                        rejectModal.classList.add('hidden');

                    }

                }
            );

        }

    </script>

</body>

</html>