
<?php if (function_exists('get_field') AND get_field('fullpage', get_the_ID()) OR get_post_type() === 'services') : ?>
</div>
<?php endif; ?>
<div class="services__popup  thai_page_popup">
    <div class="cta__block">
        <form enctype="multipart/form-data" action="<?php echo get_template_directory_uri(); ?>/form_mail.php" method="POST" class="services__popup__form cta__form--copy scrollable" style="position: relative; overflow:visible;">
            <h3>หากต้องการให้เราติดต่อกลับ</h3>
            <div class="service__inputs">
                <input type="text" class="thai_page_input" name="thai_page__1" required placeholder="ชื่อนามสกุล">
                <input type="text" class="thai_page_input" name="thai_page__2" required placeholder="วันเดือนปีเกิด">
                <input type="text" class="thai_page_input" name="thai_page__3" required placeholder="ชื่อใน Facebook">
                <input type="text" class="thai_page_input" name="thai_page__4" required placeholder="Skype">
                <input type="text"  class="thai_page_input_center" name="thai_page__5"  placeholder="ใบสมัคร">
                <div class="upl_title" style="margin-bottom: 30px;">
                    กรุณาแนบรูปถ่ายล่าสุดของคุณ หนังสือเดินทาง ใบรับรองอาชีพ
                </div>
                <div class="file_upl">
                    <input readonly="readonly" onchange="fileinput(this.value)" name="thai_page_file_1" id="thai_page_file_1" type="file">
                    <input required class="input_name_file" value="" type="text" placeholder="แนบเอกสาร ">
                    <label for="thai_page_file_1">แนบเอกสาร</label>
                </div>
                <div class="file_upl">
                    <input readonly="readonly" name="thai_page_file_2" id="thai_page_file_2" type="file">
                    <input required class="input_name_file" value="" type="text" placeholder="แนบเอกสาร ">
                    <label for="thai_page_file_2">แนบเอกสาร</label>
                </div>
            </div>

            <div class="wrap">
                <button type="submit" class="btn_my_styles" style="margin-top: 30px;">หากมีคำถาม (เป็นภาษาอังกฤษ)</button>
            </div>
            <div class="cta__status cta__status--loading">
                <div class="cta__status-body">
                    <span class="cta__status-title">Идет отправка...</span>
                    <div class="spinner">
                        <div class="rect1"></div>
                        <div class="rect2"></div>
                        <div class="rect3"></div>
                        <div class="rect4"></div>
                        <div class="rect5"></div>
                    </div>
                </div>
            </div>

            <div class="cta__status cta__status--success">
                <div class="cta__status-body">
                    <span class="cta__status-title"><h4>Заявка отправлена!</h4><br>В ближайшее время Вам позвонят</span>
                </div>
            </div>

            <div class="cta__status cta__status--error">
                <div class="cta__status-body">
                    <span class="cta__status-title"><h4>Произошла ошибка!</h4><br>Заявка не отправлена</span>
                </div>
            </div>

            <input type="hidden" name="url" value="<?php echo get_the_permalink(); ?>">
            <input type="hidden" name="description" value="default">
            <input type="hidden" name="type" value="default">
            <input type="hidden" name="cat" value="0">
            <input type="hidden" name="action" value="tbs_form">

        </form>
        <div class="cta__plus cta__plus--top"  style="bottom: 100%; transform: translateY(50%); top: auto;"></div>
        <div class="cta__plus cta__plus--bottom" style="top: 100%; transform: translateY(-50%);"></div>

    </div>
</div>

