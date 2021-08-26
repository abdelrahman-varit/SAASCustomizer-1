@extends('shop::layouts.master')

@section('page_title')
    {{ __('shop::app.checkout.success.title') }}
@stop

@section('content-wrapper')

<div class="main-container-wrapper">

    <div class="order-success-content">
        <svg width="50" height="50" enable-background="new 0 0 512.007 512.007" viewBox="0 0 512.01 512.01" xmlns="http://www.w3.org/2000/svg">
            <path d="m510.671 249.826c-.439-.967-9.741-21.357-24.448-39.404 6.68-22.31 7.471-44.722 7.5-45.776.146-4.321-1.582-8.481-4.731-11.426-.776-.732-18.183-16.011-38.661-27.056-2.373-23.159-10.21-44.165-10.591-45.161-1.523-4.028-4.702-7.207-8.73-8.73-.996-.381-22.002-9.218-45.161-11.591-11.045-20.493-26.338-36.899-27.056-37.676-2.959-3.149-7.339-5.376-11.426-4.717-1.055.029-23.467.82-45.776 7.5-18.048-14.707-38.439-24.009-39.406-24.449-1.963-.893-4.072-1.34-6.181-1.34s-4.219.447-6.182 1.34c-.967.439-21.357 9.741-39.404 24.448-22.31-6.68-44.722-7.471-45.776-7.5-4.351-.63-8.481 1.567-11.426 4.717-.718.776-16.011 17.183-27.056 37.676-23.159 2.373-44.165 11.21-45.161 11.591-4.028 1.523-7.207 4.702-8.73 8.73-.381.996-9.218 22.002-11.591 45.161-20.493 11.045-36.899 26.338-37.676 27.056-3.135 2.959-4.863 7.119-4.717 11.426.029 1.055.82 23.467 7.5 45.776-14.707 18.047-24.009 38.438-24.448 39.404-1.772 3.926-1.772 8.438 0 12.363.439.967 9.741 21.357 24.448 39.404-6.68 22.31-7.471 44.722-7.5 45.776-.146 4.307 1.582 8.467 4.717 11.426.776.718 17.183 16.011 37.676 27.056 2.373 23.159 11.21 44.165 11.591 45.161 1.523 4.028 4.702 7.207 8.745 8.73.996.381 21.987 8.218 45.146 10.591 11.045 20.479 26.323 37.885 27.056 38.661 2.944 3.149 7.134 5.127 11.426 4.731 1.055-.029 23.467-.82 45.762-7.5 18.062 14.692 38.452 24.009 39.419 24.448 1.954.888 4.069 1.333 6.182 1.333 2.115 0 4.23-.445 6.182-1.333.967-.439 21.357-9.756 39.404-24.448 22.31 6.68 44.722 7.471 45.776 7.5 4.409.366 8.467-1.582 11.426-4.731.732-.776 16.011-17.183 27.056-37.661 23.159-2.373 44.15-11.21 45.146-11.591 4.043-1.523 7.222-4.702 8.745-8.73.381-.996 9.218-22.002 11.591-45.161 20.479-11.045 36.885-26.323 37.661-27.056 3.149-2.944 4.878-7.104 4.731-11.426-.029-1.055-.82-23.467-7.5-45.776 14.707-18.047 24.009-38.438 24.448-39.404 1.772-3.925 1.772-8.437 0-12.362z" fill="#f3f5f9"/>
            <path d="m262.185 510.674c.967-.439 21.357-9.756 39.404-24.448 22.31 6.68 44.722 7.471 45.776 7.5 4.409.366 8.467-1.582 11.426-4.731.732-.776 16.011-17.183 27.056-37.661 23.159-2.373 44.15-11.21 45.146-11.591 4.043-1.523 7.222-4.702 8.745-8.73.381-.996 9.218-22.002 11.591-45.161 20.479-11.045 36.885-26.323 37.661-27.056 3.149-2.944 4.878-7.104 4.731-11.426-.029-1.055-.82-23.467-7.5-45.776 14.707-18.047 24.009-38.438 24.448-39.404 1.772-3.926 1.772-8.438 0-12.363-.439-.967-9.741-21.357-24.448-39.404 6.68-22.31 7.471-44.722 7.5-45.776.146-4.321-1.582-8.481-4.731-11.426-.776-.732-18.183-16.011-38.661-27.056-2.373-23.159-10.21-44.165-10.591-45.161-1.523-4.028-4.702-7.207-8.73-8.73-.996-.381-22.002-9.218-45.161-11.591-11.045-20.493-26.338-36.899-27.056-37.676-2.959-3.149-7.339-5.376-11.426-4.717-1.055.029-23.467.82-45.776 7.5-18.046-14.708-38.437-24.01-39.404-24.45-1.963-.893-4.072-1.34-6.181-1.34v512.007c2.115 0 4.229-.445 6.181-1.333z" fill="#e1e6f0"/>
            <path d="m458.346 287.941c9.902-10.532 17.798-24.141 21.899-31.934-4.102-7.793-11.997-21.401-21.899-31.934-3.926-4.189-5.127-10.225-3.105-15.586 5.127-13.535 7.207-29.15 8.013-37.91-6.768-5.625-20.277-15.19-33.461-21.123-5.229-2.358-8.643-7.485-8.833-13.228-.439-14.546-4.482-29.692-7.09-38.071-8.408-2.607-23.628-6.665-38.086-7.104-5.742-.19-10.869-3.618-13.228-8.833-5.933-13.198-15.498-26.693-21.123-33.461-8.76.806-24.375 2.886-37.91 8.013-5.303 2.036-11.367.864-15.586-3.105-10.532-9.902-24.141-17.798-31.934-21.899-7.793 4.102-21.401 11.997-31.934 21.899-4.204 3.94-10.283 5.112-15.586 3.105-13.535-5.127-29.15-7.207-37.91-8.013-5.625 6.768-15.19 20.263-21.123 33.461-2.358 5.215-7.485 8.643-13.228 8.833-14.546.439-29.692 4.482-38.071 7.09-2.607 8.408-6.665 23.628-7.104 38.086-.19 5.742-3.618 10.869-8.833 13.228-13.198 5.933-26.693 15.498-33.461 21.123.806 8.76 2.886 24.375 8.013 37.91 2.021 5.361.82 11.396-3.105 15.586-9.902 10.532-17.798 24.141-21.899 31.934 4.102 7.793 11.997 21.401 21.899 31.934 3.926 4.189 5.127 10.225 3.105 15.586-5.127 13.535-7.207 29.15-8.013 37.91 6.768 5.625 20.263 15.19 33.461 21.123 5.215 2.358 8.643 7.485 8.833 13.228.439 14.546 4.482 29.692 7.09 38.071 8.408 2.607 23.628 6.665 38.101 7.119 5.728.176 10.854 3.604 13.213 8.818 5.933 13.184 15.498 26.693 21.123 33.461 8.76-.806 24.36-2.886 37.896-8.013 5.435-2.043 11.453-.771 15.571 3.091 10.547 9.902 24.17 17.798 31.963 21.914 7.793-4.116 21.416-11.997 31.948-21.899 4.175-3.94 10.254-5.112 15.571-3.105 13.535 5.127 29.15 7.207 37.91 8.013 5.625-6.768 15.19-20.277 21.123-33.461 2.358-5.215 7.485-8.643 13.213-8.818 14.458-.454 29.678-4.512 38.086-7.119 2.607-8.408 6.665-23.613 7.104-38.071.19-5.742 3.604-10.869 8.833-13.228 13.184-5.933 26.693-15.498 33.461-21.123-.806-8.76-2.886-24.375-8.013-37.91-2.021-5.363-.819-11.399 3.106-15.588z" fill="#a0e65c"/>
            <path d="m303.523 455.245c13.535 5.127 29.15 7.207 37.91 8.013 5.625-6.768 15.19-20.277 21.123-33.461 2.358-5.215 7.485-8.643 13.213-8.818 14.458-.454 29.678-4.512 38.086-7.119 2.607-8.408 6.665-23.613 7.104-38.071.19-5.742 3.604-10.869 8.833-13.228 13.184-5.933 26.693-15.498 33.461-21.123-.806-8.76-2.886-24.375-8.013-37.91-2.021-5.361-.82-11.396 3.105-15.586 9.902-10.532 17.798-24.141 21.899-31.934-4.102-7.793-11.997-21.401-21.899-31.934-3.926-4.189-5.127-10.225-3.105-15.586 5.127-13.535 7.207-29.15 8.013-37.91-6.768-5.625-20.277-15.19-33.461-21.123-5.229-2.358-8.643-7.485-8.833-13.228-.439-14.546-4.482-29.692-7.09-38.071-8.408-2.607-23.628-6.665-38.086-7.104-5.742-.19-10.869-3.618-13.228-8.833-5.933-13.198-15.498-26.693-21.123-33.461-8.76.806-24.375 2.886-37.91 8.013-5.303 2.036-11.367.864-15.586-3.105-10.532-9.902-24.141-17.798-31.934-21.899v448.483c7.793-4.116 21.416-11.997 31.948-21.899 4.177-3.941 10.256-5.113 15.573-3.106z" fill="#79cc52"/>
            <path d="m372.68 196.75-42.437-42.422c-5.859-5.859-15.352-5.859-21.211 0l-83.027 83.041-23.042-23.042c-5.859-5.859-15.352-5.859-21.211 0l-42.422 42.422c-5.859 5.859-5.859 15.352 0 21.211l76.069 76.069c5.859 5.859 15.352 5.859 21.211 0l136.07-136.07c2.813-2.813 4.395-6.621 4.395-10.605s-1.582-7.791-4.395-10.604z" fill="#f3f5f9"/>
            <path d="m377.07 207.36c0-3.984-1.582-7.793-4.395-10.605l-42.437-42.422c-5.859-5.859-15.352-5.859-21.211 0l-53.027 53.036v127.27l116.68-116.68c2.813-2.812 4.395-6.621 4.395-10.605z" fill="#e1e6f0"/>
        </svg>

        <h1>{{ __('shop::app.checkout.success.thanks') }}</h1>

        <p>{{ __('shop::app.checkout.success.order-id-info', ['order_id' => $order->increment_id]) }}</p>

        <p>{{ __('shop::app.checkout.success.info') }}</p>

        {{ view_render_event('bagisto.shop.checkout.continue-shopping.before', ['order' => $order]) }}

        <div class="misc-controls">
            <a style="display: inline-block" href="{{ route('shop.home.index') }}" class="btn btn-lg btn-primary">
                {{ __('shop::app.checkout.cart.continue-shopping') }}
            </a>
        </div>
        
        {{ view_render_event('bagisto.shop.checkout.continue-shopping.after', ['order' => $order]) }}
        
    </div>
</div>
@endsection


@push('css')
    <style type="text/css">
        .order-success-content{
            text-align: center;
            padding-top: 130px;
            padding-bottom: 150px;
        }
    </style>
@endpush