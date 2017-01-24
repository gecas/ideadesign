/**
 * Created by Matas on 2016-07-15.
 */


$( document ).ready(function() {
    var title = $(".inner_title").text();

    title = title.trim(title);

    $(".inner_menu_items li").each(function( index ) {

        var value =  $(this).children();
        value  = $.trim(value.text());

        if(title == value){
            $(this).addClass("active");

            $(this).children().css("color","white")

        }
    });



});


