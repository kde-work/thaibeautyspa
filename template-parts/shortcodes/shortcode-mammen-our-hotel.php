<?php

// Shortcode mammen_our_hotel
function mammen_our_hotel ( $atts ) {
	extract( shortcode_atts( array(
			'offset'         => 0,
			'posts_per_page' => 6,
			'orderby'        => 'title',
			'order'          => 'ASC',
			'device'         => 'desktop'
		), $atts )
	);
	ob_start();

	$args = array(
		'post_type' => 'rooms',
		'posts_per_page' => $posts_per_page,
		'post_status' => 'publish',
		'orderby'  =>$orderby,
		'offset' => $offset,
		'order' => $order
	);

	$the_query = new WP_Query( $args );
	if ( $the_query->have_posts() ) {
		?>
		<div class="m-our_hotel-<?php echo $device; ?>">
			<?php
			$the_query->the_post();

			$total_results = count($the_query->posts);
			$j = 0;
			foreach ($the_query->posts as $key => $value) {
				$j++;
				$image_id = get_post_meta( $value->ID, 'cdirooms-meta-image', true );
				$image_url = wp_get_attachment_image_src( $image_id, 'full' )[0];
				$cardsupportingtext = get_post_meta( $value->ID, 'cdiroomssupport-meta-text', true );
				$phone = get_post_meta( $value->ID, 'cdiroomsphone-meta-text', true );
				$adr = get_post_meta( $value->ID, 'cdiroomsadr-meta-text', true );
				$booknowtext = get_post_meta( $value->ID, 'cdiroomsbtntext-meta-text', true );
				$booknowurl = get_post_meta( $value->ID, 'cdiroomsbtnurl-meta-text', true );

				if ( $device == 'desktop' ) {
					?>
					<div class="col w-col w-col-4 bottom-margin">
						<div class="card-wrap">
							<a href="#" class="card-img-link-block w-inline-block">
								<img src="<?php echo $image_url; ?>" sizes="(max-width: 991px) 100vw, 24vw"
								     class="card-img"></a>
							<div class="card-title-block">
								<h3 class="card-title"><?php echo get_the_title( $value->ID ); ?></h3>
								<p class="card-text sub"><?php echo $cardsupportingtext; ?></p>
								<p class="card-text phone-icon"><?php echo $phone; ?></p>
								<p class="card-text address-icon"><?php echo $adr; ?></p>
								<div class="card-action-block">
									<?php if ( $booknowurl AND $booknowtext ) { ?><a href="<?php echo $booknowurl; ?>" class="card-secondary-btn w-button"><?php echo $booknowtext; ?></a><?php } ?>
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
								<p class="card-text phone-icon"><?php echo $phone; ?></p>
								<p class="card-text address-icon"><?php echo $adr; ?></p>
								<div class="card-action-block">
									<?php if ( $booknowurl AND $booknowtext ) { ?><a href="<?php echo $booknowurl; ?>" class="card-secondary-btn w-button"><?php echo $booknowtext; ?></a><?php } ?>
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
add_shortcode( 'mammen_our_hotel', 'mammen_our_hotel' );