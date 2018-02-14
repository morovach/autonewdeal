<?php get_header(); ?>
    <div id="header_home">
        <?php if ( ! dynamic_sidebar( 'type' ) ) : endif; ?>
        <?php if ( ! dynamic_sidebar( 'find-cars' ) ) : endif; ?> 
    </div>

	<div class="col-sm-9 home col-sm-push-3" id="content">
			<?php cps_ajax_search_results(); ?>	
			<?php if ( ! dynamic_sidebar( 'carousel' ) ) : endif; ?>
			<?php require_once('arrivals.php'); ?>	
		</div>
		<div class="col-sm-3 col col-sm-pull-9">
			<?php if ( ! dynamic_sidebar( 'search' ) ) : endif; ?>
			<?php if ( ! dynamic_sidebar('sidebar')) : endif; ?>
		</div>
	</div>
</div>
<?php get_footer('home'); ?>