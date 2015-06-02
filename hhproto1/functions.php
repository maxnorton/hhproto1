<?php
add_action( 'wp_enqueue_scripts', 'theme_enqueue_dependencies' );
function theme_enqueue_dependencies() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array('parent-style')
    );
	wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css' );
	wp_enqueue_script( 'google-platform', 'https://apis.google.com/js/platform.js' );
}
?>
