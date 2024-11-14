<?php
get_header();
if (have_posts()): while (have_posts()): the_post();
?>
	<h1>Frontpage Template</h1>
	<h2><?=the_title(); ?></h2>
	<?=the_content(); ?>
<?php
endwhile; endif;
get_footer();
?>