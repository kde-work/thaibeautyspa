<?php
/*
Template Name: Social
*/
get_header();
$rows = get_field('social');
?>

<div id="contact-ext" class="main">
<div class="center" >
    <div class="content_social">
        <div class="border-cont__title border-cont__title--left-cont">
            <div class="border-line border-line--desc border-line--30"></div>
            <div class="container__title" style="padding: 0 10px">
                <h4 class="schedule__title h2--one-line mobile">назад</h4>
                <button style="width: 130px;" class="my_btn" onclick="popup_c({'cat':'услуги', 'title':'Заказ услуги', 'email': 1, 'time': 1, 'gender': 1, 'description': 'Услуга: Массаж лица травяными мешочками'}, this);"><?php _e('Назад') ?></button>

            </div>
            <div class="border-line border-line--desc"></div>
        </div>
        <div class="both"></div>
        <div class="social_left">
            <div class="l-text">
                <?php while( have_posts() ) : the_post();
                    the_content();
                endwhile; ?>
            </div>
            <div class="social-bt">
                <?php
                if( have_rows('social') ): while ( have_rows('social') ) : the_row(); ?>
<div class="social_cont">
    <div class="social_wrap">
        <a href="<?php the_sub_field('link'); ?>" target="_blank">
            <div class="social_wrap_img">
                <i class="<?php the_sub_field('fa_icon'); ?>"></i>
            </div>
        </a>

    </div>
    <a href="<?php the_sub_field('link'); ?>" target="_blank"><?php _e('Вступить') ?></a>
</div>
                <?php endwhile; endif; ?>
            </div>
        </div>
        <div class="social_right">
            <img src="<?php the_field('right_image'); ?>" alt="image">
            <div class="r-text">
                <?php the_field('left_text'); ?>
            </div>
        </div>
        <div class="both"></div>
            <div class="border-cont__title border-cont__title--left-cont" style="top: 100%;">
                <div class="border-line border-line--desc"></div>
                <div class="container__title" style="padding: 0 12px;">
                    <button class="my_btn" onclick="popup_c({'cat':'услуги', 'title':'Заказ услуги', 'email': 1, 'time': 1, 'gender': 1, 'description': 'Услуга: Массаж лица травяными мешочками'}, this);"><?php _e('Записаться') ?></button>
                </div>
                <div class="border-line border-line--desc border-line--30"></div>
            </div>
         </div>

    <div class="social_mobi">
        <div class="lines_mobi"></div>
<div class="title_mobi">
    <h2 style="font-size: 36px;"><?php the_field('mobile_title'); ?></h2>
</div>
<div class="social_right_mobi" style="text-align: center!important;">
    <img src="<?php the_field('right_image'); ?>" alt="image" style="max-width: 100%; width: auto;">
    <div class="r-text">
       <?php the_field('left_text'); ?>
    </div>
<div class="social_list_mobi">
    <?php
    if($rows) { foreach($rows as $row) { ?>

        <a href="<?=$row['link']?>">
            <span><?php _e('Вступить') ?></span>
            <i class="<?=$row['fa_icon']?>"></i>
        </a>

    <?php } } ?>
    <button  class="my_btn" onclick="popup_c({'cat':'услуги', 'title':'Заказ услуги', 'email': 1, 'time': 1, 'gender': 1, 'description': 'Услуга: Массаж лица травяными мешочками'}, this);"><?php _e('Назад') ?></button>

