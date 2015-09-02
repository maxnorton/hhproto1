<?php

// Add aside and video post formats, overriding lovecraft default formats
add_action( 'after_setup_theme', 'heidi_setup', 11 );
function heidi_setup() {
	add_theme_support( 'post-formats', array( 'aside', 'video' ) );
}

add_action( 'wp_enqueue_scripts', 'theme_enqueue_dependencies' );
function theme_enqueue_dependencies() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array('parent-style')
    );
	wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css' );
	wp_enqueue_script( 'google-platform', 'https://apis.google.com/js/platform.js' );
	wp_enqueue_script( 'topbar-overlay', get_stylesheet_directory_uri() . '/js/topbar.js' );
}

/**
 * Filters wp_title to print a neat <title> tag based on what is being viewed.
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */
function heidi_wp_title( $input_title, $sep ) {
	$title = strip_tags( html_entity_decode($input_title) );

	if ( is_feed() ) {
		return $title;
	}
	
	global $page, $paged;

	// Add a page number if necessary:
	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
		$title .= " $sep " . sprintf( __( 'Page %s', '_s' ), max( $paged, $page ) );
	}

	return $title;
}
add_filter( 'wp_title', 'heidi_wp_title', 10, 2 );

// Archive navigation function, adapted from Lovecraft's original function to add classes to the links
function heidi_archive_navigation() {
	global $wp_query;
	global $paged;
	if ( $wp_query->max_num_pages > 1 ) : ?>
		<div class="archive-navigation">
			<div class="fleft">
				<p><?php printf( __('Page %s of %s', 'lovecraft'), $paged, $wp_query->max_num_pages ); ?></p>
			</div>
			
			<div class="fright">
				<?php if ( get_previous_posts_link() ) : ?>
					<p class="previous-posts">
						<?php echo get_previous_posts_link( '&larr; ' . __('Previous', 'lovecraft')); ?>
					</p>
				<?php endif; ?>
				
				<?php if ( get_next_posts_link() ) : ?>
					<p class="next-posts">
						<?php echo get_next_posts_link( __('Next', 'lovecraft') . ' &rarr;'); ?>
					</p>
				<?php endif; ?>
			
			</div>
			<div class="clear"></div>		
		</div> <!-- /archive-nav -->
	<?php endif;
}

// Add mobile sidebar widget area, instead of a mobile menu
add_action( 'widgets_init', 'heidi_sidebar_mobile_reg' ); 

function heidi_sidebar_mobile_reg() {
	register_sidebar(array(
		'name' => __( 'Mobile dropdown sidebar', 'heidi' ),
		'id' => 'sidebar-mobile',
		'description' => __( 'Widgets in this area will be shown in the dropdown mobile sidebar.', 'heidi' ),
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
		'before_widget' => '<div class="widget %2$s"><div class="widget-content">',
		'after_widget' => '</div><div class="clear"></div></div>'
	));
}

function heidi_print_bio_excerpt( $bio_post_id ) {
	global $bio_excerpt_content;
	$page_object = get_post( $bio_post_id );
	$full_bio = apply_filters( 'the_content', $page_object->post_content );
	$more_position = strpos( $full_bio, '<!--more-->' );
	$excerpted_bio = substr( $full_bio, 0, $more_position);
	$bio_excerpt_content = $excerpted_bio.'<p><a href="/about-heidi-hall" class="bio-link">Read more...</a></p>';
	return $bio_excerpt_content;
}
?>
