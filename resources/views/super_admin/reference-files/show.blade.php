<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Detail File Referensi - Auto Repair</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-100 text-slate-800">

    {{-- Navbar --}}
    <header class="fixed top-0 right-0 left-64 z-30 h-16 border-b border-slate-200 bg-white">

        <div class="flex h-full items-center justify-between px-8">

            <div>
                <h1 class="text-lg font-bold text-slate-800">
                    Verifikasi File
                </h1>

                <p class="text-xs text-slate-500">
                    Periksa file referensi sebelum diberikan kepada Teknisi
                </p>
            </div>


            <div class="flex items-center gap-3">

                <div class="hidden text-right sm:block">

                    <p class="text-sm font-semibold text-slate-700">
                        {{ auth()->user()->name }}
                    </p>

                    <p class="text-xs text-slate-500">
                        Super Admin
                    </p>

                </div>


                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-slate-800 text-sm font-bold text-white">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>

            </div>

        </div>

    </header>


    {{-- Sidebar --}}
    @include('super_admin.components.sidebar')


    {{-- Main --}}
    <main class="ml-64 min-h-screen pt-16">

        <div class="p-8">

            {{-- NOTIFICATION SUCCESS --}}
            @if(session('success'))

                <div class="mb-6 flex items-start gap-3 rounded-xl border border-emerald-200 bg-emerald-50 px-5 py-4 text-sm font-medium text-emerald-700">

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="mt-0.5 h-5 w-5 shrink-0"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                        />
                    </svg>

                    <span>
                        {{ session('success') }}
                    </span>

                </div>

            @endif


            {{-- NOTIFICATION ERROR --}}
            @if(session('error'))

                <div class="mb-6 flex items-start gap-3 rounded-xl border border-red-200 bg-red-50 px-5 py-4 text-sm font-medium text-red-700">

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="mt-0.5 h-5 w-5 shrink-0"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M12 9v4m0 4h.01M10.29 3.86l-8.82 15a1 1 0 001.71 1.02l8.82-15a1 1 0 00-1.71-1.02z"
                        />
                    </svg>

                    <span>
                        {{ session('error') }}
                    </span>

                </div>

            @endif


            {{-- VALIDATION ERROR --}}
            @if($errors->any())

                <div class="mb-6 rounded-xl border border-red-200 bg-red-50 px-5 py-4">

                    <p class="text-sm font-semibold text-red-700">
                        Terdapat kesalahan:
                    </p>

                    <ul class="mt-2 list-disc pl-5 text-sm text-red-600">

                        @foreach($errors->all() as $error)

                            <li>
                                {{ $error }}
                            </li>

                        @endforeach

                    </ul>

                </div>

            @endif


            {{-- BACK --}}
            <div class="mb-5">

                <a
                    href="{{ route('super_admin.reference-files.index') }}"
                    class="inline-flex items-center gap-2 text-sm font-semibold text-slate-600 transition hover:text-slate-900"
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
                            d="M15 19l-7-7 7-7"
                        />
                    </svg>

                    Kembali ke Verifikasi File

                </a>

            </div>


            {{-- HEADER CARD --}}
            <div class="mb-6 rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">

                <div class="flex flex-col gap-5 lg:flex-row lg:items-center lg:justify-between">

                    <div>

                        <div class="mb-3 flex items-center gap-3">

                            @if($referenceFile->status === 'pending')

                                <span class="inline-flex rounded-full bg-amber-100 px-3 py-1 text-xs font-bold text-amber-700">
                                    Pending
                                </span>

                            @elseif($referenceFile->status === 'approved')

                                <span class="inline-flex rounded-full bg-emerald-100 px-3 py-1 text-xs font-bold text-emerald-700">
                                    Approved
                                </span>

                            @elseif($referenceFile->status === 'rejected')

                                <span class="inline-flex rounded-full bg-red-100 px-3 py-1 text-xs font-bold text-red-700">
                                    Rejected
                                </span>

                            @endif

                            <span class="text-xs text-slate-400">
                                File #{{ $referenceFile->id }}
                            </span>

                        </div>


                        <h2 class="text-2xl font-bold text-slate-800">
                            {{ $referenceFile->nama_file }}
                        </h2>


                        <p class="mt-2 max-w-3xl text-sm text-slate-500">
                            {{ $referenceFile->deskripsi ?: 'Tidak ada deskripsi file.' }}
                        </p>

                    </div>


                    {{-- DOWNLOAD --}}
                    <div class="shrink-0">

                        <a
                            href="{{ route('super_admin.reference-files.download', $referenceFile) }}"
                            class="inline-flex items-center gap-2 rounded-xl bg-slate-800 px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-slate-700"
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
                                    d="M12 3v12m0 0l4-4m-4 4l-4-4m-5 8h18"
                                />
                            </svg>

                            Download File

                        </a>

                    </div>

                </div>

            </div>


            {{-- INFORMASI FILE --}}
            <div class="mb-6 rounded-2xl border border-slate-200 bg-white shadow-sm">

                <div class="border-b border-slate-200 px-6 py-5">

                    <h3 class="text-base font-bold text-slate-800">
                        Informasi File
                    </h3>

                    <p class="mt-1 text-sm text-slate-500">
                        Informasi file referensi yang diajukan.
                    </p>

                </div>


                <div class="grid gap-6 p-6 md:grid-cols-2">

                    {{-- Nama --}}
                    <div>

                        <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">
                            Nama File
                        </p>

                        <p class="mt-2 text-sm font-semibold text-slate-800">
                            {{ $referenceFile->nama_file }}
                        </p>

                    </div>


                    {{-- Format --}}
                    <div>

                        <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">
                            Format
                        </p>

                        <p class="mt-2 text-sm font-semibold uppercase text-slate-800">
                            {{ pathinfo($referenceFile->file, PATHINFO_EXTENSION) ?: '-' }}
                        </p>

                    </div>


                    {{-- Tanggal upload --}}
                    <div>

                        <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">
                            Tanggal Upload
                        </p>

                        <p class="mt-2 text-sm font-semibold text-slate-800">
                            {{ $referenceFile->created_at?->format('d M Y H:i') ?? '-' }}
                        </p>

                    </div>


                    {{-- Pengupload --}}
                    <div>

                        <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">
                            Diunggah Oleh
                        </p>

                        <p class="mt-2 text-sm font-semibold text-slate-800">
                            {{ $referenceFile->uploadedBy?->name ?? '-' }}
                        </p>

                        @if($referenceFile->uploadedBy?->email)

                            <p class="mt-1 text-xs text-slate-500">
                                {{ $referenceFile->uploadedBy->email }}
                            </p>

                        @endif

                    </div>


                    {{-- Deskripsi --}}
                    <div class="md:col-span-2">

                        <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">
                            Deskripsi
                        </p>

                        <div class="mt-2 rounded-xl bg-slate-50 p-4">

                            <p class="whitespace-pre-line text-sm leading-6 text-slate-600">
                                {{ $referenceFile->deskripsi ?: 'Tidak ada deskripsi.' }}
                            </p>

                        </div>

                    </div>

                </div>

            </div>


            {{-- INFORMASI VERIFIKASI --}}
            <div class="mb-6 rounded-2xl border border-slate-200 bg-white shadow-sm">

                <div class="border-b border-slate-200 px-6 py-5">

                    <h3 class="text-base font-bold text-slate-800">
                        Informasi Verifikasi
                    </h3>

                    <p class="mt-1 text-sm text-slate-500">
                        Riwayat pemeriksaan file referensi.
                    </p>

                </div>


                <div class="p-6">

                    <div class="grid gap-6 md:grid-cols-2">

                        {{-- Status --}}
                        <div>

                            <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">
                                Status
                            </p>

                            <div class="mt-2">

                                @if($referenceFile->status === 'pending')

                                    <span class="inline-flex rounded-full bg-amber-100 px-3 py-1 text-xs font-bold text-amber-700">
                                        Menunggu Verifikasi
                                    </span>

                                @elseif($referenceFile->status === 'approved')

                                    <span class="inline-flex rounded-full bg-emerald-100 px-3 py-1 text-xs font-bold text-emerald-700">
                                        Disetujui
                                    </span>

                                @elseif($referenceFile->status === 'rejected')

                                    <span class="inline-flex rounded-full bg-red-100 px-3 py-1 text-xs font-bold text-red-700">
                                        Ditolak
                                    </span>

                                @endif

                            </div>

                        </div>


                        {{-- Verified By --}}
                        <div>

                            <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">
                                Diverifikasi Oleh
                            </p>

                            <p class="mt-2 text-sm font-semibold text-slate-800">
                                {{ $referenceFile->verifiedBy?->name ?? '-' }}
                            </p>

                        </div>


                        {{-- Verified At --}}
                        <div>

                            <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">
                                Waktu Verifikasi
                            </p>

                            <p class="mt-2 text-sm font-semibold text-slate-800">
                                {{ $referenceFile->verified_at?->format('d M Y H:i') ?? '-' }}
                            </p>

                        </div>


                        {{-- Rejection --}}
                        @if($referenceFile->status === 'rejected')

                            <div class="md:col-span-2">

                                <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">
                                    Alasan Penolakan
                                </p>

                                <div class="mt-2 rounded-xl border border-red-200 bg-red-50 p-4">

                                    <p class="whitespace-pre-line text-sm leading-6 text-red-700">
                                        {{ $referenceFile->rejection_reason ?: '-' }}
                                    </p>

                                </div>

                            </div>

                        @endif

                    </div>

                </div>

            </div>


            {{-- AKSI VERIFIKASI --}}
            @if($referenceFile->status === 'pending')

                <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">

                    <div class="mb-5">

                        <h3 class="text-base font-bold text-slate-800">
                            Keputusan Verifikasi
                        </h3>

                        <p class="mt-1 text-sm text-slate-500">
                            Pastikan file telah diperiksa sebelum menentukan keputusan.
                        </p>

                    </div>


                    <div class="flex flex-col gap-3 sm:flex-row">

                        {{-- SETUJUI --}}
                        <form
                            method="POST"
                            action="{{ route('super_admin.reference-files.approve', $referenceFile) }}"
                            onsubmit="return confirm('Yakin ingin menyetujui file referensi ini? Setelah disetujui, file akan dapat dilihat dan didownload oleh Teknisi.')"
                        >

                            @csrf
                            @method('PATCH')

                            <button
                                type="submit"
                                class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-emerald-600 px-5 py-3 text-sm font-bold text-white transition hover:bg-emerald-700 sm:w-auto"
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
                                        d="M5 13l4 4L19 7"
                                    />
                                </svg>

                                Setujui File

                            </button>

                        </form>


                        {{-- TOLAK --}}
                        <button
                            type="button"
                            onclick="document.getElementById('rejectBox').classList.toggle('hidden')"
                            class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-red-600 px-5 py-3 text-sm font-bold text-white transition hover:bg-red-700 sm:w-auto"
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
                                    d="M6 18L18 6M6 6l12 12"
                                />
                            </svg>

                            Tolak File

                        </button>

                    </div>


                    {{-- REJECTION FORM --}}
                    <div
                        id="rejectBox"
                        class="mt-5 hidden rounded-xl border border-red-200 bg-red-50 p-5"
                    >

                        <form
                            method="POST"
                            action="{{ route('super_admin.reference-files.reject', $referenceFile) }}"
                        >

                            @csrf
                            @method('PATCH')


                            <label
                                for="rejection_reason"
                                class="mb-2 block text-sm font-bold text-red-800"
                            >
                                Alasan Penolakan
                            </label>


                            <textarea
                                id="rejection_reason"
                                name="rejection_reason"
                                rows="5"
                                required
                                maxlength="2000"
                                placeholder="Tuliskan alasan mengapa file referensi ini ditolak..."
                                class="w-full rounded-xl border-red-200 bg-white px-4 py-3 text-sm text-slate-700 shadow-sm focus:border-red-400 focus:ring-red-400"
                            >{{ old('rejection_reason') }}</textarea>


                            <div class="mt-4 flex flex-col gap-3 sm:flex-row sm:justify-end">

                                <button
                                    type="button"
                                    onclick="document.getElementById('rejectBox').classList.add('hidden')"
                                    class="rounded-xl border border-slate-300 bg-white px-5 py-3 text-sm font-semibold text-slate-600 transition hover:bg-slate-50"
                                >
                                    Batal
                                </button>


                                <button
                                    type="submit"
                                    class="rounded-xl bg-red-600 px-5 py-3 text-sm font-bold text-white transition hover:bg-red-700"
                                >
                                    Konfirmasi Penolakan
                                </button>

                            </div>

                        </form>

                    </div>

                </div>

            @elseif($referenceFile->status === 'approved')

                <div class="rounded-2xl border border-emerald-200 bg-emerald-50 p-6">

                    <div class="flex items-start gap-3">

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="mt-0.5 h-6 w-6 shrink-0 text-emerald-600"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                            />
                        </svg>

                        <div>

                            <p class="font-bold text-emerald-800">
                                File telah disetujui
                            </p>

                            <p class="mt-1 text-sm text-emerald-700">
                                File ini sekarang dapat dilihat dan didownload oleh Teknisi.
                            </p>

                        </div>

                    </div>

                </div>

            @elseif($referenceFile->status === 'rejected')

                <div class="rounded-2xl border border-red-200 bg-red-50 p-6">

                    <div class="flex items-start gap-3">

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="mt-0.5 h-6 w-6 shrink-0 text-red-600"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m6-2a9 9 0 11-18 0 9 9 0 0118 0z"
                            />
                        </svg>

                        <div>

                            <p class="font-bold text-red-800">
                                File ditolak
                            </p>

                            <p class="mt-1 text-sm text-red-700">
                                File ini tidak dapat dilihat oleh Teknisi sampai diajukan kembali dan disetujui.
                            </p>

                        </div>

                    </div>

                </div>

            @endif

        </div>

    </main>

</body>

</html>