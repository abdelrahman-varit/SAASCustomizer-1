$(function() {
    $(window).scroll(function(){ 
        if ($(this).scrollTop() > 100) { 
            $('#scrollTop').fadeIn(); 
        } else { 
            $('#scrollTop').fadeOut(); 
        } 
    }); 
    $('#scrollTop').click(function(){ 
        $("html, body").animate({ scrollTop: 0 }, 600); 
        return false; 
    });

    $("#checkout").on('change', "input[name='billing[address_id]']", function(){
        $(".address-holder .address-card").removeClass("active");
        $(this).closest(".address-card").addClass("active");
    });

    $("#checkout").on('change', "input[name='shipping_method']", function(){
        $(".shipping-methods .checkout-method-group").removeClass("active");
        $(this).closest(".checkout-method-group").addClass("active");
    });

    $("#checkout").on('change', "input[name='payment[method]']", function(){
        $(".payment-methods .checkout-method-group").removeClass("active");
        $(this).closest(".checkout-method-group").addClass("active");
    });


    // Stellarnav
	if($(".stellarnav").length) {
		$('.stellarnav').stellarNav({
			theme: 'light',
			breakpoint: 992,
			menuLabel: false,
			position: 'right'
		});
    }

	if ($(".search-name").length) {
		$(".search-name").click(function () {
			$("#search").click();
		});
	}
});


window.onload = function() {
	// Home slider
	new Swiper(".home-slider", {
		autoplay: true,
		loop: true,
		pagination: {
			el: ".home-slider .swiper-pagination",
			clickable: true
		},
	});

	// All products that are swipable
	new Swiper(".swipeable", {
		slidesPerView: 2.5,
		spaceBetween: 16,
		navigation: {
			nextEl: ".swipeable .swiper-button-next",
			prevEl: ".swipeable .swiper-button-prev",
		},
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
				slidesPerView: 5.5
			}
		}
	});


	// Recently Viewed Products
	new Swiper(".recently-viewed-products", {
		slidesPerView: 2.5,
		spaceBetween: 16,
		navigation: {
			nextEl: ".recently-viewed-products-container .swiper-button-next",
			prevEl: ".recently-viewed-products-container .swiper-button-prev",
		},
		breakpoints: {
			768: {
				slidesPerView: 3.5
			},
			992: {
				slidesPerView: 4.5
			},
			1200: {
				slidesPerView: 5.5
			}
		}
	});


	// Upselling Products
	new Swiper(".upselling-products", {
		slidesPerView: 2.5,
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
			}
		}
	});


	// Related Products
	new Swiper(".related-products", {
		slidesPerView: 2.5,
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
		}
	});
};

