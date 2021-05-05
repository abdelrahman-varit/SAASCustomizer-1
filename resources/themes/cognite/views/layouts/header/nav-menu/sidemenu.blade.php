<div id="sidenav">
            
        <nav id="sidemenu" class="mm-menu mm-menu_offcanvas mm-menu_opened">
            <ul>

            	{{-- <li>
                    <span>About us</span>
                    <ul>
                        <li><a href="#about/history">History</a></li>
                        <li>
                            <span>The team</span>
                            <ul>
                                <li>
                                    <a href="#about/team/management">Management</a>
                                </li>
                                <li>
                                    <a href="#about/team/sales">Sales</a>
                                </li>
                                <li>
                                    <a href="#about/team/development">Development</a>
                                </li>
                            </ul>
                        </li>
                        <li><a href="#about/address">Our address</a></li>
                    </ul>
                </li> --}}

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
							
								<li>
				                    <span>{{$category->name}}</span>
				                    <ul>
				                    	@foreach($sub_categories as $sub_category)
				                        	<li><a href="{{$sub_category->slug}}">{{$sub_category->name}}</a></li>
				                        @endforeach
				                    </ul>
				                </li>
				            
			            @else
			            	<li><a href="{{$category->slug}}">{{$category->name}}</a></li>
						@endif

					@endif
				@endforeach


            </ul>
        </nav>
    </div>



@push('css')
	<link type="text/css" rel="stylesheet" href="{{asset('themes/congnite/assets/css/demo.css')}}" />
	<link type="text/css" rel="stylesheet" href="{{asset('themes/congnite/assets/css/mmenu.css')}}" />
	<style type="text/css">

		.side_navigation_wrapper{
			width: 90%;
			background-color: #e1e1e1;
		}
		.sideham{
			font-size:17px;
			cursor:pointer;
			width: 100%;
			padding: 13px 17px;
			background-color: #000;
			color: #fff;
		}
		.sidenav {
			height: 320px;
			width: 100%;
			position: relative;
			z-index: 1;
			top: 0;
			left: 0;
			overflow-x: hidden;
			transition: 0.5s;
			padding-top: 15px;
			padding-bottom: 15px;
		}

		.sidenav::-webkit-scrollbar-track
		{
			/*-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);*/
			border-radius: 10px;
			background-color: #F5F5F5;
			border: 1px solid #ccc;
		}

		.sidenav::-webkit-scrollbar
		{
			width: 10px;
			background-color: #F5F5F5;
		}

		.sidenav::-webkit-scrollbar-thumb
		{
			border-radius: 10px;
			/*-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);*/
			background-color: #bbb;
			height: 20vh;
		}


		.sidenav ul{
			/*width: 90%;
			overflow-y: scroll;*/
		}

		.sidenav .category-icon{
			height: 17px;
		    width: 17px;
		    float: left;
		    margin-right: 7px;
		    margin-top: 1px;
		}

		.sidenav a {
			padding: 10px 10px 10px 18px;
			text-decoration: none;
			font-size: 15px;
			color: #000;
			display: block;
			transition: 0.3s;
			border-bottom: 1px solid #ccc;
		}

		.sidenav a:last:child {
			border-bottom: 0;
		}

		.sidenav a:hover {
			background-color: #f1f1f1;
		}


		.sidenav .arrow-down-icon{
			position: absolute;
		    right: 20px;
		    margin-top: 6px;
		}

		#category-second-list{
			display: none;
			background-color: #fff;
		}

		#category-second-list .category-second-item{
			margin-left: 25px;
		}

	</style>

@endpush

@push('scripts')

	<script type="text/javascript" src="{{asset('themes/congnite/assets/js/mmenu.polyfills.js')}}"></script>
	<script type="text/javascript" src="{{asset('themes/congnite/assets/js/mmenu.js')}}"></script>
	<script type="text/javascript">

		// new Mmenu(document.querySelector('#sidemenu'));
  //       document.addEventListener(
  //           "DOMContentLoaded", () => {
  //               new Mmenu( "#sidemenu", {
  //                  "slidingSubmenus": false
  //               });
  //           }
  //       );

        document.addEventListener(
                "DOMContentLoaded", () => {
                    new Mmenu( "#sidemenu", {
                       "slidingSubmenus": false
                    });
                }
            );
		
	</script>

@endpush