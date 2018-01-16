$(document).ready(function() {

    $(".header-link-dropdown").mouseover(function() {
        $(".dropdown").addClass("dropped");
    });

    $(".header-link-dropdown").mouseleave(function() {
        if ($(".dropdown").hasClass("dropped")) {
            $(".dropdown").removeClass("dropped");
        }
    });

    $("#collapsible-icon").click(function() {
       if (!($("#navigation").hasClass("responsive"))) {
           $("#navigation").addClass("responsive");
       }
       else {
           $("#navigation").removeClass("responsive");
       }
    });

    $('[class*="header-link"]').click(function() {
        $(this).children()[0].click();
    });

});
