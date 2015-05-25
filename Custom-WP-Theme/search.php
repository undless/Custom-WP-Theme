<?php
/*
Template Name: Search Page
*/
?>
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
	<section class="main-section max-width">
		<h1>Résultats de recherche "<?php echo trim( get_search_query() ); ?>"</h1>
		<div class="searcheresults-content">

			<?php if($s) {
				if (have_posts() && !ctype_space($s)) : ?>

					<?php
						global $wp_query;
						$total_results = $wp_query->found_posts;
					?>

					<h2><?php echo $total_results; ?> Résultat<?php if($total_results > "1") echo "s"; ?> trouvé<?php if($total_results > "1") echo "s"; ?> pour : "<?php echo $s ?>"</h2>
					<br /><br />


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

						<div id="post-<?php the_ID(); ?>" class="searchresult-block">
							<a class="searchresult-title specialfont-extrabold" href="<?php echo get_permalink(); ?>" target="_blank">
								<?php echo preg_replace( '/'.$s.'/iu', '<span class="searchresult-highlight">'.$s.'</span>', get_the_title() );	?>
							</a>
							<div class="searchresult-excerpt">
								<?php echo preg_replace( '/'.$s.'/iu', '<span class="searchresult-highlight">'.$s.'</span>', get_the_excerpt() );	?>
							</div>
						</div>

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
						<h2>La recherche est vide.</h2>
					<?php else : ?>
						<h2>Aucun résultat. Essayez une recherche différente.</h2>
					<?php endif; ?>

				<?php endif;
			}?>
		</div>









	</section>
<?php get_footer(); ?>