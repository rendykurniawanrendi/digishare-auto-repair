<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
    DigiShare{{ !empty($title) ? ' — ' . $title : '' }}
</title>

    <link
        rel="icon"
        type="image/png"
        href="{{ asset('images/digishare-icon.png') }}"
    >

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-slate-100 text-slate-800">

    {{-- =========================================================
         SIDEBAR
    ========================================================== --}}
    @if(auth()->user()->role === 'super_admin')

        @include('super_admin.components.sidebar')

    @elseif(auth()->user()->role === 'admin')

        @include('admin.components.sidebar')

    @elseif(auth()->user()->role === 'teknisi')

        @include('technician.components.sidebar')

    @endif


    {{-- =========================================================
         NAVBAR
         Mulai setelah sidebar (256px)
    ========================================================== --}}
    <header class="fixed left-64 right-0 top-0 z-50 h-16 border-b border-slate-200 bg-white">

        <div class="flex h-full items-center justify-between px-6">

            {{-- PAGE TITLE --}}
            <div>

              <h1 class="text-lg font-bold text-slate-800">
    {{ $title ?? 'DigiShare' }}
</h1>

<p class="text-xs text-slate-500">
    {{ $description ?? 'Data List & Knowledge Sharing' }}
</p>

            </div>


            {{-- USER --}}
            <div class="flex items-center gap-3">

                <div class="hidden text-right sm:block">

                    <p class="text-sm font-semibold text-slate-700">
                        {{ auth()->user()->name }}
                    </p>

                    <p class="text-xs text-slate-400">

                        @if(auth()->user()->role === 'super_admin')
                            Super Admin
                        @elseif(auth()->user()->role === 'admin')
                            Administrator
                        @elseif(auth()->user()->role === 'teknisi')
                            Teknisi
                        @endif

                    </p>

                </div>


                {{-- AVATAR --}}
                <div class="flex h-9 w-9 items-center justify-center rounded-full bg-slate-900 text-sm font-bold text-white">

                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}

                </div>

            </div>

        </div>

    </header>


    {{-- =========================================================
         MAIN CONTENT
    ========================================================== --}}
    <main class="ml-64 min-h-screen bg-slate-100 pt-16">

        <div class="w-full px-6 py-8">

            {{ $slot }}

        </div>

    </main>

</body>

</html>