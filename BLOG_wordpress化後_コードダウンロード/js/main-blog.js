"use strict";


$(window).scroll(function(){
    

    
    
    
});


$(function(){

    // scroll btt
    $(window).scroll(function(){

        // btt slide-in
        if($(window).scrollTop() > $(window).height()){
            $("#btt").addClass("is-active");
        } else {
            $("#btt").removeClass("is-active");
        }

        let trigger_ponint_btt =  $('#footer').offset().top - $(window).height();

        if($(window).scrollTop() > trigger_ponint_btt){
            $('#btt.is-active').css({
                "bottom": $(window).scrollTop() + $(window).height() - $('#footer').offset().top + 10,
                "transition": "0s"
            });
        }else{
            $('#btt.is-active').css({
                "bottom": '20px',
                "transition": "0.4s"
            });
        }
    });

    let $scrollTime = 600;

    // btt click
    $("#btt").click(function(){
        $("html, body").animate({
            scrollTop: 0,
        }, $scrollTime);
    });

    $(".menu-blog-open").click(function(){
        $(".menu-blog-hidden").toggleClass("is-active");
    });

    $(".menu-blog-close").click(function(){
        $(".menu-blog-hidden").toggleClass("is-active");
    });

});