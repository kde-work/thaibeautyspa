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
 * COMPONENT IMPLEMENTATION: Слайдер Текст Слева
 *
 */

global $Mammen;
$j = 1;
?>
<div class="section services__content--desc" id="fourth">
	<div class="main fourth slide active">
		<div class="center">
			<?php echo $Mammen->get_field( 'Произвольный HTML' )?>
			<div class="container border-cont">
                <div class="container__left">
                </div>
                <div class="border-cont__title border-cont__title--left-cont">
                    <div class="border-line border-line--desc border-line--30"></div>
                    <div class="container__title">
	                    <?php $title = $Mammen->get_field( 'Заголовок' )?>
                        <h2 class="schedule__title h2--one-line mobile"><?php echo str_replace(' ', '&nbsp;', $title); ?></h2>
                        <h2 class="schedule__title h2--one-line desktop"><?php echo $title; ?></h2>
                    </div>
                    <div class="border-line border-line--desc"></div>
                </div>
				<div class="container__right scroll-box">
					<ul class="slider">
						<?php
						$slides = $Mammen->get_fields( 'Слайдер' );
						if ( count( $slides ) ) {
							foreach ( $slides as $slide ) {
								?>
								<li class="scroll-box__slide">
                                    <div class="container__img container__img--desc container__img--not-js-height" style="background-image: url('<?php echo $slide->get_img( 'Картинка Большая', 'large' )[0]['src']; ?>');"></div>
                                    <div class="scroll-box__cont">
                                        <div class="scrollable scrollable--100-60">
                                            <h3 class="slider-up"><?php echo $slide->get_field( 'Заголовок слайда' ); ?></h3>
                                            <p class="text--italic slider-up"><?php echo $slide->get_field( 'Подзаголовок слайда' ); ?></p>
                                            <hr>
                                            <p class="slider-up"><?php echo $slide->get_field( 'Описание слайда' ); ?></p>
                                        </div>
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
                    <h3 class="mobile"><?php echo str_replace(' ', '&nbsp;', $title); ?></h3>
                    <div class="border-line"></div>
                </div>
                <div class="container__right services__slider services__slider--border-and-title services__slider--<?php echo $j; ?>">
                    <ul class="slider">
						<?php
						if ( count( $slides ) ) {
							foreach ( $slides as $slide ) {
								?>
                                <li class="services__reach-slider">
                                    <div class="services__first">
                                        <div class="container__img container__img--desc" style="background-image: url('<?php echo $slide->get_img( 'Картинка Большая', 'large' )[0]['src']; ?>');"></div>
                                        <h3 class="slider-up"><?php echo $slide->get_field( 'Заголовок слайда' ); ?></h3>
                                        <p class="text--italic slider-up"><?php echo $slide->get_field( 'Подзаголовок слайда' ); ?></p>
                                        <hr>
                                        <p class="slider-up"><?php echo $slide->get_field( 'Описание слайда' ); ?></p>
                                        <div class="wrap slider-left"><!--<div class="btn btn--zap">Записаться</div>--></div>
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
                </div>
            </div>
        </div>
    </div>
</div>