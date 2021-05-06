@extends('shop::layouts.master')

@php
    $channel = core()->getCurrentChannel();

    $homeSEO = $channel->home_seo;

    if (isset($homeSEO)) {
        $homeSEO = json_decode($channel->home_seo);

        $metaTitle = $homeSEO->meta_title;

        $metaDescription = $homeSEO->meta_description;

        $metaKeywords = $homeSEO->meta_keywords;
    }
@endphp

@section('page_title')
    {{ isset($metaTitle) ? $metaTitle : "" }}
@endsection

@section('head')

    @if (isset($homeSEO))
        @isset($metaTitle)
            <meta name="title" content="{{ $metaTitle }}" />
        @endisset

        @isset($metaDescription)
            <meta name="description" content="{{ $metaDescription }}" />
        @endisset

        @isset($metaKeywords)
            <meta name="keywords" content="{{ $metaKeywords }}" />
        @endisset
    @endif
@endsection

@section('content-wrapper')
    {{-- {!! view_render_event('bagisto.shop.home.content.before') !!}

    {!! DbView::make($channel)->field('home_page_content')->with(['sliderData' => $sliderData])->render() !!}

    {{ view_render_event('bagisto.shop.home.content.after') }} --}}

    @include('shop::home.slider')


    {!! view_render_event('bagisto.shop.home.content.before') !!}

        @if ($velocityMetaData)
            {!! DbView::make($velocityMetaData)->field('home_page_content')->render() !!}
        @else
            @include('shop::home.advertisements.advertisement-four')
            @include('shop::home.featured-products')
            @include('shop::home.advertisements.advertisement-three')
            @include('shop::home.new-products')
            @include('shop::home.advertisements.advertisement-two')
            @include('shop::home.category-products')
            @include('shop::home.recent-products')
        @endif

    {{ view_render_event('bagisto.shop.home.content.after') }}

@endsection


@push('css')
    <style type="text/css">
        .main-container-wrapper{
            background-color: transparent !important;
        }
    </style>
@endpush