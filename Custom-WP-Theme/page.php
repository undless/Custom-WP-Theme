<?php get_header(); ?>

<?php dynamic_sidebar(); ?>

<section class="section">
	<?php 
	if ( have_posts() ) {
		while ( have_posts() ) {
			the_post();?>

			<h1><?php the_title(); ?></h1>

			<?php the_content(); ?>

			<?php
		} // end while
	}else { ?>
		Aucun résultats.
	<?php } // end if ?>

</section>

<?php get_footer(); ?>