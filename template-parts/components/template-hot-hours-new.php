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
 * COMPONENT IMPLEMENTATION: Горячие часы новый макет
 *
 */

global $Mammen;
?>

<div class="section hot-hours-ext" id="third">

    <div class="main third slide active">
        <div class="center">
            <div class="hot-hours-bg"></div>
            <div class="hot-hours-info-cont">
                <div class="center__info">
                    <h3><?php echo $Mammen->get_field( 'Заголовок' ); ?></h3>
                    <p class="hot-hours__subtitel"><?php echo $Mammen->get_field( 'Подзаголовок' ); ?></p>
                    <hr>
                    <div class="center_info__grey"></div>
                    <p class="hot-hours__text"><?php echo $Mammen->get_field( 'Описание' ); ?></p>
                </div>
            </div>
            <div class="hot-hours-list-cont">
                <div class="center__left__service border-box">
                    <div class="service__data">
                        <!-- <div class="service__data__wrap"><img src="<?php echo get_template_directory_uri(); ?>/img/border-11.png" alt=""></div> -->
						<?php
						$places = tbs_list_of_cat('cdihothours-category');
						$k = 0;

						ob_start();
						?>
                        <div class="service__salon">
                            <div id="dd" class="wrapper-dropdown wrapper-dropdown-1 city-down"><span><?php echo $places[0]['name']; ?></span>
                                <ul class="dropdown city-down__ul">
				                    <?php
				                    $u = 0;
				                    foreach ($places as $place) {
				                    ++$u;
				                    ?>
                                    <li class="city-down__item <?php echo ($u == 1)?'city-down__item--active':''; ?>" <?php echo ($u == 1)?'selected':''; ?> data-id="<?php echo $u; ?>"><?php echo $place['name']; ?>
					                    <?php
					                    }
					                    ?>
                                    </li>
                                </ul>
                            </div>
                        </div>
	                    <?php
	                    $dropdown .= ob_get_contents();
	                    ob_end_clean();
                        ?>
                        <div class="mobile">
		                    <?php echo $dropdown; ?>
                        </div>
                        <?php
						foreach ( $places as $place ) {
							++ $k;
							?>
                            <div class="hot-hours hot-hours--<?php echo $k; ?> <?php echo ($k === 1)?'hot-hours--active':''; ?>">
                                <div class="scrollable hot-hours__scrollable">
                                    <ul>
                                        <li>
                                            <?php
                                            if ( !empty( $_GET['pag'] ) AND ($_GET['pag'] == 'hot-hours') ) :
	                                            ?>
                                                <script>
                                                    $(function(){
                                                        $.fn.fullpage.silentMoveTo(4);
                                                    });
                                                </script>
                                            <?php
                                            endif;

                                            $posts = tbs_list_post_by_post_type( 'hothours', $place['term_id'] );
                                            $c = 0;
                                            foreach ( $posts as $post ) {
                                                $title     = get_the_title( $post['ID'] );
                                                $date      = strtotime( get_post_meta( $post['ID'], 'demo-meta-datepicker', true ) );
                                                $time      = get_post_meta( $post['ID'], 'demo-meta-time', true );
//                                                $action_descr = get_post_meta( $post['ID'], 'cdihothours-meta-text-old-price', true );
                                                $action_descr = get_fields( $post['ID'], 'desc_hoth' )['desc_hoth'];

                                                $time_tmp = explode(":", $time);
                                                $post_time = $time_tmp[0]*60*60 + $time_tmp[1]*60 + $date;
	                                            date_default_timezone_set( 'Europe/Moscow' );
//                                                print_r("{$time_tmp[0]} $post_time ". time() . " " . (($post_time - time())/60));
	                                            if ( ( time() + date("Z") ) > $post_time ) {
	                                                continue;
                                                }
	                                            ?>
                                                <div class="desktop">
                                                    <div class="service__data__item">
                                                        <div class="data__item__date">
                                                            <p ><span class="data__item__date-style"><?php
                                                                    echo date( 'd', $date ); ?></span>
                                                                <br><span class="data__item__month-style"><?php
                                                                    $months = array(1 => 'Янв' , 'Фев' , 'Март' , 'Апр' , 'Май' , 'Июня' , 'Июля' , 'Авг' , 'Сен' , 'Окт' , 'Нояб' , 'Дек');
                                                                    $month = $months[date( 'n', $date )];
                                                                    echo $month;
                                                                    ?></span></p>
                                                        </div>
                                                        <div class="data__item__time">
                                                            <p class="text--data"><?php echo $time; ?></p>
                                                        </div>
                                                        <div class="data__item__price">
                                                            <p class="text--italic"><?php echo $title; ?></p>
                                                            <div class="price__info">
                                                                <p class="prive__info--stock"><?php echo $action_descr; ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="wrap data__item__btn">
                                                            <div class="data__item__btn--wrap">
                                                                <?php
                                                                if (function_exists('get_fields')) {
                                                                    $serv = get_fields($post['ID'], 'связанная_услуга')['связанная_услуга'];
                                                                    $modal_text = str_replace(array("'", "\n", "\r", "\n\r"), ' ', strip_tags(get_post_meta( $serv->ID, 'cdiservices-meta-textarea', true )));
        //                                                        print_r($serv);
                                                                }
                                                                ?>
                                                                <button class="btn" onclick="popup_c({'cat':'горячие-часы', 'title':'Записаться на горячие часы', 'subtitle':'<?php echo $title; ?>', 'modal_text':'<?php echo $modal_text; ?>', 'template': 'wide', 'email': 1, 'time': 0, 'gender': 0, 'description': 'Горячие часы. <?php echo date( 'd.m.Y', $date ) . " в $time. Название: $title. Описание предложения: $action_descr. Салон: {$place['name']}"; ?>', 'day': '<?php echo date('d', $date); ?>', 'month': '<?php echo $month; ?>', 'big_time': '<?php echo $time; ?>'}, this);">Подробнее</button>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mobile">
                                                    <div class="hot-hours__m-title"><?php echo $title; ?></div>
                                                    <div class="service__data__item">
                                                        <div class="data__item__date">
                                                            <p ><span class="data__item__date-style"><?php
                                                                    echo date( 'd', $date ); ?></span>
                                                                <br><span class="data__item__month-style"><?php
                                                                    $months = array(1 => 'Янв' , 'Фев' , 'Март' , 'Апр' , 'Май' , 'Июня' , 'Июля' , 'Авг' , 'Сен' , 'Окт' , 'Нояб' , 'Дек');
                                                                    $month = $months[date( 'n', $date )];
                                                                    echo $month;
                                                                    ?></span></p>
                                                        </div>
                                                        <div class="data__item__time">
                                                            <p class="text--data big-orange"><?php echo $time; ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="price__info hot-hours__m-desc">
	                                                    <?php echo $action_descr; ?>
                                                    </div>
                                                    <div class="best-service-m__center">
	                                                    <?php
	                                                    if (function_exists('get_fields')) {
		                                                    $serv = get_fields($post['ID'], 'связанная_услуга')['связанная_услуга'];
		                                                    $modal_text = str_replace(array("'", "\n", "\r", "\n\r"), ' ', strip_tags(get_post_meta( $serv->ID, 'cdiservices-meta-textarea', true )));
		                                                    //                                                        print_r($serv);
	                                                    }
	                                                    ?>
                                                        <button class="btn btn--small-more best-service-m__btn" onclick="popup_c({'cat':'горячие-часы', 'title':'Записаться на горячие часы', 'subtitle':'<?php echo $title; ?>', 'modal_text':'<?php echo $modal_text; ?>', 'template': 'wide', 'email': 1, 'time': 0, 'gender': 0, 'description': 'Горячие часы. <?php echo date( 'd.m.Y', $date ) . " в $time. Название: $title. Описание предложения: $action_descr. Салон: {$place['name']}"; ?>', 'day': '<?php echo date('d', $date); ?>', 'month': '<?php echo $month; ?>', 'big_time': '<?php echo $time; ?>'}, this);">Подробнее</button>
                                                    </div>
                                                </div>
                                                <?php
	                                            $c++;
                                            }
                                            if ( !$c ) {
                                                echo "<div class='hot-hours__none'>Горячих часов нет</div>";
                                            }
                                            ?>
                                        </li>
                                    </ul>
                                </div>
                            </div>
							<?php
						}
						?>
                        <div class="desktop">
                            <?php echo $dropdown; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>