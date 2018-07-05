// #######################################################
// ----------------			СЛАЙДЕР				--------------------
// #######################################################

function mySlider(sliderBlock, style) {
    var container = $(sliderBlock);
    var slides = container.find('.slider').first().children('li');
    var activeSlide = slides.eq(0);
    var prev = container.find('.prev');
    var next = container.find('.next');
    var dot__item = container.find('.dot__item');
    var index = 0;
    var imgTmp = $('.img__tmp');
    var style = style;
    var check = false;
    var name = $('.main .master__name');

    slides.not(activeSlide).hide();
    name.html(activeSlide.find('.master__data').html());

    if(style == "irregular") {
        if(slides.length < 10)
            container.find('.container__slider__number span:last-child').html('/0' + slides.length);
        else container.find('.container__slider__number span:last-child').html('/' + slides.length);
    }

    function initialButton(button, direction, slide_number) {
        button.on("click", function(event) {
            var $this = $(this);

            if(style == "dotted" && !check) {
                check = true;
                if(direction == "right") {
                    if(index+1 == $(container).find('li').length)
                        imgTmp.html(slides.eq(0).find('.container__img').html());
                    else imgTmp.html(slides.eq(index+1).find('.container__img').html());
                }
                else if(direction == "left") {
                    if(index == 0)
                        imgTmp.html(slides.eq($(container).find('li').length-1).find('.container__img').html());
                    else imgTmp.html(slides.eq(index-1).find('.container__img').html());
                }
                imgTmp.show();

                activeSlide.find('h3').addClass('textSlideUpHide1');
                activeSlide.find('.btn').addClass('blockSlideLeft');
                activeSlide.find('.container__slide__img').addClass('blockSlideLeft');
                activeSlide.find('.container__img img').addClass('imageSlide');

                setTimeout(function() {
                    activeSlide.find('.text--italic').addClass('textSlideUpHide1');
                }, 100);
                setTimeout(function() {
                    activeSlide.find('h3').css({visibility: "hidden"});
                    activeSlide.find('p').addClass('textSlideUpHide1');
                }, 185);

                setTimeout(function() {
                    activeSlide.find('.text--italic').css({visibility: "hidden"});
                }, 250);

                activeSlide.find('h3').removeClass('textSlideUpShowSmall');
                activeSlide.find('p').removeClass('textSlideUpShowLarge');
                activeSlide.find('.btn').removeClass('blockSlideRight');
                activeSlide.find('.container__slide__img').removeClass('blockSlideRight');

                setTimeout(function() {
                    activeSlide.find('h3').removeClass('textSlideUpHide1');
                    activeSlide.find('p').removeClass('textSlideUpHide1');
                    activeSlide.find('.text--italic').removeClass('textSlideUpHide1');
                    activeSlide.find('.btn').removeClass('blockSlideLeft');
                    activeSlide.find('.container__slide__img').removeClass('blockSlideLeft');
                    activeSlide.find('.container__img img').removeClass('imageSlide');
                    activeSlide.hide();

                    dot__item.removeClass('dot__item--active');
                    if (!slide_number) {
                        if(direction == "right") {
                            if(index == $(container).find('.slider').children('li').length - 1 )
                                index = 0;
                            else
                                index += 1;
                        }
                        else if(direction == "left") {
                            if(index == 0)
                                index = $(container).find('.slider').children('li').length - 1;
                            else
                                index -= 1;
                        }
                    } else {
                        index = $this.data('id');
                    }
                    $('.dot__item--' + index, container).addClass('dot__item--active');

                    activeSlide = container.find('.slider').children('li').eq(index);
                    activeSlide.fadeIn();
                    name.html(activeSlide.find('.master__data').html());
                    activeSlide.find('p').css({
                        visibility: "hidden"
                    });
                    activeSlide.find('h3').css({
                        visibility: "hidden"
                    });
                    activeSlide.find('.btn').hide();

                    if(index < 9)
                        container.find('span:first-child').html('0' + (index+1));
                    else container.find('span:first-child').html(index+1);
                },300);

                setTimeout(function() {
                    activeSlide.find('p').not('.text--italic').css({
                        visibility: "visible"
                    });
                    activeSlide.find('.btn').show();
                    activeSlide.find('p').not('.text--italic').addClass('textSlideUpShowLarge');
                    activeSlide.find('.btn').removeClass('blockSlideRight');
                    activeSlide.find('.btn').addClass('blockSlideRight');
                    activeSlide.find('.container__slide__img').addClass('blockSlideRight');

                    scrollable_height(activeSlide.closest('.scroll-box'), 58);
                },350);

                setTimeout(function() {
                    activeSlide.find('.text--italic').css({
                        visibility: "visible"
                    });
                    activeSlide.find('.text--italic').addClass('textSlideUpShow');
                }, 450);
                setTimeout(function() {
                    activeSlide.find('h3').css({
                        visibility: "visible"
                    });
                    activeSlide.find('h3').addClass('textSlideUpShowSmall');
                }, 540);
                setTimeout(function() {
                    check = false;
                    activeSlide.find('.btn').removeClass('blockSlideRight');
                },840);

                setTimeout(function() {
                    activeSlide.find('h3').removeClass('textSlideUpShowLarge');
                    activeSlide.find('.text--italic').removeClass('textSlideUpShow');
                    activeSlide.find('p').removeClass('textSlideUpShowLarge');
                }, 900);
            }
            if(style == "irregular" && !check) {
                check = true;
                if(direction == "right") {
                    if(index+1 == $(container).find('li').length)
                        imgTmp.html(slides.eq(0).find('.container__img').html());
                    else imgTmp.html(slides.eq(index+1).find('.container__img').html());
                }
                else if(direction == "left") {
                    if(index == 0)
                        imgTmp.html(slides.eq($(container).find('li').length-1).find('.container__img').html());
                    else imgTmp.html(slides.eq(index-1).find('.container__img').html());
                }
                imgTmp.show();

                activeSlide.find('h3').addClass('textSlideUpHide1');
                activeSlide.find('.btn').addClass('blockSlideLeft');
                activeSlide.find('.container__slide__img').addClass('blockSlideLeft');
                activeSlide.find('.container__img img').addClass('imageSlide');

                setTimeout(function() {
                    activeSlide.find('.text--italic').addClass('textSlideUpHide1');
                }, 100);
                setTimeout(function() {
                    activeSlide.find('h3').css({visibility: "hidden"});
                    activeSlide.find('p').addClass('textSlideUpHide1');
                }, 185);

                setTimeout(function() {
                    activeSlide.find('.text--italic').css({visibility: "hidden"});
                }, 250);

                activeSlide.find('h3').removeClass('textSlideUpShowSmall');
                activeSlide.find('p').removeClass('textSlideUpShowLarge');
                activeSlide.find('.btn').removeClass('blockSlideRight');
                activeSlide.find('.container__slide__img').removeClass('blockSlideRight');

                setTimeout(function() {
                    activeSlide.find('h3').removeClass('textSlideUpHide1');
                    activeSlide.find('p').removeClass('textSlideUpHide1');
                    activeSlide.find('.text--italic').removeClass('textSlideUpHide1');
                    activeSlide.find('.btn').removeClass('blockSlideLeft');
                    activeSlide.find('.container__slide__img').removeClass('blockSlideLeft');
                    activeSlide.find('.container__img img').removeClass('imageSlide');
                    activeSlide.hide();

                    if(direction == "right") {
                        if(index == $(container).find('.slider').children('li').length - 1 )
                            index = 0;
                        else
                            index += 1;
                    }
                    else if(direction == "left") {
                        if(index == 0)
                            index = $(container).find('.slider').children('li').length - 1;
                        else
                            index -= 1;
                    }

                    activeSlide = container.find('.slider').children('li').eq(index);
                    activeSlide.fadeIn();
                    name.html(activeSlide.find('.master__data').html());
                    activeSlide.find('p').css({
                        visibility: "hidden"
                    });
                    activeSlide.find('h3').css({
                        visibility: "hidden"
                    });
                    activeSlide.find('.btn').hide();

                    if(index < 9)
                        container.find('span:first-child').html('0' + (index+1));
                    else container.find('span:first-child').html(index+1);
                },300);

                setTimeout(function() {
                    activeSlide.find('p').not('.text--italic').css({
                        visibility: "visible"
                    });
                    activeSlide.find('.btn').show();
                    activeSlide.find('p').not('.text--italic').addClass('textSlideUpShowLarge');
                    activeSlide.find('.btn').removeClass('blockSlideRight');
                    activeSlide.find('.btn').addClass('blockSlideRight');
                    activeSlide.find('.container__slide__img').addClass('blockSlideRight');

                    scrollable_height(activeSlide.closest('.scroll-box'), 84);
                },350);

                setTimeout(function() {
                    activeSlide.find('.text--italic').css({
                        visibility: "visible"
                    });
                    activeSlide.find('.text--italic').addClass('textSlideUpShow');
                }, 450);
                setTimeout(function() {
                    activeSlide.find('h3').css({
                        visibility: "visible"
                    });
                    activeSlide.find('h3').addClass('textSlideUpShowSmall');
                }, 540);
                setTimeout(function() {
                    check = false;
                    activeSlide.find('.btn').removeClass('blockSlideRight');
                },840);

                setTimeout(function() {
                    activeSlide.find('h3').removeClass('textSlideUpShowLarge');
                    activeSlide.find('.text--italic').removeClass('textSlideUpShow');
                    activeSlide.find('p').removeClass('textSlideUpShowLarge');
                }, 900);
            }
            if (style == "regular" && !check) {
                check = true;
                activeSlide.removeClass('blockSlideRight');
                activeSlide.removeClass('blockSlideLeftHide');
                activeSlide.removeClass('blockSlideLeft');
                activeSlide.removeClass('blockSlideRightHide');

                if(direction == "left")
                    activeSlide.addClass('blockSlideLeft');
                if(direction == "right")
                    activeSlide.addClass('blockSlideRightHide');

                setTimeout(function() {
                    activeSlide.removeClass('blockSlideLeft');
                    activeSlide.removeClass('blockSlideRightHide');
                    activeSlide.hide();

                    if(direction == "right") {
                        if(index == $(container).find('li').length - 1 )
                            index = 0;
                        else
                            index += 1;
                    }
                    else if(direction == "left") {
                        if(index == 0)
                            index = $(container).find('li').length - 1;
                        else
                            index -= 1;
                    }

                    activeSlide = container.find('li').eq(index);

                    if(direction == "left") {
                        activeSlide.addClass('blockSlideRight');
                    }
                    if(direction == "right") {
                        activeSlide.addClass('blockSlideLeftHide');
                    }
                    activeSlide.show();
                },300);
                setTimeout(function() {
                    check = false;
                },400);
            }
            if (style == "gallery" && !check) {
                check = true;
                activeSlide.removeClass('blockSlideRight');
                activeSlide.removeClass('blockSlideLeftHide');
                activeSlide.removeClass('blockSlideLeft');
                activeSlide.removeClass('blockSlideRightHide');

                if(direction == "left")
                    activeSlide.addClass('blockSlideLeft');
                if(direction == "right")
                    activeSlide.addClass('blockSlideRightHide');

                setTimeout(function() {
                    activeSlide.removeClass('blockSlideLeft');
                    activeSlide.removeClass('blockSlideRightHide');
                    activeSlide.hide();

                    if(direction == "right") {
                        if(index == $(container).find('li').length - 1 )
                            index = 0;
                        else
                            index += 1;
                    }
                    else if(direction == "left") {
                        if(index == 0)
                            index = $(container).find('li').length - 1;
                        else
                            index -= 1;
                    }

                    activeSlide = container.find('li').eq(index);

                    if(direction == "left")
                        activeSlide.addClass('blockSlideRight');
                    if(direction == "right")
                        activeSlide.addClass('blockSlideLeftHide');
                    activeSlide.show();
                },300);
                setTimeout(function() {
                    check = false;
                },400);
            }
            if (style == "service" && !check) {
                check = true;

                if (activeSlide[0] === void 0 || !activeSlide[0].selector) {
                    activeSlide = container.find('.slider').first().children('.blockSlideDown').first();
                }

                activeSlide.removeClass('blockSlideUp');
                activeSlide.removeClass('blockSlideUpHide');
                activeSlide.removeClass('blockSlideDown');
                activeSlide.removeClass('blockSlideDownHide');

                if(direction == "left")
                    activeSlide.addClass('blockSlideUpHide');
                if(direction == "right")
                    activeSlide.addClass('blockSlideDownHide');

                setTimeout(function() {
                    activeSlide.removeClass('blockSlideUpHide');
                    activeSlide.removeClass('blockSlideDownHide');
                    activeSlide.hide();

                    if(direction == "right") {
                        if(index == $(container).find('li').length - 1 )
                            index = 0;
                        else
                            index += 1;
                    }
                    else if(direction == "left") {
                        if(index == 0)
                            index = $(container).find('li').length - 1;
                        else
                            index -= 1;
                    }

                    activeSlide = container.find('li').eq(index);

                    if(direction == "left")
                        activeSlide.addClass('blockSlideUp');
                    if(direction == "right")
                        activeSlide.addClass('blockSlideDown');
                    activeSlide.show();
                },400);
                setTimeout(function() {
                    check = false;
                },750);
            }

            setTimeout(function() {
                initialSlickSlider();
            },300);
        });
    }

    initialButton(prev, "left", false);
    initialButton(next, "right", false);
    initialButton(dot__item, "left", true);
}

