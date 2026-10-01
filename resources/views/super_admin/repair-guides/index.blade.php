<x-layouts.auto-repair
    title=""
    description=""
>

    <div class="w-full max-w-none">
     


            {{-- Success --}}
            @if(session('success'))
                <div class="mb-6 rounded-xl border border-emerald-200 bg-emerald-50 px-5 py-4 text-sm font-medium text-emerald-700">
                    {{ session('success') }}
                </div>
            @endif


            {{-- Header --}}
            <div class="mb-6 rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">

                <div class="flex flex-col gap-5 lg:flex-row lg:items-center lg:justify-between">

                    <div>
                        <h2 class="text-xl font-bold text-slate-800">
                            Verifikasi Panduan
                        </h2>

                        <p class="mt-1 text-sm text-slate-500">
                            Periksa Panduan sebelum dipublikasikan kepada Teknisi.
                        </p>
                    </div>

                    <div class="rounded-xl bg-amber-50 px-4 py-3 text-sm font-semibold text-amber-700">
                        {{ \App\Models\RepairGuide::where('status', 'pending')->count() }}
                        DTR menunggu verifikasi
                    </div>

                </div>

            </div>


            {{-- Search & Filter --}}
            <div class="mb-6 rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">

                <form
                    method="GET"
                    action="{{ route('super_admin.repair-guides.index') }}"
                    class="grid gap-4 md:grid-cols-4"
                >

                    {{-- Search --}}
                    <div class="md:col-span-2">

                        <label class="mb-2 block text-sm font-semibold text-slate-700">
                            Cari Panduan Pengajuan
                        </label>

                        <input
                            type="text"
                            name="search"
                            value="{{ $search }}"
                            placeholder="Judul Panduan, dealer, nomor polisi, model..."
                            class="w-full rounded-xl border-slate-300 px-4 py-3 text-sm shadow-sm focus:border-slate-500 focus:ring-slate-500"
                        >

                    </div>


                    {{-- Status --}}
                    <div>

                        <label class="mb-2 block text-sm font-semibold text-slate-700">
                            Status
                        </label>

                        <select
                            name="status"
                            class="w-full rounded-xl border-slate-300 px-4 py-3 text-sm shadow-sm focus:border-slate-500 focus:ring-slate-500"
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
                                Approved
                            </option>

                            <option
                                value="rejected"
                                {{ $status === 'rejected' ? 'selected' : '' }}
                            >
                                Rejected
                            </option>

                        </select>

                    </div>


                    {{-- Button --}}
                    <div class="flex items-end">

                        <button
                            type="submit"
                            class="w-full rounded-xl bg-slate-700 px-5 py-3 text-sm font-semibold text-white transition hover:bg-slate-600"
                        >
                            Terapkan Filter
                        </button>

                    </div>

                </form>

            </div>


            {{-- Table --}}
            <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

                <div class="overflow-x-auto">

                    <table class="min-w-full">

                        <thead class="border-b border-slate-200 bg-slate-50">

                            <tr>

                                <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-slate-500">
                                    No
                                </th>

                                <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-slate-500">
                                    Panduan
                                </th>

                                <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-slate-500">
                                    Kendaraan
                                </th>

                                <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-slate-500">
                                    Dealer
                                </th>

                                <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-slate-500">
                                    Tanggal
                                </th>

                                <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-slate-500">
                                    Status
                                </th>

                                <th class="px-6 py-4 text-right text-xs font-bold uppercase tracking-wider text-slate-500">
                                    Aksi
                                </th>

                            </tr>

                        </thead>


                        <tbody class="divide-y divide-slate-100">

                            @forelse($guides as $index => $guide)

                                <tr class="transition hover:bg-slate-50">

                                    {{-- No --}}
                                    <td class="whitespace-nowrap px-6 py-4 text-sm text-slate-500">
                                        {{ $guides->firstItem() + $index }}
                                    </td>


                                    {{-- DTR --}}
                                    <td class="px-6 py-4">

                                        <div class="max-w-xs">

                                            <p class="text-sm font-semibold text-slate-800">
                                                {{ $guide->judul_dtr }}
                                            </p>

                                            <p class="mt-1 text-xs text-slate-400">
                                                DTR #{{ $guide->id }}
                                            </p>

                                        </div>

                                    </td>


                                    {{-- Kendaraan --}}
                                    <td class="px-6 py-4">

                                        <p class="text-sm font-semibold text-slate-700">
                                            {{ $guide->model }}
                                        </p>

                                        <p class="mt-1 text-xs text-slate-500">
                                            {{ $guide->kode_model }}
                                        </p>

                                        <p class="mt-1 text-xs text-slate-400">
                                            {{ $guide->no_polisi }}
                                        </p>

                                    </td>


                                    {{-- Dealer --}}
                                    <td class="whitespace-nowrap px-6 py-4 text-sm text-slate-600">
                                        {{ $guide->nama_dealer }}
                                    </td>


                                    {{-- Tanggal --}}
                                    <td class="whitespace-nowrap px-6 py-4">

                                        <p class="text-sm text-slate-600">
                                            {{ $guide->tgl_perbaikan?->format('d M Y') }}
                                        </p>

                                        <p class="mt-1 text-xs text-slate-400">
                                            Dikirim {{ $guide->created_at?->format('d M Y') }}
                                        </p>

                                    </td>


                                    {{-- Status --}}
                                    <td class="whitespace-nowrap px-6 py-4">

                                        @if($guide->status === 'pending')

                                            <span class="inline-flex rounded-full bg-amber-100 px-3 py-1 text-xs font-bold text-amber-700">
                                                Pending
                                            </span>

                                        @elseif($guide->status === 'approved')

                                            <span class="inline-flex rounded-full bg-emerald-100 px-3 py-1 text-xs font-bold text-emerald-700">
                                                Approved
                                            </span>

                                        @elseif($guide->status === 'rejected')

                                            <span class="inline-flex rounded-full bg-red-100 px-3 py-1 text-xs font-bold text-red-700">
                                                Rejected
                                            </span>

                                        @else

                                            <span class="inline-flex rounded-full bg-slate-100 px-3 py-1 text-xs font-bold text-slate-600">
                                                {{ ucfirst($guide->status) }}
                                            </span>

                                        @endif

                                    </td>


                                    {{-- Action --}}
                                    <td class="whitespace-nowrap px-6 py-4 text-right">

                                        <a
                                            href="{{ route('super_admin.repair-guides.show', $guide) }}"
                                            class="inline-flex items-center rounded-lg bg-slate-800 px-4 py-2 text-xs font-semibold text-white transition hover:bg-slate-700"
                                        >
                                            Periksa
                                        </a>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td
                                        colspan="7"
                                        class="px-6 py-12 text-center"
                                    >

                                        <div class="mx-auto max-w-md">

                                            <div class="mx-auto mb-4 flex h-14 w-14 items-center justify-center rounded-full bg-slate-100">

                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    class="h-7 w-7 text-slate-400"
                                                    fill="none"
                                                    viewBox="0 0 24 24"
                                                    stroke="currentColor"
                                                    stroke-width="2"
                                                >
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h6l5 5v11a2 2 0 01-2 2z"
                                                    />
                                                </svg>

                                            </div>

                                            <p class="text-sm font-semibold text-slate-700">
                                                Belum ada DTR
                                            </p>

                                            <p class="mt-1 text-sm text-slate-500">
                                                Belum terdapat DTR yang sesuai dengan pencarian atau filter.
                                            </p>

                                        </div>

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>


                {{-- Pagination --}}
                @if($guides->hasPages())

                    <div class="border-t border-slate-200 px-6 py-4">
                        {{ $guides->links() }}
                    </div>

                @endif

            </div>
            
     
        
        </div>
    </div>

</x-layouts.auto-repair>

