<?php

$categories = [];

foreach (app('Webkul\Category\Repositories\CategoryRepository')->getVisibleCategoryTree(core()->getCurrentChannel()->root_category_id) as $category) {
    if ($category->slug)
        array_push($categories, $category);
}

?>

<div class="nav-container">
    <nav class="all-category-nav">
      <label class="open-menu-all" for="open-menu-all">
        <input class="input-menu-all" id="open-menu-all" type="checkbox" name="menu-open" checked />
        <span class="all-navigator"><i class="fas fa-bars"></i> <span>All category</span> <i class="fas fa-angle-down"></i>
          <i class="fas fa-angle-up"></i>
        </span>

        <ul class="all-category-list">

        	@foreach($categories as $category)
        		{{-- {{dd($category->name)}} --}}
        		
        			{{-- <li class="all-category-list-item">
        				<a href="{{$category->slug}}" class="all-category-list-link">{{$category->name}}</a>
        			</li>
 --}}

 				<?php

						$sub_categories = [];

						foreach (app('Webkul\Category\Repositories\CategoryRepository')->getVisibleCategoryTree($category->id) as $sub_category) {
						    if ($sub_category->slug)
						        array_push($sub_categories, $sub_category);
						}

					?>

        		<li class="all-category-list-item">
        			<a href="{{$category->slug}}" class="all-category-list-link">
						{{$category->name}}

						@if(count($sub_categories) > 0)
						<i class="icon arrow-right-icon"></i>
						@endif
					</a>

					

					@if(count($sub_categories) > 0)
						<div class="category-second-list">

							
							<ul class="category-second-list-ul">
								@foreach($sub_categories as $sub_category)
									<li class="category-second-item"><a href="https://www.cupcom.com.br/">{{$sub_category->name}}</a></li>
								@endforeach
							</ul>

						</div>
					@endif
				</li>

        		


	          

          	@endforeach

        </ul>
      </label>

    </nav>
</div>


