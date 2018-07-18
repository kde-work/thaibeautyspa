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
 * COMPONENT IMPLEMENTATION: Акции
 *
 */

global $Mammen;
?>

<div class="section desktop" id="zero">
	<div class="main shares slide">
		<div class="center startPosition cont-with-more">
			<span class="s s--top-right">S</span>
			<span class="t t--bottom-left">T</span>
			<span class="b b--center-big"><img src="<?php echo get_template_directory_uri(); ?>/img/B.png" alt=""></span>
			<div class="cont-with-more__cont container border-box service-slider slider-box">
				<div class="container__right">
					<ul class="slider scroll-box">
						<?php
						$tabs = $Mammen->get_fields( 'Слайд' );
						if ( count( $tabs ) ) {
						    $j = 0;
						    foreach ( $tabs as $tab ) {
								?>
								<li class="slider-box__slide slider-box__slide--<?php echo $j; ?>" style="<?php echo ($j)?'display: none;':''; ?>">
									<div class="slider-box__cont">
                                        <h3 class="slider-box__title"><?php echo $tab->get_field('Заголовок слайда'); ?></h3>
                                        <div class="slider-box__big-text"><?php echo $tab->get_field('Крупный текст под названием'); ?></div>
                                        <div class="slider-box__under-title"><?php echo $tab->get_field('Описание под названием'); ?></div>
                                        <div class="slider-box__right height-cover">
                                            <div class="slider-box__right-cont">
                                                <div class="scrollable">
                                                    <?php echo $tab->get_field('Описание справа картинки'); ?>
                                                </div>
                                                <?php
                                                if ($tab->get_field('Использовать Окно Подробнее')) :
                                                ?>
                                                    <div class="btn btn--small-more cont-with-more__btn" data-id="<?php echo $j; ?>">Подробнее</div>
                                                <?php else : ?>
	                                                <?php
	                                                $class_name = 'zapisatcya';
	                                                $btn = 'Записаться';
	                                                ?>
                                                    <style type="text/css">
                                                        #fullpage .<?php echo $class_name; ?>::after, #fullpage .<?php echo $class_name; ?>::before {
                                                            content: '<? echo $btn; ?>' !important;
                                                        }
                                                    </style>
                                                    <div class="btn btn--small-more <?php echo $class_name; ?>" onclick="popup_c({'cat':'<?php echo get_the_title(); ?>', 'title':'<?php echo $btn; ?>', 'subtitle':'<?php echo $tab->get_field('Заголовок слайда'); ?>', 'email': 1, 'time': 0, 'gender': 0, 'modal_text': '<?php echo str_replace(array('<br>', '<br />'), ' ', $tab->get_field('Описание под названием')); ?>', 'description': 'Акция: <?php echo str_replace(array('<br>', '<br />'), ' ', $tab->get_field('Описание под названием')); ?>. /<?php echo str_replace(array('<br>', '<br />'), ' ', $tab->get_field( 'Описание под названием')); ?>/', 'template': 'wide'}, this);"><? echo $btn; ?></div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="scroll-box__img height-cover"
                                             style="background-image: url('<?php echo $tab->get_img( 'Картинка в круге', 'large' )[0]['src']; ?>');">
                                        </div>
                                    </div>
								</li>
								<?php
								ob_start();
								?>
								<div class="dot__item dot__item--<?php echo $j; ?> <?php echo (!$j)?'dot__item--active':''; ?>" data-id="<?php echo $j; ?>">
									<div class="dot-item__img"><img src="<?php echo $tab->get_img( 'Картинка', 'large' )[0]['src']; ?>"></div>
									<div class="dot-item__title"><?php echo $tab->get_field('Заголовок'); ?></div>
								</div>
								<?php
								$dotes .= ob_get_contents();
								ob_end_clean();

							    // Формирование "Подробнее"
							    ob_start();
							    ?>
                                <div id="<?php echo $j; ?>" class="more-box__item more-box__item--<?php echo $j; ?>">
                                    <div class="main enroll">
                                        <div class="center more-box__center">
                                            <div class="container__wrap"><img src="<?php echo get_template_directory_uri(); ?>/img/border-8.png" alt=""></div>
                                            <button class="btn btn__back">НАЗАД</button>
										    <?php
										    $class_name = 'zapisatcya';
										    $btn = 'Записаться';
										    ?>
                                            <style type="text/css">
                                                #fullpage .<?php echo $class_name; ?>::after, #fullpage .<?php echo $class_name; ?>::before {
                                                    content: '<? echo $btn; ?>' !important;
                                                }
                                            </style>
                                            <button class="btn btn__enroll <?php echo $class_name; ?>" onclick="popup_c({'cat':'<?php echo get_the_title(); ?>', 'title':'<?php echo $btn; ?>', 'subtitle':'<?php echo $tab->get_field('Заголовок окна'); ?>', 'email': 1, 'time': 0, 'gender': 0, 'modal_text': '<?php echo str_replace(array('<br>', '<br />'), ' ', $tab->get_field('Подзаголовок окна')); ?>', 'description': 'Акция: <?php echo str_replace(array('<br>', '<br />'), ' ', $tab->get_field('Заголовок окна')); ?>. /<?php echo str_replace(array('<br>', '<br />'), ' ', $tab->get_field( 'Подзаголовок окна')); ?>/', 'template': 'wide'}, this);"><? echo $btn; ?></button>

                                            <div class="enroll__top">
                                                <div class="enroll__top__left">
                                                    <h3><?php echo $tab->get_field('Заголовок окна'); ?></h3>
                                                    <hr>
                                                    <p class="text--italic"><?php echo $tab->get_field('Подзаголовок окна'); ?></p>
                                                </div>
                                                <div class="enroll__top__right block--back-image" style="background-image: url('<?php echo $tab->get_img( 'Картинка окна', 'large' )[0]['src']; ?>');">
                                                </div>
                                            </div>
                                            <div class="enroll__bottom">
                                                <div class="enroll__bottom__left">
                                                    <div class="more-box__caps align--left">
	                                                    <?php echo $tab->get_field('Текст слева капс'); ?>
                                                    </div>
                                                    <div class="align--left">
													    <?php echo $tab->get_field('Текст слева внизу'); ?>
                                                    </div>
                                                </div>

                                                <div class="enroll__bottom__right">
                                                    <div class="scrollable">
													    <?php echo $tab->get_field('Описание справа окна'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
							    <?php
							    $more_html .= ob_get_contents();
							    ob_end_clean(); // втихую отбрасывает содержимое буфера

								$j++;
							}
						}
						?>
					</ul>
					<div class="img__tmp"></div>
				</div>
				<div class="under-slide">
					<div class="unslider--100">
						<a class="unslider-arrow--round prev"><img src="<?php echo get_template_directory_uri(); ?>/img/arrow.png" alt="" /></a>
						<a class="unslider-arrow--round next"><img src="<?php echo get_template_directory_uri(); ?>/img/arrow.png" alt="" /></a>
					</div>
					<div class="unslider--100 unslider--dotes">
						<?php echo $dotes; ?>
					</div>
                    <div class="under-slide__line"></div>
				</div>
			</div>
            <div class="cont-with-more__more more-box"><?php echo $more_html; ?></div>
		</div>
	</div>
</div>