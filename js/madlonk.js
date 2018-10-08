(function ($) {
    if (!$) {
        console.error('Объекты jQuery и $ отсутствуют');
        return;
    }
    jQuery(document).ready(function($) {
        $('.my_btn_mobi_open_cc').click(function() {
            event.preventDefault();
            $('.my_mobi_open_cc').css('display','block');

            var elementClick = '#scroll_mobi_active';
            var destination = $(elementClick).offset().top;
            if ($.browser.safari) {
                $('body').animate({ scrollTop: destination }, 1100);
            } else {
                $('html').animate({ scrollTop: destination }, 1100);
            }
        });
        $('.my_btn_mobi_cc').click(function () {
                var parent_mobi = $(this).parents('#scroll_mobi_active');
                parent_mobi.toggle('slide', function () {
                    parent_mobi.css('display','none');
                });
                var elementClick = '#scroll_top_cc_slider';
                var destination = $(elementClick).offset().top;
                if ($.browser.safari) {
                    $('body').animate({ scrollTop: destination }, 1100); //1100 - скорость
                } else {
                    $('html').animate({ scrollTop: destination }, 1100);
                }
        });



        $('body.thai_page .layout__body').addClass('scrollable');
        $('a[href=#thai_page_popup]').click(function () {
            event.preventDefault();
            $('.thai_page_popup').css('display', 'flex');
        });
        $(".file_upl input[type='file']").change(function () {
            var $el = $(this),
                fileName,
                $block = $el.next('.input_name_file');
            if ($el.val().lastIndexOf('\\')) {
                var i = $el.val().lastIndexOf('\\') + 1;
            } else {
                var i = $el.val().lastIndexOf('/') + 1;
            }
            fileName = $el.val().slice(i);
            $block.val(fileName);
            $block.attr("placeholder", fileName);
        });
    });
}($ || window.jQuery));
// end of file