"use strict";

// load animation        // 重要！！！！！！！！！！！！！！！！
$(window).on('load', function(){
    $('#loading').delay(900).fadeOut(1300);
    $('#loader').delay(100).fadeOut(500);

    $('.frame-box').delay(2000).queue(function(){
        $(this).css({
            'opacity': 1
        });
    });
});


// work-slider　wordpressではphpで画像を見込むからon(load)にしないと画像を読み込むプラグインはうまくいかない
$(window).on('load', function() {
    $('.js-slider').slick({
        autoplay: true,
        infinite: true,
        speed: 500,
        autoplaySpeed: 10000,
        slidesToShow: 3,
        slidesToScroll: 1,
        prevArrow: '<div class="slick-prev">▲</div>',
        nextArrow: '<div class="slick-next">▲</div>',
        centerMode: true,
        variableWidth: true,
        dots: true,
    });


    // svg animation
    new Vivus('svg-animation-pc',//2）で付与したID名を書く
    {
    type: 'oneByOne', //1パスずつ書く
    start: 'inViewport', //ビューポート内に表示されたらスタート
    duration: 600, //速さ
    });

    new Vivus('svg-animation-md',//2）で付与したID名を書く
    {
    type: 'oneByOne', //1パスずつ書く
    start: 'inViewport', //ビューポート内に表示されたらスタート
    duration: 450, //速さ
    });
});


// 画面をリサイズしたらリロードする

var timer = 0;
var currentWidth = window.innerWidth;
$(window).resize(function(){
    if (currentWidth == window.innerWidth) {
        return;
    }
    if (timer > 0) {
        clearTimeout(timer);
    }

    timer = setTimeout(function () {
        location.reload();
    }, 200);
    
});



