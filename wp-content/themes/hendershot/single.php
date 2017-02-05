<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package hendershot
 */

get_header(); ?>


<section class="main-body">
	<article class="project-study">
		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/project-content', get_post_format() );


			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>
	</article>
</section>
<?php
get_footer();
