<x-layouts.auto-repair
    title=""
    description=""
>

    <div class="w-full max-w-none">

        <div class="w-full px-6 py-8 lg:px-10 xl:px-12">

            {{-- Header --}}
            <div class="mb-8">

                <div class="flex flex-col justify-between gap-4 sm:flex-row sm:items-center">

                    <div>
                        <div class="mb-2 flex items-center gap-2 text-sm text-slate-500">

                            <a
                                href="{{ route('admin.reference-files.index') }}"
                                class="hover:text-blue-600"
                            >
                                File Referensi
                            </a>

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
                                    d="M9 5l7 7-7 7"
                                />
                            </svg>

                            <span class="text-slate-400">
                                Upload File
                            </span>

                        </div>

                        <h2 class="text-2xl font-bold tracking-tight text-slate-800">
                            Upload File Referensi
                        </h2>

                        <p class="mt-1 text-sm text-slate-500">
                            Tambahkan file yang dapat digunakan sebagai referensi teknisi.
                        </p>
                    </div>

                </div>

            </div>


            {{-- =================================================
                FORM CARD
            ================================================== --}}
            <div class="w-full overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

                {{-- Card Header --}}
                <div class="border-b border-slate-200 bg-slate-50 px-6 py-5 lg:px-8">

                    <div class="flex items-center gap-3">

                        <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-blue-100 text-blue-600">

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
                                    d="M7 16a4 4 0 01-.88-7.903A5 5 0 0115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"
                                />
                            </svg>

                        </div>

                        <div>

                            <h3 class="text-lg font-semibold text-slate-800">
                                File Referensi Baru
                            </h3>

                            <p class="mt-0.5 text-sm text-slate-500">
                                Upload dokumen yang nantinya dapat digunakan oleh teknisi.
                            </p>

                        </div>

                    </div>

                </div>


                {{-- Form --}}
                <form
                    action="{{ route('admin.reference-files.store') }}"
                    method="POST"
                    enctype="multipart/form-data"
                    class="p-6 lg:p-8"
                >

                    @csrf


                    {{-- Grid --}}
                    <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">


                        {{-- =================================================
                            NAMA FILE
                        ================================================== --}}
                        <div class="lg:col-span-2">

                            <label
                                for="nama_file"
                                class="block text-sm font-semibold text-slate-700"
                            >
                                Nama File
                                <span class="text-red-500">*</span>
                            </label>

                            <input
                                id="nama_file"
                                type="text"
                                name="nama_file"
                                value="{{ old('nama_file') }}"
                                placeholder="Contoh: Manual Perbaikan Toyota Avanza"
                                class="mt-2 block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-800 outline-none transition placeholder:text-slate-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                                required
                            >

                            @error('nama_file')
                                <p class="mt-2 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>


                        {{-- =================================================
                            DESKRIPSI
                        ================================================== --}}
                        <div class="lg:col-span-2">

                            <label
                                for="deskripsi"
                                class="block text-sm font-semibold text-slate-700"
                            >
                                Deskripsi
                            </label>

                            <textarea
                                id="deskripsi"
                                name="deskripsi"
                                rows="5"
                                placeholder="Masukkan keterangan mengenai file ini..."
                                class="mt-2 block w-full resize-y rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-800 outline-none transition placeholder:text-slate-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                            >{{ old('deskripsi') }}</textarea>

                            @error('deskripsi')
                                <p class="mt-2 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>


                        {{-- =================================================
                            FILE UPLOAD
                        ================================================== --}}
                        <div class="lg:col-span-2">

                            <label
                                for="file"
                                class="block text-sm font-semibold text-slate-700"
                            >
                                File
                                <span class="text-red-500">*</span>
                            </label>


                            <div class="mt-2 rounded-xl border-2 border-dashed border-slate-300 bg-slate-50 p-6 transition hover:border-blue-400 hover:bg-blue-50/30">

                                <div class="flex flex-col items-center justify-center text-center">

                                    <div class="mb-3 flex h-12 w-12 items-center justify-center rounded-xl bg-blue-100 text-blue-600">

                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="h-6 w-6"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                            stroke-width="2"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586A2 2 0 0114 3.586L19.414 9A2 2 0 0120 10.414V19a2 2 0 01-2 2z"
                                            />
                                        </svg>

                                    </div>

                                    <p class="text-sm font-medium text-slate-700">
                                        Pilih file referensi
                                    </p>

                                    <p class="mt-1 text-xs text-slate-500">
                                        PDF, DOC, DOCX, XLS, XLSX, PPT, PPTX, atau ZIP
                                    </p>


                                    <label
                                        for="file"
                                        class="mt-4 inline-flex cursor-pointer items-center gap-2 rounded-lg bg-blue-600 px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-blue-700"
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
                                                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"
                                            />
                                        </svg>

                                        Pilih File

                                    </label>

                                    <input
                                        id="file"
                                        type="file"
                                        name="file"
                                        class="hidden"
                                        required
                                    >

                                    <p
                                        id="file-name"
                                        class="mt-3 hidden text-sm font-medium text-blue-600"
                                    ></p>

                                </div>

                            </div>


                            <p class="mt-2 text-xs text-slate-500">
                                Maksimal ukuran file: <strong>50 MB</strong>.
                            </p>

                            @error('file')
                                <p class="mt-2 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>

                    </div>


                    {{-- =================================================
                        ACTION BUTTON
                    ================================================== --}}
                    <div class="mt-8 flex flex-col-reverse gap-3 border-t border-slate-200 pt-6 sm:flex-row sm:items-center sm:justify-end">

                        <a
                            href="{{ route('admin.reference-files.index') }}"
                            class="inline-flex items-center justify-center gap-2 rounded-xl border border-slate-300 bg-white px-6 py-3 text-sm font-semibold text-slate-700 transition hover:bg-slate-50"
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
                                    d="M10 19l-7-7m0 0l7-7m-7 7h18"
                                />
                            </svg>

                            Batal

                        </a>


                        <button
                            type="submit"
                            class="inline-flex items-center justify-center gap-2 rounded-xl bg-blue-600 px-6 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
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
                                    d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"
                                />
                            </svg>

                            Upload File

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </main>


    {{-- =========================================================
        FILE NAME PREVIEW
    ========================================================== --}}
    <script>
        const fileInput = document.getElementById('file');
        const fileName = document.getElementById('file-name');

        fileInput.addEventListener('change', function () {
            if (this.files.length > 0) {
                fileName.textContent = 'File dipilih: ' + this.files[0].name;
                fileName.classList.remove('hidden');
            } else {
                fileName.textContent = '';
                fileName.classList.add('hidden');
            }
        });
    </script>
        </div>


    </div>

</x-layouts.auto-repair>