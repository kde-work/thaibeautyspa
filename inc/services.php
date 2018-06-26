<?php
function tbs_auto_paragraph($text){
	if (trim($text) !== '') {
		$text = preg_replace('|<br[^>]*>\s*<br[^>]*>|i', "\n\n", $text . "\n");
		$text = preg_replace("/\n\n+/", "\n\n", str_replace(["\r\n", "\r"], "\n", $text));
		$texts = preg_split('/\n\s*\n/', $text, -1, PREG_SPLIT_NO_EMPTY);
		$text = '';
		foreach ($texts as $txt) {
			$text .= '<p>' . nl2br(trim($txt, "\n")) . "</p>\n";
		}
		$text = preg_replace('|<p>\s*</p>|', '', $text);
	}

	return $text;
}
function tbs_clear_phone ($phone) {
	return str_replace(array(' ', '(', ')', '-'), '', str_replace('+7', '8', $phone));
}
function tbs_text_slider ($text, $count_words = 57, $class = 'slick--slider') {
	$text = str_replace(' />', '>', $text);
	$words = explode(' ', $text);
    if (count($words) <= $count_words) {
        echo "<p>$text</p>";
        return;
    }
	$j = 0;
	?>
    <div class="<?php if ($class) echo $class; ?>">
        <div class="text-slide">
            <div>
                <?php
                for ($i=0; $i<count($words); ++$i) {
                    if ($words[$i] != '<p>' AND $words[$i] != '</p>' AND $words[$i] != '<br>')
                        ++$j;
                    if ($j == $count_words) {
                        echo '</div></div><div class="text-slide"><div>';
                        $j = 0;
                    }
                    echo $words[$i].' ';
                }
                ?>
            </div>
        </div>
    </div>
	<?php
}
function tbs_video_style_js_init ($selector = '#youtubelist') {
	?>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/youtubegallerywall.css">
	<script src="<?php echo get_template_directory_uri(); ?>/js/youtubegallerywall.js"></script>
	<script>
        jQuery(function(){ // on DOM load
            $('<?php echo $selector; ?>').youtubegallery();
        })
	</script>
	<?php
}
function tbs_rand_indexes ($min, $max, $count_) {
	$count = $count_;
	$rand_mas = array(mt_rand($min, $max));
	--$count;
	while ($count > 0) {
		if (count($rand_mas) > ($max - $min)) {
			break;
		}
		$flag = false;
		$rand = mt_rand($min, $max);
		foreach ($rand_mas as $rand_ma) {
			if ($rand_ma === $rand) {
				$flag = true;
				break;
			}
		}
		if (!$flag) {
			$rand_mas[] = $rand;
			--$count;
		}
	}
	return $rand_mas;
}
function tbs_list_of_cat ($term_name) {
	global $wpdb;
	$term_name = addslashes($term_name);

	return $wpdb->get_results(
		"SELECT * FROM `$wpdb->term_taxonomy` as term_taxonomy INNER JOIN
			 `$wpdb->terms` as terms ON
			 term_taxonomy.`term_id` = terms.`term_id`
			 WHERE 
			    term_taxonomy.`taxonomy` = '$term_name'
		        AND term_taxonomy.`count` >= 1
		     ORDER BY terms.`term_id` DESC
	        ",
		ARRAY_A
	);
}
function tbs_list_post_by_post_type ($post_type, $cat_id) {
	global $wpdb;

	return $wpdb->get_results(
		"SELECT * FROM `$wpdb->posts` as posts INNER JOIN
			 `$wpdb->term_relationships` as term_relationships ON
			 term_relationships.`object_id` = posts.`ID`
			 WHERE 
			    posts.`post_type` = '$post_type'
		        AND posts.`post_status` = 'publish'
		           AND term_relationships.`term_taxonomy_id` = '$cat_id'
		     ORDER BY posts.`post_date` DESC
	        ",
		ARRAY_A
	);
}
function tbs_get_best_services () {
	global $wpdb;

	return $wpdb->get_results(
		"SELECT * FROM `$wpdb->posts` as posts INNER JOIN
			 `$wpdb->postmeta` as postmeta ON
			 postmeta.`post_id` = posts.`ID`
			 WHERE 
			    posts.`post_type` = 'services'
		        AND posts.`post_status` = 'publish'
		           AND postmeta.`meta_key` = 'cdiservices-meta-best'
		              AND postmeta.`meta_value` = 'yes'
		     ORDER BY posts.`post_date` DESC
	        ",
		ARRAY_A
	);
}
function tbs_get_number_with_zero ($number) {
	if (is_integer($number)) {
		if ($number < 10) {
			return '0'.$number;
		}
	}
	return $number;
}
function tbs_replace_str_with_star ($str) {
	return str_replace('*', '<br>', $str);
}