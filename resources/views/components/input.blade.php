<div class="w-full relative">

    <label for="{{ $name }}" class="text-black text-sm lg:text-base font-bold mb-2">
        {{ $label }}
    </label>
    <input class="border border-gr rounded-lg p-6 w-full h-14 focus:border-blue-600" placeholder="{{ $placeholder }}"
        type={{ $type }} name="{{ $name }}" id="{{ $name }}" value="{{ old($name) }}"
        required />
    @error($name)
        <p class="text-red-500 text-xs mt-1">
            {{ $message }}
        </p>
    @enderror
    <img src="{{ asset('images/checked-input.png') }}" id="{{$name . 'checked'}}" class="absolute right-5 top-11 hidden" />
</div>
