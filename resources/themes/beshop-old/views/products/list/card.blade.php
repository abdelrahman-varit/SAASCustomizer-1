{!! view_render_event('bagisto.shop.products.list.card.before', ['product' => $product]) !!}

    @inject ('productImageHelper', 'Webkul\Product\Helpers\ProductImage')
    @php
        $productBaseImage = $productImageHelper->getProductBaseImage($product);
    @endphp

    <!-- Simple Product -->
    <div class="product text-center">
        <div class="product_thumbnail p-3">
            <img src="{{ $productBaseImage['medium_image_url'] }}" alt="{{ $product->name }}">
            <div class="product_thumbnail_overlay">
                @include('shop::products.add-buttons', ['product' => $product])
            </div>
        </div>
        <h4 class="product_title mt-3 mb-2"><a href="{{ route('shop.productOrCategory.index', $product->url_key) }}" class="stretched-link text-reset text-decoration-none">{{ $product->name }}</a></h4>
        <p class="product_price text-primary m-0">
            @include ('shop::products.price', ['product' => $product])
        </p>
    </div>

{!! view_render_event('bagisto.shop.products.list.card.after', ['product' => $product]) !!}