@extends('admin::layouts.content')

@section('page_title')
    {{ __('admin::app.settings.themes.edit-title') }}
@stop

@section('content')
    <div class="content">

        <form method="POST" action="{{ route('admin.theme.edit-store') }}" @submit.prevent="onSubmit" enctype="multipart/form-data">
            <div class="page-header">
                <div class="page-title">
                    <h1>
                        <i class="icon angle-left-icon back-link" onclick="history.length > 1 ? history.go(-1) : window.location = '{{ route('admin.dashboard.index') }}';"></i>

                        {{ __('admin::app.settings.themes.edit-title') }} 
                    </h1>
                </div>

                <div class="page-action">
                    <button type="submit" class="btn btn-lg btn-primary">
                        {{ __('admin::app.settings.themes.save-btn-title') }}
                    </button>
                </div>
            </div>

            <div class="page-content">
                <div class="form-container">
                    @csrf()
                    <input name="_method" type="hidden" value="PUT">

               
                    <accordian :title="'{{ __('admin::app.settings.channels.design') }}'" :active="true">
                    <div slot="header">{{ __('admin::app.settings.channels.design') }}</div> 
                    <div slot="body">
                            <div class="control-group">
                                <label for="theme">{{ __('admin::app.settings.channels.theme') }}</label>

                                <?php $selectedOption = old('theme') ?: $channel->theme ?>

                                <select class="control" id="theme" name="theme">
                                    @foreach (config('themes.themes') as $themeCode => $theme)
                                        <option value="{{ $themeCode }}" {{ $selectedOption == $themeCode ? 'selected' : '' }}>
                                            {{ $theme['name'] }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
 
                            <div class="control-group">
                                <label>{{ __('Theme Color') }}</label>

                                <select
                                    class="control"
                                    id="theme_color"
                                    name="theme_color"
                                    style="text-transform:capitalize"
                                    >
                                    
                                    <option {{ $metaData->theme_color=='' ? 'selected' : '' }} value="default">Default</option>
                                    <option  {{ $metaData->theme_color=='blue' ? 'selected' : '' }} value="blue">Blue</option>
                                    <option  {{ $metaData->theme_color=='lemon' ? 'selected' : '' }} value="lemon">Lemon</option>
                                    <option  {{ $metaData->theme_color=='sky' ? 'selected' : '' }} value="sky">Sky</option>
                                    <option  {{ $metaData->theme_color=='violet' ? 'selected' : '' }} value="violet">Violet</option>
                                </select>    
                            </div>

                    
                

                        </div>
                    </accordian>
                </div>
            </div>
        </form>
    </div>
@stop

@push('scripts')
    <script src="{{ asset('vendor/webkul/admin/assets/js/tinyMCE/tinymce.min.js') }}"></script>

    <script>
        $(document).ready(function () {
            tinymce.init({
                selector: 'textarea#home_page_content,textarea#footer_content',
                height: 200,
                width: "100%",
                plugins: 'image imagetools media wordcount save fullscreen code table lists link hr',
                toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor link hr | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat | code | table',
                image_advtab: true,
                valid_elements : '*[*]'
            });
        });
    </script>
@endpush