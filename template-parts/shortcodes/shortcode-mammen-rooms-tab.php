<?php

// Shortcode mammen_promotions
function mammen_rooms_tab ( $atts ) {
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
		'orderby'  => $orderby,
		'order' => $order,
		'offset' => $offset,
	);

	$the_query = new WP_Query( $args );
	if ( $the_query->have_posts() ) {
		$the_query->the_post();

		?>
		<div class="inner-tabs-menu w-tab-menu">
		<?php
		$j = 0;
		foreach ($the_query->posts as $key => $value) {
			?>
			<a data-w-tab="room--<?php echo ++$j; ?>" class="inner-tab-link w-inline-block w-tab-link w--current">
				<div><?php echo get_the_title( $value->ID ); ?></div>
			</a>
			<?php
		}
		?>
		</div>
		<div class="inner-tab-content w-tab-content">
		<?php
		$j = 0;
		foreach ($the_query->posts as $key => $value) {
			$image_id = get_post_meta( $value->ID, 'cdipromotions-meta-image', true );
			$image_url = wp_get_attachment_image_src( $image_id, 'full' )[0];
			$cardsupportingtext = get_post_meta( $value->ID, 'cdiroomssupport-meta-text', true );
			$cardcopy = get_post_meta( $value->ID, 'cdipromotions-meta-textarea', true );
			$booknowtext = get_post_meta( $value->ID, 'cdipromotions-meta-text-1', true );
			$booknowurl = get_post_meta( $value->ID, 'cdipromotions-meta-text-2', true );
			$ctabtntext = get_post_meta( $value->ID, 'cdipromotions-meta-text-3', true );
			$ctabtnurl = get_post_meta( $value->ID, 'cdipromotions-meta-text-4', true );

			?>
				<div data-w-tab="room--<?php echo ++$j; ?>" class="inner-tab-pane w-tab-pane w--tab-active" style="opacity: 1; transition: opacity 300ms ease 0s;">
					<div class="row w-row">
						<div class="col p-0 mobile-margin w-col w-col-4 w-col-stack">
							<h2><?php echo get_the_title( $value->ID ); ?></h2>
							<p class="border-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum.</p>
							<a href="#" class="primary-btn-2 m-t-45 m-r-50 w-inline-block">
								<div class="btn-text">Book Now</div>
							</a>
							<a href="#" class="secondary-btn m-t-35 w-inline-block">
								<div class="btn-text">Learn More</div>
							</a>
						</div>
						<div class="col p-0 w-col w-col-8 w-col-stack">
							<div data-animation="slide" data-duration="500" data-infinite="1" class="tabs-slider w-slider">
								<div class="w-slider-mask">
									<div class="tabs-slide w-slide" style=""><img src="http://uploads.webflow.com/5a500196b3d9e100018c9252/5a50164235a800000133da46_card-hotel.jpg" srcset="http://uploads.webflow.com/5a500196b3d9e100018c9252/5a50164235a800000133da46_card-hotel-p-1080.jpeg 1080w, http://uploads.webflow.com/5a500196b3d9e100018c9252/5a50164235a800000133da46_card-hotel.jpg 1280w" sizes="(max-width: 479px) 84vw, (max-width: 991px) 81vw, 48vw">
										<div class="tabs-img-slide-text-block">
											<div class="tabs-img-slide-text">This is a small image description</div>
										</div>
									</div>
									<div class="tabs-slide w-slide" style=""><img src="http://uploads.webflow.com/5a500196b3d9e100018c9252/5a50164235a800000133da46_card-hotel.jpg" srcset="http://uploads.webflow.com/5a500196b3d9e100018c9252/5a50164235a800000133da46_card-hotel-p-1080.jpeg 1080w, http://uploads.webflow.com/5a500196b3d9e100018c9252/5a50164235a800000133da46_card-hotel.jpg 1280w" sizes="(max-width: 479px) 84vw, (max-width: 991px) 81vw, 48vw">
										<div class="tabs-img-slide-text-block">
											<div class="tabs-img-slide-text">This is a small image description</div>
										</div>
									</div>
									<div class="tabs-slide w-slide" style=""><img src="http://uploads.webflow.com/5a500196b3d9e100018c9252/5a50164235a800000133da46_card-hotel.jpg" srcset="http://uploads.webflow.com/5a500196b3d9e100018c9252/5a50164235a800000133da46_card-hotel-p-1080.jpeg 1080w, http://uploads.webflow.com/5a500196b3d9e100018c9252/5a50164235a800000133da46_card-hotel.jpg 1280w" sizes="(max-width: 479px) 84vw, (max-width: 991px) 81vw, 48vw">
										<div class="tabs-img-slide-text-block">
											<div class="tabs-img-slide-text">This is a small image description</div>
										</div>
									</div>
									<div class="tabs-slide w-slide" style=""><img src="http://uploads.webflow.com/5a500196b3d9e100018c9252/5a50164235a800000133da46_card-hotel.jpg" srcset="http://uploads.webflow.com/5a500196b3d9e100018c9252/5a50164235a800000133da46_card-hotel-p-1080.jpeg 1080w, http://uploads.webflow.com/5a500196b3d9e100018c9252/5a50164235a800000133da46_card-hotel.jpg 1280w" sizes="(max-width: 479px) 84vw, (max-width: 991px) 81vw, 48vw">
										<div class="tabs-img-slide-text-block">
											<div class="tabs-img-slide-text">This is a small image description</div>
										</div>
									</div>
									<div class="tabs-slide w-slide" style=""><img src="http://uploads.webflow.com/5a500196b3d9e100018c9252/5a50164235a800000133da46_card-hotel.jpg" srcset="http://uploads.webflow.com/5a500196b3d9e100018c9252/5a50164235a800000133da46_card-hotel-p-1080.jpeg 1080w, http://uploads.webflow.com/5a500196b3d9e100018c9252/5a50164235a800000133da46_card-hotel.jpg 1280w" sizes="(max-width: 479px) 84vw, (max-width: 991px) 81vw, 48vw">
										<div class="tabs-img-slide-text-block">
											<div class="tabs-img-slide-text">This is a small image description</div>
										</div>
									</div>
								</div>
								<div class="slide-nav-arrow solid w-slider-arrow-left">
									<div class="icon-slider-arrow img-slider left w-icon-slider-left"></div>
								</div>
								<div class="slide-nav-arrow solid w-slider-arrow-right">
									<div class="icon-slider-arrow img-slider right w-icon-slider-right"></div>
								</div>
								<div class="tabs-slide-nav w-slider-nav w-slider-nav-invert w-round">
									<div class="w-slider-dot w-active" data-wf-ignore=""></div>
									<div class="w-slider-dot" data-wf-ignore=""></div>
									<div class="w-slider-dot" data-wf-ignore=""></div>
									<div class="w-slider-dot" data-wf-ignore=""></div>
									<div class="w-slider-dot" data-wf-ignore=""></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php
		}
		?>
		<div data-w-tab="Tab 2" class="inner-tab-pane w-tab-pane w--tab-active" style="opacity: 1; transition: opacity 300ms ease 0s;">
			<div class="row w-row">
				<div class="col p-0 mobile-margin w-col w-col-4 w-col-stack">
					<h2>Room Name</h2>
					<p class="border-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum.</p>
					<a href="#" class="primary-btn-2 m-t-45 m-r-50 w-inline-block">
						<div class="btn-text">Book Now</div>
					</a>
					<a href="#" class="secondary-btn m-t-35 w-inline-block">
						<div class="btn-text">Learn More</div>
					</a>
				</div>
				<div class="col p-0 w-col w-col-8 w-col-stack">
					<div data-animation="slide" data-duration="500" data-infinite="1" class="tabs-slider w-slider">
						<div class="w-slider-mask">
							<div class="tabs-slide w-slide" style=""><img src="http://uploads.webflow.com/5a500196b3d9e100018c9252/5a50164235a800000133da46_card-hotel.jpg" srcset="http://uploads.webflow.com/5a500196b3d9e100018c9252/5a50164235a800000133da46_card-hotel-p-1080.jpeg 1080w, http://uploads.webflow.com/5a500196b3d9e100018c9252/5a50164235a800000133da46_card-hotel.jpg 1280w" sizes="(max-width: 479px) 84vw, (max-width: 991px) 81vw, 48vw">
								<div class="tabs-img-slide-text-block">
									<div class="tabs-img-slide-text">This is a small image description</div>
								</div>
							</div>
							<div class="tabs-slide w-slide" style=""><img src="http://uploads.webflow.com/5a500196b3d9e100018c9252/5a50164235a800000133da46_card-hotel.jpg" srcset="http://uploads.webflow.com/5a500196b3d9e100018c9252/5a50164235a800000133da46_card-hotel-p-1080.jpeg 1080w, http://uploads.webflow.com/5a500196b3d9e100018c9252/5a50164235a800000133da46_card-hotel.jpg 1280w" sizes="(max-width: 479px) 84vw, (max-width: 991px) 81vw, 48vw">
								<div class="tabs-img-slide-text-block">
									<div class="tabs-img-slide-text">This is a small image description</div>
								</div>
							</div>
							<div class="tabs-slide w-slide" style=""><img src="http://uploads.webflow.com/5a500196b3d9e100018c9252/5a50164235a800000133da46_card-hotel.jpg" srcset="http://uploads.webflow.com/5a500196b3d9e100018c9252/5a50164235a800000133da46_card-hotel-p-1080.jpeg 1080w, http://uploads.webflow.com/5a500196b3d9e100018c9252/5a50164235a800000133da46_card-hotel.jpg 1280w" sizes="(max-width: 479px) 84vw, (max-width: 991px) 81vw, 48vw">
								<div class="tabs-img-slide-text-block">
									<div class="tabs-img-slide-text">This is a small image description</div>
								</div>
							</div>
							<div class="tabs-slide w-slide" style=""><img src="http://uploads.webflow.com/5a500196b3d9e100018c9252/5a50164235a800000133da46_card-hotel.jpg" srcset="http://uploads.webflow.com/5a500196b3d9e100018c9252/5a50164235a800000133da46_card-hotel-p-1080.jpeg 1080w, http://uploads.webflow.com/5a500196b3d9e100018c9252/5a50164235a800000133da46_card-hotel.jpg 1280w" sizes="(max-width: 479px) 84vw, (max-width: 991px) 81vw, 48vw">
								<div class="tabs-img-slide-text-block">
									<div class="tabs-img-slide-text">This is a small image description</div>
								</div>
							</div>
							<div class="tabs-slide w-slide" style=""><img src="http://uploads.webflow.com/5a500196b3d9e100018c9252/5a50164235a800000133da46_card-hotel.jpg" srcset="http://uploads.webflow.com/5a500196b3d9e100018c9252/5a50164235a800000133da46_card-hotel-p-1080.jpeg 1080w, http://uploads.webflow.com/5a500196b3d9e100018c9252/5a50164235a800000133da46_card-hotel.jpg 1280w" sizes="(max-width: 479px) 84vw, (max-width: 991px) 81vw, 48vw">
								<div class="tabs-img-slide-text-block">
									<div class="tabs-img-slide-text">This is a small image description</div>
								</div>
							</div>
						</div>
						<div class="slide-nav-arrow solid w-slider-arrow-left">
							<div class="icon-slider-arrow img-slider left w-icon-slider-left"></div>
						</div>
						<div class="slide-nav-arrow solid w-slider-arrow-right">
							<div class="icon-slider-arrow img-slider right w-icon-slider-right"></div>
						</div>
						<div class="tabs-slide-nav w-slider-nav w-slider-nav-invert w-round">
							<div class="w-slider-dot w-active" data-wf-ignore=""></div>
							<div class="w-slider-dot" data-wf-ignore=""></div>
							<div class="w-slider-dot" data-wf-ignore=""></div>
							<div class="w-slider-dot" data-wf-ignore=""></div>
							<div class="w-slider-dot" data-wf-ignore=""></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		</div>
		<?php
	}
	wp_reset_query();

	$output = ob_get_contents();
	ob_end_clean();
	return $output;
}
add_shortcode( 'mammen_rooms_tab', 'mammen_rooms_tab' );