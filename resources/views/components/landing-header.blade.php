<header class="flex justify-between mt-5">
    @php
        $name = url()->current();
        $lang = app()->getLocale();
        $geo = Str::replace($lang, 'ka', $name);
        $eng = Str::replace($lang, 'en', $name);
    @endphp
    
    <img class="lg:ml-28 ml-4" src="{{ asset('images/logo.png') }}" />
    <div class="flex items-center gap-4 lg:mr-28 mr-7">
        <select class="bg-white" name="language" id="language">
            <option selected value="en"><a href="{{ $eng }}">English</a></option>
            <option value="ka"><a href="{{ $geo }}">Georgian</a></option>
        </select>
        
        <h1 class="lg:block hidden font-bold">{{auth()->user()->name}}</h1>
        <form method='POST' action='{{ route('logout', ['lang' => app()->getLocale()]) }}'>
            @csrf
            <button type='submit'>{{__('landing.logout')}}</button>
        </form>
        
    </div>
</header>