jQuery(document).ready(function($) {
    mySlider('.main_page .shares .container', 'dotted');
    mySlider('.main_page .best-services .container', 'dotted');
    // mySlider('.third .slider__wraper', 'regular');

    mySlider('body:not(".home") .fourth .container__right', 'irregular');
    mySlider('#fourth div:not(".services__content--mobile") .container__right', 'irregular');
    mySlider('#fourth .services__content--mobile .container__right', 'irregular');
    mySlider('#history .container__right', 'irregular');
    mySlider('.gallery .container__bottom', 'gallery');
    mySlider('.masters .container', 'irregular');

    var $hot_hours = $('.hot-hours');
    for (var i=1; i<=$hot_hours.length; ++i) {
        mySlider('.third .hot-hours--'+i, 'regular');
    }
});
// #######################################################
// ----------------			КОНЕЦ				--------------------
// #######################################################

// #######################################################
// ----------			НАЧАЛЬНАЯ АНИМАЦИЯ				-------------
// #######################################################

jQuery(document).ready(function($) {
    if (is_mobile()) {
        return;
    }

    $('.left').css({display: "none"});
    $('.right').css({display: "none"});
    $('.first .center').css({display: "none"});
    $('.first .plus').css({display: "none"});
    $('.first .b').css({display: "none"});
    $('.first .s').css({display: "none"});
    $('.first .t').css({display: "none"});
    $('.first .flower').css({display: "none"});
    $('.first .wrap--img').css({display: "none"});
    $('.first .bag').css({display: "none"});

    setTimeout(function() {
        $('.left').css({display: "flex"});
        $('.right').css({display: "flex"});
        $('.left').addClass('startMenuLeft');
        $('.right').addClass('startMenuRight');
    }, 100);

    setTimeout(function() {
        $('.first .center').css({display: "flex"});
        $('.first .flower').css({display: "block"});
        $('.first .wrap--img').css({display: "block"});
        $('.first .center').addClass('startBlockUp');
        $('.first .flower').addClass('startBlockLeft');
        $('.first .wrap--img').addClass('startWrapImage');
    }, 700);

    setTimeout(function() {
        $('.first .plus').css({display: "block"});
        $('.first .b').css({display: "block"});
        $('.first .s').css({display: "block"});
        $('.first .t').css({display: "block"});
        $('.first .bag').css({display: "block"});
        $('.first .plus').addClass('startSmallkUp');
        $('.first .b').addClass('startSmallkUp');
        $('.first .s').addClass('startSmallkUp');
        $('.first .t').addClass('startBlockLeft');
        $('.first .bag').addClass('startSmallkUp');
    }, 800);

    setTimeout(function() {
        $('.first .center').removeClass('startBlockUp');
        $('.first .flower').removeClass('startBlockLeft');
        $('.first .wrap--img').removeClass('startWrapImage');
        $('.first .plus').removeClass('startSmallkUp');
        $('.first .b').removeClass('startSmallkUp');
        $('.first .s').removeClass('startSmallkUp');
        $('.first .t').removeClass('startBlockLeft');
        $('.first .bag').removeClass('startSmallkUp');
    }, 1500);
});
// #######################################################
// ----------------			КОНЕЦ				--------------------
// #######################################################

