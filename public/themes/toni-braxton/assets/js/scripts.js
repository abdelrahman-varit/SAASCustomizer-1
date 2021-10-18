$(document).ready(function(){ 
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


    if($(".featured-heading .ftitle").length) {
        $(".featured-heading .ftitle").each(function(index, elem) {
            let oldTitle = elem.innerHTML; // Hello My Shop
            let newTitle1 = oldTitle.substr(0, oldTitle.indexOf(' ')); //Hello
            let newTitle2 = oldTitle.substr(oldTitle.indexOf(' ')+1); // My Shop
            elem.innerHTML = newTitle1 + "<span>" + newTitle2 + "</span>";
        });
    }
    

    if($(".product-card").length) {
        $(".product-card").each(function(index, elem) {
            $(elem).find(".sticker.sale").prependTo($(elem));
        });
    }


    if($(".stellarnav").length) {
		$('.stellarnav').stellarNav({
			theme: 'light',
			breakpoint: 992,
			menuLabel: false,
			position: 'right'
		});
    }


});