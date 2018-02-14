<div class="container-fluid footer">

		<div class="row">
			<div id="footer">
				<?php if ( ! dynamic_sidebar( 'type' ) ) : endif; ?>
				<?php if ( ! dynamic_sidebar( 'find-cars' ) ) : endif; ?> 
			</div>
			<div id="footer" class="col-sm-12" >
				<?php if ( ! dynamic_sidebar( 'footer' )) : ?>
				<?php endif; ?>
			</div>
		</div>	
	</div>
	<div class="container-fluid hidden-xs">
		<div class="row">
			<div class="bottom-bar-wrapper">
				<div class="bottom-bar">
					<p><?php _e('Automotive by ','language');?>
					<a href="http://gorillathemes.com"><?php echo('Gorilla Themes');?></a> - <?php _e('Powered by ','language');?>
					<a href="http://wordpress.org"><?php _e('WordPress','language');?></a>
					</p>
				</div>
			</div>
			
<?php wp_footer(); ?>
</body>
</html>
