<?php
/*
 * Plugin Name: Portfolio Page 
 * Description: Add to portfolio page
 * Version: 0.1.0
 * Author: Jenni White
 * License: GPL2

/*  Copyright 2015 Jenni White (email : jenniwhite6@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
if(!defined('PORTFOLIO_PAGE_DIR')) define('PORTFOLIO_PAGE_DIR', dirname(__FILE__));

 //Require files
require_once PORTFOLIO_PAGE_DIR . '/includes/functions.php';
require_once PORTFOLIO_PAGE_DIR . '/includes/portfolio-shortcodes.php';

function portfolio_posttypes()
{
  $labels = array(
    'name'  => 'Portfolio Page',
    'singular_name' => 'Portfolio Page',
    'menu_name' => 'Portfolio Page',
    'name_admin_bar' => 'Portfolio Page',
    'add_new' => 'Add New',
    'add_new_item' => 'Add New Process',
    'new_item' => 'New Portfolio Page',
    'edit_item' => 'Edit Portfolio',
    'view_item' => 'View Portfolio',
    'all_items' => 'All Portfolio',
    'search_items' => 'Search Portfolio Page',
    'parent_item_colon' => 'Parent Portfolio Page',
    'not_found' => 'No portfolio found.',
    'not_found_in_trash' => 'No portfolio found in Trash.',
  );

  $args = array(
    'labels' => $labels,
    'public' => false,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_position' => 5,
    'menu_icon' => 'dashicons-format-gallery',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'portfolio' ),
    'capability_type' => 'post',
    'has_archive' => false,
    'hierarchical' => true,
    //'taxonomies' => array( 'category' ),
    'supports' => array( 'title', 'editor', 'custom-fields', 'page-attributes' )
  );
  register_post_type( 'portfolio', $args);
}
add_action('init', 'portfolio_posttypes' );

function my_rewrite_flush() {
  // First, we "add" the custom post type via the above written function.
  // Note: "add" is written with quotes, as CPTs don't get added to the DB,
  // They are only referenced in the post_type column with a post entry, 
  // when you add a post of this CPT.
  portfolio_posttypes();

  // ATTENTION: This is *only* done during plugin activation hook in this example!
  // You should *NEVER EVER* do this on every page load!!
  flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'my_rewrite_flush' );

    //'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'page-attributes', 'post-formats'),