// #######################################################
// ----------------			FULL SCROLL				--------------------
// #######################################################
$(document).ready(function() {
    var position = 1;
    var canScroll = true;
    var reviews = false;

    if (is_mobile()) {
        return;
    }

    if($('body').hasClass("services"))
        canScroll = false;

    if($('body').hasClass("reviews"))
        reviews = true;

    $('#fullpage').fullpage({
        fixedElements: '.main__menu__block, .main__menu__button, .right, .o, .left, .c, .y, .services__main, .services .s, .services .t, .services .b, .services__popup, .reviews .s, .reviews .b, .reviews .t',
        dragAndMove: true,
        scrollingSpeed: 1400,
        easing: 'ease-out',
        fitToSection: true,
        lockAnchors: true,
        controlArrows: false,
        keyboardScrolling: false,
        easingcss3: 'ease',
        afterLoad: function(){
            $.fn.fullpage.setMouseWheelScrolling(canScroll);
        },
        onLeave: function(index, nextIndex, direction){
            $('.img__tmp').hide();
            setTimeout(function() {
                $('.first .center__left').removeClass('slideDown');
                $('.first .center__right').removeClass('slideDown');
                $('.first .s').removeClass('slideDown');
                $('.first .b').removeClass('slideDown');
                $('.first .plus').removeClass('slideDown');
                $('.first .bag').removeClass('bagSlide');
                $('.first .t').removeClass('sectionUpHide');
                $('.first .wrap--img').removeClass('sectionUpHide');
                $('.first .center').removeClass('sectionUpHide');

                $('.second').removeClass('sectionUpHide');
                $('.second').removeClass('sectionUp2');


                $('.third .center').removeClass('sectionUpHide');
                $('.third').removeClass('sectionUp2');
                $('.third .rose').removeClass('roseSlide');

                $('.fourth').removeClass('sectionUp2');
            },1400);

            if(index == 1 && direction =='down'){
                if(reviews) {
                    $('.reviews__second .center').css({
                        transform: "translateY(0%)"
                    });
                }
                if(smallScreen)
                    $('.left').fadeOut();
            }
            if(index == 2 && direction =='up'){
                if(reviews) {
                    $('.reviews__second .center').css({
                        transform: "translateY(-30%)"
                    });
                }
                if(smallScreen)
                    $('.left').fadeIn(1000);
            }
        }
    });
});
// #######################################################
// ----------------			КОНЕЦ				--------------------
// #######################################################

