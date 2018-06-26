<?php get_header(); ?>
<? the_post(); ?>

<div class="layout__header">
    <h1><? the_title(); ?></h1>
    <?php edit_post_link( 'Редактировать' ); ?>
</div>
<div class="layout__body">
    <? the_content(); ?>
</div>

<?php get_footer(); ?>