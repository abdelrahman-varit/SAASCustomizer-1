@extends('admin::layouts.content')

@section('page_title')
    {{ __('admin::app.settings.channels.title') }}
@stop

@section('content')
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h1>{{ __('admin::app.settings.themes.title') }}</h1>
            </div>

            <div class="page-action">
                <a href="{{ route('admin.channels.create') }}" class="btn btn-lg btn-primary">
                    {{ __('admin::app.settings.themes.add-title') }}
                </a>
            </div>
        </div>

        <div class="page-content">
             
        </div>
    </div>
@stop