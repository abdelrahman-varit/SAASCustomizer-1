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

        <!-- Advertisement Start -->
         <div class="container advertisement">
            <div class="row gy-4 gy-md-0">
                <div class="col-md-6">
                    <a href="{{ isset($one) ? $one : 'javascript:void(0)' }}">
                        @if ( isset($advertisementThree[0]))
                            <img src="{{ asset('/storage/' . $advertisementThree[0]) }}" alt="offer-banner-1">
                        @else
                            <img src="{{ asset('/themes/beshop/img/demo/offer-banner-1.jpg') }}" alt="offer-banner-1">
                        @endif
                    </a>
                </div>
                <div class="col-md-6 advertisement-row-2">
                    <div class="row row-cols-1 gy-4">
                        <div class="col">
                            <a href="{{ isset($two) ? $two : 'javascript:void(0)' }}">
                                @if ( isset($advertisementThree[1]))
                                    <img src="{{ asset('/storage/' . $advertisementThree[1]) }}" alt="offer-banner-1">
                                @else
                                    <img src="{{ asset('/themes/beshop/img/demo/50_off.jpg') }}" alt="50_off.jpg">
                                @endif
                            </a>
                        </div>
                        <div class="col">
                            <a href="{{ isset($three) ? $three : 'javascript:void(0)' }}">
                                @if ( isset($advertisementThree[2]))
                                    <img src="{{ asset('/storage/' . $advertisementThree[2]) }}" alt="offer-banner-1">
                                @else
                                    <img src="{{ asset('/themes/beshop/img/demo/just-for.jpg') }}" alt="offer-banner-1">
                                @endif
                            </a>
                        </div>
                    </div>
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
            <div class="col-md-6">
                <a href="{{ isset($one) ? $one : 'javascript:void(0)' }}"><img src="{{ asset('/themes/beshop/img/demo/offer-women-1.jpg') }}" alt="offer-women-1"></a>
            </div>
            <div class="col-md-6 advertisement-row-2">
                <div class="row row-cols-1 gy-4">
                    <div class="col">
                        <a href="{{ isset($two) ? $two : 'javascript:void(0)' }}"><img src="{{ asset('/themes/beshop/img/demo/50_off.jpg') }}" alt="50_off"></a>
                    </div>
                    <div class="col">
                        <a href="{{ isset($three) ? $three : 'javascript:void(0)' }}"><img src="{{ asset('/themes/beshop/img/demo/just-for.jpg') }}" alt="just-for"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Advertisement End -->
@endif
