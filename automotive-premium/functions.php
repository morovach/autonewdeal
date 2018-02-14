<?php 
	define('AUTODEALER_INCLUDES', get_template_directory() . '/assets/');
	define('AUTODEALER_MAIN', get_template_directory(). '/');
	define('THEME_FUNCTIONS', get_template_directory() . '/functions/');
	define('THEME_SIDEBARS', get_template_directory() . '/sidebars/');
	define('THEME_WIDGETS', get_template_directory() . '/widgets/');	
	define('THEME_NAME', 'CARDEALER');
	define('THEME_DIR', get_bloginfo('template_directory'));
	require_once(AUTODEALER_INCLUDES.'/init/theme-setup.php');
	require_once(AUTODEALER_INCLUDES . '/import/file/functions.php' );
	require_once(AUTODEALER_INCLUDES.'/init/post-type.php');
	require_once(AUTODEALER_INCLUDES.'/gallery/meta-box.php');
	require_once(AUTODEALER_INCLUDES.'/init/taxonomies.php');
	require_once(THEME_SIDEBARS.'register-sidebars.php');
	require_once(AUTODEALER_INCLUDES.'/bootstrap_walker/wp_bootstrap_navwalker.php');
function prefix_theme_updater() {
	require_once(AUTODEALER_INCLUDES.'/updater/theme-updater.php');
}
add_action( 'after_setup_theme', 'prefix_theme_updater' );	
function reverse_categories($terms, $id, $taxonomy){  
    if($taxonomy == 'location'){  
        $terms = array_reverse($terms, false);  
    }  
    return $terms;  
}  
add_filter('get_the_terms', 'reverse_categories', 10, 3);  
add_action( 'restrict_manage_posts', 'stock_admin_posts_filter_restrict_manage_posts' );
function stock_admin_posts_filter_restrict_manage_posts(){
    $type = 'post';
    if (isset($_GET['post_type'])) {
        $type = $_GET['post_type'];
    }
    if ('gtcd' == $type){
       global $wpdb;
    $sql = "SELECT DISTINCT meta_value FROM $wpdb->postmeta 
        WHERE $wpdb->postmeta.meta_key = '_stock' AND meta_value != ''";
    $fields = $wpdb->get_results($sql, ARRAY_N);        
                ?>
        <select name="ADMIN_FILTER_FIELD_VALUE">
        <option value=""><?php _e('Filter By Stock Number', 'language'); ?></option>
        <?php
            $current_v = isset($_GET['ADMIN_FILTER_FIELD_VALUE'])? $_GET['ADMIN_FILTER_FIELD_VALUE']:'';
            foreach ($fields as $field) {
                printf
                    (
                        '<option value="%s"%s>%s</option>',
                        $field[0],
                $field[0] == $current? ' selected="selected"':'',
                $field[0]
                    );
                }
        ?>
        </select>
        <?php
    }
}
add_filter( 'parse_query', 'stock_posts_filter' );
function stock_posts_filter( $query ){
    global $pagenow;
    $type = 'post';
    if (isset($_GET['post_type'])) {
        $type = $_GET['post_type'];
    }
    if ( 'gtcd' == $type && is_admin() && $pagenow=='edit.php' && isset($_GET['ADMIN_FILTER_FIELD_VALUE']) && $_GET['ADMIN_FILTER_FIELD_VALUE'] != '') {
        $query->query_vars['meta_key'] = '_stock';
        $query->query_vars['meta_value'] = $_GET['ADMIN_FILTER_FIELD_VALUE'];
	}
}
add_action('save_post', 'save_stock_number');   
function meta_options(){
	global $post;
	$custom = get_post_custom($post->ID);
	$stock_number = $custom["_stock"][0];
	$options;$fields;$options2;$options3;$symbols;
	$fields = get_post_meta($post->ID, 'mod1', true); ?>
	<input  name="stock_number" value="<?php	if ( $fields['_stock']){ echo $fields['_stock'];}else {  echo ''; }?>
" />
	<?php
}  
function save_stock_number(){
		global $post;
		$post_id = get_the_ID();
		update_post_meta($post_id, "_stock", isset($_POST["_stock"]));
		
	}
if ( ! function_exists ( 'my_theme_options_init' ) ) {
function my_theme_options_init() {
	register_setting( 'my_options',  'my_theme_options',  'my_theme_options_validate' );
	add_settings_section( 'general', '', '__return_false', 'theme_options'  );
	add_settings_field( 'currency_text', __( 'Currency:', 'language' ), 'my_settings_field_currency_text_input', 	'theme_options', 'general' );
	add_settings_field( 'location_text', __( 'Location:', 'language' ), 'my_settings_field_location_text_input', 	'theme_options', 'general' );
	add_settings_field( 'state_text', __( 'State:', 'language' ), 'my_settings_field_state_text_input', 	'theme_options', 'general' );	
	add_settings_field( 'status_tag_text', __( 'Condition:', 'language' ), 'my_settings_field_status_tag_text_input', 	'theme_options', 'general' );
	add_settings_field( 'featured_text', __( 'Featured:', 'language' ), 'my_settings_field_featured_text_input', 	'theme_options', 'general' );
	add_settings_field( 'top_deal_text', __( 'Top Deal?:', 'language' ), 'my_settings_field_top_deal_text_input', 	'theme_options', 'general' );	
	add_settings_field( 'drive_text', __( 'Drive:', 'language' ), 'my_settings_field_drive_text_input', 'theme_options', 	'general' );	
	add_settings_field( 'epa_mileage_text', __( 'Epa Mileage:', 'language' ), 'my_settings_field_epa_mileage_text_input', 	'theme_options', 'general' );	
	add_settings_field( 'transmission_text', __( 'Transmission:', 'language' ), 	'my_settings_field_transmission_text_input', 'theme_options', 'general' );	
	add_settings_field( 'stock_text', __( 'Stock #:', 'language' ), 'my_settings_field_stock_text_input', 	'theme_options', 'general' );
	add_settings_field( 'vin_text', __( 'VIN:', 'language' ), 'my_settings_field_vin_text_input', 'theme_options', 	'general' );
	add_settings_field( 'carfax_text', __( 'Carfax Partner ID:', 'language' ), 'my_settings_field_carfax_text_input', 	'theme_options', 'general' );
	add_settings_field( 'interior_text', __( 'Interior:', 'language' ), 'my_settings_field_interior_text_input', 	'theme_options', 'general' );
	add_settings_field( 'interior_text', __( 'Interior:', 'language' ), 'my_settings_field_interior_text_input', 	'theme_options', 'general' );
	add_settings_field( 'exterior_text', __( 'Exterior:', 'language' ), 'my_settings_field_exterior_text_input', 	'theme_options', 'general' );
	add_settings_field( 'description_text', __( 'Description:', 'language' ), 'my_settings_field_description_text_input', 	'theme_options', 'general' );
	add_settings_field( 'torque_text', __( 'Torque:', 'language' ), 'my_settings_field_torque_text_input', 	'theme_options', 'general' );
	add_settings_field( 'price_text', __( 'Price:', 'language' ), 'my_settings_field_price_text_input', 'theme_options', 	'general' );	
	add_settings_field( 'vehicle_type_text', __('Vehicle Type:','language' ),'my_settings_field_vehicle_type_text_input', 'theme_options', 'general' );					
	add_settings_field( 'miles_text', __( 'Miles:', 'language' ), 'my_settings_field_miles_text_input', 'theme_options', 	'general' );	
	add_settings_field( 'year_text', __( 'Year:', 'language' ), 'my_settings_field_year_text_input', 'theme_options', 	'general' );
	add_settings_field( 'make_model_text', __( 'Make & Model:', 'language' ), 'my_settings_field_make_model_text_input', 'theme_options', 	'general' );
	add_settings_field( 'features_text', __( 'Features:', 'language' ), 'my_settings_field_features_text_input', 'theme_options', 	'general' );
	add_settings_field( 'engine_size_text', __( 'Engine Size:', 'language' ), 'my_settings_field_engine_size_text_input', 'theme_options', 	'general' );
	add_settings_field( 'numbers_cylinders_text', __( 'Cylinders:', 'language' ), 'my_settings_field_number_cylinders_text_input', 'theme_options', 	'general' );
	add_settings_field( 'horsepower_text', __( 'Horsepower:', 'language' ), 'my_settings_field_horsepower_text_input', 'theme_options', 	'general' );
	add_settings_field( 'compression_ratio_text', __( 'Compression Ratio:', 'language' ), 'my_settings_field_compression_ratio_text_input', 'theme_options', 	'general' );
	add_settings_field( 'camshaft_text', __( 'Camshaft:', 'language' ), 'my_settings_field_camshaft_text_input', 'theme_options', 	'general' );
	add_settings_field( 'engine_type_text', __( 'Engine Tye:', 'language' ), 'my_settings_field_engine_type_text_input', 'theme_options', 	'general' );
	add_settings_field( 'bore_text', __( 'Bore:', 'language' ), 'my_settings_field_bore_text_input', 'theme_options', 	'general' );
	add_settings_field( 'stroke_text', __( 'Stroke:', 'language' ), 'my_settings_field_stroke_text_input', 'theme_options', 	'general' );
	add_settings_field( 'valves_text', __( 'Valves per Cylinder:', 'language' ), 'my_settings_field_valves_text_input', 'theme_options', 	'general' );
	add_settings_field( 'fuel_capacity_text', __( 'Fuel Capacity:', 'language' ), 'my_settings_field_fuel_text_input', 'theme_options', 	'general' );
	add_settings_field( 'wheelbase_text', __( 'Wheelbase:', 'language' ), 'my_settings_field_wheelbase_text_input', 'theme_options', 	'general' );
	add_settings_field( 'overall_length_text', __( 'Overall Length:', 'language' ), 'my_settings_field_overall_length_text_input', 'theme_options', 	'general' );
	add_settings_field( 'width_text', __( 'Width:', 'language' ), 'my_settings_field_width_text_input', 'theme_options', 	'general' );
	add_settings_field( 'height_text', __( 'Height:', 'language' ), 'my_settings_field_height_text_input', 'theme_options', 	'general' );
	add_settings_field( 'curb_weight_text', __( 'Curb Weight:', 'language' ), 'my_settings_field_curb_weight_text_input', 'theme_options', 	'general' );
	add_settings_field( 'leg_room_text', __( 'Leg Room:', 'language' ), 'my_settings_field_leg_room_text_input', 'theme_options', 	'general' );
	add_settings_field( 'head_room_text', __( 'Head Room:', 'language' ), 'my_settings_field_head_room_text_input', 'theme_options', 	'general' );
	add_settings_field( 'seating_text', __( 'Seating Capacity (Std):', 'language' ), 'my_settings_field_seating_text_input', 'theme_options', 	'general' );
	add_settings_field( 'tires_text', __( 'Tires (Std):', 'language' ), 'my_settings_field_tires_text_input', 'theme_options', 	'general' );

}
add_action( 'admin_init', 'my_theme_options_init' );
function my_option_page_capability( $capability ) {
	return 'edit_theme_options';
}
add_filter( 'option_page_capability_my_options', 'my_option_page_capability' );
function my_theme_options_add_page() {
	$theme_page = add_theme_page(
		__( 'Search Fields', 'language' ),  
		__( 'Search Fields', 'language' ),   
		'edit_theme_options',         
		'theme_options',               
		'my_theme_options_render_page' 
	);
}
add_action( 'admin_menu', 'my_theme_options_add_page' );
if ( ! function_exists ( 'my_get_theme_options' ) ) {
    function my_get_theme_options() {
	$saved = (array) get_option( 'my_theme_options' );
	$defaults = array(
	'price_hide'       => 'off',
	'condition_hide'       => 'off',
	'location_hide'       => 'off', 
	'vehicle_type_hide'       => 'off', 
	'year_hide'       => 'off',
	'state_hide'       => 'off',
	'make_hide'       => 'off',
	'state_text'	=> __('State','language'), 
	'location_text'	=> __('Location','language'),
	'currency_text'	=> __('$','language'),
	'price_text'     => __('Price','language'),
	'status_tag_text'     => __('Condition','language'),
	'top_deal_text'     => __('Top Deal','language'),
	'featured_text'     => __('Featured','language'),
	'epa_mileage_text'     => __('EPA Mileage','language'),
	'stock_text'     => __('Stock','language'),
	'vin_text'     => __('VIN','language'),
	'carfax_text'     => __('Carfax Parner ID','language'),
	'interior_text'     => __('Interior','language'),
	'exterior_text'     => __('Exterior','language'),
	'drive_text'     => __('Drive','language'),
	'description_text'     	=> __('Description','language'),
	'torque_text'     	=> __('Torque','language'),
	'year_text'     	=> __('Year','language'),
	'miles_text'     	=> __('Miles','language'),
	'make_model_text'     	=> __('Make & Model','language'),
	'features_text'     	=> __('Features','language'),
	'year_start_text'     	=> __('1990','language'),
	'engine_size_text'     	=> __('Engine Size','language'),
	'number_cylinders_text'     	=> __('Cylinders','language'),
	'horsepower_text'     	=> __('Horsepower','language'),
	'compression_ratio_text'     	=> __('Compression Ratio','language'),
	'camshaft_text'     	=> __('Camshaft','language'),
	'engine_type_text'     	=> __('Engine Type','language'),
	'bore_text'     	=> __('Bore','language'),
	'stroke_text'     	=> __('Stroke','language'),
	'valves_text'     	=> __('Valves','language'),
	'fuel_capacity_text'     	=> __('Fuel Capacity','language'),
	'wheelbase_text'     	=> __('Wheelbase','language'),
	'overall_length_text'     	=> __('Overall Length','language'),
	'width_text'     	=> __('Width','language'),
	'height_text'     	=> __('Height','language'),
	'curb_weight_text'     	=> __('Curb Weight','language'),
	'leg_room_text'     	=> __('Leg Room','language'),
	'head_room_text'     	=> __('Head Room','language'),
	'seating_text'     	=> __('Seating Capacity (Std)','language'),
	'tires_text'     	=> __('Tires (Std)','language'),
	'transmission_text'     	=> __('Transmission','language'),
	'transmission_1'     	=> __('Automatic','language'),
	'transmission_2'     	=> __('Manual','language'),
	'transmission_3'     	=> __('Semi-Auto','language'),
	'transmission_4'     	=> __('Other','language'),
	'vehicle_type_text'     	=> __('Vehicle Type','language'),
	'vehicle_type_1'     	=> __('Convertibles','language'),
	'vehicle_type_2'     	=> __('Crossovers','language'),
	'vehicle_type_3'     	=> __('Luxury Vehicles','language'),
	'vehicle_type_4'     	=> __('Hybrids','language'),
	'vehicle_type_5'     	=> __('Minivans and Vans','language'),
	'vehicle_type_6'     	=> __('Pickup Trucks','language'),
	'vehicle_type_7'     	=> __('Sedans and Coupes','language'),
	'vehicle_type_8'     	=> __('Diesel Engines','language'),
	'vehicle_type_9'     	=> __('Sport Utilities','language'),
	'vehicle_type_10'     	=> __('Sports Cars','language'),
	'vehicle_type_11'     	=> __('Wagons','language'),
	'vehicle_type_12'     	=> __('4WD-AWD','language'),
	);
 
	$defaults = apply_filters( 'my_default_theme_options', $defaults );
	$options = wp_parse_args( $saved, $defaults );
	$options = array_intersect_key( $options, $defaults );
	return $options;
}}}
add_action( 'admin_menu', 'my_get_theme_options' );
	require_once(AUTODEALER_INCLUDES.'init/metaboxes.php');
	require_once(AUTODEALER_MAIN.'results.php');	
