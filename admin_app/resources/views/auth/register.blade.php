<x-guest-layout>

    <div class="text-center mb-6">

        <img src="{{ asset('images/' . (config('app.logo') ?? 'logo.png')) }}"
            class="w-20 h-20 mx-auto mb-3 rounded-full shadow border">

        <h1 class="text-2xl font-bold text-gray-800 dark:text-white">
            {{ config('app.name') }}
        </h1>

        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
            Create your account
        </p>

    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="mb-4">
            <x-input-label for="name" value="Full Name" />

            <x-text-input id="name"
                class="block mt-1 w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                type="text" name="name" :value="old('name')" required autofocus />

            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="mb-4">
            <x-input-label for="email" value="Email Address" />

            <x-text-input id="email"
                class="block mt-1 w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                type="email" name="email" :value="old('email')" required />

            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mb-4">
            <x-input-label for="password" value="Password" />

            <x-text-input id="password"
                class="block mt-1 w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                type="password" name="password" required />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="mb-4">
            <x-input-label for="password_confirmation" value="Confirm Password" />

            <x-text-input id="password_confirmation"
                class="block mt-1 w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                type="password" name="password_confirmation" required />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between mb-5">

            <a class="text-sm text-indigo-600 hover:text-indigo-800 font-medium" href="{{ route('login') }}">
                Already registered?
            </a>

        </div>

        <button type="submit"
            class="w-full bg-indigo-600 hover:bg-indigo-700
                   text-white font-semibold py-3 rounded-lg
                   transition shadow-md active:scale-[0.98]">

            Register

        </button>

    </form>

</x-guest-layout>
