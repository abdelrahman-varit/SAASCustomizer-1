@php
    $isRendered = false;
    $advertisementFour = null;
@endphp

@if ($velocityMetaData && $velocityMetaData->advertisement)
    @php
        $advertisement = json_decode($velocityMetaData->advertisement, true);
        
        if (isset($advertisement[4]) && is_array($advertisement[4])) {
            $advertisementFour = array_values(array_filter($advertisement[4]));
        }
    @endphp

    @if ($advertisementFour)
        @php
            $isRendered = true;
        @endphp

        <div class="main-container-wrapper advertisement-four-container" style="display: flex;">
            <div class="row">
                @if ( isset($advertisementFour[0]))
                    <a @if (isset($one)) href="{{ $one }}" @endif style="flex: 1">
                        <img class="col-12" src="{{ asset('/storage/' . $advertisementFour[0]) }}" />
                    </a>
                @endif

                <div class="col-lg-4 col-12 offers-ct-panel" style="flex: 1">
                    @if ( isset($advertisementFour[1]))
                        <a @if (isset($two)) href="{{ $two }}" @endif class="row col-12 remove-padding-margin">
                            <img class="col-12 offers-ct-top" src="{{ asset('/storage/' . $advertisementFour[1]) }}" />
                        </a>
                    @endif
                </div>

                <div class="col-lg-4 col-12 offers-ct-panel" style="flex: 1">

                    @if ( isset($advertisementFour[2]))
                        <a @if (isset($three)) href="{{ $three }}" @endif class="row col-12 remove-padding-margin">
                            <img class="col-12 offers-ct-bottom" src="{{ asset('/storage/' . $advertisementFour[2]) }}" />
                        </a>
                    @endif
                </div>

                @if ( isset($advertisementFour[3]))
                    <a @if (isset($four)) href="{{ $four }}" @endif style="flex: 1">
                        <img class="col-12" src="{{ asset('/storage/' . $advertisementFour[3]) }}" />
                    </a>
                @endif
            </div>
        </div>
    @endif
@endif

@if (! $isRendered)
    <div class="main-container-wrapper advertisement-four-container" style="display: flex;">
        <div class="row">
            <a @if (isset($one)) href="{{ $one }}" @endif style="flex: 1;">
                <img class="col-12" src="{{ asset('/themes/velocity/assets/images/big-sale-banner.png') }}" />
            </a>

            <div class="col-lg-4 col-12 offers-ct-panel" style="flex: 1">
                <a @if (isset($two)) href="{{ $two }}" @endif class="row col-12 remove-padding-margin">
                    <img class="col-12 offers-ct-top" src="{{ asset('/themes/velocity/assets/images/seasons.png') }}" />
                </a>
            </div>

            <div class="col-lg-4 col-12 offers-ct-panel" style="flex: 1">
                <a @if (isset($three)) href="{{ $three }}" @endif class="row col-12 remove-padding-margin">
                    <img class="col-12 offers-ct-bottom" src="{{ asset('/themes/velocity/assets/images/deals.png') }}" />
                </a>
            </div>

            <a @if (isset($four)) href="{{ $four }}" @endif style="flex: 1">
                <img class="col-12" src="{{ asset('/themes/velocity/assets/images/kids.png') }}" />
            </a>
        </div>
    </div>
@endif



@push('css')
    <style type="text/css">
        .advertisement-four-container img{
            width: 100%;
            height: 250px;
        }
    </style>
@endpush