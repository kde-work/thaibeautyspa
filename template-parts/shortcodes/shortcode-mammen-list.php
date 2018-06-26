<?php

// Shortcode mammen_list_$type
function mammen_list ( $atts ) {
	extract( shortcode_atts( array(
			'category'       => 0,
			'type'           => 'promotions',
			'offset'         => 0,
			'posts_per_page' => 6,
			'orderby'        => 'title',
			'order'          => 'ASC',
			'device'         => 'desktop'
		), $atts )
	);
	ob_start();

	$tax_query = '';
	if ( $category ) {
		$tax_query = array(
			'taxonomy' => "cdi{$type}-category",
			'field'    => 'name',
			'terms'    => $category
		);
	}

	$args = array(
		'post_type' => $type,
		'posts_per_page' => $posts_per_page,
		'post_status' => 'publish',
		'orderby'  => $orderby,
		'order' => $order,
		'offset' => $offset,
		'tax_query' => array(
			$tax_query
		)
	);

	$args_all = array(
		'post_type' => $type,
		'posts_per_page' => -1,
		'post_status' => 'publish',
		'offset' => $offset,
		'tax_query' => array(
			$tax_query
		)
	);

	$the_query = new WP_Query( $args );
	$the_query_all = new WP_Query( $args_all );
	$is_max = 0;
	if ( count( $the_query_all->posts ) <= ( $posts_per_page + $offset ) ) {
		$is_max = 1;
	}

    if ( $the_query->have_posts() ) {
        $the_query->the_post();

        ?>
        <div class="row m-btm-40 w-row">
        <?php

        $j = 0;
        foreach ($the_query->posts as $key => $value) {
	        if ($type != 'racing-event') {
		        $image_id           = get_post_meta( $value->ID, "cdi$type-meta-image", true );
		        $image_url          = wp_get_attachment_image_src( $image_id, 'full' )[0];
		        $cardsupportingtext = get_post_meta( $value->ID, "cdi$type-meta-text", true );
		        $cardcopy           = get_post_meta( $value->ID, "cdi$type-meta-textarea", true );
		        $booknowtext        = get_post_meta( $value->ID, "cdi$type-meta-text-1", true );
		        $booknowurl         = get_post_meta( $value->ID, "cdi$type-meta-text-2", true );
		        $ctabtntext         = get_post_meta( $value->ID, "cdi$type-meta-text-3", true );
		        $ctabtnurl          = get_post_meta( $value->ID, "cdi$type-meta-text-4", true );
	        } else {
//		        $cardcopy = wp_trim_words(get_post( $value->ID )->post_content, 12);
		        $cardsupportingtext = get_post_meta( $value->ID, "cdiracing-meta-text-card", true );
		        $cardcopy           = get_post_meta( $value->ID, "cdiracing-meta-textarea", true );
		        $booknowtext        = 'Learn More';
		        $booknowurl         = get_the_permalink( $value->ID );
            }

            if ( $device == 'desktop' ) {
                if ( ($j % 3) == 0 AND $j ) {
                    echo '</div>';
                    echo '<div class="row m-btm-40 w-row">';
                }
                $j++;
                ?>
                <div class="col w-col w-col-4 bottom-margin" data-count="<?php echo $is_max; ?>">
                    <div class="card-wrap">
                        <?php
                        if ($type != 'racing-event') {
	                        ?>
                            <a href="#" class="card-img-link-block w-inline-block">
                                <img src="<?php echo $image_url; ?>" sizes="(max-width: 991px) 100vw, 24vw"
                                     class="card-img">
                            </a>
	                        <?php
                        }
                        ?>
                        <div class="card-title-block">
                            <h3 class="card-title"><?php echo get_the_title( $value->ID ); ?></h3>
                            <p class="card-text sub"><?php echo $cardsupportingtext; ?></p>
                            <p class="card-text"><?php echo $cardcopy; ?></p>
                            <div class="card-action-block">
                                <?php if ( $booknowurl AND $booknowtext ) { ?><a href="<?php echo $booknowurl; ?>"
                                                                                 class="card-primary-btn w-button"><?php echo $booknowtext; ?></a><?php } ?>
                                <?php if ( $ctabtnurl AND $ctabtntext ) { ?><a href="<?php echo $ctabtnurl; ?>"
                                                                               class="card-secondary-btn w-button"><?php echo $ctabtntext; ?></a><?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            } else {
                if ( ($j % 2) == 0 AND $j ) {
                    echo '</div>';
                    echo '<div class="row m-btm-40 w-row">';
                }
                $j++;
                ?>
                <div class="col w-col w-col-6 bottom-margin" data-count="<?php echo $is_max; ?>">
                    <div class="card-wrap">
                        <a href="#" class="card-img-link-block w-inline-block">
                            <img src="<?php echo $image_url; ?>" sizes="(max-width: 767px) 95vw, (max-width: 991px) 43vw, 100vw" class="card-img">
                        </a>
                        <div class="card-title-block">
                            <h3 class="card-title"><?php echo get_the_title($value->ID); ?></h3>
                            <p class="card-text sub"><?php echo $cardsupportingtext; ?></p>
                            <p class="card-text"><?php echo $cardcopy; ?></p>
                            <div class="card-action-block">
                                <?php if ( $booknowurl AND $booknowtext ) { ?><a href="<?php echo $booknowurl; ?>"
                                                                                 class="card-primary-btn w-button"><?php echo $booknowtext; ?></a><?php } ?>
                                <?php if ( $ctabtnurl AND $ctabtntext ) { ?><a href="<?php echo $ctabtnurl; ?>"
                                                                               class="card-secondary-btn w-button"><?php echo $ctabtntext; ?></a><?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
        }
        ?>
        </div>
        <?php
    }
    wp_reset_query();

	$output = ob_get_contents();
	ob_end_clean();
	return $output;
}
add_shortcode( 'mammen_list', 'mammen_list' );