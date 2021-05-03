<div class="main-container-wrapper">
<div class="container-fluid product-policy-container no-padding" style="margin-bottom: 10vh;">

        {!! $velocityMetaData->product_policy !!}

</div>
</div>


@push('css')

	<style type="text/css">
		.row {
		    place-content: center;
		}
		.product-policy-container .card{
			padding: 50px 15px;
		    border: 1px solid #e1e1e1;
		    background: #fff;
		    margin: 5px;
		    text-align: center;
		    
		}

		.product-policy-wrapper{
			display: flex;
			flex-direction: column;
			flex-basis: 100%;
			flex: 1;
		}
	</style>

@endpush