<div class="center" style="padding: 0;">
    <div class="type_c_container">
        <div class="c_top">
            <div class="c_top_text">
                <h3><?php echo $slide->get_field('Заголовок окна'); ?></h3>
                <h6><?php echo $slide->get_field('Подзаголовок окна'); ?></h6>
            </div>
            <div class="c_top_slides" style="position: relative;">
                <div class="unslider-arrow--round _next arrows_c next_c"><img src="<?php echo get_template_directory_uri(); ?>/img/arrow.png" alt="" /></div>
                <div class="unslider-arrow--round _prev arrows_c prev_c"><img src="<?php echo get_template_directory_uri(); ?>/img/arrow.png" alt="" /></div>
<div class="line_c_bg"></div>
                <div class="slider_cc">
                    <?php
                    $slides_c_nav = $slide->get_fields( 'Офраншизе' );
                    if ( count( $slides_c_nav ) ) {
                        $i = 0;
                    foreach ( $slides_c_nav as $slide_c_nav ) {
                        $i++
                        ?>
                        <div class="content_icon_c">
                            <div class="image_c_slice">
                                <div class="border_image_c">
                                    <img src="<?php echo $slide_c_nav->get_img( 'Картинка офраншизе', 'large' )[0]['src']; ?>" alt="">
                                </div>
                                <div class="number_c_icon"><?=$i ?></div>
                            </div>

                            <div class="short_title_c"><?php echo $slide_c_nav->get_field( 'Заголовок офраншизе' ) ?></div>
                        </div>
                    <?php } } ?>
                </div>
            </div>
        </div>
        <style>
            .slider_cc img {
                width: 50px;
            }
        </style>
        <div class="c_content">
            <div class="slider_cont_c">
                <?php
                $slides_c_nav = $slide->get_fields( 'Офраншизе' );
                if ( count( $slides_c_nav ) ) { foreach ( $slides_c_nav as $slide_c_nav ) { ?>
                    <div style="height: 40vh;">

                        <div class="enroll__bottom__right">
                            <div class="scroll-box__cont scroll-box__cont--100per">
                                <div class="scrollable--tmp scrollable--set-height">
                                    <div>
                                        <?php echo $slide_c_nav->get_field( 'Описание офраншизе' ); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } } ?>
            </div>
        </div>
        <div class="c_bottom">
        </div>
    </div>
</div>