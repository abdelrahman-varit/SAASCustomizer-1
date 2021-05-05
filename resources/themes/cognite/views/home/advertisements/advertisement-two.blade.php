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

        <div class="main-container-wrapper">
            <div class="container-fluid advertisement-two-container">
                <div class="row">
                    @if ( isset($advertisementTwo[0]))
                        <a class="col-lg-9 col-md-12 no-padding">
                            <img src="{{ asset('/storage/' . $advertisementTwo[0]) }}" style="flex: 1;" />
                        </a>
                    @endif
                    
                    @if ( isset($advertisementTwo[1]))
                        <a class="col-lg-3 col-md-12 pr0">
                            <img src="{{ asset('/storage/' . $advertisementTwo[1]) }}" style="flex: 1;" />
                        </a>
                    @endif
                </div>
            </div>
        </div>
    @endif
@endif

@if (! $isRendered)

    <div class="main-container-wrapper">
        <div class="container-fluid advertisement-two-container">
            <div class="row">
                <a class="col-6 col-md-12 no-padding">
                    <img src="{{ asset('/themes/velocity/assets/images/toster.png') }}" style="flex: 1;" />
                </a>

                <a class="col-6 col-md-12 pr0">
                    <img src="{{ asset('/themes/velocity/assets/images/trimmer.png') }}" style="flex: 1;" />
                </a>
            </div>
        </div>
    </div>
@endif



@push('css')
    <style type="text/css">
        .advertisement-two-container{
            overflow: hidden;
        }
    </style>
@endpush