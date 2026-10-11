<?php
/**
 * MYEMMEL theme setup: stylesheet, SEO basics, comments off.
 * Patterns in /patterns are registered automatically by WordPress.
 */

add_action( 'wp_enqueue_scripts', function () {
	wp_enqueue_style(
		'myemmel-theme',
		get_theme_file_uri( 'assets/css/theme.css' ),
		array(),
		wp_get_theme()->get( 'Version' )
	);
} );

// Page title, meta description and Open Graph (front page only).
add_filter( 'pre_get_document_title', function ( $title ) {
	return is_front_page() ? 'Björn Emmerling · MYEMMEL' : $title;
} );

add_action( 'wp_head', function () {
	if ( ! is_front_page() ) {
		return;
	}
	$desc = "I help organisations focus on what matters and finish what they start. I've done this as a consultant, as a COO, and as the person responsible for Lean, strategy and transformation in industrial and technology companies.";
	$img  = get_theme_file_uri( 'assets/images/portrait-1086.jpg' );
	echo '<meta name="description" content="' . esc_attr( $desc ) . '">' . "\n";
	echo '<meta property="og:type" content="website">' . "\n";
	echo '<meta property="og:title" content="Björn Emmerling · MYEMMEL">' . "\n";
	echo '<meta property="og:description" content="' . esc_attr( $desc ) . '">' . "\n";
	echo '<meta property="og:url" content="' . esc_url( home_url( '/' ) ) . '">' . "\n";
	echo '<meta property="og:image" content="' . esc_url( $img ) . '">' . "\n";
}, 1 );

// Comments and pingbacks off site-wide.
add_filter( 'comments_open', '__return_false', 20 );
add_filter( 'pings_open', '__return_false', 20 );
add_filter( 'comments_array', '__return_empty_array', 10 );
add_filter( 'xmlrpc_enabled', '__return_false' );

add_action( 'init', function () {
	register_block_pattern_category( 'myemmel', array( 'label' => 'MYEMMEL' ) );
} );

// Favicon: two-bar "11" mark. Also answers direct /favicon.ico requests.
add_action( 'wp_head', function () {
	$u = static fn( $f ) => esc_url( get_theme_file_uri( 'assets/images/' . $f ) );
	echo '<link rel="icon" href="' . $u( 'favicon.svg' ) . '" type="image/svg+xml">' . "\n";
	echo '<link rel="icon" href="' . $u( 'favicon.ico' ) . '" sizes="32x32">' . "\n";
	echo '<link rel="apple-touch-icon" href="' . $u( 'apple-touch-icon.png' ) . '">' . "\n";
}, 2 );
add_filter( 'site_icon_meta_tags', '__return_empty_array' );
add_action( 'init', function () {
	remove_action( 'do_faviconico', 'do_favicon' );
}, 20 );
add_action( 'do_faviconico', function () {
	header( 'Content-Type: image/vnd.microsoft.icon' );
	readfile( get_theme_file_path( 'assets/images/favicon.ico' ) );
	exit;
} );
