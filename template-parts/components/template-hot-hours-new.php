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
						foreach ( $places as $place ) {
							++ $k;
							?>
                            <div class="hot-hours hot-hours--<?php echo $k; ?>">
                                <ul>
                                    <li>
										<?php
										$posts = tbs_list_post_by_post_type( 'hothours', $place['term_id'] );
										$k     = 0;
										foreach ( $posts as $post ) {
											++ $k;

											$title     = get_the_title( $post['ID'] );
											$date      = strtotime( get_post_meta( $post['ID'], 'demo-meta-datepicker', true ) );
											$time      = get_post_meta( $post['ID'], 'demo-meta-time', true );
											$action_descr = get_post_meta( $post['ID'], 'cdihothours-meta-text-old-price', true );
//											$new_price = get_post_meta( $post['ID'], 'cdihothours-meta-text-new-price', true );
											?>
                                            <div class="service__data__item">
                                                <div class="data__item__date">
                                                    <p ><span class="data__item__date-style"><?php
															echo date( 'd', $date ); ?></span>
                                                        <br><span class="data__item__month-style"><?php
															$months = array( 1 => 'Янв' , 'Фев' , 'Март' , 'Апр' , 'Май' , 'Июня' , 'Июля' , 'Авг' , 'Сен' , 'Окт' , 'Нояб' , 'Дек' );
															$month = date( $months[date( 'n' )], $date );
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
                                                        <button class="btn" onclick="popup_c({'cat':'горячие-часы', 'title':'Записаться на горячие часы', 'subtitle':'<?php echo $title; ?>', 'modal_text':'<?php echo $modal_text; ?>', 'template': 'wide', 'email': 1, 'time': 0, 'gender': 0, 'description': 'Горячие часы. <?php echo date( 'd.m.Y', $date ) . " в $time. Название: $title. Описание предложения: $action_descr. Салон: {$place['name']}"; ?>'}, this);">Подробнее</button>

                                                    </div>
                                                </div>
                                            </div>
											<?php
										}
										?>
                                    </li>
                                </ul>
                            </div>
							<?php
						}
						?>

                        <div class="service__salon">

                            <div id="dd" class="wrapper-dropdown wrapper-dropdown-1 city-down"><span>Москва, ул. Дыбенко</span>
                                <ul class="dropdown city-down__ul">
									<?php
									$k = 0;
									foreach ($places as $place) {
									++$k;
									?>
                                    <li class="city-down__item city-down__item--active" <?php echo ($k == 1)?'selected':''; ?> data-id="1"><?php echo $place['name']; ?>
										<?php
										}
										?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>