@if (app('Webkul\Product\Repositories\ProductRepository')->getAll()->count()>0)

    @php

        $slug = empty($category)?0:$category;
        $category = app('Webkul\Category\Repositories\CategoryRepository')->findBySlugOrFail($slug);
        if ($category != null) {
            $products = app('Webkul\Product\Repositories\ProductRepository')->getAll($category->id)->take(8);
        }
        
    @endphp

    @if($category != null)
    <div class="main-container-wrapper">
        <section class="featured-products">

            <div class="featured-heading">
                <div class="col-3 ftitle">{{$category->name}}</div>
                <div class="col-7 fline"><hr></div>
                <div class="col-2 fbtn"><a class="btn-dark" href="/{{$slug}}">Shop More <i class="las la-arrow-right"></i></a></div>
            </div>

            <div class="swiper-container products-grid swipeable">
                <div class="swiper-wrapper">
                    @foreach ($products as $productFlat)
                        <div class="swiper-slide">
                            @include ('shop::products.list.card', ['product' => $productFlat])
                        </div>
                    @endforeach
                </div>
            </div>

        </section>
    </div>

    @else
        {{-- <div class="main-container-wrapper">
            <section class="featured-products">
                <div class="featured-heading">
                    <div class="col-3">"{{$slug}}" Not Found</div>
                    <div class="col-9"><hr></div>
                </div>

                <div class="product-grid-4" style="text-align: center;">
                    Please check the spelling of the category.
                </div>
            </section>
        </div> --}}
    @endif

@else
    <div class="main-container-wrapper">
        <section class="featured-products">

            <div class="featured-heading">
                <div class="col-3">{{ __('Kids Products') }}</div>
                <div class="col-9"><hr></div>
            </div>

            <div class="swiper-container products-grid swipeable">
                <div class="swiper-wrapper">
                    @for($i=1;$i<9;$i++)
                        <div class="swiper-slide">
                            <div class="product-card">
                                <div class="sticker new">{{ __('Demo') }}</div>
                                <div class="product-image">
                                    <a href="/" title="Demo product">
                                        <img src="{{ asset('/themes/pattie-labelle/assets/images/product/catproduct-0'.$i.'.png') }}" onerror="this.src='{{ asset('/themes/pattie-labelle/assets/images/product/featured-01.jpg') }}'"/>
                                    </a>
                                </div>    
                                <div class="product-information text-center">
                                    <div class="product-name">
                                        <a href="/" title="Demo product"><span>Demo Product 0{{$i}}</span></a>
                                    </div>        
                                    <div class="product-price text-danger">$25.00</div>        
                                </div>    
                            </div>
                        </div>
                    @endfor
                </div>
            </div>

        </section>

    </div>
@endif
