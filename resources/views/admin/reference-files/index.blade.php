<x-layouts.auto-repair
    title="File Referensi"
    description="Kelola file referensi untuk proses verifikasi"
>

    <div class="w-full max-w-none">

            {{-- Header --}}
            <div class="mb-6 flex items-center justify-between">

                <div>
                    <h2 class="text-2xl font-bold text-slate-800">
                        Daftar File Referensi
                    </h2>

                    <p class="mt-1 text-sm text-slate-500">
                        File yang diupload akan menunggu verifikasi Super Admin.
                    </p>
                </div>

                <a
                    href="{{ route('admin.reference-files.create') }}"
                    class="inline-flex items-center gap-2 rounded-xl bg-slate-800 px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-slate-700"
                >
                    <span class="text-lg">+</span>
                    Upload File
                </a>

            </div>


            {{-- Success Message --}}
            @if(session('success'))
                <div class="mb-5 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-700">
                    {{ session('success') }}
                </div>
            @endif


            {{-- Error Message --}}
            @if(session('error'))
                <div class="mb-5 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
                    {{ session('error') }}
                </div>
            @endif


            {{-- Table --}}
            <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

                <div class="overflow-x-auto">

                    <table class="min-w-full text-left">

                        <thead class="border-b border-slate-200 bg-slate-50">
                            <tr>

                                <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-slate-500">
                                    #
                                </th>

                                <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-slate-500">
                                    File
                                </th>

                                <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-slate-500">
                                    Deskripsi
                                </th>

                                <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-slate-500">
                                    Pengupload
                                </th>

                                <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-slate-500">
                                    Status
                                </th>

                                <th class="px-6 py-4 text-right text-xs font-semibold uppercase tracking-wider text-slate-500">
                                    Aksi
                                </th>

                            </tr>
                        </thead>

                        <tbody class="divide-y divide-slate-100">

                            @forelse($files as $file)

                                <tr class="transition hover:bg-slate-50">

                                    {{-- No --}}
                                    <td class="px-6 py-5 text-sm text-slate-500">
                                        {{ $files->firstItem() + $loop->index }}
                                    </td>


                                    {{-- File --}}
                                    <td class="px-6 py-5">

                                        <div class="flex items-center gap-3">

                                            <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-slate-100 text-lg">
                                                📄
                                            </div>

                                            <div>
                                                <p class="font-semibold text-slate-800">
                                                    {{ $file->nama_file }}
                                                </p>

                                                <p class="mt-1 text-xs text-slate-400">
                                                    {{ basename($file->file) }}
                                                </p>
                                            </div>

                                        </div>

                                    </td>


                                    {{-- Deskripsi --}}
                                    <td class="max-w-xs px-6 py-5">

                                        @if($file->deskripsi)

                                            <p class="truncate text-sm text-slate-600">
                                                {{ $file->deskripsi }}
                                            </p>

                                        @else

                                            <span class="text-sm text-slate-400">
                                                Tidak ada deskripsi
                                            </span>

                                        @endif

                                    </td>


                                    {{-- Pengupload --}}
                                    <td class="px-6 py-5">

                                        <p class="text-sm font-medium text-slate-700">
                                            {{ $file->uploadedBy?->name ?? '-' }}
                                        </p>

                                        <p class="mt-1 text-xs text-slate-400">
                                            {{ $file->created_at?->format('d/m/Y H:i') }}
                                        </p>

                                    </td>


                                    {{-- Status --}}
                                    <td class="px-6 py-5">

                                        @if($file->status === 'approved')

                                            <span class="inline-flex items-center rounded-full bg-emerald-100 px-3 py-1 text-xs font-semibold text-emerald-700">
                                                Disetujui
                                            </span>

                                        @elseif($file->status === 'rejected')

                                            <span class="inline-flex items-center rounded-full bg-red-100 px-3 py-1 text-xs font-semibold text-red-700">
                                                Ditolak
                                            </span>

                                        @else

                                            <span class="inline-flex items-center rounded-full bg-amber-100 px-3 py-1 text-xs font-semibold text-amber-700">
                                                Menunggu Verifikasi
                                            </span>

                                        @endif

                                    </td>


                                    {{-- Aksi --}}
                                    <td class="px-6 py-5">

                                        <div class="flex justify-end">

                                            <form
                                                method="POST"
                                                action="{{ route('admin.reference-files.destroy', $file) }}"
                                                onsubmit="return confirm('Yakin ingin menghapus file referensi ini?')"
                                            >

                                                @csrf
                                                @method('DELETE')

                                                <button
                                                    type="submit"
                                                    class="rounded-lg px-3 py-2 text-sm font-medium text-red-600 transition hover:bg-red-50"
                                                >
                                                    Hapus
                                                </button>

                                            </form>

                                        </div>

                                    </td>

                                </tr>

                            @empty

                                <tr>
                                    <td colspan="6" class="px-6 py-16 text-center">

                                        <div class="mx-auto max-w-sm">

                                            <div class="mb-4 text-4xl">
                                                📁
                                            </div>

                                            <h3 class="text-lg font-semibold text-slate-700">
                                                Belum ada file referensi
                                            </h3>

                                            <p class="mt-2 text-sm text-slate-500">
                                                Upload file referensi pertama untuk diajukan kepada Super Admin.
                                            </p>

                                            <a
                                                href="{{ route('admin.reference-files.create') }}"
                                                class="mt-5 inline-flex rounded-xl bg-slate-800 px-5 py-3 text-sm font-semibold text-white hover:bg-slate-700"
                                            >
                                                Upload File
                                            </a>

                                        </div>

                                    </td>
                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>


                {{-- Pagination --}}
                @if($files->hasPages())

                    <div class="border-t border-slate-200 px-6 py-4">
                        {{ $files->links() }}
                    </div>

                @endif

                       </div>

        </div>

    </div>

</x-layouts.auto-repair>