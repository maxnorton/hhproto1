<?php get_header(); ?>

<div class="wrapper section">
	
	<div class="section-inner">

		<div class="content">
													        
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				
				<div id="post-<?php the_ID(); ?>" <?php post_class('single'); ?>>
							
					<div class="post-inner">
				
						<div class="post-header">
							
						    <h2 class="post-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
						    
						    <div class="post-meta">
			    
							    <p class="post-author"><span><?php _e('By','lovecraft'); ?> </span><?php the_author_posts_link(); ?></p>
								<p class="post-date"><span><?php _e('On','lovecraft'); ?> </span><a href="<?php the_permalink(); ?>"><?php the_time(get_option('date_format')); ?></a></p>
								<?php if (has_category()) : ?>
									<p class="post-categories"><span><?php _e('In','lovecraft'); ?> </span><?php the_category(', '); ?></p>
								<?php endif; ?>
								<?php edit_post_link('Edit', '<p>', '</p>'); ?>
							    
						    </div>
						    	    
						</div> <!-- /post-header -->
						
						<?php if ( get_the_content() ) : ?>
		
							<div class="post-content">
							
								<?php the_content(); ?>
								
								<?php 
							    	$args = array(
										'before'           => '<div class="clear"></div><p class="page-links"><span class="title">' . __( 'Pages:','lovecraft' ) . '</span>',
										'after'            => '</p>',
										'link_before'      => '<span>',
										'link_after'       => '</span>',
										'separator'        => '',
										'pagelink'         => '%',
										'echo'             => 1
									);
						    	
						    		wp_link_pages($args); 
								?>
							
							</div>
						
						<?php endif; ?>
						
						<?php if ( has_tag() ) : ?>
						
							<div class="post-tags">
								
								<?php the_tags('',''); ?>
								
							</div>
						
						<?php endif; ?>
					
					</div> <!-- /post-inner -->
					
					<?php
						$prev_post = get_previous_post();
						$next_post = get_next_post();
					?>
					
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
										
					<?php comments_template( '', true ); ?>
				
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