<x-layouts.auto-repair
    title="Profil"
    description="Kelola informasi akun dan keamanan profil Anda."
>

    <div class="max-w-5xl">

        {{-- =====================================================
             HEADER
        ====================================================== --}}
        <div class="mb-7">

            <p class="text-sm font-medium text-blue-600">
                Akun
            </p>

            <h1 class="mt-1 text-2xl font-bold tracking-tight text-slate-900">
                Profil
            </h1>

            <p class="mt-2 text-sm text-slate-500">
                Kelola informasi akun dan keamanan profil Anda.
            </p>

        </div>


        {{-- =====================================================
             NOTIFIKASI BERHASIL
        ====================================================== --}}
        @if(session('success'))

            <div class="mb-6 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm font-medium text-emerald-700">
                {{ session('success') }}
            </div>

        @endif


        {{-- =====================================================
             INFORMASI PROFILE
        ====================================================== --}}
        <section class="mb-6 overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

            {{-- HEADER CARD --}}
            <div class="border-b border-slate-200 px-6 py-5">

                <h2 class="text-base font-bold text-slate-800">
                    Informasi Profile
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    Perbarui nama dan alamat email akun Anda.
                </p>

            </div>


            {{-- FORM --}}
            <div class="px-6 py-6">

                <form
                    method="POST"
                    action="{{ route('profile.update') }}"
                    class="space-y-5"
                >

                    @csrf
                    @method('PATCH')


                    {{-- NAMA --}}
                    <div>

                        <label
                            for="name"
                            class="mb-2 block text-sm font-semibold text-slate-700"
                        >
                            Nama
                        </label>

                        <input
                            id="name"
                            name="name"
                            type="text"
                            value="{{ old('name', $user->name) }}"
                            required
                            autofocus
                            autocomplete="name"
                            class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm text-slate-700 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                        >

                        @error('name')
                            <p class="mt-2 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- EMAIL --}}
                    <div>

                        <label
                            for="email"
                            class="mb-2 block text-sm font-semibold text-slate-700"
                        >
                            Email
                        </label>

                        <input
                            id="email"
                            name="email"
                            type="email"
                            value="{{ old('email', $user->email) }}"
                            required
                            autocomplete="username"
                            class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm text-slate-700 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                        >

                        @error('email')
                            <p class="mt-2 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- BUTTON --}}
                    <div class="flex items-center gap-3 pt-2">

                        <button
                            type="submit"
                            class="rounded-xl bg-slate-800 px-5 py-3 text-sm font-semibold text-white transition hover:bg-slate-700"
                        >
                            Simpan Perubahan
                        </button>

                        @if(session('status') === 'profile-updated')

                            <p class="text-sm text-emerald-600">
                                Profil berhasil diperbarui.
                            </p>

                        @endif

                    </div>

                </form>

            </div>

        </section>


        {{-- =====================================================
             UBAH PASSWORD
        ====================================================== --}}
        <section class="mb-6 overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

            {{-- HEADER --}}
            <div class="border-b border-slate-200 px-6 py-5">

                <h2 class="text-base font-bold text-slate-800">
                    Ubah Password
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    Gunakan password yang kuat untuk menjaga keamanan akun.
                </p>

            </div>


            {{-- PASSWORD FORM --}}
            <div class="px-6 py-6">

                @include('profile.partials.update-password-form')

            </div>

        </section>


        {{-- =====================================================
             HAPUS AKUN
        ====================================================== --}}
        <section class="overflow-hidden rounded-2xl border border-red-200 bg-white shadow-sm">

            {{-- HEADER --}}
            <div class="border-b border-red-100 px-6 py-5">

                <h2 class="text-base font-bold text-red-700">
                    Hapus Akun
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    Setelah akun dihapus, seluruh data akun akan dihapus secara permanen.
                </p>

            </div>


            {{-- DELETE FORM --}}
            <div class="px-6 py-6">

                @include('profile.partials.delete-user-form')

            </div>

        </section>

    </div>

</x-layouts.auto-repair>