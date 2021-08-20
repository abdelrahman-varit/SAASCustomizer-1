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

        <!-- Advertisement Start -->
        <div class="container advertisement">
            <div class="row gy-4 gy-md-0">
                <div class="col-md-4">
                    <a href="{{ isset($one) ? $one : 'javascript:void(0)' }}">
                        @if ( isset($advertisementFour[0]))
                            <img src="{{ asset('/storage/' . $advertisementFour[0]) }}" alt="offer-banner-1">
                        @else
                            <img src="{{ asset('/themes/beshop/img/demo/offer-banner-1.jpg') }}" alt="offer-banner-1">
                        @endif
                    </a>
                </div>
                <div class="col-md-4 advertisement-row-2">
                    <div class="row row-cols-1 gy-4">
                        <div class="col">
                            <a href="{{ isset($two) ? $two : 'javascript:void(0)' }}">
                                @if ( isset($advertisementFour[1]))
                                    <img src="{{ asset('/storage/' . $advertisementFour[1]) }}" alt="offer-banner-1">
                                @else
                                    <img src="{{ asset('/themes/beshop/img/demo/offer-banner-1.jpg') }}" alt="offer-banner-1">
                                @endif
                            </a>
                        </div>
                        <div class="col">
                            <a href="{{ isset($three) ? $three : 'javascript:void(0)' }}">
                                @if ( isset($advertisementFour[2]))
                                    <img src="{{ asset('/storage/' . $advertisementFour[2]) }}" alt="offer-banner-1">
                                @else
                                    <img src="{{ asset('/themes/beshop/img/demo/offer-banner-1.jpg') }}" alt="offer-banner-1">
                                @endif
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <a href="{{ isset($four) ? $four : 'javascript:void(0)' }}">
                        @if ( isset($advertisementFour[3]))
                            <img src="{{ asset('/storage/' . $advertisementFour[3]) }}" alt="offer-banner-1">
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
            <div class="col-md-4">
                <a href="{{ isset($one) ? $one : 'javascript:void(0)' }}"><img src="{{ asset('/themes/beshop/img/demo/offer-banner-1.jpg') }}" alt="offer-banner-1"></a>
            </div>
            <div class="col-md-4 advertisement-row-2">
                <div class="row row-cols-1 gy-4">
                    <div class="col">
                        <a href="{{ isset($two) ? $two : 'javascript:void(0)' }}"><img src="{{ asset('/themes/beshop/img/demo/offer-banner-2.jpg') }}" alt="offer-banner-2"></a>
                    </div>
                    <div class="col">
                        <a href="{{ isset($three) ? $three : 'javascript:void(0)' }}"><img src="{{ asset('/themes/beshop/img/demo/offer-banner-3.jpg') }}" alt="offer-banner-3"></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <a href="{{ isset($four) ? $four : 'javascript:void(0)' }}"><img src="{{ asset('/themes/beshop/img/demo/offer-banner-4.jpg') }}" alt="offer-banner-4"></a>
            </div>
        </div>
    </div>
    <!-- Advertisement End -->
@endif