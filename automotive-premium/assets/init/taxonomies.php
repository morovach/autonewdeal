<?php
function create_makemodel() {
	$options = my_get_theme_options();		
	$labels = array(
		'name' => __('Make & Model','language'), 'taxonomy general name' ,
		'singular_name' =>  __('Make & Model','language'), 'taxonomy singular name' ,
		'search_items' =>  __('Search Make & Model','language'),
		'all_items' => __( 'All Make & Models','language'),
		'parent_item' => __( 'Parent Make & Model','language'),
		'parent_item_colon' => __( 'Parent Make & Model','language') .':' ,
		'edit_item' => __( 'Edit Make & Model','language'),
		'update_item' => __( 'Update Make & Model','language'),
		'add_new_item' => __( 'Add New Make & Model','language'),
		'new_item_name' => __( 'New Make & Model','language').' Name',		
		);		
register_taxonomy(
	'makemodel',
	array( 'gtcd','user_listing' ),
	array(		
		'hierarchical' => true,
		'label' => __('Make & Model','language'),
		'public'	   => true,
		'can_export'   => true,
		'labels' => $labels
		));
} 
add_action( 'init', 'create_makemodel' );	
function create_location() {
	$options = my_get_theme_options();		
	$labels = array(
		'name' => __('Location','language'), 'taxonomy general name' ,
		'singular_name' =>  __('Location','language'), 'taxonomy singular name' ,
		'search_items' =>  __('Search Location','language'),
		'all_items' => __( 'All Locations','language'),
		'parent_item' => __( 'Parent Locations','language'),
		'parent_item_colon' => __( 'Parent Locations','language').':' ,
		'edit_item' => __( 'Edit Locations','language'),
		'update_item' => __( 'Update Location','language'),
		'add_new_item' => __( 'Add New Location','language'),
		'new_item_name' => __( 'New Location','language').' Name',		
		);		
register_taxonomy(
	'location',
	array( 'gtcd','user_listing' ),
	array(		
		'hierarchical' => true,
		'label' => __('Make & Model','language'),
		'public'	   => true,
		'can_export'   => true,
		'labels' => $labels
		));
} 
add_action( 'init', 'create_location' );	
function features() {	   
	$options = my_get_theme_options();
	$labels = array(
		'name' => __('Features','language'), 'taxonomy general name' ,
		'singular_name' =>  __('Features','language'), 'taxonomy singular name',
		'search_items' =>  __('Search Features','language'),
		'all_items' => __( 'All Features','language'),
		'parent_item' => __( 'Parent Features','language'),
		'parent_item_colon' => __( 'Parent Features','language').':' ,
		'edit_item' => __( 'Edit Features','language'),
		'update_item' => __( 'Update Features','language'),
		'add_new_item' => __( 'Add New Features','language'),
		'new_item_name' => __( 'New Features','language').' Name'
		); 			
register_taxonomy(
	'features',
	array( 'gtcd','user_listing' ),
	array(
		'hierarchical' => false,
		'label' => __('Features','language'),
		'public' => true,
		'can_export' => true,
		'show_tagcloud' => true,
		'labels' => $labels
		));
}
add_action( 'init', 'features' );	 
?>