var smallScreen = false;
// #######################################################
// ----------------			МЕНЮ				--------------------
// #######################################################
$(document).ready(function() {
    // $('.main__menu__block').css({
    // 			display: "flex",
    // 		});
    // 		$('.main__menu__button').hide();


    $('.main__menu__btn, .menu-link').hover(
        function() {
            if( !smallScreen ) {
                $('.main__menu__block').removeClass('menuDown');
                $('.main__menu__block').removeClass('menuUp');
                $('.main__menu__block').removeClass('menuClose');
                $('.main__menu__block').addClass('menuOpen');
                $('.main__menu__block').css({
                    display: "flex",
                });
                $('.main__menu__button').hide();
            }
            else {
                $('.main__menu__block').removeClass('menuUp');
                $('.main__menu__block').addClass('menuDown');
                $('.main__menu__block').css({
                    display: "flex",
                });
            }
        },
        function() {
        });
    $('.main__menu__block').mouseleave(function() {
        if( !smallScreen ) {
            $('.main__menu__block').addClass('menuClose');
            setTimeout(function() {
                $('.main__menu__block').removeClass('menuOpen');
                $('.main__menu__block').css({
                    display: "none",
                });
                $('.main__menu__button').show();
            }, 285);
        }
    });

    $('#main__menu__block__close').click(function () {
        $('.main__menu__block').addClass('menuUp');
        setTimeout(function() {
            $('.main__menu__block').removeClass('menuDown');
            $('.main__menu__block').css({
                display: "none",
            });
            $('.main__menu__button').show();
        }, 450);
    });

    var firstPage = null;
    var cheker1 = 0;
    var cheker2 = 0;

    // if($(window).outerWidth() < 800) {
    //     smallScreen = true;
    //
    //     if(firstPage == null) {
    //         $('.left').css({display: "flex"});
    //         $('.right').css({display: "flex"});
    //         $('.first .center').css({display: "flex"});
    //         $('.first .flower').css({display: "block"});
    //         $('.first .wrap--img').css({display: "block"});
    //         $('.first .plus').css({display: "block"});
    //         $('.first .b').css({display: "block"});
    //         $('.first .s').css({display: "block"});
    //         $('.first .t').css({display: "block"});
    //         $('.first .bag').css({display: "block"});
    //         firstPage = $('#first');
    //
    //
    //         $('#second .container__wrap img').attr('src', 'img/border-10.png');
    //         $('#third .service__data__wrap img').attr('src', 'img/border-11.png');
    //         $('#fourth .container__wrap img').attr('src', 'img/border-11.png');
    //     }
    //
    //     setTimeout(function() {
    //         $('#first').detach();
    //         $.fn.fullpage.reBuild();
    //     },100);
    // }
    if($(window).outerWidth() > 1080 && !$('body').hasClass('gallery')) {
        $.fn.fullpage.reBuild();
        smallScreen = false;
        $.fn.fullpage.fitToSection();
        $.fn.fullpage.silentMoveTo(1);
    }

    $(window).resize(function() {
        // console.log(smallScreen);
        // if($(window).outerWidth() < 800) {
        //     smallScreen = true;
        //     cheker1++;
        //     cheker2 = 0;
        //
        //     if(firstPage == null)
        //         firstPage = $('#first');
        //
        //     if(cheker1 == 1) {
        //         $('#first').detach();
        //         $.fn.fullpage.reBuild();
        //         $.fn.fullpage.silentMoveTo(2);
        //         $.fn.fullpage.silentMoveTo(1);
        //
        //         $('#second .container__wrap img').attr('src', 'img/border-10.png');
        //         $('#third .service__data__wrap img').attr('src', 'img/border-11.png');
        //         $('#fourth .container__wrap img').attr('src', 'img/border-11.png');
        //     }
        // }
        if($(window).outerWidth() > 1080) {
            smallScreen = false;
            cheker1 = 0;
            cheker2++;
            $('.left').fadeIn();

            if(cheker2 == 1) {
                $('#fullpage').prepend(firstPage);
                $.fn.fullpage.reBuild();
                $.fn.fullpage.fitToSection();
                $.fn.fullpage.silentMoveTo(1);

                $('#second .container__wrap img').attr('src', '/wp-content/themes/foghorn/img/border-2.png');
                $('#third .service__data__wrap img').attr('src', '/wp-content/themes/foghorn/img/border-3.png');
                $('#fourth .container__wrap img').attr('src', '/wp-content/themes/foghorn/img/border-2.png');
            }
        }
    });

    // if($(window).outerWidth() > 800) {
    // 	cheker1 = 0;
    // 	cheker2++;

    // 	if(cheker2 == 1) {
    // 		// $.fn.fullpage.silentMoveTo('second');
    // 		$('#fullpage').prepend(firstPage);
    // 		$.fn.fullpage.reBuild();
    // 		$.fn.fullpage.fitToSection();
    // 	}
    // }
});
// #######################################################
// ----------------			КОНЕЦ				--------------------
// #######################################################

