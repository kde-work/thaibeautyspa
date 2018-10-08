<!-- Template Name: en_version -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <title><?php bloginfo('name') ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1"><link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700&amp;subset=cyrillic-ext" rel="stylesheet">
    <link href="<?php get_template_directory() ?>/wp-content/themes/foghorn/fonts/styles.css" type="text/css" rel="stylesheet">
    <link href="<?php get_template_directory() ?>/wp-content/themes/foghorn/css/style_en_vers.min.css" rel="stylesheet" type="text/css">
    <link href="<?php get_template_directory() ?>/wp-content/themes/foghorn/css/style_en_fixes.css" rel="stylesheet" type="text/css">
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php get_template_directory() ?>/wp-content/themes/foghorn/slick/slick/slick-theme.css">
    <link rel="stylesheet" type="text/css" href="<?php get_template_directory() ?>/wp-content/themes/foghorn/slick/slick/slick.css">
    <script src="<?php get_template_directory() ?>/wp-content/themes/foghorn/slick/slick/slick.min.js"></script>
    <link href="<?php get_template_directory() ?>/wp-content/themes/foghorn/FormStyler/dist/jquery.formstyler.css" rel="stylesheet" />
    <link href="<?php get_template_directory() ?>/wp-content/themes/foghorn/FormStyler/dist/jquery.formstyler.theme.css" rel="stylesheet" />
    <script src="<?php get_template_directory() ?>/wp-content/themes/foghorn/FormStyler/dist/jquery.formstyler.min.js"></script>
    <script src="<?php get_template_directory() ?>/wp-content/themes/foghorn/js/script.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    <?php wp_head(); ?>
  </head>
  <?php $custom_args = array(
                'post_type' => 'en_v',
                'posts_per_page' => -1,
                'order' => 'ASC'
              );
              $custom_query = new WP_Query( $custom_args );
              if ( $custom_query->have_posts() ){
                    while ( $custom_query->have_posts() ) : $custom_query->the_post();?>
  <body>
    <div class="view_screen">
      <div class="container">
        <div class="fixed_frame">
          <div class="wrapper">
            <div class="left">
              <div class="top">
                <div class="logo"><a href="<?php get_home_url()?>/en"><img src="<?echo get_field('logo_en');?>"></a></div>
                <div class="menu">
                  <div class="menu_hide">
                    <p class="header">Menu</p>
                  </div>
                  <!-- <?php wp_nav_menu( array('theme_location' => 'en_menu',
                'container' => 'menu') ); ?> -->
                  <menu>
                    <li><a href="#second">Thai Therapeutic Yoga Massages</a></li>
                    <li><a href="#third">Relaxation & Recovery Massage</a></li>
                    <li><a href="#fourth">Natural Energy Massages</a></li>
                    <li><a href="#fiveth">Intensive Treatment of Cellulite Based</a></li>
                    <li><a href="#seventh">Thai massage therapists</a></li>
                    <li><a href="#eighth">Gallery</a></li>
                    <li><a href="#nineth">Contacts</a></li>
                  </menu>
                </div>
              </div>
              <div class="bottom">
                <div class="contact"><a href="tel:<?php echo str_replace(' ','', get_field('tel1_en'));?>"><?php echo get_field('tel1_en');?></a><a href="tel:<?php echo str_replace(' ','', get_field('tel2_en'));?>"><?php echo get_field('tel2_en');?></a></div>
              </div>
            </div>
            <div class="right">
              <div class="top">
                <div class="social_link">
                  <div class="link"><a href="https://vk.com/thaispasalon" target="_blank"><img src="<?php get_template_directory() ?>/wp-content/themes/foghorn/img/vk.png" alt="vk"></a></div>
                  <div class="link"><a href="https://www.instagram.com/thaibeautyspa_/" target="_blank"><img src="<?php get_template_directory() ?>/wp-content/themes/foghorn/img/insta.png" alt="insta"></a></div>
                  <div class="link"><a href="https://www.facebook.com/waithairechnoi/ " target="_blank"><img src="<?php get_template_directory() ?>/wp-content/themes/foghorn/img/fb.png" alt="fb"></a></div>
                </div>
                <div class="lenguage"><a href="/">Ru</a></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div id="first" class="content_block first_bg">
        <div class="left_hide"></div>
        <div class="content_first">
          <div class="left">
            <div class="content">
              <p class="had"><span>1</span>place</p>
              <p class="sub_had">We took the first place in competition Gold Standart between 52 countries</p><a href="#" class="link">To book date and time</a>
              <div class="label"><img src="<?php get_template_directory() ?>/wp-content/themes/foghorn/img/info.png" alt="info">
                <p>Thai massage in Moscow</p>
              </div>
            </div>
          </div>
          <div class="right">
            <div class="slider_text">
              <?php while ( have_rows('text_slider_en') ) : the_row(); ?>
              <div class="text_item">
                <p class="had"><?php echo get_sub_field("slide_text_had_en");?></p>
                <p class="sub_had"><?php echo get_sub_field("slide_text_sub_had_en");?></p>
                <p class="text"><?php echo get_sub_field("slider_text_en");?></p>
              </div>
              <?php endwhile; ?>
            </div>
            <div class="count_client">
              <p class="num">5 558</p>
              <p class="text"><span>of clients</span>recovered their health and improve energy</p>
            </div>
          </div>
        </div>
        <div class="right_hide"></div>
      </div>
      <div id="second" class="content_block second_bg">
        <div class="left_hide"></div>
        <div class="content_second">
          <p class="had"><?php echo get_field("second_header_en");?></p>
          <div class="list">
            <?php while ( have_rows('second_mas_list_en') ) : the_row(); ?>
            <div class="list_item">
              <div class="left">
                <div style="background-image:url('<?php echo get_sub_field("second_mas_pic");?>')" class="img"></div>
              </div>
              <div class="right">
                <p class="header"><?php echo get_sub_field("second_mas_name");?></p>
                <p class="info"><?php echo get_sub_field("second_mas_cost_time");?> </p>
              </div>
            </div>  
            <?php endwhile; ?>
          </div>
          <p class="read_more">Read more</p>
        </div>
        <div class="right_hide"></div>
      </div>
      <div id="third" class="content_block third_bg">
        <div class="left_hide"></div>
        <div class="content_second">
          <p class="had"><?php echo get_field("third_header_en");?></p>
          <div class="list">
            <?php while ( have_rows('third_mas_list_en') ) : the_row(); ?>
            <div class="list_item">
              <div class="left">
                <div style="background-image:url('<?php echo get_sub_field("third_mas_pic");?>')" class="img"></div>
              </div>
              <div class="right">
                <p class="header"><?php echo get_sub_field("third_mas_name");?></p>
                <p class="info"><?php echo get_sub_field("third_mas_cost_time");?> </p>
              </div>
            </div>  
            <?php endwhile; ?>
            
          </div>
          <p class="read_more">Read more</p>
        </div>
        <div class="right_hide"></div>
      </div>
      <div id="fourth" class="content_block fourth_bg">
        <div class="left_hide"></div>
        <div class="content_second">
          <p class="had"><?php echo get_field("fourth_header_en");?></p>
          <div class="list">
            <?php while ( have_rows('fourth_mas_list_en') ) : the_row(); ?>
            <div class="list_item">
              <div class="left">
                <div style="background-image:url('<?php echo get_sub_field("fourth_mas_pic");?>')" class="img"></div>
              </div>
              <div class="right">
                <p class="header"><?php echo get_sub_field("fourth_mas_name");?></p>
                <p class="info"><?php echo get_sub_field("fourth_mas_cost_time");?> </p>
              </div>
            </div>  
            <?php endwhile; ?>
            
          </div>
          <p class="read_more">Read more</p>
        </div>
        <div class="right_hide"></div>
      </div>
      <div id="fiveth" class="content_block fives_bg">
        <div class="left_hide"></div>
        <div class="content_fives">
          <p class="had"><?php echo get_field("fives_header_en");?></p>
          <p class="sub_had"><?php echo get_field("fives_mas_name_en");?></p>
          <p class="cost"><?php echo get_field("fives_time_cost_en");?></p>
        </div>
        <div class="right_hide"></div>
      </div>
      <div id="sixth" class="content_block sixth_bg">
        <div class="left_hide"></div>
        <div id="seventh" class="content_sixth">
          <p class="had"><?php echo get_field("sixth_header_en");?></p>
          <a href="#" class="link">To book date and time</a>
          <div class="master_slider">
            <?php while ( have_rows('sixth_masters_en') ) : the_row(); ?>
            <div class="master_item">
              <p class="name"><?php echo get_sub_field("sixth_master_name_en");?></p>
              <div style="background-image:url('<?php echo get_sub_field("sixth_mas_pic_en");?>')" class="photo"></div>
              <p class="position"><?php echo get_sub_field("sixth_position_en");?></p>
              <p class="experience"><?php echo get_sub_field("sixth_description_en");?></p>
            </div>
            <?php endwhile; ?>
            
            
          </div>
        </div>
        <div class="right_hide"></div>
      </div>
      <div id="eighth" class="content_block seventh_bg">
        <div class="left_hide"></div>
        <div class="content_seventh">
          <p class="had">gallery</p>
          <div class="slider_gallery zoom-gallery">
             <?php while ( have_rows('seventh_gallery_en') ) : the_row(); ?>
            <div style="background-image:url('<?php echo get_sub_field("seventh_photo_en");?>')" class="img" style="position: relative;">
              <a href='<?php echo get_sub_field("seventh_photo_en");?>' data-source='<?php echo get_sub_field("seventh_photo_en");?>'>
                <img src='<?php echo get_sub_field("seventh_photo_en");?>'>
                </a>
            </div>
            <?php endwhile; ?>
          </div>
        </div>
        <div class="right_hide"></div>
      </div>
      <div id="nineth" class="content_block eighth_bg">
        <div class="left_hide"></div>
        <div class="content_eighth">
          <div class="content">
            <div class="left">
              <iframe src="https://www.google.com/maps/d/embed?mid=1U06aDiwXeII1Yt3FGisYaqGLZoDec1u5" frameborder="0"></iframe>
            </div>
            <div class="right">
              <p class="had">contacts</p>
              <select class="city">
                <option>Moscow</option>
                <option>Moscow</option>
                <option>Moscow</option>
              </select>
              <p class="contact"><?php echo get_field("eighth_address");?></p>
              <p class="work_time"><?php echo get_field("eighth_work_time_en");?></p>
              <div class="tel">
                <?php while ( have_rows('tel_foot_en') ) : the_row(); ?>
                <a href="tel:<?php echo str_replace(' ','', get_sub_field('eighth_number'));?>"><?php echo get_sub_field("eighth_number");?></a>
                <?php endwhile; ?>
              </div>
              <div class="mail"><a href="mailto:<?php echo str_replace(' ','', get_field('eighth_email_en'));?>"><?php echo get_field("eighth_email_en");?></a></div>
            </div>
          </div>
          <div class="copyright">
            <p>© ThaiBeautySpa 2012-2018. All rights reserved.</p>
          </div>
        </div>
        <div class="right_hide"></div>
      </div>
      <div class="popap_block">
        <div class="outer">
          <p class="had">Call back</p>
          <form method="POST" action='<?php echo get_template_directory_uri(); ?>/form_mail_en.php'>
            <input name="field_1" type="text" placeholder="first name" required>
            <input name="field_2" type="text" placeholder="second name" required>
            <input name="field_3" type="email" placeholder="Email" required>
            <input name="field_4" type="tel" placeholder="Telephone number" required>
            <label for="pol">Pressing this button you agree with our policy about personal data confidence
              <input type="checkbox" id="pol" required>
            </label>
            <input type="submit" value="submit">
          </form>
        </div>
      </div>
    </div>
    <footer>
      <div class="container"></div>
    </footer>
  <?php endwhile;
             }
             wp_reset_postdata();?>
    <?php wp_footer(); ?>
  </body>
</html>