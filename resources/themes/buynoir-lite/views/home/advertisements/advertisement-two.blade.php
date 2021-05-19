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

        <section class="container-fluid advertisement-two-container">
            <div class="row">
                <div class="container d-flex">
                    @if ( isset($advertisementTwo[0]))
                        
                            <img src="{{ asset('/storage/' . $advertisementTwo[0]) }}" class="col-9" />
                     
                    @endif
                    
                    @if ( isset($advertisementTwo[1]))
                        
                            <img src="{{ asset('/storage/' . $advertisementTwo[1]) }}" class="col-3" />
                    
                    @endif
                </div>
            </div>
        </section>
    @endif
@endif

@if (! $isRendered)
    <section class="container-fluid advertisement-two-container">
        <div class="container">
            <div class="row d-flex">
               
                    <img src="{{ asset('/themes/velocity/assets/images/toster.png') }}" class="col-9" />
              
 
                    <img src="{{ asset('/themes/velocity/assets/images/trimmer.png') }}" class="col-3" />
          
            </div>
        </div>
    </section>
@endif