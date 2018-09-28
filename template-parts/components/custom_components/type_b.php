<?php ?>
<div class="center" style="padding: 0;">
    <div class="type_b_tab ">
        <div class="top_b_text">
            <h3><?php echo $slide->get_field('Заголовок окна'); ?></h3>
            <h2><?php echo $slide->get_field('Подзаголовок окна'); ?></h2>
        </div>
        <div class="second_b_section" style="display: flex">
            <div class="left_image">
                <img src="<?php echo $slide->get_img( 'Картинка Большая', 'large' )[0]['src']; ?>" alt="">
            </div>
            <div class="text_b_right">
                <div class="enroll__bottom__right" style="width: 100%; height: 100%;">
                    <div class="scroll-box__cont scroll-box__cont--100per">
                        <div class="scrollable--tmp scrollable--set-height">
                            <?php echo htmlspecialchars_decode($slide->get_field('Описание слева окна')); ?>
                            <!--                                                                    <p>--><?php //echo $slide->get_field('Описание справа окна'); ?><!--</p>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="last_section_b">
            <div class="left_btn_write">
                <button class="btn onclick="popup_c({'cat':'обратный-звонок', 'title':'Обратный звонок', 'email': 1, 'time': 0, 'gender': 0, 'description': 'Заказ обратного звонка'}, this);"">написать директору</button>
            </div>
            <div class="right_after_btn">
                <?php echo htmlspecialchars_decode($slide->get_field('Описание справа окна')); ?>
            </div>
            <div style="clear: both;"></div>
        </div>
    </div>
</div>
<?php ?>
