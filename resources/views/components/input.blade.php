
<div class="w-full">

    <label for="{{$name}}" class="text-black text-sm lg:text-base font-bold mb-2">
        {{ $label }}
    </label>
    <input class="border border-gr rounded-lg p-6 w-full h-14 focus:border-blue-600" placeholder="{{$placeholder}}" type={{$type}} name="{{$name}}" id="{{$name}}"
        value="{{ old($name) }}" required />
    @error($name)
        <p class="text-red-500 text-xs mt-1">
            {{ $message }}
        </p>
    @enderror
</div>