function my_settings_field_year_text_input() {
	$options = my_get_theme_options();
	?>
	<input type="text" name="my_theme_options[year_text]" id="year-text-input" value="<?php echo esc_attr( $options['year_text'] ); ?>" /><label for="checkbox">
		<input type="checkbox" name="my_theme_options[year_hide]" id="checkbox" <?php checked( 'on', $options['year_hide'] ); ?> />
		<?php _e( ' Hide in Search Module.', 'language' ); ?>
	</label>
	<div style="padding:5px 0;"></div>
	<li class='li'><strong><?php _e('Start Year:','language');?></strong>&nbsp;<input type="text" name="my_theme_options[year_start_text]" id="year-text-input" value="<?php echo esc_attr( $options['year_start_text'] ); ?>" />
	
	<?php
}
function my_settings_field_make_model_text_input() {
	$options = my_get_theme_options();
	?>
	<input type="text" name="my_theme_options[make_model_text]" id="make_model-text-input" value="<?php echo esc_attr( $options['make_model_text'] ); ?>" />
		<label for="checkbox">
		<input type="checkbox" name="my_theme_options[make_hide]" id="checkbox" <?php checked( 'on', $options['make_hide'] ); ?> />
		<?php _e( ' Hide in Search Module.', 'language' ); ?>
	</label>

	<?php
}
function my_settings_field_make_hide() {
	$options = my_get_theme_options();
}
function my_settings_field_condition_hide() {
	$options = my_get_theme_options();
}
function my_settings_field_state_hide() {
	$options = my_get_theme_options();
}
function my_settings_field_price_hide() {
	$options = my_get_theme_options();
}
function my_settings_field_year_hide() {
	$options = my_get_theme_options();
}
function my_settings_field_vehicle_type_hide() {
	$options = my_get_theme_options();
}
function my_settings_field_location_text_input() {
	$options = my_get_theme_options();
	?>
	<input type="text" name="my_theme_options[location_text]" id="location-text-input" value="<?php echo esc_attr( $options['location_text'] ); ?>" />	
	<?php	
}
function my_settings_field_currency_text_input() {
	$options = my_get_theme_options();
	?>	
		<input type="text" name="my_theme_options[currency_text]" id="currency-text-input" value="<?php echo esc_attr( $options['currency_text'] ); ?>" />	
	<?php
}
function my_settings_field_state_text_input() {
	$options = my_get_theme_options();
	?>
	<input type="text" name="my_theme_options[state_text]" id="state-text-input" value="<?php echo esc_attr( $options['state_text'] ); ?>" />	<label for="checkbox">
		<input type="checkbox" name="my_theme_options[state_hide]" id="checkbox" <?php checked( 'on', $options['state_hide'] ); ?> />
		<?php _e( ' Hide in Search Module.', 'language' ); ?>
	</label>
	<?php	
}
function my_settings_field_price_text_input() {
	$options = my_get_theme_options();
	?>
	<input type="text" name="my_theme_options[price_text]" id="price-text-input" value="<?php echo esc_attr( $options['price_text'] ); ?>" />	<label for="checkbox">
		<input type="checkbox" name="my_theme_options[price_hide]" id="checkbox" <?php checked( 'on', $options['price_hide'] ); ?> />
		<?php _e( ' Hide in Search Module.', 'language' ); ?>
	</label>
	<?php	
}
function my_settings_field_featured_text_input() {
	$options = my_get_theme_options();
	?>
	<input type="text" name="my_theme_options[featured_text]" id="featured-text-input" value="<?php echo esc_attr( $options['featured_text'] ); ?>" />
	<?php
}
function my_settings_field_top_deal_text_input() {
	$options = my_get_theme_options();
	?>
	<input type="text" name="my_theme_options[top_deal_text]" id="top_deal-text-input" value="<?php echo esc_attr( $options['top_deal_text'] ); ?>" />
	<?php
}
function my_settings_field_status_tag_text_input() {
	$options = my_get_theme_options();
	?>
	<input type="text" name="my_theme_options[status_tag_text]" id="statustag_text-text-input" value="<?php echo esc_attr( $options['status_tag_text'] ); ?>" />
	<label for="checkbox">
		<input type="checkbox" name="my_theme_options[condition_hide]" id="checkbox" <?php checked( 'on', $options['condition_hide'] ); ?> />
		<?php _e( ' Hide in Search Module.', 'language' ); ?>
	</label>
	<?php
}
function my_settings_field_drive_text_input() {
	$options = my_get_theme_options();
	?>
	<input type="text" name="my_theme_options[drive_text]" id="drive-text-input" value="<?php echo esc_attr( $options['drive_text'] ); ?>" />
	<?php
}
function my_settings_field_epa_mileage_text_input() {
	$options = my_get_theme_options();
	?>
	<input type="text" name="my_theme_options[epa_mileage_text]" id="epa_mileage-text-input" value="<?php echo esc_attr( $options['epa_mileage_text'] ); ?>" />
	<?php
}
function my_settings_field_stock_text_input() {
	$options = my_get_theme_options();
	?>
	<input type="text" name="my_theme_options[stock_text]" id="stock-text-input" value="<?php echo esc_attr( $options['stock_text'] ); ?>" />
	<?php
}
function my_settings_field_vin_text_input() {
	$options = my_get_theme_options();
	?>
	<input type="text" name="my_theme_options[vin_text]" id="vin-text-input" value="<?php echo esc_attr( $options['vin_text'] ); ?>" />
	<?php
}
function my_settings_field_carfax_text_input() {
	$options = my_get_theme_options();
	?>
	<input type="text" name="my_theme_options[carfax_text]" id="carfax-text-input" value="<?php echo esc_attr( $options['carfax_text'] ); ?>" />
	<?php
}
function my_settings_field_interior_text_input() {
	$options = my_get_theme_options();
	?>
	<input type="text" name="my_theme_options[interior_text]" id="interior-text-input" value="<?php echo esc_attr( $options['interior_text'] ); ?>" />
	<?php
}
function my_settings_field_exterior_text_input() {
	$options = my_get_theme_options();
	?>
	<input type="text" name="my_theme_options[exterior_text]" id="exterior-text-input" value="<?php echo esc_attr( $options['exterior_text'] ); ?>" />
	<?php
}
function my_settings_field_torque_text_input() {
   $options = my_get_theme_options();
   ?>
   <input type="text" name="my_theme_options[torque_text]" id="torque-text-input" value="<?php echo esc_attr( $options['torque_text'] ); ?>" />
   <?php
}
function my_settings_field_miles_text_input() {
	$options = my_get_theme_options();
	?>
	<input type="text" name="my_theme_options[miles_text]" id="miles-text-input" value="<?php echo esc_attr( $options['miles_text'] ); ?>" />
	<?php
}
function my_settings_field_features_text_input() {
	$options = my_get_theme_options();
	?>
	<input type="text" name="my_theme_options[features_text]" id="features-text-input" value="<?php echo esc_attr( $options['features_text'] ); ?>" />
	<?php
}
function my_settings_field_engine_size_text_input() {
	$options = my_get_theme_options();
	?>
	<input type="text" name="my_theme_options[engine_size_text]" id="engine_size-text-input" value="<?php echo esc_attr( $options['engine_size_text'] ); ?>" />
	<?php
}
function my_settings_field_number_cylinders_text_input() {
	$options = my_get_theme_options();
	?>
	<input type="text" name="my_theme_options[number_cylinders_text]" id="number_cylinders-text-input" value="<?php echo esc_attr( $options['number_cylinders_text'] ); ?>" />
	<?php
}
function my_settings_field_horsepower_text_input() {
	$options = my_get_theme_options();
	?>
	<input type="text" name="my_theme_options[horsepower_text]" id="horsepower-text-input" value="<?php echo esc_attr( $options['horsepower_text'] ); ?>" />
	<?php
}
function my_settings_field_compression_ratio_text_input() {
	$options = my_get_theme_options();
	?>
	<input type="text" name="my_theme_options[compression_ratio_text]" id="compression_ratio-text-input" value="<?php echo esc_attr( $options['compression_ratio_text'] ); ?>" />
	<?php
}
function my_settings_field_camshaft_text_input() {
	$options = my_get_theme_options();
	?>
	<input type="text" name="my_theme_options[camshaft_text]" id="camshaft-text-input" value="<?php echo esc_attr( $options['camshaft_text'] ); ?>" />
	<?php
}
function my_settings_field_engine_type_text_input() {
	$options = my_get_theme_options();
	?>
	<input type="text" name="my_theme_options[engine_type_text]" id="engine_type-text-input" value="<?php echo esc_attr( $options['engine_type_text'] ); ?>" />
	<?php
}
function my_settings_field_bore_text_input() {
	$options = my_get_theme_options();
	?>
	<input type="text" name="my_theme_options[bore_text]" id="bore-text-input" value="<?php echo esc_attr( $options['bore_text'] ); ?>" />
	<?php
}
function my_settings_field_stroke_text_input() {
	$options = my_get_theme_options();
	?>
	<input type="text" name="my_theme_options[stroke_text]" id="stroke-text-input" value="<?php echo esc_attr( $options['stroke_text'] ); ?>" />
	<?php
}
function my_settings_field_valves_text_input() {
	$options = my_get_theme_options();
	?>
	<input type="text" name="my_theme_options[valves_text]" id="valves-text-input" value="<?php echo esc_attr( $options['valves_text'] ); ?>" />
	<?php
}
function my_settings_field_fuel_text_input() {
	$options = my_get_theme_options();
	?>
	<input type="text" name="my_theme_options[fuel_capacity_text]" id="fuel_capacity-text-input" value="<?php echo esc_attr( $options['fuel_capacity_text'] ); ?>" />
	<?php
}
function my_settings_field_wheelbase_text_input() {
	$options = my_get_theme_options();
	?>
	<input type="text" name="my_theme_options[wheelbase_text]" id="wheelbase-text-input" value="<?php echo esc_attr( $options['wheelbase_text'] ); ?>" />
	<?php
}
function my_settings_field_overall_length_text_input() {
	$options = my_get_theme_options();
	?>
	<input type="text" name="my_theme_options[overall_length_text]" id="overall_length-text-input" value="<?php echo esc_attr( $options['overall_length_text'] ); ?>" />
	<?php
}
function my_settings_field_width_text_input() {
	$options = my_get_theme_options();
	?>
	<input type="text" name="my_theme_options[width_text]" id="width-text-input" value="<?php echo esc_attr( $options['width_text'] ); ?>" />
	<?php
}
function my_settings_field_height_text_input() {
	$options = my_get_theme_options();
	?>
	<input type="text" name="my_theme_options[height_text]" id="height-text-input" value="<?php echo esc_attr( $options['height_text'] ); ?>" />
	<?php
}
function my_settings_field_curb_weight_text_input() {
	$options = my_get_theme_options();
	?>
	<input type="text" name="my_theme_options[curb_weight_text]" id="curb_weight-text-input" value="<?php echo esc_attr( $options['curb_weight_text'] ); ?>" />
	<?php
}
function my_settings_field_leg_room_text_input() {
	$options = my_get_theme_options();
	?>
	<input type="text" name="my_theme_options[leg_room_text]" id="leg_room-text-input" value="<?php echo esc_attr( $options['leg_room_text'] ); ?>" />
	<?php
}
function my_settings_field_head_room_text_input() {
	$options = my_get_theme_options();
	?>
	<input type="text" name="my_theme_options[head_room_text]" id="head_room-text-input" value="<?php echo esc_attr( $options['head_room_text'] ); ?>" />
	<?php
}
function my_settings_field_seating_text_input() {
	$options = my_get_theme_options();
	?>
	<input type="text" name="my_theme_options[seating_text]" id="seating-text-input" value="<?php echo esc_attr( $options['seating_text'] ); ?>" />
	<?php
}
function my_settings_field_tires_text_input() {
	$options = my_get_theme_options();
	?>
	<input type="text" name="my_theme_options[tires_text]" id="tires-text-input" value="<?php echo esc_attr( $options['tires_text'] ); ?>" />
	<?php
}
function my_settings_field_description_text_input() {
	$options = my_get_theme_options();
	?>
	<input type="text" name="my_theme_options[description_text]" id="description-text-input" value="<?php echo esc_attr( $options['description_text'] ); ?>" />
	<?php
}
function my_settings_field_vehicle_type_text_input() {
	$options = my_get_theme_options();
	?>
<input type="text" name="my_theme_options[vehicle_type_text]" id="vehicle_type-text-input" value="<?php echo esc_attr( $options['vehicle_type_text'] ); ?>" /><label for="checkbox">
		<input type="checkbox" name="my_theme_options[vehicle_type_hide]" id="checkbox" <?php checked( 'on', $options['vehicle_type_hide'] ); ?> />
		<?php _e( 'Hide in Search Module.', 'language' ); ?>
	</label>
	<div style="padding:5px 0;"></div>
	<li class='li'><strong><?php _e('Option 1:','language');?></strong>&nbsp;&nbsp;<input type="text" name="my_theme_options[vehicle_type_1]" id="vehicle_type-text-input" value="<?php echo esc_attr( $options['vehicle_type_1'] ); ?>" /></li>	
	<li class='lialt'><strong><?php _e('Option 2:','language');?></strong>&nbsp;&nbsp;<input type="text" name="my_theme_options[vehicle_type_2]" id="vehicle_type-text-input" value="<?php echo esc_attr( $options['vehicle_type_2'] ); ?>" /></li>	
	<li class='li'><strong><?php _e('Option 3:','language');?></strong>&nbsp;&nbsp;<input type="text" name="my_theme_options[vehicle_type_3]" id="vehicle_type-text-input" value="<?php echo esc_attr( $options['vehicle_type_3'] ); ?>" /></li>	
	<li class='lialt'><strong><?php _e('Option 4:','language');?></strong>&nbsp;&nbsp;<input type="text" name="my_theme_options[vehicle_type_4]" id="vehicle_type-text-input" value="<?php echo esc_attr( $options['vehicle_type_4'] ); ?>" /></li>
	<li class='li'><strong><?php _e('Option 5:','language');?></strong>&nbsp;&nbsp;<input type="text" name="my_theme_options[vehicle_type_5]" id="vehicle_type-text-input" value="<?php echo esc_attr( $options['vehicle_type_5'] ); ?>" /></li>	
	<li class='lialt'><strong><?php _e('Option 6:','language');?></strong>&nbsp;&nbsp;<input type="text" name="my_theme_options[vehicle_type_6]" id="vehicle_type-text-input" value="<?php echo esc_attr( $options['vehicle_type_6'] ); ?>" /></li>	
	<li class='li'><strong><?php _e('Option 7:','language');?></strong>&nbsp;&nbsp;<input type="text" name="my_theme_options[vehicle_type_7]" id="vehicle_type-text-input" value="<?php echo esc_attr( $options['vehicle_type_7'] ); ?>" /></li>	
	<li class='lialt'><strong><?php _e('Option 8:','language');?></strong>&nbsp;&nbsp;<input type="text" name="my_theme_options[vehicle_type_8]" id="vehicle_type-text-input" value="<?php echo esc_attr( $options['vehicle_type_8'] ); ?>" /></li>	
	<li class='li'><strong><?php _e('Option 9:','language');?></strong>&nbsp;&nbsp;<input type="text" name="my_theme_options[vehicle_type_9]" id="vehicle_type-text-input" value="<?php echo esc_attr( $options['vehicle_type_9'] ); ?>" /></li>	
	<li class='lialt'><strong><?php _e('Option 10:','language');?></strong>&nbsp;&nbsp;<input type="text" name="my_theme_options[vehicle_type_10]" id="vehicle_type-text-input" value="<?php echo esc_attr( $options['vehicle_type_10'] ); ?>" /></li>	
	<li class='li'><strong><?php _e('Option 11:','language');?></strong>&nbsp;&nbsp;<input type="text" name="my_theme_options[vehicle_type_11]" id="vehicle_type-text-input" value="<?php echo esc_attr( $options['vehicle_type_11'] ); ?>" /></li>
	<li class='lialt'><strong><?php _e('Option 12:','language');?></strong>&nbsp;&nbsp;<input type="text" name="my_theme_options[vehicle_type_12]" id="vehicle_type-text-input" value="<?php echo esc_attr( $options['vehicle_type_12'] ); ?>" /></li>	
	<?php
}
function my_settings_field_transmission_text_input() {
	$options = my_get_theme_options();
	?>	
	<input type="text" name="my_theme_options[transmission_text]" id="transmission-text-input" value="<?php echo esc_attr( $options['transmission_text'] ); ?>" />
		<div style="padding:5px 0;"></div>
	<li class='li'><strong><?php _e('Option 1:','language');?></strong>&nbsp;&nbsp;<input type="text" name="my_theme_options[transmission_1]" id="transmission-text-input" value="<?php echo esc_attr( $options['transmission_1'] ); ?>" /></li>
	<li class='lialt'><strong><?php _e('Option 2:','language');?></strong>&nbsp;&nbsp;<input type="text" name="my_theme_options[transmission_2]" id="transmission-text-input" value="<?php echo esc_attr( $options['transmission_2'] ); ?>" /></li>
	<li class='li'><strong><?php _e('Option 3:','language');?></strong>&nbsp;&nbsp;<input type="text" name="my_theme_options[transmission_3]" id="transmission-text-input" value="<?php echo esc_attr( $options['transmission_3'] ); ?>" /></li>
	<li class='lialt'><strong><?php _e('Option 4:','language');?></strong>&nbsp;&nbsp;<input type="text" name="my_theme_options[transmission_4]" id="transmission-text-input" value="<?php echo esc_attr( $options['transmission_4'] ); ?>" /></li>	
	<?php
}
function my_theme_options_render_page() {
	?>
	<div id="theme-options-wrap" class="widefat">    
    	<div id="icon-themes" class="icon32"><br /></div> 
			<?php $theme_name = wp_get_theme(); ?>
			<h2><?php printf( __( '%s Theme Options', 'language' ), $theme_name ); ?></h2>
			<?php settings_errors(); ?>
			<form method="post" action="options.php">
				<div class="tabber_container">
				<div class="block">			
					<?php settings_fields( 'my_options' );
						do_settings_sections( 'theme_options' ); ?>		</div>
				</div>			
				<?php submit_button(); ?>
			</form>
	</div>
<?php
}
function my_theme_options_validate( $input ) {
	$output = array();
	if ( isset( $input['price_hide'] ) )
	$output['price_hide'] = 'on';	
	if ( isset( $input['year_hide'] ) )
	$output['year_hide'] = 'on';
	if ( isset( $input['vehicle_type_hide'] ) )
	$output['vehicle_type_hide'] = 'on';		
	if ( isset( $input['state_hide'] ) )
	$output['state_hide'] = 'on';		
	if ( isset( $input['make_hide'] ) )
	$output['make_hide'] = 'on';		
	if ( isset( $input['condition_hide'] ) )
	$output['condition_hide'] = 'on';
	if ( isset( $input['featured_text'] ) && ! empty( $input['featured_text'] ) )
	$output['featured_text'] = wp_filter_nohtml_kses( $input['featured_text'] );		
	if ( isset( $input['make_model_text'] ) && ! empty( $input['make_model_text'] ) )
	$output['make_model_text'] = wp_filter_nohtml_kses( $input['make_model_text'] );		
	if ( isset( $input['location_text'] ) && ! empty( $input['location_text'] ) )
	$output['location_text'] = wp_filter_nohtml_kses( $input['location_text'] );
	if ( isset( $input['currency_text'] ) && ! empty( $input['currency_text'] ) )
	$output['currency_text'] = wp_filter_nohtml_kses( $input['currency_text'] );		
	if ( isset( $input['state_text'] ) && ! empty( $input['state_text'] ) )
	$output['state_text'] = wp_filter_nohtml_kses( $input['state_text'] );	
	if ( isset( $input['price_text'] ) && ! empty( $input['price_text'] ) )
	$output['price_text'] = wp_filter_nohtml_kses( $input['price_text'] );	
	if ( isset( $input['top_deal_text'] ) && ! empty( $input['top_deal_text'] ) )
	$output['top_deal_text'] = wp_filter_nohtml_kses( $input['top_deal_text'] );	
	if ( isset( $input['epa_mileage_text'] ) && ! empty( $input['epa_mileage_text'] ) )
	$output['epa_mileage_text'] = wp_filter_nohtml_kses( $input['epa_mileage_text'] );
	if ( isset( $input['stock_text'] ) && ! empty( $input['stock_text'] ) )
	$output['stock_text'] = wp_filter_nohtml_kses( $input['stock_text'] );
	 if ( isset( $input['vin_text'] ) && ! empty( $input['vin_text'] ) )
	$output['vin_text'] = wp_filter_nohtml_kses( $input['vin_text'] );
	if ( isset( $input['carfax_text'] ) && ! empty( $input['carfax_text'] ) )
	$output['carfax_text'] = wp_filter_nohtml_kses( $input['carfax_text'] );
	if ( isset( $input['interior_text'] ) && ! empty( $input['interior_text'] ) )
	$output['interior_text'] = wp_filter_nohtml_kses( $input['interior_text'] );
	if ( isset( $input['exterior_text'] ) && ! empty( $input['exterior_text'] ) )
	$output['exterior_text'] = wp_filter_nohtml_kses( $input['exterior_text'] );
	if ( isset( $input['drive_text'] ) && ! empty( $input['drive_text'] ) )
	$output['drive_text'] = wp_filter_nohtml_kses( $input['drive_text'] );
	if ( isset( $input['description_text'] ) && ! empty( $input['description_text'] ) )
	$output['description_text'] = wp_filter_nohtml_kses( $input['description_text'] );
	if ( isset( $input['torque_text'] ) && ! empty( $input['torque_text'] ) )
	$output['torque_text'] = wp_filter_nohtml_kses( $input['torque_text'] );
	if ( isset( $input['year_text'] ) && ! empty( $input['year_text'] ) )
	$output['year_text'] = wp_filter_nohtml_kses( $input['year_text'] );
	if ( isset( $input['miles_text'] ) && ! empty( $input['miles_text'] ) )
	$output['miles_text'] = wp_filter_nohtml_kses( $input['miles_text'] );
	if ( isset( $input['make_model_text'] ) && ! empty( $input['make_model_text'] ) )
	$output['make_model_text'] = wp_filter_nohtml_kses( $input['make_model_text'] );
	if ( isset( $input['features_text'] ) && ! empty( $input['features_text'] ) )
	$output['features_text'] = wp_filter_nohtml_kses( $input['features_text'] );
	if ( isset( $input['year_start_text'] ) && ! empty( $input['year_start_text'] ) )
	$output['year_start_text'] = wp_filter_nohtml_kses( $input['year_start_text'] );
	if ( isset( $input['engine_size_text'] ) && ! empty( $input['engine_size_text'] ) )
	$output['engine_size_text'] = wp_filter_nohtml_kses( $input['engine_size_text'] );
	if ( isset( $input['number_cylinders_text'] ) && ! empty( $input['number_cylinders_text'] ) )
	$output['number_cylinders_text'] = wp_filter_nohtml_kses( $input['number_cylinders_text'] );
	if ( isset( $input['horsepower_text'] ) && ! empty( $input['horsepower_text'] ) )
	$output['horsepower_text'] = wp_filter_nohtml_kses( $input['horsepower_text'] );
	if ( isset( $input['compression_ratio_text'] ) && ! empty( $input['compression_ratio_text'] ) )
	$output['compression_ratio_text'] = wp_filter_nohtml_kses( $input['compression_ratio_text'] );
	if ( isset( $input['camshaft_text'] ) && ! empty( $input['camshaft_text'] ) )
	$output['camshaft_text'] = wp_filter_nohtml_kses( $input['camshaft_text'] );
	if ( isset( $input['engine_type_text'] ) && ! empty( $input['engine_type_text'] ) )
	$output['engine_type_text'] = wp_filter_nohtml_kses( $input['engine_type_text'] );
	if ( isset( $input['bore_text'] ) && ! empty( $input['bore_text'] ) )
	$output['bore_text'] = wp_filter_nohtml_kses( $input['bore_text'] );
	if ( isset( $input['stroke_text'] ) && ! empty( $input['stroke_text'] ) )
	$output['stroke_text'] = wp_filter_nohtml_kses( $input['stroke_text'] );
	if ( isset( $input['status_tag_text'] ) && ! empty( $input['status_tag_text'] ) )
	$output['status_tag_text'] = wp_filter_nohtml_kses( $input['status_tag_text'] );
	if ( isset( $input['valves_text'] ) && ! empty( $input['valves_text'] ) )
	$output['valves_text'] = wp_filter_nohtml_kses( $input['valves_text'] );
	if ( isset( $input['fuel_capacity_text'] ) && ! empty( $input['fuel_capacity_text'] ) )
	$output['fuel_capacity_text'] = wp_filter_nohtml_kses( $input['fuel_capacity_text'] );
	if ( isset( $input['wheelbase_text'] ) && ! empty( $input['wheelbase_text'] ) )
	$output['wheelbase_text'] = wp_filter_nohtml_kses( $input['wheelbase_text'] );
	if ( isset( $input['overall_length_text'] ) && ! empty( $input['overall_length_text'] ) )
	$output['overall_length_text'] = wp_filter_nohtml_kses( $input['overall_length_text'] );
	if ( isset( $input['width_text'] ) && ! empty( $input['width_text'] ) )
	$output['width_text'] = wp_filter_nohtml_kses( $input['width_text'] );
	if ( isset( $input['height_text'] ) && ! empty( $input['height_text'] ) )
	$output['height_text'] = wp_filter_nohtml_kses( $input['height_text'] );
	if ( isset( $input['curb_weight_text'] ) && ! empty( $input['curb_weight_text'] ) )
	$output['curb_weight_text'] = wp_filter_nohtml_kses( $input['curb_weight_text'] );
	if ( isset( $input['leg_room_text'] ) && ! empty( $input['leg_room_text'] ) )
	$output['leg_room_text'] = wp_filter_nohtml_kses( $input['leg_room_text'] );
	if ( isset( $input['head_room_text'] ) && ! empty( $input['head_room_text'] ) )
	$output['head_room_text'] = wp_filter_nohtml_kses( $input['head_room_text'] );
	if ( isset( $input['seating_text'] ) && ! empty( $input['seating_text'] ) )
	$output['seating_text'] = wp_filter_nohtml_kses( $input['seating_text'] );
	if ( isset( $input['tires_text'] ) && ! empty( $input['tires_text'] ) )
	$output['tires_text'] = wp_filter_nohtml_kses( $input['tires_text'] );
	if ( isset( $input['transmission_text'] ) && ! empty( $input['transmission_text'] ) )
	$output['transmission_text'] = wp_filter_nohtml_kses( $input['transmission_text'] );
	if ( isset( $input['transmission_1'] ) && ! empty( $input['transmission_1'] ) )
	$output['transmission_1'] = wp_filter_nohtml_kses( $input['transmission_1'] );
	if ( isset( $input['transmission_2'] ) && ! empty( $input['transmission_2'] ) )
	$output['transmission_2'] = wp_filter_nohtml_kses( $input['transmission_2'] );
	if ( isset( $input['transmission_3'] ) && ! empty( $input['transmission_3'] ) )
	$output['transmission_3'] = wp_filter_nohtml_kses( $input['transmission_3'] );
	if ( isset( $input['transmission_4'] ) && ! empty( $input['transmission_4'] ) )
	$output['transmission_4'] = wp_filter_nohtml_kses( $input['transmission_4'] );
	if ( isset( $input['vehicle_type_text'] ) && ! empty( $input['vehicle_type_text'] ) )
	$output['vehicle_type_text'] = wp_filter_nohtml_kses( $input['vehicle_type_text'] );
	if ( isset( $input['vehicle_type_1'] ) && ! empty( $input['vehicle_type_1'] ) )
	$output['vehicle_type_1'] = wp_filter_nohtml_kses( $input['vehicle_type_1'] );
	if ( isset( $input['vehicle_type_2'] ) && ! empty( $input['vehicle_type_2'] ) )
	$output['vehicle_type_2'] = wp_filter_nohtml_kses( $input['vehicle_type_2'] );
	if ( isset( $input['vehicle_type_3'] ) && ! empty( $input['vehicle_type_3'] ) )
	$output['vehicle_type_3'] = wp_filter_nohtml_kses( $input['vehicle_type_3'] );
	if ( isset( $input['vehicle_type_4'] ) && ! empty( $input['vehicle_type_4'] ) )
	$output['vehicle_type_4'] = wp_filter_nohtml_kses( $input['vehicle_type_4'] );
	if ( isset( $input['vehicle_type_5'] ) && ! empty( $input['vehicle_type_5'] ) )
	$output['vehicle_type_5'] = wp_filter_nohtml_kses( $input['vehicle_type_5'] );
	if ( isset( $input['vehicle_type_6'] ) && ! empty( $input['vehicle_type_6'] ) )
	$output['vehicle_type_6'] = wp_filter_nohtml_kses( $input['vehicle_type_6'] );
	if ( isset( $input['vehicle_type_7'] ) && ! empty( $input['vehicle_type_7'] ) )
	$output['vehicle_type_7'] = wp_filter_nohtml_kses( $input['vehicle_type_7'] );
	if ( isset( $input['vehicle_type_8'] ) && ! empty( $input['vehicle_type_8'] ) )
	$output['vehicle_type_8'] = wp_filter_nohtml_kses( $input['vehicle_type_8'] );
	if ( isset( $input['vehicle_type_9'] ) && ! empty( $input['vehicle_type_9'] ) )
	$output['vehicle_type_9'] = wp_filter_nohtml_kses( $input['vehicle_type_9'] );
	if ( isset( $input['vehicle_type_10'] ) && ! empty( $input['vehicle_type_10'] ) )
	$output['vehicle_type_10'] = wp_filter_nohtml_kses( $input['vehicle_type_10'] );
	if ( isset( $input['vehicle_type_11'] ) && ! empty( $input['vehicle_type_11'] ) )
	$output['vehicle_type_11'] = wp_filter_nohtml_kses( $input['vehicle_type_11'] );
	if ( isset( $input['vehicle_type_12'] ) && ! empty( $input['vehicle_type_12'] ) )
	$output['vehicle_type_12'] = wp_filter_nohtml_kses( $input['vehicle_type_12'] );
	return apply_filters( 'my_theme_options_validate', $output, $input );
}
function my_form_options_init() {
	register_setting( 'form_options',  'my_form_options',  'my_form_options_validate' );
	add_settings_section( 'general', '', '__return_false', 'form_options'  );
	add_settings_field( 'paypal_intro', __( 'PayPal Intro Message:', 'language' ), 'my_settings_field_paypal_intro_text_input', 	'form_options', 'general' );
	add_settings_field( 'paypal_email', __( 'PayPal E-mail Account:', 'language' ), 'my_settings_field_paypal_email_text_input', 	'form_options', 'general' );
	add_settings_field( 'paypal_fee', __( 'Listing Price:', 'language' ), 'my_settings_field_paypal_fee_text_input', 	'form_options', 'general' );
	add_settings_field( 'redirection_page', __( 'Redirection Page:', 'language' ), 'my_settings_field_paypal_redirection_text_input', 	'form_options', 'general' );
	add_settings_field( 'success_text', __( 'Success Message:', 'language' ), 'my_settings_field_success_text_input', 	'form_options', 'general' );
	add_settings_field( 'wait_text', __( 'Please Wait Message:', 'language' ), 'my_settings_field_wait_text_input', 	'form_options', 'general' );
	add_settings_field( 'user_exists', __( 'User Already Exists Message:', 'language' ), 'my_settings_field_user_exists_text_input', 	'form_options', 'general' );
}
add_action( 'admin_init', 'my_form_options_init' );
function my_form_page_capability( $capability ) {
	return 'edit_theme_options';
}
add_filter( 'option_page_capability_my_options', 'my_form_page_capability' );

