<div class="flex flex-col gap-1">
    <img
        src="{{ request('sort') == $sortKey && request('by') == 'asc' ? asset('images/up-black.png') : asset('images/up.png') }}" />
    <img
        src="{{ request('sort') == $sortKey && request('by') == 'desc' ? asset('images/down-black.png') : asset('images/down.png') }}" />
</div>
