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
 * COMPONENT IMPLEMENTATION: Спец предложения
 *
 */

global $Mammen;
?>

<div class="component--<?php echo $Mammen->get_slug(); ?>">
	<div class="services__content--mobile services__content--hide-tab-name">
		<div id="1">
			<div class="main services__items--mobile">
				<div class="center">
                    <div class="services__m-content services__m-content--1" data-id="1">
                        <h2 class="special__h2"><?php echo tbs_replace_str_with_star(str_replace(array('<br>', '<br />'), ' ', $Mammen->get_field('Название таба Акции'))); ?></h2>
                        <div class="best-service-m slick--slider-init" id="scroll_top_cc_slider">
	                        <?php
	                        $tabs = $Mammen->get_fields( 'Наши акции' );
	                        if ( count( $tabs ) ) {
		                        $j = 0;
		                        foreach ( $tabs as $tab ) {
			                        ?>
                                    <div class="best-service-m__item" data-id="<?php echo $j; ?>">
                                        <div class="best-service-m__center">
                                            <h3 class="special__title"><?php echo $tab->get_field('Заголовок слайда'); ?></h3>
                                        </div>
                                        <div class="best-service-m__center">
                                            <div class="best-service-m__img special__img"
                                                 style="background-image: url('<?php echo $tab->get_img( 'Картинка прямоугольная мобильная', 'large' )[0]['src']; ?>');">
                                            </div>
                                        </div>
                                        <div class="special__big-text"><?php echo $tab->get_field('Крупный текст под названием'); ?></div>
                                        <div class="special__cont f--italic"><?php echo $tab->get_field('Описание под названием'); ?></div><?php
	                                    $class_name = 'zapisatcya';
	                                    $btn = 'Записаться';
	                                    ?>
                                        <style type="text/css">
                                            #fullpage .<?php echo $class_name; ?>::after, #fullpage .<?php echo $class_name; ?>::before {
                                                content: '<? echo $btn; ?>' !important;
                                            }
                                        </style>
                                        <div class="best-service-m__center">
                                            <?php
                                            if ($tab->get_field('Использовать Окно Подробнее')) {
                                                $image_src_mobi = $tab->get_img( 'Картинка окна', 'large' )[0]['src'];
                                                $text_left_bt = $tab->get_field('Текст слева внизу');
                                                $title_to_mobi = $tab->get_field('Заголовок окна');
                                                $title_to_mobi_after_img =  $tab->get_field('Подзаголовок окна');
                                                ?>
                                                <div class="btn btn--small-more social_btn--small-more my_btn_mobi_open_cc" data-id="<?php echo $j; ?>">Подробнее</div>
                                            <?php } else { ?>
                                                <div class="btn btn--small-more best-service-m__btn <?php echo $class_name; ?>" onclick="popup_c({'cat':'Акции', 'title':'<?php echo $btn; ?>', 'subtitle':'<?php echo $tab->get_field('Заголовок слайда'); ?>', 'email': 1, 'time': 0, 'gender': 0, 'modal_text': '<?php echo str_replace(array('<br>', '<br />'), ' ', $tab->get_field('Описание под названием')); ?>', 'description': 'Акция: <?php echo str_replace(array('<br>', '<br />'), ' ', $tab->get_field('Описание под названием')); ?>. /<?php echo str_replace(array('<br>', '<br />'), ' ', $tab->get_field( 'Описание под названием')); ?>/', 'template': 'wide'}, this);"><? echo $btn; ?></div>
                                            <?php } ?>
                                        </div>
                                    </div>
			                        <?php
		                        }
	                        }
                            ?>
                        </div>
                        <div class="pattern-line"></div>
                                    <div class="social_content_slides my_mobi_open_cc" id="scroll_mobi_active" style="display: none;">

                                                            <div class="social_mobi">
                                                                <div class="title_mobi">
                                                                    <h2 style="font-size: 36px;" id="window_title_id" ><?php if ($title_to_mobi) { echo $title_to_mobi; } ?></h2>
                                                                </div>
                                                                <div class="social_right_mobi" style="text-align: center!important;">
                                                                    <img src="<?php if ($image_src_mobi) { echo $image_src_mobi; } ?>" alt="image" id="image_id" style="max-width: 100%; width: auto;">
                                                                    <div class="r-text">
                                                                        <h3><?php if ($text_left_bt) { echo $title_to_mobi_after_img; } ?></h3>
                                                                        <p id="text_left_id"><?php if ($text_left_bt) { echo $text_left_bt; } ?></p>
                                                                    </div>
                                                                    <div class="social_list_mobi">

                                                                        <a href="https://www.facebook.com/waithairechnoi/posts/1661690440595965" target="_blank">
                                                                            <span><?php _e('Вступить') ?></span>
                                                                            <i class="fab fa-facebook-f"></i>
                                                                        </a>
                                                                        <a href="https://www.instagram.com/waithairechnoi/" target="_blank">
                                                                            <span><?php _e('Вступить') ?></span>
                                                                            <i class="fab fa-instagram"></i>
                                                                        </a>
                                                                        <a href="https://vk.com/thaispasalon" target="_blank">
                                                                            <span><?php _e('Вступить') ?></span>
                                                                            <i class="fab fa-vk"></i>
                                                                        </a>
                                                                        <button  class="my_btn my_btn_mobi my_btn_mobi_cc" data-id="<?php echo $j; ?>" style="position:relative!important;"><?php _e('Назад') ?></button>

                                                                    </div>
                                                                </div>




                                                            </div>
                                                        </div>
                    </div>
                    <h3 class="services__title services__title--1 services__title--slick" data-id="1">
                        <span class="services__title-num">01</span>
                        <span class="services__title-text"><?php echo tbs_replace_str_with_star($Mammen->get_field('Название таба Акции')); ?></span>
                    </h3>
                    <div class="services__m-content services__m-content--2" data-id="2">
                        <div class="pattern-line"></div>
                        <h2 class="special__h2"><?php echo tbs_replace_str_with_star(str_replace(array('<br>', '<br />'), ' ', $Mammen->get_field('Название таба Абонементы'))); ?></h2>
                        <div class="best-service-m  slick--slider-init">
							<?php
							$slides = $Mammen->get_fields( 'Слайд' );
							if ( count( $slides ) ) {
								$y = 0;
								foreach ( $slides as $slide ) {
									?>
                                    <div class="best-service-m__item" data-id="<?php echo $j; ?>">
                                        <div class="best-service-m__center">
                                            <div class="best-service-m__img special__img best-service-m__img--contain"
                                                 style="background-image: url('<?php echo $slide->get_img( 'Картинка Большая', 'large' )[0]['src']; ?>');">
                                            </div>
                                        </div>
                                        <div class="special__big-text"><?php echo $slide->get_field('Заголовок абонемента'); ?></div>
                                        <div class="special__cont"><?php echo $slide->get_field('Описание абонемента'); ?></div>
                                        <div class="special__big-price-m"><?php echo nbsp($slide->get_field('Стоимость абонемента')); ?>&nbsp;<span class="rub">₽</span></div>
                                        <?php
										$class_name = 'priobresti';
										$btn = 'приобрести';
										?>
                                        <style type="text/css">
                                            #fullpage .<?php echo $class_name; ?>::after, #fullpage .<?php echo $class_name; ?>::before {
                                                content: '<? echo $btn; ?>' !important;
                                            }
                                        </style>
                                        <div class="best-service-m__center">
                                            <div class="btn btn--small-more best-service-m__btn <?php echo $class_name; ?>" onclick="popup_c({'cat':'Абонемент', 'title':'<?php echo $btn; ?>', 'subtitle':'<?php echo str_replace(array('<br>', '<br />'), ' ', $slide->get_field('Заголовок абонемента')); ?>', 'email': 1, 'time': 0, 'gender': 0, 'modal_text': '<?php echo str_replace(array('<br>', '<br />'), ' ', strip_tags($slide->get_field('Описание абонемента'))); ?>', 'description': 'Абонемент: <?php echo str_replace(array('<br>', '<br />'), ' ', strip_tags($slide->get_field('Заголовок абонемента'))); ?>. /<?php echo str_replace(array('<br>', '<br />'), ' ', strip_tags($slide->get_field( 'Описание абонемента'))); ?>/', 'template': 'wide'}, this);"><? echo $btn; ?></div>
                                        </div>
                                    </div>
									<?php
								}
							}
							?>
                        </div>
                        <div class="pattern-line"></div>

                    </div>
                    <h3 class="services__title services__title--2 services__title--slick" data-id="2">
                        <span class="services__title-num">02</span>
                        <span class="services__title-text"><?php echo tbs_replace_str_with_star($Mammen->get_field('Название таба Абонементы')); ?></span>
                    </h3>
                    <div class="services__m-content services__m-content--3" data-id="3">
                        <div class="pattern-line"></div>
                        <h2 class="special__h2"><?php echo tbs_replace_str_with_star(str_replace(array('<br>', '<br />'), ' ', $Mammen->get_field('Название таба Подарки'))); ?></h2>
                        <div class="best-service-m__center">
                            <img src="<?php echo $Mammen->get_img( 'Фон подарки', 'large' )[0]['src']; ?>" class="special__img">
                        </div>
                        <div class="special__big-text"><?php echo $Mammen->get_field( 'Заголовок подарков' ); ?></div>
                        <div class="special__cont"><?php echo $Mammen->get_field( 'Описание подарков' ); ?></div>
	                    <?php
	                    $btn = $Mammen->get_field( 'Текст кнопки подарков' );
	                    $class_name = str_replace(' ', '', tbs_translit($btn));
	                    ?>
                        <style type="text/css">
                            #fullpage .<?php echo $class_name; ?>::after, #fullpage .<?php echo $class_name; ?>::before {
                                content: '<? echo $btn; ?>' !important;
                            }
                        </style>
                        <div class="best-service-m__center">
                            <div class="btn btn--small-more best-service-m__btn <?php echo $class_name; ?>" onclick="popup_c({'cat':'Сделать подарок', 'title':'<?php echo $btn; ?>', 'subtitle':'<?php echo str_replace(array('<br>', '<br />'), ' ', $Mammen->get_field( 'Заголовок подарков' )); ?>', 'email': 1, 'time': 0, 'gender': 0, 'modal_text': '<?php echo str_replace(array('<br>', '<br />'), ' ', $Mammen->get_field('Описание подарков')); ?>', 'description': 'Абонемент: <?php echo str_replace(array('<br>', '<br />'), ' ', $Mammen->get_field( 'Заголовок подарков' )); ?>. /<?php echo str_replace(array('<br>', '<br />'), ' ', $Mammen->get_field( 'Описание подарков')); ?>/', 'template': 'wide'}, this);"><? echo $btn; ?></div>
                        </div>
                    </div>
                    <h3 class="services__title services__title--3" data-id="3">
                        <span class="services__title-num">03</span>
                        <span class="services__title-text"><?php echo tbs_replace_str_with_star($Mammen->get_field('Название таба Подарки')); ?></span>
                    </h3>
				</div>
			</div>

		</div>
	</div>

	<div class="services__content">
		<div id="services__blocks">
			<div id="1">
				<div class="main dotted__items">
					<div class="center center--h100 cont-with-more">
                        <div class="cont-with-more__cont container border-box service-slider slider-box">
                            <div class="container__right">
                                <ul class="slider scroll-box">
									<?php
									$tabs = $Mammen->get_fields( 'Наши акции' );
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
                                                            <div class="scrollable scrollable--not-init">
																<?php echo $tab->get_field('Описание справа картинки'); ?>
                                                            </div>
															<?php
															if ($tab->get_field('Использовать Окно Подробнее') OR false) :
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
                                                                <div class="btn btn--small-more <?php echo $class_name; ?>" onclick="popup_c({'cat':'Акции', 'title':'<?php echo $btn; ?>', 'subtitle':'<?php echo $tab->get_field('Заголовок слайда'); ?>', 'email': 1, 'time': 0, 'gender': 0, 'modal_text': '<?php echo str_replace(array('<br>', '<br />'), ' ', $tab->get_field('Описание под названием')); ?>', 'description': 'Акция: <?php echo str_replace(array('<br>', '<br />'), ' ', $tab->get_field('Описание под названием')); ?>. /<?php echo str_replace(array('<br>', '<br />'), ' ', $tab->get_field( 'Описание под названием')); ?>/', 'template': 'wide'}, this);"><? echo $btn; ?></div>
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

											if ($tab->get_field('Использовать Окно Подробнее') OR false) :
											// Формирование "Подробнее"
											ob_start();
											?>
                                            <div id="i-<?php echo $j; ?>" class="more-box__item more-box__item--<?php echo $j; ?>" style="margin-top: 31vh;">
                                               <div class="main enroll"  id="scroll_to_mobi_<?php echo $j; ?>">
                                                    <div class="center more-box__center" style="max-height: unset; height: auto; padding-right: 0; width: 100%!important; padding-left: 15px;">
                                                        <div class="container__wrap"><img src="<?php echo get_template_directory_uri(); ?>/img/border-8.png" alt=""></div>
                                                        <button class="social_content_slides_hode btn btn__back">НАЗАД</button>
                                                        <?php
                                                        $class_name = 'zapisatcya';
                                                        $btn = 'Записаться';
                                                        ?>
                                                        <style type="text/css">
                                                            #fullpage .<?php echo $class_name; ?>::after, #fullpage .<?php echo $class_name; ?>::before {
                                                                content: '<? echo $btn; ?>' !important;
                                                            }
                                                        </style>
                                                        <button class="social_content_slides_hode btn btn__enroll <?php echo $class_name; ?>" onclick="popup_c({'cat':'Акции', 'title':'<?php echo $btn; ?>', 'subtitle':'<?php echo $tab->get_field('Заголовок окна'); ?>', 'email': 1, 'time': 0, 'gender': 0, 'modal_text': '<?php echo str_replace(array('<br>', '<br />'), ' ', $tab->get_field('Подзаголовок окна')); ?>', 'description': 'Акция: <?php echo str_replace(array('<br>', '<br />'), ' ', $tab->get_field('Заголовок окна')); ?>. /<?php echo str_replace(array('<br>', '<br />'), ' ', $tab->get_field( 'Подзаголовок окна')); ?>/', 'template': 'wide'}, this);" style="right: 18%; box-shadow: none!important;
    transform: translateX(50%);"><? echo $btn; ?></button>

                                                        <div class="social_content_slides">
                                                            <div class="content_social">
                                                                <div class="both"></div>
                                                                <div class="social_left">
                                                                    <div class="l-text">
                                                                        <h2><?php echo $tab->get_field('Заголовок окна'); ?></h2>
                                                                        <h3><?php echo $tab->get_field('Текст слева капс'); ?></h3>
                                                                        <p><?php echo $tab->get_field('Текст слева внизу'); ?></p>
                                                                    </div>
                                                                    <div class="social-bt">
                                                                        <div class="social_cont">
                                                                            <div class="social_wrap">
                                                                                <a href="https://vk.com/thaispasalon" target="_blank">
                                                                                    <div class="social_wrap_img">
                                                                                        <i class="fab fa-vk fa-2x"></i>
                                                                                    </div>
                                                                                </a>

                                                                            </div>
                                                                            <a href="https://vk.com/thaispasalon" target="_blank"><?php _e('Вступить') ?></a>
                                                                        </div>
                                                                        <div class="social_cont">
                                                                            <div class="social_wrap">
                                                                                <a href="https://www.instagram.com/waithairechnoi/" target="_blank">
                                                                                    <div class="social_wrap_img">
                                                                                        <i class="fab fa-instagram fa-2x"></i>
                                                                                    </div>
                                                                                </a>

                                                                            </div>
                                                                            <a href="https://www.instagram.com/waithairechnoi/" target="_blank"><?php _e('Вступить') ?></a>
                                                                        </div>
                                                                        <div class="social_cont">
                                                                            <div class="social_wrap">
                                                                                <a href="https://www.facebook.com/waithairechnoi/" target="_blank">
                                                                                    <div class="social_wrap_img">
                                                                                        <i class="fab fa-facebook-f fa-2x"></i>
                                                                                    </div>
                                                                                </a>

                                                                            </div>
                                                                            <a href="https://www.facebook.com/waithairechnoi/" target="_blank"><?php _e('Вступить') ?></a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="social_right">
                                                                    <img src="<?php $img_right = $tab->get_img( 'Картинка окна', 'large' )[0]['src'];  echo $img_right; ?>" alt="image">
                                                                    <div class="r-text">
                                                                        <div>
                                                                            <?php echo $tab->get_field('Описание справа окна'); ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="both"></div>
                                                            </div>

                                                            <div class="social_mobi">
                                                                <div class="lines_mobi"></div>
                                                                <div class="title_mobi">
                                                                    <h2 style="font-size: 36px;" id="window_title_id" ><?php if ($title_to_mobi) { echo $title_to_mobi; } ?></h2>
                                                                </div>
                                                                <div class="social_right_mobi" style="text-align: center!important;">
                                                                    <img src="<?php if ($image_src_mobi) { echo $image_src_mobi; } ?>" alt="image" id="image_id" style="max-width: 100%; width: auto;">
                                                                    <div class="r-text">
                                                                        <h3><?php if ($text_left_bt) { echo $title_to_mobi_after_img; } ?></h3>
                                                                        <p id="text_left_id"><?php if ($text_left_bt) { echo $text_left_bt; } ?></p>
                                                                    </div>
                                                                    <div class="social_list_mobi">

                                                                        <a href="https://www.facebook.com/waithairechnoi/posts/1661690440595965" target="_blank">
                                                                            <span><?php _e('Вступить') ?></span>
                                                                            <i class="fab fa-facebook-f"></i>
                                                                        </a>
                                                                        <a href="https://www.instagram.com/waithairechnoi/" target="_blank">
                                                                            <span><?php _e('Вступить') ?></span>
                                                                            <i class="fab fa-instagram"></i>
                                                                        </a>
                                                                        <a href="https://vk.com/thaispasalon" target="_blank">
                                                                            <span><?php _e('Вступить') ?></span>
                                                                            <i class="fab fa-vk"></i>
                                                                        </a>
                                                                        <button  class="my_btn my_btn_mobi" data-id="<?php echo $j; ?>" style="position:relative!important;"><?php _e('Назад') ?></button>

                                                                    </div>
                                                                </div>




                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
											<?php
											$more_html .= ob_get_contents();
											ob_end_clean(); // втихую отбрасывает содержимое буфера
                                            endif;

											$j++;
										}
									}
									?>
                                </ul>
                                <div class="img__tmp"></div>
                            </div>
                            <div class="under-slide">
                                <div class="unslider--100">
                                    <a class="prev" style="display: none;"></a>
                                    <a class="next" style="display: none;"></a>
                                    <a class="unslider-arrow--round _prev"><img src="<?php echo get_template_directory_uri(); ?>/img/arrow.png" alt="" /></a>
                                    <a class="unslider-arrow--round _next"><img src="<?php echo get_template_directory_uri(); ?>/img/arrow.png" alt="" /></a>
                                </div>
                                <div class="unslider--100 unslider--dotes unslider--lazy-load">
									<?php echo $dotes; ?>
                                </div>
                                <div class="under-slide__line"></div>
                            </div>
                        </div>
                        <div class="cont-with-more__more more-box"><?php echo $more_html; ?></div>
					</div>
				</div>
			</div>
			<div id="2">
				<div class="main services__items">
					<div class="center">
						<div class="container__wrap"><img src="<?php echo get_template_directory_uri(); ?>/img/border-6.png" alt=""></div>
						<ul class="slider">
							<li class="blockSlideDown" style="display: flex;">
								<?php
								$slides = $Mammen->get_fields( 'Слайд' );
								if ( count( $slides ) ) {
									$y = 0;
									foreach ( $slides as $slide ) {
										if ( ( $y % 3 ) == 0 AND $y ) {
											echo '</li>';
											echo '<li style="display: none;">';
										}
										++ $y;
										++ $p;
										?>
										<div class="services__items__block">
											<div class="services__item__left img--card img--contain" style="background-image: url('<?php echo $slide->get_img( 'Картинка Большая', 'large' )[0]['src']; ?>');"></div>
											<div class="services__item__right">
												<h3><?php echo $slide->get_field('Заголовок абонемента'); ?></h3>
												<div class="services__item__right__bottom">
													<div class="services__item__bottom__left">
														<p class=""><?php echo $slide->get_field('Описание абонемента'); ?></p>
													</div>
													<div class="services__item__bottom__right">
                                                        <div class="special__big-price"><?php echo nbsp($slide->get_field('Стоимость абонемента')); ?>&nbsp;<span class="rub">₽</span></div>
                                                        <?php
														$class_name = 'priobresti';
														$btn = 'приобрести';
														?>
                                                        <style type="text/css">
                                                            #fullpage .<?php echo $class_name; ?>::after, #fullpage .<?php echo $class_name; ?>::before {
                                                                content: '<? echo $btn; ?>' !important;
                                                                top: 0;
                                                            }
                                                            #fullpage .<?php echo $class_name; ?>::after {
                                                                top: 3px;
                                                            }
                                                        </style>
                                                        <div class="btn btn--small-more <?php echo $class_name; ?>" onclick="popup_c({'cat':'Абонемент', 'title':'<?php echo $btn; ?>', 'subtitle':'<?php echo str_replace(array('<br>', '<br />'), ' ', $slide->get_field('Заголовок абонемента')); ?>', 'email': 1, 'time': 0, 'gender': 0, 'modal_text': '<?php echo str_replace(array('<br>', '<br />'), ' ', strip_tags($slide->get_field('Описание абонемента'))); ?>', 'description': 'Абонемент: <?php echo str_replace(array('<br>', '<br />'), ' ', strip_tags($slide->get_field('Заголовок абонемента'))); ?>. /<?php echo str_replace(array('<br>', '<br />'), ' ', strip_tags($slide->get_field( 'Описание абонемента'))); ?>/', 'template': 'wide'}, this);"><? echo $btn; ?></div>
                                                    </div>
												</div>
											</div>
										</div>
										<?php
									}
								}
								?>
							</li>
						</ul>
						<div class="unslider">
							<a class="unslider-arrow prev"><img src="<?php echo get_template_directory_uri(); ?>/img/arrow.png" alt="" /></a>
							<a class="unslider-arrow next"><img src="<?php echo get_template_directory_uri(); ?>/img/arrow.png" alt="" /></a>
						</div>
					</div>
				</div>
			</div>
			<div id="3">
				<div class="main services__items">
					<div class="center">
						<div class="special-presents">
                            <div class="special-presents__bg" style="background-image: url('<?php echo $Mammen->get_img( 'Фон подарки', 'large' )[0]['src']; ?>');"></div>
                            <div class="special-presents__box">
                                <div class="special-presents__title"><?php echo $Mammen->get_field( 'Заголовок подарков' ); ?></div>
                                <div class="special-presents__cont"><?php echo $Mammen->get_field( 'Описание подарков' ); ?></div>
                                <div class="special-presents__btn">
	                                <?php
	                                $btn = $Mammen->get_field( 'Текст кнопки подарков' );
	                                $class_name = str_replace(' ', '', tbs_translit($btn));
	                                ?>
                                    <style type="text/css">
                                        #fullpage .<?php echo $class_name; ?>::after, #fullpage .<?php echo $class_name; ?>::before {
                                            content: '<? echo $btn; ?>' !important;
                                            top: 0;
                                        }
                                        #fullpage .<?php echo $class_name; ?>::after {
                                            top: 3px;
                                        }
                                    </style>
                                    <div class="btn btn--small-more <?php echo $class_name; ?>" onclick="popup_c({'cat':'Сделать подарок', 'title':'<?php echo $btn; ?>', 'subtitle':'<?php echo str_replace(array('<br>', '<br />'), ' ', $Mammen->get_field( 'Заголовок подарков' )); ?>', 'email': 1, 'time': 0, 'gender': 0, 'modal_text': '<?php echo str_replace(array('<br>', '<br />'), ' ', $Mammen->get_field('Описание подарков')); ?>', 'description': 'Абонемент: <?php echo str_replace(array('<br>', '<br />'), ' ', $Mammen->get_field( 'Заголовок подарков' )); ?>. /<?php echo str_replace(array('<br>', '<br />'), ' ', $Mammen->get_field( 'Описание подарков')); ?>/', 'template': 'wide'}, this);"><? echo $btn; ?></div>
                                </div>
                            </div>
                        </div>
					</div>
				</div>
			</div>
		</div>
	</div>



	<div class="services__main ">
		<div class="services__main__left">
			<img src="<?php $img1 = $Mammen->get_img( 'Изображение hover-эффект Акции', 'large' )[0]['src']; echo $img1; ?>" alt="" class="img--hidden">
			<a href="#" class="services__link" data-target="services__blocks 1" data-img="<?php echo $img1; ?>">
				<span>01</span>
				<span><?php echo $Mammen->get_field('Название таба Акции'); ?></span>
			</a>
			<img src="<?php $img2 = $Mammen->get_img( 'Изображение hover-эффект Абонементы', 'large' )[0]['src']; echo $img2; ?>" alt="" class="img--hidden">
			<a href="#абонементы" id="duck" class="services__link" data-target="services__blocks 2" data-img="<?php echo $img2; ?>">
				<span>02</span>
				<span><?php echo $Mammen->get_field('Название таба Абонементы'); ?></span>
			</a>
			<img src="<?php $img3 = $Mammen->get_img( 'Изображение hover-эффект Подарки', 'large' )[0]['src']; echo $img3; ?>" alt="" class="img--hidden">
			<a href="#сертификаты" id="daffy" class="services__link" data-target="services__blocks 3" data-img="<?php echo $img3; ?>">
				<span>03</span>
				<span><?php echo $Mammen->get_field('Название таба Подарки'); ?></span>
			</a>
		</div>
		<div class="services__main__right block--back-image hover-target-image" style="background-image: url('<?php echo $img1; ?>');"></div>
	</div>
	<script type="text/javascript" charset="utf-8">
