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
 * COMPONENT IMPLEMENTATION: Контакты для главной
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
<div class="section active" data-menuanchor="firstPage" id='contact-ext'>
	<div class="main ">
        <div class="contact-block">
            <div class="contacts-box">
                <?php
                if ( count( $cities ) ) {
                    $j = 0;
                    foreach ( $cities as $city ) {
                        $j++;
                        ?>
                        <div class="center__left contact-ext contact-ext--<?php echo $j; ?> <?php echo ($j==1)?'contact-ext--active':''; ?>" data-id="<?php echo $j; ?>" >
                                <div class="contact__map ">
                                    <?php echo $city->get_field( 'Код карты' ); ?>
                                </div>
                            </div>
                        <?php
                    }
                }?>

                <div class="center__right">

                    <div class="contacts-title">
                        <h3 class="big-title f--65"><?php echo $Mammen->get_field( 'Название блока' ); ?></h3>
                        <div id="dd" class="wrapper-dropdown wrapper-dropdown--contacts wrapper-dropdown-1 city-down"><span><?php echo $first_city; ?></span>
                            <ul class="dropdown city-down__ul">
                                <?php
                                if ( count( $cities ) ) {
                                    $j = 0;
                                    foreach ( $cities as $city ) {
                                        $j++;
                                        ?>
                                        <li class="city-down__item <?php echo ($j==1)?'city-down__item--active':''; ?>" data-id="<?php echo $j; ?>" > <?php echo $city->get_field( 'Название города' ); ?> </li>
                                        <?php
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                    </div>

                    <?php
                    if ( count( $cities ) ) {
                        $j = 0;
                        foreach ( $cities as $city ) {
                            $j++;
                            ?>
                            <div class="contact-ext contact-ext--<?php echo $j; ?> <?php echo ($j==1)?'contact-ext--active':''; ?>" data-id="<?php echo $j; ?>" >
                                <div class="center__right__block">
                                    <p class="text--bold f--24"><?php echo $city->get_field( 'Адрес' ); ?></p>
                                </div>
                                <div class="center__left__time time-block">
                                    <p class="f--16"><?php echo $city->get_field( 'Время работы' ); ?></p>
                                </div>
                                <div class="center__right__block phone-block">
                                    <?php
                                    $phones = $city->get_fields( 'Наши телефоны' );
                                    if ( count( $phones ) ) {
                                        foreach ( $phones as $phone ) {
                                            ?>
                                            <p class="text--bold f--30"><a
                                                    href="tel:<?php echo tbs_clear_phone( $phone->get_field( 'Телефон' ) ); ?>"><?php echo $phone->get_field( 'Телефон' ); ?></a>
                                            </p>
                                            <?php
                                        }
                                    }
                                    ?>
                                </div>

                                <div class="center__right__block ">
                                    <p class="text--italic contact__email"><a
                                            href="mailto:<?php echo $city->get_field( 'Email' ); ?>"><?php echo $city->get_field( 'Email' ); ?></a>
                                    </p>
                                </div>
                            </div>
                            <?php
                        }
                    }?>
                </div>
            </div>
        </div>
        <div class="contacts-footer">
            <div class="contacts-footer__item copyright">© ThaiBeautySpa 2012-2018. Все права защищены.</div>
            <div class="contacts-footer__item politika"><div onclick="popup_none_cta({'id':'private'});">Политика конфиденциальности</div></div>
        </div>
	</div>
</div>