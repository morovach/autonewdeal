<?php 
	get_header();
	global $options;$fields;$options2;$options3;
	$fields = get_post_meta($post->ID, 'mod1', true);
	$options = my_get_theme_options();	
	$blogurl = get_bloginfo('template_url');
	$surl = get_bloginfo('url'); ?>	
		<div class="col-sm-9 col-sm-push-3" id="content">
			<div class="cpsAjaxLoaderHome"></div>
				<?php cps_ajax_search_results();
					$custom_query_args = array(  'paged' => $paged, 'post_type' => array('gtcd'));
					$custom_query_args['paged'] = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
					$custom_query = new WP_Query( $custom_query_args );
					$temp_query = $wp_query;
					$wp_query   = NULL;
					$wp_query   = $custom_query;
					if ( $custom_query->have_posts() ) :  while ( $custom_query-> have_posts() ) :  $custom_query->the_post();
					global $options;$fields;$options2;$options3;
					$terms_child = get_the_terms($post->ID,'makemodel');
					$terms = get_the_terms($post->ID,'makemodel');
					$sorted_terms = array();
					$find_parent = 0;
					for( $i = 0; $i < sizeof($terms); ++$i) {
						if (is_array($terms)) {
					foreach ($terms as $term) {
					      if ($term->parent == $find_parent) {
					         $find_parent = $term->term_id;
					         $sorted_terms[] = $term;
					      		}
					   		}
						}
					}				
					if ( ! isset($sorted_terms[0])) {
					$sorted_terms[0] = null; } else {
					$sorted_terms[0]->name;}
					$sorted_terms_child = array();
					$find_child = 0;
					for( $i = 0; $i < sizeof($terms_child); ++$i) {
						if (is_array($terms_child)) {
					foreach ($terms_child as $term_child) {
					      if ($term_child->parent == $find_child) {
					         $find_child = $term_child->term_id;
					         $sorted_terms_child[] = $term_child;
					      		}
					   		}
					   }
					}
					if ( ! isset($sorted_terms_child[1])) {
					$sorted_terms_child[1] = null; } else {
					$sorted_terms_child[1]->name;}
					$locations_child = get_the_terms($post->ID,'location');
					$sorted_locations_child = array();
					$find_child = 0;
					for( $i = 0; $i < sizeof($locations_child); ++$i) {
						
						if (is_array($locations_child))
						{
					foreach ($locations_child as $location_child) {
					    if ($location_child->parent == $find_child) {
					    	$find_child = $location_child->term_id;
							$sorted_locations_child[] = $location_child;
					    		}
					   		}
					   }
					}
					if ( ! isset($sorted_locations_child[1])) {
					$sorted_locations_child[1] = null; } else {
					$sorted_locations_child[1]->name; }
					$locations = get_the_terms($post->ID,'location');
					$sorted_locations = array();
					$find_parent = 0;
					for( $i = 0; $i < sizeof($locations); ++$i) {
						if (is_array($locations))
						{
					foreach ($locations as $location) {
					      if ($location->parent == $find_parent) {
					         $find_parent = $location->term_id;
					         $sorted_locations[] = $location;
					      		}
					   		}
					   }
					}
					if ( ! isset($sorted_locations[0]->name)) {
					$sorted_locations[0] = null; } else {
					$sorted_locations[0]->name; 
					} 								
	$fields = get_post_meta($post->ID, 'mod1', true);
	$fields_2 = get_post_meta($post->ID, 'mod2', true);
	$options = my_get_theme_options();		
	$blogurl = get_bloginfo('template_url');
	$surl = get_bloginfo('url');?> 
<div class="result-car">
	<div class="row">
	<a class="result-car-link" href="<?php echo get_permalink($post->ID);?>" rel="bookmark">
	<?php
	if ( 'user_listing' == get_post_type($post->ID) ) {
	$args = array(
		'order'          => 'ASC',
		'orderby'        => 'menu_order',
		'post_type'      => 'attachment',
		'post_parent'    => $post->ID,
		'post_mime_type' => 'image',
		'post_status'    => null,
		'numberposts'    => 1,
		);
		$attachments = get_posts($args);
		if ($attachments) {
			foreach ($attachments as $attachment) {
			echo '<div class="col-sm-5 col-results">'.wp_get_attachment_image($attachment->ID, 'large',false,array('class' =>'img-responsive')).'<span class="'.$fields['statustag'].'"></span></div>';
				}
			} ?>
<?php } elseif ( 'gtcd' == get_post_type($post->ID) ) {
	echo '<div class="col-sm-5 col-results">';
	echo gorilla_img ($post->ID,'large').'<span class="'.$fields['statustag'].'"></span>';
	echo '</div>'; }?>
