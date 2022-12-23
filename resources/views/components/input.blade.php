<div class="w-full relative">

    <label for="{{ $name }}" class="text-black text-sm lg:text-base font-bold mb-2">
        {{ $label }}
    </label>

    <input class="border border-neutral-200 rounded-lg p-6 w-full h-14 focus:outline-none focus:ring-1 focus:border-blue-600 " placeholder="{{ $placeholder }}"
        type={{ $type }} name="{{ $name }}" id="{{ $name }}" value="{{ old($name) }}"
        />
    @error($name)
        <p class="text-red-500 text-xs mt-1 flex items-center gap-2">
            <img src="{{ asset('images/error.png') }}" /><span>{{ $message }}</span>
        </p>
    @enderror
    <img src="{{ asset('images/checked-input.png') }}" id="{{$name . 'checked'}}" class="absolute right-5 top-11 hidden" />
</div>
