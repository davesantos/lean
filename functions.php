<?php

if ( ! isset( $content_width ) ) $content_width = 900;

add_theme_support( 'automatic-feed-links' );
add_theme_support( 'post-thumbnails' );
// add_theme_support( 'post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'audio', 'chat', 'video'));

// This theme uses wp_nav_menu() in one location.
register_nav_menus( array(
	'primary' => __( 'Primary Navigation'),
) );

function setup() {
	// Clean up the <head>
	remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0 ); // Display relational links for the posts adjacent to the current post.
	remove_action('wp_head', 'feed_links', 2 ); // Display the links to the general feeds: Post and Comment Feed
	remove_action('wp_head', 'feed_links_extra', 3 ); // Display the links to the extra feeds such as category feeds
	remove_action('wp_head', 'index_rel_link' ); // index link
	remove_action('wp_head', 'parent_post_rel_link', 10, 0 ); // prev link
	remove_action('wp_head', 'rel_canonical');
	remove_action('wp_head', 'rsd_link' ); // Display the link to the Really Simple Discovery service endpoint, EditURI link
	remove_action('wp_head', 'start_post_rel_link', 10, 0 ); // start link
	remove_action('wp_head', 'wlwmanifest_link' ); // Display the link to the Windows Live Writer manifest file.
	remove_action('wp_head', 'wp_generator' ); // Display the XHTML generator that is generated on the wp_head hook, WP version
	remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0 );
}
add_action('init', 'setup');


function continue_reading_link() {
	return ' <a href="'. get_permalink() . '">' . __( 'Continue reading <span class="meta-nav">&rarr;</span>' ) . '</a>';
}

# Change read more to ellipsis
function auto_excerpt_more( $more ) {
	return ' &hellip;' . continue_reading_link();
}


function custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= continue_reading_link();
	}
	return $output;
}

# Remove inline styles printed when the gallery shortcode is used.
function remove_gallery_css( $css ) {
	return preg_replace( "#<style type='text/css'>(.*?)</style>#s", '', $css );
}

# Remove p tags on images - wprecipe
function filter_ptags_on_images($content){
    return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}

# Change locations of style.css
# http://wordpress.org/support/topic/changing-location-of-stylecss-with-filters
function wpi_stylesheet_dir_uri($stylesheet_dir_uri, $theme_name){
	$subdir = '/css';
	return $stylesheet_dir_uri . $subdir;
}

// Allow upload of svg files
function cc_mime_types( $mimes ){
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}

add_filter( 'stylesheet_directory_uri','wpi_stylesheet_dir_uri',10,2);
add_filter('the_content', 'filter_ptags_on_images');
add_filter( 'excerpt_more', 'auto_excerpt_more' );
add_filter( 'get_the_excerpt', 'custom_excerpt_more' );
add_filter( 'upload_mimes', 'cc_mime_types' );
add_filter( 'gallery_style', 'remove_gallery_css' );

//Widgets

if (function_exists('register_sidebar')) {
	register_sidebar(array(
		'name' => 'Sidebar Widgets',
		'id'   => 'sidebar-widgets',
		'description'   => 'These are widgets for the sidebar.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>'
	));
}


// Navigation - update coming from twentythirteen
function post_navigation() {
	echo '<div class="navigation">';
	echo '	<div class="next-posts">'.get_next_posts_link('&laquo; Older Entries').'</div>';
	echo '	<div class="prev-posts">'.get_previous_posts_link('Newer Entries &raquo;').'</div>';
	echo '</div>';
}
