@if (app('Webkul\Product\Repositories\ProductRepository')->getAll()->count())

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
                <div class="col-3">{{$category->name}}</div>
                <div class="col-7"><hr></div>
                <div class="col-2"><a class="btn-dark" href="/{{$slug}}">Shop More</a></div>
            </div>

            <div class="product-grid-4">
                @foreach ($products as $productFlat)
                    @include ('shop::products.list.card', ['product' => $productFlat])

                @endforeach

            </div>

        </section>
    </div>

    @else
        <div class="main-container-wrapper">
            <section class="featured-products">
                <div class="featured-heading">
                    <div class="col-3">"{{$slug}}" Not Found</div>
                    <div class="col-9"><hr></div>
                </div>

                <div class="product-grid-4">
                    Please check the spelling of the category.
                </div>
            </section>
        </div>
    @endif

@else
<div class="main-container-wrapper">
    <section class="featured-products">

        <div class="featured-heading">
            <div class="col-3">{{ __('Kids Products') }}</div>
            <div class="col-9"><hr></div>
        </div>


        <div class="featured-grid product-grid-4">
            
            @for($i=1;$i<9;$i++)
            
                <div class="product-card">

                        <div class="sticker new">
                            {{ __('Demo') }}
                        </div>
            

                    <div class="product-image">
                        <a href="/" title="Demo product">
                            <img src="{{ asset('/themes/congnite/assets/images/product/catproduct-0'.$i.'.jpg') }}" onerror="this.src='{{ asset('/themes/congnite/assets/images/product/featured-01.jpg') }}'"/>
                        </a>
                    </div>

                    <div class="product-information text-center">

                        <div class="product-name">
                            <a href="/" title="Demo product">
                                <span>
                                    Demo Product 0{{$i}}
                                </span>
                            </a>
                        </div>

                        <div class="product-price text-danger">
                            $25.00
                        </div>

                    </div>

                    </div>

            @endfor

        </div> 

    </section>

</div>
@endif
