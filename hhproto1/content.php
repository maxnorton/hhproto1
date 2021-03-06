<div id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
	
	<div class="post-inner">
				
		<div class="post-header">

			<?php if ( has_post_thumbnail() ) : ?>
				
				<div class="featured-media">

					<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>">
					
						<?php the_post_thumbnail('post-image'); ?>
						
						<?php if ( !empty(get_post(get_post_thumbnail_id())->post_excerpt) ) : ?>
										
							<div class="media-caption-container">
							
								<p class="media-caption"><?php echo get_post(get_post_thumbnail_id())->post_excerpt; ?></p>
								
							</div>

						<?php endif; ?>
					</a>

				</div>
					
			<?php endif;

			if ( get_the_title() ) : ?>
				
			    <h2 class="post-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
			    
			<?php endif; ?>
		    
		    <?php if ( is_sticky() ) : ?>
		    
		    	<a href="<?php the_permalink(); ?>" title="<?php _e('Sticky post','lovecraft') ?>" class="sticky-post">
			    	<div class="genericon genericon-star"></div>
			    </a>
		    
		    <?php endif; ?>
		    
		    <div class="post-meta">
			    
			    <p class="post-author"><span><?php _e('By','lovecraft'); ?> </span><?php the_author_posts_link(); ?></p>
				<p class="post-date"><span><?php _e('On','lovecraft'); ?> </span><a href="<?php the_permalink(); ?>"><?php the_time(get_option('date_format')); ?></a></p>
				<?php edit_post_link('Edit', '<p>', '</p>'); ?>
			    
		    </div>
		    	    
		</div> <!-- /post-header -->
		
		<?php if ( get_the_content() ) : ?>
		
			<div class="post-content">
			
				<?php the_content(); ?>
			
				<div class="share">
					<span>
						<div class="fb-share-button" data-href="<?php the_permalink(); ?>" data-layout="button_count"></div>
					</span>
					<span>
						<a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php the_permalink(); ?>" data-text="Heidi Hall: <?php the_title(); ?>">Tweet</a>
						<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
 					</span>
 					<span>
 						<g:plusone href="<?php the_permalink(); ?>"></g:plusone>
 					</span>
 					<span>
						<a href="#" onclick="alert('email dialog box not yet built'); e.preventdefault();"><i class="fa fa-envelope-o" style="padding-right:15px;"></i> Email this</a>
					</span>					
				</div>
			
			</div>
		
		<?php endif; ?>
	
	</div> <!-- /post-inner -->
	
</div> <!-- /post -->