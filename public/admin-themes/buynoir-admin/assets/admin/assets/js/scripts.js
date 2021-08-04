(function ( $ ) {
    
    $(document).on('click', ".menubar > li.menu-item  > a", function(e) {
        if($(this).parent().has(".buynoir-menubar-sub").length){
            //Disable click
            e.preventDefault();

            if($(this).parent().hasClass("open")) {
                //Hide clicked menu
                $(this).parent().removeClass("open");
            } else {
                //Hide all opened menu
                $(this).closest('.menubar').find(".menu-item").removeClass("open");
                //Show clicked menu
                $(this).parent().addClass("open");
            }
        }
    });

    $(document).on('click', function (e) {
        if ($(e.target).closest(".menubar").length === 0) {
            $(".menubar").find(".menu-item").removeClass("open");
        }
    });

}( jQuery ));