@include('shop::layouts.footer.newsletter-subscription')

<div class="footer" style="{{empty($velocityMetaData->footer_image)?'':'background-image:url(/storage/'.$velocityMetaData->footer_image.');background-size:cover'}}">
	<div class="main-container-wrapper">
		<div class="footer-content">
	        @include('shop::layouts.footer.footer-links')
			@include('shop::layouts.footer.animated-loader')
	        {{-- @if ($categories)
	            @include('shop::layouts.footer.top-brands')
	        @endif --}}

	        
	    </div>
	</div>
	    
</div>


