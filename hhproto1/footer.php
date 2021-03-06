<?php if ( is_active_sidebar('footer-one') || is_active_sidebar('footer-two') || is_active_sidebar('footer-three') ) : ?>

	<div class="footer section big-padding bg-white">
		
		<div class="section-inner">
			
			<div class="widgets">
				
				<?php dynamic_sidebar('footer-one'); ?>
				
			</div>
			
			<div class="widgets">
				
				<?php dynamic_sidebar('footer-two'); ?>
				
			</div>
			
			<div class="widgets">
				
				<?php dynamic_sidebar('footer-three'); ?>
				
			</div>
			
			<div class="clear"></div>
			
		</div> <!-- /section-inner -->
		
	</div> <!-- /footer.section -->

<?php endif; ?>

<div class="credits section bg-dark">
			
	<div class="credits-inner section-inner">
	
		<p>Header photo &copy; Erin Thiem, <a href="http://www.outsideinn.com">www.outsideinn.com</a></p>
		<p><span><?php _e('Theme by','lovecraft') ?> Max Norton based on <em>Lovecraft</em> by <a href="http://www.andersnoren.se">Anders Norén</a></span></p>
		<p>All other content &copy; 2015 Heidi Hall</p>
		<p><?php _e('Powered by', 'lovecraft'); ?> <a href="http://www.wordpress.org">WordPress</a></p>
	
	</div> <!-- /section-inner -->

</div> <!-- /credits.section -->

<?php wp_footer(); ?>

</body>
</html>