<div class="services__popup cta">
    <div class="cta__block">
        <form action="#" class="services__popup__form cta__form cta__form--copy scrollable">
            <h3>Заказать услугу</h3>
            <div class="cta__time-e">
                <div class="data__item__date">
                    <p><span class="data__item__date-style"></span>
                        <br><span class="data__item__month-style"></span></p>
                </div>
                <div class="data__item__time cta__time-date">
                    <p class="text--data big-orange"></p>
                </div>
                <div class="data__item__price cta__time-text">
                    <p class="text--italic">Ваше время, на которое вас записали</p>
                </div>
            </div>
            <div class="service__inputs">
                <input type="text" name="cta__last-name" placeholder="Фамилия">
                <input type="text" name="cta__name" required placeholder="Имя">
                <input type="email" name="cta__email" placeholder="Email">
                <input type="text" name="cta__phone" required placeholder="Номер телефона">
            </div>
            <div class="services__form__time cta__time">
                <div class="services__time__line"></div>
                <div class="services__time__circle cta__min">
                    <input type="radio" name="cta__min" class="cta__time-input" id="cta__min--1" value="60 мин" checked>
                    <label for="cta__min--1" class="cta__time-label"><span>60&nbsp;мин</span></label>
                </div>
                <div class="services__time__circle cta__time">
                    <input type="radio" name="cta__min" class="cta__time-input" id="cta__min--2" value="90 мин">
                    <label for="cta__min--2" class="cta__time-label"><span>90&nbsp;мин</span></label>
                </div>
                <div class="services__time__circle cta__time">
                    <input type="radio" name="cta__min" class="cta__time-input" id="cta__min--3" value="120 мин">
                    <label for="cta__min--3" class="cta__time-label"><span>120&nbsp;мин</span></label>
                </div>
            </div>
            <!--<div class="services__form__gender cta__gender">
                <div class="services__gender__circle">
                    <input type="radio" name="cta__gender" class="cta__gender-input" id="cta__gender--1" value="Муж" checked>
                    <label for="cta__gender--1" class="cta__gender-label"><span>Муж</span></label>
                </div>
                <div class="services__gender__circle">
                    <input type="radio" name="cta__gender" class="cta__gender-input" id="cta__gender--2" value="Жен" checked>
                    <label for="cta__gender--2" class="cta__gender-label"><span>Жен</span></label>
                </div>
            </div>-->
            <div class="modal-copy">
                <div class="modal-copy__check"></div>
                <div class="modal-copy__cont">
                    <div class="modal-copy__text">
                        Нажимая на кнопку, вы даёте согласие на обработку персональных данных и соглашаетесь с
                    <a onclick="popup_none_cta({'id':'private'});" href="#">политикой конфиденциальности</a></div>
                </div>
            </div>
            <div class="wrap">
                <button type="submit" class="btn" disabled>Отправить</button>
            </div>

            <div class="cta__status cta__status--loading">
                <div class="cta__status-body">
                    <span class="cta__status-title">Идет отправка...</span>
                    <div class="spinner">
                        <div class="rect1"></div>
                        <div class="rect2"></div>
                        <div class="rect3"></div>
                        <div class="rect4"></div>
                        <div class="rect5"></div>
                    </div>
                </div>
            </div>

            <div class="cta__status cta__status--success">
                <div class="cta__status-body">
                    <span class="cta__status-title"><h4>Заявка отправлена!</h4><br>В ближайшее время Вам позвонят</span>
                </div>
            </div>

            <div class="cta__status cta__status--error">
                <div class="cta__status-body">
                    <span class="cta__status-title"><h4>Произошла ошибка!</h4><br>Заявка не отправлена</span>
                </div>
            </div>

            <input type="hidden" name="url" value="<?php echo get_the_permalink(); ?>">
            <input type="hidden" name="description" value="default">
            <input type="hidden" name="type" value="default">
            <input type="hidden" name="cat" value="0">
            <input type="hidden" name="action" value="tbs_form">
        </form>
        <div class="cta__plus cta__plus--top"></div>
        <div class="cta__plus cta__plus--bottom"></div>
    </div>
</div>

<div class="services__popup none-cta">
    <div class="cta__block cta__block--wide">
        <div class="services__popup__form cta__form cta__form--copy">
            <?php
            tbs_modal_cont('pok-prot');
            tbs_modal_cont('private');
            ?>
        </div>
        <div class="cta__plus cta__plus--top"></div>
        <div class="cta__plus cta__plus--bottom"></div>
    </div>
</div>

<div class="services__popup img-cta">
    <div class="cta__block cta__block--wide">
        <div class="cta__form img-cta__cont">
        </div>
        <div class="cta__plus cta__plus--top"></div>
        <div class="cta__plus cta__plus--bottom"></div>
    </div>
</div>
 <div class="lang_custom">
     <a href="/en">En</a>
     <a href="/thai" class="thai_lang" style="display: inline;">Thai</a>
     <a href="/" class="ru_lang" style="display: none;">Ru</a>
 </div>
<div id="overlay"></div><!-- Подложка -->
<link rel="stylesheet" href="<?php echo get_template_directory_uri()?>/css/social.css">
<script>



</script>
<?php wp_footer(); ?>

</body>
</html>