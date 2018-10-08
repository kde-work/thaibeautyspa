<?php ?>
<div class="center" style="padding: 0;">
    <div class="type_b_tab type_a_tab">
        <div class="top_b_text">
            <h3><?php echo $slide->get_field('Заголовок окна'); ?></h3>
            <h2><?php echo $slide->get_field('Подзаголовок окна'); ?></h2>
            <h6 style="font-size: 16px; color: #fff;  font-family: Cambria, Times New Roman, Times, serif;"><?php echo $slide->get_field('С описание окна'); ?></h6>
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
        <div class="last_section_b">
            <div class="left_btn_write">
                <?php $description_form = $slide->get_field('Заголовок окна'); ?>
                <button class="btn" onclick="popup_c({'cat':'бизнес-линч', 'title':'Написать директору', 'email': 1, 'time': 0, 'gender': 0, 'description': '<?= $description_form ?>'}, this);">написать директору</button>
            </div>
            <div class="right_after_btn">
                <?php echo htmlspecialchars_decode($slide->get_field('Текст возле кнопки А')); ?>
            </div>
            <div style="clear: both;"></div>
        </div>
    </div>
</div>
<?php ?>