function my_form_options_add_page() {
	$theme_page = add_theme_page(
		__( 'Sell Your Car Setup', 'language' ),  
		__( 'Sell Your Car Setup', 'language' ), 
		'edit_theme_options',         
		'form_options',               
		'my_form_options_render_page' 
	);
}
add_action( 'admin_menu', 'my_form_options_add_page' );
function my_get_form_options() {
	$saved = (array) get_option( 'my_form_options' );
	$defaults = array(
	'paypal_intro'	=> __('Please use the button below to complete your payment.','language'),	
	'paypal_email'	=> 'sales@gorillathemes.com',	
	'paypal_fee'	=> __('0.99','language'),	
	'redirection_page'	=> __('http://www.automaxclean.dev','language'),	
	'success_text'	=> __('Thank you for your submission!','language'),	
	'wait_text'	=> __('Saving... please be patient!','language'),	
	'user_exists'	=> __('This email address is already in use. If you already have an account please log in.','language'),	
	);
	$defaults = apply_filters( 'my_default_form_options', $defaults );
	$options = wp_parse_args( $saved, $defaults );
	$options = array_intersect_key( $options, $defaults );
	return $options;
} 
function my_settings_field_paypal_email_text_input() {
	$options = my_get_form_options();
?>
	<input type="text" name="my_form_options[paypal_email]" id="paypal_email-text-input" value="<?php echo esc_attr( $options['paypal_email'] ); ?>" />	
<?php
}
function my_settings_field_paypal_intro_text_input() {
	$options = my_get_form_options();
	?>
	<input type="text" name="my_form_options[paypal_intro]" id="paypal_intro-text-input" value="<?php echo esc_attr( $options['paypal_intro'] ); ?>" />	
<?php
}	
function my_settings_field_paypal_fee_text_input() {
	$options = my_get_form_options();
?>
	<input type="text" name="my_form_options[paypal_fee]" id="paypal_fee-text-input" value="<?php echo esc_attr( $options['paypal_fee'] ); ?>" />	
	<?php	
}	
function my_settings_field_paypal_redirection_text_input() {
	$options = my_get_form_options();
?>
	<input type="text" name="my_form_options[redirection_page]" id="redirection_page-text-input" value="<?php echo esc_attr( $options['redirection_page'] ); ?>" />
<?php	
}	
function my_settings_field_success_text_input() {
	$options = my_get_form_options();
?>	
	<input type="text" name="my_form_options[success_text]" id="success_text-text-input" value="<?php echo esc_attr( $options['success_text'] ); ?>" />
<?php	
}	
function my_settings_field_wait_text_input() {
	$options = my_get_form_options();
?>	
	<input type="text" name="my_form_options[wait_text]" id="wait_text-text-input" value="<?php echo esc_attr( $options['wait_text'] ); ?>" />	
<?php	
}
function my_settings_field_user_exists_text_input() {
	$options = my_get_form_options();
?>	
	<input type="text" name="my_form_options[user_exists]" id="user_exists-text-input" value="<?php echo esc_attr( $options['user_exists'] ); ?>" />	
<?php	
}
function my_settings_field_thank_you_message_text_input() {
	$options = my_get_form_options();
?>	
	<input type="text" name="my_form_options[thank_you_message]" id="thank_you_message-text-input" value="<?php echo esc_attr( $options['thank_you_message'] ); ?>" />
<?php	
}
function my_form_options_render_page() {
	?>
	<div id="theme-options-wrap" class="widefat">    
    <div id="icon-themes" class="icon32"><br /></div> 
		<?php $theme_name = wp_get_theme(); ?>
		<h2><?php printf( __( '%s Form & PayPal Configuration', 'language' ), $theme_name ); ?></h2>
		<?php settings_errors(); ?> 
		<form method="post" action="options.php">			
			<div class="tabber_container">
			<div class="block">			
				<?php settings_fields( 'form_options' );
				do_settings_sections( 'form_options' ); ?>		</div>
			</div>			
				<?php submit_button();
			?>
		</form>
	</div>
	<?php
}
function my_form_options_validate( $input ) {
	$output = array();
	if ( isset( $input['paypal_intro'] ) && ! empty( $input['paypal_intro'] ) )
	$output['paypal_intro'] = wp_filter_nohtml_kses( $input['paypal_intro'] );
	if ( isset( $input['paypal_email'] ) && ! empty( $input['paypal_email'] ) )
	$output['paypal_email'] = wp_filter_nohtml_kses( $input['paypal_email'] );	
	if ( isset( $input['paypal_fee'] ) && ! empty( $input['paypal_fee'] ) )
	$output['paypal_fee'] = wp_filter_nohtml_kses( $input['paypal_fee'] );		
	if ( isset( $input['redirection_page'] ) && ! empty( $input['redirection_page'] ) )
	$output['redirection_page'] = wp_filter_nohtml_kses( $input['redirection_page'] );		
	if ( isset( $input['wait_text'] ) && ! empty( $input['wait_text'] ) )
	$output['wait_text'] = wp_filter_nohtml_kses( $input['wait_text'] );		
	if ( isset( $input['success_text'] ) && ! empty( $input['success_text'] ) )
	$output['success_text'] = wp_filter_nohtml_kses( $input['success_text'] );
	if ( isset( $input['user_exists'] ) && ! empty( $input['user_exists'] ) )
	$output['user_exists'] = wp_filter_nohtml_kses( $input['user_exists'] );			
	return apply_filters( 'my_form_options_validate', $output, $input );
}
$CarsGallery = get_option('CarsGallery_mode');
if($CarsGallery != 'New'){
$args = array('post_type'=>'gtcd' ,'posts_per_page'=>-1 );
	$myposts = get_posts( $args );
	foreach( $myposts as $post ){
		if ( $images = get_children(array(
			'post_parent' => $post->ID,
			'post_type' => 'attachment',
			'order' => 'ASC',
			'orderby' => 'menu_order',
			'post_mime_type' => 'image',
			)))
		{
			$Gallery = array();
			foreach( $images as $image ) {
				$Gallery[] = $image->ID;
			}
			$Gallery = implode(',',$Gallery);
			if($Gallery!=''){
				update_post_meta($post->ID, 'CarsGallery', $Gallery);
			}
		}
	}
	add_option('CarsGallery_mode', 'New', '', 'yes' );
}		
function implement_ajax_name()
		{
			if ( isset($_POST[ 'main_catid' ]) ) {
				$categories = get_categories('child_of=' . $_POST[ 'main_catid' ] . '&hide_empty=0&taxonomy=makemodel');
				foreach ( $categories as $cat ) {
					$option .= '<option class="level-0" value="' . $cat->name . '" data-value="' . $cat->term_id . '">';
					$option .= $cat->cat_name;
					$option .= ' (' . $cat->category_count . ')';
					$option .= '</option>';
				}
				echo '<option value="" selected="selected" data-value="-1">'. __('Select Model','language').'</option>' . $option;
				die();
			} // end if

		}
		add_action('wp_ajax_name_call' , 'implement_ajax_name');
		add_action('wp_ajax_nopriv_name_call' , 'implement_ajax_name'); //for users that are not logged in.
