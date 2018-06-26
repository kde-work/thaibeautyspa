<?php

// Shortcode mammen_local_hotels
function mammen_local_hotels ( $atts ) {
	extract( shortcode_atts( array(
			'offset'         => 0,
			'posts_per_page' => 9,
			'orderby'        => 'title',
			'order'          => 'ASC',
			'device'         => 'desktop'
		), $atts )
	);
	ob_start();

	$args = array(
		'post_type' => 'local-hotels',
		'posts_per_page' => $posts_per_page,
		'post_status' => 'publish',
		'orderby'  =>$orderby,
		'offset' => $offset,
		'order' => $order
	);

	$args_all = array(
		'post_type' => 'local-hotels',
		'posts_per_page' => -1,
		'post_status' => 'publish',
		'offset' => $offset
	);

	$the_query = new WP_Query( $args );
	$the_query_all = new WP_Query( $args_all );
	$is_max = 0;
	if ( count( $the_query_all->posts ) <= ( $posts_per_page + $offset ) ) {
		$is_max = 1;
    }

	if ( $the_query->have_posts() ) {
		$the_query->the_post();

//		$total_results = count($the_query->posts);
		$j = 0;
		foreach ($the_query->posts as $key => $value) {
			$j++;
			$image_id = get_post_meta( $value->ID, 'localhotels-meta-image', true );
			$image_url = wp_get_attachment_image_src( $image_id, 'full' )[0];
			$cardsupportingtext = get_post_meta( $value->ID, 'localhotels-sub-meta-text', true );
			$phone = get_post_meta( $value->ID, 'localhotels-phone-meta-text', true );
			$adr = get_post_meta( $value->ID, 'localhotels-adr-meta-text', true );
			$booknowtext = get_post_meta( $value->ID, 'localhotels-btn1t-meta-text', true );
			$booknowurl = get_post_meta( $value->ID, 'localhotels-btn1u-meta-text', true );

			if ( $device == 'desktop' ) {
				?>
				<div class="col w-col w-col-4 bottom-margin" data-count="<?php echo $is_max; ?>">
					<div class="card-wrap">
						<a href="#" class="card-img-link-block w-inline-block">
							<img src="<?php echo $image_url; ?>" sizes="(max-width: 991px) 100vw, 24vw"
							     class="card-img"></a>
						<div class="card-title-block">
							<h3 class="card-title"><?php echo get_the_title( $value->ID ); ?></h3>
							<p class="card-text sub"><?php echo $cardsupportingtext; ?></p>
							<p class="card-text phone-icon"><?php echo $phone; ?></p>
							<p class="card-text address-icon"><a target="_blank" href="https://www.google.com/maps/search/<?php echo $adr; ?>"><?php echo $adr; ?></a></p>
							<div class="card-action-block">
								<?php if ( $booknowurl AND $booknowtext ) { ?><a href="<?php echo $booknowurl; ?>" class="card-secondary-btn w-button"><?php echo $booknowtext; ?></a><?php } ?>
							</div>
						</div>
					</div>
				</div>
				<?php
			} else {
				?>
				<div class="col w-col w-col-6 bottom-margin" data-count="<?php echo $is_max; ?>">
					<div class="card-wrap">
						<a href="#" class="card-img-link-block w-inline-block">
							<img src="<?php echo $image_url; ?>" sizes="(max-width: 767px) 95vw, (max-width: 991px) 43vw, 100vw" class="card-img">
						</a>
						<div class="card-title-block">
							<h3 class="card-title"><?php echo get_the_title($value->ID); ?></h3>
							<p class="card-text sub"><?php echo $cardsupportingtext; ?></p>
							<p class="card-text phone-icon"><?php echo $phone; ?></p>
                            <p class="card-text address-icon"><a target="_blank" href="https://www.google.com/maps/search/<?php echo $adr; ?>"><?php echo $adr; ?></a></p>
							<div class="card-action-block">
								<?php if ( $booknowurl AND $booknowtext ) { ?><a href="<?php echo $booknowurl; ?>" class="card-secondary-btn w-button"><?php echo $booknowtext; ?></a><?php } ?>
							</div>
						</div>
					</div>
				</div>
				<?php
			}
		}
	}
	wp_reset_query();

	$output = ob_get_contents();
	ob_end_clean();
	return $output;
}
add_shortcode( 'mammen_local_hotels', 'mammen_local_hotels' );