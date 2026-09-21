<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit DTR - Auto Repair</title>

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
                        Administrator
                    </p>

                </div>


                <div class="flex h-9 w-9 items-center justify-center rounded-full bg-slate-800 text-sm font-bold text-white">

                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}

                </div>

            </div>

        </div>

    </header>


    {{-- SIDEBAR --}}
    @include('admin.components.sidebar')


    {{-- MAIN --}}
    <main class="ml-64 min-h-screen bg-slate-100 pt-16">

        <div class="px-6 py-7 lg:px-10">

            {{-- HEADER --}}
            <div class="mb-6">

                <a href="{{ route('admin.repair-guides.show', $repairGuide) }}"
                   class="mb-3 inline-flex items-center gap-2 text-sm font-medium text-slate-500 hover:text-slate-800">

                    ← Kembali ke Detail DTR

                </a>


                <div class="flex flex-col gap-3 sm:flex-row sm:items-end sm:justify-between">

                    <div>

                        <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">
                            Manajemen DTR
                        </p>

                        <h2 class="mt-1 text-2xl font-bold text-slate-800">
                            Edit DTR
                        </h2>

                        <p class="mt-1 text-sm text-slate-500">
                            Perbarui informasi dan dokumentasi Data Technical Report.
                        </p>

                    </div>


                    <span class="inline-flex w-fit items-center gap-2 rounded-full bg-amber-50 px-3 py-1.5 text-xs font-semibold text-amber-700">

                        <span class="h-1.5 w-1.5 rounded-full bg-amber-500"></span>

                        Setelah disimpan → Menunggu Verifikasi

                    </span>

                </div>

            </div>


            {{-- ERROR --}}
            @if($errors->any())

                <div class="mb-6 rounded-xl border border-red-200 bg-red-50 p-4">

                    <p class="text-sm font-semibold text-red-700">
                        Terdapat kesalahan:
                    </p>

                    <ul class="mt-2 list-disc space-y-1 pl-5 text-sm text-red-600">

                        @foreach($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif


            <form
                action="{{ route('admin.repair-guides.update', $repairGuide) }}"
                method="POST"
                enctype="multipart/form-data"
                id="editDtrForm">

                @csrf

                @method('PUT')


                {{-- =====================================================
                    INFORMASI DTR
                ====================================================== --}}

                <div class="mb-6 overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

                    <div class="border-b border-slate-100 px-6 py-5">

                        <h3 class="text-base font-bold text-slate-800">
                            Informasi DTR
                        </h3>

                        <p class="mt-1 text-xs text-slate-400">
                            Informasi dasar Data Technical Report.
                        </p>

                    </div>


                    <div class="grid gap-5 p-6 md:grid-cols-2">

                        <div>

                            <label class="mb-2 block text-sm font-semibold text-slate-700">
                                Nama Dealer
                            </label>

                            <input
                                type="text"
                                name="nama_dealer"
                                value="{{ old('nama_dealer', $repairGuide->nama_dealer) }}"
                                required
                                class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm outline-none focus:border-slate-400 focus:bg-white focus:ring-2 focus:ring-slate-100">

                        </div>


                        <div>

                            <label class="mb-2 block text-sm font-semibold text-slate-700">
                                Judul DTR
                            </label>

                            <input
                                type="text"
                                name="judul_dtr"
                                value="{{ old('judul_dtr', $repairGuide->judul_dtr) }}"
                                required
                                class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm outline-none focus:border-slate-400 focus:bg-white focus:ring-2 focus:ring-slate-100">

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

                        <p class="mt-1 text-xs text-slate-400">
                            Informasi kendaraan yang diperiksa.
                        </p>

                    </div>


                    <div class="grid gap-5 p-6 md:grid-cols-2 lg:grid-cols-3">

                        <div>
                            <label class="mb-2 block text-sm font-semibold text-slate-700">
                                No. Polisi
                            </label>

                            <input
                                type="text"
                                name="no_polisi"
                                value="{{ old('no_polisi', $repairGuide->no_polisi) }}"
                                required
                                class="dtr-input">
                        </div>


                        <div>
                            <label class="mb-2 block text-sm font-semibold text-slate-700">
                                Model
                            </label>

                            <input
                                type="text"
                                name="model"
                                value="{{ old('model', $repairGuide->model) }}"
                                required
                                class="dtr-input">
                        </div>


                        <div>
                            <label class="mb-2 block text-sm font-semibold text-slate-700">
                                Kode Model
                            </label>

                            <input
                                type="text"
                                name="kode_model"
                                value="{{ old('kode_model', $repairGuide->kode_model) }}"
                                required
                                class="dtr-input">
                        </div>


                        <div>
                            <label class="mb-2 block text-sm font-semibold text-slate-700">
                                Tahun Pembuatan
                            </label>

                            <input
                                type="number"
                                name="tahun_pembuatan"
                                value="{{ old('tahun_pembuatan', $repairGuide->tahun_pembuatan) }}"
                                required
                                class="dtr-input">
                        </div>


                        <div>
                            <label class="mb-2 block text-sm font-semibold text-slate-700">
                                No. Rangka
                            </label>

                            <input
                                type="text"
                                name="no_rangka"
                                value="{{ old('no_rangka', $repairGuide->no_rangka) }}"
                                required
                                class="dtr-input">
                        </div>


                        <div>
                            <label class="mb-2 block text-sm font-semibold text-slate-700">
                                No. Mesin
                            </label>

                            <input
                                type="text"
                                name="no_mesin"
                                value="{{ old('no_mesin', $repairGuide->no_mesin) }}"
                                required
                                class="dtr-input">
                        </div>


                        <div>
                            <label class="mb-2 block text-sm font-semibold text-slate-700">
                                Tgl Penyerahan
                            </label>

                            <input
                                type="date"
                                name="tgl_penyerahan"
                                value="{{ old('tgl_penyerahan', optional($repairGuide->tgl_penyerahan)->format('Y-m-d')) }}"
                                required
                                class="dtr-input">
                        </div>


                        <div>
                            <label class="mb-2 block text-sm font-semibold text-slate-700">
                                Tgl Perbaikan
                            </label>

                            <input
                                type="date"
                                name="tgl_perbaikan"
                                value="{{ old('tgl_perbaikan', optional($repairGuide->tgl_perbaikan)->format('Y-m-d')) }}"
                                required
                                class="dtr-input">
                        </div>


                        <div>
                            <label class="mb-2 block text-sm font-semibold text-slate-700">
                                Jarak Tempuh (km)
                            </label>

                            <input
                                type="number"
                                name="jarak_tempuh"
                                min="0"
                                value="{{ old('jarak_tempuh', $repairGuide->jarak_tempuh) }}"
                                required
                                class="dtr-input">
                        </div>

                    </div>

                </div>


                {{-- =====================================================
                    CHECKLIST
                ====================================================== --}}

                <div class="mb-6 overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

                    <div class="flex flex-col gap-3 border-b border-slate-100 px-6 py-5 sm:flex-row sm:items-center sm:justify-between">

                        <div>

                            <h3 class="text-base font-bold text-slate-800">
                                Checklist Pemeriksaan
                            </h3>

                            <p class="mt-1 text-xs text-slate-400">
                                Perbarui checklist, status pemeriksaan, foto, dan video.
                            </p>

                        </div>


                        <button
                            type="button"
                            id="addChecklist"
                            class="rounded-xl bg-slate-900 px-4 py-2.5 text-xs font-semibold text-white hover:bg-slate-800">

                            + Tambah Checklist

                        </button>

                    </div>


                    <div id="checklistContainer" class="space-y-5 p-6">

                        @foreach($repairGuide->checklists as $checklist)

                            <div
                                class="checklist-item rounded-2xl border border-slate-200 bg-slate-50 p-5"
                                data-index="{{ $loop->index }}">

                                <input
                                    type="hidden"
                                    name="checklists[{{ $loop->index }}][id]"
                                    value="{{ $checklist->id }}">


                                {{-- CHECKLIST HEADER --}}
                                <div class="flex items-start gap-3">

                                    <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-slate-900 text-xs font-bold text-white checklist-number">
                                        {{ $loop->iteration }}
                                    </div>


                                    <div class="flex-1">

                                        <label class="mb-2 block text-sm font-semibold text-slate-700">
                                            Nama Checklist
                                        </label>

                                        <input
                                            type="text"
                                            name="checklists[{{ $loop->index }}][nama_checklist]"
                                            value="{{ old("checklists.{$loop->index}.nama_checklist", $checklist->nama_checklist) }}"
                                            required
                                            class="dtr-input">

                                    </div>


                                    <button
                                        type="button"
                                        class="remove-checklist mt-7 rounded-lg border border-red-200 bg-white px-3 py-2 text-xs font-semibold text-red-600 hover:bg-red-50">

                                        Hapus

                                    </button>

                                </div>


                                {{-- STATUS --}}
                                <div class="mt-5 rounded-xl border border-slate-200 bg-white p-4">

                                    <label class="flex cursor-pointer items-center gap-3">

                                        <input
                                            type="hidden"
                                            name="checklists[{{ $loop->index }}][is_checked]"
                                            value="0">

                                        <input
                                            type="checkbox"
                                            name="checklists[{{ $loop->index }}][is_checked]"
                                            value="1"
                                            {{ $checklist->is_checked ? 'checked' : '' }}
                                            class="checklist-check h-4 w-4 rounded border-slate-300 text-slate-900 focus:ring-slate-400">

                                        <span>

                                            <span class="block text-sm font-semibold text-slate-700">
                                                Pemeriksaan sudah dilakukan
                                            </span>

                                            <span class="block text-xs text-slate-400">
                                                Centang jika checklist sudah diperiksa.
                                            </span>

                                        </span>

                                    </label>

                                </div>


                                {{-- FOTO EXISTING --}}
                                <div class="mt-5">

                                    <div class="mb-3 flex items-center justify-between">

                                        <h4 class="text-sm font-bold text-slate-700">
                                            Foto Pemeriksaan
                                        </h4>

                                        <span class="text-xs text-slate-400">
                                            {{ $checklist->photos->count() }} foto
                                        </span>

                                    </div>


                                    @if($checklist->photos->count())

                                        <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">

                                            @foreach($checklist->photos as $photo)

                                                <div class="overflow-hidden rounded-xl border border-slate-200 bg-white">

                                                    <img
                                                        src="{{ asset('storage/' . $photo->foto) }}"
                                                        class="h-40 w-full object-cover"
                                                        alt="Foto pemeriksaan">


                                                    <div class="p-3">

                                                        @if($photo->caption)

                                                            <p class="mb-3 text-xs leading-5 text-slate-500">
                                                                {{ $photo->caption }}
                                                            </p>

                                                        @endif


                                                        <label class="flex cursor-pointer items-center gap-2 text-xs font-semibold text-red-600">

                                                            <input
                                                                type="checkbox"
                                                                name="delete_photos[]"
                                                                value="{{ $photo->id }}"
                                                                class="rounded border-slate-300 text-red-600">

                                                            Hapus foto

                                                        </label>

                                                    </div>

                                                </div>

                                            @endforeach

                                        </div>

                                    @else

                                        <div class="rounded-xl border border-dashed border-slate-200 bg-white px-4 py-5 text-center">

                                            <p class="text-xs text-slate-400">
                                                Belum ada foto.
                                            </p>

                                        </div>

                                    @endif


                                    {{-- FOTO BARU --}}
                                    <div class="mt-4 rounded-xl border border-dashed border-slate-300 bg-white p-4">

                                        <label class="mb-2 block text-xs font-semibold text-slate-600">
                                            Tambah Foto
                                        </label>

                                        <input
                                            type="file"
                                            name="checklists[{{ $loop->index }}][photos][0][foto]"
                                            accept=".jpg,.jpeg,.png,.webp"
                                            multiple
                                            class="block w-full text-sm">

                                        <p class="mt-2 text-[11px] text-slate-400">
                                            JPG, JPEG, PNG, WEBP — maksimal 5 MB per foto.
                                        </p>

                                    </div>

                                </div>


                                {{-- VIDEO EXISTING --}}
                                <div class="mt-6">

                                    <div class="mb-3 flex items-center justify-between">

                                        <h4 class="text-sm font-bold text-slate-700">
                                            Video Pemeriksaan
                                        </h4>

                                        <span class="text-xs text-slate-400">
                                            {{ $checklist->videos->count() }} video
                                        </span>

                                    </div>


                                    @if($checklist->videos->count())

                                        <div class="space-y-4">

                                            @foreach($checklist->videos as $video)

                                                <div class="rounded-xl border border-slate-200 bg-white p-4">

                                                    <video
                                                        controls
                                                        class="max-h-64 w-full rounded-lg bg-black">

                                                        <source
                                                            src="{{ asset('storage/' . $video->video) }}">

                                                    </video>


                                                    @if($video->caption)

                                                        <p class="mt-3 text-xs leading-5 text-slate-500">
                                                            {{ $video->caption }}
                                                        </p>

                                                    @endif


                                                    <label class="mt-3 flex cursor-pointer items-center gap-2 text-xs font-semibold text-red-600">

                                                        <input
                                                            type="checkbox"
                                                            name="delete_videos[]"
                                                            value="{{ $video->id }}"
                                                            class="rounded border-slate-300 text-red-600">

                                                        Hapus video

                                                    </label>

                                                </div>

                                            @endforeach

                                        </div>

                                    @else

                                        <div class="rounded-xl border border-dashed border-slate-200 bg-white px-4 py-5 text-center">

                                            <p class="text-xs text-slate-400">
                                                Belum ada video.
                                            </p>

                                        </div>

                                    @endif


                                    {{-- VIDEO BARU --}}
                                    <div class="mt-4 rounded-xl border border-dashed border-slate-300 bg-white p-4">

                                        <label class="mb-2 block text-xs font-semibold text-slate-600">
                                            Tambah Video
                                        </label>

                                        <input
                                            type="file"
                                            name="checklists[{{ $loop->index }}][videos][0][video]"
                                            accept=".mp4,.mov,.avi,.webm"
                                            multiple
                                            class="block w-full text-sm">

                                        <p class="mt-2 text-[11px] text-slate-400">
                                            MP4, MOV, AVI, WEBM — maksimal 100 MB per video.
                                        </p>

                                    </div>

                                </div>

                            </div>

                        @endforeach

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

                        <p class="mt-1 text-xs text-slate-400">
                            Kelola dokumen pendukung DTR.
                        </p>

                    </div>


                    <div class="p-6">

                        @if($repairGuide->files->count())

                            <div class="space-y-3">

                                @foreach($repairGuide->files as $file)

                                    <div class="flex flex-col gap-4 rounded-xl border border-slate-200 bg-slate-50 p-4 sm:flex-row sm:items-center sm:justify-between">

                                        <div class="min-w-0">

                                            <p class="truncate text-sm font-semibold text-slate-700">
                                                {{ $file->nama_file }}
                                            </p>

                                            @if($file->deskripsi)

                                                <p class="mt-1 text-xs text-slate-400">
                                                    {{ $file->deskripsi }}
                                                </p>

                                            @endif

                                            <a
                                                href="{{ asset('storage/' . $file->file) }}"
                                                target="_blank"
                                                class="mt-2 inline-block text-xs font-semibold text-blue-600 hover:text-blue-700">

                                                Buka File

                                            </a>

                                        </div>


                                        <label class="flex shrink-0 cursor-pointer items-center gap-2 text-xs font-semibold text-red-600">

                                            <input
                                                type="checkbox"
                                                name="delete_files[]"
                                                value="{{ $file->id }}"
                                                class="rounded border-slate-300 text-red-600">

                                            Hapus file

                                        </label>

                                    </div>

                                @endforeach

                            </div>

                        @else

                            <div class="rounded-xl border border-dashed border-slate-200 bg-slate-50 px-4 py-6 text-center">

                                <p class="text-sm text-slate-400">
                                    Belum ada file pendukung.
                                </p>

                            </div>

                        @endif


                        {{-- FILE BARU --}}
                        <div
                            id="fileContainer"
                            class="mt-5 space-y-4">

                            <div class="file-item rounded-xl border border-dashed border-slate-300 bg-slate-50 p-4">

                                <div class="grid gap-4 md:grid-cols-3">

                                    <div>

                                        <label class="mb-2 block text-xs font-semibold text-slate-600">
                                            Nama File
                                        </label>

                                        <input
                                            type="text"
                                            name="files[0][nama_file]"
                                            placeholder="Nama dokumen"
                                            class="dtr-input">

                                    </div>


                                    <div>

                                        <label class="mb-2 block text-xs font-semibold text-slate-600">
                                            File
                                        </label>

                                        <input
                                            type="file"
                                            name="files[0][file]"
                                            accept=".pdf,.doc,.docx,.xls,.xlsx,.zip"
                                            class="block w-full text-sm">

                                    </div>


                                    <div>

                                        <label class="mb-2 block text-xs font-semibold text-slate-600">
                                            Deskripsi
                                        </label>

                                        <input
                                            type="text"
                                            name="files[0][deskripsi]"
                                            placeholder="Keterangan file"
                                            class="dtr-input">

                                    </div>

                                </div>

                            </div>

                        </div>


                        <button
                            type="button"
                            id="addFile"
                            class="mt-4 rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-xs font-semibold text-slate-600 hover:bg-slate-50">

                            + Tambah File

                        </button>

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

                        <textarea
                            name="catatan_keseluruhan"
                            rows="6"
                            placeholder="Tuliskan catatan keseluruhan..."
                            class="w-full resize-y rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm leading-6 outline-none focus:border-slate-400 focus:bg-white focus:ring-2 focus:ring-slate-100">{{ old('catatan_keseluruhan', $repairGuide->catatan_keseluruhan) }}</textarea>

                    </div>

                </div>


                {{-- =====================================================
                    ACTION
                ====================================================== --}}

                <div class="mb-10 flex flex-col-reverse gap-3 sm:flex-row sm:justify-end">

                    <a
                        href="{{ route('admin.repair-guides.show', $repairGuide) }}"
                        class="inline-flex items-center justify-center rounded-xl border border-slate-200 bg-white px-6 py-3 text-sm font-semibold text-slate-600 hover:bg-slate-50">

                        Batal

                    </a>


                    <button
                        type="submit"
                        class="inline-flex items-center justify-center rounded-xl bg-slate-900 px-7 py-3 text-sm font-semibold text-white shadow-sm hover:bg-slate-800">

                        Simpan Perubahan

                    </button>

                </div>

            </form>

        </div>

    </main>


    {{-- =============================================================
        JAVASCRIPT
    ============================================================== --}}

    <script>

        let checklistIndex =
            {{ $repairGuide->checklists->count() }};

        let fileIndex = 1;


        /*
         * ==========================================================
         * TAMBAH CHECKLIST
         * ==========================================================
         */

        document
            .getElementById('addChecklist')
            .addEventListener('click', function () {

                const container =
                    document.getElementById('checklistContainer');

                const index = checklistIndex++;

                const html = `
                    <div
                        class="checklist-item rounded-2xl border border-slate-200 bg-slate-50 p-5"
                        data-index="${index}">

                        <div class="flex items-start gap-3">

                            <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-slate-900 text-xs font-bold text-white checklist-number">
                                #
                            </div>

                            <div class="flex-1">

                                <label class="mb-2 block text-sm font-semibold text-slate-700">
                                    Nama Checklist
                                </label>

                                <input
                                    type="text"
                                    name="checklists[${index}][nama_checklist]"
                                    required
                                    placeholder="Contoh: Pemeriksaan kondisi mesin"
                                    class="dtr-input">

                            </div>

                            <button
                                type="button"
                                class="remove-checklist mt-7 rounded-lg border border-red-200 bg-white px-3 py-2 text-xs font-semibold text-red-600 hover:bg-red-50">

                                Hapus

                            </button>

                        </div>


                        <div class="mt-5 rounded-xl border border-slate-200 bg-white p-4">

                            <label class="flex cursor-pointer items-center gap-3">

                                <input
                                    type="hidden"
                                    name="checklists[${index}][is_checked]"
                                    value="0">

                                <input
                                    type="checkbox"
                                    name="checklists[${index}][is_checked]"
                                    value="1"
                                    class="checklist-check h-4 w-4 rounded border-slate-300 text-slate-900">

                                <span>

                                    <span class="block text-sm font-semibold text-slate-700">
                                        Pemeriksaan sudah dilakukan
                                    </span>

                                    <span class="block text-xs text-slate-400">
                                        Centang jika checklist sudah diperiksa.
                                    </span>

                                </span>

                            </label>

                        </div>


                        <div class="mt-5 rounded-xl border border-dashed border-slate-300 bg-white p-4">

                            <label class="mb-2 block text-xs font-semibold text-slate-600">
                                Tambah Foto
                            </label>

                            <input
                                type="file"
                                name="checklists[${index}][photos][0][foto]"
                                accept=".jpg,.jpeg,.png,.webp"
                                multiple
                                class="block w-full text-sm">

                            <p class="mt-2 text-[11px] text-slate-400">
                                JPG, JPEG, PNG, WEBP — maksimal 5 MB.
                            </p>

                        </div>


                        <div class="mt-4 rounded-xl border border-dashed border-slate-300 bg-white p-4">

                            <label class="mb-2 block text-xs font-semibold text-slate-600">
                                Tambah Video
                            </label>

                            <input
                                type="file"
                                name="checklists[${index}][videos][0][video]"
                                accept=".mp4,.mov,.avi,.webm"
                                multiple
                                class="block w-full text-sm">

                            <p class="mt-2 text-[11px] text-slate-400">
                                MP4, MOV, AVI, WEBM — maksimal 100 MB.
                            </p>

                        </div>

                    </div>
                `;

                container.insertAdjacentHTML(
                    'beforeend',
                    html
                );

                updateChecklistNumbers();

            });


        /*
         * ==========================================================
         * HAPUS CHECKLIST DARI FORM
         * ==========================================================
         */

        document.addEventListener(
            'click',
            function (event) {

                const button =
                    event.target.closest('.remove-checklist');

                if (!button) {
                    return;
                }

                const item =
                    button.closest('.checklist-item');

                if (!item) {
                    return;
                }

                if (
                    document.querySelectorAll(
                        '.checklist-item'
                    ).length <= 1
                ) {

                    alert(
                        'Minimal harus ada satu checklist.'
                    );

                    return;
                }

                item.remove();

                updateChecklistNumbers();

            }
        );


        /*
         * ==========================================================
         * NOMOR CHECKLIST
         * ==========================================================
         */

        function updateChecklistNumbers()
        {
            document
                .querySelectorAll('.checklist-number')
                .forEach(function (element, index) {

                    element.textContent =
                        index + 1;

                });
        }


        /*
         * ==========================================================
         * TAMBAH FILE
         * ==========================================================
         */

        document
            .getElementById('addFile')
            .addEventListener('click', function () {

                const container =
                    document.getElementById('fileContainer');

                const html = `
                    <div class="file-item rounded-xl border border-dashed border-slate-300 bg-slate-50 p-4">

                        <div class="flex items-center justify-between gap-3 mb-4">

                            <p class="text-xs font-semibold text-slate-600">
                                File Tambahan
                            </p>

                            <button
                                type="button"
                                class="remove-file text-xs font-semibold text-red-600 hover:text-red-700">

                                Hapus

                            </button>

                        </div>

                        <div class="grid gap-4 md:grid-cols-3">

                            <div>

                                <label class="mb-2 block text-xs font-semibold text-slate-600">
                                    Nama File
                                </label>

                                <input
                                    type="text"
                                    name="files[${fileIndex}][nama_file]"
                                    placeholder="Nama dokumen"
                                    class="dtr-input">

                            </div>


                            <div>

                                <label class="mb-2 block text-xs font-semibold text-slate-600">
                                    File
                                </label>

                                <input
                                    type="file"
                                    name="files[${fileIndex}][file]"
                                    accept=".pdf,.doc,.docx,.xls,.xlsx,.zip"
                                    class="block w-full text-sm">

                            </div>


                            <div>

                                <label class="mb-2 block text-xs font-semibold text-slate-600">
                                    Deskripsi
                                </label>

                                <input
                                    type="text"
                                    name="files[${fileIndex}][deskripsi]"
                                    placeholder="Keterangan file"
                                    class="dtr-input">

                            </div>

                        </div>

                    </div>
                `;

                container.insertAdjacentHTML(
                    'beforeend',
                    html
                );

                fileIndex++;

            });


        /*
         * ==========================================================
         * HAPUS FILE BARU
         * ==========================================================
         */

        document.addEventListener(
            'click',
            function (event) {

                const button =
                    event.target.closest('.remove-file');

                if (!button) {
                    return;
                }

                const item =
                    button.closest('.file-item');

                if (item) {
                    item.remove();
                }

            }
        );


        /*
         * ==========================================================
         * FORM SUBMIT
         * ==========================================================
         */

        document
            .getElementById('editDtrForm')
            .addEventListener('submit', function () {

                const button =
                    this.querySelector(
                        'button[type="submit"]'
                    );

                if (button) {

                    button.disabled = true;

                    button.textContent =
                        'Menyimpan...';

                }

            });

    </script>


    <style>

        .dtr-input {
            width: 100%;
            border-radius: 0.75rem;
            border: 1px solid rgb(226 232 240);
            background: rgb(248 250 252);
            padding: 0.75rem 1rem;
            font-size: 0.875rem;
            color: rgb(51 65 85);
            outline: none;
        }

        .dtr-input:focus {
            border-color: rgb(148 163 184);
            background: white;
            box-shadow: 0 0 0 3px rgb(241 245 249);
        }

    </style>

</body>

</html>