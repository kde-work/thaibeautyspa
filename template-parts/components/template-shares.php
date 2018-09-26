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
<div class="section" id="zero">
	<div class="main shares slide">
		<div class="center startPosition cont-with-more">
			<span class="s s--top-right">S</span>
			<span class="t t--bottom-left">T</span>
			<span class="b b--center-big"><img src="<?php echo get_template_directory_uri(); ?>/img/B.png" alt=""></span>
            <div class="best-service-m slick--slider mobile">
				<?php
				$tabs = $Mammen->get_fields( 'Слайд' );
				if ( count( $tabs ) ) {
					$j = 0;
					foreach ( $tabs as $tab ) {
                        $j++
						?>
                        <div class="best-service-m__item shares-mobile" data-id="<?php echo $j; ?>"  id="scroll_to_mobi_top_<?php echo $j; ?>">
                            <div class="special__title f--center"><?php echo $tab->get_field('Заголовок слайда'); ?></div>
                            <div class="special__big-text f--center"><?php echo $tab->get_field('Крупный текст под названием'); ?></div>
                            <div class="shares-mobile__cont-img">
                                <img src="<?php echo $tab->get_img( 'Картинка в круге', 'large' )[0]['src']; ?>" class="shares-mobile__img">
                            </div>
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
                            <div class="btn btn--small-more social_btn--small-more my_btn_mobi_open" data-id="<?php echo $j; ?>">Подробнее</div>
                        <?php } else {
                            //cont-with-more__btn
                            ?>
                                <div class="btn btn--small-more best-service-m__btn <?php echo $class_name; ?>" onclick="popup_c({'cat':'Акции', 'title':'<?php echo $btn; ?>', 'subtitle':'<?php echo $tab->get_field('Заголовок слайда'); ?>', 'email': 1, 'time': 0, 'gender': 0, 'modal_text': '<?php echo str_replace(array('<br>', '<br />'), ' ', $tab->get_field('Описание под названием')); ?>', 'description': 'Акция: <?php echo str_replace(array('<br>', '<br />'), ' ', $tab->get_field('Описание под названием')); ?>. /<?php echo str_replace(array('<br>', '<br />'), ' ', $tab->get_field( 'Описание под названием')); ?>/', 'template': 'wide'}, this);"><? echo $btn; ?></div>
                           <?php } ?>
                            </div>
                        </div>
						<?php
					}
				}
				?>
            </div>
			<div class="cont-with-more__cont container border-box service-slider slider-box desktop">
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

							    // Формирование "Подробнее"
							    ob_start();
							    ?>
                                <div id="<?php echo $j; ?>" class="more-box__item more-box__item--<?php echo $j; ?>" >
                                    <div class="main enroll"  id="scroll_to_mobi_<?php echo $j; ?>">
                                        <div class="center more-box__center" style="padding-right: 0; width: 100%!important; padding-left: 15px;">
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
                                            <button class="social_content_slides_hode btn btn__enroll <?php echo $class_name; ?>" onclick="popup_c({'cat':'Акции', 'title':'<?php echo $btn; ?>', 'subtitle':'<?php echo $tab->get_field('Заголовок окна'); ?>', 'email': 1, 'time': 0, 'gender': 0, 'modal_text': '<?php echo str_replace(array('<br>', '<br />'), ' ', $tab->get_field('Подзаголовок окна')); ?>', 'description': 'Акция: <?php echo str_replace(array('<br>', '<br />'), ' ', $tab->get_field('Заголовок окна')); ?>. /<?php echo str_replace(array('<br>', '<br />'), ' ', $tab->get_field( 'Подзаголовок окна')); ?>/', 'template': 'wide'}, this);"><? echo $btn; ?></button>

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
                                                                    <a href="https://www.facebook.com/waithairechnoi/" target="_blank">
                                                                        <div class="social_wrap_img">
                                                                            <i class="fab fa-facebook-f fa-2x"></i>
                                                                        </div>
                                                                    </a>

                                                                </div>
                                                                <a href="https://www.facebook.com/waithairechnoi/" target="_blank"><?php _e('Вступить') ?></a>
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
                                                                    <a href="https://vk.com/thaispasalon" target="_blank">
                                                                        <div class="social_wrap_img">
                                                                            <i class="fab fa-vk fa-2x"></i>
                                                                        </div>
                                                                    </a>

                                                                </div>
                                                                <a href="https://vk.com/thaispasalon" target="_blank"><?php _e('Вступить') ?></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="social_right">
                                                        <img src="<?php $img_right = $tab->get_img( 'Картинка окна', 'large' )[0]['src'];  echo $img_right; ?>" alt="image">
                                                        <div class="r-text">
                                                            <div class="scrollable">
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
					<div class="unslider--100 unslider--dotes">
						<?php echo $dotes; ?>
					</div>
                    <div class="under-slide__line"></div>
				</div>
			</div>
            <div class="cont-with-more__more more-box sd social_mobi_td_more_box" style="height: auto; min-height: 70%"><?php echo $more_html; ?></div>
		</div>
	</div>
</div>








