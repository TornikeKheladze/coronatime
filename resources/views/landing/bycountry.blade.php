<x-layout>
    <x-landing-header />
    <div class="flex lg:ml-28 flex-col lg:gap-10 lg:mt-10 mt-6 mb-6 ml-4 gap-6 lg:mb-10">
        <h1 class="text-2xl font-extrabold">{{ __('landing.worldwide-stat') }}</h1>
        <div class="flex lg:gap-16 gap-6">
            <a href="{{ route('worldwide', ['lang' => app()->getLocale()]) }}">{{ __('landing.worldwide') }}</a>
            <a class="font-bold border-b-2 pb-4 border-black">{{ __('landing.by-country') }}</a>
        </div>
    </div>
    <form method="GET" action="" class="lg:ml-28 ml-4 lg:mb-10 mb-2">
        <div class="w-72 flex justify-center items-center border h-12 border-neutral-200 rounded-lg">
            <label for="search">
                <img class="" src="{{ asset('images/search.png') }}" />
            </label>
            <input type="text" name="search" id="search" placeholder="{{ __('landing.search-by-country') }}"
                class="w-10/12 h-full pl-4 focus:border-none" value="{{ request('search') }}" />
        </div>
    </form>
    <div id="scrollbar" class="lg:ml-28 lg:mr-28 ml-4 mr-4 lg:h-600 relative overflow-scroll lg:border border-neutral-100 rounded-lg">
        <x-table-header />
        <div class="flex lg:pl-10 lg:w-full w-96 pb-4 pt-4 border-b border-neutral-100">
            <p class="lg:w-64 w-1/4">{{ __('landing.worldwide') }}</p>
            <p class="lg:w-64 w-1/4">{{ $newcases }}</p>
            <p class="lg:w-64 w-1/4">{{ $recovered }}</p>
            <p class="lg:w-64 w-1/4">{{ $death }}</p>
        </div>

        @foreach ($countries as $country)
            <div class="flex lg:pl-10 lg:w-full w-96 pb-4 pt-4 border-b border-neutral-100">
                <p class="lg:w-64 w-1/4">{{ $country->country }}</p>
                <p class="lg:w-64 w-1/4">{{ $country->confirmed }}</p>
                <p class="lg:w-64 w-1/4">{{ $country->recovered }}</p>
                <p class="lg:w-64 w-1/4">{{ $country->deaths }}</p>
            </div>
        @endforeach
    </div>
</x-layout>
