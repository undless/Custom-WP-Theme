<?php get_header(); ?>

<?php dynamic_sidebar(); ?>

<section class="section">
	<?php 
	if ( have_posts() ) {
		while ( have_posts() ) {
			the_post();?>
			<hr />
			<article id="post-<?php the_ID(); ?>">
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
				<?php the_time('j F Y'); ?> by <?php the_author_posts_link(); ?>
				<?php the_category(', '); ?>
				<?php the_excerpt(); ?>
				<?php comments_popup_link('Pas de commentaires', '1 Commentaire', '% Commentaires'); ?>
			</article>
			<?php
		} // end while
	}else { ?>
		Aucun résultats.
	<?php } // end if ?>

</section>

<?php get_footer(); ?>