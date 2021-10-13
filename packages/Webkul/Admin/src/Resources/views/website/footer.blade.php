@extends('admin::layouts.content')

@section('page_title')
    {{ __('admin::app.website.footer.title') }}
@stop

@section('content')
    <div class="content">

        <form method="POST" action="{{ route('admin.website.footer') }}" @submit.prevent="onSubmit" enctype="multipart/form-data">
            <div class="page-header">
                <div class="page-title">
                    <h1>
                        <i class="icon angle-left-icon back-link" onclick="history.length > 1 ? history.go(-1) : window.location = '{{ route('admin.dashboard.index') }}';"></i>

                        {{ __('admin::app.website.footer.title') }} 
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

                    <accordian :title="'{{ __('velocity::app.admin.meta-data.footer') }}'" :active="true">
                        <div slot="header">{{ __('velocity::app.admin.meta-data.footer') }}</div>
                        <div slot="body">
                            <div class="control-group">
                                <label style="width:100%;">
                                    {{ __('velocity::app.admin.meta-data.subscription-content') }}
                                    <span class="locale">[{{ $metaData ? $metaData->channel : $channel }} - {{ $metaData ? $metaData->locale : $locale }}]</span>
                                </label>

                                <textarea
                                    class="control"
                                    id="subscription_bar_content"
                                    name="subscription_bar_content">
                                    {{ $metaData ? $metaData->subscription_bar_content : '' }}
                                </textarea>
                            </div>

                            <div class="control-group">
                                <label style="width:100%;">
                                    {{ __('velocity::app.admin.meta-data.footer-left-content') }}
                                    <span class="locale">[{{ $metaData ? $metaData->channel : $channel }} - {{ $metaData ? $metaData->locale : $locale }}]</span>
                                </label>

                                <textarea
                                    class="control"
                                    id="footer_left_content"
                                    name="footer_left_content">
                                    {{ $metaData ? $metaData->footer_left_content : '' }}
                                </textarea>
                            </div>

                            <div class="control-group">
                                <label style="width:100%;">
                                    {{ __('velocity::app.admin.meta-data.footer-middle-content') }}
                                    <span class="locale">[{{ $metaData ? $metaData->channel : $channel }} - {{ $metaData ? $metaData->locale : $locale }}]</span>
                                </label>

                                <textarea
                                    class="control"
                                    id="footer_middle_content"
                                    name="footer_middle_content">
                                    {{ $metaData ? $metaData->footer_middle_content : '' }}
                                </textarea>
                            </div>
                
                             
   
                            <div class="control-group">
                                <label>{{ __('admin::app.website.footer.image-title') }}</label>

                                <image-wrapper :button-label="'{{ __('admin::app.catalog.products.add-image-btn-title') }}'" input-name="footer_image" :multiple="false" :images='"{{'/storage/'.$metaData->footer_image}}"'></image-wrapper>
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
                selector: 'textarea#footer_left_content,textarea#footer_middle_content,textarea#subscription_bar_content',
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