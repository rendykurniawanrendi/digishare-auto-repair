<x-layouts.auto-repair
    title=""
    description=""
>

    <div class="w-full max-w-none">

            {{-- PAGE HEADER --}}
            <div class="mb-8">

                <a href="{{ route('admin.repair-guides.index') }}"
                   class="mb-4 inline-flex items-center gap-2 text-sm font-medium text-slate-500 transition hover:text-blue-600">

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

                <p class="mb-1 text-sm font-semibold text-blue-600">
                    Manajemen 
                </p>

                <h2 class="text-2xl font-bold tracking-tight text-slate-800">
                    Tambah Panduan
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    Isi data kendaraan, checklist pemeriksaan, dokumentasi, dan catatan keseluruhan.
                </p>

            </div>


            {{-- ERROR --}}
            @if ($errors->any())

                <div class="mb-6 rounded-xl border border-red-200 bg-red-50 p-4">

                    <div class="flex gap-3">

                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="h-5 w-5 shrink-0 text-red-600"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor"
                             stroke-width="2">
                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M12 9v3.75m0 3.75h.008M10.29 3.86l-7.5 13A1.5 1.5 0 004.09 19h15.82a1.5 1.5 0 001.3-2.25l-7.5-13a1.5 1.5 0 00-2.6 0z" />
                        </svg>

                        <div>

                            <p class="text-sm font-semibold text-red-700">
                                Terdapat beberapa kesalahan:
                            </p>

                            <ul class="mt-2 list-disc space-y-1 pl-5 text-sm text-red-600">

                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach

                            </ul>

                        </div>

                    </div>

                </div>

            @endif


            {{-- =========================================================
                 FORM
            ========================================================== --}}
            <form method="POST"
                  action="{{ route('admin.repair-guides.store') }}"
                  enctype="multipart/form-data"
                  id="dtrForm">

                @csrf


                {{-- =====================================================
                     1. INFORMASI DTR
                ====================================================== --}}
                <section class="mb-6 overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

                    <div class="border-b border-slate-200 px-6 py-5">

                        <div class="flex items-center gap-4">

                            <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-blue-100 text-blue-600">

                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="h-5 w-5"
                                     fill="none"
                                     viewBox="0 0 24 24"
                                     stroke="currentColor"
                                     stroke-width="2">
                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>

                            </div>

                            <div>
                                <h3 class="font-semibold text-slate-800">
                                    Informasi Panduan
                                </h3>

                                <p class="text-sm text-slate-500">
                                    Informasi dasar dokumen teknis repair.
                                </p>
                            </div>

                        </div>

                    </div>


                    <div class="grid grid-cols-1 gap-6 p-6 lg:grid-cols-2">

                        {{-- NAMA DEALER --}}
                        <div>
                            <label for="nama_dealer"
                                   class="mb-2 block text-sm font-semibold text-slate-700">
                                Nama Dealer
                            </label>

                            <input type="text"
                                   id="nama_dealer"
                                   name="nama_dealer"
                                   value="{{ old('nama_dealer') }}"
                                   placeholder="Masukkan nama dealer"
                                   required
                                   class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                            @error('nama_dealer')
                                <p class="mt-1.5 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>


                        {{-- JUDUL DTR --}}
                        <div>
                            <label for="judul_dtr"
                                   class="mb-2 block text-sm font-semibold text-slate-700">
                                Judul Panduan
                            </label>

                            <input type="text"
                                   id="judul_dtr"
                                   name="judul_dtr"
                                   value="{{ old('judul_dtr') }}"
                                   placeholder="Contoh: Pemeriksaan Sistem Rem"
                                   required
                                   class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                            @error('judul_dtr')
                                <p class="mt-1.5 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>

                </section>

 
                {{-- =====================================================
                     2. DATA KENDARAAN
                ====================================================== --}}
                <section class="mb-6 overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

                    <div class="border-b border-slate-200 px-6 py-5">

                        <h3 class="font-semibold text-slate-800">
                            Data Kendaraan
                        </h3>

                        <p class="mt-1 text-sm text-slate-500">
                            Lengkapi identitas kendaraan yang diperiksa.
                        </p>

                    </div>


                    <div class="grid grid-cols-1 gap-6 p-6 md:grid-cols-2 xl:grid-cols-3">

                        {{-- NO POLISI --}}
                        <div>
                            <label for="no_polisi"
                                   class="mb-2 block text-sm font-semibold text-slate-700">
                                No. Polisi
                            </label>

                            <input type="text"
                                   id="no_polisi"
                                   name="no_polisi"
                                   value="{{ old('no_polisi') }}"
                                   placeholder="Contoh: BP 1234 XX"
                                   required
                                   class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm uppercase outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
                        </div>


                        {{-- MODEL --}}
                        <div>
                            <label for="model"
                                   class="mb-2 block text-sm font-semibold text-slate-700">
                                Model
                            </label>

                            <input type="text"
                                   id="model"
                                   name="model"
                                   value="{{ old('model') }}"
                                   placeholder="Contoh: Avanza"
                                   required
                                   class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
                        </div>


                        {{-- KODE MODEL --}}
                        <div>
                            <label for="kode_model"
                                   class="mb-2 block text-sm font-semibold text-slate-700">
                                Kode Model
                            </label>

                            <input type="text"
                                   id="kode_model"
                                   name="kode_model"
                                   value="{{ old('kode_model') }}"
                                   placeholder="Masukkan kode model"
                                   required
                                   class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm uppercase outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
                        </div>


                        {{-- TAHUN --}}
                        <div>
                            <label for="tahun_pembuatan"
                                   class="mb-2 block text-sm font-semibold text-slate-700">
                                Tahun Pembuatan
                            </label>

                            <input type="number"
                                   id="tahun_pembuatan"
                                   name="tahun_pembuatan"
                                   value="{{ old('tahun_pembuatan') }}"
                                   placeholder="Contoh: 2022"
                                   min="1900"
                                   max="2100"
                                   required
                                   class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
                        </div>


                        {{-- NO RANGKA --}}
                        <div>
                            <label for="no_rangka"
                                   class="mb-2 block text-sm font-semibold text-slate-700">
                                No. Rangka
                            </label>

                            <input type="text"
                                   id="no_rangka"
                                   name="no_rangka"
                                   value="{{ old('no_rangka') }}"
                                   placeholder="Masukkan nomor rangka"
                                   required
                                   class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm uppercase outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
                        </div>


                        {{-- NO MESIN --}}
                        <div>
                            <label for="no_mesin"
                                   class="mb-2 block text-sm font-semibold text-slate-700">
                                No. Mesin
                            </label>

                            <input type="text"
                                   id="no_mesin"
                                   name="no_mesin"
                                   value="{{ old('no_mesin') }}"
                                   placeholder="Masukkan nomor mesin"
                                   required
                                   class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm uppercase outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
                        </div>


                        {{-- TGL PENYERAHAN --}}
                        <div>
                            <label for="tgl_penyerahan"
                                   class="mb-2 block text-sm font-semibold text-slate-700">
                                Tgl. Penyerahan
                            </label>

                            <input type="date"
                                   id="tgl_penyerahan"
                                   name="tgl_penyerahan"
                                   value="{{ old('tgl_penyerahan') }}"
                                   required
                                   class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
                        </div>


                        {{-- TGL PERBAIKAN --}}
                        <div>
                            <label for="tgl_perbaikan"
                                   class="mb-2 block text-sm font-semibold text-slate-700">
                                Tgl. Perbaikan
                            </label>

                            <input type="date"
                                   id="tgl_perbaikan"
                                   name="tgl_perbaikan"
                                   value="{{ old('tgl_perbaikan') }}"
                                   required
                                   class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
                        </div>


                        {{-- JARAK TEMPUH --}}
                        <div>
                            <label for="jarak_tempuh"
                                   class="mb-2 block text-sm font-semibold text-slate-700">
                                Jarak Tempuh (km)
                            </label>

                            <input type="number"
                                   id="jarak_tempuh"
                                   name="jarak_tempuh"
                                   value="{{ old('jarak_tempuh') }}"
                                   placeholder="Contoh: 45000"
                                   min="0"
                                   required
                                   class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
                        </div>

                    </div>

                </section>


                {{-- =====================================================
                     3. CHECKLIST PEMERIKSAAN
                ====================================================== --}}
                <section class="mb-6 overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

                    <div class="border-b border-slate-200 px-6 py-5">

                        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

                            <div>
                                <h3 class="font-semibold text-slate-800">
                                    Checklist Pemeriksaan
                                </h3>

                                <p class="mt-1 text-sm text-slate-500">
                                    Buat checklist pemeriksaan dan tandai jika pemeriksaan sudah dilakukan.
                                </p>
                            </div>

                            <button type="button"
                                    id="addChecklist"
                                    class="inline-flex items-center justify-center gap-2 rounded-xl bg-blue-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700">

                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="h-4 w-4"
                                     fill="none"
                                     viewBox="0 0 24 24"
                                     stroke="currentColor"
                                     stroke-width="2">
                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          d="M12 4v16m8-8H4" />
                                </svg>

                                Tambah Checklist
                            </button>

                        </div>

                    </div>


                    <div class="p-6">

                        <div id="checklistContainer"
                             class="space-y-5">
                        </div>

                    </div>

                </section>


              

                {{-- =====================================================
                     4. CATATAN KESELURUHAN
                ====================================================== --}}
                <section class="mb-6 overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

                    <div class="border-b border-slate-200 px-6 py-5">

                        <h3 class="font-semibold text-slate-800">
                            Catatan Keseluruhan
                        </h3>

                        <p class="mt-1 text-sm text-slate-500">
                            Tuliskan hasil akhir pemeriksaan dan informasi penting lainnya.
                        </p>

                    </div>


                    <div class="p-6">

                        <textarea name="catatan_keseluruhan"
                                  rows="7"
                                  placeholder="Tuliskan catatan keseluruhan hasil pemeriksaan..."
                                  class="w-full resize-y rounded-xl border border-slate-300 px-4 py-3 text-sm leading-6 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">{{ old('catatan_keseluruhan') }}</textarea>

                    </div>

                </section>


                {{-- =====================================================
                     ACTION
                ====================================================== --}}
                <div class="flex flex-col-reverse gap-3 sm:flex-row sm:justify-end">

                    <a href="{{ route('admin.repair-guides.index') }}"
                       class="inline-flex items-center justify-center rounded-xl border border-slate-300 bg-white px-6 py-3 text-sm font-semibold text-slate-600 transition hover:bg-slate-50">
                        Batal
                    </a>

                    <button type="submit"
                            class="inline-flex items-center justify-center gap-2 rounded-xl bg-blue-600 px-6 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700">

                        Lanjut Pengajuan

                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="h-4 w-4"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor"
                             stroke-width="2">
                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M9 5l7 7-7 7" />
                        </svg>

                    </button>

                </div>

            </form>

        </div>

    </main>


    {{-- ================================================================
         JAVASCRIPT
    ================================================================= --}}
    <script>

        let checklistIndex = 0;
        let fileIndex = 0;


        /*
        |--------------------------------------------------------------------------
        | TEMPLATE CHECKLIST
        |--------------------------------------------------------------------------
        */

        function checklistTemplate(index) {

            return `
                <div class="checklist-item rounded-2xl border border-slate-200 bg-slate-50 p-5"
                     data-checklist="${index}">

                    <div class="mb-5 flex items-start justify-between gap-4">

                        <div class="flex-1">

                            <div class="mb-2 flex items-center gap-3">

                                <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-slate-900 text-xs font-bold text-white">
                                    ${index + 1}
                                </span>

                                <span class="text-sm font-semibold text-slate-800">
                                    Pemeriksaan ${index + 1}
                                </span>

                            </div>

                            <input type="text"
                                   name="checklists[${index}][nama_checklist]"
                                   placeholder="Contoh: Pemeriksaan kondisi oli mesin"
                                   required
                                   class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                        </div>


                        <button type="button"
                                onclick="removeChecklist(${index})"
                                class="remove-checklist mt-1 inline-flex h-9 w-9 shrink-0 items-center justify-center rounded-lg border border-red-200 bg-white text-red-500 transition hover:bg-red-50">

                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="h-4 w-4"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke="currentColor"
                                 stroke-width="2">
                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M6 18L18 6M6 6l12 12" />
                            </svg>

                        </button>

                    </div>


                    {{-- STATUS CHECKLIST --}}
                    <div class="mb-5 rounded-xl border border-slate-200 bg-white p-4">

                        <label class="flex cursor-pointer items-center gap-3">

                            <input type="hidden"
                                   name="checklists[${index}][is_checked]"
                                   value="0">

                            <input type="checkbox"
                                   name="checklists[${index}][is_checked]"
                                   value="1"
                                   class="h-5 w-5 rounded border-slate-300 text-blue-600 focus:ring-blue-500">

                            <span>

                                <span class="block text-sm font-semibold text-slate-700">
                                    Pemeriksaan sudah dilakukan
                                </span>

                                <span class="block text-xs text-slate-400">
                                    Centang jika checklist ini sudah diperiksa.
                                </span>

                            </span>

                        </label>

                    </div>


                    {{-- FOTO --}}
                    <div class="mb-5 rounded-xl border border-slate-200 bg-white p-4">

                        <div class="mb-4 flex items-center justify-between gap-3">

                            <div>
                                <h4 class="text-sm font-semibold text-slate-700">
                                    Foto Pemeriksaan
                                </h4>

                                <p class="mt-1 text-xs text-slate-400">
                                    Bisa menambahkan beberapa foto.
                                </p>
                            </div>

                            <button type="button"
                                    onclick="addPhoto(${index})"
                                    class="inline-flex items-center gap-1.5 rounded-lg border border-slate-300 px-3 py-2 text-xs font-semibold text-slate-600 transition hover:bg-slate-50">

                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="h-3.5 w-3.5"
                                     fill="none"
                                     viewBox="0 0 24 24"
                                     stroke="currentColor"
                                     stroke-width="2">
                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          d="M12 4v16m8-8H4" />
                                </svg>

                                Tambah Foto
                            </button>

                        </div>


                        <div id="photos-${index}"
                             class="space-y-3">
                        </div>

                    </div>


                    {{-- VIDEO --}}
                    <div class="rounded-xl border border-slate-200 bg-white p-4">

                        <div class="mb-4 flex items-center justify-between gap-3">

                            <div>
                                <h4 class="text-sm font-semibold text-slate-700">
                                    link Panduan Pemeriksaan
                                </h4>

                                <p class="mt-1 text-xs text-slate-400">
                                    Bisa menambahkan beberapa kolom
                                </p>
                            </div>

                            <button type="button"
                                    onclick="addVideo(${index})"
                                    class="inline-flex items-center gap-1.5 rounded-lg border border-slate-300 px-3 py-2 text-xs font-semibold text-slate-600 transition hover:bg-slate-50">

                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="h-3.5 w-3.5"
                                     fill="none"
                                     viewBox="0 0 24 24"
                                     stroke="currentColor"
                                     stroke-width="2">
                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          d="M12 4v16m8-8H4" />
                                </svg>

                                Tambah Video
                            </button>

                        </div>


                        <div id="videos-${index}"
                             class="space-y-3">
                        </div>

                    </div>

                </div>
            `;
        }


        /*
        |--------------------------------------------------------------------------
        | TAMBAH CHECKLIST
        |--------------------------------------------------------------------------
        */

        function addChecklist() {

            const container = document.getElementById('checklistContainer');

            container.insertAdjacentHTML(
                'beforeend',
                checklistTemplate(checklistIndex)
            );

            checklistIndex++;
        }


        /*
        |--------------------------------------------------------------------------
        | HAPUS CHECKLIST
        |--------------------------------------------------------------------------
        */

        function removeChecklist(index) {

            const item = document.querySelector(
                `[data-checklist="${index}"]`
            );

            if (item) {
                item.remove();
            }

            renumberChecklists();
        }


        /*
        |--------------------------------------------------------------------------
        | NOMOR ULANG CHECKLIST
        |--------------------------------------------------------------------------
        */

        function renumberChecklists() {

            const items = document.querySelectorAll('.checklist-item');

            items.forEach((item, number) => {

                const numberElement = item.querySelector(
                    '.flex.h-8.w-8'
                );

                if (numberElement) {
                    numberElement.textContent = number + 1;
                }

                const titleElement = item.querySelector(
                    '.text-sm.font-semibold.text-slate-800'
                );

                if (titleElement) {
                    titleElement.textContent =
                        `Pemeriksaan ${number + 1}`;
                }

            });
        }


        /*
        |--------------------------------------------------------------------------
        | TAMBAH FOTO
        |--------------------------------------------------------------------------
        */

        function addPhoto(checklistIndex) {

            const container = document.getElementById(
                `photos-${checklistIndex}`
            );

            const photoIndex = container.children.length;

            const html = `
                <div class="photo-item grid grid-cols-1 gap-3 rounded-xl border border-slate-200 bg-slate-50 p-3 md:grid-cols-[1fr_1fr_auto]">

                    <input type="file"
                           name="checklists[${checklistIndex}][photos][${photoIndex}][foto]"
                           accept=".jpg,.jpeg,.png,.webp"
                           required
                           class="block w-full rounded-lg border border-slate-300 bg-white text-xs text-slate-600 file:mr-3 file:border-0 file:bg-slate-100 file:px-3 file:py-2 file:text-xs file:font-medium">

                    <input type="text"
                           name="checklists[${checklistIndex}][photos][${photoIndex}][caption]"
                           placeholder="Caption foto"
                           class="w-full rounded-lg border border-slate-300 bg-white px-3 py-2.5 text-xs outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                    <button type="button"
                            onclick="this.closest('.photo-item').remove()"
                            class="inline-flex h-9 items-center justify-center rounded-lg border border-red-200 px-3 text-red-500 hover:bg-red-50">

                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="h-4 w-4"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor"
                             stroke-width="2">
                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M6 18L18 6M6 6l12 12" />
                        </svg>

                    </button>

                </div>
            `;

            container.insertAdjacentHTML('beforeend', html);
        }


        /*
        |--------------------------------------------------------------------------
        | TAMBAH VIDEO
        |--------------------------------------------------------------------------
        */