<div class="col-sm-4 result-detail-wrapper col-results"> 
	<p class="vehicle-name"><span class="mini-hide"><?php if ( $fields['year']){ echo $fields['year'];}else {  echo ''; }?></span> <?php  $terms_child = get_the_terms($post->ID,'makemodel');
					$terms = get_the_terms($post->ID,'makemodel');
					$sorted_terms = array();
					$find_parent = 0;
					for( $i = 0; $i < sizeof($terms); ++$i) {
						if (is_array($terms))
					{
					foreach ($terms as $term) {
					      if ($term->parent == $find_parent) {
					         $find_parent = $term->term_id;
					         $sorted_terms[] = $term; }
					   		}
						}
					}
					if ( ! isset($sorted_terms[0])) {
					$sorted_terms[0] = null; } else {
				    echo $sorted_terms[0]->name.' ';}
				    $sorted_terms_child = array();
				    $find_child = 0;
				    for( $i = 0; $i < sizeof($terms_child); ++$i) {
						if (is_array($terms_child)) {
						foreach ($terms_child as $term_child) {
					      if ($term_child->parent == $find_child) {
					         $find_child = $term_child->term_id;
					         $sorted_terms_child[] = $term_child; }
							}
						}
					}
					if ( ! isset($sorted_terms_child[1])) {
				  $sorted_terms_child[1] = null; } else {
				  echo $sorted_terms_child[1]->name;} ?></p>
  <p class="miles-style"><?php if ( $fields['miles']){ echo $fields['miles'].' '.$options['miles_text'];} elseif ($fields['miles'] == '0' ){ echo _e('0','language').' '.$options['miles_text'];} else {echo '';}  ?></p><p class="car-info"><?php if (isset( $fields['transmission'])){ echo $fields['transmission'];}else {  echo ''; };?>
<?php if (isset( $fields_2['cylinders'])){ echo ', '.$fields_2['cylinders'].' '.$options['number_cylinders_text'].', ';}else {  echo ''; };?><?php if (isset( $fields['exterior'])){ echo '<span class="mini-hide">'.$fields['exterior'].'</span> - ';;}else {  echo ''; };?><?php if (isset( $fields['interior'])){ echo '<span class="mini-hide">'.$fields['interior'].'</span>';}else {  echo ''; };?><?php if (isset( $fields['epamileage'])){ echo ', <span class="mini-hide">'.$fields['epamileage'].'</span>';}else {  echo ''; };?></p><p class="title-tag"><?php echo $post->post_title;?></p>	
<?php   
		$terms = get_the_term_list( get_the_ID(), 'features','<ul class="feat-style"><li>', ',</li><li>', '</li></ul>' );
		$max_terms = 5;
		$terms_array = explode( ',', $terms, $max_terms + 1 );
		array_pop( $terms_array );
		$terms = implode( ' ', $terms_array );
		echo $terms;
?>
		</div> 
		<div class="col-sm-3 col-results">
			<div class="inventory-right">
				<p class="price-style results"><?php  if (is_numeric( $fields['price'])){ echo $options['currency_text']; echo number_format($fields['price']);} else {  echo $fields['price']; } ?> </p>
				<?php	if (!empty($fields['stock'])){ echo '<p class="stock-inventory">'.$options['stock_text'].' # : '.$fields['stock'].'</p>';}else {  echo ''; }?>
				<p class="location-tag">
				<?php $locations_child = get_the_terms($post->ID,'location');
						$sorted_locations_child = array();
						$find_child = 0;
						for( $i = 0; $i < sizeof($locations_child); ++$i) {
						if (is_array($locations_child)) {
						foreach ($locations_child as $location_child) {
						  if ($location_child->parent == $find_child) {
						     $find_child = $location_child->term_id;
						     $sorted_locations_child[] = $location_child;
						  			}
								}
							}
						}
						if ( ! isset($sorted_locations_child[1])) {
						$sorted_locations_child[1] = null; } else {
						echo $sorted_locations_child[1]->name.', '; }
						$locations = get_the_terms($post->ID,'location');
						$sorted_locations = array();
						$find_parent = 0;
						for( $i = 0; $i < sizeof($locations); ++$i) {
						if (is_array($locations)){
						foreach ($locations as $location) {
						      if ($location->parent == $find_parent) {
						         $find_parent = $location->term_id;
						         $sorted_locations[] = $location;
						      		}
						   		}
						   }
						}
						if ( ! isset($sorted_locations[0]->name)) {
						$sorted_locations[0] = null; } else {
						echo $sorted_locations[0]->name; } ?>									
				</p>
				<p><a class="btn btn-primary" href="<?php echo get_permalink($post->ID);?>"><?php _e('View Details','language');?></a></p>
			</div>
		</div>
		<div style="clear:both;"></div>               
	</a>
	</div>
</div>
<?php endwhile; else : ?>						
	<p style="padding:30px;"><?php _e('Sorry, no listings matched your criteria.','language');?></p>
	<?php endif; ?>
	<div class="bottom-pagination">
		<p><a id="link" href="#top"><?php _e('BACK TO TOP','language');?></a></p>
		<p class="paging">
			<?php wp_reset_postdata(); pagination_nav(); $wp_query = NULL; $wp_query = $temp_query;?>
        </p>
		</div></div>
		<div class="col-sm-3 col col-sm-pull-9">
			<?php if ( ! dynamic_sidebar( 'search' ) ) : ?>
			<?php endif; ?>
			<?php if ( ! dynamic_sidebar('sidebar')) : ?>
		<?php endif; ?>
	</div>
</div>
<?php get_footer(); ?>