// #######################################################
// ----------------			ГАЛЕРЕЯ 		-----------------
// #######################################################
$(document).ready(function() {
    var main = $('.gallery .main .center .container__bottom');
    var buttons = $('.main .gallery__btn');

    // main.html($('.gallery__content #b1 .container__bottom').html());
    var imgBig = $('.gallery .main .gallery__image');

    $('.gallery .main .slider li').find('.gallery__thumb').click(function() {
        // imgBig.attr('src', $(this).attr('src'));
        imgBig.css({
            'background-image' : 'url("'+ $(this).data('src') +'")'
        });
    });
    mySlider('.gallery .main .container__bottom', 'gallery');

    buttons.click(function() {
        var $this = $(this),
            $b1 = $('#b1'),
            $b2 = $('#b2');

        if ($this.data('target') == 'b1') {
            $b1.show();
            $b2.hide();
        } else {
            $b1.hide();
            $b2.show();
        }
        buttons.removeClass('gallery__btn--active');
        $(this).addClass('gallery__btn--active');
        // main.html($('.gallery__content #'+$(this).data("target")+' .container__bottom').html());
        $('.gallery .main .gallery__preview li').css({display: "flex"});
        mySlider('.gallery .main .container__bottom', 'gallery');
        imgBig = $('.gallery .main .gallery__image');
        $('.gallery .main .slider li').find('img').click(function() {
            // imgBig.attr('src', $(this).attr('src'));
            imgBig.css({
                'background-image' : 'url("'+ $(this).attr('src') +'")'
            });
        });
    });


});
// #######################################################
// ----------------			КОНЕЦ				--------------------
// #######################################################

