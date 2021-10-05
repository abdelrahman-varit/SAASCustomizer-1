<div class="stellarnav">
	<ul>
		<li>
			<button class="btn btn-black btn-all"><i class="fas fa-list me-2"></i> Shop By Category</button>
			@php
				$categories = [];
				foreach (app('Webkul\Category\Repositories\CategoryRepository')->getVisibleCategoryTree(core()->getCurrentChannel()->root_category_id) as $category) {
				    if ($category->slug)
				        array_push($categories, $category);
				}
			@endphp

			<ul>
				@if(count($categories) > 0)
					@foreach($categories as $category)
							@php						
								$sub_categories = [];
								foreach (app('Webkul\Category\Repositories\CategoryRepository')->getVisibleCategoryTree($category->id) as $sub_category) {
									if ($sub_category->slug)
										array_push($sub_categories, $sub_category);
								}
							@endphp

							@if(count($sub_categories) > 0)
								<li>
									<a href="/{{$category->url_path}}">{{$category->name}}</a>
									<ul>
										@foreach($sub_categories as $sub_category)
											<li><a href="/{{$sub_category->url_path}}">{{$sub_category->name}}</a></li>
										@endforeach
									</ul>
								</li>							
							@else
								<li><a href="/{{$category->url_path}}">{{$category->name}}</a></li>
							@endif
					
					@endforeach
				@else
					<li>
						<a href="/">Demo Category 01</a>
						<ul>
							<li><a href="/">Demo Sub Category 1</a></li>
							<li><a href="/">Demo Sub Category 2</a></li> 
						</ul>
					</li>
					<li><a href="/">Demo Category 02</a></li>
				@endif
			</ul>
		</li>
	</ul>
</div>