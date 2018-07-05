(function ($) {
    if (!$) {
        console.error('Объекты jQuery и $ отсутствуют');
        return;
    }

    function initialGenderChoice ($par) {
        // setTimeout(function () {
            if (!$par.length) {
                return;
            }
            var target_tab = $('.services__link--active', $par).first().data('target').split(' ')[1],
                $slider__original = $('.current-choice__original #'+target_tab+' .current-choice__slider', $par),
                $slider__visible = $('.current-choice__visible > .active .current-choice__slider', $par),
                $body = $('body'),
                array_of_types = ['man', 'female', 'couple', 'empty'],
                additional_class = '';

            $slider__visible.html($slider__original.html());

            if (!$body.hasClass('current-choice--man') && !$body.hasClass('current-choice--female') && !$body.hasClass('current-choice--couple') && !$body.hasClass('current-choice--empty')) {
                $body.addClass('current-choice--man').addClass('current-choice--female').addClass('current-choice--couple').addClass('current-choice--empty');
            }

            if ($body.hasClass('current-choice--man') && $body.hasClass('current-choice--female') && $body.hasClass('current-choice--couple') && $body.hasClass('current-choice--empty')) {
                $('.current-choice__visible > .active .choice__item', $par).removeClass('choice__item--active');
                array_of_types.forEach(function(item, i, arr) {
                    additional_class += ':not(".services__items__block--'+item+'")';
                });
            } else {
                array_of_types.forEach(function(item, i, arr) {
                    if ($body.hasClass('current-choice--'+item)) {
                        $('.current-choice__visible > .active .choice__item--'+item, $par).addClass('choice__item--active');
                        additional_class += ':not(".services__items__block--'+item+'")';
                    }
                });
            }
            $('.current-choice__visible > .active .services__items__block'+additional_class, $par).remove();

            var $services__items__block = $('.current-choice__visible > .active .services__items__block', $par);
            $services__items__block.each(function(i) {
                if (i % 3 === 0) {
                    $services__items__block.slice(i, i+3).wrapAll('<li/>')
                }
            }).parent('li').unwrap();

            var $li = $('li', $slider__visible);

            $li.hide();
            $li.first().addClass('blockSlideDown').show();
        // }, 600);
    }

    // Выбор пола на странице Услуги
    $(function () {
        var $body = $('body');

        $body.on('click', '.choice__item', function () {
            var $this = $(this);

            if ($this.hasClass('choice__item--active')) {
                $this.removeClass('choice__item--active');
            } else {
                $this.addClass('choice__item--active');
            }

            var $choice__item = $('.choice__item'),
                $choice__item__active = $('.choice__item--active');

            if (!$choice__item__active.length) {
                $body.addClass('current-choice--man').addClass('current-choice--female').addClass('current-choice--couple').addClass('current-choice--empty');
            } else {
                $choice__item.each(function () {
                    var $this = $(this),
                        data_id = $this.data('id');

                    if ($this.hasClass('choice__item--active')) {
                        $body.addClass('current-choice--' + data_id);
                    } else {
                        $body.removeClass('current-choice--' + data_id);
                    }
                    $body.removeClass('current-choice--empty');
                });
            }
            initialGenderChoice($('.current-choice'));
        });
    });

    // Подробнее на слайдере (всплытие окна)
    $(function () {
        var $cont_with_more__btn = $('.cont-with-more__btn');

        $cont_with_more__btn.on('click', function () {
            var $this = $(this),
                data_id = $this.data('id'),
                $cont_with_more = $this.closest('.cont-with-more'),
                $cont_with_more__cont = $('.cont-with-more__cont', $cont_with_more),
                $cont_with_more__more = $('.cont-with-more__more', $cont_with_more),
                $more_box__item = $('.more-box__item', $cont_with_more),
                $more_box__item__target = $('.more-box__item--'+data_id, $cont_with_more);

            $more_box__item.removeClass('more-box__item--active');
            $more_box__item__target.addClass('more-box__item--active');

            $cont_with_more__more.show();
            // $cont_with_more__more.css({
            //     'top': '8%'
            // });
            $cont_with_more__cont.css({
                'margin-top': '-100vh'
            });
        });
    });
    // Назад с Подробнее на Акциях
    $(function () {
        var $btn__back = $('.cont-with-more .btn__back');

        $btn__back.on('click', function () {
            var $this = $(this),
                $cont_with_more = $this.closest('.cont-with-more'),
                $cont_with_more__cont = $('.cont-with-more__cont', $cont_with_more),
                $cont_with_more__more = $('.cont-with-more__more', $cont_with_more);

            $cont_with_more__cont.css({
                'margin-top': '0'
            });
        });
    });

    // Эфект наведения на категории Услуг (смена картинки)
    $(function () {
        var $services__more = $('.services__link[data-img]');

        $services__more.on('hover', function () {
            var $this = $(this),
                data_img = $this.data('img'),
                $hover_target_image = $('.hover-target-image');

            $hover_target_image.css({
                'background-image': 'url('+ data_img +')'
            })
        });
    });

    // Мобильная версия Услуг. Подробнее
    $(function () {
        var $services__more = $('.services__more'),
            $btn__back = $('.btn--back');

        $services__more.on('click', function () {
            var $this = $(this),
                $services__reach_slider = $this.closest('.services__reach-slider'),
                $services__first = $('.services__first', $services__reach_slider),
                $services__second = $('.services__second', $services__reach_slider);

            $services__first.hide(400, function () {
                $services__second.slideDown(400, function () {
                    $('.slick--slider').slick('slickGoTo', 1);
                    setTimeout(function () {
                        $('.slick--slider').slick('slickGoTo', 0);
                    }, 600);
                });
            })
        });

        $btn__back.on('click', function () {
            var $this = $(this),
                $services__reach_slider = $this.closest('.services__reach-slider'),
                $services__first = $('.services__first', $services__reach_slider),
                $services__second = $('.services__second', $services__reach_slider);

            $services__second.hide(400, function () {
                $services__first.slideDown(400);
            })
        });
    });

    // Мобильная версия Услуг. Аккардион
    $(function () {
        var $services__title = $('.services__title');

        $services__title.on('click', function () {
            var $this = $(this),
                this_id = $this.data('id'),
                $services__content = $('.services__m-content--open'),
                $services__content__target = $('.services__m-content--'+this_id);

            if ($this.hasClass('services__title--open'))  {
                return;
            }
            $services__content.slideUp(500, function () {
                sal_open_acc($this, $services__title, $services__content__target, $services__content);
            });
            if (!$services__content.length) {
                sal_open_acc($this, $services__title, $services__content__target, $services__content);
            }
        });
    });
    function sal_open_acc($btn, $btns, $tab, $tabs) {
        $tab.slideDown(500);
        $btns.removeClass('services__title--open');
        $btn.addClass('services__title--open');
        $tabs.removeClass('services__m-content--open');
        $tab.addClass('services__m-content--open');
    }
    window.sal_open_acc = sal_open_acc;

    // Выбор адреса "Горячие часы"
    $(function () {
        var $hot_hours__select = $('.hot-hours__select');

        $hot_hours__select.val('1');

        $hot_hours__select.on('change', function () {
            var $this = $(this),
                this_val = $this.val(),
                $hot_hours = $('.hot-hours'),
                $hot_hours__current = $('.hot-hours--'+this_val);

            $hot_hours.hide();
            $hot_hours__current.show();
        });
    });

    function w_like_hide_text() {
        var $like_hide_text = $('.like-hide-text'),
            $hide_text = $('.like-hide-text ~ .hide-text');

        $like_hide_text.width($hide_text.width());
    }
    window.w_like_hide_text = w_like_hide_text;
    $(function () {
        w_like_hide_text();
    });
    $(window).resize(function() {
        w_like_hide_text();
    });

    $(function () {
        setTimeout(function () {
            var $slider = $('.slick--slider'),
                $body = $('body');

            // if ($body.width() < 1080) {
            $slider.slick({
                "dots": true,
                "infinite": true,
                "prevArrow": '<div class="slider__prev"></div>',
                "nextArrow": '<div class="slider__next"></div>',
                // "slide": '.text-slide',
                "pauseOnHover": false,
                "slidesToShow": 1,
                "slidesToScroll": 1,
                "autoplay": true
            });
            // }
        }, 1200);
    });
    $(window).resize(function() {
        w_resize();
    });
    function w_resize() {
        var $html = $('html'),
            $body = $('body'),
            $fullpage = $('body > #fullpage');

        if ($fullpage.length) {
            if ($html.hasClass('fp-enabled') && $html.width() <= 1080) {
                setTimeout(function() {location.reload();}, 200);
            }
            if (!$html.hasClass('fp-enabled') && $html.width() > 1080) {
                setTimeout(function() {location.reload();}, 200);
            }
        } else {
            if ($html.width() <= 1080) {
                var $items = $('body > *');
                $items.wrapAll('<div id="fullpage"></div>');
            }
            if ($html.width() > 1080) {

            }
        }

        if ($body.hasClass('services') || $body.hasClass('contacts') || $body.hasClass('gallery') || $body.hasClass('reviews') || $body.hasClass('masters')) {
            if ($html.width() <= 1080) {
                $body.addClass('main_page');
            } else {
                $body.removeClass('main_page');
            }
        }
    }
    $(function () {
        w_resize();
    });

    // Enable custom scroll
    $(function () {
        var $scrollable = $('.scrollable');

        $scrollable.mCustomScrollbar();
    });

    function initialCustomScroll(elem_class, $par) {
        var timeout = 200;

        setTimeout(function () {
            var $this = $('.' + elem_class, $par);
            
            $this.removeClass(elem_class);
            $this.addClass('scrollable--enable');
            if ($this.hasClass('scrollable--set-height')) {
                $this.height($this.closest('.scroll-box__cont').height());
            }

            $this.mCustomScrollbar();
        }, timeout);
    }

    // Calc height of scrollable element
    function scrollable_height($par, h_offset) {
        setTimeout(function () {
            if (!$par) {
                $par = $('body');
            }
            var $scroll_box__slide = $('.scroll-box__slide, .slider-box__slide', $par),
                $scroll_box__slide__active = $scroll_box__slide.filter(function () {
                    return this.style.display !== 'none';
                }).first();

            var $scroll_cont = $('.scroll-box__cont', $scroll_box__slide__active),
                $container__img = $('.container__img:not(".container__img--not-js-height")', $scroll_box__slide__active);

            // Высчитывается высота для блоков со скроллом
            if ($container__img.length) {
                $container__img.height($scroll_cont.height() - parseInt($container__img.css('top')) - h_offset - 38);
            }
            $scroll_cont.each(function () {
                var $this = $(this),
                    $elems = $this.children('*:not(".scrollable")'),
                    $scrollable = $('.scrollable', $this),
                    elems_height = 0;

                if ($scrollable.hasClass('scrollable--set-height')) {
                    $scrollable.height($scrollable.closest('.scroll-box__cont').height());
                } else {
                    $elems.each(function () {
                        var $_this = $(this);

                        elems_height += $_this.outerHeight(true);
                    });
                    $scrollable.innerHeight($this.height() - elems_height - h_offset);
                }
            });

            // Высчитывается высота для блоков таких как Акции
            var $slider_box__cont = $('.slider-box__cont', $scroll_box__slide__active),
                $elems = $slider_box__cont.children('*:not(".height-cover")'),
                $height_cover = $('.height-cover', $scroll_box__slide__active),
                elems_height = 0;

            $elems.each(function () {
                var $_this = $(this);

                elems_height += $_this.outerHeight(true);
            });
            $height_cover.innerHeight($slider_box__cont.height() - elems_height - h_offset);

            // bax fix with custom scroll
            var $scrollable = $('.scrollable:not(.mCS_no_scrollbar)', $scroll_box__slide__active);
            setTimeout(function () {
                $scrollable.css({
                    'height': $scrollable.height()*1 + 5 + 'px'
                });
            }, 250);

            $scrollable.mCustomScrollbar();
        }, 50);
    }
    $(function () {
        scrollable_height(false, 58);
    });
    $(window).resize(function() {
        scrollable_height(false, 58);
    });

    // Best Services. Choice
    $(function () {
        var $best_s_pre__input = $('.best-s-pre__input');

        $best_s_pre__input.on('click', function () {
            var $this = $(this),
                this_gender = $this.data('id'),
                $service_slider__pre = $this.closest('.service-slider--pre'),
                $scroll_box__slide = $('.scroll-box__slide:not(".scroll-box__slide--'+this_gender+'")', $service_slider__pre),
                $dot__item = $('.dot__item:not(".dot__item--'+this_gender+'")', $service_slider__pre);

            $service_slider__pre.removeClass('service-slider--pre');
            $scroll_box__slide.remove();
            $dot__item.remove();

            var $dot__item = $('.dot__item', $service_slider__pre);
            $dot__item.first().trigger('click');

            var i = 0;
            $dot__item.each(function () {
                var $this = $(this),
                    this_id = $this.data('id');
                
                $this.removeClass('dot__item--'+this_id);
                $this.data('id', i);
                $this.addClass('dot__item--'+i);
                i++;
            });
        });
    });

    window.w_resize = w_resize;
    window.scrollable_height = scrollable_height;
    window.initialCustomScroll = initialCustomScroll;
    window.initialGenderChoice = initialGenderChoice;
}($ || window.jQuery));
// end of file