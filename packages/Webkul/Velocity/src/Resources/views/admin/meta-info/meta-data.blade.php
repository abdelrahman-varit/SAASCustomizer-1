@extends('admin::layouts.content')

@section('page_title')
    {{ __('velocity::app.admin.meta-data.title') }}
@stop

@php
    $locale = request()->get('locale') ?: app()->getLocale();
    $channel = request()->get('channel') ?: core()->getCurrentChannelCode();
@endphp

@section('content')
    <div class="content">
        <form
            method="POST"
            @submit.prevent="onSubmit"
            enctype="multipart/form-data"
            @if ($metaData)
                action="{{ route('velocity.admin.store.meta-data', ['id' => $metaData->id]) }}"
            @else
                action="{{ route('velocity.admin.store.meta-data', ['id' => 'new']) }}"
            @endif
            >

            @csrf

            <div class="page-header force-responsive-breakable">
                <div class="page-title">
                    <h1>{{ __('velocity::app.admin.meta-data.title') }}</h1>
                </div>
                <div class="page-action">
                    <div class="action-list">
                        <input type="hidden" name="locale" value="{{ $locale }}" />
                        <input type="hidden" name="channel" value="{{ $channel }}" />

                        <div class="control-group">
                            <select class="control" id="channel-switcher" onChange="window.location.href = this.value">
                                @foreach (core()->getAllChannels() as $ch)

                                    <option value="{{ route('velocity.admin.meta-data') . '?channel=' . $ch->code . '&locale=' . $locale }}" {{ ($ch->code) == $channel ? 'selected' : '' }}>
                                        {{ $ch->name }}
                                    </option>

                                @endforeach
                            </select>
                        </div>

                        <div class="control-group">
                            <select class="control" id="locale-switcher" onChange="window.location.href = this.value">
                                @foreach (core()->getAllLocales() as $localeModel)

                                    <option value="{{ route('velocity.admin.meta-data') . '?locale=' . $localeModel->code . '&channel=' . $channel }}" {{ ($localeModel->code) == $locale ? 'selected' : '' }}>
                                        {{ $localeModel->name }}
                                    </option>

                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-lg btn-primary action_last_btn">
                            {{ __('velocity::app.admin.meta-data.update-meta-data') }}
                        </button>
                    </div>
                </div>
            </div>

            <accordian :title="'{{ __('velocity::app.admin.meta-data.general') }}'" :active="true">
                <div slot="header">{{ __('velocity::app.admin.meta-data.general') }}</div>
                <div slot="body">
                    <div class="control-group">
                        <label>{{ __('velocity::app.admin.meta-data.activate-slider') }}</label>

                        <label class="switch">
                            <input
                                id="slides"
                                name="slides"
                                type="checkbox"
                                class="control"
                                data-vv-as="&quot;slides&quot;"
                                {{ $metaData && $metaData->slider ? 'checked' : ''}} />

                            <span class="slider round"></span>
                        </label>
                    </div>

                    <div class="control-group">
                        <label>{{ __('velocity::app.admin.meta-data.sidebar-categories') }}</label>

                        <input
                            type="number"
                            min="0"
                            class="control"
                            id="sidebar_category_count"
                            name="sidebar_category_count"
                            value="{{ $metaData ? $metaData->sidebar_category_count : '10' }}" />
                    </div>

                    <div class="control-group">
                        <label>{{ __('velocity::app.admin.meta-data.header_content_count') }}</label>

                        <input
                            type="number"
                            min="0"
                            class="control"
                            id="header_content_count"
                            name="header_content_count"
                            value="{{ $metaData ? $metaData->header_content_count : '5' }}" />
                    </div>

                    <?php
                            //dd($metaData);
                    ?>

                    <div class="control-group">
                        <label>{{ __('shop::app.home.featured-products') }}</label>

                        <input
                            type="number"
                            min="0"
                            class="control"
                            id="featured_product_count"
                            name="featured_product_count"
                            value="{{ $metaData ? $metaData->featured_product_count : 10 }}" />
                    </div>

                    <div class="control-group">
                        <label>{{ __('shop::app.home.new-products') }}</label>

                        <input
                            type="number"
                            min="0"
                            class="control"
                            id="new_products_count"
                            name="new_products_count"
                            value="{{ $metaData ? $metaData->new_products_count : 10 }}" />
                    </div>

                  

 
                    <div class="control-group">
                        <label style="width:100%;">
                            {{ __('velocity::app.admin.meta-data.home-page-content') }}
                            <span class="locale">[{{ $metaData ? $metaData->channel : $channel }} - {{ $metaData ? $metaData->locale : $locale }}]</span>
                        </label>

                        <textarea
                            class="control"
                            id="home_page_content"
                            name="home_page_content">
                            {{ $metaData ? $metaData->home_page_content : '' }}
                        </textarea>
                    </div>

                    <div class="control-group">
                        <label style="width:100%;">
                            {{ __('velocity::app.admin.meta-data.product-policy') }}
                            <span class="locale">[{{ $metaData ? $metaData->channel : $channel }} - {{ $metaData ? $metaData->locale : $locale }}]</span>
                        </label>

                        <textarea
                            class="control"
                            id="product-policy"
                            name="product_policy">
                            {{ $metaData ? $metaData->product_policy : '' }}
                        </textarea>
                    </div>

                </div>
            </accordian>

            <accordian :title="'{{ __('velocity::app.admin.meta-data.images') }}'" :active="false">
                <div slot="header">{{ __('velocity::app.admin.meta-data.images') }}</div>
                <div slot="body">
                    <div class="control-group">
                        <label>{{ __('velocity::app.admin.meta-data.advertisement-four') }}</label>

                        @php
                            $images = [
                                4 => [],
                                3 => [],
                                2 => [],
                            ];

                            $index = 0;

                            foreach ($metaData->get('locale')->all() as $key => $value) {
                                if ($value->locale == $locale) {
                                    $index = $key;
                                }
                            }

                            $advertisement = json_decode($metaData->get('advertisement')->all()[$index]->advertisement, true);
                        @endphp

                        @if(! isset($advertisement[4]) || ! count($advertisement[4]))
                            @php
                                $images[4][] = [
                                    'id' => 'image_1',
                                    'url' => asset('/themes/aretha-franklin/assets/images/banner/advertise-1-1.jpg'),
                                ];
                                $images[4][] = [
                                    'id' => 'image_2',
                                    'url' => asset('/themes/aretha-franklin/assets/images/banner/advertise-1-2.jpg'),
                                ];
                                $images[4][] = [
                                    'id' => 'image_3',
                                    'url' => asset('/themes/aretha-franklin/assets/images/banner/advertise-1-3.jpg'),
                                ];
                                $images[4][] = [
                                    'id' => 'image_4',
                                    'url' => asset('/themes/aretha-franklin/assets/images/banner/advertise-1-2.jpg'),
                                ];
                            @endphp
                        
                            <image-wrapper
                                :multiple="true"
                                input-name="images[4]"
                                :images='@json($images[4])'
                                :button-label="'{{ __('velocity::app.admin.meta-data.add-image-btn-title') }}'">
                            </image-wrapper>
                        @else
                            @foreach ($advertisement[4] as $index => $image)
                                @php
                                    $images[4][] = [
                                        'id' => 'image_' . $index,
                                        'url' => asset('/storage/' . $image),
                                    ];
                                @endphp
                            @endforeach

                            <image-wrapper
                                :multiple="true"
                                input-name="images[4]"
                                :images='@json($images[4])'
                                :button-label="'{{ __('velocity::app.admin.meta-data.add-image-btn-title') }}'">
                            </image-wrapper>
                        @endif
                    </div>

                    <div class="control-group">
                        <label>{{ __('velocity::app.admin.meta-data.advertisement-three') }}</label>
                        @if(! isset($advertisement[3]) || ! count($advertisement[3]))
                            @php
                                $images[3][] = [
                                    'id' => 'image_1',
                                    'url' => asset('/themes/aretha-franklin/assets/images/banner/advertise-2-1.jpg'),
                                ];
                                $images[3][] = [
                                    'id' => 'image_2',
                                    'url' => asset('/themes/aretha-franklin/assets/images/banner/advertise-2-2.jpg'),
                                ];
                                $images[3][] = [
                                    'id' => 'image_3',
                                    'url' => asset('/themes/aretha-franklin/assets/images/banner/advertise-2-3.jpg'),
                                ];
                            @endphp

                            <image-wrapper
                                input-name="images[3]"
                                :images='@json($images[3])'
                                :button-label="'{{ __('velocity::app.admin.meta-data.add-image-btn-title') }}'">
                            </image-wrapper>
                        @else
                            @foreach ($advertisement[3] as $index => $image)
                                @php
                                    $images[3][] = [
                                        'id' => 'image_' . $index,
                                        'url' => asset('/storage/' . $image),
                                    ];
                                @endphp
                            @endforeach

                            <image-wrapper
                                input-name="images[3]"
                                :images='@json($images[3])'
                                :button-label="'{{ __('velocity::app.admin.meta-data.add-image-btn-title') }}'">
                            </image-wrapper>
                        @endif
                    </div>

                    <div class="control-group">
                        <label>{{ __('velocity::app.admin.meta-data.advertisement-two') }}</label>

                        @if(! isset($advertisement[2]) || ! count($advertisement[2]))
                            @php
                                $images[2][] = [
                                    'id' => 'image_1',
                                    'url' => asset('/themes/aretha-franklin/assets/images/banner/advertise-3-1.jpg'),
                                ];
                                $images[2][] = [
                                    'id' => 'image_2',
                                    'url' => asset('/themes/aretha-franklin/assets/images/banner/advertise-3-2.jpg'),
                                ];
                                $images[2][] = [
                                    'id' => 'image_3',
                                    'url' => asset('/themes/aretha-franklin/assets/images/banner/advertise-3-3.jpg'),
                                ];
                            @endphp

                            <image-wrapper
                                input-name="images[2]"
                                :images='@json($images[2])'
                                :button-label="'{{ __('velocity::app.admin.meta-data.add-image-btn-title') }}'">
                            </image-wrapper>
                        @else
                            @foreach ($advertisement[2] as $index => $image)
                                @php
                                    $images[2][] = [
                                        'id' => 'image_' . $index,
                                        'url' => asset('/storage/' . $image),
                                    ];
                                @endphp
                            @endforeach

                            <image-wrapper
                                input-name="images[2]"
                                :images='@json($images[2])'
                                :button-label="'{{ __('velocity::app.admin.meta-data.add-image-btn-title') }}'">
                            </image-wrapper>
                        @endif
                    </div>
                </div>
            </accordian>

            
        </form>
    </div>
@stop

@push('scripts')
    <script src="{{ asset('vendor/webkul/admin/assets/js/tinyMCE/tinymce.min.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            tinymce.init({
                height: 200,
                width: "100%",
                image_advtab: true,
                valid_elements : '*[*]',
                selector: 'textarea#home_page_content,textarea#footer_left_content,textarea#subscription_bar_content,textarea#footer_middle_content,textarea#product-policy',
                plugins: 'image imagetools media wordcount save fullscreen code',
                toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat | code',
            });
        });
    </script>
@endpush
