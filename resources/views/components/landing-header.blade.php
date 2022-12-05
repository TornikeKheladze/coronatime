<header class="flex justify-between mt-5">
    @php
        $name = url()->current();
        $lang = app()->getLocale();
        $geo = Str::replace($lang, 'ka', $name);
        $eng = Str::replace($lang, 'en', $name);
    @endphp

    <img class="lg:ml-28 ml-4" src="{{ asset('images/logo.png') }}" />
    <div class="flex items-center gap-4 lg:mr-28 mr-7">
        <div x-data="{ show: false }" @click.away="show=false">
            <div @click=" show = !show">
                <button>{{ app()->getLocale() == 'en' ? 'English' : 'Georgian' }}</button>
            </div>
            <div x-show="show" class="py-2 absolute mt-2 rounded-xl z-50">
                <a href="{{ app()->getLocale() == 'en' ? $geo : $eng }}">
                    {{ app()->getLocale() == 'ka' ? 'English' : 'Georgian' }}
                </a>
            </div>
        </div>

        <h1 class="lg:block hidden font-bold">{{ auth()->user()->name }}</h1>
        <form method='POST' action='{{ route('logout', ['lang' => app()->getLocale()]) }}'>
            @csrf
            <button type='submit'>{{ __('landing.logout') }}</button>
        </form>

    </div>
</header>
