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
 * COMPONENT IMPLEMENTATION: Слайдер в 3 строки с Табами
 *
 */

global $Mammen;
?>

<div class="component--<?php echo $Mammen->get_slug(); ?>">
    <div class="services__content--mobile custom_mobi_styles">
        <div id="1">
            <div class="main services__items--mobile services__content--hide-tab-name">
                <div class="center">
                    <?php
                    $j = 0; // итерация для рубрик
                    $p = 0; // итерация для постов
                    $more_html = ''; // Раздел "Подробнее"
                    $services_category = $Mammen->get_fields( 'Таб' );
                    foreach ($services_category as $cat) {
                        ++ $j;
                        ?>

                        <h3 class="services__title services__title--<?php echo $j; ?>" data-id="<?php echo $j; ?>" style="display:flex!important;">
                            <span class="services__title-num"><?php echo tbs_get_number_with_zero($j); ?></span>
                            <span class="services__title-text"><?php echo tbs_replace_str_with_star($cat->get_field('Заголовок')); ?></span>
                        </h3>
                        <div class="services__m-content services__m-content--<?php echo $j; ?>" data-id="<?php echo $j; ?>">
                            <?php
                            if ($j > 1) {
                                echo "<div class=\"pattern-line\"></div>";
                            }
                            ?>
                            <div class="container__left">
                                <div class="container__title">
                                </div>
                            </div>
                            <script>
                                (function ($) {
                                    $(function () {
                                        mySlider('.services__slider--<?php echo $j; ?>', 'irregular');
                                    });
                                }($ || window.jQuery));
                            </script>
                            <div class="container__right services__slider services__slider--<?php echo $j; ?>">
                                <ul class="slider">
                                    <?php
                                    $posts = $cat->get_fields( 'Слайд' );
                                    if ( count( $posts ) ) {
                                        foreach ( $posts as $tab ) {
                                            $TypeB              = $tab->get_field('TypeB');
                                            $TypeC              = $tab->get_field('TypeC');
                                            $TypeA              = $tab->get_field('TypeA');
                                            $title              = $cat->get_field('Заголовок');
                                            $image_url          = $tab->get_img( 'Картинка Мобильная', 'large' )[0]['src'];
                                            $short_text         = $tab->get_field('Описание слайда');
                                            $main_text          = $tab->get_field('Описание справа окна');
                                            $ext_text           = $tab->get_field('Описание слева окна');
                                            $slides_c_mobi      = $tab->get_fields('Офраншизе');
                                            $first_img          = $tab->get_img( 'Картинка для типа А', 'large' )[0]['src'];
                                            ?>
                                            <?php if ($TypeC == 1) { ?>
                                                <li class="services__reach-slider">
                                                    <div class="services__first">
                                                        <div style="margin-bottom: 85px;">

                                                                <div class="container__img container__img--desc"
                                                                     style="background-image: url('<?php echo $first_img; ?>'); left: calc(-21.3px - 2.5%)!important; width: 100vw!important;">
                                                                </div>
                                                                <div class="type_b_mobi_title">
                                                                    <h2><?php // $short_text ?></h2>
                                                                </div>
                                                                <div class="text-slide-box white_strong scrollable" style=" max-height: 30vh!important; ">
                                                                    <?php echo htmlspecialchars_decode($main_text); ?>
                                                                </div>
                                                        </div>
                                                        <div style="margin-bottom: 85px;">
                                                            <div class="container__img container__img--desc"
                                                                 style="background-image: url('<?php echo $image_url; ?>'); left: calc(-21.3px - 2.5%)!important; width: 100vw!important;">
                                                            </div>
                                                            <div class="type_b_mobi_title">
                                                                <h2><?php // $short_text ?></h2>
                                                            </div>
                                                            <div class="text-slide-box white_strong scrollable" style=" max-height: 30vh!important; ">
                                                                <?php echo htmlspecialchars_decode($ext_text); ?>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <div class="type_b_mobi_title" style="margin-bottom: 22px">
                                                                <h2><?php echo $tab->get_field('Текст над слайдером'); ?></h2>
                                                            </div>
                                                            <div class="slider_cc_mobi"  style="left: calc(-21.3px - 2.5%)!important; width: 100vw!important;">
                                                <?php
                                                if ( count( $slides_c_mobi ) ) {
                                                    foreach ( $slides_c_mobi as $slide_c_nav_mobi ) { ?>
                                                        <div>
                                                            <div class="container__img container__img--desc"
                                                                 style="background-image: url(<?php echo $slide_c_nav_mobi->get_img( 'Mobile img франшиза', 'large' )[0]['src']; ?>); width: 100%; ">
                                                            </div>
                                                            <p style="margin-top: 21px; font-size: 20px; padding-left: calc(21.3px + 2.5%); padding-right: calc(21.3px + 2.5%);">
                                                                <?php echo strip_tags($slide_c_nav_mobi->get_field( 'Заголовок офраншизе' )); ?>
                                                            </p>
                                                        </div>
                                                <?php } } ?>
                                                            </div>

                                                            <style>
                                                                .slider_cc_mobi .slick-active button{
                                                                    background-color: #fff;
                                                                    background-image: none;
                                                                    border-radius: 50%;
                                                                }
                                                                .white_strong strong{
                                                                    color: #fff!important;
                                                                    font-size: 30px!important;
                                                                    margin-bottom: 7px!important;
                                                                    display: block!important;
                                                                    font-family: Times-new-roman;
                                                                }
                                                                .text_c_mobi h6, .text_c_mobi em{
                                                                    font-size: 16px;
                                                                    color: #fff!important;
                                                                }
                                                                #fullpage .main__menu__button--mobile .main__menu__btn {
                                                                    background-color: #fff!important;
                                                                    background-image: url(<?php echo get_template_directory_uri(); ?>/img/Rounded_Rectangle_9_copy_2.png) !important;
                                                                }
                                                            </style>
                                                            <div class="slider_cont_c_mobi text_c_mobi">
                                                                <?php
                                                                if ( count( $slides_c_mobi ) ) {
                                                                    foreach ( $slides_c_mobi as $slide_c_nav_mobi ) { ?>
                                                                        <div class="text-slide-box" style=" max-height: 30vh!important; ">
                                                                            <div><?php echo $slide_c_nav_mobi->get_field( 'Описание офраншизе' ); ?></div>
                                                                        </div>
                                                                    <?php } } ?>
                                                            </div>
                                                        </div>
                                                        <div class="type_b_mobi_btn" style="text-align: center; margin-bottom: 40px;">
                                                            <button class="btn" style="position: relative!important;"  onclick="popup_c({'cat':'бизнес-линч', 'title':'Написать директору', 'email': 1, 'time': 0, 'gender': 0, 'description': 'франшиза THAIBEAUTYSPA'}, this);">написать директору</button>
                                                        </div>
                                                        <div class="mobi_after_bt">
                                                            <?php echo htmlspecialchars_decode($tab->get_field('Текст возле кнопки А')); ?>
                                                        </div>
                                                    </div>
                                                </li>
                                                <?php continue; } ?>
                                            <li class="services__reach-slider">
                                            <?php if ($TypeA) { ?>
                                                <div class="services__first">
                                                    <div style="margin-bottom: 85px;">

                                                        <div class="container__img container__img--desc"
                                                                   style="background-image: url('<?php echo $first_img; ?>'); left: calc(-21.3px - 2.5%)!important; width: 100vw!important;">
                                                        </div>
                                                        <div class="type_b_mobi_title">
                                                            <h2><?php // $short_text ?></h2>
                                                        </div>
                                                        <div class="text-slide-box white_strong scrollable" style=" max-height: 30vh!important; ">
                                                            <?php echo htmlspecialchars_decode($main_text); ?>
                                                        </div>
                                                    </div>
                                                    <div style="margin-bottom: 85px;">
                                                        <div class="container__img container__img--desc"
                                                             style="background-image: url('<?php echo $image_url; ?>'); left: calc(-21.3px - 2.5%)!important; width: 100vw!important;">
                                                        </div>
                                                        <div class="type_b_mobi_title">
                                                            <h2><?php // $short_text ?></h2>
                                                        </div>
                                                        <div class="text-slide-box white_strong scrollable" style=" max-height: 30vh!important; ">
                                                            <?php echo htmlspecialchars_decode($ext_text); ?>
                                                        </div>
                                                    </div>
                                                    <div class="type_b_mobi_btn" style="text-align: center; margin-bottom: 40px;">
                                                        <button class="btn" style="position: relative!important;"  onclick="popup_c({'cat':'бизнес-линч', 'title':'Написать директору', 'email': 1, 'time': 0, 'gender': 0, 'description': '<?= $title ?>'}, this);">написать директору</button>
                                                    </div>
                                                    <div class="mobi_after_bt">
                                                        <?php echo htmlspecialchars_decode($tab->get_field('Текст возле кнопки А')); ?>
                                                    </div>
                                                    <!--                                                    <button class="btn btn__back btn--back">НАЗАД</button>-->
                                                </div>
                                            <?php continue; } ?>
                                                <?php if ($TypeB) { ?>
                                                    <div class="services__first">
                                                        <div class="container__img container__img--desc"
                                                             style="background-image: url('<?php echo $image_url; ?>'); left: calc(-21.3px - 2.5%)!important; width: 100vw!important;">
                                                        </div>
                                                        <div class="type_b_mobi_title">
                                                            <h2><?= $short_text ?></h2>
                                                        </div>
                                                        <div class="text-slide-box scrollable" style=" max-height: 30vh!important; ">
                                                            <?php echo htmlspecialchars_decode($ext_text); ?>
                                                        </div>
                                                        <p class="text--italic slider-up"></p>
                                                        <div class="type_b_mobi_btn" style="text-align: center; margin-bottom: 40px;">
                                                            <button class="btn" style="position: relative!important;"  onclick="popup_c({'cat':'бизнес-линч', 'title':'Написать директору', 'email': 1, 'time': 0, 'gender': 0, 'description': '<?= $title ?>'}, this);">написать директору</button>
                                                            
                                                        </div>
                                                        <div class="mobi_after_bt">
                                                            <?php tbs_text_slider(htmlspecialchars_decode($main_text), 57); ?>
                                                        </div>
                                                        <!--                                                    <button class="btn btn__back btn--back">НАЗАД</button>-->
                                                    </div>
                                                <?php } else { ?>
                                                <div class="services__first">
                                                    <div class="container__img container__img--desc"
                                                         style="background-image: url('<?php echo $image_url; ?>');">
                                                    </div>
                                                    <h3 class="slider-up"><?php echo $title; ?></h3>
                                                    <hr>
                                                    <p class="text--italic slider-up"><?php echo htmlspecialchars_decode($short_text); ?></p>
                                                    <div class="wrap slider-left"><div class="btn services__more">Подробнее</div></div>
                                                </div>

                                                    <div class="services__second">
                                                        <div class="container__img container__img--desc"
                                                             style="background-image: url('<?php echo $image_url; ?>');">
                                                        </div>
                                                        <div class="text-slide-box">
                                                            <?php tbs_text_slider(htmlspecialchars_decode($main_text), 57); ?>
                                                        </div>
                                                        <p class="text--italic slider-up"><?php echo htmlspecialchars_decode($ext_text); ?></p>
                                                        <div class="wrap slider-left">
                                                            <button class="btn btn--zap" onclick="popup_c({'cat':'бизнес-линч', 'title':'Написать директору', 'email': 1, 'time': 0, 'gender': 0, 'description': '<?= $title ?>'}, this);">написать директору</button>
                                                        </div>

                                                        <button class="btn btn__back btn--back">НАЗАД</button>
                                                    </div>
                                                <?php } ?>
                                            </li>
                                            <?php
                                        }
                                    }
                                    ?>
                                </ul>
                                <div class="unslider" style="display: none;">
                                    <a class="unslider-arrow prev"><img src="<?php echo get_template_directory_uri(); ?>/img/arrow.png" alt="" /></a>
                                    <a class="unslider-arrow next"><img src="<?php echo get_template_directory_uri(); ?>/img/arrow.png" alt="" /></a>
                                </div>
                            </div>
                            <?php
                            if ($j < count($services_category)) {
                                echo "<div class=\"pattern-line\"></div>";
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <div class="services__content">
        <div id="services__blocks">
            <style>
                .services .b {
                    left: 15%!important;
                }
                .services .s {
                    top: 7%!important;
                }

            </style>
            <?php
            $tabs = $Mammen->get_fields( 'Таб' );
            $k = 0;
            if ( count( $tabs ) ) {
                foreach ( $tabs as $tab ) {
                    $list = 0;
                    ++$k;
                    $slides = $tab->get_fields( 'Слайд' );
                    ?>
                    <div id="<?php echo $k; ?>">
                        <div class="main services__items">
                            <?php foreach ( $slides as $slide ) { ?>
                            <?php if ($slide->get_field('TypeB') == 1) { ?>
                                <?php include('custom_components/type_b.php'); break;
                                } elseif ($slide->get_field('TypeA') == 1) {
                                    include('custom_components/type_a.php'); break;
                                } elseif ($slide->get_field('TypeC') == 1) {
                                    include('custom_components/type_c.php'); break;
                                }
                                ?>
                            <?php } ?>
                            <?php foreach ( $slides as $slide ) {

                                ?>
                                <?php if ($slide->get_field('TypeB') != 1 and $slide->get_field('TypeA') != 1 and $slide->get_field('TypeC') != 1) {
                                    $list++;
                                    if ($list != 1) {
                                        break;
                                    }
                                    ?>

                                <div class="center">
                                    <div class="container__wrap"><img src="<?php echo get_template_directory_uri(); ?>/img/border-6.png" alt=""></div>
                                    <ul class="slider">
                                        <li>
                                            <?php
                                            //count( $slides )
                                            if ( count( $slides ) ) {
                                                $y = 0;
                                                foreach ( $slides as $slide ) {
                                                    if ( ( $y % 3 ) == 0 AND $y ) {
                                                        echo '</li>';
                                                        echo '<li>';
                                                    }
                                                    ++ $y;
                                                    ++ $p; ?>
                                                    <?php if ($Mammen->get_field( 'Шаблон' ) == 'Бизнес Линч') :
                                                        ?>
                                                        <div class="services__items__block">
                                                            <div class="services__item__left container__img--desc block--back-image" style="background-image: url('<?php echo $slide->get_img( 'Картинка Большая', 'large' )[0]['src']; ?>'); <?php if ($tab->get_field('background-size')) echo 'background-size: cover;' ?> <?php if (intval($tab->get_field('min-height'))) echo 'min-height: '. intval($tab->get_field('min-height')) .'px;' ?>"></div>
                                                            <div class="services__item__right">
                                                                <div class="services__item__right__text">
                                                                    <h3><?php echo $slide->get_field('Заголовок слайда'); ?></h3>
                                                                    <hr>
                                                                    <p class="text--italic"><?php echo $slide->get_field('Описание слайда'); ?></p>
                                                                </div>
                                                                <div class="services__item__right__btn "><button class="btn with_slider" data-target="services__enroll <?php echo $p; ?>">Подробнее</button></div>
                                                            </div>
                                                        </div>
                                                    <?php else : ?>
                                                        <div class="services__items__block">
                                                            <div class="services__item__left container__img--desc block--back-image" style="background-image: url('<?php echo $slide->get_img( 'Картинка Большая', 'large' )[0]['src']; ?>'); <?php if ($tab->get_field('CONTAIN')) echo 'background-size: contain;' ?> <?php if (intval($tab->get_field('min-height'))) echo 'min-height: '. intval($tab->get_field('min-height')) .'px;' ?>"></div>
                                                            <div class="services__item__right">
                                                                <h3><?php echo $slide->get_field('Заголовок слайда'); ?></h3>
                                                                <div class="services__item__right__bottom">
                                                                    <div class="services__item__bottom__left">
                                                                        <hr>
                                                                        <p class="text--italic"><?php echo $slide->get_field('Описание слайда'); ?></p>
                                                                    </div>
                                                                    <div class="services__item__bottom__right"><button class="btn with_slider"  data-target="services__enroll <?php echo $p; ?>">Подробнее</button></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php
                                                    endif;

                                                    // Формирование "Подробнее"
                                                    ob_start();
                                                    ?>
                                                    <div id="<?php echo $p; ?>">
                                                        <div class="main enroll">
                                                                <div class="center">
                                                                    <div class="container__wrap"><img src="<?php echo get_template_directory_uri(); ?>/img/border-6.png" alt=""></div>
                                                                    <button class="btn btn__back">НАЗАД</button>
                                                                    <?php
                                                                    $class_name = MM_Component_Page::clear_name($tab->get_field('Текст кнопки окна Подробнее'));
                                                                    ?>
                                                                    <style type="text/css">
                                                                        #fullpage .<?php echo $class_name; ?>::after, #fullpage .<?php echo $class_name; ?>::before {
                                                                            content: '<?php echo $tab->get_field('Текст кнопки окна Подробнее'); ?>' !important;
                                                                        }
                                                                    </style>

                                                                    <button class="btn btn__enroll <?php echo $class_name; ?>" onclick="popup_c({'cat':'<?php echo get_the_title(); ?>', 'title':'<?php echo $tab->get_field('Текст кнопки окна Подробнее'); ?>', 'email': 1, 'time': 0, 'gender': 0, 'description': 'Услуга: <?php echo str_replace(array('<br>', '<br />'), ' ', $slide->get_field('Заголовок окна')); ?>. /<?php echo str_replace(array('<br>', '<br />'), ' ', $tab->get_field( 'Заголовок')); ?>/'}, this);"><?php echo $tab->get_field('Текст кнопки окна Подробнее'); ?></button>


                                                                    <div class="enroll__top">
                                                                        <div class="enroll__top__left">
                                                                            <h3><?php echo $slide->get_field('Заголовок окна'); ?></h3>
                                                                            <hr>
                                                                            <p class="text--italic"><?php echo $slide->get_field('Подзаголовок окна'); ?></p>
                                                                        </div>
                                                                        <div class="enroll__top__right block--back-image" style="background-image: url('<?php echo $slide->get_img( 'Картинка Большая', 'large' )[0]['src']; ?>'); <?php if ($tab->get_field('CONTAIN')) echo 'background-size: contain;' ?>">
                                                                            <!--                                                                <img src="--><?php //echo $slide->get_img( 'Картинка Большая', 'large' )[0]['src']; ?><!--" alt="">-->
                                                                        </div>
                                                                    </div>
                                                                    <div class="enroll__bottom">
                                                                        <div class="enroll__bottom__left">
                                                                            <div class="align--left">
                                                                                <?php echo $slide->get_field('Описание слева окна'); ?>
                                                                            </div>
                                                                        </div>

                                                                        <div class="enroll__bottom__right">
                                                                            <div class="scroll-box__cont scroll-box__cont--100per">
                                                                                <div class="scrollable--tmp scrollable--set-height">
                                                                                    <?php echo htmlspecialchars_decode($slide->get_field('Описание справа окна')); ?>
                                                                                    <!--                                                                    <p>--><?php //echo $slide->get_field('Описание справа окна'); ?><!--</p>-->
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
                                <?php  } ?>
                            <?php } ?>
                            <?php /* < */ ?>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>

        <div id="services__enroll">
            <?php
            echo $more_html;
            ?>
        </div>
    </div>



    <div class="services__main ">
        <div class="services__main__left">
            <?php
            $tabs = $Mammen->get_fields( 'Таб' );
            $k = 0;
            if ( count( $tabs ) ) {
                $i=0;
                foreach ( $tabs as $tab ) {
                    ++$k;
                    $i++;
                    $img_id = $tab->get_img( 'Изображение hover-эффект', 'large' )[0]['id'];
                    $img = $tab->get_img( 'Изображение hover-эффект', 'large' )[0]['src'];
                    if (!$img_id) {
                        $img = get_template_directory_uri() . '/img/services-main.png';
                    }
                    if ($k == 1) {
                        $img_first = $img;
                    }
                    ?>
                    <img src="<?php echo $img; ?>" alt="" class="img--hidden">
                    <a href="#" class="services__link with_slide_<?= $i ?>" data-target="services__blocks <?php echo $k; ?>" data-img="<?php echo $img; ?>">
                        <span><?php echo tbs_get_number_with_zero($k); ?></span>
                        <span><?php echo $tab->get_field('Заголовок'); ?></span>
                    </a>
                    <?php
                }
            }
            ?>
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
</div>