function implement_ajax_location()
		{
			if ( isset($_POST[ 'main_catid' ]) ) {
				$categories = get_categories('child_of=' . $_POST[ 'main_catid' ] . '&hide_empty=0&taxonomy=location');
				foreach ( $categories as $cat ) {
					$option .= '<option class="level-0" value="' . $cat->name . '" data-value="' . $cat->term_id . '">';
					$option .= $cat->cat_name;
					$option .= '</option>';
				}
				echo '<option value="" selected="selected" data-value="-1">'. __('Select City','language').'</option>' . $option;
				die();
			} // end if

		}
		add_action('wp_ajax_call_location' , 'implement_ajax_location');
		add_action('wp_ajax_nopriv_call_location' , 'implement_ajax_location'); //for users that are not logged in.
function wp_dropdown_categories_custom($args = '')
		{
			$defaults = array(
				'show_option_all' => '' , 'show_option_none' => '' ,
				'orderby' => 'id' , 'order' => 'ASC' ,
				'show_last_update' => 0 , 'show_count' => 0 ,
				'hide_empty' => 1 , 'child_of' => 0 ,
				'exclude' => '' , 'echo' => 1 ,
				'selected' => 0 , 'hierarchical' => 0 ,
				'name' => 'cat' , 'id' => '' ,
				'class' => 'postform' , 'depth' => 0 ,
				'tab_index' => 0 , 'taxonomy' => 'category' ,
				'hide_if_empty' => false
			);

			$defaults[ 'selected' ] = ( is_category() ) ? get_query_var('cat') : 0;
			// Back compat.
			if ( isset($args[ 'type' ]) && 'link' == $args[ 'type' ] ) {
				_deprecated_argument(__FUNCTION__ , '3.0' , '');
				$args[ 'taxonomy' ] = 'link_category';
			}
			$r = wp_parse_args($args , $defaults);

			if ( !isset($r[ 'pad_counts' ]) && $r[ 'show_count' ] && $r[ 'hierarchical' ] ) {
				$r[ 'pad_counts' ] = true;
			}

			$r[ 'include_last_update_time' ] = $r[ 'show_last_update' ];
			extract($r);

			$tab_index_attribute = '';
			if ( ( int ) $tab_index > 0 ) $tab_index_attribute = " tabindex=\"$tab_index\"";

			$categories = get_terms($taxonomy , $r);
			$name = esc_attr($name);
			$class = esc_attr($class);
			$id = $id ? esc_attr($id) : $name;

			if ( !$r[ 'hide_if_empty' ] || !empty($categories) ) $output = "<select name='$name' id='$id' class='$class' $tab_index_attribute>\n";
			else $output = '';

			if ( empty($categories) && !$r[ 'hide_if_empty' ] && !empty($show_option_none) ) {
				$show_option_none = apply_filters('list_cats' , $show_option_none);
				$output .= "\t<option value='' selected='selected' data-value='-1'>$show_option_none</option>\n";
			}

			if ( !empty($categories) ) {

				if ( $show_option_all ) {
					$show_option_all = apply_filters('list_cats' , $show_option_all);
					$selected = ( '0' === strval($r[ 'selected' ]) ) ? " selected='selected'" : '';
					$output .= "\t<option value='0'$selected data-value='0'>$show_option_all</option>\n";
				}

				if ( $show_option_none ) {
					$show_option_none = apply_filters('list_cats' , $show_option_none);
					$selected = ( '-1' === strval($r[ 'selected' ]) ) ? " selected='selected'" : '';
					$output .= "\t<option value='' $selected  data-value='-1'>$show_option_none</option>\n";
				}

				if ( $hierarchical ) $depth = $r[ 'depth' ];  // Walk the full depth.
				else $depth = -1; // Flat.

				$output .= walk_category_dropdown_tree($categories , $depth , $r);
			}
			if ( !$r[ 'hide_if_empty' ] || !empty($categories) ) $output .= "</select>\n";


			$output = apply_filters('wp_dropdown_cats' , $output);

			if ( $echo ) echo $output;

			return $output;

		}
