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

        <!-- Advertisement Start -->
        <div class="container advertisement">
            <div class="row gy-4 gy-md-0">
                <div class="col-md-8">
                    <a href="{{ isset($one) ? $one : 'javascript:void(0)' }}">
                        @if ( isset($advertisementTwo[0]))
                            <img src="{{ asset('/storage/' . $advertisementTwo[0]) }}" alt="Banner">
                        @else
                            <img src="{{ asset('/themes/beshop/assets/img/demo/summer-fashion.jpg') }}" alt="Banner">
                        @endif
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="{{ isset($two) ? $two : 'javascript:void(0)' }}">
                        @if ( isset($advertisementTwo[1]))
                            <img src="{{ asset('/storage/' . $advertisementTwo[1]) }}" alt="Banner">
                        @else
                            <img src="{{ asset('/themes/beshop/assets/img/demo/Big-Promo.jpg') }}" alt="Banner">
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
            <div class="col-md-8">
                <a href="{{ isset($one) ? $one : 'javascript:void(0)' }}"><img src="{{ asset('/themes/beshop/assets/img/demo/summer-fashion.jpg') }}" alt="summer-fashion"></a>
            </div>
            <div class="col-md-4">
                <a href="{{ isset($two) ? $two : 'javascript:void(0)' }}"><img src="{{ asset('/themes/beshop/assets/img/demo/Big-Promo.jpg') }}" alt="Big-Promo"></a>
            </div>
        </div>
    </div>
    <!-- Advertisement End -->

@endif