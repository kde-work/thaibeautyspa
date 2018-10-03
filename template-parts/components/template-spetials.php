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
                        <div class="best-service-m slick--slider-init">
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
                                            <div class="btn btn--small-more best-service-m__btn <?php echo $class_name; ?>" onclick="popup_c({'cat':'Акции', 'title':'<?php echo $btn; ?>', 'subtitle':'<?php echo $tab->get_field('Заголовок слайда'); ?>', 'email': 1, 'time': 0, 'gender': 0, 'modal_text': '<?php echo str_replace(array('<br>', '<br />'), ' ', $tab->get_field('Описание под названием')); ?>', 'description': 'Акция: <?php echo str_replace(array('<br>', '<br />'), ' ', $tab->get_field('Описание под названием')); ?>. /<?php echo str_replace(array('<br>', '<br />'), ' ', $tab->get_field( 'Описание под названием')); ?>/', 'template': 'wide'}, this);"><? echo $btn; ?></div>
                                        </div>
                                    </div>
			                        <?php
		                        }
	                        }
                            ?>
                        </div>
                        <div class="pattern-line"></div>
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

											/*if ($tab->get_field('Использовать Окно Подробнее') OR false) :
											// Формирование "Подробнее"
											ob_start();
											?>
                                            <div id="i-<?php echo $j; ?>" class="more-box__item more-box__item--<?php echo $j; ?>">
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
                                                        <button class="btn btn__enroll <?php echo $class_name; ?>" onclick="popup_c({'cat':'Акции', 'title':'<?php echo $btn; ?>', 'subtitle':'<?php echo $tab->get_field('Заголовок окна'); ?>', 'email': 1, 'time': 0, 'gender': 0, 'modal_text': '<?php echo str_replace(array('<br>', '<br />'), ' ', $tab->get_field('Подзаголовок окна')); ?>', 'description': 'Акция: <?php echo str_replace(array('<br>', '<br />'), ' ', $tab->get_field('Заголовок окна')); ?>. /<?php echo str_replace(array('<br>', '<br />'), ' ', $tab->get_field( 'Подзаголовок окна')); ?>/', 'template': 'wide'}, this);"><? echo $btn; ?></button>

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
                                            endif;*/

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
			<a href="#акции" id="stocks" class="services__link" data-target="services__blocks 1" data-img="<?php echo $img1; ?>">
				<span>01</span>
				<span><?php echo $Mammen->get_field('Название таба Акции'); ?></span>
			</a>
			<img src="<?php $img2 = $Mammen->get_img( 'Изображение hover-эффект Абонементы', 'large' )[0]['src']; echo $img2; ?>" alt="" class="img--hidden">
			<a href="#абонементы" id="duck" class="services__link" data-target="services__blocks 2" data-img="<?php echo $img2; ?>">
				<span>02</span>
				<span><?php echo $Mammen->get_field('Название таба Абонементы'); ?></span>
			</a>
			<img src="<?php $img3 = $Mammen->get_img( 'Изображение hover-эффект Подарки', 'large' )[0]['src']; echo $img3; ?>" alt="" class="img--hidden">
			<a href="#сертификаты" id="duffy" class="services__link" data-target="services__blocks 3" data-img="<?php echo $img3; ?>">
				<span>03</span>
				<span><?php echo $Mammen->get_field('Название таба Подарки'); ?></span>
			</a>
		</div>
		<div class="services__main__right block--back-image hover-target-image" style="background-image: url('<?php echo $img1; ?>');"></div>
	</div>
	<script>
	$( document ).ready(function() {
     	if(/#%D1%81%D0%B5%D1%80%D1%82%D0%B8%D1%84%D0%B8%D0%BA%D0%B0%D1%82%D1%8B/.test(location.href)){
			setTimeout(function(){
  				$('#duffy').click();
				}, 600);
			}
	 	if(/#%D0%B0%D0%B1%D0%BE%D0%BD%D0%B5%D0%BC%D0%B5%D0%BD%D1%82%D1%8B/.test(location.href)){
			setTimeout(function(){
  				$('#duck').click();
				}, 600);
			}
		if(/#%D0%B0%D0%BA%D1%86%D0%B8%D0%B8/.test(location.href)){
			setTimeout(function(){
  				$('#stocks').click();
				}, 600);			
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