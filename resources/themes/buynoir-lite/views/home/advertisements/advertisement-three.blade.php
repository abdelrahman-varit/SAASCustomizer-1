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

        <div class="container advertisement-three-container">
            <div class="row">
                @if ( isset($advertisementThree[0]))
                    <div class="col-lg-4 col-md-4 no-padding">
                        <a @if (isset($one)) href="{{ $one }}" @endif class="row top-container">
                            <img src="{{ asset('/storage/' . $advertisementThree[0]) }}" class="full-width" />
                        </a>
                    </div>
                @else
                    <div class="col-lg-4 col-md-4 second-panel">
                        <a @if (isset($one)) href="{{ $one }}" @endif class="row top-container">
                            <img src="{{ asset('/themes/velocity/assets/images/headphones.png') }}" class="full-width" />
                        </a>
                    </div>
                @endif

                @if ( isset($advertisementThree[1]))
                    <div class="col-lg-4 col-md-4 second-panel">
                        <a @if (isset($two)) href="{{ $two }}" @endif class="row top-container">
                            <img src="{{ asset('/storage/' . $advertisementThree[1]) }}" class="full-width" />
                        </a>
                    </div>
                @else
                    <div class="col-lg-4 col-md-4 second-panel">
                        <a @if (isset($two)) href="{{ $two }}" @endif class="row top-container">
                            <img src="{{ asset('/themes/velocity/assets/images/watch.png') }}" class="col-12 pr0" />
                        </a>
                    </div>
                @endif

                @if ( isset($advertisementThree[2]))
                    <div class="col-lg-4 col-md-4 second-panel">
                        <a @if (isset($three)) href="{{ $three }}" @endif class="row bottom-container">
                            <img src="{{ asset('/storage/' . $advertisementThree[2]) }}" class="full-width" />
                        </a>
                    </div>
                @else
                    <div class="col-lg-4 col-md-4 second-panel">
                        <a @if (isset($three)) href="{{ $three }}" @endif class="row top-container">
                            <img src="{{ asset('/themes/velocity/assets/images/kids-2.png') }}" class="col-12 pr0" />
                        </a>
                    </div>
                @endif

            </div>
        </div>
    @endif
@endif

@if (! $isRendered)
    <div class="container-fluid advertisement-three-container">
        <div class="row">

            <div class="col-lg-4 col-md-4 second-panel">
                <a @if (isset($one)) href="{{ $one }}" @endif class="row top-container">
                    <img src="{{ asset('/themes/velocity/assets/images/headphones.png') }}" class="full-width" />
                </a>
            </div>

            <div class="col-lg-4 col-md-4 second-panel">
                <a @if (isset($two)) href="{{ $two }}" @endif class="row top-container">
                    <img src="{{ asset('/themes/velocity/assets/images/watch.png') }}" class="col-12 pr0" />
                </a>
            </div>
            <div class="col-lg-4 col-md-4 second-panel">
                <a @if (isset($three)) href="{{ $three }}" @endif class="row top-container">
                    <img src="{{ asset('/themes/velocity/assets/images/kids-2.png') }}" class="col-12 pr0" />
                </a>
            </div>
        </div>
    </div>
@endif