class Walker_CategoryDropdown_Custom extends Walker_CategoryDropdown
        {
            function start_el( &$output, $category, $depth = 0, $args = array(), $id = 0 )
            {
                $pad = str_repeat(' ' , $depth * 3);

                $cat_name = apply_filters('list_cats' , $category->name , $category);
                $output .= "\t<option class=\"level-$depth\" value=\"" . $category->name . "\" data-value=\"" . $category->term_id . "\"";
                if ( $category->term_id == $args[ 'selected' ] ) $output .= ' selected="selected"';
                $output .= '>';
                $output .= $pad . $cat_name;
                if ( $args[ 'show_count' ] ) $output .= '  (' . $category->count . ')';
                if ( array_key_exists('show_last_update', $args) && $args[ 'show_last_update' ] ) {
                    $format = 'Y-m-d';
                    $output .= '  ' . gmdate($format , $category->last_update_timestamp);
                }
                $output .= "</option>\n";

            }

        }
add_filter( 'request', 'mi_request_filter' );
function mi_request_filter( $query_vars ) {
    if( isset( $_GET['s'] ) && empty( $_GET['s'] ) ) {
        $query_vars['s'] = " ";
    }
    return $query_vars;
}
function custom_scripts() {
	$jscriptURL = get_template_directory_uri().'/assets/js/';
	$jURL = get_template_directory_uri().'/assets/';
	$current_protocol = is_ssl() ? 'https' : 'http';
	$themeURL = get_template_directory_uri();
	wp_enqueue_script('cps_jq_hashchange',get_template_directory_uri().'/assets/js/gt-search/jquery.ba-hashchange.min.js', array( 'jquery' ),'', false);
	wp_enqueue_script('cps_jq_search',get_template_directory_uri().'/assets/js/gt-search/search.js', array( 'jquery' ),'', false);
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', $current_protocol . '://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js', false, '1.12.0', true );
	wp_enqueue_script( 'jquery' );
	wp_register_script( 'bootstrap', $jURL. 'bootstrap/js/bootstrap.min.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'bootstrap' );
	wp_register_script( 'validate', ($jscriptURL.'validate/jquery.validate.min.js'), array( 'jquery' ), false, true );
	wp_enqueue_script( 'validate' );		
	wp_register_script( 'selectbox', ($jscriptURL.'selectBox/jquery.selectBox.js'), array( 'jquery' ), false, false );
	wp_enqueue_script( 'selectbox' );
	wp_register_script( 'mThumbnailScroller', ($jscriptURL.'mThumbnailScroller/jquery.mThumbnailScroller.min.js'), array( 'jquery' ), false, true );
	wp_enqueue_script( 'mThumbnailScroller' );
	wp_register_script( 'swipe-js', ($jscriptURL.'swipe/jquery.bcSwipe.min.js'), array( 'jquery' ), false, true );
	wp_enqueue_script( 'swipe-js' );
	wp_register_script( 'bootstrap-tab-collapse', ($jURL.'js/bootstrap-tabcollapse/bootstrap-tabcollapse.js'), array( 'jquery' ), false, true );
	wp_enqueue_script( 'bootstrap-tab-collapse' );
	wp_register_script( 'gt-scripts', ($jURL.'js/gt-scripts/gt-scripts.js'), array( 'jquery' ), false, true );
	wp_enqueue_script( 'gt-scripts' );
	wp_register_script( 'colorbox', $jURL. 'colorbox/jquery.colorbox-min.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'colorbox' );
	wp_enqueue_style( 'automax-css', get_stylesheet_uri() );
	wp_register_style( 'bootstrap-css', $jURL.'bootstrap/css/bootstrap.min.css', false, '' );
	wp_enqueue_style( 'bootstrap-css' );
	wp_register_style( 'bootstrap-theme-css', $jURL.'bootstrap/css/bootstrap-theme.min.css', false, '' );
	wp_enqueue_style( 'bootstrap-theme-css' );
	wp_register_style( 'colorbox-css', $jURL.'colorbox/colorbox.css', false, '' );
	wp_enqueue_style( 'colorbox-css' );
	wp_register_style( 'mThumbnailScroller-css', $themeURL.'/assets/css/mThumbnailScroller/jquery.mThumbnailScroller.css', false, '' );
	wp_enqueue_style( 'mThumbnailScroller-css' );
}
add_action( 'wp_enqueue_scripts', 'custom_scripts' );		

add_theme_support( 'menus' );
	if ( function_exists( 'register_nav_menus' ) ) {
	  	register_nav_menus(
	  		array(
	  		  'header-menu' => 'Header Menu'
	  		)
	  	);
	}
	add_theme_support( 'post-thumbnails' );	
	add_theme_support( 'title-tag' );	
function theme_pagination($pages = ''){
		global $paged;		
		if(empty($paged))$paged = 1;		
		$prev = $paged - 1;							
		$next = $paged + 1;	
		$range = 3; // only change it to show more links
		$showitems = ($range * 2)+1;		
		if($pages == '')
		{	
			global $wp_query;
			$pages = $wp_query->max_num_pages;
			if(!$pages)
			{
				$pages = 1;
			}
		}		
		if(1 != $pages){
			echo "<div id='pagination'>";
			echo ($paged > 2 && $paged > $range+1 && $showitems < $pages)? "<a href='".get_pagenum_link(1)."' class='btn'>&laquo; First</a> ":"";
			echo ($paged > 1 && $showitems < $pages)? "<a href='".get_pagenum_link($prev)."' class='btn'>&laquo; Previous</a> ":"";				
			for ($i=1; $i <= $pages; $i++){
				if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )){
					echo ($paged == $i)? "<a href='".get_pagenum_link($i)."' class='btn current'>".$i."</a> ":"<a href='".get_pagenum_link($i)."' class='btn'>".$i."</a> "; 
				}
			}			
			echo ($paged < $pages && $showitems < $pages) ? "<a href='".get_pagenum_link($next)."' class='btn'>Next &raquo;</a> " :"";
			echo ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) ? "<a href='".get_pagenum_link($pages)."' class='btn'>Last &raquo;</a> ":"";
			echo "</div>";
			}
	}			
