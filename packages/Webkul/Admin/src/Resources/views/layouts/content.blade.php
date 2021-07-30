@extends('admin::layouts.master')

@section('content-wrapper')
@parent
    <div class="inner-section">
    
        @include ('admin::layouts.nav-aside')

        <div class="content-wrapper">

            @include ('admin::layouts.tabs')

            @yield('content')

        </div>
        
    </div>
@stop