<div class="software-description">
    <div class="border-bottom">
        <a
            :class="`left`"
            href="{{ route('shop.home.index') }}">

            @if ($logo = core()->getCurrentChannel()->logo_url)
                <img class="logo" src="{{ $logo }}" />
            @else
                <img class="logo" src="{{ asset('themes/toni-braxton/assets/images/logo-white.svg') }}" />
            @endif
        </a>
    </div>

    @if ($velocityMetaData)
        {!! $velocityMetaData->footer_left_content !!}
    @else
        {!! __('velocity::app.admin.meta-data.footer-left-raw-content') !!}
    @endif
</div>