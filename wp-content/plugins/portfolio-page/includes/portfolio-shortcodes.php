<?php

/*----------------------------------------------------------------------------*/
/* Portfolio page shortcode
/*----------------------------------------------------------------------------*/

add_shortcode( 'portfolio', 'portfolio_page_section', 10);

function portfolio_page_section( $atts ) {

  extract( shortcode_atts( array(
    'heading' => '',
    'count' => '',
  ), $atts) );

  $count = (empty($count)) ? 10 : esc_html($count);

  if( !empty( $heading ) ) {
    $output .= '<h2>' . esc_html( $heading ) . '</h2>';
  }

  $output = '<div class="wrap">';
    $output .= '<div class="portfolio clearfix">';

  $args = array(
    'post_type' => 'portfolio',
    'posts_per_page' => $count ,
    'orderby' => 'menu_order',
    'order' => 'ASC'
  );

  $loop = new WP_Query( $args );

  while ( $loop->have_posts() ) : $loop->the_post();

    $image = get_field('portfolio_image');
    $imageAlt = get_field('image_alt');
    $imageTitle = get_the_title();
    $imageDescrip = get_the_content();

    $output .= '<div class="portfolio-box">';
      $output .= '<img class="portfolio-image" src="' . $image . '" alt="' . $imageAlt . '">';
      $output .= '<div class="portfolio-info">';
        $output .= '<h2>' . $imageTitle . '</h2>';
        $output .= '<p>' . $imageDescrip . '</p>';
      $output .= '</div>';
    $output .= '</div>';

  endwhile;

    $output .= '</div>';
  $output .= '</div>';

  return $output;

}
