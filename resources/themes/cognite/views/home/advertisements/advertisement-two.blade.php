@php
    $isRendered = false;
    $advertisementTwo = null;
@endphp

@if ($velocityMetaData && $velocityMetaData->advertisement)
    @php
        $advertisement = json_decode($velocityMetaData->advertisement, true);
        
        if (isset($advertisement[2]) && is_array($advertisement[2])) {
            $advertisementTwo = array_values(array_filter($advertisement[2]));
        }
    @endphp

    @if ($advertisementTwo)
        @php
            $isRendered = true;
        @endphp

        <div class="main-container-wrapper advertisement-four-container" style="display: flex;">
            <div class="row">
                <div class="col-4">
                @if ( isset($advertisementTwo[0]))
                    <a @if (isset($one)) href="{{ $one }}" @endif >
                        <img class="col-12" src="{{ asset('/storage/' . $advertisementTwo[0]) }}" />
                    </a>
                @endif
                </div>

                <div class="col-4">
                    @if ( isset($advertisementTwo[1]))
                        <a @if (isset($two)) href="{{ $two }}" @endif>
                            <img class="col-12 offers-ct-top" src="{{ asset('/storage/' . $advertisementTwo[1]) }}" />
                        </a>
                    @endif
                </div>

                <div class="col-4">

                    @if ( isset($advertisementTwo[2]))
                        <a @if (isset($three)) href="{{ $three }}" @endif >
                            <img class="col-12 offers-ct-bottom" src="{{ asset('/storage/' . $advertisementTwo[2]) }}" />
                        </a>
                    @endif
                </div>
            </div>
        </div>
    @endif
@endif

@if (! $isRendered)
    <div class="main-container-wrapper advertisement-three-container" style="display: flex;">
        <div class="row">
            <div class="col-4">
                <a @if (isset($one)) href="{{ $one }}" @endif style="flex: 1;">
                    <img class="col-12" src="{{ asset('/themes/velocity/assets/images/big-sale-banner.png') }}" />
                </a>
            </div>
            <div class="col-4">
                <a @if (isset($two)) href="{{ $two }}" @endif >
                    <img class="col-12 offers-ct-top" src="{{ asset('/themes/velocity/assets/images/seasons.png') }}" />
                </a>
            </div>

            <div class="col-4" >
                <a @if (isset($three)) href="{{ $three }}" @endif >
                    <img class="col-12 offers-ct-bottom" src="{{ asset('/themes/velocity/assets/images/deals.png') }}" />
                </a>
            </div>
        </div>
    </div>
@endif



@push('css')
    <style type="text/css">
        .advertisement-three-container img{
            width: 100%;
            height: 250px;
        }
    </style>
@endpush
