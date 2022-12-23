<x-layout>
    <x-landing-header />
    <div class="flex md:ml-28 flex-col md:gap-10 md:mt-10 mt-6 mb-6 ml-4 gap-6 md:mb-10">
        <h1 class="text-2xl font-extrabold">{{ __('landing.worldwide-stat') }}</h1>
        <div class="flex md:gap-16 gap-6">
            <a class="font-bold border-b-2 pb-4 border-black">{{ __('landing.worldwide') }}</a>
            <a href="{{ route('bycountry', ['lang' => app()->getLocale()]) }}">{{ __('landing.by-country') }}</a>
        </div>
    </div>
    <div
        class="md:flex md:gap-6 md:pl-28 md:pr-28 md:justify-between grid gap-y-6 grid-cols-2 md:w-full justify-items-center m-auto w-96 grid-rows-2">
        <div
            class="md:w-96 md:h-64 w-343 h-48 col-span-full justify-self-center md:pt-10 md:pb-10 pb-6 pt-6 bg-opacity-10 flex flex-col items-center justify-end rounded-2xl bg-blue-700">
            <x-newcases />
            <h1 class="mt-6">{{ __('landing.newcases') }}</h1>
            <h2 class="text-blue-700 mt-4 text-2xl md:text-4xl font-black">{{ $newcases }}</h2>
        </div>
        <div
            class="md:w-96 md:h-64 w-40 h-48 bg-opacity-10 md:pt-10 md:pb-10 pb-6 pt-6 flex flex-col items-center justify-end rounded-2xl bg-green-500">
            <x-recovered />
            <h1 class="lg:mt-6 mt-3 break-all text-center">{{ __('landing.recovered') }}</h1>
            <h2 class="text-green-500 lg:mt-6 mt-3 text-2xl md:text-4xl font-black">{{ $recovered }}</h2>
        </div>
        <div
            class=" md:w-96 md:h-64 w-40 h-48 bg-opacity-10 md:pt-10 md:pb-10 pb-6 pt-6 flex flex-col items-center justify-end rounded-2xl bg-yellow-400">
            <x-death />
            <h1 class="mt-6">{{ __('landing.death') }}</h1>
            <h2 class="text-yellow-400 mt-4 text-2xl md:text-4xl font-black">{{ $death }}</h2>
        </div>
    </div>

</x-layout>
