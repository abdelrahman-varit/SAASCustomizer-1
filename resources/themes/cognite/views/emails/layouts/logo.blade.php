@if ($logo = core()->getCurrentChannel()->logo_url)
    <img src="{{ $logo }}" alt="{{ config('app.name') }}" style="height: 40px; width: 110px;"/>
@else
<img src="{{ asset('themes/'.core()->getCurrentChannel()->theme.'/assets/images/logo.svg') }}">
@endif 