<x-guest-layout>

    <div class="text-center mb-6">

        <img src="{{ asset('storage/' . setting('site_logo')) }}"
            class="w-20 h-20 mx-auto mb-3 rounded-full shadow border">

        <h1 class="text-2xl font-bold text-gray-800 dark:text-white">
            {{ setting('app_name') }}
        </h1>

        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
            Sign in to your account
        </p>

    </div>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-4">
            <x-input-label for="email" value="Email Address" />

            <x-text-input id="email"
                class="block mt-1 w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                type="email" name="email" :value="old('email')" required autofocus />

            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mb-4">
            <x-input-label for="password" value="Password" />

            <x-text-input id="password"
                class="block mt-1 w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                type="password" name="password" required />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

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

        <button type="submit"
            class="w-full bg-indigo-600 hover:bg-indigo-700
                   text-white font-semibold py-3 rounded-lg
                   transition shadow-md active:scale-[0.98]">

            Log In

        </button>

    </form>

</x-guest-layout>
