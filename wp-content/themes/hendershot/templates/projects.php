<?php
	
	// Template Name: Projects
	
	get_header();
	
	$args = array(
		'post_type' => 'projects',
		'posts_per_page' => -1,
		'orderby' => 'menu_order'
	);
	$xx = 1;
	$query = new WP_Query($args);
	$number_posts = $query->found_posts;
?>

<section class="projects main-body fixed">
	<div class="project-nav previous" data-id="<?php echo $number_posts; ?>"><!-- <img src="<?php echo get_template_directory_uri() . '/images/nav-arrow.png'; ?>" /> --></div>
	<div class="project-nav next" data-id="<?php echo '2'; ?>"><!-- <img src="<?php echo get_template_directory_uri() . '/images/nav-arrow.png'; ?>" /> --></div>
	<div class="container" data-count="<?php echo $number_posts; ?>">
			<div class="content projects-container">
				<?php while($query->have_posts()) : $query->the_post(); 
					
					// Variables for Loop
					$image = get_the_post_thumbnail_url();
					$title = get_the_title();
					$categories = get_the_category();
					$cat_number = count($categories);
					$cc = 1;
					$color_scheme_field = get_field('color_scheme');
					$color_scheme = strtolower($color_scheme_field);
					if($xx === 1){
						$active_project = 'active';
					}else {
						$active_project = '';
					}
					
				?>
					<div class="project-wrapper <?php echo "project-$xx $active_project $color_scheme"; ?>" style="background-image:url(<?php echo $image; ?>);">
						<div class="project-content">
							<a href="<?php the_permalink(); ?>" class="content-link" data-scheme="<?php echo $color_scheme; ?>">
								<h1><?php echo $title; ?></h1>
							</a>
							<a href="<?php the_permalink(); ?>" class="content-link">
								<p class="sub-title">
									<?php foreach($categories as $category){
										
										echo "<span class='cat-name cat-$category->name'>$category->name</span>";
										if($cc < $cat_number){
											echo "<span class='cat-divider'>-</span>";
										}
									$cc++;
									}
									if($cat_number > 1){
										$plural = 's';
									}else {
										$plural = '';
									}
									// echo "<span class='cat-total'>$cat_number Role$plural</span>";
									?>
									
								</p>
							</a>
						</div>
						<a href="<?php the_permalink(); ?>" class="view-project next <?php echo $color_scheme; ?>" data-scheme="<?php echo $color_scheme; ?>">view project</a>
					</div>
				<?php $xx++; endwhile; ?>
			</div>
	</div>
	<div class="project-bubble-nav">
		<?php for( $bb = 1; $bb <= $number_posts; $bb++){
			if($bb === 1){
				$active = 'active';
			} else {
				$active = '';
			}
			echo "<div class='bubble post-$bb $active' data-id='$bb'>
				<div class='inner-bubble'></div>
			</div>";	
		}
		?>
	</div>
</section>
<?php get_footer(); ?>