// scroll-event
$(function(){

    // contact-button
    $(".js-contact_button").hover(
        function(){
            $(".button_email-img.before").stop().animate({
                'left': '20rem',
                'opacity': 0
            }, 1000, 'linear');
            $(".button_email-img.after").stop().animate({
                'left': '20rem',
                'opacity': 1
            }, 1000, 'linear');
            $('.form_submit-box_inner').css('backgroundColor', 'rgb(0, 209, 0)');
        },
        function(){
            $(".button_email-img.before").stop().animate({
                'left': 0,
                'opacity': 1
            }, 50);
            $(".button_email-img.after").stop().animate({
                'left': 0,
                'opacity': 0
            }, 50);
            $('.form_submit-box_inner').css('backgroundColor', '#fff');
        }
    );

    $(".hamburger").click(function(){
        $("#top").toggleClass("active");
        $("#top").toggleClass("dnone");
    });


    let $scrollTime = 600;
    let $scroll = $(window).scrollTop();
    

    // console.log("画面の高さは" + $(window).height());


    $(window).scroll(function(){
    // btt
        if($(window).scrollTop() > $(window).height()){
            $("#btt").addClass("is-active");
        } else {
            $("#btt").removeClass("is-active");
        }

    //hamburger
        //if

        if($(window).scrollTop() >= $("#top").outerHeight(true)){
            $(".hamburger").addClass("fadeDown");

        }else{
            $(".hamburger").removeClass("fadeDown");

        }

    });




    // btt click
    $("#btt").click(function(){
        $("html, body").animate({
            scrollTop: 0,
        }, $scrollTime);
    });

    // hamburger click
    $(".hamburger").click(function(){
        $(this).toggleClass("active");
    });


    //header__nav-link click
    $(".header__nav-link").click(function(){
        $(".hamburger").removeClass("active");
        $("#top").removeClass("active");
        $("body").removeClass("active");
        $(".header").removeClass("dnone");
    });


    $('.header__nav-link').click(function () {
        var elmHash = $(this).attr('href');
        var pos = $(elmHash).offset().top-0;
        $('body,html').animate({scrollTop: pos}, 1000);
        return false;
    });



    //Button move
    function ScrollButton(button, place){
        let position = $(place).offset().top;
        $(button).click(function(){
            $("html, body").animate({
                scrollTop: position,
            }, {
                queue: false
            }, $scrollTime);
        });
    }

    ScrollButton("#header-to-about", "#about");
    ScrollButton("#header-to-service", "#service");
    ScrollButton("#header-to-work", "#work");
    ScrollButton("#header-to-contact", "#contact");

    ScrollButton("#footer-to-top", "#top");
    ScrollButton("#footer-to-about", "#about");
    ScrollButton("#footer-to-service", "#service");
    ScrollButton("#footer-to-work", "#work");
    ScrollButton("#footer-to-contact", "#contact");




        // check-animation

    gsap.to('.orange-check.no1', { //アニメーションしたい要素を指定
        scrollTrigger: {
        trigger: '.orange-check.no1',//アニメーションが始まるトリガーとなる要素
        start: 'top center',
        end: 'top -1000%',
        toggleClass: { targets: ".orange-check.no1", className: "active" },
        }
    });

    gsap.to('.orange-check.no2', { //アニメーションしたい要素を指定
        scrollTrigger: {
        trigger: '.orange-check.no2',//アニメーションが始まるトリガーとなる要素
        start: 'top center',
        end: 'top -1000%',
        toggleClass: { targets: ".orange-check.no2", className: "active" },
        }
    });

    gsap.to('.orange-check.no3', { //アニメーションしたい要素を指定
        scrollTrigger: {
        trigger: '.orange-check.no3',//アニメーションが始まるトリガーとなる要素
        start: 'top center',
        end: 'top -1000%',
        toggleClass: { targets: ".orange-check.no3", className: "active" },
        }
    });

    gsap.to('.orange-check.no4', { //アニメーションしたい要素を指定
        scrollTrigger: {
        trigger: '.orange-check.no4',//アニメーションが始まるトリガーとなる要素
        start: 'top center',
        end: 'top -1000%',
        toggleClass: { targets: ".orange-check.no4", className: "active" },
        }
    });

    // check-animation-L

    gsap.to('.orange-check-L.no1', { //アニメーションしたい要素を指定
        scrollTrigger: {
        trigger: '.orange-check-L.no1',//アニメーションが始まるトリガーとなる要素
        start: 'top center',
        end: 'top -1000%',
        toggleClass: { targets: ".orange-check-L.no1", className: "active" },
        }
    });

    gsap.to('.orange-check-L.no2', { //アニメーションしたい要素を指定
        scrollTrigger: {
        trigger: '.orange-check-L.no2',//アニメーションが始まるトリガーとなる要素
        start: 'top center',
        end: 'top -1000%',
        toggleClass: { targets: ".orange-check-L.no2", className: "active" },
        }
    });

    // scroll section-ttl fadeIn

    // パララックス

    function ttlScroll(ttl, place){
        const $window = $(window);
        const $ttl = $(ttl);
        const $place = $(place);

        $window.scroll(function(){
            let trigger_point = $place.offset().top - $window.height();
            let value = $window.scrollTop() - $place.offset().top;
            let speed = - value / 5;

            if($window.scrollTop() > trigger_point) {
                $ttl.css('transform', `translateY(${speed}%)`);
            }
        });
    }

    ttlScroll("#aboutTtl", "#about");
    ttlScroll("#serviceTtl", "#service");
    ttlScroll("#workTtl", "#work");

});



