@extends('shop::layouts.master')

@section('page_title')
    {{ __('shop::app.customer.account.wishlist.page-title') }}
@endsection

@section('activeItem')
    <i class="fas fa-playlist_add_check me-2"></i> Wishlist
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
                    <h4 class="m-0 text-primary">{{ __('shop::app.customer.account.wishlist.title') }}</h4>
                </div>
                <div class="col-auto">
                    @if (count($items))
                        <a href="{{ route('customer.wishlist.removeall') }}" class="btn btn-danger btn-sm">{{ __('shop::app.customer.account.wishlist.deleteall') }}</a>
                    @endif
                </div>
            </div>

            <div class="user-wishlist-wrapper mt-4">
                @inject ('productImageHelper', 'Webkul\Product\Helpers\ProductImage')
                @inject ('reviewHelper', 'Webkul\Product\Helpers\Review')

                {!! view_render_event('bagisto.shop.customers.account.wishlist.list.before', ['wishlist' => $items]) !!}
                
                @if ($items->count())
                    <div class="table-responsive">
                                
                        <!-- Wishlist Table Large Screen Start -->
                        <table class="table table-bordered align-middle d-none d-lg-table">
                            <thead>
                                <tr>
                                    <th colspan="4" class="text-end pe-0">
                                        <a href="{{ route('customer.wishlist.removeall') }}" class="btn btn-primary text-white rounded-pill" style="width: 120px">{{ __('shop::app.customer.account.wishlist.deleteall') }}</a>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $item)
                                    @php
                                        $image = $item->product->getTypeInstance()->getBaseImage($item);
                                    @endphp
                                    <tr class="bg-light">
                                        <td class="bg-white" style="width: 18%">
                                            <a href="#" class="d-block text-center"><img src="{{ $image['small_image_url'] }}" alt="{{ $item->product->name }}"></a>
                                        </td>
                                        <td class="p-4">
                                            <a href="#" class="text-dark fw-bold text-decoration-none">{{ $item->product->name }}</a>
                                            @if (isset($item->additional['attributes']))
                                                <div class="item-options">
                                                    @foreach ($item->additional['attributes'] as $attribute)
                                                        <p class="m-0"><strong>{{ $attribute['attribute_name'] }}</strong> : {{ $attribute['option_label'] }}</p>
                                                    @endforeach
                                                </div>
                                            @endif
                                            @for ($i = 1; $i <= $reviewHelper->getAverageRating($item->product); $i++)
                                                <span class="icon star-icon"></span>
                                            @endfor
                                        </td>
                                        <td class="p-4 text-center w-25">
                                            <p class="m-0"><strong>$700</strong> - <span class="text-decoration-line-through">$900</span></p>
                                        </td>
                                        <td class="p-4 text-center w-25 position-relative">
                                            <a href="{{ route('customer.wishlist.remove', $item->id) }}" class="btn position-absolute top-0 end-0"><i class="fas fa-times-circle"></i></a>
                                            <a href="{{ route('customer.wishlist.move', $item->id) }}" class="btn btn-dark rounded-pill" style="width: 120px">{{ __('shop::app.customer.account.wishlist.move-to-cart') }}</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- Wishlist Table Large Screen End -->


                        <!-- Wishlist Table Small Screen Start -->
                        <table class="table table-bordered align-middle d-lg-none">
                            <thead>
                                <tr>
                                    <th colspan="2" class="text-end pe-0">
                                        <a href="{{ route('customer.wishlist.removeall') }}" class="btn btn-primary text-white rounded-pill" style="width: 120px">{{ __('shop::app.customer.account.wishlist.deleteall') }}</a>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $item)
                                    @php
                                        $image = $item->product->getTypeInstance()->getBaseImage($item);
                                    @endphp
                                    <tr class="bg-light">
                                        <td class="bg-white" style="width: 35%">
                                            <a href="#" class="d-block text-center">
                                                <img src="{{ $image['small_image_url'] }}" alt="{{ $item->product->name }}">
                                            </a>
                                        </td>
                                        <td class="position-relative p-4">
                                            <p class="mb-2"><a href="#" class="text-dark fw-bold text-decoration-none">{{ $item->product->name }}</a></p>
                                            <p class="mb-3"><strong>$700</strong> - <span class="text-decoration-line-through">$900</span></p>
                                            @if (isset($item->additional['attributes']))
                                                @foreach ($item->additional['attributes'] as $attribute)
                                                    <p class="m-0"><strong>{{ $attribute['attribute_name'] }}</strong> : {{ $attribute['option_label'] }}</p>
                                                @endforeach
                                            @endif

                                            @for ($i = 1; $i <= $reviewHelper->getAverageRating($item->product); $i++)
                                                <span class="icon star-icon"></span>
                                            @endfor
                                            <a href="{{ route('customer.wishlist.remove', $item->id) }}" class="btn position-absolute top-0 end-0"><i class="fas fa-times-circle"></i></a>
                                            <a href="{{ route('customer.wishlist.move', $item->id) }}" class="btn btn-dark rounded-pill" style="width: 120px">{{ __('shop::app.customer.account.wishlist.move-to-cart') }}</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- Wishlist Table Small Screen End -->
                    </div>
                @else
                    @php
                        if(null!== Request::get('page')){
                            $page =  Request::get('page');
                            if(!empty($page) && $page>1){
                                $page = $page -1;
                                if($page<1) {
                                    echo "<script>window.location.href='./';</script>";
                                } else {
                                    echo "<script>window.location.href='?page=".$page."';</script>";
                                }
                            }    
                        }       
                    @endphp
                    {{ __('customer::app.wishlist.empty') }}
                @endif

                {!! view_render_event('bagisto.shop.customers.account.wishlist.list.after', ['wishlist' => $items]) !!}
            </div>
        </div>
        <!-- Right Side Content End -->
    </div>
</div>
<div class="py-5"></div>
@endsection