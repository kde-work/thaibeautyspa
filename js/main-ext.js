(function ($) {
    if (!$) {
        console.error('Объекты jQuery и $ отсутствуют');
        return;
    }

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
                "autoplay": false
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
    window.w_resize = w_resize;
}($ || window.jQuery));
// end of file