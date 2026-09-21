<x-guest-layout>
    <div class="mb-6 text-center">
        <h1 class="text-2xl font-bold text-gray-900">
            Login Admin
        </h1>

        <p class="mt-2 text-sm text-gray-600">
            Masuk ke sistem Auto Repair
        </p>
    </div>

    <form method="POST" action="{{ route('admin.login.store') }}">
        @csrf

        <!-- Email -->
        <div>
            <x-input-label for="email" :value="__('Email')" />

            <x-text-input
                id="email"
                class="mt-1 block w-full"
                type="email"
                name="email"
                :value="old('email')"
                required
                autofocus
                autocomplete="username"
            />

            <x-input-error
                :messages="$errors->get('email')"
                class="mt-2"
            />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input
                id="password"
                class="mt-1 block w-full"
                type="password"
                name="password"
                required
                autocomplete="current-password"
            />

            <x-input-error
                :messages="$errors->get('password')"
                class="mt-2"
            />
        </div>

        <!-- Remember -->
        <div class="mt-4 block">
            <label for="remember" class="inline-flex items-center">
                <input
                    id="remember"
                    type="checkbox"
                    name="remember"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                >

                <span class="ms-2 text-sm text-gray-600">
                    Ingat saya
                </span>
            </label>
        </div>

        <div class="mt-6 flex items-center justify-end">
            <a
                href="{{ route('password.request') }}"
                class="rounded-md text-sm text-gray-600 underline hover:text-gray-900"
            >
                Lupa password?
            </a>

            <x-primary-button class="ms-4">
                Masuk
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>