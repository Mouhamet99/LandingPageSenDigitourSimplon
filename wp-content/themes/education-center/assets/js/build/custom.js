jQuery(document).ready(function ($) {
    //Header Search form show/hide
    $('.header-search .search').click(function () {
        $(".header-search-inner").slideToggle();
        return false;
    });
    $('html').click(function() {
        $('.header-search-inner').slideUp();
    });

    $('.header-search-inner').click(function(event) {
        event.stopPropagation();
    });

    $('.toggle-btn').click(function (e) {
        e.stopPropagation();
        $(this).toggleClass('open');
        $('.menu-container-wrapper').toggleClass('open');
        $('body').toggleClass('site-toggled');
    });
    
    document.addEventListener("click", function(event) {
        // If user clicks inside the element, do nothing
        if (event.target.closest(".menu-container-wrapper")) return;
        // If user clicks outside the element, hide it!
        $('body').removeClass('site-toggled');
        $('.menu-container-wrapper').removeClass('open');
    });

    //mobile-menu
    $('<button class="angle-down"> </button>').insertAfter( $(".main-navigation.mobile-navigation ul .menu-item-has-children > a"));
    $('.main-navigation.mobile-navigation ul li .angle-down').on('click', function () {
        $(this).next().slideToggle();
        $(this).toggleClass('active');
    });

    //accessibility
    $('.menu li a, .menu li').on('focus', function() {
        $(this).parents('li').addClass('focus');
    }).blur(function() {
        $(this).parents('li').removeClass('focus');
    });

    $("#menu-opener").on('click', function () {
        $("body").addClass("menu-open");
        $(".mobile-menu-wrapper .primary-menu-list").addClass("toggled");
    });
    
    $(".mobile-menu-wrapper .close-main-nav-toggle ").on('click', function () {
    $("body").removeClass("menu-open");
    $(".mobile-menu-wrapper .primary-menu-list").removeClass("toggled");
    });  
    
    $("div.tutor-full-width-student-profile").parent('.site-content').prev('.breadcrumb-wrapper').addClass( "screen-reader-text" );

});