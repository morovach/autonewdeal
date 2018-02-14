<?php
/*
Template Name: Financing Application
*/
?>
<?php get_header(); ?>
		<div class="col-sm-9 col-sm-push-3" id="content">
			<div class="cpsAjaxLoaderSingle"></div>
				<?php cps_ajax_search_results(); ?>
					<div class="detail-page-content hideOnSearch">
						<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
							<div class="blog-post  financing">                 	 
								<h1><a href="<?php the_permalink() ?>"><?php the_title();?></a></h1>
							<div style="clear:both"></div>	
							<?php if ( has_post_thumbnail() ) { the_post_thumbnail('large'); } ?>
							<?php the_content();?>
							<?php $years = join(', ', generate_years( $options['year_start_text'], date('Y') ) );?>
								<div class="contact-us-page">
							<?php	if( class_exists( 'Jetpack' ) && Jetpack::is_module_active( 'contact-form' ) ) { echo do_shortcode('[contact-form][contact-field label="'.__('Purchase Type','language').'" class="select" type="select" options="'.__('New','language').','.__('Used','language').'"/][contact-field label="'.__('Year','language').'" class="select" type="select" options="'.$years.'"/][contact-field label="'.__('Condition','language').'" type="select" options="'.__('New','language').','.__('Used','language').'"/][contact-field label="'.__('Stock Number','language').'" type="text"/][contact-field label="'.__('Make','language').'" type="text"/][contact-field label="'.__('Model','language').'" type="text"/][contact-field label="VIN" type="text"/][contact-field label="'.__('First Name','language').'" type="name" class="name form-control" required="1"/][contact-field label="'.__('Last Name','language').'" type="text" required="1"/][contact-field label="'.__('City','language').'" type="text"/][contact-field label="Email" type="email" class="form-control" required="1"/][contact-field label="'.__('Date of Birth','language').'" type="text"/][contact-field label="'.__('Address','language').'" type="text"/][/contact-form]'); };?>		
							<div style="clear: both"></div>
					</div>	</div>
				<?php endwhile; ?>	
            </div>
		</div>	
		<div class="col-sm-3 col col-sm-pull-9">
			<?php if ( ! dynamic_sidebar( 'search' ) ) : ?>
			<?php endif; ?>
			<?php if ( ! dynamic_sidebar('sidebar')) : ?>
			<?php endif; ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>