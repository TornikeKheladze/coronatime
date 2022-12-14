<x-layout>

    <div class="flex justify-center lg:justify-between lg:items-start">
        <div class="w-80 lg:w-96 lg:ml-28 flex flex-col gap-6 mt-10">
            <header class="lg:self-start">
                <img src="{{ asset('images/logo.png') }}" />
            </header>
            <h1 class="font-black text-2xl">{{ __('log-in.welcome') }}</h1>
            <h3 class="text-gray-400">
                {{ __('log-in.welcome_back') }}
            </h3>
            <form method="POST" action="{{ route('login', ['lang' => app()->getLocale()]) }}" class="flex flex-col gap-6">
                @csrf
                <x-input type="text" name="name_mail" label="{{ __('log-in.username') }}"
                    placeholder="{{ __('log-in.uniq_emil') }}" />
                <x-input type="password" name="password" label="{{ __('log-in.password') }}"
                    placeholder="{{ __('log-in.fill_password') }}" />
                <div class="flex justify-between">
                    <div class="text-sm font-semibold flex gap-2">
                        <input id="default-checkbox" type="checkbox" value=""
                            class="w-4 h-4 accent-green-600 text-green-600 bg-gray-100 rounded border-gray-300 focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" />
                        <label for="default-checkbox" class="flex items-center mb-4">
                            {{ __('log-in.remember') }}
                        </label>
                    </div>
                <div class="flex justify-between">
                    <a href="{{ route('password.request', ['lang' => app()->getLocale()]) }}"
                        class="text-blue-700 text-sm font-semibold">{{ __('log-in.forgot') }}</a>
                </div>
                </div>               


                <x-button text="{{ __('log-in.login') }}" />
            </form>
            <p class="text-center">
                <span class="text-zinc-500">{{ __('log-in.dont_have_account') }}</span>
                <a href="{{ route('register.show', ['lang' => app()->getLocale()]) }}"
                    class="font-bold">{{ __('log-in.sing_free') }}</a>
            </p>
        </div>
        <div class="hidden lg:block h-screen">
            <img class="h-full" src="{{ asset('images/corona.png') }}" />
        </div>
    </div>

</x-layout>
