<x-guest-layout>

    <!-- Page Wrapper -->
    <div class="min-h-screen flex items-center justify-center px-4 bg-gray-100 dark:bg-gray-900">

        <!-- Login Card -->
        <div class="w-full max-w-md">

            <div class="bg-white dark:bg-gray-800 shadow-xl rounded-2xl p-6 sm:p-8">

                <!-- Header -->
                <div class="text-center mb-6">

                    <img src="{{ asset('images/' . (config('app.logo') ?? 'logo.png')) }}" alt="{{ config('app.name') }}"
                        class="w-20 h-20 mx-auto mb-3 rounded-full shadow border">

                    <h1 class="text-2xl font-bold text-gray-800 dark:text-white">
                        {{ config('app.name') }}
                    </h1>

                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                        Sign in to your account
                    </p>

                </div>

                <!-- Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email -->
                    <div class="mb-4">
                        <x-input-label for="email" value="Email Address" />

                        <x-text-input id="email"
                            class="block mt-1 w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                            type="email" name="email" :value="old('email')" required autofocus
                            autocomplete="username" />

                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mb-4">
                        <x-input-label for="password" value="Password" />

                        <x-text-input id="password"
                            class="block mt-1 w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                            type="password" name="password" required autocomplete="current-password" />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Remember + Forgot -->
                    <div class="flex items-center justify-between mb-5">

                        <label class="flex items-center">
                            <input type="checkbox" name="remember"
                                class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">

                            <span class="ml-2 text-sm text-gray-600 dark:text-gray-300">
                                Remember me
                            </span>
                        </label>

                        @if (Route::has('password.request'))
                            <a class="text-sm text-indigo-600 hover:text-indigo-800 font-medium"
                                href="{{ route('password.request') }}">
                                Forgot password?
                            </a>
                        @endif

                    </div>

                    <!-- Button -->
                    <button type="submit"
                        class="w-full bg-indigo-600 hover:bg-indigo-700
                                   text-white font-semibold py-3 rounded-lg
                                   transition shadow-md
                                   active:scale-[0.98]">

                        Sign In

                    </button>

                </form>

                <!-- Footer -->
                <div class="text-center text-xs text-gray-400 mt-6">
                    © {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
                </div>

            </div>

        </div>

    </div>

</x-guest-layout>
