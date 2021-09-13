<a
    :class="`left ${addClass}`"
    href="{{ route('shop.home.index') }}">

    @if ($logo = core()->getCurrentChannel()->logo_url)
        <img class="logo" src="{{ $logo }}" />
    @else
        <img class="logo" src="{{ asset('themes/buynoir-lite/assets/images/logo-text.png') }}" />
    @endif
</a>