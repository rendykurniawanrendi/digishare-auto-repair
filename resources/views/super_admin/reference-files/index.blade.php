<x-layouts.auto-repair
    title="Verifikasi File Referensi"
    description="Setujui atau tolak file yang telah diupload oleh Admin."
>


    {{-- HEADER --}}
    <section class="mb-8">
        <div class="flex items-center justify-between">

            <div>
                <h2 class="text-2xl font-bold text-slate-800">
                    Verifikasi File
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    Kelola file referensi yang diajukan oleh Admin.
                </p>
            </div>

        </div>
    </section>


    {{-- FILTER --}}
    <section class="mb-6">

        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">

            <form
                method="GET"
                action="{{ route('super_admin.reference-files.index') }}"
                class="grid grid-cols-1 gap-4 md:grid-cols-3"
            >

                {{-- SEARCH --}}
                <div class="md:col-span-2">

                    <label
                        for="search"
                        class="mb-2 block text-sm font-medium text-slate-700"
                    >
                        Cari File
                    </label>

                    <input
                        id="search"
                        type="text"
                        name="search"
                        value="{{ $search }}"
                        placeholder="Cari nama file atau deskripsi..."
                        class="w-full rounded-xl border-slate-300 text-sm shadow-sm focus:border-blue-500 focus:ring-blue-500"
                    >

                </div>


                {{-- STATUS --}}
                <div>

                    <label
                        for="status"
                        class="mb-2 block text-sm font-medium text-slate-700"
                    >
                        Status
                    </label>

                    <select
                        id="status"
                        name="status"
                        class="w-full rounded-xl border-slate-300 text-sm shadow-sm focus:border-blue-500 focus:ring-blue-500"
                    >

                        <option value="">
                            Semua Status
                        </option>

                        <option
                            value="pending"
                            {{ $status === 'pending' ? 'selected' : '' }}
                        >
                            Pending
                        </option>

                        <option
                            value="approved"
                            {{ $status === 'approved' ? 'selected' : '' }}
                        >
                            Disetujui
                        </option>

                        <option
                            value="rejected"
                            {{ $status === 'rejected' ? 'selected' : '' }}
                        >
                            Ditolak
                        </option>

                    </select>

                </div>


                {{-- BUTTON --}}
                <div class="md:col-span-3 flex justify-end">

                    <button
                        type="submit"
                        class="rounded-xl bg-blue-600 px-5 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700"
                    >
                        Cari
                    </button>

                </div>

            </form>

        </div>

    </section>


    {{-- TABLE --}}
    <section>

        <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

            <div class="border-b border-slate-200 px-6 py-5">

                <h3 class="font-semibold text-slate-800">
                    Daftar File Referensi
                </h3>

                <p class="mt-1 text-sm text-slate-500">
                    File yang dikirim Admin untuk diverifikasi.
                </p>

            </div>


            <div class="overflow-x-auto">

                <table class="min-w-full divide-y divide-slate-200">

                    <thead class="bg-slate-50">

                        <tr>

                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                                File
                            </th>

                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                                Pengunggah
                            </th>

                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                                Status
                            </th>

                            <th class="px-6 py-3 text-right text-xs font-semibold uppercase tracking-wider text-slate-500">
                                Aksi
                            </th>

                        </tr>

                    </thead>


                    <tbody class="divide-y divide-slate-200 bg-white">

                        @forelse($files as $file)

                            <tr class="transition hover:bg-slate-50">

                                {{-- FILE --}}
                                <td class="px-6 py-4">

                                    <div class="font-semibold text-slate-800">
                                        {{ $file->nama_file }}
                                    </div>

                                    @if($file->deskripsi)

                                        <div class="mt-1 max-w-md truncate text-xs text-slate-500">
                                            {{ $file->deskripsi }}
                                        </div>

                                    @endif

                                </td>


                                {{-- UPLOADER --}}
                                <td class="px-6 py-4">

                                    <p class="text-sm font-medium text-slate-700">
                                        {{ $file->uploadedBy?->name ?? '-' }}
                                    </p>

                                    <p class="text-xs text-slate-400">
                                        {{ $file->created_at?->format('d M Y H:i') }}
                                    </p>

                                </td>


                                {{-- STATUS --}}
                                <td class="px-6 py-4">

                                    @if($file->status === 'pending')

                                        <span class="inline-flex rounded-full bg-amber-100 px-3 py-1 text-xs font-semibold text-amber-700">
                                            Pending
                                        </span>

                                    @elseif($file->status === 'approved')

                                        <span class="inline-flex rounded-full bg-emerald-100 px-3 py-1 text-xs font-semibold text-emerald-700">
                                            Disetujui
                                        </span>

                                    @else

                                        <span class="inline-flex rounded-full bg-red-100 px-3 py-1 text-xs font-semibold text-red-700">
                                            Ditolak
                                        </span>

                                    @endif

                                </td>


                                {{-- AKSI --}}
                                <td class="px-6 py-4 text-right">

                                    <a
                                        href="{{ route('super_admin.reference-files.show', $file) }}"
                                        class="inline-flex items-center rounded-xl bg-slate-900 px-4 py-2 text-xs font-semibold text-white transition hover:bg-slate-700"
                                    >
                                        Lihat Detail
                                    </a>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td
                                    colspan="4"
                                    class="px-6 py-12 text-center"
                                >

                                    <p class="text-sm font-medium text-slate-700">
                                        Belum ada file referensi.
                                    </p>

                                    <p class="mt-1 text-xs text-slate-400">
                                        File yang dikirim Admin akan muncul di sini.
                                    </p>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>


            {{-- PAGINATION --}}
            @if($files->hasPages())

                <div class="border-t border-slate-200 px-6 py-4">

                    {{ $files->links() }}

                </div>

            @endif

        </div>

    </section>

</x-layouts.auto-repair>