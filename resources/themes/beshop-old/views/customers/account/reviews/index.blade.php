@inject ('productImageHelper', 'Webkul\Product\Helpers\ProductImage')

@extends('shop::layouts.master')

@section('activeItem')
    <i class="fas fa-rate_review me-2"></i> Reviews
@endsection

@section('page_title')
    {{ __('shop::app.customer.account.review.index.page-title') }}
@endsection

@section('content-wrapper')
<div class="py-5"></div>
<div class="container">
    <div class="row">
        @include('shop::customers.account.partials.sidemenu')

        <!-- Right Side Content Start -->
        <div class="col-lg-8 col-xl-9">
            <div class="row mt-3 mt-lg-0">
                <div class="col">
                    <h4 class="m-0 text-primary">{{ __('shop::app.customer.account.review.index.title') }}</h4>
                </div>
                <div class="col-auto">
                    @if (count($reviews) > 1)
                        <a href="{{ route('customer.review.deleteall') }}" class="btn btn-dark btn-sm">{{ __('shop::app.customer.account.wishlist.deleteall') }}</a>
                    @endif
                </div>
            </div>

            {!! view_render_event('bagisto.shop.customers.account.reviews.list.before', ['reviews' => $reviews]) !!}

            <div class="user-reviews-wrapper mt-4">
                @if (! $reviews->isEmpty())
                    @foreach ($reviews as $review)
                        <div class="user-review mb-5">
                            <div class="shadow">
                                <div class="row">
                                    <div class="col-lg-4 pt-4 pt-lg-0 text-center order-lg-last">
                                        @php
                                            $image = $productImageHelper->getProductBaseImage($review->product);
                                        @endphp
                                        <a href="{{ route('shop.productOrCategory.index', $review->product->url_key) }}">
                                            <img src="{{ $image['small_image_url'] }}" alt="{{ $review->product->name }}">
                                        </a>
                                    </div>
                                    <div class="col-lg-8 d-flex flex-column">
                                        <p class="mb-1 px-4 pt-4 fw-bold"><a href="{{ route('shop.productOrCategory.index', $review->product->url_key) }}" class="text-dark text-decoration-none">{{$review->product->name}}</a></p>
                                        <div class="rating text-warning mb-3 px-4">
                                            @for($i=0 ; $i < $review->rating ; $i++)
                                                <i class="fas fa-star"></i>
                                            @endfor
                                        </div>
                                        <p class="mb-4 px-4">{{ $review->comment }}</p>
                                        <hr class="w-75 mb-3 mt-auto">
                                        <div class="d-flex align-items-center px-4 pb-3">
                                            <a href="#"><img src="./img/demo/Customer-Reviews-image.png" alt="Chuyan Smith"></a>
                                            <p class="fw-bold mb-0 ms-3"><a href="#" class="text-dark text-decoration-none">Chuyan Smith</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between mt-3">
                                <a href="{{ route('customer.review.delete', $review->id) }}" class="btn btn-outline-dark rounded-pill" style="width: 120px">Delete</a>
                                <a href="#" class="btn btn-outline-dark rounded-pill" style="width: 120px">Edit</a>
                            </div>
                        </div>
                    @endforeach
                @else
                    {{ __('customer::app.reviews.empty') }}
                @endif
            </div>

            {!! view_render_event('bagisto.shop.customers.account.reviews.list.after', ['reviews' => $reviews]) !!}

        </div>
        <!-- Right Side Content End -->
    </div>
</div>
<div class="py-5"></div>
@endsection