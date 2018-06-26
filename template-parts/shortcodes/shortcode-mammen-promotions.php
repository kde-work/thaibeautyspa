<?php

// Shortcode mammen_promotions
function mammen_promotions ( $atts ) {
	extract( shortcode_atts( array(
			'category'       => 0,
			'cat_id'         => '',
			'offset'         => 0,
			'posts_per_page' => 6,
			'is_featured'    => 0,
			'orderby'        => 'title',
			'order'          => 'ASC',
			'device'         => 'desktop'
		), $atts )
	);
	ob_start();

	$tax_query = '';
	if ( $category ) {
		$tax_query = array(
			'taxonomy' => 'cdipromotions-category',
			'field'    => 'name',
			'terms'    => $category
		);
	}

    $featured_meta = '';
    $featured_meta2 = '';
	if ( $is_featured ) {
		$featured_meta = array(
            'key' => 'cdipromotions-meta-checkbox',
            'value' => 'yes',
            'compare' => '!='
        );
		$featured_meta2 = array(
            'key' => 'cdipromotions-meta-checkbox',
            'value' => 'yes',
            'compare' => 'NOT EXISTS'
        );
    } else {
		$posts_per_page = -1;
    }

	$args = array(
		'post_type' => 'promotions',
		'posts_per_page' => $posts_per_page,
		'post_status' => 'publish',
		'orderby'  => $orderby,
		'order' => $order,
		'offset' => $offset,
		'tax_query' => array(
			$tax_query
		),
		'meta_query' => array(
			'relation' => 'OR',
			$featured_meta,
			$featured_meta2
        )
	);

//	$args = array(
//		'post_type' => 'promotions',
//		'posts_per_page' => -1,
//		'post_status' => 'publish',
//		'orderby'  =>'title',
//		'order' => 'ASC',
//		'meta_query' => array(
//			'relation' => 'AND',
//			array(
//				'key' => 'cdipromotions-meta-checkbox',
//				'value' => 'yes',
//				'compare' => '!='
//			)
//		)
//
//	);
	?>
	<div class="m-promotion-cont-<?php echo $device; ?>">
	<?php

	$the_query = new WP_Query( $args );
	if ( $the_query->have_posts() ) {
		$the_query->the_post();

		$total_results = count($the_query->posts);
		foreach ($the_query->posts as $key => $value) {
			$image_id = get_post_meta( $value->ID, 'cdipromotions-meta-image', true );
			$image_url = wp_get_attachment_image_src( $image_id, 'large' )[0];
			$cardsupportingtext = get_post_meta( $value->ID, 'cdipromotions-meta-text', true );
			$cardcopy = get_post_meta( $value->ID, 'cdipromotions-meta-textarea', true );
			$booknowtext = get_post_meta( $value->ID, 'cdipromotions-meta-text-1', true );
			$booknowurl = get_post_meta( $value->ID, 'cdipromotions-meta-text-2', true );
			$ctabtntext = get_post_meta( $value->ID, 'cdipromotions-meta-text-3', true );
			$ctabtnurl = get_post_meta( $value->ID, 'cdipromotions-meta-text-4', true );
			$featured = get_post_meta( $value->ID, 'cdipromotions-meta-checkbox', true );

			if ( $device == 'desktop' ) {
			    ?>
				<div class="col w-col w-col-4 bottom-margin">
					<div class="card-wrap">
						<a href="#" class="card-img-link-block w-inline-block">
							<img src="<?php echo $image_url; ?>" sizes="(max-width: 991px) 100vw, 24vw"
							     class="card-img">
						</a>
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
				?>
				<div class="col w-col w-col-6 bottom-margin">
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
	}
	wp_reset_query();
	?>
	</div>
	<?php

	$output = ob_get_contents();
	ob_end_clean();
	return $output;
}
add_shortcode( 'mammen_promotions', 'mammen_promotions' );