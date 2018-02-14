<?php
add_action('init', 'gtcd');
function gtcd() { 
		register_post_type( 
				'gtcd', 
				array(
					'labels' => array(
						'name' => __('Inventory','language'),
						'add_new' => __('Add New Vehicle','language'),
						'add_new_item' => __('Add New Vehicle','language'),
						'edit_item' => __('Edit Vehicle','language'),
						'new_item' => __('Add New Vehicle','language'),
						'view_item' => __('View Vehicle','language'),
						'search_items' => __('Search Vehicles','language'),
						'not_found' => __('No Vehicles Found','language'),
						'not_found_in_trash' => __('No Vehicles Found In Trash','language')
						),
						'query_var' => true,
						'rewrite' => array('slug' =>'inventory'),
						'singular_name' => __('Inventory','language'),
						'public' => true,
						'can_export' => true,
						'menu_position' => 8,
						'_edit_link' => 'post.php?post=%d',
						'capability_type' => 'post',
						'menu_icon' => 'dashicons-list-view',
						'hierarchical' => false,
						'supports' => array('author','custom-fields','title','editor') ,
						'taxonomies' => array('category')
						));
} 	
add_filter('manage_edit-gtcd_columns', 'gtcd_edit_columns');
add_action('manage_gtcd_posts_custom_column', 'gtcd_custom_columns');
function gtcd_edit_columns($columns) {
			$columns = array(
				'cb' => '<input type="checkbox"/>',
				'title' => __('Title'),
				'pinfo' => __('Vehicle Information','language'),
				'image' => __('Vehicle Photo','language'),	
			);
			return $columns;
}
function gtcd_custom_columns($column) {
		global $post;
		switch ($column) {
			case 'image':
				$saved = get_post_custom_values('CarsGallery', get_the_ID());
				$saved = explode(',',$saved[0]);
				if ( count($saved)>0 ){ 				
				?>					
				<style type="text/css" media="screen">
				img{ margin-bottom: 14px;box-shadow: 0px 3px 5px #ccc;}				
				</style>

					
						<div style="padding-top:16px!important;">
						<?php 	$attachmentimage=wp_get_attachment_image($saved[0], 'medium');							
								echo $attachmentimage;
								?>
                        </div>
			
					<?php
				}
			break;
			case 'pinfo':	
				global $fields, $options; 
				$fields = get_post_meta($post->ID, 'mod1', true);  
				$options = my_get_theme_options();
				$terms_child = get_the_terms($post->ID,'makemodel');
				?>
				<div style="font-weight:bold;font-size:16px;color:#000!important;margin:5px 0!important;">
					<?php if (isset($fields['year'])){ echo $fields['year'].' ';} else { } ?>
						<?php $terms = get_the_terms($post->ID,'makemodel');
								$sorted_terms = array();
								$find_parent = 0;
								for( $i = 0; $i < sizeof($terms); ++$i) {
								if (is_array($terms)) {
								foreach ($terms as $term) {
								if ($term->parent == $find_parent) {
								$find_parent = $term->term_id;
								$sorted_terms[] = $term; }
									}
								}
							}
							if ( ! isset($sorted_terms[0])) {
								$sorted_terms[0] = null; } else {
								echo $sorted_terms[0]->name;}
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
								echo ' '.$sorted_terms_child[1]->name;} ?>
							</div>
			<?php
				if(isset($fields['price'])) {  
					echo '<div style="font-weight:bold;font-size:16px;color:#0d5b8c!important;margin:5px 0!important;">';     
				if (is_numeric( $fields['price'])){ echo $options['currency_text']; echo number_format($fields['price']);} else {  echo $fields['price']; } echo '</div>'; } 			
				if(isset($fields['miles'])) {  
					echo '<div style="color:#454d51;margin-bottom:5px;">'.$options['miles_text'].'<span>: '.$fields['miles'].'</div>'; } 
				else  { echo''; }
				if(isset($fields['stock'])) { echo '<div style="color:#454d51;margin:0 5px 5px 0;"><span style="font-weight:bold">'.$options['stock_text'].'#</span>: '.$fields['stock'].'</div>'; } 
				else  { echo''; }					
				if(isset($fields['drive'])) { echo '<div style="color:#454d51;margin:0 5px 5px 0;"><span style="font-weight:bold">'.$options['drive_text'].'</span>: '.$fields['drive'].'</div>'; } 
				else  { echo''; }
				if(isset($fields['exterior'])) { echo '<div style="color:#454d51;margin:0 5px 5px 0;"><span style="font-weight:bold">'.$options['exterior_text'].'</span>: '.$fields['exterior'].'</div>'; } 
				else { echo''; }				
				if(isset($fields['interior'])) { echo '<div style="color:#454d51;margin:0 5px 5px 0;"><span style="font-weight:bold">'.$options['interior_text'].'</span>: '.$fields['interior'].'</div>';  } 
				else  { echo''; }		
				if(isset($fields['vin'])) {  echo '<div style="color:#454d51;"><span style="font-weight:bold">'.$options['vin_text'].'</span>: '.$fields['vin'].'</div>';  } 
				else  { echo''; }								
			break;
		} 
	} 
?>