@push('css')

	<style type="text/css">
		.container .nav-content .nav-content-list {
		  align-items: center;
		  display: flex;
		  justify-content: space-between;
		  padding: 0 15px;
		}
		.container .nav-content .nav-content-list .nav-content-item {
		  align-items: center;
		  display: flex;
		  height: 40px;
		  margin: 0 5px;
		  position: relative;
		  transition: 100ms all linear 0s;
		}
		@media (max-width: 991px) {
		  .container .nav-content .nav-content-list .nav-content-item {
		    padding: 0 5px;
		  }
		}
		.container .nav-content .nav-content-list .nav-content-item .item-arrow {
		  margin-left: 5px;
		  position: relative;
		  top: -3px;
		}
		@media (max-width: 768px) {
		  .container .nav-content .nav-content-list .nav-content-item .item-arrow {
		    display: none;
		  }
		}
		.container .nav-content .nav-content-list .nav-content-item .open-menu-login-account {
		  align-items: center;
		  cursor: pointer;
		  display: flex;
		  position: relative;
		}
		.container .nav-content .nav-content-list .nav-content-item .input-menu {
		  display: none;
		}
		.container .nav-content .nav-content-list .nav-content-item .input-menu:checked ~ .login-list {
		  display: block;
		}
		.container .nav-content .nav-content-list .nav-content-item .login-list {
		  background: #fff;
		  border-bottom: 3px solid #545bc4;
		  border-radius: 3px;
		  /*box-shadow: 2px 9px 49px -17px rgba(0, 0, 0, 0.3);*/
		  display: none;
		  overflow: hidden;
		  position: absolute;
		  right: 0;
		  top: 28px;
		  transition: 100ms all linear 0s;
		  width: 200px;
		  z-index: 10;
		}
		.container .nav-content .nav-content-list .nav-content-item .login-list .login-list-item {
		  padding: 15px 20px;
		}
		.container .nav-content .nav-content-list .nav-content-item .login-list .login-list-item:hover {
		  background: #545bc4;
		}
		.container .nav-content .nav-content-list .nav-content-item .login-list .login-list-item:hover a {
		  color: #000;
		}
		.container .nav-content .nav-content-list .nav-content-item:nth-child(2):hover .fas {
		  color: #e74c3c;
		}
		.container .nav-content .nav-content-list .nav-content-item:hover .fas {
		  color: #545bc4;
		}
		.container .nav-content .nav-content-list .account-login .login-text {
		  align-items: end;
		  display: flex;
		  flex-direction: column;
		  font-size: 13px;
		  margin-left: 5px;
		}
		@media (max-width: 991px) {
		  .container .nav-content .nav-content-list .account-login .login-text {
		    display: none;
		  }
		}
		.container .nav-content .nav-content-list .account-login .login-text strong {
		  display: block;
		}
		.container .nav-content .nav-content-list .nav-content-link {
		  border-radius: 3px;
		  font-size: 13px;
		  padding: 10px 15px;
		  transition: 100ms all linear 0s;
		}
		@media (max-width: 991px) {
		  .container .nav-content .nav-content-list .nav-content-link {
		    padding: 0;
		  }
		}

		.nav-container {
		  align-items: center;
		  display: flex;
		  margin: 0 auto;
		  max-width: 1300px;
		  width: 100%;
		}
		.nav-container .nav-row {
		  align-items: center;
		  display: flex;
		  height: 40px;
		  justify-content: space-between;
		  margin: 0;
		  padding: 0;
		}
		@media (max-width: 991px) {
		  .nav-container .nav-row {
		    display: none;
		  }
		}
		.nav-container .nav-row .nav-row-list {
		  flex: auto;
		}
		.nav-container .nav-row .nav-row-list .nav-row-list-link {
		  align-items: center;
		  display: flex;
		  height: 40px;
		  justify-content: center;
		  transition: 100ms all linear 0s;
		}
		.nav-container .nav-row .nav-row-list .nav-row-list-link:hover {
		  background: #e1e1e1;
		  color: #000;
		  width: 100%;
		}
		.nav-container .featured-category {
		  flex: auto;
		  margin: 0 15px 0 0;
		}
		@media (max-width: 991px) {
		  .nav-container .featured-category {
		    display: none;
		  }
		}
		.nav-container .all-navigator {
		  align-items: center;
		  background: #000;
		  color: #fff;
		  display: flex;
		  height: 40px;
		  padding: 0 25px;
		  width: 100%;
		}
		@media (max-width: 991px) {
		  .nav-container .all-navigator {
		    margin-right: 0;
		  }
		}
		.nav-container .all-navigator .fa-angle-up,
		.nav-container .all-navigator .fa-angle-down {
		  position: absolute;
		  right: 25px;
		}
		.nav-container .all-navigator .fa-angle-up {
		  display: none;
		}
		.nav-container .all-navigator .fas {
		  font-size: 13px;
		  margin-right: 0;
		}
		.nav-container .all-navigator span {
		  margin-left: 15px;
		}
		.nav-container .all-category-nav {
		  cursor: pointer;
		  max-width: 300px;
		  position: relative;
		  width: 100%;
		}
		@media (max-width: 991px) {
		  .nav-container .all-category-nav {
		    max-width: 100%;
		  }
		}
		.nav-container .all-category-nav .open-menu-all {
		  align-items: center;
		  cursor: pointer;
		  display: flex;
		  position: relative;
		}
		.nav-container .all-category-nav .input-menu-all {
		  display: none;
		}
		.nav-container .all-category-nav .input-menu-all:checked ~ .all-category-list {
		  display: block;
		}
		.nav-container .all-category-nav .input-menu-all:checked + .all-navigator .fa-angle-down {
		  display: none;
		}
		.nav-container .all-category-nav .input-menu-all:checked + .all-navigator .fa-angle-up {
		  display: block;
		}
		.nav-container .all-category-list {
		  background: #fff;
		  color: #000;
		  border-bottom: 3px solid #e1e1e1;
		  /*box-shadow: 2px 9px 49px -17px rgba(0, 0, 0, 0.3);*/
		  display: none;
		  height: auto;
		  min-height: 327px;
		  padding: 15px 0;
		  position: absolute;
		  top: 40px;
		  width: 100%;
		  z-index: 90;
		  font-size: 14px;
		}
		@media (max-width: 991px) {
		  .nav-container .all-category-list {
		    min-width: 100%;
		  }
		}
		.nav-container .all-category-list-item:hover {
		  display: block;
		  background: #e1e1e1;
		}
		.nav-container .all-category-list-item:hover .category-second-list {
		  left: 100%;
		  opacity: 1;
		  visibility: visible;
		}
		.nav-container .all-category-list-item:hover .all-category-list-link {
		  color: #000;
		}
		.nav-container .all-category-list-link {
		  align-items: center;
		  display: flex;
		  justify-content: space-between;
		  padding: 15px;
		  transition: 100ms all linear 0s;
		  color: #000;
		}
		.nav-container .category-second-list {
		  background: #fff;
		  border-bottom: 3px solid #545bc4;
		  /*box-shadow: inset 44px -1px 88px -59px rgba(0, 0, 0, 0.37);*/
		  display: flex;
		  height: 322px;
		  left: 80%;
		  min-height: 297px;
		  min-width: 400px;
		  opacity: 0;
		  position: absolute;
		  top: 0;
		  transition: 100ms all linear 0s;
		  visibility: hidden;
		  width: auto;
		}
		@media (max-width: 991px) {
		  .nav-container .category-second-list {
		    display: none;
		  }
		}
		.nav-container .category-second-list .img-product-menu img {
		  max-width: 180px;
		}
		.nav-container .category-second-list-ul {
		  display: flex;
		  flex-direction: column;
		  min-width: 400px;
		  padding: 0 15px;
		}
		.nav-container .category-second-item a {
		  align-items: center;
		  display: flex;
		  justify-content: space-between;
		  padding: 15px;
		  color: #000;
		}
		.nav-container .category-second-item:hover {
		  background: #e1e1e1;
		}
		.nav-container .category-second-item:hover a {
		  color: #000;
		}
	</style>

@endpush

@push('scripts')
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script type="text/javascript">
		$('.sub-menu ul').hide();
		$(".sub-menu a").click(function () {
			$(this).parent(".sub-menu").children("ul").slideToggle("100");
			$(this).find(".right").toggleClass("fa-caret-up fa-caret-down");
		});
	</script>

@endpush