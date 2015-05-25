<!doctype html>
<html lang="fr">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php bloginfo('name'); ?> - <?php if(is_search()){echo "Recherche";} else {the_title(); };?></title>
		<link rel="icon" type="image/png" href="<?php echo get_site_url(); ?>/wp-content/themes/theme/images/icon.png" />
		<?php wp_head(); ?>
		<!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
		<script src="script.js"></script>
	</head>
	<body <?php body_class(); ?> >

		<header class="header">
			<a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>
		</header>
			<?php
				$args = array(
					'menu'       => 'nav',
					'container'       => 'nav',
					'container_id'    => 'navigation',
					'menu_class'      => 'menu'
				);
				wp_nav_menu( $args );
			?>
			<form role="search" method="get" action="<?php echo home_url( '/' ); ?>">
				<input type="search" placeholder="Rechercher..." value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" /><button type="submit"></button>
			</form>
		</header>