</div>
</div>
        <style>
            .lines_mobi {
                width: 100vw;
                background-image: url(<?php echo get_template_directory_uri(); ?>/img/Shape_24_copy_7.png);
                background-repeat: repeat-x;
                height: 3px;
                margin-left: -2.5vw;
            }
            .social_list_mobi a {
                background-color: #b39658;
                font-size: 25px;
                color: #f1f1f1;
                display: inline-block;
                width: 100%;
                margin-bottom: 30px;
                padding: 16px 35px;
                padding-right: 23px ;
                border-radius: 78px;
                max-width: 300px;
                transition: .2s ease-in-out;
            }
            .social_list_mobi a span {
                font-size: 25px;
                font-weight: 700;
                text-transform: uppercase!important;
                /* Text style for "вступить" */
                letter-spacing: 1.25px;
                text-decoration: none;
                font-family: Roboto Condensed,sans-serif;
                float: left;
            }
            .social_list_mobi .my_btn {
                margin-top: 9px;
                transform: none;
                width: 100%;
                max-width: 300px;
                background-color: #0e0020;
                color: #b39658;
                margin-bottom: 70px;
            }
            .social_list_mobi a i {
                float: right;
            }
            .social_list_mobi a:hover {
                background-color: #0e0020;
                color: #b39658!important;
            }
        </style>



    </div>
</div>
    <style>
        .social_mobi {
            display: none;
        }
        .my_btn {
            -webkit-box-shadow: unset;
            -moz-box-shadow: unset;
            box-shadow: unset;
            border: unset;
            width: 220px;
            height: 52px;
            border-radius: 26px;
            background-color: #b39658;
            color: #0e0020;
            font-family: "Roboto Condensed";
            font-size: 22px;
            font-weight: 700;
            text-transform: uppercase;
            line-height: 52px;
            cursor: pointer;
            -webkit-transition: .3s ease-in-out;
            -moz-transition: .3s ease-in-out;
            -ms-transition: .3s ease-in-out;
            -o-transition: .3s ease-in-out;
            transition: .3s ease-in-out;
            top: 0;
            transform: translateY(-50%);
        }
        .my_btn:hover {
            color: #b39658;
            background-color: #0e0020;
        }
        .content_social {
            padding-top: 31px;
            margin-top: 100px;
            position: relative;
            border-right: 1px solid #000 ;
            border-left: 1px solid #000 ;
            padding-bottom: 50px;
        }
        .content_social h2, .title_mobi h2 {
            color: #0e0020;
            font-size: 36px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: -0.42px;
            font-family: Times New Roman, Times, serif;
        }
        .content_social h3 {
            color: #0e0020;
            font-family: "Roboto Condensed";
            font-size: 30px;
            font-weight: 700;
            line-height: 29.17px;
            letter-spacing: -0.33px;
            margin-bottom: 18px;
        }
        .content_social p {
            color: #0e0020;
            font-family: "Roboto Condensed";
            font-size: 16px;
            font-weight: 400;
        }
        .content_social h4 {
            color: #0e0020;
            font-family: "Roboto Condensed";
            font-size: 27px;
            font-weight: 700;
            line-height: 29.17px;
            letter-spacing: -0.33px;
            margin-top: 25px;
            margin-bottom: 10px;
        }
        .both {
            clear: both;
        }
        .social_right img{
            max-width: 100%;
        }
        .social_left {
            width: 50%;
            padding-left: 30px;
            padding-right: 5px;
            padding-top: 12px;
            display: inline-block;
            float: left;
        }
        .social_right {
            width: 50%;
            display: inline-block;
            float: left;
        }
        .social_wrap {
            padding: 7px;
            border: 1px solid #0e0020;
            border-radius: 50%;
        }
        .social_cont {
            max-width: 130px;
            float: left;
            margin-right: 31px;
            width: calc(30% - 31px);
            text-align: center;
        }
        .social_cont > a{
            color: #0e0020;
            font-family: "Roboto Condensed";
            font-size: 14px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: -0.14px;
        }
        .social_wrap_img {
            position: relative;
            width: 129px;
            max-width: 100%;
            -webkit-transition: all 0.2s ease-in-out;
            -moz-transition: all 0.2s ease-in-out;
            -ms-transition: all 0.2s ease-in-out;
            -o-transition: all 0.2s ease-in-out;
            transition: all 0.2s ;
            border-radius: 50%;
            background-color: #b39658;
        }
        .social_wrap_img i {
            position: absolute;
            left: 50%;
            top: 50%;
            color: #fff;
            -webkit-transform: translate(-50%, -50%);
            -moz-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            -o-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            -webkit-transition: all 0.2s;
            -moz-transition: all 0.2s;
            -ms-transition: all 0.2s;
            -o-transition: all 0.2s;
            transition: all 0.2s;
        }
        .social_wrap_img:before{
            content: "";
            display: block;
            padding-top: 100%;
        }
        .social_wrap_img:hover {
            background-color: transparent;
        }
        .social_wrap_img:hover i {
            color: #b39658;
        }

        @media screen and (max-width: 1080px) {
            .lines_mobi {
                margin-top: 64px;
                margin-bottom: 44px;
                min-height: 1px;
            }
            .content_social {
                display: none;
            }
            .social_mobi {
                display: block;
            }
            .social_mobi h2{
                font-size: 36px;
                font-weight: 400;
                text-transform: uppercase;
                /* Text style for "В, СТУПАЙТ" */
                letter-spacing: -0.36px;
                text-align: center;
                font-weight: 600;
                margin-bottom: 33px;
            }
            .social_mobi h4 {
                margin-top: 41px;
                margin-bottom: 30px;
                font-size: 24px;
                font-weight: 700;
                line-height: 29.17px;
                letter-spacing: -0.24px;

            }
            .social_mobi p{
                font-size: 19px;
                font-weight: 400;
                margin-bottom: 69px;
             }
        }
    </style>
