@extends('admin::layouts.content')

@section('page_title')
    {{ __('admin::app.settings.channels.title') }}
@stop

@section('content')
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h1>{{ __('admin::app.settings.themes.title') }}</h1>
                <p><strong>Select your shop theme</strong></p>
            </div>

            <div class="page-action">
                <!-- <a href="{{ route('admin.channels.create') }}" class="btn btn-lg btn-primary">
                    {{ __('admin::app.settings.themes.add-title') }}
                </a> -->
            </div>
        </div>

        <div class="page-content">
            <ul class="theme-list">
                @php
                $channel = core()->getCurrentChannel();
                @endphp
                @foreach (config('themes.themes') as $themeCode => $theme)
                    <li class="{{$themeCode==$channel->theme?'active':''}}">
                        <p><strong>{{$theme['name']}}</strong></p>
                        <img src="{{ $theme['image_path'] }}" alt="{{$theme['name']}}">
                        <!-- <button type="button" onclick="themeSelection(1)" class="btn btn-primary">Select</button class="btn btn-primary"> -->
                        @if($themeCode==$channel->theme)
                            <a type="button" href="{{route('admin.channels.edit',Company::getCurrent()->channel_id)}}" class="btn btn-primary">Customize</a>
                        @else
                            <a type="button" onclick="return confirm('Do you want to change theme')" href="{{route('admin.channels.themes-select')}}?id={{Company::getCurrent()->channel_id}}&theme={{$themeCode}}" class="btn btn-primary">Select</a>
                        @endif
                    </li>
                @endforeach

                
            </ul>
        </div>
    </div>
@stop

@push('scripts')
    <script>
        function themeSelection(id) {
            alert("Theme ID: " + id)
        }
    </script>
@endpush