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
                <div class="col-3">
                @if ( isset($advertisementFour[0]))
                    <a @if (isset($one)) href="{{ $one }}" @endif >
                        <img class="col-12" src="{{ asset('/storage/' . $advertisementFour[0]) }}" />
                    </a>

                @else
                    <a @if (isset($one)) href="{{ $one }}" @endif >
                        <img class="col-12" src="{{ asset('/themes/velocity/assets/images/banner/advertise-1-1.png') }}" />
                    </a>

                @endif
                </div>

                <div class="col-3">
                    @if ( isset($advertisementFour[1]))
                        <a @if (isset($two)) href="{{ $two }}" @endif>
                            <img class="col-12 offers-ct-top" src="{{ asset('/storage/' . $advertisementFour[1]) }}" />
                        </a>
                    @else
                        <a @if (isset($one)) href="{{ $one }}" @endif >
                        <img class="col-12" src="{{ asset('/themes/velocity/assets/images/banner/advertise-1-2.png') }}" />
                        </a>

                    @endif
                </div>

                <div class="col-3">

                    @if ( isset($advertisementFour[2]))
                        <a @if (isset($three)) href="{{ $three }}" @endif >
                            <img class="col-12 offers-ct-bottom" src="{{ asset('/storage/' . $advertisementFour[2]) }}" />
                        </a>
                    @else
                        <a @if (isset($one)) href="{{ $one }}" @endif >
                        <img class="col-12" src="{{ asset('/themes/velocity/assets/images/banner/advertise-1-3.png') }}" />
                        </a>

                    @endif
                </div>

               
            </div>
        </div>
    @endif
@endif

@if (! $isRendered)
    <div class="main-container-wrapper advertisement-four-container" style="display: flex;">
        <div class="row">
            <div class="col-3">
                <a @if (isset($one)) href="{{ $one }}" @endif style="flex: 1;">
                <img class="col-12" src="{{ asset('/themes/velocity/assets/images/banner/advertise-1-1.png') }}" />
                </a>
            </div>
            <div class="col-3">
                <a @if (isset($two)) href="{{ $two }}" @endif >
                <img class="col-12" src="{{ asset('/themes/velocity/assets/images/banner/advertise-1-2.png') }}" />
                </a>
            </div>

            <div class="col-3" >
                <a @if (isset($three)) href="{{ $three }}" @endif >
                <img class="col-12" src="{{ asset('/themes/velocity/assets/images/banner/advertise-1-3.png') }}" />
                </a>
            </div>
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