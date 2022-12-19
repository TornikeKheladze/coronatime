<header class="flex justify-between">
    @php
        $name = url()->current();
        $lang = app()->getLocale();
        $geo = Str::replace($lang, 'ka', $name);
        $eng = Str::replace($lang, 'en', $name);
    @endphp

    <img class="md:ml-28 ml-4 pt-5" src="{{ asset('images/logo.png') }}" />
    <div class="flex items-center gap-4 md:mr-28 mr-7">
        <div x-data="{ show: false }" @click.away="show=false">
            <div @click=" show = !show">
                <button class="flex items-center gap-2" >{{ app()->getLocale() == 'en' ? 'English' : 'Georgian' }} 
                <img x-show="!show" src={{asset('images/lang-down.png')}} />
                <img x-show="show" src={{asset('images/lang-up.png')}} />
                </button>
            </div>
            <div x-show="show" class="py-2 absolute mt-2 rounded-xl z-50">
                <a href="{{ app()->getLocale() == 'en' ? $geo : $eng }}">
                    {{ app()->getLocale() == 'ka' ? 'English' : 'Georgian' }}
                </a>
            </div>
        </div>

        <h1 class="md:block hidden font-bold">{{ auth()->user()->name }}</h1>
        <form class="hidden md:block" method='POST' action='{{ route('logout', ['lang' => app()->getLocale()]) }}'>
            @csrf
            <button type='submit'>{{ __('landing.logout') }}</button>
        </form>

        <div class="md:hidden" x-data="{ show: false }" @click.away="show=false">
            <div @click=" show = !show">
                <img src={{asset('images/burger.png')}} />
            </div>
            <div x-show="show" class="py-2 absolute rounded-xl z-50 right-4">
                <h1 class="font-bold">{{ auth()->user()->name }}</h1>
                <form method='POST' action='{{ route('logout', ['lang' => app()->getLocale()]) }}'>
                    @csrf
                    <button type='submit'>{{ __('landing.logout') }}</button>
                </form>
            </div>
        </div>

    </div>
</header>
