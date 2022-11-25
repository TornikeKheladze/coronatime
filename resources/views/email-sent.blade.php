<x-layout>
    <div class="flex flex-col items-center mt-10">
        <div class="h-screen lg:w-96 flex flex-col items-center">
            <img class="self-start lg:self-center pl-5" src="{{ asset('images/logo.png') }}" />
            <div class="h-5/6 flex flex-col justify-center items-center">
                <img class="w-14" src="{{ asset('images/checked.png') }}" />
                <p class="text-lg text-center">{{ __('sing-up.confirmation') }}</p>
            </div>
        </div>
    </div>
</x-layout>
