$(function() {

	// Stellarnav
	if($(".stellarnav").length) {
		$('.stellarnav').stellarNav({
			theme: 'light',
			breakpoint: 992,
			menuLabel: false,
			position: 'right'
		});
	}


	// Toggle Password View
	if($(".input-group-password").length) {
		$(".input-group-password").find(".btn").click(function() {
			let elem = $(this).parent().find("input");
			elem.attr("type", elem.attr("type") === "password" ? "text" : "password");
			$(this).parent().toggleClass("active");
		});
	}


	// ScrollTop
	if ($("#scrollTop").length) {
		$(window).scroll(function () {
			if ($(this).scrollTop() > 100) {
				$("#scrollTop").addClass("active");
			} else {
				$("#scrollTop").removeClass("active");
			}
		});	
	}


	// Home slider
	if ($(".home-slider").length) {
		new Swiper(".home-slider", {
			autoplay: true,
			loop: true,
			pagination: {
				el: ".home-slider .swiper-pagination",
				clickable: true
			},
		});
	}
	

	// All products that are swipable
	if ($(".swipeable").length) {
		new Swiper(".swipeable", {
			slidesPerView: 1.5,
			spaceBetween: 16,
			breakpoints: {
				576: {
					slidesPerView: 2.5
				},
				768: {
					slidesPerView: 3.5
				},
				992: {
					slidesPerView: 4.5
				},
				1200: {
					slidesPerView: 5
				}
			}
		});
	}
	

	// Recently Viewed Products
	if ($(".recently-viewed-products").length) {
		new Swiper(".recently-viewed-products", {
			slidesPerView: 1.5,
			spaceBetween: 16,
			navigation: {
				nextEl: ".recently-viewed-products .swiper-button-next",
				prevEl: ".recently-viewed-products .swiper-button-prev",
			},
			breakpoints: {
				768: {
					slidesPerView: 3.5
				},
				992: {
					slidesPerView: 4
				},
				1200: {
					slidesPerView: 5
				}
			}
		});
	}
	

	// Upselling Products
	if ($(".upselling-products").length) {
		new Swiper(".upselling-products", {
			slidesPerView: 1.5,
			spaceBetween: 16,
			navigation: {
				nextEl: ".upselling-products .swiper-button-next",
				prevEl: ".upselling-products .swiper-button-prev",
			},
			breakpoints: {
				768: {
					slidesPerView: 3.5
				},
				992: {
					slidesPerView: 4
				},
				1200: {
					slidesPerView: 5
				}
			}
		});
	}
	

	// Related Products
	if ($(".related-products").length) {
		new Swiper(".related-products", {
			slidesPerView: 1.5,
			spaceBetween: 16,
			navigation: {
				nextEl: ".related-products .swiper-button-next",
				prevEl: ".related-products .swiper-button-prev",
			},
			breakpoints: {
				768: {
					slidesPerView: 3.5
				},
				992: {
					slidesPerView: 4
				},
				1200: {
					slidesPerView: 5
				}
			}
		});
	}
	

	// Related Products
	if ($(".xzoom-thumbs-container").length) {
		new Swiper(".xzoom-thumbs-container", {
			slidesPerView: 5,
			spaceBetween: 8,
			navigation: {
				nextEl: ".xzoom-thumbs-container .swiper-button-next",
				prevEl: ".xzoom-thumbs-container .swiper-button-prev",
			},
			breakpoints: {
				768: {
					slidesPerView: 7
				},
				992: {
					slidesPerView: 4
				},
				1200: {
					slidesPerView: 5
				}
			}
		});
	}

	//Quantity Increment
	if ($(".qty-increment").length) {
		$(".qty-increment").click(function () {
			let field = $(this).parent().find(".form-control"),
				currentVal = Number(field.val());
			if (currentVal >= 0) {
				field.val(currentVal + 1);
			}
		});
	}

	
	//Quantity Decrement
	if ($(".qty-decrement").length) {
		$(".qty-decrement").click(function () {
			let field = $(this).parent().find(".form-control"),
				currentVal = Number(field.val());
			if (currentVal > 0) {
				field.val(currentVal - 1);
			}
		});
	}

	//Range slider
	if ($(".range_slider").length) {
		$( ".range_slider" ).slider({
			range: true,
			min: 0,
			max: Number($(".range_slider").attr("data-rs-max")),
			values: [ Number($(".range_slider_min").val()), Number($(".range_slider_max").val()) ],
			slide: function( event, ui ) {
				$(".range_slider_min").val("$" + ui.values[0]);
				$(".range_slider_max").val("$" + ui.values[1]);
			}
		});

		$(".range_slider_min").val("$" + $(".range_slider").slider( "values", 0 ));
		$(".range_slider_max").val("$" + $(".range_slider").slider( "values", 1 ));
	}


	//Product Categories in Sidebar
	if ($(".widget .categories").length && $(window).width() < 992) {
		$(".widget .categories ul li").each(function () {
			let li = $(this);
			if (li.find('> ul').length) {
				li.find('> a').click(function (e) {
					e.preventDefault();
					li.find('> ul').show();
				});
			}
		});
	}

	//Rating
	if ($(".review_rating").length) {
		$(".review_rating").rate({
			step_size: 1,
			symbols: {
				fontawesome_star: {
					base: '<i class="far fa-star text-warning"></i>',
					hover: '<i class="fas fa-star text-warning"></i>',
					selected: '<i class="fas fa-star text-warning"></i>',
				},
			},
			selected_symbol_type: 'fontawesome_star',
			convert_to_utf8: false,
			cursor: 'pointer',
		});
		$(".review_rating").on("change", function (ev, data) {
			$(this).parent().find("input[type='hidden']").val(data.to);
		});
	}

	//xzoom
	if ($(".xzoom").length) {
		$('.xzoom, .xzoom-gallery').xzoom({
			Xoffset: 15,
			zoomWidth: 500,
			tint: "#000"
		});
	}

});