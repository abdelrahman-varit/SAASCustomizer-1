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
        <div class="main-container-wrapper">
            <div class="advertisement-three-container">
                <div class="row">
                    <div class="col-4">
                        @if ( isset($advertisementThree[0]))
                            <a @if (isset($one)) href="{{ $one }}" @endif >
                                <img src="{{ asset('/storage/' . $advertisementThree[0]) }}" class="full-width" />
                            </a>
                        @endif
                    </div>

                    <div class="col-4">
                        @if ( isset($advertisementThree[1]))
                            <a @if (isset($two)) href="{{ $two }}" @endif >
                                <img src="{{ asset('/storage/' . $advertisementThree[1]) }}" class="col-12 pr0" />
                            </a>
                        @endif
                    </div>
                    <div class="col-4">
                        @if ( isset($advertisementThree[2]))
                            <a @if (isset($three)) href="{{ $three }}" @endif >
                                <img src="{{ asset('/storage/' . $advertisementThree[2]) }}" class="col-12 pr0 last-4" />
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endif
@endif

@if (! $isRendered)
    <div class="main-container-wrapper">
        <div class="advertisement-three-container">
            <div class="row">
                <div class="col-4">
                    <a @if (isset($one)) href="{{ $one }}" @endif >
                        <img src="{{ asset('/themes/velocity/assets/images/headphones.png') }}" class="full-width" />
                    </a>
                </div>

                <div class="col-4">
                    <a @if (isset($two)) href="{{ $two }}" @endif >
                        <img src="{{ asset('/themes/velocity/assets/images/watch.png') }}" class="col-12 pr0" />
                    </a>
                </div>
                <div class="col-4">
                    <a @if (isset($three)) href="{{ $three }}" @endif >
                        <img src="{{ asset('/themes/velocity/assets/images/kids-2.png') }}" class="col-12 pr0 last-4" />
                    </a>
                </div>
            </div>
        </div>
    </div>
@endif




@push('css')
    <style type="text/css">
        .advertisement-three-container{
            overflow: hidden;
        }
    </style>
@endpush