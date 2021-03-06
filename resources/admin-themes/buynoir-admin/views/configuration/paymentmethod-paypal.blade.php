@extends('admin::layouts.content-payment')

@section('page_title')
Payment Method {{ __('admin::app.configuration.title') }} 
 
@stop

@section('content')
    <div class="content">
        <?php $locale = request()->get('locale') ?: app()->getLocale(); ?>
        <?php $channel = request()->get('channel') ?: core()->getDefaultChannelCode(); ?>

        <form method="POST" action="{{route('admin.configuration.paymentmethod.store')}}" @submit.prevent="onSubmit" enctype="multipart/form-data">

            <div class="page-header force-responsive-breakable">

                <div class="page-title">
                    <h1>
                    Payment Method {{ __('admin::app.configuration.title') }} 
                    </h1>
                </div>

                <div class="page-action">
                    <div class="action-list">
                        <div class="control-group">
                            <select class="control" id="channel-switcher" name="channel">
                                @foreach (core()->getAllChannels() as $channelModel)

                                    <option value="{{ $channelModel->code }}" {{ ($channelModel->code) == $channel ? 'selected' : '' }}>
                                        {{ $channelModel->name }}
                                    </option>

                                @endforeach
                            </select>
                        </div>

                        <div class="control-group">
                            <select class="control" id="locale-switcher" name="locale">
                                @foreach (core()->getAllLocales() as $localeModel)

                                    <option value="{{ $localeModel->code }}" {{ ($localeModel->code) == $locale ? 'selected' : '' }}>
                                        {{ $localeModel->name }}
                                    </option>

                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-lg btn-primary action_last_btn">
                            {{ __('admin::app.configuration.save-btn-title') }}
                        </button>
                    </div>
                </div>
            </div>

            <div class="page-content">
                <div class="form-container">
                    @csrf()

                    @if ($groups = \Illuminate\Support\Arr::get($config->items, 'sales.children.paymentmethods.children'))

                        @foreach ($groups as $key => $item)
                            <?php
                                if(strtolower($item['name'])=="admin::app.admin.system.cash-on-delivery" ||
                                    $item['name']=="admin::app.admin.system.money-transfer" ||
                                    $item['name']=="stripe_saas::app.admin.config.system.stripe"
                                ){
                                   continue;
                                }else{
                                    //echo $item['name'];
                                }
                            ?>
                            <accordian :title="'{{ __($item['name']) }}'" :active="'true'">
                            <div slot="header">{{ __($item['name'])  }}</div>
                            <div slot="body">
                                    
                                    @foreach ($item['fields'] as $field)
                                          
                                        @include ('admin::configuration.field-type', ['field' => $field])

                                        @php ($hint = $field['title'] . '-hint')
                                        @if ($hint !== __($hint))
                                            {{ __($hint) }}
                                        @endif

                                    @endforeach

                                </div>
                            </accordian>

                        @endforeach

                    @endif

                </div>
            </div>

        </form>
    </div>
@stop

@push('scripts')
    <script>
        $(document).ready(function () {
            $('#channel-switcher, #locale-switcher').on('change', function (e) {
                $('#channel-switcher').val()
                var query = '?channel=' + $('#channel-switcher').val() + '&locale=' + $('#locale-switcher').val();

                window.location.href = "{{ route('admin.configuration.index', [request()->route('slug'), request()->route('slug2')]) }}" + query;
            })
        });
    </script>
@endpush