<!DOCTYPE html>
<!--[if lt IE 8]>		<html class="no-js lt-ie9 lt-ie8" dir="ltr" lang="ru-RU"> <![endif]-->
<!--[if IE 8]>			<html class="no-js lt-ie9" dir="ltr" lang="ru-RU"> <![endif]-->
<!--[if gt IE 8]><!-->	<html class="no-js" dir="ltr" lang="ru-RU"> <!--<![endif]-->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title(); ?></title>
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon.png" type="image/x-icon">
    <?php wp_head(); ?>
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
</head>
<?php
$classes = array();
if (function_exists('get_field')) {
	if (get_field('body_classes', get_the_ID())) {
		$classes = explode(' ', get_field('body_classes', get_the_ID()));
	}
}
?>
<body <?php body_class($classes); ?>>

<?php if (function_exists('get_field') AND get_field('fullpage', get_the_ID())) : ?>
<div id="fullpage">
<?php endif; ?>
	<?php
	if (function_exists('get_field')) {
		if (get_field('произвольный_html', get_the_ID())) {
			echo get_field('произвольный_html', get_the_ID());
		}
	}
	?>
    <div class="main__menu__block">
        <div id="main__menu__block__close"></div>
        <div class="menu__animation"></div>f
        <a href="/" class="main__menu__logo main__logo"><img src="<?php echo get_template_directory_uri(); ?>/img/logo-gold.svg" alt="logo"></a>
        <nav class="main__menu__links">
            <?php
//            $args = array(
//	            'theme_location'    => 'navigation_menu_primary',
//	            'container'     => 'div',
//	            'container_id'      => 'top-navigation-primary',
//	            'conatiner_class'   => 'top-navigation',
//	            'menu_class'        => 'menu main-menu menu-depth-0 menu-even',
//	            'echo'          => true,
//	            'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s</ul>',
//	            'depth'         => 10,
//	            'walker'        => new magomra_walker_nav_menu
//            );
//
//            // print menu
            wp_nav_menu('Главное');
            ?>
        </nav>
        <div class="wrap">
            <button class="btn" onclick="popup_c({'cat':'обратный-звонок', 'title':'Обратный звонок', 'email': 1, 'time': 0, 'gender': 0, 'description': 'Заказ обратного звонка'}, this);">Обратный звонок</button>
        </div>
    </div>
    <div class="main__menu__button startMenuLeft"><button class="main__menu__btn"></button><a href="#">Меню</a></div>

    <div class="right ">
        <div class="main__right__top">
            <p class="text--italic">Мы в соц, сетях:</p>
            <div class="main__social">
                <a href="https://www.facebook.com/waithairechnoi/posts/1661690440595965" target="_blank"></a>
                <a href="https://www.instagram.com/waithairechnoi/" target="_blank"></a>
                <a href="https://vk.com/thaispasalon" target="_blank"></a>
            </div>
        </div>
        <div class="main__right__bottom">
            <p class="text--italic">Выбрать язык:</p>
            <div class="main__lang">
                <a href=""><img src="<?php echo get_template_directory_uri(); ?>/img/lang-eng.png" alt=""></a>
                <a href=""><img src="<?php echo get_template_directory_uri(); ?>/img/lang-rus.png" alt=""></a>
            </div>
        </div>
    </div>

    <div class="left ">
        <a href="/" class="main__logo"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.svg" alt=""></a>
        <div class="center">
            <div class="mobile">
                <div class="flower--mobile mobile"><img src="<?php echo get_template_directory_uri(); ?>/img/flower.png" alt=""></div>
                <span class="b mobile"></span>
                <span class="s mobile">S</span>
                <span class="t mobile">T</span>
                <div class="header-phone-title">Для быстрых заказов</div>
                <a class="header-phone" href="tel:84951455262">+7 (495) 145-52-62</a>
                <a class="header-phone" href="tel:89011842332">+7 (901) 184 23 32</a>
            </div>
        </div>
    </div>