function gorilla_img ($post_id,$size) {		
	$saved = get_post_custom_values('CarsGallery', $post_id);
	$saved = explode(',',$saved[0]);
	if ( count($saved)>0){
	 $image = $saved[0];
			$attachmenturl=wp_get_attachment_url($image);
			$attachmentimage= wp_get_attachment_image($image,$size,false,array('class' =>'img-responsive'));
			$bigp = wp_get_attachment_image($image, $size );
				?><?php echo $attachmentimage; ?><?php
		
	} else {
		echo "";
	}
?>
  <?php 
}	
function arrivals_img ($post_id,$size) {			
	$saved = get_post_custom_values('CarsGallery', $post_id);
	$saved = explode(',',$saved[0]);
	if ( count($saved)>0){
	 $image = $saved[0];
			$attachmenturl=wp_get_attachment_url($image);
			$attachmentimage= wp_get_attachment_image($image, $size );
			$bigp = wp_get_attachment_image($image, $size );
				?><?php echo $attachmentimage; ?><?php
		
	} else {
		echo "";
	}
?>
  <?php 
}

function gallery_img ($size) {		
	global $post;
	$tmp_post = $post;			
	$args = array(
   'post_type' => 'attachment',
	'numberposts' => 1,
   'orderby' => 'menu_order',
   'order' => 'ASC',
   'post_parent' => $post->ID
   );
  $attachments = get_posts( $args );
     if ( $attachments ) {
        foreach ( $attachments as $attachment ): setup_postdata($post);      
        $img_title = $attachment->post_title;		
		$img_desc = $attachment->post_excerpt;
		$attachmentlink=wp_get_attachment_url($attachment->ID);
		$imageUrl = wp_get_attachment_image_src( $attachment->ID, $size );
		?>
		<a href ="<?php echo $imageUrl[0];?> "><img src="<?php echo $imageUrl[0]; ?>"/></a>
		<?php endforeach; $post = $tmp_post;
	}
}
function remove_quick_edit( $actions ) {
	unset($actions['inline hide-if-no-js']);
	return $actions;
	}
	add_filter('post_row_actions','remove_quick_edit',10,1);
