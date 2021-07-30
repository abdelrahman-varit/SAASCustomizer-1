{{-- @extends('shop::companies.layouts.master') --}}


@section('page_title')
    {{ $status }} {{ __('shop::app.admin.tenant.exceptions.not-allowed-to-visit-this-section') }}
@stop

@section('content-wrapper')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap');
        body {
            margin: 0;
            font-family: 'Lato', sans-serif;
            font-size: 1rem;
            line-height: 1.5;
        }
        strong {
            font-weight: 700;
        }
        .error-container {
            text-align: center;
            display: flex;
            align-items: center;
            height: 100vh;
            max-width: 500px;
            margin: 0 auto;
            padding-left: 1rem;
            padding-right: 1rem;
        }
        .error-icon {
            margin-bottom: .5rem;
        }
        .error-title {
            margin-bottom: .5rem;
            font-size: 1.85rem;
            font-weight: 700;
        }
        .error-messgae {
            margin-bottom: 1.5rem;
            font-weight: 700;
            font-size: 1.125rem;
        }
        .error-description {
            margin-bottom: 1.5rem;
        }
        .btn {
            background-color: black;
            display: inline-block;
            padding: 10px 20px;
            color: white;
            text-decoration: none;
            font-weight: 700;
            font-size: .875rem;
            line-height: 1;
        }
    </style>

 

    <div class="error-container">
        <div class="wrapper">
            <div class="error-box">
                <div class="error-icon">
                    <svg fill="#6B6B6B" width="70" height="70" enable-background="new 0 0 78.782 78.793" version="1.1" viewBox="0 0 78.782 78.793" xml:space="preserve" xmlns="http://www.w3.org/2000/svg">
                        <path d="m78.782 39.483c2e-3 21.617-17.732 39.337-39.352 39.31-21.628-0.028-39.739-17.475-39.426-40.017 0.296-21.318 17.559-38.734 39.375-38.776 21.79-0.042 39.4 17.645 39.403 39.483zm-64.61-18.65c18.106 10.037 36.203 20.07 54.307 30.107 5.431-12.787 1.325-30.473-13.821-38.933-15.024-8.393-32.336-2.767-40.486 8.826zm-3.87 7.012c-5.569 12.871-1.257 31.489 15.21 39.66 15.573 7.728 32.128 0.777 39.04-9.585-18.084-10.026-36.164-20.049-54.25-30.075z"/>
                        <path d="m61.599 43.465c-2.153-1.196-4.273-2.362-6.375-3.56-0.192-0.11-0.331-0.401-0.394-0.636-1.171-4.327-3.696-7.611-7.54-9.907-1.725-1.03-2.242-2.938-1.282-4.523 0.939-1.55 2.862-1.999 4.543-0.974 7.095 4.324 10.801 10.662 11.183 18.954 6e-3 0.133 3e-3 0.267-9e-3 0.399-4e-3 0.047-0.044 0.091-0.126 0.247z"/>
                        <path d="m42.581 32.919c-2.126-1.18-4.127-2.281-6.112-3.411-0.155-0.088-0.275-0.378-0.276-0.575-0.014-4.217-0.033-8.434 3e-3 -12.651 0.015-1.731 1.446-3.051 3.171-3.06 1.72-9e-3 3.189 1.305 3.2 3.029 0.038 5.497 0.014 10.994 0.014 16.668z"/>
                        <path d="m32.909 27.555c-1.837-1.017-3.67-2.032-5.516-3.054 1.35-1.303 3.091-1.517 4.424-0.576 1.178 0.831 1.652 2.351 1.092 3.63z"/>
                        <path d="m23.953 39.075c-1.997 8.522 2.387 15.092 7.61 18.044 5.698 3.22 13.797 2.889 19.514-3.005 1.845 1.022 3.705 2.053 5.569 3.085-4.934 6.915-16.503 11.319-27.071 6.084-11.773-5.832-14.572-18.821-11.247-27.29 0.144 0.066 0.291 0.122 0.428 0.198 1.723 0.955 3.445 1.912 5.197 2.884z"/>
                    </svg>
                </div>
                <div class="error-title">
                    {{ __('shop::app.admin.tenant.exceptions.seller') }}
                </div>
                <div class="error-messgae">
                    {{ $_SERVER['HTTP_HOST'] ?? NULL }} {{ __('shop::app.tenant.custom-errors.blocked') }}.
                </div>
                <div class="error-description">
                    {!! __('shop::app.tenant.custom-errors.block-message') !!}
                </div>
                <a href="{{config('app.url')}}" class="btn">{{ __('shop::app.tenant.custom-errors.visit-us') }}</a>
            </div>
        </div>
    </div>
    @php
        exit();
    @endphp
@stop