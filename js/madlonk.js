(function ($) {
    if (!$) {
        console.error('Объекты jQuery и $ отсутствуют');
        return;
    }
    jQuery(document).ready(function($) {
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