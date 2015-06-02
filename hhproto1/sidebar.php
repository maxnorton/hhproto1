<div class="sidebar">

	<div class="widget widget-bio">
		<div class="bio-image">
			<img src="<?php echo get_stylesheet_directory_uri() . '/images/heidi.jpg'; ?>" alt="Heidi Hall" />
		</div>
		<div class="widget-title">
			<h2>Heidi Hall</h2>
		</div>
		<div class="widget-content">
			<p>Heidi Hall is a lifelong resident of Northern California, and is excited and ready to serve as the next Congresswoman for the 1st Congressional District. Raised by teachers, and as a daughter and mother of veterans, she knows full well the value of hard work. She is prepared to provide the vision and leadership that the people of the North State need.</p>
		
			<p><a href="mailto:email@heidihallemail.com"><i class="fa fa-envelope-o" style="padding-right:15px;"></i>email@heidihallemail.com</a></p>
		</div>
	</div>	

	<?php 
		if (is_active_sidebar('sidebar')) { 
			
			dynamic_sidebar('sidebar'); 
			
		} else { // Fallback if the sidebar widget area is empty
			
			echo '<div class="widgets">';
			
			the_widget( 'WP_Widget_Search', 
				array(
					
				),
				array(
					'before_title' => '<h3 class="widget-title">',
					'after_title' => '</h3>',
					'before_widget' => '<div class="widget widget_search"><div class="widget-content">',
					'after_widget' => '</div><div class="clear"></div></div>'
				) 
			);
			
			the_widget( 'lovecraft_recent_posts', 
				array(
					'number_of_posts' 	=>	'5',
					'widget_title'		=>	__('Recent Posts','lovecraft'),
				),
				array(
					'before_title' => '<h3 class="widget-title">',
					'after_title' => '</h3>',
					'before_widget' => '<div class="widget widget_lovecraft_recent_posts"><div class="widget-content">',
					'after_widget' => '</div><div class="clear"></div></div>'
				) 
			);
			
			the_widget( 'WP_Widget_Categories', 
				array(
					'count'			=>	'1',
					'hierarchical'	=>	'1',
				),
				array(
					'before_title' => '<h3 class="widget-title">',
					'after_title' => '</h3>',
					'before_widget' => '<div class="widget widget_categories"><div class="widget-content">',
					'after_widget' => '</div><div class="clear"></div></div>'
				) 
			);
			
			the_widget( 'WP_Widget_Archives', 
				array(
					'count'			=>	'1',
					'hierarchical'	=>	'1',
				),
				array(
					'before_title' => '<h3 class="widget-title">',
					'after_title' => '</h3>',
					'before_widget' => '<div class="widget widget_archive"><div class="widget-content">',
					'after_widget' => '</div><div class="clear"></div></div>'
				) 
			);
			
			echo '</div>';
			
		}
	?>

</div>