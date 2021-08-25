@extends('shop::layouts.master')

@section('page_title')
    {{ __('shop::app.customer.account.address.index.page-title') }}
@endsection

@section('activeItem')
    <i class="fas fa-contact_mail me-2"></i> Address
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

                @if (!$addresses->isEmpty())
                    <div class="row row-cols-1 row-cols-md-2 gy-5">
                        @foreach ($addresses as $address)
                            <!-- Single Address Start -->
                            <div class="col">
                                <p class="mb-2">{{ $address->first_name }} {{ $address->last_name }}</p>
                                <p class="mb-2">{{ $address->company_name }}</p>
                                <p class="mb-2">{{ $address->address1 }}, {{ $address->city }}, {{ $address->state }}, {{ core()->country_name($address->country) }} {{ $address->postcode }}</p>
                                <p class="mb-4">Contact: {{ $address->phone }}</p>
                                <a href="{{ route('address.delete', $address->id) }}" onclick="deleteAddress('{{ __('shop::app.customer.account.address.index.confirm-delete') }}')" class="btn btn-black fw-bold rounded-pill" style="width: 120px">{{ __('shop::app.customer.account.address.index.delete') }}</a>
                                <a href="{{ route('customer.address.edit', $address->id) }}" class="btn btn-primary text-white fw-bold rounded-pill ms-2" style="width: 120px">{{ __('shop::app.customer.account.address.index.edit') }}</a>
                            </div>
                            <!-- Single Address End -->
                        @endforeach
                    </div>
                @else
                    <div class="row">
                        <div class="col">
                            <p class="m-0">{{ __('shop::app.customer.account.address.index.empty') }} <a href="{{ route('customer.address.create') }}">{{ __('shop::app.customer.account.address.index.add') }}</a></p>
                        </div>
                    </div>
                @endif

                {!! view_render_event('bagisto.shop.customers.account.address.list.after', ['addresses' => $addresses]) !!}
            </div>
        </div>
        <!-- Right Side Content End -->
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
