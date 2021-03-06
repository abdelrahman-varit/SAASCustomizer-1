@extends('superlandpage_view::superlandpage.layouts.master')

@php
		$channel = company()->getCurrentChannel();
		
		if ( $channel ) {
				$homeSEO = $channel->home_seo;

				if (isset($homeSEO)) {
						$homeSEO = json_decode($channel->home_seo);

						//$metaTitle = $homeSEO->meta_title;
						$metaTitle = "BuyNoir - Contact Us";

						//$metaDescription = $homeSEO->meta_description;
						$metaDescription = "BuyNoir Contact Us, No coding required. Simply choose the template that matches your style, add your branding and products and start selling your stuff";

						//$metaKeywords = $homeSEO->meta_keywords;
						$metaKeywords = "BuyNoir Contact us";
				}
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

		{!! view_render_event('bagisto.saas.companies.home.content.before') !!}

		<div class="py-5"></div>
		<div class="py-5"></div>

		<div class="container">
			<div class="row">
				<div class="col text-center">
					<h2><strong>CONTACT US</strong></h2>
					<h4>Got a question about using BuyNoir?</h4>
					<p>To contact us, email us at: <a href="mailto:team@buynoir.co">team@buynoir.co</a></p>
					<h3><a href="https://docs.buynoir.co" target="_blank">More help...</a></h3>
				</div>
			</div>
		</div>

		<div class="py-5"></div>
		<div class="py-5"></div>

		{{ view_render_event('bagisto.saas.companies.home.content.after') }}

	
		
@endsection

 


