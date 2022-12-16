@php
    $sortCountry = 'asc';
    if (request('by') == 'asc') {
        $sortCountry = 'desc';
    }
    $sortConfirmed = 'asc';
    if (request('by') == 'asc') {
        $sortConfirmed = 'desc';
    }
    $sortRecovered = 'asc';
    if (request('by') == 'asc') {
        $sortRecovered = 'desc';
    }
    $sortDeaths = 'asc';
    if (request('by') == 'asc') {
        $sortDeaths = 'desc';
    }
@endphp

<div class="bg-neutral-100 flex items-center lg:h-14 lg:pl-10 lg:w-full w-96 sticky top-0">
    <div class="lg:w-64 w-1/4 flex items-center gap-2 text-sm font-semibold">
        <a
            href="{{ request()->fullUrlWithQuery(['sort' => 'country', 'by' => $sortCountry]) }}">{{ __('landing.location') }}</a>
        <x-sort-icons sortKey='country' />
    </div>
    <div class="lg:w-64 w-1/4 flex items-center gap-2 text-sm font-semibold">
        <a
            href="{{ request()->fullUrlWithQuery(['sort' => 'confirmed', 'by' => $sortConfirmed]) }}">{{ __('landing.newcases') }}</a>
        <x-sort-icons sortKey='confirmed' />
    </div>
    <div class="lg:w-64 w-1/4 flex items-center gap-2 text-sm font-semibold">
        <a
            href="{{ request()->fullUrlWithQuery(['sort' => 'recovered', 'by' => $sortRecovered]) }}">{{ __('landing.recovered') }}</a>
        <x-sort-icons sortKey='recovered' />
    </div>
    <div class="lg:w-64 w-1/4 flex items-center gap-2 text-sm font-semibold">
        <a
            href="{{ request()->fullUrlWithQuery(['sort' => 'deaths', 'by' => $sortDeaths]) }}">{{ __('landing.death') }}</a>
        <x-sort-icons sortKey='deaths' />
    </div>
</div>
