<?php
global $query_string;

$query_args = explode("&", $query_string);
$search_query = array();

foreach($query_args as $key => $string) {
	$query_split = explode("=", $string);
	$search_query[$query_split[0]] = urldecode($query_split[1]);
} // foreach

$search = new WP_Query($search_query);


?>


<?php get_header(); ?>
		<h1>Résultats de recherche "<?php echo trim( get_search_query() ); ?>"</h1>

			<?php if($s) {
				if (have_posts() && !ctype_space($s)) : ?>

					<?php
						global $wp_query;
						$total_results = $wp_query->found_posts;
					?>

					<?php echo $total_results; ?> Résultat<?php if($total_results > "1") echo "s"; ?> trouvé<?php if($total_results > "1") echo "s"; ?> pour : "<?php echo $s ?>"

				<?php
					$totalpage = $wp_query->max_num_pages;
					$big = 999999999;
					// only bother with the rest if we have more than 1 page!
					if ( $totalpage > 1 )  {
					     echo paginate_links(array(
					          'base'     => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
					          'format'   => 'page/%#%',
					          'current'  => max( 1, get_query_var('paged') ),
					          'total'    => $totalpage,
					          'mid_size' => 4,   
							  'prev_text' => '<i class="icon-left-dir"></i>Précédent',
							  'next_text' => 'Suivant<i class="icon-right-dir"></i>',
					          'type'     => 'list'
					     ));
					}
				?>


					<?php while (have_posts()) : the_post(); ?>

						
						<hr />
						<article id="post-<?php the_ID(); ?>">
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
								<?php echo preg_replace( '/'.$s.'/iu', '<span class="searchresult-highlight">'.$s.'</span>', get_the_title() );	?>
							</a>
							<?php echo preg_replace( '/'.$s.'/iu', '<span class="searchresult-highlight">'.$s.'</span>', get_the_excerpt() ); ?>

							<?php the_time('j F Y'); ?> by <?php the_author_posts_link(); ?>
							<?php the_category(', '); ?>
							<?php comments_popup_link('Pas de commentaires', '1 Commentaire', '% Commentaires'); ?>
						</article>

					<?php endwhile; ?>


				<?php
					// only bother with the rest if we have more than 1 page!
					if ( $totalpage > 1 )  {
					     echo paginate_links(array(
					          'base'     => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
					          'format'   => 'page/%#%',
					          'current'  => max( 1, get_query_var('paged') ),
					          'total'    => $totalpage,
					          'mid_size' => 4,
							  'prev_text' => '<i class="icon-left-dir"></i>Précédent',
							  'next_text' => 'Suivant<i class="icon-right-dir"></i>',
					          'type'     => 'list'
					     ));
					}
				?>

				<?php else : ?>

					<?php if (ctype_space($s)) : ?>
						La recherche est vide.
					<?php else : ?>
						Aucun résultat. Essayez une recherche différente.
					<?php endif; ?>

				<?php endif;
			}?>

<?php get_footer(); ?>