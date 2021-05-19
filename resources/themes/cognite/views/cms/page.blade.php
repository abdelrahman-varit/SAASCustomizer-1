@extends('shop::layouts.master')

@section('page_title')
    {{ $page->page_title }}
@endsection

@section('seo')
    <meta name="title" content="{{ $page->meta_title }}" />

    <meta name="description" content="{{ $page->meta_description }}" />

    <meta name="keywords" content="{{ $page->meta_keywords }}" />
@endsection

@section('content-wrapper')
<div class="main-container-wrapper">
    {!! DbView::make($page)->field('html_content')->render() !!}
</div>
@endsection