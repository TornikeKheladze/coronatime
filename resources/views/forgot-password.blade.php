<x-layout>
    <div class="w-screen flex flex-col items-center">
        <div class="lg:w-screen h-screen flex flex-col items-center w-80">
            <header class="mt-10 mb-36 self-start lg:self-center sm:ml-5">
                <img class="" src="{{ asset('images/logo.png') }}" />
            </header>

            <h1 class="font-black text-2xl mb-14">{{ __('sing-up.reset_pas') }}</h1>

            <form method="POST" action="{{ route('password.email', ['lang' => app()->getLocale()]) }}"
                class="flex flex-col lg:h-min  lg:justify-start justify-between h-screen gap-14 mb-10">
                @csrf
                <x-input type="email" name="email" label="{{ __('sing-up.email') }}"
                    placeholder="{{ __('sing-up.enter_email') }}" />
                <x-button text="{{ __('sing-up.reset_pas') }}" />
            </form>
        </div>
    </div>
</x-layout>
