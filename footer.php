<?php if (function_exists('get_field') AND get_field('fullpage', get_the_ID()) OR get_post_type() === 'services') : ?>
</div>
<?php endif; ?>

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
                <div class="modal-copy__check modal-copy__check--active"></div>
                <div class="modal-copy__cont">
                    <div class="modal-copy__text">
                        Нажимая на кнопку, вы даёте согласие на обработку персональных данных и соглашаетесь с
                    <a onclick="popup_none_cta({'id':'private'});" href="#">политикой конфиденциальности</a></div>
                </div>
            </div>
            <div class="wrap">
                <button type="submit" class="btn">Отправить</button>
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

<div id="overlay"></div><!-- Подложка -->

<?php wp_footer(); ?>

</body>
</html>