@extends('shop::layouts.master')

@section('page_title')
    {{ __('shop::app.customer.account.address.index.page-title') }}
@endsection

@section('content-wrapper')

<div class="py-5"></div>
<div class="container">
    <div class="row">
        @include('shop::customers.account.partials.sidemenu')

        <!-- Right Side Content Start -->
        <div class="col-lg-8 col-xl-9">
            <div class="user-address-wrapper mt-4">

                {!! view_render_event('bagisto.shop.customers.account.address.list.before', ['addresses' => $addresses]) !!}

                @if ($addresses->isEmpty())
                    <div class="row row-cols-1 row-cols-md-2 gy-5">
                        <!-- Single Address Start -->
                        <div class="col">
                            <p class="mb-2">Mohammad Wahid</p>
                            <p class="mb-2">House #229, Road #3, Mirpur DOHS</p>
                            <p class="mb-2">Dhaka - 1216, Bagladesh</p>
                            <p class="mb-4">Contact: 818-466-1528</p>
                            <a href="#" class="btn btn-black fw-bold rounded-pill" style="width: 120px">Delete</a>
                            <a href="#" class="btn btn-primary text-white fw-bold rounded-pill ms-2" style="width: 120px">Edit</a>
                        </div>
                        <!-- Single Address End -->

                        <!-- Single Address Start -->
                        <div class="col">
                            <p class="mb-2">Yasin Khan</p>
                            <p class="mb-2">3857 Edsel Road, Pomona, CA 91766</p>
                            <p class="mb-2">United States</p>
                            <p class="mb-4">Contact: 818-466-1528</p>
                            <a href="#" class="btn btn-black fw-bold rounded-pill" style="width: 120px">Delete</a>
                            <a href="#" class="btn btn-primary text-white fw-bold rounded-pill ms-2" style="width: 120px">Edit</a>
                        </div>
                        <!-- Single Address End -->
                    </div>
                @else
                    
                @endif

                {!! view_render_event('bagisto.shop.customers.account.address.list.after', ['addresses' => $addresses]) !!}
            </div>
        </div>
        <!-- Right Side Content End -->
    </div>
</div>









<div class="main-container-wrapper">
    <div class="account-content">

        

        <div class="account-layout">

            

            <div class="account-table-content">
                @if ($addresses->isEmpty())
                    <div>{{ __('shop::app.customer.account.address.index.empty') }}</div>
                    <br/>
                    <a href="{{ route('customer.address.create') }}">{{ __('shop::app.customer.account.address.index.add') }}</a>
                @else
                    <div class="address-holder">
                        @foreach ($addresses as $address)
                            <div class="address-card">
                                <div class="details">
                                    <span
                                        class="bold">{{ auth()->guard('customer')->user()->name }}</span>
                                    <ul class="address-card-list">
                                        <li class="mt-5">
                                            {{ $address->company_name }}
                                        </li>

                                        <li class="mt-5">
                                            {{ $address->first_name }}
                                        </li>

                                        <li class="mt-5">
                                            {{ $address->last_name }}
                                        </li>

                                        <li class="mt-5">
                                            {{ $address->address1 }},
                                        </li>

                                        <li class="mt-5">
                                            {{ $address->city }}
                                        </li>

                                        <li class="mt-5">
                                            {{ $address->state }}
                                        </li>

                                        <li class="mt-5">
                                            {{ core()->country_name($address->country) }} {{ $address->postcode }}
                                        </li>

                                        <li class="mt-10">
                                            {{ __('shop::app.customer.account.address.index.contact') }}
                                            : {{ $address->phone }}
                                        </li>
                                    </ul>

                                    <div class="control-links mt-20">
                                    <span>
                                        <a href="{{ route('customer.address.edit', $address->id) }}">
                                            {{ __('shop::app.customer.account.address.index.edit') }}
                                        </a>
                                    </span>

                                        <span>
                                        <a href="{{ route('address.delete', $address->id) }}"
                                           onclick="deleteAddress('{{ __('shop::app.customer.account.address.index.confirm-delete') }}')">
                                            {{ __('shop::app.customer.account.address.index.delete') }}
                                        </a>
                                    </span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

            
        </div>
    </div>
</div>
<div class="py-5"></div>
@endsection

@push('scripts')
    <script>
        function deleteAddress(message) {
            if (!confirm(message))
                event.preventDefault();
        }
    </script>
@endpush
