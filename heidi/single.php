<?php get_header(); ?>

<div class="wrapper section">
	
	<div class="section-inner">

		<div class="content">
													        
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				
				<div id="post-<?php the_ID(); ?>" <?php post_class('single'); ?>>
							
					<div class="post-inner">

						<?php
							$prev_post = get_previous_post();
							$next_post = get_next_post();
						?>
						
						<?php if ( get_next_posts_link() || get_previous_posts_link() ) { ?>
							
							<div class="post-navigation">
								
								<div class="post-navigation-inner">
							
									<?php
									if (!empty( $prev_post )): ?>
									
										<div class="post-nav-prev">
											<p><?php _e('Previous', 'lovecraft'); ?></p>
											<h4>
												<a href="<?php echo get_permalink( $prev_post->ID ); ?>" title="<?php _e('Previous post', 'lovecraft'); echo ': ' . esc_attr( get_the_title($prev_post) ); ?>">
													<?php echo get_the_title($prev_post); ?>
												</a>
											</h4>
										</div>
									<?php endif; ?>
									
									<?php
									if (!empty( $next_post )): ?>
										
										<div class="post-nav-next">					
											<p><?php _e('Next', 'lovecraft'); ?></p>
											<h4>
												<a title="<?php _e('Next post', 'lovecraft'); echo ': ' . esc_attr( get_the_title($next_post) ); ?>" href="<?php echo get_permalink( $next_post->ID ); ?>">
													<?php echo get_the_title($next_post); ?>
												</a>
											</h4>
										</div>
								
									<?php endif; ?>
									
									<div class="clear"></div>
								
								</div> <!-- /post-navigation-inner -->
							
							</div> <!-- /post-navigation -->
						
						<?php } ?>
				
						<?php get_template_part( 'content', get_post_format() ); ?>
						
						<?php if ( has_tag() ) : ?>
						
							<div class="post-tags">
								
								<?php the_tags('',''); ?>
								
							</div>
						
						<?php endif; ?>
					
					</div> <!-- /post-inner -->
														
				</div> <!-- /post -->
											                        
		   	<?php endwhile; else: ?>
		
				<p><?php _e("We couldn't find any posts that matched your query. Please try again.", "lovecraft"); ?></p>
			
			<?php endif; ?>    
		
		</div> <!-- /content -->
		
		<?php get_sidebar(); ?>
		
		<div class="clear"></div>

	</div>
	
</div> <!-- /wrapper -->
		
<?php get_footer(); ?>