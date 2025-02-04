<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="relative">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full pl-10" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
            <i class="fas fa-envelope absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500"></i>
        </div>

        <!-- Password -->
        <div class="relative mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full pl-10" type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
            <i class="fas fa-lock absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500"></i>
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-between mt-4">
            <!-- Forgot Password -->
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>

    <!-- CSS Styling -->
    <style>
        /* Styling input untuk tampilan lebih modern */
        input[type="email"], input[type="password"] {
            border: 1px solid #d1d5db; /* Warna border netral */
            border-radius: 8px; /* Rounded border */
            padding: 10px; /* Padding dalam */
            transition: all 0.3s ease-in-out;
        }

        /* Efek hover input */
        input[type="email"]:focus, input[type="password"]:focus {
            border-color: #6366f1; /* Border saat fokus */
            box-shadow: 0 0 8px rgba(99, 102, 241, 0.5); /* Shadow lembut */
        }

        /* Mengatur ikon di dalam input */
        .relative i {
            font-size: 1.25rem; /* Ukuran ikon */
            color: #6b7280; /* Warna ikon */
        }
    </style>
</x-guest-layout>
