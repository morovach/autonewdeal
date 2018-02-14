

<?php
/*
Template Name: Contact Us Form
*/
?>
<?php get_header(); ?>
	<div class="col-sm-9 col-sm-push-3" id="content">
		<div class="cpsAjaxLoaderSingle"></div>
		<?php cps_ajax_search_results(); ?>		
			<div class="detail-page-content hideOnSearch">
				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>	
				      <div class="blog-post">                 	 
						<h1><a href="<?php the_permalink() ?>"><?php the_title();?></a></h1>
						<div style="clear:both"></div>	
						<?php if ( has_post_thumbnail() ) { the_post_thumbnail('large'); } ?>
						<?php the_content(); ?>
						<div class="contact-us-page">
<?php	if( class_exists( 'Jetpack' ) && Jetpack::is_module_active( 'contact-form' ) ) {  echo do_shortcode('[contact-form][contact-field label="'.__('Name','language').'" type="name" class="form-control" required="1"/][contact-field label="Email" class="form-control" type="email" required="1"/][contact-field label="'.__('Phone','language').'" class="form-control" type="phone"/][contact-field label="'.__('Message','language').'" default="" type="textarea" class="form-control" required="1"/][/contact-form] ');} ?> 
	<div style="clear:both"></div>
</div>
					</div>
				<?php endwhile; ?>	
            </div>	
		</div>
		<div class="col-sm-3 col col-sm-pull-9"><!-- Start Col 3 -->
			<?php if ( ! dynamic_sidebar( 'search' ) ) : ?>
			<?php endif; ?>
			<?php if ( ! dynamic_sidebar('sidebar')) : ?>
			<?php endif; ?>
		</div><!-- End Col 3 -->
	</div><!-- End Row -->
</div><!-- End Container -->
<?php get_footer(); ?>


