<div class="center center_type_c" style="padding: 0; overflow-y: scroll;">
    <style>
        .center_type_c {
            -ms-overflow-style: none;
        overflow: -moz-scrollbars-none;
        }
        .center_type_c::-webkit-scrollbar {
            display: none;
        }
        .short_title_c {
            height: 80px;
        }
        .arrows_c, .line_c_bg {
            top: calc(50% - 40px) !important;
        }

    </style>

    <div class="type_b_tab type_a_tab">
        <div class="top_b_text">
            <h3><?php echo $slide->get_field('Заголовок окна'); ?></h3>
            <h2><?php echo $slide->get_field('Подзаголовок окна'); ?></h2>
            <h6 style="font-size: 16px; font-family: Cambria, Times New Roman, Times, serif;"><?php echo $slide->get_field('С описание окна'); ?></h6>
        </div>
        <div class="second_a_section">
            <div class="all_line">
                <div class="line_1">
                    <img src="<?php echo $slide->get_img( 'Картинка для типа А', 'large' )[0]['src']; ?>" alt="">
                </div>

                <div class="line_2" style="height: 25vh;">
                    <div class="text_b_right" style="height: 25vh;">
                        <div class="enroll__bottom__right" style="height: 25vh;">
                            <div class="scroll-box__cont scroll-box__cont--100per" style="height: 25vh;">
                                <div class="scrollable--tmp scrollable--set-height" style="height: 25vh;">
                                    <div><?php echo $slide->get_field('Описание справа окна'); ?></div>
                                    <!--                                                                    <p>--><?php //echo $slide->get_field('Описание справа окна'); ?><!--</p>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <style>
                    .all_line ul li {
                        padding-top: 0 !important;
                        padding-bottom: 0 !important;
                    }
                </style>
                <div class="clear" style="clear: both"></div>
            </div>
            <div class="all_line">
                <div class="line_3">

                    <div class="text_b_left">
                        <div class="enroll__bottom__right" style="width: 100%; height: 100%;">
                            <div class="scroll-box__cont scroll-box__cont--100per">
                                <div class="scrollable--tmp scrollable--set-height">
                                    <?php echo $slide->get_field('Описание слева окна'); ?>
                                    <!--                                                                    <p>--><?php //echo $slide->get_field('Описание справа окна'); ?><!--</p>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="line_4">
                    <img src="<?php echo $slide->get_img( 'Картинка Большая', 'large' )[0]['src']; ?>" alt="">

                </div>
                <div class="clear" style="clear: both"></div>
            </div>

        </div>
    </div>

    <div class="type_c_container" style="margin-top: 50px;">
        <div class="c_top">
            <div class="c_top_text" style="margin-bottom: 20px;">
                <h3><?php echo $slide->get_field('Текст над слайдером'); ?></h3>
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
        <div class="last_section_b">
            <div class="left_btn_write">
                <button class="btn" onclick="popup_c({'cat':'бизнес-линч', 'title':'Написать директору', 'email': 1, 'time': 0, 'gender': 0, 'description': 'Написать директору'}, this);">написать директору</button>
            </div>
            <div class="right_after_btn">
                <?php echo htmlspecialchars_decode($slide->get_field('Текст возле кнопки А')); ?>
            </div>
            <div style="clear: both;"></div>
        </div>
    </div>
</div>