</div>
<div class="content_social_mobi">

</div>
<?php
get_footer();
?>
<script>
    function fillDiv(div, proportional) {
        var div = jQuery('.social_wrap_img');
        var currentHeight = div.height();
        var ch = currentHeight/2;
        div.css({
            "font-size": 'calc(' + currentHeight + 'px - ' + ch + 'px )'
        });
    }
    fillDiv();
    jQuery( window ).resize(fillDiv)
</script>














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
                        <a href="" target="_blank">
                            <div class="social_wrap_img">
                                <i class=""></i>
                            </div>
                        </a>

                    </div>
                    <a href="" target="_blank"><?php _e('Вступить') ?></a>
                </div>
                <div class="social_cont">
                    <div class="social_wrap">
                        <a href="" target="_blank">
                            <div class="social_wrap_img">
                                <i class=""></i>
                            </div>
                        </a>

                    </div>
                    <a href="" target="_blank"><?php _e('Вступить') ?></a>
                </div>
                <div class="social_cont">
                    <div class="social_wrap">
                        <a href="" target="_blank">
                            <div class="social_wrap_img">
                                <i class=""></i>
                            </div>
                        </a>

                    </div>
                    <a href="" target="_blank"><?php _e('Вступить') ?></a>
                </div>
            </div>
        </div>
        <div class="social_right">
            <img src="<?php echo $tab->get_img( 'Картинка окна', 'large' )[0]['src']; ?>" alt="image">
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
            <h2 style="font-size: 36px;"><?php echo $tab->get_field('Заголовок окна'); ?></h2>
        </div>
        <div class="social_right_mobi" style="text-align: center!important;">
            <img src="<?php echo $tab->get_img( 'Картинка окна', 'large' )[0]['src']; ?>" alt="image" style="max-width: 100%; width: auto;">
            <div class="r-text">
                <p><?php echo $tab->get_field('Текст слева внизу'); ?></p>
            </div>
            <div class="social_list_mobi">

                <a href="https://vk.com/thaispasalon">
                    <span><?php _e('Вступить') ?></span>
                    <i class=""></i>
                </a>
                <a href="https://www.instagram.com/thaibeautyspa_/">
                    <span><?php _e('Вступить') ?></span>
                    <i class=""></i>
                </a>
                <a href="https://www.facebook.com/waithairechnoi/posts/1661690440595965">
                    <span><?php _e('Вступить') ?></span>
                    <i class=""></i>
                </a>
                <button class="btn btn__back">НАЗАД</button>
            </div>
        </div>

    </div>
