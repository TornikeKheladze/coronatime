<x-layout>

    <div class="flex justify-center lg:justify-between lg:items-start">
        <div class="w-80 lg:w-96 lg:ml-28 flex flex-col gap-6 mt-10">
            <header class="lg:self-start">
                <img src="{{ asset('images/logo.png') }}" />
            </header>
            <h1 class="font-black text-2xl">{{ __('sing-up.welcome') }}</h1>
            <h3 class="text-gray-400">
                {{ __('sing-up.enter_info') }}
            </h3>
            <form method="POST" action="/register" class="flex flex-col gap-6" enctype="multipart/form-data">
                @csrf

                <x-input type="text" name="name" label="{{ __('sing-up.username') }}"
                    placeholder="{{ __('sing-up.uniq_username') }}" />

                <x-input type="email" name="email" label="{{ __('sing-up.email') }}"
                    placeholder="{{ __('sing-up.enter_email') }}" />

                <x-input type="password" name="password" label="{{ __('sing-up.password') }}"
                    placeholder="{{ __('sing-up.fill_password') }}" />

                <x-input type="password" name="password_confirmation" label="{{ __('sing-up.repeat_password') }}"
                    placeholder="{{ __('sing-up.repeat_password') }}" />

                <div class="flex justify-between">
                    <div class="text-sm font-semibold flex gap-2">
                        <input id="default-checkbox" type="checkbox" value=""
                            class="w-4 h-4 accent-green-600 text-green-600 bg-gray-100 rounded border-gray-300 focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" />
                        <label for="default-checkbox" class="flex items-center mb-4">
                            {{ __('log-in.remember') }}
                        </label>
                    </div>


                </div class="flex justify-between">
                <x-button text="{{ __('sing-up.sing_up') }}" />
            </form>
            <p class="text-center"><span class="text-zinc-500">{{ __('sing-up.have_account?') }}</span>
                <a href="{{route('login.show')}}" class="font-bold">{{ __('sing-up.login') }}</a>
            </p>
        </div>
        <div class="hidden lg:block h-screen">
            <img src="{{ asset('images/corona.png') }}" />
        </div>
    </div>

</x-layout>
