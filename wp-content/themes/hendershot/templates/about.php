<?php 
	// Template Name: About
	get_header();
	wp_reset_query();
?>
<section class="main-body fixed about">
	<div class="content sm">
		<h1><?php the_title(); ?></h1>
		<div>
			<?php the_content(); ?>
		</div>
	</div>
</section>

<?php get_footer(); ?>