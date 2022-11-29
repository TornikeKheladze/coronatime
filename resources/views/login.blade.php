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
            <form method="POST" action="{{route('login')}}" class="flex flex-col gap-6">
                @csrf
                <x-input type="text" name="name_mail" label="{{ __('log-in.username') }}"
                    placeholder="{{ __('log-in.uniq_emil') }}" />
                <x-input type="password" name="password" label="{{ __('log-in.password') }}"
                    placeholder="{{ __('log-in.fill_password') }}" />

                <div class="flex justify-between">
                    <a class="text-blue-800 text-sm font-semibold">{{ __('log-in.forgot') }}</a>
                </div>


                <x-button text="{{ __('log-in.login') }}" />
            </form>
            <p class="text-center">
                <span class="text-zinc-500">{{ __('log-in.dont_have_account') }}</span>
                <a href="{{route('register.show')}}" class="font-bold">{{ __('log-in.sing_free') }}</a>
            </p>
        </div>
        <div class="hidden lg:block h-screen">
            <img src="{{ asset('images/corona.png') }}" />
        </div>
    </div>

</x-layout>
