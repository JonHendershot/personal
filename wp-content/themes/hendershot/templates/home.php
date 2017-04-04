<?php
	
	// Template Name: Home Page
	
	get_header();
	$image = get_the_post_thumbnail_url(null, 'full');
?>

<section class="home-container" style="background-image: url(<?php echo $image; ?>);">
	<div class="page-content">
		<div>
			<h1>Jon Hendershot</h1>
			<div class="creative-titles">
				<p class="sub-title visible slide-1" data-id="1">Full-Stack Developer</p>
				<p class="sub-title slide-2" data-id="2">UI Designer</p>
				<p class="sub-title slide-3" data-id="3">Brand Strategist</p>
				<p class="sub-title slide-4" data-id="4">UX Designer</p>
			</div>
		</div>
	</div>
</section>


<?php get_footer(); ?>