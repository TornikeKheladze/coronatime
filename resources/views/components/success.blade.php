<x-layout>
    <div class="w-screen h-screen flex flex-col items-center pt-10">
        <div class="lg:w-96 w-80 h-full pb-7 flex flex-col items-center lg:justify-start justify-between gap-24">
            <img class="self-start lg:self-center" src="{{ asset('images/logo.png') }}" />
            <div class="flex flex-col items-center gap-4">
                <img class="w-14" src="{{ asset('images/checked.png') }}" />
                <p class="text-lg text-center">{{ $slot }}</p>
            </div>
            <a href="{{route('login.show',['lang' => app()->getLocale()])}}"
                class="w-full flex justify-center items-center bg-green-500 rounded-lg h-14 font-black text-white text-base">{{ __('log-in.login') }}</a>
        </div>
    </div>
</x-layout>