function addVideo(checklistIndex) {

    const container = document.getElementById(
        `videos-${checklistIndex}`
    );

    const videoIndex = container.children.length;

    const html = `
        <div class="video-item grid grid-cols-1 gap-3 rounded-xl border border-slate-200 bg-slate-50 p-3 md:grid-cols-[1fr_1fr_auto]">

            <input type="url"
                   name="checklists[${checklistIndex}][videos][${videoIndex}][video]"
                   placeholder="https://onedrive.live.com/... atau https://terabox.com/..."
                   required
                   class="w-full rounded-lg border border-slate-300 bg-white px-3 py-2.5 text-xs outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

            <input type="text"
                   name="checklists[${checklistIndex}][videos][${videoIndex}][caption]"
                   placeholder="Keterangan video"
                   class="w-full rounded-lg border border-slate-300 bg-white px-3 py-2.5 text-xs outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

            <button type="button"
                    onclick="this.closest('.video-item').remove()"
                    class="inline-flex h-9 items-center justify-center rounded-lg border border-red-200 px-3 text-red-500 hover:bg-red-50">

                <svg xmlns="http://www.w3.org/2000/svg"
                     class="h-4 w-4"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor"
                     stroke-width="2">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          d="M6 18L18 6M6 6l12 12" />

                </svg>

            </button>

        </div>
    `;

    container.insertAdjacentHTML('beforeend', html);
}
        /*
        |--------------------------------------------------------------------------
        | TAMBAH FILE
        |--------------------------------------------------------------------------
        */

        function addFile() {

            const container = document.getElementById('fileContainer');

            const html = `
                <div class="file-item rounded-xl border border-slate-200 bg-slate-50 p-4">

                    <div class="grid grid-cols-1 gap-4 lg:grid-cols-[1fr_1fr_1fr_auto]">


                        <input type="file"
                               name="files[${fileIndex}][file]"
                               accept=".pdf,.doc,.docx,.xls,.xlsx,.zip"
                               required
                               class="block w-full rounded-lg border border-slate-300 bg-white text-xs text-slate-600 file:mr-3 file:border-0 file:bg-slate-100 file:px-3 file:py-2 file:text-xs file:font-medium">

                        <input type="text"
                               name="files[${fileIndex}][deskripsi]"
                               placeholder="Deskripsi file"
                               class="w-full rounded-lg border border-slate-300 bg-white px-3 py-2.5 text-sm outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                        <button type="button"
                                onclick="this.closest('.file-item').remove()"
                                class="inline-flex h-10 items-center justify-center rounded-lg border border-red-200 px-3 text-red-500 hover:bg-red-50">

                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="h-4 w-4"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke="currentColor"
                                 stroke-width="2">
                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M6 18L18 6M6 6l12 12" />
                            </svg>

                        </button>

                    </div>

                </div>
            `;

            container.insertAdjacentHTML('beforeend', html);

            fileIndex++;
        }


        /*
        |--------------------------------------------------------------------------
        | BUTTON EVENTS
        |--------------------------------------------------------------------------
        */

        document
            .getElementById('addChecklist')
            .addEventListener('click', addChecklist);

        document
            .getElementById('addFile')
            .addEventListener('click', addFile);


        /*
        |--------------------------------------------------------------------------
        | CHECKLIST PERTAMA
        |--------------------------------------------------------------------------
        */

        addChecklist();


        /*
        |--------------------------------------------------------------------------
        | VALIDASI MINIMAL CHECKLIST
        |--------------------------------------------------------------------------
        */

        document
            .getElementById('dtrForm')
            .addEventListener('submit', function (event) {

                const checklistItems =
                    document.querySelectorAll('.checklist-item');

                if (checklistItems.length === 0) {

                    event.preventDefault();

                    alert(
                        'Minimal harus memiliki satu checklist pemeriksaan.'
                    );

                    return;
                }

            });

    </script>

<      </div>

    </div>

</x-layouts.auto-repair>