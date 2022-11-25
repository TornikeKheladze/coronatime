<x-layout>
    <div class="w-screen flex flex-col items-center">
        <div class="lg:w-screen h-screen flex flex-col items-center w-80">
            <header class="mt-10  mb-16 self-start lg:self-center sm:ml-5">
                <img class="" src="{{ asset('images/logo.png') }}" />
            </header>

            <h1 class="font-black text-2xl mb-14">{{ __('sing-up.reset_pas') }}</h1>

            <form class="flex flex-col lg:h-min  lg:justify-start h-screen gap-7 mb-10">
                <x-input type="password" name="password" label="{{ __('sing-up.new_pas') }}"
                    placeholder="{{ __('sing-up.enter_new') }}" />
                <x-input type="password" name="password_confirm" label="{{ __('sing-up.repeat_password') }}"
                    placeholder="{{ __('sing-up.repeat_password') }}" />
                <div class="flex items-end basis-full">
                    <x-button text="{{ __('sing-up.reset_pas') }}" />
                </div>
            </form>
        </div>
    </div>
</x-layout>
