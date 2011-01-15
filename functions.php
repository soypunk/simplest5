<?php
  if ( !isset( $content_width ) ) $content_width = 768;
  if ( function_exists( 'add_theme_support' ) ) add_theme_support( 'automatic-feed-links' );
  if ( function_exists( 'register_nav_menu' ) ) register_nav_menu( 'menu', 'Menu' );
  if ( function_exists('register_sidebar') ) register_sidebar( array(
    'name' => __( 'Widgets', 'simplest' ),
    'id' => 'widgets',
    'before_widget' => '<div class="widget">',
    'after_widget' => '</div><!-- widget -->',
    'before_title' => '<h4>',
    'after_title' => '</h4>') );

// Remove links to the extra feeds (e.g. category feeds)
remove_action( 'wp_head', 'feed_links_extra', 3 );
// Remove links to the general feeds (e.g. posts and comments)
remove_action( 'wp_head', 'feed_links', 2 );
// Remove link to the RSD service endpoint, EditURI link
remove_action( 'wp_head', 'rsd_link' );
// Remove link to the Windows Live Writer manifest file
remove_action( 'wp_head', 'wlwmanifest_link' );
// Remove index link
remove_action( 'wp_head', 'index_rel_link' );
// Remove prev link
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
// Remove start link
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
// Display relational links for adjacent posts
remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 );
// Remove XHTML generator showing WP version
remove_action( 'wp_head', 'wp_generator' );

function remove_comments_rss( $for_comments ) {
    return;
}
//automatic_feed_links(false);
add_filter('post_comments_feed_link','remove_comments_rss');
add_filter('post_comments_feed_link_html','remove_comments_rss');

// EOF