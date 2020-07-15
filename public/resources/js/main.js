function Helper() {
    var methods = this;

    methods.initSlickSlider = function () {
        if ($('.regular1').length) {
            $('.regular1').on('init', function (event, slick) {
                $('.navbar-category .category').css('min-height', $('.regular1').height());
            });
            $(window).on('resize', function () {
                $('.navbar-category .category').css('min-height', $('.regular1').height());
            })
        }

        $(".regular1").not('slick-initialized').slick({
            dots: true,
            infinite: true,
            speed: 900,
            prevArrow: false,
            nextArrow: false,
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            responsive: [
                {
                    breakpoint: 1199,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }

            ]
        })

        $(".regular2").not('slick-initialized').slick({
            dots: false,
            infinite: false,
            speed: 900,
            prevArrow: '<button class="fa fa-angle-left"></button>',
            nextArrow: '<button class="fa fa-angle-right"></button>',
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            responsive: [
                {
                    breakpoint: 1199,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }

            ]
        });

        $(".regular3").not('slick-initialized').slick({
            dots: false,
            infinite: false,
            speed: 900,
            prevArrow: false,
            nextArrow: false,
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            responsive: [
                {
                    breakpoint: 1199,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }

            ]
        });

        $(".regular4").not('slick-initialized').slick({
            dots: false,
            infinite: false,
            speed: 900,
            prevArrow: '<button class="fa fa-angle-left"></button>',
            nextArrow: '<button class="fa fa-angle-right"></button>',
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            responsive: [
                {
                    breakpoint: 1199,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }

            ]
        });

    }


    methods.initToTop = function () {
        $(window).scroll(function () {
            if ($(this).scrollTop() >= 50) {
                $('#top').fadeIn("fast");
            } else {
                $('#top').fadeOut("fast");
            }
        });
        $('#top').click(function () {
            $('body,html').animate({
                scrollTop: 0
            }, 500);
        });
    }


    methods.initFixTop = function () {
        jQuery(function ($) {
            function fixDiv() {
                if ($(window).width() > 992) {
                    var $cache = $('#scroll');
                    var $addget = $('#fixedmobile');
                    if ($(window).scrollTop() > 194) {
                        // $('#fixed-mobile').removeClass('fix-mobile-ipad');
                        $cache.addClass('getFixed-1');

                    }
                    else {
                        // $('#fixedmobile').addClass('fix-mobile-ipad');
                        $cache.removeClass('getFixed-1');
                    }
                }
            }

            $(window).scroll(fixDiv);
            fixDiv();
            $(window).resize(function () {
                fixDiv();
            });
        });
    }

    methods.initMenu = function () {
        var open = false;
        $('#btn-toggle').on('click', function () {
            if (open) {
                $('#menu').removeClass('open');
                $('#btn-toggle').removeClass('active');
                $('body').removeClass('menu-open');
            } else {
                $('#menu').addClass('open');
                $('#btn-toggle').addClass('active');
                $('body').addClass('menu-open');
            }
            open = !open;
        });
        $('body, html').on('click', function (event) {
            var target = $(event.target);
            if (!target.is('#menu , #menu * ,#btn-toggle ,#btn-toggle *, .header-mid, .header-mid *')) {
                $('#menu').removeClass('open');
                $('#btn-toggle').removeClass('active');
                $('body').removeClass('menu-open');
                open = false;
            }
        });
        $('#menu .has-submenu .icon-first-submenu').on('click', function (event) {
            event.preventDefault();
            var parent = $(this).parents('.has-submenu');
            $('#menu .has-submenu').not(parent).removeClass('open').find('.submenu-1').slideUp()
            $('#menu .has-submenu').not(parent).find('.has-second-submenu').removeClass('open');
            $('#menu .has-submenu').not(parent).find('.second-submenu').slideUp();
            parent.toggleClass('open').find('.submenu-1').slideToggle();
        });
        $('#menu .has-second-submenu .icon-second-submenu').on('click', function (event) {
            event.preventDefault();
            var parent = $(this).parents('.has-second-submenu');
            $('#menu .has-second-submenu').not(parent).removeClass('open').find('.submenu-2').slideUp();
            parent.toggleClass('open').find('.submenu-2').slideToggle();
        });
    }

    methods.initSocial = function () {
        $("#share").jsSocials({
            showLabel: false,
            showCount: false,
            shares: ["twitter", "facebook", "googleplus", "linkedin", "pinterest"]
        });
    }

    methods.initCategories = function () {
        $('.category-news .has-submenu .icon-first-submenu').on('click', function (event) {
            event.preventDefault();
            var parent = $(this).parents('.has-submenu');
            $('.category-news .has-submenu').not(parent).removeClass('open').find('.submenu-1').slideUp()
            $('.category-news .has-submenu').not(parent).find('.has-second-submenu').removeClass('open');
            $('.category-news .has-submenu').not(parent).find('.second-submenu').slideUp();
            parent.toggleClass('open').find('.submenu-1').slideToggle();
        });
        $('.category-news .has-second-submenu .icon-second-submenu').on('click', function (event) {
            event.preventDefault();
            var parent = $(this).parents('.has-second-submenu');
            $('.category-news .has-second-submenu').not(parent).removeClass('open').find('.submenu-2').slideUp();
            parent.toggleClass('open').find('.submenu-2').slideToggle();
        });
    }

    methods.initTooltip = function () {
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
    }

    methods.initSlickProduct = function () {
        $('.product-img').not('slick-initialized').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            prevArrow: false,
            nextArrow: false,
            fade: true,
            asNavFor: '.product-nav'
        });
        $('.product-nav').not('slick-initialized').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            asNavFor: '.product-img',
            dots: false,
            focusOnSelect: true,
            swipe: false,
            infinite: true,
            adaptiveHeight: true,
            prevArrow: '<button class="fa fa-angle-left"></button>',
            nextArrow: '<button class="fa fa-angle-right"></button>',
            centerMode: true,
            responsive: [
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 5,
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 3,
                    }
                },
            ]
        });
        $('#myModalSaveProduct').on('shown.bs.modal', function () {
            $('#myModalSaveProduct').find('.slick-slider').slick('setPosition');
        })
    }

    methods.initCountNumber = function () {
        $(document).on('click', '.custom-input-number .cin-increment', function (e) {
            var $input = $(this).siblings('.cin-input'),
                val = parseInt($input.val()),
                max = parseInt($input.attr('max')),
                step = parseInt($input.attr('step'));
            var temp = val + step;
            $input.val(temp <= max ? temp : max);
            console.log(temp);
        });
        $(document).on('click', '.custom-input-number .cin-decrement', function (e) {
            var $input = $(this).siblings('.cin-input'),
                val = parseInt($input.val()),
                min = parseInt($input.attr('min')),
                step = parseInt($input.attr('step'));
            var temp = val - step;
            $input.val(temp >= min ? temp : min);
            console.log(temp);
        });
    }

    methods.initCheckout = function () {
        $('.not-account').on('click', function () {
            $('.show-regis').slideUp();
            $('.show-login').slideUp();
        })
        $('.create-account').on('click', function () {
            $('.show-login').slideUp();
            $('.show-regis').slideDown();
        })
        $('.not-account-1').on('click', function () {
            $('.show-regis').slideUp();
            $('.show-login').slideDown();
        })

        $('.title-1').on('click', function () {
            $(this).siblings('ul').slideToggle(300);
            $(this).find('.fa-plus').toggleClass('fa-minus');
        });
    }
    methods.slider = function () {
        $('.blog-partner').slick({
            infinite: true,
            speed: 600,
            autoplaySpeed: 3000,
            autoplay: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            margin: 20,
            dots: false,
        });
    }
    methods.initTuan = function () {
        $('.socical-tuan').slick({
            infinite: true,
            speed: 600,
            autoplaySpeed: 3000,
            autoplay: true,
            slidesToShow: 4,
            slidesToScroll: 1,
            margin: 20,
            dots: false,
            responsive: [
                {
                    breakpoint: 1199,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                }

            ]
        });
    }
    methods.activeMenu = function(){
        var current = location.pathname;
        console.log(current)
        $('#menu li a').each(function(){
            var $this = $(this);
            var fullName = '/thanhlat/'+$this.attr('href')
            if(fullName.indexOf(current) !== -1){
                $this.parent().addClass('active');
            }
        })
    }


    methods.init = function () {
        methods.initToTop();
        methods.initFixTop();
        methods.initMenu();
        //methods.initSlickSlider();
        methods.initSocial();
        methods.initCategories();
        methods.initTooltip();
        methods.initSlickProduct();
        methods.initCountNumber();
        methods.initCheckout();
        methods.slider();
        methods.initTuan();
        methods.activeMenu();
    }

    return methods;
}

$(function () {
    var helper = new Helper();
    helper.init();
})