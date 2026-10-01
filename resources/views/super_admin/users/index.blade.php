<x-layouts.auto-repair
    title=""
    description=""
>

   
     

        {{-- Flash Message --}}
        @if(session('success'))
            <div class="mb-6 rounded-xl border border-emerald-200 bg-emerald-50 px-5 py-4 text-sm font-medium text-emerald-700">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="mb-6 rounded-xl border border-red-200 bg-red-50 px-5 py-4 text-sm font-medium text-red-700">
                {{ session('error') }}
            </div>
        @endif


        {{-- Header Card --}}
        <div class="mb-6 rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">

            <div class="flex flex-col gap-5 lg:flex-row lg:items-center lg:justify-between">

                <div>
                    <h2 class="text-xl font-bold text-slate-800">
                        Daftar Admin dan Teknisi
                    </h2>

                    <p class="mt-1 text-sm text-slate-500">
                        Kelola akun Admin dan Teknisi dalam satu halaman.
                    </p>
                </div>

                <a
                    href="{{ route('super_admin.users.create') }}"
                    class="inline-flex items-center justify-center gap-2 rounded-xl bg-slate-800 px-5 py-3 text-sm font-semibold text-white transition hover:bg-slate-700"
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
                            d="M12 4v16m8-8H4"
                        />
                    </svg>

                    Tambah Akun
                </a>

            </div>

        </div>


        {{-- Search & Filter --}}
        <div class="mb-6 rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">

            <form
                method="GET"
                action="{{ route('super_admin.users.index') }}"
                class="grid gap-4 md:grid-cols-4"
            >

                {{-- Search --}}
                <div class="md:col-span-2">

                    <label class="mb-2 block text-sm font-semibold text-slate-700">
                        Cari Pengguna
                    </label>

                    <input
                        type="text"
                        name="search"
                        value="{{ $search }}"
                        placeholder="Cari nama atau email..."
                        class="w-full rounded-xl border-slate-300 px-4 py-3 text-sm shadow-sm focus:border-slate-500 focus:ring-slate-500"
                    >

                </div>


                {{-- Role --}}
                <div>

                    <label class="mb-2 block text-sm font-semibold text-slate-700">
                        Role
                    </label>

                    <select
                        name="role"
                        class="w-full rounded-xl border-slate-300 px-4 py-3 text-sm shadow-sm focus:border-slate-500 focus:ring-slate-500"
                    >

                        <option value="">
                            Semua Role
                        </option>

                        <option
                            value="admin"
                            {{ $role === 'admin' ? 'selected' : '' }}
                        >
                            Admin
                        </option>

                        <option
                            value="teknisi"
                            {{ $role === 'teknisi' ? 'selected' : '' }}
                        >
                            Teknisi
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
                                Nama
                            </th>

                            <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-slate-500">
                                Email
                            </th>

                            <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-slate-500">
                                Role
                            </th>

                            <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-slate-500">
                                Dibuat
                            </th>

                            <th class="px-6 py-4 text-right text-xs font-bold uppercase tracking-wider text-slate-500">
                                Aksi
                            </th>

                        </tr>

                    </thead>


                    <tbody class="divide-y divide-slate-100">

                        @forelse($users as $index => $user)

                            <tr class="transition hover:bg-slate-50">

                                {{-- No --}}
                                <td class="whitespace-nowrap px-6 py-4 text-sm text-slate-500">
                                    {{ $users->firstItem() + $index }}
                                </td>


                                {{-- Nama --}}
                                <td class="whitespace-nowrap px-6 py-4">

                                    <div class="flex items-center gap-3">

                                        <div class="flex h-10 w-10 items-center justify-center rounded-full bg-slate-200 text-sm font-bold text-slate-700">
                                            {{ strtoupper(substr($user->name, 0, 1)) }}
                                        </div>

                                        <div>

                                            <p class="text-sm font-semibold text-slate-800">
                                                {{ $user->name }}
                                            </p>

                                            <p class="text-xs text-slate-400">
                                                ID #{{ $user->id }}
                                            </p>

                                        </div>

                                    </div>

                                </td>


                                {{-- Email --}}
                                <td class="whitespace-nowrap px-6 py-4 text-sm text-slate-600">
                                    {{ $user->email }}
                                </td>


                                {{-- Role --}}
                                <td class="whitespace-nowrap px-6 py-4">

                                    @if($user->role === 'admin')

                                        <span class="inline-flex rounded-full bg-blue-100 px-3 py-1 text-xs font-bold text-blue-700">
                                            Admin
                                        </span>

                                    @elseif($user->role === 'teknisi')

                                        <span class="inline-flex rounded-full bg-emerald-100 px-3 py-1 text-xs font-bold text-emerald-700">
                                            Teknisi
                                        </span>

                                    @else

                                        <span class="inline-flex rounded-full bg-slate-100 px-3 py-1 text-xs font-bold text-slate-600">
                                            {{ ucfirst($user->role) }}
                                        </span>

                                    @endif

                                </td>


                                {{-- Dibuat --}}
                                <td class="whitespace-nowrap px-6 py-4 text-sm text-slate-500">
                                    {{ $user->created_at?->format('d M Y') }}
                                </td>


                                {{-- Aksi --}}
                                <td class="whitespace-nowrap px-6 py-4">

                                    <div class="flex justify-end gap-2">

                                        {{-- Edit --}}
                                        <a
                                            href="{{ route('super_admin.users.edit', $user) }}"
                                            class="rounded-lg border border-slate-200 px-3 py-2 text-xs font-semibold text-slate-600 transition hover:bg-slate-100"
                                        >
                                            Edit
                                        </a>


                                        {{-- Delete --}}
                                        <form
                                            method="POST"
                                            action="{{ route('super_admin.users.destroy', $user) }}"
                                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus akun ini?');"
                                        >

                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="rounded-lg border border-red-200 px-3 py-2 text-xs font-semibold text-red-600 transition hover:bg-red-50"
                                            >
                                                Hapus
                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td
                                    colspan="6"
                                    class="px-6 py-12 text-center"
                                >

                                    <div class="mx-auto flex max-w-md flex-col items-center">

                                        <div class="mb-4 flex h-14 w-14 items-center justify-center rounded-full bg-slate-100">

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
                                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                                                />
                                            </svg>

                                        </div>

                                        <p class="text-sm font-semibold text-slate-700">
                                            Belum ada akun
                                        </p>

                                        <p class="mt-1 text-sm text-slate-500">
                                            Belum terdapat Admin atau Teknisi yang terdaftar.
                                        </p>

                                    </div>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>


            {{-- Pagination --}}
            @if($users->hasPages())

                <div class="border-t border-slate-200 px-6 py-4">
                    {{ $users->links() }}
                </div>

            @endif

        </div>

    </div>

</x-layouts.auto-repair>