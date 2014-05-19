<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package hersh_mcgersh
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function hersh_mcgersh_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'footer'    => 'page',
        'posts_per_page' => 20
	) );
}
add_action( 'after_setup_theme', 'hersh_mcgersh_jetpack_setup' );
