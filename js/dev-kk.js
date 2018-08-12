(function ($) {
    $(function() {
        var $wrapper_dropdown = $('.wrapper-dropdown');
        var $dd_li = $wrapper_dropdown.find('li');

        $wrapper_dropdown.on('click', function(event){
            $(this).toggleClass('active');
            return false;
        });

        $dd_li.on('click',function() {
            var $this = $(this),
                this_id = $this.data('id'),
                $par = $this.closest('.hot-hours-list-cont');

            if (!$par.length) {
                $par = $this.closest('#contact-ext');
            }
            var $city_down__item  = $('.city-down__item', $par),
                $contact_ext  = $('.contact-ext', $par),
                $contact_ext_target  = $('.contact-ext--'+this_id, $par),
                $hot_hours  = $('.hot-hours', $par),
                $hot_hours_target  = $('.hot-hours--'+this_id, $par),
                $dd_span = $('.wrapper-dropdown > span', $par),
                $city_down__target  = $('.city-down__item[data-id="'+this_id+'"]', $par);

            $city_down__item.removeClass('city-down__item--active');
            $city_down__target.addClass('city-down__item--active');

            $contact_ext.removeClass('contact-ext--active');
            $contact_ext_target.addClass('contact-ext--active');

            $hot_hours.removeClass('hot-hours--active');
            $hot_hours_target.addClass('hot-hours--active');

            $dd_span.html($this.html());
        });
    });
    function contacts_padding() {
        var windowWidth = window.innerWidth,
            windowHeight = window.innerHeight,
            $contacts_box = $('.contacts-box'),
            $phone_block = $('.phone-block'),
            $time_block = $('.time-block'),
            $contact__map = $('.contact__map'),
            $contact_block = $('.contact-block');


        if (!$contacts_box.length) return;

        // $contacts_box.css('height', windowHeight*0.5+'px');
        // $contact__map.css('height', windowHeight*0.5+'px');

        // if ( windowHeight > 770 ) {
        //
        //     $phone_block.css('margin-bottom',  windowHeight*0.5*0.06+'px');
        //     $time_block.css('margin-bottom',  windowHeight*0.5*0.13+'px');
        //     // $time_block.css('margin-bottom',  windowHeight*0.5*0.13+'px');
        // }
        // else {
        //     $phone_block.css('margin-bottom',  windowHeight*0.6*0.06+'px');
        //     $time_block.css('margin-bottom',  windowHeight*0.6*0.13+'px');
        //     // $time_block.css('margin-bottom',  windowHeight*0.5*0.13+'px');
        // }
        //
        //
        // if (windowWidth > 1080) {
        //     $contact_block.css ('height', windowHeight+'px');
        //     // $contacts_box.css('margin-top', windowHeight*0.29+'px');
        // } else {
        //     $contacts_box.css('margin-top', '66px');
        // }
    }
    // установим обработчик события resize
    $(window).resize(function(){
        contacts_padding();
    });
    $(document).ready(function(){
        contacts_padding();
    });
}($ || window.jQuery));