<?php
/**
 * An example implementation of the component in code
 *
 * Using content of component in a custom implementation of the html
 *
 * @author Dmitry
 * @version 0.01
 * @package component
 *
 * COMPONENT IMPLEMENTATION: Слайдер Мастера
 *
 */

global $Mammen;
$j = 1;
?>
<div class="section masters-ext" id="masters-ext">
    <div class=" main main-masters fourth slide services__content--desc">
        <div class="center">
			<?php echo $Mammen->get_field( 'Произвольный HTML' )?>
            <div class="container border-box border-box--with-bottom">
                <div class="container__wrap"><img src="<?php echo get_template_directory_uri(); ?>/img/border-masters.png" alt=""></div>
                <div class="container__left">
                    <div class="container__title ">
						<?php $title = $Mammen->get_field( 'Заголовок' )?>
                        <h2 class="mobile"><?php echo str_replace(' ', '&nbsp;', $title); ?></h2>
                        <h2 class="desktop f--36"><?php echo $title; ?></h2>
                    </div>
                </div>
                <div class="container__right">
                    <ul class="slider">
						<?php
						$slides = $Mammen->get_fields( 'Слайдер' );
						if ( count( $slides ) ) {
							foreach ( $slides as $slide ) {
								?>
                                <li>
                                    <div class="container__img container__img--desc" style="background-image: url('<?php echo $slide->get_img( 'Картинка Большая', 'large' )[0]['src']; ?>');"></div>
                                    <h3 class="slider-up f--30 masters-ext__titel"><?php echo $slide->get_field( 'Заголовок слайда' ); ?></h3>
                                    <hr class="masters-ext__hr">
                                    <p class="text--italic f--14 slider-up masters-ext__subtitel"><?php echo $slide->get_field( 'Подзаголовок слайда' ); ?></p>

                                    <div class="masters-ext__cont">
                                        <p class="slider-up f--14"><?php echo $slide->get_field( 'Описание слайда' ); ?></p>
                                    </div>
                                </li>
								<?php
							}
						}
						?>
                    </ul>
                    <div class="unslider">
                        <a class="unslider-arrow prev"><img src="<?php echo get_template_directory_uri(); ?>/img/arrow.png" alt="" /></a>
                        <a class="unslider-arrow next"><img src="<?php echo get_template_directory_uri(); ?>/img/arrow.png" alt="" /></a>
                    </div>
                    <div class="container__slider__number">
                        <span>01</span><span>/00</span>
                    </div>
                    <!--<div class="img__tmp"></div>-->
                </div>

                <div class="master-call">
                    <button class="btn master-call_btn" onclick="popup_c({'cat':'обратный-звонок', 'title':'Обратный звонок', 'email': 1, 'time': 0, 'gender': 0, 'description': 'Выбрать мастера'}, this);">Выбрать мастера</button>
                    <div class="master-call_text">
                        Если вы у нас впервые, то мы поможем
                        выбрать лучшего мастера для вас.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="services__content--mobile">
        <div id="1">
            <div class="main services__items--mobile">
                <div class="center">
                    <script>
                        (function ($) {
                            $(function () {
                                mySlider('.services__slider--<?php echo $j; ?>', 'irregular');
                            });
                        }($ || window.jQuery));
                    </script>
                    <div class="container__title services__border-title">
                        <div class="border-line"></div>
						<?php $title = $Mammen->get_field( 'Заголовок' )?>
                        <h3 class="mobile masters-h-mob "><?php echo $title; ?></h3>
                        <div class="border-line"></div>
                    </div>
                    <div class="container__right services__slider services__slider--border-and-title services__slider--<?php echo $j; ?>">
                        <ul class="slick--slider">
							<?php
							if ( count( $slides ) ) {
								foreach ( $slides as $slide ) {
									?>
                                    <li class="services__reach-slider">
                                        <div class="services__first">
                                            <div class="container__img container__img--desc" style="background-image: url('<?php echo $slide->get_img( 'Картинка Большая', 'large' )[0]['src']; ?>');"></div>
                                            <div class="masters-mob-cont">
                                                <h3 class="slider-up f--35"><?php echo $slide->get_field( 'Заголовок слайда' ); ?></h3>
                                                <hr class="mobile__hr">
                                                <p class="master-short-descr f--19 slider-up"><?php echo $slide->get_field( 'Подзаголовок слайда' ); ?></p>

                                                <div class="slider-up master-descr-for-mobile"><?php echo $slide->get_field( 'Краткое описание слайда для мобильных' ); ?></div>
                                                <div class="slider-up master-descr-for-mobile-big"><?php echo $slide->get_field( 'Описание слайда' ); ?></div>
                                            </div>
                                            <!--div class="wrap slider-left"><div class="btn btn--zap">Записаться</div></div-->
                                        </div>
                                    </li>
									<?php
								}
							}
							?>
                        </ul>
                        <!--Кнопка "Выбрать мастера"-->
                        <div class="master-call">
                            <div class="master-call_text">
                                Если вы у нас впервые, то мы поможем
                                выбрать лучшего мастера для вас.
                            </div>
                            <button class="btn master-call_btn" onclick="popup_c({'cat':'обратный-звонок', 'title':'Выбрать мастера', 'email': 1, 'time': 0, 'gender': 0, 'description': 'Выбрать мастера'}, this);">Выбрать мастера</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
