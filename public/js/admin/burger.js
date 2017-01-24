$('document').ready(function () {

    var trigger = $('#hamburger'),
        isClosed = true;

    trigger.click(function () {
        burgerTime();
    });


    function burgerTime() {
        if (isClosed == true) {
            trigger.removeClass('is-open');
            trigger.addClass('is-closed');
            isClosed = false;
            $( ".inner_menu_items" ).slideToggle( "slow", function() {
                $( ".hamburger" ).hide();
                $( ".cross" ).show();
            });

        } else {
            $( ".inner_menu_items" ).slideToggle( "slow", function() {

            });
            trigger.removeClass('is-closed');
            trigger.addClass('is-open');
            isClosed = true;
        }
    }

    if ((screen.width<=1200)) {
        burgerTime();
         $(".inner_menu_items").hide();
    }
});