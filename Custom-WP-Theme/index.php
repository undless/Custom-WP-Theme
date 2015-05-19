<?php get_header(); ?>

<header class="header">
	<a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>
</header>

<?php get_sidebar(); ?>

<section class="section">
	<?php
	if( have_posts() ){
		while( have_posts() ){
			the_post();
			?><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a><?php
		}
	}
	?>
	<?php 
	if ( have_posts() ) {
		while ( have_posts() ) {
			the_post();?>

			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>

			<?php
		} // end while
	} // end if
	?>
</section>

<?php get_footer(); ?>