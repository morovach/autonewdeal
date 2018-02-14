<div class="hideOnSearch">
		<div class="product-list-wrapper">
			<div class="tricol-product-list">
			
					<div class="col-sm-12">
						<h2 class="visible-xs"><?php _e('New Arrivals','language');?></h2>
					</div>
				<?php $query = new WP_Query(array(
					'post_type' => array('gtcd','user_listing'),
					'posts_per_page' => '12'
					));
						if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); global $post; $fields = get_post_meta($post->ID, 'mod1', true); $fields3 = get_post_meta($post->ID, 'mod3', true); $fields2 = get_post_meta($post->ID, 'mod2', true);  $options = my_get_theme_options();?>				  		
						<div class="col-sm-4">
						<div class="item-container">
							<a class="arrivals-link" href="<?php the_permalink();?>">
						<div class="image-container">				 
							 <?php  if (!empty($fields['statustag']) && $fields['statustag'] != 'None' ){  ?>
							<div class="status-tag"><?php echo $fields['statustag'];?></div><?php } else {echo '';}?>				
								<?php if ( 'user_listing' == get_post_type($post->ID) ) {
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
												arrivals_img ($post->ID,'medium');
												}
											} 
										} elseif ( 'gtcd' == get_post_type($post->ID) ) {
												gorilla_img ($post->ID,'medium');
								}?> 						
								</div>
								<div class="arrivals-details">
								<p class="vehicle-name"><span class="mini-hide"><?php if ( $fields['year']){ echo $fields['year']; } else {  echo ''; }?></span>  <?php $terms_child = get_the_terms($post->ID,'makemodel');
													$terms = get_the_terms($post->ID,'makemodel');
													$sorted_terms = array();
													$find_parent = 0;
													for( $i = 0; $i < sizeof($terms); ++$i) {
														if (is_array($terms)){
													   foreach ($terms as $term) {
													      if ($term->parent == $find_parent) {
													         $find_parent = $term->term_id;
													         $sorted_terms[] = $term;
													      }
													   }
													}
												}
												if ( ! isset($sorted_terms[0])) { 
													$sorted_terms[0] = null; 
													} else {
													echo $sorted_terms[0]->name.' ';}
													$sorted_terms_child = array();
													$find_child = 0;
													for( $i = 0; $i < sizeof($terms_child); ++$i) {
														if (is_array($terms_child)){
													foreach ($terms_child as $term_child) {
													      if ($term_child->parent == $find_child) {
													         $find_child = $term_child->term_id;
													         $sorted_terms_child[] = $term_child;
													      }
					
													   }
													  }
													}
													if (!isset($sorted_terms_child[1])) { 
														$sorted_terms_child[1] = null;
													} else {
													echo $sorted_terms_child[1]->name;}?>
								</p>
								<div class="price-style">
									<?php  if (is_numeric( $fields['price'])){ echo $options['currency_text']; echo number_format($fields['price']);} else {  echo $fields['price']; } ?>
								</div>
								<div class="meta-style">
									<?php if ( $fields['miles']){ echo $fields['miles'].' '.$options['miles_text'];} elseif ($fields['miles'] == '0' ){ echo _e('0','language').' '.$options['miles_text'];} else {echo '';}  ?>
								</div>
								<?php echo '<p class="strong grid-location">';?>					
								<?php	$locations_child = get_the_terms($post->ID,'location');
										$sorted_locations_child = array();
										$find_child = 0;
										for( $i = 0; $i < sizeof($locations_child); ++$i) {
										if (is_array($locations_child)){
										foreach ($locations_child as $location_child) {
										if ($location_child->parent == $find_child) {
										$find_child = $location_child->term_id;
													         $sorted_locations_child[] = $location_child;
													      }
					
													   }
													}
												}
													if (!isset($sorted_locations_child[1])) {
														$sorted_locations_child[1] = null;
														} else {
														echo $sorted_locations_child[1]->name.', '; } 
													?>
													<?php	$locations = get_the_terms($post->ID,'location');
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
													if ( !isset($sorted_locations[0]->name)) {
													$sorted_locations[0] = null;
													} else {
													echo $sorted_locations[0]->name; } ?>		
											</p>
												<div style="clear: both"></div>
											<a class="detail-btn" href="<?php the_permalink();?>"><?php _e('View Details','language');?></a>
                     					</div>
                     				</a>
								</div>
							</div>
						<?php endwhile;?>
					<?php wp_reset_query(); ?>
				<?php else: ?>
				<?php require_once(AUTODEALER_INCLUDES.'/init/arrivals.php'); ?>	 
			<?php endif; ?>      
		</div>
	</div>
</div>