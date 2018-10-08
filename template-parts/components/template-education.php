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
 * COMPONENT IMPLEMENTATION: Обучение
 *
 */

global $Mammen;
?>

<div class="services__content--mobile services__content--hide-tab-name">
    <div id="1">
        <div class="main services__items--mobile">
            <div class="center hide-on-mobile-more">
                <div class="services__m-content services__m-content--1" data-id="1">
                    <h2 class="special__h2"><?php echo tbs_replace_str_with_star(str_replace(array('<br>', '<br />'), ' ', $Mammen->get_field('Заголовок О школе Мобильный'))); ?></h2>
                    <div class="best-service-m__center">
                        <div class="best-service-m slick--slider-init">
	                        <?php
	                        $images = $Mammen->get_fields( 'Изображения' );
	                        $q = 0;
	                        foreach ( $images as $image ) {
		                        ++ $q;
		                        ?>
                                <div class="best-service-m__img special__img"
                                     style="background-image: url('<?php echo $image->get_img( 'Изображение О школе', 'large' )[0]['src']; ?>');">
                                </div>
		                        <?php
	                        }
	                        ?>
                        </div>
                    </div>
                    <div class="scrollable scrollable--222 text--mobile">
                        <p><?php echo $Mammen->get_field( 'Описание О школе' ); ?></p>
                    </div>
                    <div class="pattern-line"></div>
                </div>
                <h3 class="services__title services__title--1 services__title--slick" data-id="1">
                    <span class="services__title-num">01</span>
                    <span class="services__title-text"><?php echo $Mammen->get_field('Заголовок О школе'); ?></span>
                </h3>
                <div class="services__m-content services__m-content--2" data-id="2">
                    <div class="pattern-line"></div>
                    <h2 class="special__h2"><?php echo str_replace(array('<br>', '<br />'), ' ', $Mammen->get_field('Заголовок О преподавателях')); ?></h2>
                    <div class="persons-block">
                        <div class="best-service-m__center">
                            <div class="persons_nav">
                                <?php
                                $q = 0;
                                $persons = $Mammen->get_fields( 'Преподаватели' );
                                foreach ( $persons as $person ) {
                                    ++ $q;
                                    ?>
                                    <div class="persons_nav-item persons_nav-item--<?php echo $q; ?> <?php echo ( $q === 1 ) ? 'persons_nav-item--active' : ''; ?>" data-id="<?php echo $q; ?>">
                                        <img src="<?php echo $person->get_img( 'Фото преподавателя', 'large' )[0]['src']; ?>" alt="Фото преподавателя">
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                        <div class="persons">
			                <?php
			                $q = 0;
			                foreach ( $persons as $person ) {
				                ++ $q;
				                ?>
                                <div class="persons__item persons__item--<?php echo $q; ?> <?php echo ( $q === 1 ) ? 'persons__item--active' : ''; ?>">
                                    <div class="best-service-m__center">
                                        <div class="best-service-m__img special__img"
                                             style="background-image: url('<?php echo $person->get_img( 'Фото преподавателя Мобильное', 'large' )[0]['src']; ?>');">
                                        </div>
                                    </div>
                                    <div class="scrollable scrollable--350">
                                        <div class="person__title"><?php echo $person->get_field( 'Имя преподавателя' ); ?></div>
                                        <div class="person__sub-title"><?php echo $person->get_field( 'Должность преподавателя' ); ?></div>
                                        <div class="person__desc text--mobile"><?php echo $person->get_field( 'Описание о преподавателе' ); ?></div>
                                    </div>
                                    <div class="prices">
                                        <div class="best-service-m slick--slider-init slick--multi-slides">
                                            <?php
                                            $images = $person->get_fields( 'Сертификаты' );
                                            $k = 0;
                                            foreach ( $images as $image ) {
                                                ++ $k;
                                                $img = $image->get_img( 'Сертификат', 'large' )[0]['src'];
                                                $img_s = $image->get_img( 'Сертификат', 'thumbnail' )[0]['src'];
                                                ?>
                                                <div  onclick="popup_img_cta({'img':'<?php echo $img; ?>'});" class="prices__cert prices__cert--<?php echo $k; ?>">
                                                    <div class="img--image" style="background-image: url('<?php echo $img_s; ?>');"></div>
                                                </div>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
				                <?php
			                }?>
                        </div>
                    </div>

                    <div class="pattern-line"></div>
                </div>
                <h3 class="services__title services__title--2 services__title--slick" data-id="2">
                    <span class="services__title-num">02</span>
                    <span class="services__title-text"><?php echo $Mammen->get_field('Заголовок О преподавателях'); ?></span>
                </h3>
                <div class="services__m-content services__m-content--3" data-id="3">
                    <div class="pattern-line"></div>
                    <h2 class="special__h2"><?php echo str_replace(array('<br>', '<br />'), ' ', $Mammen->get_field('Заголовок О курсах')); ?></h2>

                    <div class="event-mobile">
                        <?php
                        $events = tbs_list_post_by_post_type( 'courses' );
                        //                                    $events[8] = $events[7] = $events[6] = $events[5] = $events[4] = $events[3] = $events[2] = $events[1] = $events[0];
                        if ( count( $events ) ) {
                            foreach ( $events as $post ) {
                                $title        = get_post_meta( $post['ID'], 'cdicourses-name', true );
                                $title        = ($title) ? $title : get_the_title( $post['ID'] );
                                $date         = get_post_meta( $post['ID'], 'cdicourses-date', true );
                                $first_month  = get_post_meta( $post['ID'], 'cdicourses-first-month', true );
                                $second_month = get_post_meta( $post['ID'], 'cdicourses-second-month', true );
//                                $days         = get_post_meta( $post['ID'], 'cdicourses-days', true );
                                $image_id     = get_post_meta( $post['ID'], 'cdicourses-meta-image', true );
                                $image_url    = wp_get_attachment_image_src( $image_id, 'large' )[0];
                                $desc         = get_post_meta( $post['ID'], 'cdicourses_desc', true );
//                                $planning     = get_post_meta( $post['ID'], 'cdicourses_planning', true );
//                                $more_days    = get_post_meta( $post['ID'], 'cdicourses-more-days', true );
//                                $more_time    = get_post_meta( $post['ID'], 'cdicourses-more-time', true );
//                                $p_name1      = get_post_meta( $post['ID'], 'cdicourses-p-block-more-1', true );
//                                $p_price1     = get_post_meta( $post['ID'], 'cdicourses-p-block-price-1', true );
//                                $p_minus1     = get_post_meta( $post['ID'], 'cdicourses-p-block-minus-1', true );
//                                $p_name2      = get_post_meta( $post['ID'], 'cdicourses-p-block-more-2', true );
//                                $p_price2     = get_post_meta( $post['ID'], 'cdicourses-p-block-price-2', true );
//                                $p_minus2     = get_post_meta( $post['ID'], 'cdicourses-p-block-minus-2', true );
//                                $p_name3      = get_post_meta( $post['ID'], 'cdicourses-p-block-more-3', true );
//                                $p_price3     = get_post_meta( $post['ID'], 'cdicourses-p-block-price-3', true );
//                                $p_minus3     = get_post_meta( $post['ID'], 'cdicourses-p-block-minus-3', true );
//                                $note         = get_post_meta( $post['ID'], 'cdicourses-note', true );
                                ?>
                                <div class="event">

                                    <div class="best-service-m__center">
                                        <div class="event__name-e"><?php echo $title; ?></div>
                                    </div>
                                    <div class="best-service-m__center">
                                        <div class="big-date__month big-date__month--m"><?php echo $date; ?></div>
                                    </div>
                                    <div class="best-service-m__center">
                                        <div class="btn btn--more-mobile btn--small-more best-service-m__btn" data-id="<?php echo $post['ID']; ?>">Подробнее</div>
                                    </div>
                                </div>
                                <?php

                                // Формирование "Подробнее"
                                ob_start();
                                ?>
                                <div id="<?php echo $post['ID']; ?>" class="about-event more-box__item more-box__item--<?php echo $post['ID']; ?>">
                                    <div class="center--mobile">
                                        <div class="best-service-m__center">
                                            <h2 class="special__h2"><?php echo str_replace(array('<br>', '<br />'), ' ', $title); ?></h2>
                                        </div>
                                    </div>
                                    <div class="center--mobile education__desc">
	                                    <?php echo tbs_auto_paragraph(htmlspecialchars_decode($desc)); ?>

                                        <?php
                                        $class_name = 'zapisatcya';
                                        $btn = 'Записаться';
                                        ?>
                                        <style type="text/css">
                                            #fullpage .<?php echo $class_name; ?>::after, #fullpage .<?php echo $class_name; ?>::before {
                                                content: '<? echo $btn; ?>' !important;
                                            }
                                        </style>
                                        <div class="best-service-m__center btn-box--1">
                                            <button class="btn btn--about-event btn--small-more best-service-m__btn <?php echo $class_name; ?>" onclick="popup_c({'cat':'заявка-на-обучение', 'title':'<?php echo $btn; ?>', 'subtitle':'<?php echo $title; ?>', 'email': 1, 'time': 0, 'gender': 0, 'modal_text': '<?php echo str_replace(array('<br>', '<br />'), ' ', $Mammen->get_field('Подзаголовок окна')); ?>', 'description': 'Акция: <?php echo str_replace(array('<br>', '<br />'), ' ', $title); ?>.', 'template': 'wide'}, this);"><? echo $btn; ?></button>
                                        </div>
                                        <div class="best-service-m__center btn-box--2">
                                            <button class="btn btn__back--mobile btn--small-more best-service-m__btn">НАЗАД</button>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                $more_html_mobile .= ob_get_contents();
                                ob_end_clean(); // втихую отбрасывает содержимое буфера
                            }
                        }
                        ?>
                    </div>
                </div>
                <h3 class="services__title services__title--3" data-id="3">
                    <span class="services__title-num">03</span>
                    <span class="services__title-text"><?php echo $Mammen->get_field('Заголовок О курсах'); ?></span>
                </h3>
            </div>
            <div class="cont-with-more__more--mobile about-events">
		        <?php echo $more_html_mobile; ?>
            </div>
        </div>
    </div>
</div>

<div class="services__content">
	<div id="services__blocks">
		<div id="1">
			<div class="main img-text-box second info">
				<div class="center">
                    <div class="container border-box border-box--with-bottom border-cont">
                        <div class="container__left border-cont__title border-cont__title--ext">
                            <div class="border-line border-line--desc border-line--30"></div>
                            <div class="container__title">
	                            <?php $title = $Mammen->get_field( 'Заголовок О школе Мобильный' )?>
                                <h2 class="schedule__title"><?php echo str_replace(' ', '&nbsp;', $title); ?></h2>
                            </div>
                            <div class="border-line border-line--desc"></div>
                        </div>
                        <div class="_container__right scroll-box">
                            <div class="img-text">
                                <div class="img-text__left">
                                    <div class="img-text__slick">
                                        <div class="slick--slider-tab slick--set-height slick--dots-center">
                                            <?php
                                            $images = $Mammen->get_fields( 'Изображения' );
                                            $q = 0;
                                            foreach ( $images as $image ) {
                                                ++ $q;
                                                ?>
                                                <div class="img-text__img img-text__img--<?php echo $q; ?>"
                                                     style="background-image: url('<?php echo $image->get_img( 'Изображение О школе', 'large' )[0]['src']; ?>');"></div>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="img-text__right">
                                    <div class="scroll-box__cont height--init-5">
                                        <div class="scrollable--tmp scrollable--100per">
                                            <p><?php echo $Mammen->get_field( 'Описание О школе' ); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
				</div>
			</div>
		</div>
		<div id="2">
			<div class="main second info persons-box">
				<div class="center">
					<div class="container info__container">
						<div class="persons-block">
                            <h2 class="persons-block__title"><?php echo str_replace(array('<br>', '<br />', ' '), '&nbsp;', $Mammen->get_field( 'Заголовок О преподавателях' ) ); ?></h2>
                            <div class="persons">
	                            <?php
	                            $persons = $Mammen->get_fields( 'Преподаватели' );
	                            $q = 0;
	                            foreach ( $persons as $person ) {
		                            ++ $q;
		                            ?>
                                    <div class="persons__item persons__item--<?php echo $q; ?> <?php echo ( $q === 1 ) ? 'persons__item--active' : ''; ?>">
                                        <div class="person person--<?php echo $q; ?>">
                                            <div class="person__left">
                                                <div class="person__photo" style="background-image: url('<?php echo $person->get_img( 'Фото преподавателя', 'large' )[0]['src']; ?>');"></div>
                                            </div>
                                            <div class="person__right">
                                                <div class="scroll-box__cont">
                                                    <div class="scrollable--tmp scrollable--100per">
                                                        <div class="person__title"><?php echo $person->get_field( 'Имя преподавателя' ); ?></div>
                                                        <div class="person__sub-title"><?php echo $person->get_field( 'Должность преподавателя' ); ?></div>
                                                        <div class="person__desc"><?php echo $person->get_field( 'Описание о преподавателе' ); ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="prices">
                                            <div class="prices__left">
                                                <div class="prices__before-line"></div>
                                                <div class="prices__line"></div>
                                            </div>
                                            <div class="prices__right">
                                                <?php
                                                $images = $person->get_fields( 'Сертификаты' );
                                                $k = 0;
                                                foreach ( $images as $image ) {
                                                    ++ $k;
                                                    $img = $image->get_img( 'Сертификат', 'large' )[0]['src'];
                                                    $img_s = $image->get_img( 'Сертификат', 'thumbnail' )[0]['src'];
                                                    ?>
                                                    <div onclick="popup_img_cta({'img':'<?php echo $img; ?>'});" class="prices__cert prices__cert--<?php echo $k; ?>"
                                                       style="background-image: url('<?php echo $img_s; ?>');"></div>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
		                            <?php
	                            }?>
                            </div>
                            <div class="persons_nav">
								<?php
								$q = 0;
								foreach ( $persons as $person ) {
									++ $q;
									?>
                                    <div class="persons_nav-item persons_nav-item--<?php echo $q; ?> <?php echo ( $q === 1 ) ? 'persons_nav-item--active' : ''; ?>" data-id="<?php echo $q; ?>">
                                        <img src="<?php echo $person->get_img( 'Фото преподавателя', 'large' )[0]['src']; ?>" alt="Фото преподавателя">
                                    </div>
									<?php
								}
								?>
                            </div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="3">
			<div class="main second schedule events-box cont-with-more cont-with-more--transform">
                <div class="cont-with-more__cont">
                    <div class="center">
					    <div class="container border-cont">
                            <div class="container__left border-cont__title">
                                <div class="border-line border-line--desc border-line--30"></div>
                                <div class="container__title">
                                    <h2 class="schedule__title h2--one-line"><?php echo str_replace(' ', '&nbsp;', $Mammen->get_field( 'Заголовок раздела' )); ?></h2>
                                </div>
                                <div class="border-line border-line--desc"></div>
                            </div>
                            <div class="container__right events">
                                <div class="scroll-box__cont">
                                    <div class="scrollable--tmp scrollable--68">
                                    <?php
                                    $events = tbs_list_post_by_post_type( 'courses' );
//                                    $events[8] = $events[7] = $events[6] = $events[5] = $events[4] = $events[3] = $events[2] = $events[1] = $events[0];
                                    if ( count( $events ) ) {
                                        foreach ( $events as $post ) {
                                            $title        = get_post_meta( $post['ID'], 'cdicourses-name', true );
                                            $title        = ($title) ? $title : get_the_title( $post['ID'] );
                                            $date         = get_post_meta( $post['ID'], 'cdicourses-date', true );
                                            $first_month  = get_post_meta( $post['ID'], 'cdicourses-first-month', true );
                                            $second_month = get_post_meta( $post['ID'], 'cdicourses-second-month', true );
//                                            $days         = get_post_meta( $post['ID'], 'cdicourses-days', true );
                                            $image_id     = get_post_meta( $post['ID'], 'cdicourses-meta-image', true );
                                            $image_url    = wp_get_attachment_image_src( $image_id, 'large' )[0];
                                            $desc         = get_post_meta( $post['ID'], 'cdicourses_desc', true );
//                                            $planning     = get_post_meta( $post['ID'], 'cdicourses_planning', true );
//                                            $more_days    = get_post_meta( $post['ID'], 'cdicourses-more-days', true );
//                                            $more_time    = get_post_meta( $post['ID'], 'cdicourses-more-time', true );
//                                            $p_name1      = get_post_meta( $post['ID'], 'cdicourses-p-block-more-1', true );
//                                            $p_price1     = get_post_meta( $post['ID'], 'cdicourses-p-block-price-1', true );
//                                            $p_minus1     = get_post_meta( $post['ID'], 'cdicourses-p-block-minus-1', true );
//                                            $p_name2      = get_post_meta( $post['ID'], 'cdicourses-p-block-more-2', true );
//                                            $p_price2     = get_post_meta( $post['ID'], 'cdicourses-p-block-price-2', true );
//                                            $p_minus2     = get_post_meta( $post['ID'], 'cdicourses-p-block-minus-2', true );
//                                            $p_name3      = get_post_meta( $post['ID'], 'cdicourses-p-block-more-3', true );
//                                            $p_price3     = get_post_meta( $post['ID'], 'cdicourses-p-block-price-3', true );
//                                            $p_minus3     = get_post_meta( $post['ID'], 'cdicourses-p-block-minus-3', true );
//                                            $note         = get_post_meta( $post['ID'], 'cdicourses-note', true );
                                            ?>
                                            <div class="event">
<!--                                                <div class="event__left big-date">-->
<!--                                                    <div class="big-date__date">--><?php //echo $date; ?><!--</div>-->
<!--                                                    <div class="big-date__months">-->
<!--                                                        <div class="big-date__month big-date__month--left">--><?php //echo $first_month; ?><!--</div>-->
<!--                                                        <div class="big-date__month big-date__month--right">--><?php //echo $second_month; ?><!--</div>-->
<!--                                                    </div>-->
<!--                                                </div>-->
                                                <div class="event__center">
                                                    <div class="event__name-e"><?php echo $title; ?></div>
                                                    <div class="big-date__month"><?php echo $date; ?></div>
                                                </div>
                                                <div class="event__right">
                                                    <div class="btn btn--small-more cont-with-more__btn" data-id="<?php echo $post['ID']; ?>">Подробнее</div>
        <!--                                            <div class="btn btn--small-more zapisatcya" onclick="popup_c({'cat':'Акции', 'title':'Записаться', 'subtitle':'СПА-ДЕГУСТАЦИЯ', 'email': 1, 'time': 0, 'gender': 0, 'modal_text': 'Только для жителей районов Москвы: Ховрино, Левобережный, Головинский, Западное Дегунино. ЖИТЕЛЕЙ Московской области: г. Химки, г. Долгопрудный ', 'description': 'Акция: Только для жителей районов Москвы: Ховрино, Левобережный, Головинский, Западное Дегунино. ЖИТЕЛЕЙ Московской области: г. Химки, г. Долгопрудный . /Только для жителей районов Москвы: Ховрино, Левобережный, Головинский, Западное Дегунино. ЖИТЕЛЕЙ Московской области: г. Химки, г. Долгопрудный /', 'template': 'wide'}, this);">Записаться</div>-->
                                                </div>
                                            </div>
                                            <?php

                                            // Формирование "Подробнее"
                                            ob_start();
                                            ?>
                                            <div id="<?php echo $post['ID']; ?>" class="about-event more-box__item more-box__item--<?php echo $post['ID']; ?>">
                                                <div class="main enroll">
                                                    <div class="center more-box__center">
                                                        <div class="about-event__title"><?php echo $title; ?></div>
                                                        <div class="scrollable--72vh-90">
                                                            <div class="scrollable--tmp scrollable--100per">
                                                                <div class="education__desc">
	                                                                <?php echo tbs_auto_paragraph(htmlspecialchars_decode($desc)); ?>
                                                                </div>
                                                            </div>
                                                        </div>

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
                                                        <button class="btn btn__enroll <?php echo $class_name; ?>" onclick="popup_c({'cat':'заявка-на-обучение', 'title':'<?php echo $btn; ?>', 'subtitle':'<?php echo $title; ?>', 'email': 1, 'time': 0, 'gender': 0, 'modal_text': '<?php echo str_replace(array('<br>', '<br />'), ' ', $Mammen->get_field('Подзаголовок окна')); ?>', 'description': 'Акция: <?php echo str_replace(array('<br>', '<br />'), ' ', $title); ?>.', 'template': 'wide'}, this);"><? echo $btn; ?></button>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                            $more_html .= ob_get_contents();
                                            ob_end_clean(); // втихую отбрасывает содержимое буфера
                                        }
                                    }
                                    ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cont-with-more__more more-box about-events">
					<?php echo $more_html; ?>
                </div>
            </div>
		</div>
	</div>
</div>

<div class="services__main">
	<div class="services__main__left">
        <?php
        $img_id = $Mammen->get_img( 'Изображение hover-эффект О школе', 'large' )[0]['id'];
        $img = $Mammen->get_img( 'Изображение hover-эффект О школе', 'large' )[0]['src'];
        if (!$img_id) {
	        $img = get_template_directory_uri() . '/img/services-main.png';
        }
        $img_first = $img;
        ?>
        <img src="<?php echo $img; ?>" alt="" class="img--hidden">
		<a href="#" class="services__link" data-target="services__blocks 1" data-img="<?php echo $img; ?>">
			<span>01</span>
			<span><?php echo $Mammen->get_field('Заголовок О школе'); ?></span>
		</a>
		<?php
		$img_id = $Mammen->get_img( 'Изображение hover-эффект О преподавателях', 'large' )[0]['id'];
		$img = $Mammen->get_img( 'Изображение hover-эффект О преподавателях', 'large' )[0]['src'];
		if (!$img_id) {
			$img = get_template_directory_uri() . '/img/services-main.png';
		}
		?>
        <img src="<?php echo $img; ?>" alt="" class="img--hidden">
		<a href="#" class="services__link" data-target="services__blocks 2" data-img="<?php echo $img; ?>">
			<span>02</span>
			<span><?php echo $Mammen->get_field('Заголовок О преподавателях'); ?></span>
		</a>
		<?php
		$img_id = $Mammen->get_img( 'Изображение hover-эффект О курсах', 'large' )[0]['id'];
		$img = $Mammen->get_img( 'Изображение hover-эффект О курсах', 'large' )[0]['src'];
		if (!$img_id) {
			$img = get_template_directory_uri() . '/img/services-main.png';
		}
		?>
        <img src="<?php echo $img; ?>" alt="" class="img--hidden">
		<a href="#" class="services__link" data-target="services__blocks 3" data-img="<?php echo $img; ?>">
			<span>03</span>
			<span><?php echo $Mammen->get_field('Заголовок О курсах'); ?></span>
		</a>
	</div>
    <div class="services__main__right block--back-image hover-target-image" style="background-image: url('<?php echo $img_first; ?>');"></div>
</div> 

<div class="sections">

	<div class="section" id="section1">

	</div>

	<div class="section" id="section2">
	</div>

	<div class="section" id="section3">
	</div>
</div>