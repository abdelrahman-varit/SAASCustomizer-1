<div id="sidenav">
    <div class="category_heading">
    	All Categories
    </div>
 	
 	<div class="category_content">
 		<ul class="class-one">

        	@php

				$categories = [];

				foreach (app('Webkul\Category\Repositories\CategoryRepository')->getVisibleCategoryTree(core()->getCurrentChannel()->root_category_id) as $category) {
				    if ($category->slug)
				        array_push($categories, $category);
				}

			@endphp

			@foreach($categories as $category)
				@if(count($categories) > 0)
					@php
					 
						$sub_categories = [];

						foreach (app('Webkul\Category\Repositories\CategoryRepository')->getVisibleCategoryTree($category->id) as $sub_category) {
						    if ($sub_category->slug)
						        array_push($sub_categories, $sub_category);
						}

					@endphp

				
					@if(count($sub_categories) > 0)
						
							<li class="expandable">
			                    {{-- <i class="icon arrow-right-icon"></i> --}}
			                    <i class="las la-angle-right"></i>
			                    <span>{{$category->name}}</span>
			                    <ul class="class-two" id="class-two">
			                    	@foreach($sub_categories as $sub_category)
			                        	<li><a href="/{{$sub_category->url_path}}">{{$sub_category->name}}</a></li>
			                        @endforeach
			                    </ul>
			                </li>
			            
		            @else
		            	<li><a href="/{{$category->url_path}}">{{$category->name}}</a></li>
					@endif

				@endif
			@endforeach


        </ul>
 	</div>       
 </div>



@push('css')
	<style type="text/css">

		#sidenav {
			background-color: #f2f2f2;
			width: 100%;
			height: 400px;
			max-height: 400px;
			overflow: hidden;
			display: inline-flex;
			flex-direction: column;
		}

		#sidenav .category_heading {
			background-color: #000;
			color: #fff;
			padding: 15px;
			font-weight: bold;
			font-size: 18px;
			max-height: 50px;
		}
		#sidenav .category_content{
			background-color: #f2f2f2;
			padding: 0px 10px 10px 0;
			margin-right: 10px;
			margin-top: 15px;
			margin-bottom: 15px;
			overflow-y: auto;
		}
		#sidenav .category_content .class-one li{
			border-bottom: 1px solid #ccc;
			width: 100%;
		}
		#sidenav .category_content .class-one li:last-child{
			border-bottom: 0;
		}

		#sidenav .category_content .class-one li.active{
			background-color: #FAE3DB;
		}

		#sidenav .category_content .class-one li.expandable ul{
			background-color: #fff;
		}

		#sidenav .category_content .la-angle-right{
			float: right;
			position: relative;
			top: 13px;
			right: 10px;
		}
		#sidenav .category_content .class-one li span{
			padding: 12px 15px 12px 20px;
			display: block;
		}
		#sidenav .category_content .class-one li a{
			width: 100%;
			display: block;
			padding: 12px 15px 12px 20px;
			color: #000;
		}
		#sidenav .category_content .class-one li:hover{
			background-color: #FAE3DB;
		}


		#sidenav .category_content .class-two{
			display: none;
			border: 1px solid #ccc;
			border-bottom: 0;
			/*margin-top: -20px;*/
		}

		/*#sidenav .category_content .class-one span:hover + .class-two{
			display: block;
		}*/





		#sidenav .category_content::-webkit-scrollbar-track
		{
		    /*-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);*/
		    border-radius: 10px;
		    background-color: transparent;
		    border: 1px solid #ccc;
		}

		#sidenav .category_content::-webkit-scrollbar
		{
		    width: 10px;
		    background-color: #F5F5F5;
		}

		#sidenav .category_content::-webkit-scrollbar-thumb
		{
		    border-radius: 10px;
		    /*-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);*/
		    background-color: #999;
		}

		


	</style>

@endpush

@push('scripts')

	<script type="text/javascript">

	$(document).ready(function(){
		$('li.expandable').click(function() {
		    $(this).children('ul').toggle();
		    $(this).toggleClass("active");
		    return false;
		});
	});

	</script>

@endpush