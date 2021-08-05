(function ( $ ) {
    
    $(document).on('click', ".menubar a", function(e) {
        let link = $(this),
            closest_ul = link.closest("ul"),
            parallel_active_links = closest_ul.find(".active"),
            closest_li = link.closest("li"),
            link_status = closest_li.hasClass("active"),
            count = 0;
        
        if (closest_li.find("ul").length) {
            e.preventDefault();
        }
        
        closest_ul.find("ul").slideUp(function () {
            if (++count == closest_ul.find("ul").length) {
                parallel_active_links.removeClass("active");
            }
        });
        
        if (!link_status) {
            closest_li.children("ul").slideDown();
            closest_li.addClass("active");
        }
    });

    $(document).mouseup(function(e) {
        let container = $(".buynoir-navbar-left, .buynoir-navbar-toggler");
        if (!container.is(e.target) && container.has(e.target).length === 0 && $(window).width() < 992) {
            $('body').removeClass('sidebar-toggle');
        }
    });
    

}( jQuery ));