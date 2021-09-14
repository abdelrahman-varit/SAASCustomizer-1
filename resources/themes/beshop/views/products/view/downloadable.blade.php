@if ($product->type == 'downloadable')
    {!! view_render_event('bagisto.shop.products.view.downloadable.before', ['product' => $product]) !!}


    @if ($product->downloadable_samples->count())
        <div class="row mb-3">
            <div class="col-lg-4 fw-bold">{{ __('shop::app.products.samples') }}:</div>
            <div class="col-lg-8">
                @foreach ($product->downloadable_samples as $sample)
                    <a href="{{ route('shop.downloadable.download_sample', ['type' => 'sample', 'id' => $sample->id]) }}" target="_blank">{{ $sample->title }}</a>
                @endforeach
            </div>
        </div>
    @endif

    @if ($product->downloadable_links->count())
        <div class="row mb-3">
            <div class="col-lg-4 fw-bold">{{ __('shop::app.products.links') }}:</div>
            <div class="col-lg-8">
                @foreach ($product->downloadable_links as $link)
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="links[]" v-validate="'required'" value="{{ $link->id }}" id="{{ $link->id }}" data-vv-as="&quot;{{ __('shop::app.products.links') }}&quot;">
                        <label class="form-check-label" for="{{ $link->id }}">{{ $link->title . ' + ' . core()->currency($link->price) }}</label>
                        @if ($link->sample_file || $link->sample_url)
                            <a href="{{ route('shop.downloadable.download_sample', ['type' => 'link', 'id' => $link->id]) }}" target="_blank">
                                {{ __('shop::app.products.sample') }}
                            </a>
                        @endif
                    </div>
                @endforeach
                <div class="text-danger small d-block mt-1" v-if="errors.has('links[]')">@{{ errors.first('links[]') }}</div>
            </div>
        </div>
    @endif

    {!! view_render_event('bagisto.shop.products.view.downloadable.before', ['product' => $product]) !!}
@endif