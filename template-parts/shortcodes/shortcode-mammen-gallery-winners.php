<?php

// Shortcode mammen_gallery_winners
function mammen_gallery_winners ( $atts ) {
	extract( shortcode_atts( array(
			'month'          => 0,
			'year'           => 0,
			'offset'         => 0,
			'posts_per_page' => 6,
			'orderby'        => 'title',
			'order'          => 'ASC',
			'device'         => 'desktop'
		), $atts )
	);
	ob_start();

	$tax_query = array();
	if ( $month ) {
		array_push( $tax_query, array(
						'taxonomy' => 'cdiwinnersmonth-category',
						'field'    => 'name',
						'terms'    => $month
					)
		);
	}
	if ( $year ) {
		array_push( $tax_query, array(
						'taxonomy' => 'cdiwinnersyear-category',
						'field'    => 'name',
						'terms'    => $year
					)
		);
	}

	$args = array(
		'post_type' => 'winners',
		'posts_per_page' => $posts_per_page,
		'post_status' => 'publish',
		'orderby'  =>$orderby,
		'offset' => $offset,
		'order' => $order,
		'tax_query' => $tax_query
	);

	$the_query = new WP_Query( $args );

	$args['posts_per_page'] = -1;
	$the_query_limit = new WP_Query( $args );
	$count_query = count($the_query_limit->posts);
	$limit = '';
	if ( $posts_per_page >= $count_query ) {
		$limit = 'max';
	} elseif ( ( $posts_per_page + $offset ) >= $count_query ) {
		$limit = 'right';
	}

	if ( $the_query->have_posts() ) {
		?>
		<div class="m-gallery_winners m-gallery_winners-<?php echo $device; ?>">
			<div class="m-gallery_winners__box" data-max="<?php echo $limit; ?>">
			<?php
			$the_query->the_post();

			$total_results = count($the_query->posts);
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
					<div class="col p-0 w-col w-col-4">
						<a href="#" class="lightbox-link w-inline-block w-lightbox">
							<?php
							$image_id = get_post_meta( $value->ID, 'cdiwinners-meta-image', true );
							$image_url = wp_get_attachment_image_src( $image_id, 'full' )[0];
							$datewon = date('m.d.Y', strtotime(get_post_meta( $value->ID, 'cdiwinners-meta-datepicker', true )));
							$amount = get_post_meta( $value->ID, 'cdiwinners-amount-meta-text', true );

							?>

							<img src="<?php echo $image_url; ?>" sizes="(max-width: 991px) 100vw, 13vw" class="lightbox-link-img">
							<div class="lightbox-link-text-block">
								<div class="light-box-link-text"><?php echo $amount; ?></div>
								<div class="card-sub-text winners-text"><?php echo get_the_title($value->ID); ?></div
								><div class="card-sub-text winners-text"><?php echo $datewon; ?></div>
							</div>
							<script type="application/json" class="w-json">{
									"items": [
										{
											"type": "image",
											"_id": "<?php echo $value->ID; ?>",
											"fileName": "<?php echo $image_url . $value->ID; ?>",
											"origFileName": "<?php echo $image_url . $value->ID; ?>",
											"width": 800,
											"height": 1035,
											"fileSize": 121473,
											"url": "<?php echo $image_url; ?>"
										}
									],
									"group": "gallery-winners-desktop"
								}
							</script>
						</a>
					</div>
					<?php
				} else {
					?>
					<div class="col p-0 w-col w-col-4">
						<a href="#" class="lightbox-link w-inline-block w-lightbox">
							<?php
							$image_id = get_post_meta( $value->ID, 'cdiwinners-meta-image', true );
							$image_url = wp_get_attachment_image_src( $image_id, 'full' )[0];
							$datewon = date('m.d.Y', strtotime(get_post_meta( $value->ID, 'cdiwinners-meta-datepicker', true )));
							$amount = get_post_meta( $value->ID, 'cdiwinners-amount-meta-text', true );
							?>
							<img src="<?php echo $image_url; ?>" sizes="(max-width: 479px) 91vw, (max-width: 767px) 87vw, (max-width: 991px) 27vw, 100vw" class="lightbox-link-img">
							<div class="lightbox-link-text-block">
								<div class="light-box-link-text"><?php echo $amount; ?></div>
								<div class="card-sub-text winners-text"><?php echo get_the_title($value->ID); ?></div>
								<div class="card-sub-text winners-text"><?php echo $datewon; ?></div>
							</div>
							<script type="application/json" class="w-json">{
									"items": [
										{
											"type": "image",
											"_id": "5a594d8eb44be40001686ef2",
											"fileName": "5a594d8eb44be40001686ef2_AdobeStock_137065937_Preview-2.jpg",
											"origFileName": "AdobeStock_137065937_Preview-2.jpg",
											"width": 800,
											"height": 1035,
											"fileSize": 121473,
											"url": "<?php echo $image_url; ?>"
										}
									],
									"group": "gallery-winners-tablet"
								}
							</script>
						</a>
					</div>
					<?php
				}
			}
			?>
			</div>
		</div>
		<?php
	}
	wp_reset_query();

	$output = ob_get_contents();
	ob_end_clean();
	return $output;
}
add_shortcode( 'mammen_gallery_winners', 'mammen_gallery_winners' );