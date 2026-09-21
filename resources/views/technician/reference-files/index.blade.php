<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="icon" type="image/png" href="{{ asset('images/digishare-icon.png') }}">
    <title>File Referensi - Auto Repair</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-100 text-slate-800">

    {{-- =========================================================
         NAVBAR
    ========================================================== --}}
    <header class="fixed left-64 right-0 top-0 z-30 h-16 border-b border-slate-200 bg-white">

        <div class="flex h-full items-center justify-between px-8">

            {{-- PAGE TITLE --}}
            <div>

                <h1 class="text-base font-bold text-slate-800">
                    File Referensi
                </h1>

                <p class="text-xs text-slate-400">
                    Akses file referensi melalui sistem Auto Repair.
                </p>

            </div>


            {{-- USER --}}
            <div class="flex items-center gap-3">

                <div class="hidden text-right sm:block">

                    <p class="text-sm font-semibold text-slate-700">
                        {{ Auth::user()->name }}
                    </p>

                    <p class="text-xs text-slate-400">
                        Teknisi
                    </p>

                </div>

                <div
                    class="flex h-10 w-10 items-center justify-center rounded-full bg-slate-900 text-sm font-bold text-white"
                >
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>

            </div>

        </div>

    </header>


    {{-- =========================================================
         SIDEBAR
         JANGAN DIUBAH
    ========================================================== --}}
    @include('technician.components.sidebar')


    {{-- =========================================================
         MAIN
    ========================================================== --}}
    <main class="ml-64 min-h-screen bg-slate-100 pt-16">

        <div class="p-8">


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
                            File Referensi
                        </h2>

                        <p class="mt-1 text-sm text-slate-500">
                            Dokumen dan file yang telah diverifikasi untuk membantu pekerjaan Teknisi.
                        </p>

                    </div>


                    {{-- TOTAL FILE --}}
                    <div class="rounded-xl bg-emerald-50 px-4 py-3 text-sm font-semibold text-emerald-700">

                        {{ $files->total() }} File Tersedia

                    </div>

                </div>

            </div>


            {{-- =====================================================
                 SEARCH & FILTER
            ====================================================== --}}
            <div class="mb-6 rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">

                <form
                    method="GET"
                    action="{{ route('teknisi.reference-files.index') }}"
                    class="flex flex-col gap-4 lg:flex-row lg:items-end"
                >

                    {{-- SEARCH --}}
                    <div class="flex-1">

                        <label class="mb-2 block text-sm font-semibold text-slate-700">
                            Cari File
                        </label>

                        <div class="relative">

                            <input
                                type="search"
                                name="search"
                                value="{{ $search ?? '' }}"
                                placeholder="Cari nama file atau deskripsi..."
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


                    {{-- FORMAT --}}
                    <div class="lg:w-52">

                        <label class="mb-2 block text-sm font-semibold text-slate-700">
                            Format
                        </label>

                        <select
                            name="format"
                            class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-600 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                        >

                            <option value="">
                                Semua Format
                            </option>

                            <option value="pdf" @selected(($format ?? '') === 'pdf')>
                                PDF
                            </option>

                            <option value="doc" @selected(($format ?? '') === 'doc')>
                                DOC
                            </option>

                            <option value="docx" @selected(($format ?? '') === 'docx')>
                                DOCX
                            </option>

                            <option value="xls" @selected(($format ?? '') === 'xls')>
                                XLS
                            </option>

                            <option value="xlsx" @selected(($format ?? '') === 'xlsx')>
                                XLSX
                            </option>

                            <option value="ppt" @selected(($format ?? '') === 'ppt')>
                                PPT
                            </option>

                            <option value="pptx" @selected(($format ?? '') === 'pptx')>
                                PPTX
                            </option>

                            <option value="zip" @selected(($format ?? '') === 'zip')>
                                ZIP
                            </option>

                        </select>

                    </div>


                    {{-- BUTTON --}}
                    <div class="flex gap-2">

                        <button
                            type="submit"
                            class="rounded-xl bg-slate-800 px-6 py-3 text-sm font-semibold text-white transition hover:bg-slate-700"
                        >
                            Filter
                        </button>


                        @if (($search ?? '') !== '' || ($format ?? '') !== '')

                            <a
                                href="{{ route('teknisi.reference-files.index') }}"
                                class="inline-flex items-center justify-center rounded-xl border border-slate-300 bg-white px-5 py-3 text-sm font-semibold text-slate-600 transition hover:bg-slate-50"
                            >
                                Reset
                            </a>

                        @endif

                    </div>

                </form>

            </div>


            {{-- =====================================================
                 FILE REFERENSI
            ====================================================== --}}
            <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">


                {{-- HEADER --}}
                <div class="border-b border-slate-200 px-6 py-5">

                    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

                        <div>

                            <h3 class="text-base font-semibold text-slate-800">
                                File Referensi Tersedia
                            </h3>

                            <p class="mt-1 text-sm text-slate-500">
                                Daftar file yang telah disediakan dan disetujui untuk Teknisi.
                            </p>

                        </div>


                        <div class="rounded-xl bg-emerald-50 px-4 py-2 text-sm font-semibold text-emerald-700">

                            {{ $files->total() }} File

                        </div>

                    </div>

                </div>


                {{-- =================================================
                     TABLE HEADER
                ================================================== --}}
                <div class="hidden border-b border-slate-200 bg-slate-50 px-6 py-4 md:grid md:grid-cols-[2.2fr_100px_2fr_130px_120px] md:items-center md:gap-6">

                    <div class="text-[11px] font-bold uppercase tracking-wider text-slate-500">
                        Nama File
                    </div>

                    <div class="text-[11px] font-bold uppercase tracking-wider text-slate-500">
                        Format
                    </div>

                    <div class="text-[11px] font-bold uppercase tracking-wider text-slate-500">
                        Deskripsi
                    </div>

                    <div class="text-[11px] font-bold uppercase tracking-wider text-slate-500">
                        Tanggal
                    </div>

                    <div class="text-right text-[11px] font-bold uppercase tracking-wider text-slate-500">
                        Aksi
                    </div>

                </div>


                {{-- =================================================
                     FILE LIST
                ================================================== --}}
                @forelse ($files as $file)

                    @php
                        $extension = strtolower(
                            pathinfo($file->file, PATHINFO_EXTENSION)
                        );
                    @endphp


                    <div class="border-b border-slate-100 px-6 py-5 transition last:border-b-0 hover:bg-slate-50">

                        <div class="grid gap-4 md:grid-cols-[2.2fr_100px_2fr_130px_120px] md:items-center md:gap-6">


                            {{-- NAMA FILE --}}
                            <div class="flex min-w-0 items-center gap-4">

                                <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-slate-100 text-slate-600">

                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-5 w-5"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                        stroke-width="1.7"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M7 3h7l4 4v14H7a2 2 0 01-2-2V5a2 2 0 012-2z"
                                        />

                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M14 3v5h5"
                                        />
                                    </svg>

                                </div>


                                <div class="min-w-0">

                                    <p class="truncate text-sm font-semibold text-slate-900">
                                        {{ $file->nama_file }}
                                    </p>

                                    <p class="mt-1 truncate text-xs text-slate-400">
                                        {{ basename($file->file) }}
                                    </p>

                                </div>

                            </div>


                            {{-- FORMAT --}}
                            <div>

                                <span class="inline-flex rounded-full bg-slate-100 px-3 py-1.5 text-[10px] font-bold uppercase tracking-wide text-slate-600">
                                    {{ $extension ?: 'FILE' }}
                                </span>

                            </div>


                            {{-- DESKRIPSI --}}
                            <div>

                                @if ($file->deskripsi)

                                    <p class="line-clamp-2 text-sm leading-6 text-slate-600">
                                        {{ $file->deskripsi }}
                                    </p>

                                @else

                                    <span class="text-sm text-slate-400">
                                        Tidak ada deskripsi
                                    </span>

                                @endif

                            </div>


                            {{-- TANGGAL --}}
                            <div>

                                <p class="text-sm font-medium text-slate-600">
                                    {{ $file->created_at->format('d M Y') }}
                                </p>

                            </div>


                            {{-- DOWNLOAD --}}
                            <div class="md:text-right">

                                <a
                                    href="{{ route('teknisi.reference-files.download', $file) }}"
                                    class="inline-flex items-center justify-center gap-2 rounded-xl bg-blue-600 px-4 py-3 text-xs font-semibold text-white transition hover:bg-blue-700"
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

                        </div>

                    </div>


                @empty

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
                                    d="M7 3h7l4 4v14H7a2 2 0 01-2-2V5a2 2 0 012-2z"
                                />

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M14 3v5h5"
                                />
                            </svg>

                        </div>


                        <h3 class="font-semibold text-slate-700">
                            Belum Ada File
                        </h3>

                        <p class="mt-1 text-sm text-slate-400">
                            Belum ada file referensi yang disetujui oleh Super Admin.
                        </p>

                    </div>

                @endforelse

            </div>


            {{-- =====================================================
                 PAGINATION
            ====================================================== --}}
            @if ($files->hasPages())

                <div class="mt-6">

                    {{ $files->links() }}

                </div>

            @endif

        </div>

    </main>

</body>

</html>