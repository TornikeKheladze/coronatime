<x-layout>
    <x-landing-header />
    <div class="flex lg:ml-28 flex-col lg:gap-10 lg:mt-10 mt-6 mb-6 ml-4 gap-6 lg:mb-10">
        <h1 class="text-2xl font-extrabold">{{ __('landing.worldwide-stat') }}</h1>
        <div class="flex lg:gap-16 gap-6">
            <a class="font-bold border-b-2 pb-4 border-black">{{ __('landing.worldwide') }}</a>
            <a href="{{ route('bycountry', ['lang' => app()->getLocale()]) }}">{{ __('landing.by-country') }}</a>
        </div>
    </div>
    <div
        class="lg:flex lg:gap-6 lg:pl-28 lg:pr-28 lg:justify-between grid gap-y-6 grid-cols-2 lg:w-full justify-items-center m-auto w-96 grid-rows-2">
        <div
            class="lg:w-96 lg:h-64 w-343 h-48 col-span-full justify-self-center lg:pt-10 lg:pb-10 pb-6 pt-6 bg-opacity-10 flex flex-col items-center justify-end rounded-2xl bg-blue-700">
            <x-newcases />
            <h1 class="mt-6">{{ __('landing.newcases') }}</h1>
            <h2 class="text-blue-700 mt-4 text-2xl lg:text-4xl font-black">{{ $newcases }}</h2>
        </div>
        <div
            class="lg:w-96 lg:h-64 w-40 h-48 bg-opacity-10 lg:pt-10 lg:pb-10 pb-6 pt-6 flex flex-col items-center justify-end rounded-2xl bg-green-500">
            <x-recovered />
            <h1 class="mt-6">{{ __('landing.recovered') }}</h1>
            <h2 class="text-green-500 mt-6 text-2xl lg:text-4xl font-black">{{ $recovered }}</h2>
        </div>
        <div
            class=" lg:w-96 lg:h-64 w-40 h-48 bg-opacity-10 lg:pt-10 lg:pb-10 pb-6 pt-6 flex flex-col items-center justify-end rounded-2xl bg-yellow-400">
            <x-death />
            <h1 class="mt-6">{{ __('landing.death') }}</h1>
            <h2 class="text-yellow-400 mt-4 text-2xl lg:text-4xl font-black">{{ $death }}</h2>
        </div>
    </div>

</x-layout>