function cps_show_title(){
	global $CPS_OPTIONS;	
	$i = 0;
	// Taxonomies:
	if( isset($CPS_OPTIONS['taxonomies']) && !empty($CPS_OPTIONS['taxonomies']) ){
		foreach($CPS_OPTIONS['taxonomies'] as $taxonomy){
			if(isset($_GET[$taxonomy]) && trim($_GET[$taxonomy] != '')){
				$separator = $i ? '/': ' ';
				echo $separator . $taxonomy .'-'.$_GET[$taxonomy];
	// echo $separator . $_GET[$taxonomy];
				$i++;
			}
		}
	}
	foreach($CPS_OPTIONS['meta_boxes_vars'] as $meta_boxes){
	foreach($meta_boxes as $metaBox){
			if(isset($_GET[$metaBox['name']]) && trim($_GET[$metaBox['name']]) != ''){
				$separator = $i ? '/': ' ';
				echo $separator. $metaBox['name'] .'-'.  $_GET[$metaBox['name']];
				$i++;
				
			}
		}
	}
}
function get_hierarchical_terms($taxonomy, $parent = 0, $level = 0) 
	{
		$sPadding = '';
		
		for ($i = 0; $i <= $level; $i++) 
		{
			$sPadding .= '&nbsp;';
		}		
		$aTerms = get_terms($taxonomy, 'orderby=name&hide_empty=0&parent=' . (int)$parent);
		if($aTerms)
		{
			$aResults = array();
			foreach($aTerms as $oTerm) 
			{
				
				$oTerm->title = $sPadding . $oTerm->name;
				
				$aResults[] = $oTerm;
				
				$aChildren = get_hierarchical_terms($taxonomy, $oTerm->term_id, ((int)$level)+3);
				
				if ($aChildren) 
				{
					$aResults[] = $aChildren;
				}
			}
			return $aResults;
		}
		
		return false;
	}
function remove_post_custom_fields() {
		remove_meta_box( 'postcustom' , 'gtcd' , 'normal' ); 
		}
		add_action( 'admin_menu' , 'remove_post_custom_fields' );
		function extended_contact_info($user_contactmethods) {  
		$user_contactmethods = array(
		'phone' => __('Phone','language'),
		'skype' => __('Skype','language'),
		'gtalk' => __('Gtalk','language')
		);  
		return $user_contactmethods;
}  
add_filter('user_contactmethods', 'extended_contact_info');
	
function custom_title_text( $title ){
		$screen = get_current_screen();
		if ( 'gtcd' == $screen->post_type ) {
		$title = __('Enter Vehicle Year, Make & Model','language');
		}
		return $title;
}
add_filter( 'enter_title_here', 'custom_title_text' );

function admin_del_options() {
	   global $_wp_admin_css_colors;
	   $_wp_admin_css_colors = 0;
	}
	add_action('admin_head', 'admin_del_options');
	
	remove_filter('pre_user_description', 'wp_filter_kses');
function new_excerpt_more($more) {
		 global $post;
		return '...<a  class="more" href="'. get_permalink($post->ID) . '">'.__('more','language').'</a>';
	}
add_filter('excerpt_more', 'new_excerpt_more');
	
function new_excerpt_length($length) {
		return 34;
	}
add_filter('excerpt_length', 'new_excerpt_length');

function remove_menus () {
		global $current_user;
			 wp_get_current_user();
		     if ($current_user->user_level < 8){
			global $menu;
			$restricted = array(__('Dashboard','language'), __('Links','language'), __('Pages','language'), __('Posts','language'), __('Appearance','language'), __('Tools','language'), __('Users','language'), __('Settings','language'), __('Comments','language'), __('Plugins','language'));
			end ($menu);
			while (prev($menu)){
				$value = explode(' ',$menu[key($menu)][0]);
				if(in_array($value[0] != NULL?$value[0]:"" , $restricted)){unset($menu[key($menu)]);}
		}
	}
}
add_action('admin_menu', 'remove_menus');
function gt_restrict_manage_authors() {
		  if (isset($_GET['post_type']) && post_type_exists($_GET['post_type']) && in_array(strtolower($_GET['post_type']), array('your_custom_post_types', 'here'))) {
			    wp_dropdown_users(array(
					'show_option_all'       => 'Show all Authors',
					'show_option_none'      => false,
					'name'                  => 'author',
					'selected'              => !empty($_GET['author']) ? $_GET['author'] : 0,
					'include_selected'      => false
			    ));
		  }
	}
	add_action('restrict_manage_posts', 'gt_restrict_manage_authors');
function custom_feed_request( $vars ) {
	 if (isset($vars['feed']) && !isset($vars['post_type']))
	  $vars['post_type'] = array( 'post', 'gtcd' );
	 return $vars;
	}
	add_filter( 'request', 'custom_feed_request' );
function prefix_filter_gettext( $translated, $original, $domain ) {
    $strings = array(
        'View all posts filed under %s' => 'See all articles filed under %s',
        'Howdy, %1$s' => 'Greetings, %1$s!',
     
    );
    if ( isset( $strings[$original] ) ) {
        $translations = get_translations_for_domain( $domain );
        $translated = $translations->translate( $strings[$original] );
    }
 
    return $translated;
}
add_filter( 'gettext', 'prefix_filter_gettext', 10, 3 );
add_action('admin_init','my_init_method');
add_action( 'add_meta_boxes', 'video_meta_box_add' );	

function video_meta_box_add(){
	add_meta_box( 'video-meta-box-id', 'YouTube & Vimeo Video', 'video_meta_box_cb', 'gtcd', 'side', 'core' );
}	
function video_meta_box_cb( $post ){
		$values = get_post_custom( $post->ID );
		$videoid = isset( $values['video_meta_box_videoid'] ) ? esc_attr( $values['video_meta_box_videoid'][0] ) : '';
		$source = isset( $values['video_meta_box_source'] ) ? esc_attr( $values['video_meta_box_source'][0] ) : '';
		wp_nonce_field( 'video_meta_box_nonce', 'meta_box_nonce' );
		?>
		<p>
			<label for="video_meta_box_videoid"><?php _e('Video ID','language')?></label>
			<input type="text" name="video_meta_box_videoid" id="video_meta_box_videoid" value="<?php echo $videoid; ?>" />
		</p>		
		<p>
			<label for="video_meta_box_source"><?php _e('Video Source','language')?></label>
			<select name="video_meta_box_source" id="video_meta_box_source">
				<option value="youtube" <?php selected( $source, 'youtube' ); ?>><?php _e('YouTube','language')?></option>
				<option value="vimeo" <?php selected( $source, 'vimeo' ); ?>><?php _e('Vimeo','language')?></option>
			</select>
		</p>		
		<?php	
	}	