</div>





























<style>
    .social_content_slides .lines_mobi {
        width: 100vw;
        background-image: url(<?php echo get_template_directory_uri(); ?>/img/Shape_24_copy_7.png);
        background-repeat: repeat-x;
        height: 3px;
        margin-left: -2.5vw;
    }
    .social_content_slides .social_list_mobi a {
        background-color: #b39658;
        font-size: 25px;
        color: #f1f1f1;
        display: inline-block;
        width: 100%;
        margin-bottom: 30px;
        padding: 16px 35px;
        padding-right: 23px ;
        border-radius: 78px;
        max-width: 300px;
        transition: .2s ease-in-out;
    }
    .social_content_slides .social_list_mobi a span {
        font-size: 25px;
        font-weight: 700;
        text-transform: uppercase!important;
        /* Text style for "вступить" */
        letter-spacing: 1.25px;
        text-decoration: none;
        font-family: Roboto Condensed,sans-serif;
        float: left;
    }
    .social_content_slides .social_list_mobi .my_btn {
        margin-top: 9px;
        transform: none;
        width: 100%;
        max-width: 300px;
        background-color: #0e0020;
        color: #b39658;
        margin-bottom: 70px;
    }
    .social_content_slides .social_list_mobi a i {
        float: right;
    }
    .social_content_slides .social_list_mobi a:hover {
        background-color: #0e0020;
        color: #b39658!important;
    }
</style>
<style>
    .social_content_slides .social_mobi {
        display: none;
    }
    .social_content_slides .my_btn {
        -webkit-box-shadow: unset;
        -moz-box-shadow: unset;
        box-shadow: unset;
        border: unset;
        width: 220px;
        height: 52px;
        border-radius: 26px;
        background-color: #b39658;
        color: #0e0020;
        font-family: "Roboto Condensed";
        font-size: 22px;
        font-weight: 700;
        text-transform: uppercase;
        line-height: 52px;
        cursor: pointer;
        -webkit-transition: .3s ease-in-out;
        -moz-transition: .3s ease-in-out;
        -ms-transition: .3s ease-in-out;
        -o-transition: .3s ease-in-out;
        transition: .3s ease-in-out;
        top: 0;
        transform: translateY(-50%);
    }
    .social_content_slides .my_btn:hover {
        color: #b39658;
        background-color: #0e0020;
    }
    .social_content_slides .content_social {
        padding-top: 31px;
        margin-top: 100px;
        position: relative;
        border-right: 1px solid #000 ;
        border-left: 1px solid #000 ;
        padding-bottom: 50px;
    }
    .social_content_slides .content_social h2, .title_mobi h2 {
        color: #0e0020;
        font-size: 36px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: -0.42px;
        font-family: Times New Roman, Times, serif;
    }
    .social_content_slides .content_social h3 {
        color: #0e0020;
        font-family: "Roboto Condensed";
        font-size: 30px;
        font-weight: 700;
        line-height: 29.17px;
        letter-spacing: -0.33px;
        margin-bottom: 18px;
    }
    .social_content_slides .content_social p {
        color: #0e0020;
        font-family: "Roboto Condensed";
        font-size: 16px;
        font-weight: 400;
    }
    .social_content_slides .content_social h4 {
        color: #0e0020;
        font-family: "Roboto Condensed";
        font-size: 27px;
        font-weight: 700;
        line-height: 29.17px;
        letter-spacing: -0.33px;
        margin-top: 25px;
        margin-bottom: 10px;
    }
    .social_content_slides .both {
        clear: both;
    }
    .social_content_slides .social_right img{
        max-width: 100%;
    }
    .social_content_slides .social_left {
        width: 50%;
        padding-left: 30px;
        padding-right: 5px;
        padding-top: 12px;
        display: inline-block;
        float: left;
    }
    .social_content_slides .social_right {
        width: 50%;
        display: inline-block;
        float: left;
    }
    .social_content_slides .social_wrap {
        padding: 7px;
        border: 1px solid #0e0020;
        border-radius: 50%;
    }
    .social_content_slides .social_cont {
        max-width: 130px;
        float: left;
        margin-right: 31px;
        width: calc(30% - 31px);
        text-align: center;
    }
    .social_content_slides .social_cont > a{
        color: #0e0020;
        font-family: "Roboto Condensed";
        font-size: 14px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: -0.14px;
    }
    .social_content_slides .social_wrap_img {
        position: relative;
        width: 129px;
        max-width: 100%;
        -webkit-transition: all 0.2s ease-in-out;
        -moz-transition: all 0.2s ease-in-out;
        -ms-transition: all 0.2s ease-in-out;
        -o-transition: all 0.2s ease-in-out;
        transition: all 0.2s ;
        border-radius: 50%;
        background-color: #b39658;
    }
    .social_content_slides .social_wrap_img i {
        position: absolute;
        left: 50%;
        top: 50%;
        color: #fff;
        -webkit-transform: translate(-50%, -50%);
        -moz-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        -o-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        -webkit-transition: all 0.2s;
        -moz-transition: all 0.2s;
        -ms-transition: all 0.2s;
        -o-transition: all 0.2s;
        transition: all 0.2s;
    }
    .social_content_slides .social_wrap_img:before{
        content: "";
        display: block;
        padding-top: 100%;
    }
    .social_content_slides .social_wrap_img:hover {
        background-color: transparent;
    }
    .social_content_slides .social_wrap_img:hover i {
        color: #b39658;
    }

    @media screen and (max-width: 1080px) {
        .social_content_slides .lines_mobi {
            margin-top: 64px;
            margin-bottom: 44px;
            min-height: 1px;
        }
        .social_content_slides .content_social {
            display: none;
        }
        .social_content_slides .social_mobi {
            display: block;
        }
        .social_content_slides .social_mobi h2{
            font-size: 36px;
            font-weight: 400;
            text-transform: uppercase;
            /* Text style for "В, СТУПАЙТ" */
            letter-spacing: -0.36px;
            text-align: center;
            font-weight: 600;
            margin-bottom: 33px;
        }
        .social_content_slides .social_mobi h4 {
            margin-top: 41px;
            margin-bottom: 30px;
            font-size: 24px;
            font-weight: 700;
            line-height: 29.17px;
            letter-spacing: -0.24px;

        }
        .social_content_slides .social_mobi p{
            font-size: 19px;
            font-weight: 400;
            margin-bottom: 69px;
        }
    }
