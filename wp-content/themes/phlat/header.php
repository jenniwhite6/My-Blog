<!DOCTYPE html>
<html>
<head>
	<title><?php bloginfo('name'); ?><?php wp_title(''); ?></title>
	<meta charset='utf-8'>
	<meta name="description" content="Jenni White is a front-end developer with experience in education, business operations, and international studies.">
	<meta name="author" content="Jenni White">
	<meta name="twitter:card" content="summary">
	<meta name="twitter:site" content="@jenniwhite6">
	<meta name="twitter:creator" content="@jenniwhite6">
	<link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,700,300' rel='stylesheet' type='text/css'>

	<?php wp_head() ?>
</head>

<body>
<header class='nav-bar'>
	<div class='container'>
		<nav class='top-menu'>
			
			<?php

				wp_nav_menu(
				    array('menu' => 'Top Nav')
				);
			?>
		
		</nav>
	</div>
</header>