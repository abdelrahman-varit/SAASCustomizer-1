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
                <a href="{{ route('admin.channels.create') }}" class="btn btn-lg btn-primary">
                    {{ __('admin::app.settings.themes.add-title') }}
                </a>
            </div>
        </div>

        <div class="page-content">
            <ul class="theme-list">
                <li class="active">
                    <p><strong>Cognite</strong></p>
                    <img src="{{ asset('admin-themes/buynoir-admin/assets/admin/assets/images/themes/cognite.jpg') }}" alt="Cognite">
                    <button type="button" onclick="themeSelection(1)" class="btn btn-primary">Select</button class="btn btn-primary">
                </li>
                <li>
                    <p><strong>Beshop</strong></p>
                    <img src="{{ asset('admin-themes/buynoir-admin/assets/admin/assets/images/themes/beshop.jpg') }}" alt="Beshop">
                    <button type="button" onclick="themeSelection(2)" class="btn btn-primary">Select</button class="btn btn-primary">
                </li>
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