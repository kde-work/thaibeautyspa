<?php
function nbsp($text) {
	$text = str_replace( ' ', '&nbsp', $text );
	return $text;
}
function tbs_translit($text){
	$iso9_table = array(
		'А' => 'A', 'Б' => 'B', 'В' => 'V', 'Г' => 'G', 'Ѓ' => 'G`',
		'Ґ' => 'G`', 'Д' => 'D', 'Е' => 'E', 'Ё' => 'YO', 'Є' => 'YE',
		'Ж' => 'ZH', 'З' => 'Z', 'Ѕ' => 'Z', 'И' => 'I', 'Й' => 'Y',
		'Ј' => 'J', 'І' => 'I', 'Ї' => 'YI', 'К' => 'K', 'Ќ' => 'K',
		'Л' => 'L', 'Љ' => 'L', 'М' => 'M', 'Н' => 'N', 'Њ' => 'N',
		'О' => 'O', 'П' => 'P', 'Р' => 'R', 'С' => 'S', 'Т' => 'T',
		'У' => 'U', 'Ў' => 'U', 'Ф' => 'F', 'Х' => 'H', 'Ц' => 'TS',
		'Ч' => 'CH', 'Џ' => 'DH', 'Ш' => 'SH', 'Щ' => 'SH', 'Ъ' => '',
		'Ы' => 'Y', 'Ь' => '', 'Э' => 'E', 'Ю' => 'YU', 'Я' => 'YA',
		'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'ѓ' => 'g',
		'ґ' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'yo', 'є' => 'ye',
		'ж' => 'zh', 'з' => 'z', 'ѕ' => 'z', 'и' => 'i', 'й' => 'y',
		'ј' => 'j', 'і' => 'i', 'ї' => 'yi', 'к' => 'k', 'ќ' => 'k',
		'л' => 'l', 'љ' => 'l', 'м' => 'm', 'н' => 'n', 'њ' => 'n',
		'о' => 'o', 'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't',
		'у' => 'u', 'ў' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'ts',
		'ч' => 'ch', 'џ' => 'dh', 'ш' => 'sh', 'щ' => 'sh', 'ь' => '',
		'ы' => 'y', 'ъ' => "", 'э' => 'e', 'ю' => 'yu', 'я' => 'ya'
	);

	return strtr($text, $iso9_table);
}
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
function tbs_modal_cont ($name) {
    $id = tbs_get_id_by_url($name)[0]['ID'];
	?>
    <div class="cta__cont cta__cont--<?php echo $name; ?>">
        <h3><?php echo get_the_title($id); ?></h3>
        <div class="form__sub-title"><?php echo get_field('произвольный_html', $id); ?></div>
        <div class="form__modal-text scrollable">
			<?php
			$post = get_post($id);
			if(current_user_can('edit_posts')) {
				echo '<a href="'. get_edit_post_link($id) .'">Изменить</a>';
			}
			echo tbs_auto_paragraph(do_shortcode($post->post_content));
			?>
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
function tbs_list_post_by_post_type ($post_type, $cat_id = false) {
	global $wpdb;

	$add1 = '';
	$add = '';
	if ($cat_id) {
		$add1 = "INNER JOIN `$wpdb->term_relationships` as term_relationships ON term_relationships.`object_id` = posts.`ID`";
		$add = "AND term_relationships.`term_taxonomy_id` = '$cat_id'";
    }

	return $wpdb->get_results(
		"SELECT * FROM `$wpdb->posts` as posts 
             $add1
			 WHERE 
			    posts.`post_type` = '$post_type'
		        AND posts.`post_status` = 'publish'
		           $add
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
function tbs_get_id_by_url ($url) {
	global $wpdb;

	$url = htmlspecialchars($url);
	return $wpdb->get_results(
		"SELECT * FROM `$wpdb->posts` as posts
			 WHERE 
		        posts.`post_status` = 'publish'
		           AND posts.`post_name` = '$url'
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