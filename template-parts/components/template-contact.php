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
 * COMPONENT IMPLEMENTATION: Контакты
 *
 */

global $Mammen;
?>

<?php
$cities = $Mammen->get_fields( 'Города' );
$first_city = '';
if ( count( $cities ) ) {
	foreach ( $cities as $city ) {
		$first_city = $city->get_field( 'Название города' );
		break;
	}
}
?>
<div id="contact-ext" class="main">
	<div class="center">
		<div class="k"><img src="<?php echo get_template_directory_uri(); ?>/img/K.png" alt=""></div>
		<span class="s">S</span>
		<span class="t">T</span>
		<span class="b">B</span>
        <div class="contact-box">
            <?php
            if ( count( $cities ) ) {
                $j = 0;
                foreach ( $cities as $city ) {
                    $j ++;
                    ?>
                    <div class="contact-ext contact-ext--<?php echo $j; ?> <?php echo ($j==1)?'contact-ext--active':''; ?>" data-id="<?php echo $j; ?>" >
                        <div class="center__left">
                            <div class="center__left__time">
                                <p>Время работы</p>
                                <p class="text--bold f--30"><?php echo $city->get_field( 'Время работы' ); ?></p>
                            </div>
                            <div class="center__left__map"><a target="_blank"
                                                              href="<?php echo $city->get_field( 'Ссылка на карты' ); ?>"><img
                                        src="<?php echo $city->get_img( 'Картинка Карты', 'full' )[0]['src']; ?>" alt="map"></a>
                            </div>
                        </div>
                        <div class="center__right">
                            <div class="center__right__block">
                                <div id="dd" class="contact-box__cities wrapper-dropdown wrapper-dropdown--contacts wrapper-dropdown-1 city-down"><span><?php echo $first_city; ?></span>
                                    <ul class="dropdown city-down__ul">
			                            <?php
			                            if ( count( $cities ) ) {
				                            $k = 0;
				                            foreach ( $cities as $city1 ) {
					                            $k++;
					                            ?>
                                                <li class="city-down__item <?php echo ($k==1)?'city-down__item--active':''; ?>" data-id="<?php echo $k; ?>" > <?php echo $city1->get_field( 'Название города' ); ?> </li>
					                            <?php
				                            }
			                            }
			                            ?>
                                    </ul>
                                </div>
                                <p>Наши телефоны</p>
                                <?php
                                $phones = $city->get_fields( 'Наши телефоны' );
                                if ( count( $phones ) ) {
                                    foreach ( $phones as $phone ) {
                                        ?>
                                        <p class="text--bold"><a
                                                href="tel:<?php echo tbs_clear_phone( $phone->get_field( 'Телефон' ) ); ?>"><?php echo $phone->get_field( 'Телефон' ); ?></a>
                                        </p>
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                            <div class="center__right__block">
                                <p>Наш адрес</p>
                                <p class="text--bold"><?php echo $city->get_field( 'Адрес' ); ?></p>
                            </div>
                            <div class="center__right__block">
                                <p>Email</p>
                                <p class="text--italic contact__email"><a
                                        href="mailto:<?php echo $city->get_field( 'Email' ); ?>"><?php echo $city->get_field( 'Email' ); ?></a>
                                </p>
                            </div>
                            <div class="contact__map">
                                <?php echo $city->get_field( 'Код карты' ); ?>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
	    </div>
	</div>
</div>