@php
    $isRendered = false;
    $advertisementOne = null;
@endphp

@if ($velocityMetaData && $velocityMetaData->advertisement)
    @php
        $advertisement = json_decode($velocityMetaData->advertisement, true);
        if (isset($advertisement[1])) {
            $advertisementOne = $advertisement[1];
        }
    @endphp

    @if ($advertisementOne)
        @php
            $isRendered = true;
        @endphp

        <!-- Advertisement Start -->
        <div class="container advertisement">
            <div class="row gy-4 gy-md-0">
                <div class="col-md-12">
                    <a href="{{ isset($one) ? $one : 'javascript:void(0)' }}">
                        @if ( isset($advertisementOne[0]))
                            <img src="{{ asset('/storage/' . $advertisementOne['image_1']) }}" alt="offer-banner-1">
                        @else
                            <img src="{{ asset('/themes/beshop/img/demo/offer-banner-1.jpg') }}" alt="offer-banner-1">
                        @endif
                    </a>
                </div>
            </div>
        </div>
        <!-- Advertisement End -->
    @endif
@endif

@if (! $isRendered)
    <!-- Advertisement Start -->
    <div class="container advertisement">
        <div class="row gy-4 gy-md-0">
            <div class="col-md-12">
                <a href="{{ isset($one) ? $one : 'javascript:void(0)' }}">
                    <img src="{{ asset('/themes/beshop/img/demo/offer-banner-1.jpg') }}" alt="offer-banner-1">
                </a>
            </div>
        </div>
    </div>
    <!-- Advertisement End -->
@endif