<?php

function portfolio_css()
{
	if ( !is_admin() ) { // we do not want to register or enqueue these styles on admin screens

		wp_register_style( 'portfolio', plugins_url('../assets/css/portfolio.css', __FILE__), '0.1.0', 'screen');

		// enqueue stylesheets
		wp_enqueue_style( 'portfolio' );
  }
}

// register and enqueue theme stylesheets
add_action( 'wp_enqueue_scripts', 'portfolio_css', 10 );

?>