// #######################################################
// -------------	СЕРВИСЫ ИНИЦИАЛИЗАЦИЯ		-----------------
// #######################################################
$(document).ready(function() {
    var sections = $('.sections');
    var activeBlock = sections.find('.section:nth-child(2)');
    var navigationBlock = $('.services .services__main');
    var contentBlock = $('.services .services__content');
    var first = false;
    var order = false;
    var clickLock = true;

    navigationBlock.find('.services__link').click(function() {
        if (is_mobile()) {
            return;
        }

        navigationBlock.addClass('services__main__active');
        var target = $(this).data('target').split(' ');
        var content = contentBlock.find('#'+target[0]).find('#'+target[1]);

        if(!first) {
            $('.services__link').removeClass('services__link--active');
            $(this).addClass('services__link--active');
            setTimeout(function() {
                activeBlock.data("target", target);
                activeBlock.html(content.html());
                mySlider('.sections .services__items .center', 'service');
                mySlider('body:not(.education) .sections .section .container', 'irregular');
                mySlider('.education .sections .section .container', 'service');
                $.fn.fullpage.moveSectionDown();
                first = true;
                initialButtons();
            },400);
            setTimeout(function() {
                $('.services__main__active').css({width: '19%', left: "0.8%"});
                $('.services__main__active').find('.services__main__right').hide();
            },700);
        }
        else if(first && order) {
            $('.services__link').removeClass('services__link--active');
            $(this).addClass('services__link--active');
            activeBlock = sections.find('.section:nth-child(2)');

            setTimeout(function() {
                activeBlock.data("target", target);
                activeBlock.html(content.html());
                mySlider('.sections .section:nth-child(2) .services__items .center', 'service');
                mySlider('body:not(.education) .section:nth-child(2) .container', 'irregular');
                mySlider('.education .section:nth-child(2) .container', 'service');
                $.fn.fullpage.moveSectionUp();
                order = false;
                initialButtons();
            },400);
        }
        else if(first && !order && clickLock) {
            var activeTarget = activeBlock.data("target");
            var agree = false;
            if(activeTarget[0] == target[0])
                if(activeTarget[1] == target[1])
                    agree = true;

            if(!agree) {
                clickLock = false;
                activeBlock = sections.find('.section').eq(0);
                $('.services__link').removeClass('services__link--active');
                $(this).addClass('services__link--active');

                setTimeout(function() {
                    activeBlock.data("target", target);
                    activeBlock.html(content.html());
                    mySlider('#'+activeBlock.attr("id")+' .services__items .center', 'service');
                    mySlider('body:not(.education) #'+activeBlock.attr("id")+' .second .container', 'irregular');
                    mySlider('.education #'+activeBlock.attr("id")+' .second .container', 'service');
                    $.fn.fullpage.moveSectionUp();
                    setTimeout(function() {
                        $.fn.fullpage.silentMoveTo(2);
                        sections.find('.section').eq(1).insertBefore(activeBlock);
                        $.fn.fullpage.moveSectionDown();
                        clickLock = true;
                    },1300);
                    order = false;
                    initialButtons();
                },400);
            }
        }

        setTimeout(function() {
            initialSlickSlider();
            initialCustomScroll('scrollable--tmp', $('.section'));
            initialGenderChoice($('.current-choice'));
        },400);
    });
    function initialSlickSlider() {
        var $service__slick = $('.fp-section .service__slick');
        if ($service__slick.length) {
            $service__slick.each(function () {
                var $this = $(this),
                    $service__slick_li = $this.closest('.service__slick-li'),
                    $fp_table = $this.closest('.fp-table.active'),
                    $service__slick_item = $('.service__slick-item', $this).first(),
                    $tmp = $service__slick_item.clone(),
                    $slick__slider = $('.slick--slider-s');

                if ($service__slick_li.length && $service__slick_li.is(':hidden') || $service__slick_li.length && !$fp_table.length) {
                    return;
                }

                $slick__slider.remove();
                $service__slick_item.addClass('slick--slider-s');
                $this.append($tmp);

                var $slider = $('.slick--slider-s');
                $slider.slick({
                    "dots": true,
                    "infinite": true,
                    "prevArrow": '<div class="slider__prev"></div>',
                    "nextArrow": '<div class="slider__next"></div>',
                    "pauseOnHover": true,
                    "slidesToShow": 1,
                    "slidesToScroll": 1,
                    "autoplay": true
                });
            });

        }
    }
    window.initialSlickSlider = initialSlickSlider;

    function initialButtons() {
        activeBlock.on('click', '.services__items .slider .btn', function() {
            var target = $(this).data('target').split(' ');
            var content = contentBlock.find('#'+target[0]).find('#'+target[1]);
            sections.find('.section:last-child').html(content.html());
            order = true;

            sections.find('.section:last-child').find('.btn__back').click(function() {
                $.fn.fullpage.moveSectionUp();
                order = false;
            });
            $('.services:not(.special)').find('.section:last-child').find('.btn__enroll').click(function() {
                popup();
            });
            $.fn.fullpage.moveSectionDown();

            var $service__slick = $('#section3 .service__slick');
            if ($service__slick.length) {
                var $service__slick_item = $('.service__slick-item', $service__slick),
                    $tmp = $service__slick_item.clone(),
                    $slick__slider = $('.slick--slider-s', $service__slick);

                $slick__slider.remove();
                $service__slick_item.addClass('slick--slider-s');
                $service__slick.append($tmp);

                var $slider = $('.slick--slider-s');
                $slider.slick({
                    "dots": true,
                    "infinite": true,
                    "prevArrow": '<div class="slider__prev"></div>',
                    "nextArrow": '<div class="slider__next"></div>',
                    "pauseOnHover": true,
                    "slidesToShow": 1,
                    "slidesToScroll": 1,
                    "autoplay": true
                });
            }
            // setTimeout(function () {
            //     var $slider = $('.slick--slider');
            //
            //     $slider.slick({
            //         "dots": true,
            //         "infinite": true,
            //         "prevArrow": '<div class="slider__prev"></div>',
            //         "nextArrow": '<div class="slider__next"></div>',
            //         "pauseOnHover": false,
            //         "slidesToShow": 1,
            //         "slidesToScroll": 1,
            //         "autoplay": true
            //     });
            // }, 300);

            initialCustomScroll('scrollable--tmp', $('.section'));
        });
    }
    function popup() {
        // var popupBlock = $('.services__popup');
        // popupBlock.css({
        //     display: "flex"
        // });
        // $('.startMenuRight').css({zIndex: "100"});
        // popupBlock.click(function(event) {
        //     if (!$(event.target).closest(".services__popup__form").length) {
        //         popupBlock.hide();
        //         $('.startMenuRight').css({zIndex: "10"});
        //     }
        //     event.stopPropagation();
        // });
    }
});
function is_mobile() {
    return (jQuery(window).outerWidth() <= 1080);
}
// #######################################################
// ----------------			КОНЕЦ				--------------------
// #######################################################