//  side scroll
jQuery(document).ready(function() {


    // wp js scroll wp
    // wp js fadein

	// skill js scroll wp
    // skill js slide
	if (window.matchMedia('(max-width: 625px)').matches) {//切り替える画面サイズ



        const listWrapper = document.querySelector('.service-box_job-content-wrapper');
        const list = document.querySelector('.side-scroll-list');

        gsap.to(list, {
            x: () => -(list.clientWidth - listWrapper.clientWidth),
            ease: 'none',
            scrollTrigger: {
                trigger: '.js-scroll-wp',
                start: 'bottom bottom',
                end: () => `+=${list.clientWidth - listWrapper.clientWidth}`,
                scrub: true,
                pin: true,
                // markers: true, // 検証用のマーカーを表示
                anticipatePin: 1,
                invalidateOnRefresh: true,
            },
        });

        const listWrapperEl = document.querySelector('.service-box_skill-content');
        const listEl = document.querySelector('.service-box_skill-content_list');

        gsap.to(listEl, {
            x: () => -(listEl.clientWidth - listWrapperEl.clientWidth),
            ease: 'none',
            scrollTrigger: {
                trigger: '.js-scroll-skill',
                start: 'top top',
                end: () => `+=${listEl.clientWidth - listWrapperEl.clientWidth}`,
                scrub: true,
                pin: true,
                // markers: true, // 検証用のマーカーを表示
                anticipatePin: 1,
                invalidateOnRefresh: true,
            },
        });

        // .service-box_skill-content_item は表示するためにactive
        $('.service-box_skill-content_item').addClass('active');

	} else {

        gsap.to('.service-box_skill-content_item', { //アニメーションしたい要素を指定
            scrollTrigger: {
            trigger: '.service-box_skill-content_list',//アニメーションが始まるトリガーとなる要素
            // end: 'top -1000%',
            toggleClass: { targets: ".service-box_skill-content_item", className: "active" },
            }
        });
	}


    // scroll Paint
    gsap.to('.paint-orange', { //アニメーションしたい要素を指定
        scrollTrigger: {
        trigger: '.paint-orange',//アニメーションが始まるトリガーとなる要素
        start: 'top center',
        toggleClass: { targets: ".paint-orange", className: "active" },
        }
    });

    gsap.to('.paint-blue', { //アニメーションしたい要素を指定
        scrollTrigger: {
        trigger: '.paint-blue',//アニメーションが始まるトリガーとなる要素
        start: 'top center',
        toggleClass: { targets: ".paint-blue", className: "active" },
        }
    });

    gsap.to('.paint-yellow', { //アニメーションしたい要素を指定
        scrollTrigger: {
        trigger: '.paint-yellow',//アニメーションが始まるトリガーとなる要素
        start: 'top center',
        // end: 'bottom 200%',
        end: 'top -1000%',
        toggleClass: { targets: ".paint-yellow", className: "active" },
        }
    });

    // scroll btt
    $(window).scroll(function(){
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


    // about-gsap

    // content wp
    gsap.to('.section__wrapper_content.about.thought', { //アニメーションしたい要素を指定
        scrollTrigger: {
        trigger: '.section__wrapper_content.about.thought',//アニメーションが始まるトリガーとなる要素
        start: 'top 75%',
        // end: 'top -1000%',
        toggleClass: { targets: ".section__wrapper_content.about.thought", className: "active" },
        }
    });


    // service-gsap

    // content wp
    gsap.to('.side-scroll-wrapper', { //アニメーションしたい要素を指定
        scrollTrigger: {
        trigger: '.side-scroll-wrapper',//アニメーションが始まるトリガーとなる要素
        start: 'top 80%',
        // end: 'top -1000%',
        toggleClass: { targets: ".side-scroll-wrapper", className: "active" },
        }
    });

    // work-gsap

    // content
    gsap.to('.section__wrapper_content.work', { //アニメーションしたい要素を指定
        scrollTrigger: {
        trigger: '.section__wrapper_content.work',//アニメーションが始まるトリガーとなる要素
        start: 'top 70%',
        end: 'top -1000%',
        // markers: true, // マーカー表示
        toggleClass: { targets: ".section__wrapper_content.work", className: "active" },
        }
    });


    // contact-gsap

    // ttl
    gsap.to('.section__wrapper_ttl.contact', { //アニメーションしたい要素を指定
        scrollTrigger: {
        trigger: '.section__wrapper_ttl.contact',//アニメーションが始まるトリガーとなる要素
        start: 'top 90%',
        end: 'top -1000%',
        toggleClass: { targets: ".section__wrapper_ttl.contact", className: "active" },
        }
    });

        // p
    gsap.to('.section__wrapper_txt.contact', { //アニメーションしたい要素を指定
        scrollTrigger: {
        trigger: '.section__wrapper_txt.contact',//アニメーションが始まるトリガーとなる要素
        start: 'top 90%',
        end: 'top -1000%',
        toggleClass: { targets: ".section__wrapper_txt.contact", className: "active" },
        }
    });

        // form
    gsap.to('.js-contact-form', { //アニメーションしたい要素を指定
        scrollTrigger: {
        trigger: '.js-contact-form',//アニメーションが始まるトリガーとなる要素
        start: 'top 90%',
        end: 'top -1000%',
        toggleClass: { targets: ".js-contact-form", className: "active" },
        }
    });

});


// svg animation
// new Vivus('svg-animation-pc',//2）で付与したID名を書く
// {
// type: 'oneByOne', //1パスずつ書く
// start: 'inViewport', //ビューポート内に表示されたらスタート
// duration: 600, //速さ
// });

// new Vivus('svg-animation-md',//2）で付与したID名を書く
// {
// type: 'oneByOne', //1パスずつ書く
// start: 'inViewport', //ビューポート内に表示されたらスタート
// duration: 450, //速さ
// });













