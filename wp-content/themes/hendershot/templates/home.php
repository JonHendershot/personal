<?php
	
	// Template Name: Home Page
	
	get_header();
	$image = get_the_post_thumbnail_url(null, 'full');
?>

<section class="home-container" style="background-image: url(<?php echo $image; ?>);">
	<div class="page-content pre">
		<div class="content-wrapper">
			<h1 class="pre">Jon Hendershot</h1>
			<div class="creative-titles pre">
				<p class="sub-title visible slide-1" data-id="1">Developer</p>
			</div>
		</div>
	</div>
</section>


<?php get_footer(); ?>