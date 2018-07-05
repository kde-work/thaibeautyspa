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
 * COMPONENT IMPLEMENTATION: Лучшие программы
 *
 */

global $Mammen;
?>

<div class="section" id="second">

	<div class="main second best-services slide">
		<div class="center startPosition">
			<div class="plus"></div>
			<span class="s">S</span>
			<span class="t">T</span>
			<span class="b"><img src="<?php echo get_template_directory_uri(); ?>/img/B.png" alt=""></span>
			<div class="flower"><img src="<?php echo get_template_directory_uri(); ?>/img/flower.png" alt=""></div>
			<div class="container border-box service-slider service-slider--pre">
				<!-- <div class="container__wrap"><img src="<?php echo get_template_directory_uri(); ?>/img/border-10.png" alt=""></div> -->
				<div class="container__wrap"><img src="<?php echo get_template_directory_uri(); ?>/img/border-2.png" alt=""></div>
				<div class="container__left">
					<div class="container__title">
						<?php $title = $Mammen->get_field( 'Заголовок' )?>
						<h2 class="mobile"><?php echo str_replace(' ', '&nbsp;', $title); ?></h2>
						<h2 class="desktop"><?php echo $title; ?></h2>
					</div>
				</div>
                <div class="container__pre best-s-pre">
                    <div class="best-s-pre__cont">
                        <div class="best-s-pre__desc">Здесь мы поможем вам с выбором лучшей программы, выберите<br>категорию для лучшего подбора программ для вас </div>
                        <div class="best-s-pre__big-text">Кто вы?</div>
                        <div class="best-s-pre__hr"></div>
                        <div class="best-s-pre__inputs">
                            <div class="best-s-pre__input best-s-pre__input--man" data-id="man">
                                <div class="best-s-pre__input-ins">Муж</div>
                            </div>
                            <div class="best-s-pre__input best-s-pre__input--female" data-id="female">
                                <div class="best-s-pre__input-ins">Жен</div>
                            </div>
                            <div class="best-s-pre__input best-s-pre__input--couple" data-id="couple">
                                <div class="best-s-pre__input-ins">Пара</div>
                            </div>
                        </div>
                    </div>
                </div>
				<div class="container__right">
<!--					<div class="container__slider__number">-->
<!--						<span>01</span><span>/00</span>-->
<!--					</div>-->
					<ul class="slider scroll-box">
						<?php
						$posts = tbs_get_best_services();
						if ( count( $posts ) ) {
							$j = 0;
							foreach ( $posts as $post ) {
								$title              = get_the_title( $post['ID'] );
								$image_id           = get_post_meta( $post['ID'], 'cdiservices-meta-image-best', true );
								$image_url          = wp_get_attachment_image_src( $image_id, 'large' )[0];
								$image_oil_id       = get_post_meta( $post['ID'], 'cdiservices-meta-image-oil', true );
								$image_oil_url      = wp_get_attachment_image_src( $image_oil_id, 'full' )[0];
								$short_text         = get_post_meta( $post['ID'], 'cdiservices-meta-text-short', true );
								$best_text          = get_post_meta( $post['ID'], 'cdiservices-meta-textarea-best', true );
								$type_m          = get_post_meta( $post['ID'], 'cdiservices-meta-type-m', true );
								$type_f          = get_post_meta( $post['ID'], 'cdiservices-meta-type-f', true );
								$type_mf          = get_post_meta( $post['ID'], 'cdiservices-meta-type-mf', true );
                                if (!$best_text) {
	                                $best_text      = get_post_meta( $post['ID'], 'cdiservices-meta-textarea', true );
                                }
								?>
                                <li class="scroll-box__slide scroll-box__slide--<?php echo $post['ID']; ?> <?php
                                                echo ($type_m) ? "scroll-box__slide--man " : '';
                                                echo ($type_f) ? "scroll-box__slide--female " : '';
                                                echo ($type_mf) ? "scroll-box__slide--couple " : '';
                                                ?>" style="display: none;">
                                    <div class="container__img container__img--desc"
                                         style="background-image: url('<?php echo $image_url; ?>');">
                                    </div>
                                    <div class="scroll-box__cont">
                                        <div class="scrollable">
                                            <h3 class="slider-up"><?php echo $title; ?></h3>
                                            <p class="text--italic slider-up"><?php echo $short_text; ?></p>
                                            <hr>
                                            <p class="slider-up"><?php echo $best_text; ?> <?php echo $best_text; ?></p>
                                        </div>
                                        <div class="wrap slider-left"><a href="<?php echo get_the_permalink($post['ID']); ?>" class="btn">Подробнее</a></div>
                                    </div>
                                </li>
								<?php
								ob_start();
								?>
                                <div class="dot__item dot__item--<?php echo $j; ?> <?php
                                                echo ($j === 0) ? 'dot__item--active ' : '';
                                                echo ($type_m) ? "dot__item--man " : '';
                                                echo ($type_f) ? "dot__item--female " : '';
                                                echo ($type_mf) ? "dot__item--couple " : '';
                                                ?>" data-id="<?php echo $j; ?>">
                                    <div class="dot-item__img"><img src="<?php echo $image_url; ?>"></div>
                                    <div class="dot-item__title"><?php echo $title; ?></div>
                                </div>
								<?php
								$dotes .= ob_get_contents();
								ob_end_clean();

								// mobile template
								ob_start();
								?>
                                <div class="best-service-m__item" data-id="<?php echo $j; ?>">
                                    <div class="best-service-m__center">
                                        <div class="best-service-m__img"
                                             style="background-image: url('<?php echo $image_url; ?>');">
                                        </div>
                                    </div>
                                    <div class="best-service-m__title"><?php echo $title; ?></div>
                                    <p class="best-service-m__sub-title text--italic slider-up"><?php echo $short_text; ?></p>
                                    <div class="best-service-m__center">
                                        <a href="<?php echo get_the_permalink($post['ID']); ?>" class="btn btn--small-more best-service-m__btn">Подробнее</a>
                                    </div>
                                </div>
								<?php
								$mobile .= ob_get_contents();
								ob_end_clean();
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
                </div>
			</div>
            <div class="best-service-m slick--slider mobile">
	            <?php echo $mobile; ?>
            </div>

		</div>
	</div>
</div>