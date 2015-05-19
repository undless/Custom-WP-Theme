<!doctype html>
<html lang="fr">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">

		<title>
			<?php
				bloginfo('name');
				if ( is_404() ) {
					echo "&raquo;";
					_e('Not Found');
				} elseif ( !is_home() ) {
					echo "&raquo;";
					wp_title();
				}
			?>
		</title>
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
		<script src="script.js"></script>
	</head>
	<body>