</style>
































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
                        ?>
                        <div class="best-service-m__item shares-mobile" data-id="<?php echo $j; ?>">
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
                                <div class="btn btn--small-more best-service-m__btn <?php echo $class_name; ?>" onclick="popup_c({'cat':'Акции', 'title':'<?php echo $btn; ?>', 'subtitle':'<?php echo $tab->get_field('Заголовок слайда'); ?>', 'email': 1, 'time': 0, 'gender': 0, 'modal_text': '<?php echo str_replace(array('<br>', '<br />'), ' ', $tab->get_field('Описание под названием')); ?>', 'description': 'Акция: <?php echo str_replace(array('<br>', '<br />'), ' ', $tab->get_field('Описание под названием')); ?>. /<?php echo str_replace(array('<br>', '<br />'), ' ', $tab->get_field( 'Описание под названием')); ?>/', 'template': 'wide'}, this);"><? echo $btn; ?></div>
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
                                <div id="<?php echo $j; ?>" class="more-box__item more-box__item--<?php echo $j; ?>">
                                    <div class="main enroll">
                                        <div class="center more-box__center" style="    padding-right: 0;">
                                            <div class="container__wrap"><img src="<?php echo get_template_directory_uri(); ?>/img/border-8.png" alt=""></div>
                                            <button class="btn btn__back">НАЗАД 1</button>
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
            <div class="cont-with-more__more more-box"><?php echo $more_html; ?></div>
        </div>
    </div>
</div>


