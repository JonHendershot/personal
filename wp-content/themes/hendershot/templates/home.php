<?php
	
	// Template Name: Home Page
	
	get_header();
	$image = get_the_post_thumbnail_url(null, 'full');
?>

<section class="home-container" style="background-image: url(<?php echo $image; ?>);">
	<div class="page-content">
		<h1>Jon Hendershot</h1>
		<p class="sub-title">Web Developer</p>
	</div>
</section>


<?php get_footer(); ?>