add_action( 'save_post', 'video_meta_box_save' );	
function video_meta_box_save( $post_id ){
	if( isset( $_POST['video_meta_box_videoid'] ) )
	update_post_meta( $post_id, 'video_meta_box_videoid', wp_kses( $_POST['video_meta_box_videoid'], $allowed ) );	
	if( isset( $_POST['video_meta_box_source'] ) )
	update_post_meta( $post_id, 'video_meta_box_source', esc_attr( $_POST['video_meta_box_source'] ) );	
} 
function my_query_post_type($query) {
    if ( is_category() && false == $query->query_vars['suppress_filters'] )
    $query->set( 'post_type', array( 'post', 'gtcd', ) );
    return $query;
}
add_filter('pre_get_posts', 'my_query_post_type');
add_action( 'restrict_manage_posts', 'my_restrict_manage_posts' );
function my_restrict_manage_posts(){
    // only display these taxonomy filters on desired custom post_type listings
    global $typenow;
    if ($typenow == 'gtcd')
   {
      $filters = get_taxonomies();
   
        foreach ($filters as $tax_slug)
      {
         //creates drop down menu only for makemodel and features
         if($tax_slug == 'makemodel')
         {
            // retrieve the taxonomy object
            $tax_obj = get_taxonomy($tax_slug);
            $tax_name = $tax_obj->labels->name;
            // retrieve array of term objects per taxonomy
            $terms = get_terms($tax_slug, array( 'parent' => 0 ) );
            
   
            // output html for taxonomy dropdown filter
            echo "<select name='$tax_slug' id='$tax_slug' class='postform'>";
            echo "<option value=''>View  $tax_name</option>";
            foreach ($terms as $term)
            {
               // output each select option line, check against the last $_GET to show the current option selected
               echo '<option value='. $term->slug, $_GET[$tax_slug] == $term->slug ? ' selected="selected"' : '','>' . $term->name .' (' . $term->count .')</option>';
            }
            echo "</select>";
         }//end if
      }//end foreach
      
    }//end if
   
}//end function
add_action('admin_head', 'edmunds_javascript');
function edmunds_javascript() {
?>
<script type="text/javascript" > 
jQuery(document).ready(function(){
// 	jQuery("[name='stock']").val( jQuery("#post_ID").val() );
});
var lastVin = "";
function get_api_data(){
		if (jQuery("#VIN_Code").val()==''){
			jQuery("#API_message").html('<div class="error"><p>Please type a VIN code first!</p></div>').show();
			jQuery(".ed_img").hide();
			return;
		}
		if (jQuery("#VIN_Code").val().length != 17){
			jQuery("#API_message").html('<div class="error"><p>Please type a correct VIN code first!</p></div>').show();
			return;
		}
		jQuery('#API_message').hide();		
		jQuery("#poststuff :input").attr("disabled", true);
		jQuery("#MyLoading").show();
		jQuery("#GetData").hide();
		var newVin = jQuery("#VIN_Code").val();
		jQuery.ajax({
				type: "POST",
				data: {
					action : 'rw_api_data', 
					vin :  newVin ,  
					style : ( lastVin === newVin ?  jQuery("#VIN_Styles").val() : "" ),
					ID : jQuery("#post_ID").val()
				},
				dataType : "json",
				url: ajaxurl,				
				success: function(response){
					lastVin = newVin;
					jQuery("#poststuff :input").attr("disabled", false);
					jQuery("#VIN_Styles").empty().hide();
					if( response.error ){
						if( response.error_message ){
							alert( response.error_message );
						}
						else {
							jQuery("#VIN_Styles").html( response.styles ).show();
						}
					}
					else {
						jQuery.each(response.elements, function(key, element) {
							if (key != 'makemodel-all' && key !== "makemodelchecklist" && key !== "makemodelchecklist-pop" ){				
								if ( key === 'post_title' ){
									jQuery('[name="post_title"]').val(element)
									jQuery("#title-prompt-text").hide();
								} else if (jQuery('[name="post_title"]').val() == ''){
									jQuery('[name="' + key + '"],#'+key).val(element);	
								}
							}else{
								jQuery('#' + key ).empty().html(element)
							}
						});
						jQuery(".tagchecklist").empty();
						jQuery("#tax-input-features").val("");
						jQuery("#new-tag-features").val( response["tags"]  ).siblings(".button").trigger("click");
						jQuery("#VIN_Code").val('');	
					}
					jQuery("#MyLoading").hide();					
					jQuery("#GetData").show();
				},
				error : function(){
					jQuery("#MyLoading").hide();					
					jQuery("#GetData").show();
				}
			});					
}
function messagebox(txt){
	jQuery("#messageBox").removeClass().addClass("confirmbox").html(txt).fadeIn(1000).fadeOut(1000);
}
function alertbox(txt){
	jQuery("#messageBox").removeClass().addClass("errorbox").html(txt).fadeIn(1000).fadeOut(1000);
}
// Delete image
function deletePost(id){
	var post_id = jQuery('#post_ID').val();		
    jQuery.ajax({
      url: ajaxurl,
      type: "post",
      data: ({action : 'rw_delete_file',postid: post_id, image_id: id, nonce: "<?php echo wp_create_nonce("DelGalImage");?>"}),
      success: function(data){
		  if (data=='0'){
			 messagebox('Image has been removed!');
			jQuery("#item_"+id).remove();

			var str = jQuery('#tgm-new-media-image').val();
			var exploded = str.split(',');
			jQuery.each(exploded, function (key, value) {
				if(value==id){
					exploded.splice(key,1)
				}
			});
			jQuery('#tgm-new-media-image').val(exploded.join(','));

		  }else{
			 alertbox('Image removal failed!');
		  } 
      },
      error:function(){
			 alertbox('Connection failed. please try again later!');
      }   
	});
}
function update_gallery(){
	jQuery('#rw-images-').empty();	
	var IDs = jQuery('#tgm-new-media-image').val();
	var id = jQuery('#post_ID').val();	
    jQuery.ajax({
      url: ajaxurl,
      type: "post",
      data: ({action : 'rw_save_gallery',post_id: id, Gallery_IDs: IDs, nonce: "<?php echo wp_create_nonce("AddGalImage");?>"}),
      success: function(data){
			messagebox("Gallery updated!");
			jQuery('#rw-images-').append(data);
      },
      error:function(){
			 alertbox('Connection failed. Gallery update didn\'t completed!');
      }   
	});
}	
jQuery(document).ready(function($) {
	// reorder images
	$('.rw-images').each(function(){
		var $this = $(this),
			order, data;
		$this.sortable({
			placeholder: 'ui-state-highlight',
			update: function (){
				order = $this.sortable('serialize');
				data = order + '|' + $('.rw-images-data').val();			
				$.post(ajaxurl, {action: 'rw_reorder_images', data: data}, function(response){																					
					if (response == '0'){
						messagebox("Images have been reordered");
					}else{
						alertbox("You don't have permission to reorder images.");
					}
				});
			}
		});
	});

});
</script>
<?php
}
add_action( 'save_post', 'save_mademodel_meta');
function save_mademodel_meta(){
	if (isset($_POST['Vehicle_Make']) AND isset($_POST['Vehicle_model'])){
		$ID = $_POST['ID'];	
		$term = term_exists($_POST['Vehicle_Make'], 'makemodel');	
		if ($term !== 0 && $term !== null) {
			$Vehicle_Make_Id = intval($term['term_id']);
		}else{
			$term = wp_insert_term(
			  $_POST['Vehicle_Make'], // the term 
			  'makemodel', // the taxonomy
			  array(
				'parent'=> 0
			  )
			  );
			$Vehicle_Make_Id = $term['term_id'];
		}
		$term = term_exists($_POST['Vehicle_model'], 'makemodel');
		if ($term !== 0 && $term !== null) {
			$Vehicle_model_Id = intval($term['term_id']);
		}else{
			$term = wp_insert_term(
			  $_POST['Vehicle_model'], // the term 
			  'makemodel', // the taxonomy
			  array(
				'parent'=> $Vehicle_Make_Id
			  )
			  );
			$Vehicle_model_Id = $term['term_id'];
		}
		force_flush_term_cache('makemodel');
		$cat_ids = array($Vehicle_Make_Id,$Vehicle_model_Id);
		wp_set_object_terms($ID, $cat_ids, 'makemodel');
	}
}
function force_flush_term_cache( $taxonomy = 'category' ) {
	if ( !taxonomy_exists( $taxonomy ) ) return FALSE;
	wp_cache_set( 'last_changed', time( ) - 1800, 'terms' );
	wp_cache_delete( 'all_ids', $taxonomy );
	wp_cache_delete( 'get', $taxonomy );
	delete_option( "{$taxonomy}_children" );
	_get_term_hierarchy( $taxonomy );
	return TRUE;
}
function get_PostViews($post_ID){
    $count_key = 'post_views_count';
    $count = get_post_meta($post_ID, $count_key, true);
    return $count;
}
function post_column_views($newcolumn){
    $newcolumn['post_views'] = __('Views','language');
    return $newcolumn;
}
function post_custom_column_views($column_name, $id){
     
    if($column_name === 'post_views'){
        echo '<p style="padding-top:20px"><strong>'.get_PostViews(get_the_ID()).' '.__('Views','language').'</strong></p>';
    }
}
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
add_filter('manage_gtcd_posts_columns', 'post_column_views');
add_action('manage_gtcd_posts_custom_column', 'post_custom_column_views',10,2);
require_once 'assets/sell-your-car/init.php';
function amgenna_change_grunion_success_message( $msg ) {
	global $contact_form_message;
	return '<h3>' . __('Thank you for contacting us.</br></br>
We have received your enquiry and will respond to you within 24 hours.','language') . '</h3>' . wp_kses($contact_form_message, array('br' => array(), 'blockquote' => array()));;
}
add_filter( 'grunion_contact_form_success_message', 'amgenna_change_grunion_success_message' );
/*
add_action( 'show_user_profile', 'add_extra_social_links' );
add_action( 'edit_user_profile', 'add_extra_social_links' );
function add_extra_social_links( $user )
{
    ?>
        <h3>New User Profile Links</h3>

        <table class="form-table">
            <tr>
                <th><label for="facebook_profile"><?php _e('Facebook Profile','language');?></label></th>
                <td><input type="text" name="facebook_profile" value="<?php echo esc_attr(get_the_author_meta( 'facebook_profile', $user->ID )); ?>" class="regular-text" /></td>
            </tr>
            <tr>
                <th><label for="twitter_profile"><?php _e('Twitter Profile','language');?></label></th>
                <td><input type="text" name="twitter_profile" value="<?php echo esc_attr(get_the_author_meta( 'twitter_profile', $user->ID )); ?>" class="regular-text" /></td>
            </tr>
            <tr>
                <th><label for="google_profile"><?php _e('Google+ Profile','language');?></label></th>
                <td><input type="text" name="google_profile" value="<?php echo esc_attr(get_the_author_meta( 'google_profile', $user->ID )); ?>" class="regular-text" /></td>
            </tr>
            <tr>
                <th><label for="google_profile"><?php _e('Pinterest Profile','language');?></label></th>
                <td><input type="text" name="pinterest_profile" value="<?php echo esc_attr(get_the_author_meta( 'pinterest_profile', $user->ID )); ?>" class="regular-text" /></td>
            </tr>
        </table>
    <?php
}
add_action( 'personal_options_update', 'save_extra_social_links' );
add_action( 'edit_user_profile_update', 'save_extra_social_links' );
function save_extra_social_links( $user_id )
{
    update_user_meta( $user_id,'facebook_profile', sanitize_text_field( $_POST['facebook_profile'] ) );
    update_user_meta( $user_id,'twitter_profile', sanitize_text_field( $_POST['twitter_profile'] ) );
    update_user_meta( $user_id,'google_profile', sanitize_text_field( $_POST['google_profile'] ) );
    update_user_meta( $user_id,'pinterest_profile', sanitize_text_field( $_POST['pinterest_profile'] ) );
}
*/
function my_social_sharing_buttons($content) {
	if(is_singular() || is_home()){	
		global $post;
		$myURL = get_permalink();
		$myTitle = str_replace( ' ', '%20', get_the_title());
		$myThumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
		$twitterURL = 'https://twitter.com/intent/tweet?text='.$myTitle.'&amp;url='.$myURL.'&amp;';
		$facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$myURL;
		$googleURL = 'https://plus.google.com/share?url='.$myURL;
		$pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$myURL.'&amp;media='.$myThumbnail[0].'&amp;description='.$myTitle;
		$content .= '<div class="my-social col-sm-12">';
		$content .= '<div class="col-xs-4 col-sm-12 col-md-4">';
		$content .= '<div class="my-twitter">';
		$content .= '<a class="my-link" href="'. $twitterURL .'" target="_blank">Twitter</a>';
		$content .= '</div>';
		$content .= '</div>';
		$content .= '<div class="col-xs-4 col-sm-12 col-md-4">';
		$content .= '<div class="my-facebook">';
		$content .= '<a class="my-link" href="'.$facebookURL.'" target="_blank">Facebook</a>';
		$content .= '</div>';
		$content .= '</div>';
		$content .= '<div class="col-xs-4 col-sm-12 col-md-4">';
		$content .= '<div class="my-googleplus">';
		$content .= '<a class="my-link" href="'.$googleURL.'" target="_blank">Google+</a>';
		$content .= '</div>';
		$content .= '</div>';
		$content .= '</div>';
		return $content;
		}else{
		return $content;
	}
};
 add_shortcode('socialbuttons', 'my_social_sharing_buttons');
if (is_single() || is_category() || is_tag() || is_search()) { ?>
    <script type="text/javascript">
        jQuery("li.current_page_parent").addClass('current-menu-item');
    </script>
<?php }
 function pagination_nav() {
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}
	$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
	$pagenum_link = html_entity_decode( get_pagenum_link() );
	$query_args   = array();
	$url_parts    = explode( '?', $pagenum_link );
	if ( isset( $url_parts[1] ) ) {
		wp_parse_str( $url_parts[1], $query_args );
	}
	$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
	$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';
	$format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
	$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';
	$links = paginate_links( array(
		'base'     => $pagenum_link,
		'format'   => $format,
		'total'    => $GLOBALS['wp_query']->max_num_pages,
		'current'  => $paged,
		'mid_size' => 1,
		'add_args' => array_map( 'urlencode', $query_args ),
		'prev_text' => __( 'Previous', 'language' ),
		'next_text' => __( 'Next', 'language' ),
	) );
	if ( $links ) : echo $links; endif;
}


  add_action('nav_menu_css_class', 'add_current_nav_class', 10, 2 );
	
	function add_current_nav_class($classes, $item) {
		
		// Getting the current post details
		global $post;
		
		// Getting the post type of the current post
		$current_post_type = get_post_type_object(get_post_type($post->ID));
		$current_post_type_slug = $current_post_type->rewrite[slug];
			
		// Getting the URL of the menu item
		$menu_slug = strtolower(trim($item->url));
		
		// If the menu item URL contains the current post types slug add the current-menu-item class
		if (strpos($menu_slug,$current_post_type_slug) !== false) {
		
		   $classes[] = 'active';
		
		}
		
		// Return the corrected set of classes to be added to the menu item
		return $classes;
	
	}
//    remove_theme_mods();
set_post_thumbnail_size( 896, 436, true );
add_image_size('large', get_option( 'large_size_w' ), get_option( 'large_size_h' ), true );
add_image_size('medium', get_option( 'medium_size_w' ), get_option( 'medium_size_h' ), true );
add_image_size('thumbnail', get_option( 'thumbnail_size_w' ), get_option( 'thumbnail_size_h' ), true );      
function posts_for_current_author($query) {
	global $user_level;
	if($query->is_admin && $user_level < 5) {
		global $user_ID;
		$query->set('author',  $user_ID);
		unset($user_ID);
	}
	unset($user_level);

	return $query;
}
add_filter('pre_get_posts', 'posts_for_current_author');
require_once(AUTODEALER_INCLUDES.'/customizer/editor.php');
