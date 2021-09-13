<div class="py-5"></div>

@php
    if (app('Webkul\Product\Repositories\ProductRepository')->getAll()->count()>0) {
        $slug = empty($category)?0:$category;
        $category = app('Webkul\Category\Repositories\CategoryRepository')->findBySlugOrFail($slug);
        if ($category != null) {
            $products = app('Webkul\Product\Repositories\ProductRepository')->getAll($category->id)->take(8);
        }
    }
@endphp

@if ($category != null)
    <div class="container">
        <div class="swiper-container products-grid swipeable">
            <div class="row align-items-baseline">
                <div class="col">
                    <h2 class="section_heading text-black">{{$category->name}}</h2>
                </div>
                <div class="col-auto">
                    <a href="/{{$slug}}" class="btn btn-outline-primary rounded-pill btn-sm">Shop More <i class="fas fa-angle-double-right"></i></a>
                </div>
            </div>
            <div class="swiper-wrapper">
                @foreach ($products as $productFlat)
                    <div class="swiper-slide">
                        @include ('shop::products.list.card', ['product' => $productFlat])
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@else
    <div class="container">
        <div class="swiper-container products-grid swipeable">
            <div class="row align-items-baseline">
                <div class="col">
                    <h2 class="section_heading text-black">{{ __('shop::app.home.new-products') }}</h2>
                </div>
            </div>
            <div class="swiper-wrapper">
                @for($i=1;$i<9;$i++)
                    <div class="swiper-slide">
                        <!-- Simple Product -->
						<div class="product text-center">
							<div class="product_thumbnail p-3">
								<img src="{{ asset('/themes/beshop/assets/img/demo/Men\'s-Collection-'.$i.'.jpg') }}" alt="Thumbnail">
								<div class="product_thumbnail_overlay">
									<a href="/" class="btn btn-light btn-sm" title="Quick View"><i class="fas fa-eye"></i></a>
								</div>
							</div>
							<h4 class="product_title mt-3 mb-2"><a href="/" class="stretched-link text-reset text-decoration-none">Demo Product 0{{$i}}</a></h4>
							<p class="product_price text-primary m-0">$25.00</p>
						</div>
                    </div>
                @endfor
            </div>
        </div>
    </div>
@endif