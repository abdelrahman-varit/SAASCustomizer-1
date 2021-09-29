@php
    $isRendered = false;
    $advertisementThree = null;
@endphp

@if ($velocityMetaData && $velocityMetaData->advertisement)
    @php
        $advertisement = json_decode($velocityMetaData->advertisement, true);
        
        if (isset($advertisement[3]) && is_array($advertisement[3])) {
            $advertisementThree = array_values(array_filter($advertisement[3]));
        }
    @endphp

    @if ($advertisementThree)
        @php
            $isRendered = true;
        @endphp

        <div class="main-container-wrapper advertisement-three-container">
            <div class="col-4">
                @if ( isset($advertisementThree[0]))
                    <a @if (isset($one)) href="{{ $one }}" @endif >
                        <img class="col-12" src="{{ asset('/storage/' . $advertisementThree[0]) }}" />
                    </a>
                @else
                    <a @if (isset($one)) href="{{ $one }}" @endif >
                        <img class="col-12" src="{{ asset('/themes/myshop/assets/images/banner/advertise-2-1.jpg') }}" />
                    </a>
                @endif
            </div>

            <div class="col-4">
                @if ( isset($advertisementThree[1]))
                    <a @if (isset($two)) href="{{ $two }}" @endif>
                        <img class="col-12 offers-ct-top" src="{{ asset('/storage/' . $advertisementThree[1]) }}" />
                    </a>
                @else
                    <a @if (isset($one)) href="{{ $one }}" @endif >
                        <img class="col-12" src="{{ asset('/themes/myshop/assets/images/banner/advertise-2-2.jpg') }}" />
                    </a>

                @endif
            </div>

            <div class="col-4">

                @if ( isset($advertisementThree[2]))
                    <a @if (isset($three)) href="{{ $three }}" @endif >
                        <img class="col-12 offers-ct-bottom" src="{{ asset('/storage/' . $advertisementThree[2]) }}" />
                    </a>
                @else
                    <a @if (isset($one)) href="{{ $one }}" @endif >
                        <img class="col-12" src="{{ asset('/themes/myshop/assets/images/banner/advertise-2-3.jpg') }}" />
                    </a>

                @endif
            </div>
        </div>
    @endif
@endif

@if (! $isRendered)
    <div class="main-container-wrapper advertisement-three-container">
        <div class="col-4">
            <a @if (isset($one)) href="{{ $one }}" @endif style="flex: 1;">
            <img class="col-12" src="{{ asset('/themes/myshop/assets/images/banner/advertise-2-1.jpg') }}" />
            </a>
        </div>
        <div class="col-4">
            <a @if (isset($two)) href="{{ $two }}" @endif >
            <img class="col-12" src="{{ asset('/themes/myshop/assets/images/banner/advertise-2-2.jpg') }}" />
            </a>
        </div>

        <div class="col-4" >
            <a @if (isset($three)) href="{{ $three }}" @endif >
            <img class="col-12" src="{{ asset('/themes/myshop/assets/images/banner/advertise-2-3.jpg') }}" />
            </a>
        </div>
    </div>
@endif
