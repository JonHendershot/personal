<?php
	
	// Template Name: Contact
	
	get_header();
	
	// Variables
	$contact_form = get_field('contact_form'); 
?>

<section class="contact main-body fixed">
	<div class="content sm">
		<h1><?php the_title(); ?></h1>
		<div class="form">
			<?php echo do_shortcode($contact_form); ?>
		</div>
	</div>	
</section>
<?php get_footer(); ?>