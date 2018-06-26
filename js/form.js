(function ($) {
    if (!$) {
        console.error('Объекты jQuery и $ отсутствуют');
        return;
    }

    // шаблон ввода телефона
    $(function () {
        var $html = $('html');
        if (!$html.hasClass('touch') && !$html.hasClass('lt-ie9')) {
            $('[name="cta__phone"]').mask("+7 (999) 999-99-99");
        }
    });

    // Адаптивные элементы на странице. Плюсы
    function modal_pluses () {
        var $cta__plus__top = $('.cta__plus--top'),
            $cta__block = $cta__plus__top.closest('.cta__block'),
            $cta__plus__bottom = $('.cta__plus--bottom', $cta__block),
            $form = $('form', $cta__block),
            form_offset = $form.offset();

        $cta__plus__top.css({
            'top': form_offset.top - 17 + 'px'
        });

        $cta__plus__bottom.css({
            'top': form_offset.top + $form.innerHeight() - 10 + 'px'
        });
    }

    $(function () {
        modal_pluses();
    });
    $(window).resize(function() {
        modal_pluses();
    });
    window.modal_pluses = modal_pluses;

    // Закрытие модального окна
    $(function () {
        var popupBlock = $('.services__popup');
        popupBlock.click(function(event) {
            if (!$(event.target).closest(".services__popup__form").length) {
                popupBlock.hide();
                // $('.startMenuRight').css({zIndex: "10"});
            }
            event.stopPropagation();
        });
    });

    // Модальное окно
    function popup_clear_class($form) {
        $form.removeClass('cta--error').removeClass('cta--loading').removeClass('cta--success');
    }
    window.popup_clear_class = popup_clear_class;

    // Модальное окно
    function popup_c(d, _this) {
        var $this = $(_this),
            popupBlock = $('.services__popup'),
            $cta = $('.cta'),
            $cta__block = $('.cta__block', $cta),
            $form = $('form', $cta),
            $title = $('h3', $cta),
            $description = $('input[name="description"]', $form),
            $cat = $('input[name="cat"]', $form),
            $sub_title = $('.form__sub-title', $form),
            $modal_text = $('.form__modal-text', $form);

        popupBlock.css({
            display: "flex"
        });
        // $('.startMenuRight').css({zIndex: "101"});

        popup_clear_class($form);
        $modal_text.remove(); $sub_title.remove();

        $cta__block.removeClass('cta__block--wide');
        if (d.template !== void 0 && d.template === 'wide') {
            $cta__block.addClass('cta__block--wide');

            if (d.modal_text !== void 0 && d.modal_text)
                $title.after('<div class="form__modal-text">'+d.modal_text+'</div>');

            if (d.subtitle !== void 0 && d.subtitle)
                $title.after('<div class="form__sub-title">'+d.subtitle+'</div>');
        }

        modal_hide_section('email', $cta, d.email);
        modal_hide_section('time', $cta, d.time);
        modal_hide_section('gender', $cta, d.gender);

        if (d.title) {
            $title.html(d.title);
        } else {
            $title.html('Заказать услугу');
        }

        if (d.cat) {
            $cat.val(d.cat);
        } else {
            $cat.val('default');
        }

        if (d.description) {
            $description.val(d.description);
        } else {
            $description.val('default');
        }

        modal_pluses();
    }
    window.popup_c = popup_c;

    // Скрывать / показывать секции в модальном окне
    function modal_hide_section(section_name, $parent, v) {
        var $cta_section = $('.cta__'+section_name, $parent);

        if (v || v === void 0) {
            $cta_section.show();
        } else {
            $cta_section.hide();
        }
    }
    window.popup_c = popup_c;

    // Отправка формы
    $(function () {
        var $form = $('.cta__form');

        $form.on('submit', function (e) {
            form_my_submit(e, this)
        });
    });
    function form_strong_submit (_this) {
        var $this = $(_this),
            this_build = $this.data('build'),
            $form = $this.closest('form');

        if (this_build === void 0 || !this_build) {
            $this.data('build', 1);
            $form.on('submit', function (e) {
                form_my_submit(e, this)
            });
        }
    }
    window.form_strong_submit = form_strong_submit;

    function form_my_submit (e, _this) {
        var $this = $(_this),
            $body = $('body'),
            ajaxData = new FormData($this.get(0));

        e.preventDefault();

        if ($body.hasClass('is-modal-uploading')) {
            return;
        }

        popup_clear_class($this);

        $.ajax({// запрос на сервер "на лету"
            url: 			ajaxurl.url, // http адрес скрипта куда отправляется запрос,
            type:			'POST',
            data: 			ajaxData,
            dataType:		'json', //формат возвращаемых сервером данных
            cache:			false,
            contentType:	false,
            processData:	false,
            beforeSend: function()
            {
                $body.addClass('is-modal-uploading');
                $this.addClass('cta--loading');
                modal_pluses();
            },
            success: function(data) //data - ответ сервера
            {
                console.log(data);
                if (data.status*1 === 1) {
                    $this.addClass('cta--success');
                } else {
                    $this.addClass('cta--error');
                }
            },
            complete: function() //data - ответ сервера
            {
                $body.removeClass('is-modal-uploading');
                $this.removeClass('cta--loading');
                modal_pluses();
            },
            error: function (xhr, ajaxOptions, thrownError) { // в случае неудачного завершения запроса к серверу
                $this.addClass('cta--error');
                console.error('modal-error-@11: '+xhr.status); // покажем ответ сервера
                console.error('modal-error-@12: '+thrownError); // и текст ошибки
            }
        });

        return false;
    }
    window.form_my_submit = form_my_submit;

}($ || window.jQuery));
// end of file