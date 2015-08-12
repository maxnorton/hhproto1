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

// Archive navigation function
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

?>