$(document).ready(function(){ // функция будет выполнена при полной загрузке страницы
// 	if("http://thaibeautyspa.kutalo.com/спец-предложения/".indexOf('#') > -1)
// 	if (document.location.href.indexOf('#сертификаты') == -1)
// 	{

	
// // 		history.pushState('', document.title, window.location.pathname);
// 	}

	if (/#%D1%81%D0%B5%D1%80%D1%82%D0%B8%D1%84%D0%B8%D0%BA%D0%B0%D1%82%D1%8B/.test(location.href)) {
		   setTimeout(function(){ // если нужно устанавливаем задержку выполнения действия
      $('#daffy').click(); // имитируем нажатие кнопкой мишы на блок
   },600); // время задержки в милисикундах
  console.info('Ссылка содержит слово сертификаты');
} else {
  console.info('Ссылка не содержит слово сертификаты');
}
		if (/#%D0%B0%D0%B1%D0%BE%D0%BD%D0%B5%D0%BC%D0%B5%D0%BD%D1%82%D1%8B/.test(location.href)) {
		   setTimeout(function(){ // если нужно устанавливаем задержку выполнения действия
      $('#duck').click(); // имитируем нажатие кнопкой мишы на блок
   },600); // время задержки в милисикундах
} else {
		}
});
	</script>
	
	<div class="sections">

		<div class="section" id="section1">
		</div>

		<div class="section" id="section2">
		</div>

		<div class="section" id="section3">
		</div>
	</div>
</div>