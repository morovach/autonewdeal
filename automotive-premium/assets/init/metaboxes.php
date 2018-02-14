<?php
$mod1 = "mod1";
$options = my_get_theme_options();
$meta_boxes = array(
  	"statustag" => array(
	  "name" => "statustag", 
	  "title" => $options['status_tag_text'], 
	  "description" => __('Enter vehicle condition.','language'),
	  "type" => "text",
	  "class" => "text",
	  "rows" => "",
	  "width" => "",
	  "hide_in_search" => 'on',
	  "options" => '',

	), 
"featured" => array(
	  "name" => "featured",   
	  "title" => $options['featured_text'],
	  "description" => __('If yes this Vehicle will show up on the home page featured module.','language'),
	  "type" => "dropdown",	
	  "class" => 'dropdown',
	  "hide_in_search" => 'on',
	  "options" => array("1" => __('No','language'), "2" => __('Yes','language'),)
		), 
"topdeal" => array(
	  "name" => "topdeal",   
	  "title" => $options['top_deal_text'],
	  "description" => __('If yes this Vehicle will show up on the Top Deals Widget.','language'),
	  "type" => "dropdown",	
	  "class" => 'dropdown',
	  "hide_in_search" => 'on',
	  "options" => array("1" => __('No','language'), "2" => __('Yes','language'),)
		), 
 "year" => array(
	  "name" => "year",   
	  "title" => $options['year_text'], 
	  "description" => __('Enter vehicle year.','language'),
	  "type" => "dropdown",
	  "class" => "dropdown",
	  "rows" => "",
	  "hide_in_search" => $options['year_hide'],
	  "width" => "",
	  "options" => generate_years( $options['year_start_text'], date('Y', strtotime('+1 years'))
	  )),
"price" => array(
	  "name" => "price", 
  	  "title" => $options['price_text'], 
	  "description" => __('Enter the full vehicle price without commas or dots.','language'),
	  "type" => "range",
	  "class" => "range",
	  "rows" => "",
      "width" => "",
	  "hide_in_search" => $options['price_hide'],
	  "options" => ""
		), 	 
"miles" => array(
	  "name" => "miles",   
	  "title" => $options['miles_text'],  
	  "description" => __('Enter vehicle mileage.','language'),
	  "type" => "text",
	  "class" => "text",
	  "rows" => "",
	  "width" => "",
	   "hide_in_search" => 'on',
	  "options" => "miles"	  
	),  
"vehicletype" => array(
	  "name" => "vehicletype",   
	  "title" => $options['vehicle_type_text'],  
	  "description" => __('Enter the Vehicle Type.','language'),
	  "type" => "dropdown",
	  "class" => "dropdown",
	  "rows" => "",
	  "width" => "",
	  "hide_in_search" => $options['vehicle_type_hide'],
	  "options" => array("1" => $options["vehicle_type_1"] ,
                         "2" => $options["vehicle_type_2"] ,
                         "3" => $options["vehicle_type_3"] ,
                         "4" => $options["vehicle_type_4"] ,
                         "5" => $options["vehicle_type_5"] ,
                         "6" => $options["vehicle_type_6"] ,
                         "7" => $options["vehicle_type_7"] ,
                         "8" => $options["vehicle_type_8"] ,
                         "9" => $options["vehicle_type_9"] ,
                         "10" => $options["vehicle_type_10"] ,
					 )
	),  
"stock" => array(
	  "name" => "stock", 
	  "title" => $options['stock_text'], 
	  "description" => __('Enter vehicle stock number.','language'),
	  "type" => "text",
	  "class" => "dropdown",
	  "rows" => "",
	  "width" => "",
	  "hide_in_search" => 'on',
	  "options" => ""
	), 
"transmission" => array(
	  "name" => "transmission", 
	  "title" => $options['transmission_text'],
	  "description" => __('Enter vehicle transmission type.','language'),
	  "type" => "dropdown",
	  "class" => "dropdown",
	  "rows" => "",
	  "hide_in_search" => 'on',
	  "width" => "",
	  	  "options" => array("1" => $options['transmission_1'],  
	  					 	 "2" => $options['transmission_2'],
	  					 	 "3" => $options['transmission_3'],
	  					 	 "4" => $options['transmission_4'],
	 	  					 )
	),
"exterior" => array(
	  "name" => "exterior", 
	  "title" => $options['exterior_text'],
	  "description" => __('Enter vehicle exterior color.','language'),
	  "type" => "text",
	  "class" => "text",
	  "rows" => "",
	  "hide_in_search" => 'on',
	  "width" => "",
	  "options" => ""
	), 
"interior" => array(
	  "name" => "interior", 
	  "title" => $options['interior_text'],
	  "description" =>  __('Enter vehicle interior color.','language'),
	  "type" => "text",
	  "class" => "text",
	  "rows" => "",
	  "hide_in_search" => 'on',
	  "width" => "",
	  "options" => ""
	),
"EngineHP" => array(
	  "name" => "EngineHP", 
	  "title" => "Engine HP",
	  "description" =>  __('Enter Engine HP.','language'),
	  "type" => "text",
	  "class" => "text",
	  "rows" => "",
	  "hide_in_search" => "on",
	  "width" => "",
	  "options" => ""
	),	
		 );
?>
<?php	
 $mod2 = "mod2";
$options = my_get_theme_options();
$feat_boxes = array(
"AdaptiveCruiseControl" => array(
	  "name" => "AdaptiveCruiseControl", 
	  "title" => "Cruise Control",
	  "description" => __('Enter vehicle cruise control.','language'),
	  "type" => "text",
	  "class" => "text",
	  "rows" => "",
	  "hide_in_search" => 'on',
	  "width" => "",
	  "options" => ""
	),
"AirBagLocCurtain" => array(
	  "name" => "AirBagLocCurtain", 
	  "title" => "AirBag Curtain",
	  "description" =>  __('Enter AirBag Curtain.','language'),
	  "type" => "text",
	  "class" => "text",
	  "rows" => "",
	  "hide_in_search" => "on",
	  "width" => "",
	  "options" => ""
	),
"AirBagLocFront" => array(
	  "name" => "AirBagLocFront", 
	  "title" => "AirBag Front",
	  "description" =>  __('Enter AirBag Front.','language'),
	  "type" => "text",
	  "class" => "text",
	  "rows" => "",
	  "hide_in_search" => "on",
	  "width" => "",
	  "options" => ""
	),
"AirBagLocSide" => array(
	  "name" => "AirBagLocSide", 
	  "title" => "AirBag Side",
	  "description" =>  __('Enter AirBag Side.','language'),
	  "type" => "text",
	  "class" => "text",
	  "rows" => "",
	  "hide_in_search" => "on",
	  "width" => "",
	  "options" => ""
	),
"BodyClass" => array(
	  "name" => "BodyClass", 
	  "title" => "Body",
	  "description" =>  __('Enter Body.','language'),
	  "type" => "text",
	  "class" => "text",
	  "rows" => "",
	  "hide_in_search" => "on",
	  "width" => "",
	  "options" => ""
	),
"BrakeSystemDesc" => array(
	  "name" => "BrakeSystemDesc", 
	  "title" => "Brake System",
	  "description" =>  __('Enter Brake System.','language'),
	  "type" => "text",
	  "class" => "text",
	  "rows" => "",
	  "hide_in_search" => "on",
	  "width" => "",
	  "options" => ""
	),
"BrakeSystemType" => array(
	  "name" => "BrakeSystemType", 
	  "title" => "Brake System Type",
	  "description" =>  __('Enter Brake System Type.','language'),
	  "type" => "text",
	  "class" => "text",
	  "rows" => "",
	  "hide_in_search" => "on",
	  "width" => "",
	  "options" => ""
	),
"CurbWeightLB" => array(
	  "name" => "CurbWeightLB", 
	  "title" => "Curb Weight",
	  "description" =>  __('Enter Curb Weight.','language'),
	  "type" => "text",
	  "class" => "text",
	  "rows" => "",
	  "hide_in_search" => "on",
	  "width" => "",
	  "options" => ""
	),
"Doors" => array(
	  "name" => "Doors", 
	  "title" => "Doors",
	  "description" =>  __('Enter Doors.','language'),
	  "type" => "text",
	  "class" => "text",
	  "rows" => "",
	  "hide_in_search" => "on",
	  "width" => "",
	  "options" => ""
	),
"DriveType" => array(
	  "name" => "DriveType", 
	  "title" => "Drive Type",
	  "description" =>  __('Enter Drive Type.','language'),
	  "type" => "text",
	  "class" => "text",
	  "rows" => "",
	  "hide_in_search" => "on",
	  "width" => "",
	  "options" => ""
	),

"EngineCycles" => array(
	  "name" => "EngineCycles", 
	  "title" => "Engine Cycles",
	  "description" =>  __('Enter Engine Cycles.','language'),
	  "type" => "text",
	  "class" => "text",
	  "rows" => "",
	  "hide_in_search" => "on",
	  "width" => "",
	  "options" => ""
	),
"EngineCylinders" => array(
	  "name" => "EngineCylinders", 
	  "title" => "Cylinders",
	  "description" =>  __('Enter Engine Cylinders.','language'),
	  "type" => "text",
	  "class" => "text",
	  "rows" => "",
	  "hide_in_search" => "on",
	  "width" => "",
	  "options" => ""
	),
"EngineModel" => array(
	  "name" => "EngineModel", 
	  "name" => "EngineModel", 
	  "title" => "Engine Model",
	  "description" =>  __('Enter EngineModel.','language'),
	  "type" => "text",
	  "class" => "text",
	  "rows" => "",
	  "hide_in_search" => "on",
	  "width" => "",
	  "options" => ""
	),
"EntertainmentSystem" => array(
	  "name" => "EntertainmentSystem", 
	  "title" => "Entertainment System",
	  "description" =>  __('Enter Entertainment System.','language'),
	  "type" => "text",
	  "class" => "text",
	  "rows" => "",
	  "hide_in_search" => "on",
	  "width" => "",
	  "options" => ""
	),
"EquipmentType" => array(
	  "name" => "EquipmentType", 
	  "title" => "Equipment Type",
	  "description" =>  __('Enter Equipment Type.','language'),
	  "type" => "text",
	  "class" => "text",
	  "rows" => "",
	  "hide_in_search" => "on",
	  "width" => "",
	  "options" => ""
	),
"FuelTypePrimary" => array(
	  "name" => "FuelTypePrimary", 
	  "title" => "Fuel Type Primary",
	  "description" =>  __('Enter Fuel Type Primary.','language'),
	  "type" => "text",
	  "class" => "text",
	  "rows" => "",
	  "hide_in_search" => "on",
	  "width" => "",
	  "options" => ""
	),
"Manufacturer" => array(
	  "name" => "Manufacturer", 
	  "title" => "Manufacturer",
	  "description" =>  __('Enter Manufacturer.','language'),
	  "type" => "text",
	  "class" => "text",
	  "rows" => "",
	  "hide_in_search" => "on",
	  "width" => "",
	  "options" => ""
	),
"RearVisibilityCamera" => array(
	  "name" => "RearVisibilityCamera", 
	  "title" => "Rear Visibility Camera",
	  "description" =>  __('Enter Rear Visibility Camera.','language'),
	  "type" => "text",
	  "class" => "text",
	  "rows" => "",
	  "hide_in_search" => "on",
	  "width" => "",
	  "options" => ""
	),
"SeatBeltsAll" => array(
	  "name" => "SeatBeltsAll", 
	  "title" => "Seat Belts",
	  "description" =>  __('Enter Seat Belts.','language'),
	  "type" => "text",
	  "class" => "text",
	  "rows" => "",
	  "hide_in_search" => "on",
	  "width" => "",
	  "options" => ""
	),
"Seats" => array(
	  "name" => "Seats", 
	  "title" => "Seats",
	  "description" =>  __('Enter Seats.','language'),
	  "type" => "text",
	  "class" => "text",
	  "rows" => "",
	  "hide_in_search" => "on",
	  "width" => "",
	  "options" => ""
	),
"Trim" => array(
	  "name" => "Trim", 
	  "title" => "Trim",
	  "description" =>  __('Enter Trim.','language'),
	  "type" => "text",
	  "class" => "text",
	  "rows" => "",
	  "hide_in_search" => "on",
	  "width" => "",
	  "options" => ""
	),
"VIN" => array(
	  "name" => "VIN", 
	  "title" => "VIN",
	  "description" =>  __('Enter VIN.','language'),
	  "type" => "text",
	  "class" => "text",
	  "rows" => "",
	  "hide_in_search" => "on",
	  "width" => "",
	  "options" => ""
	),
"Windows" => array(
	  "name" => "Windows", 
	  "title" => "Windows",
	  "description" =>  __('Enter Windows.','language'),
	  "type" => "text",
	  "class" => "text",
	  "rows" => "",
	  "hide_in_search" => "on",
	  "width" => "",
	  "options" => ""
	),
);
?>
<?php
$mod3 = "mod3";
$options = my_get_theme_options();
$comment_boxes = array(
  	"comment_area" => array(
	  "name" => "comment_area", 
	  "title" => $options['description_text'],  
	  "description" => "",
	  "type" => "textarea",
	  "class" => "textarea",
	  "hide_in_search" => 'on',
	  "rows" => "20%",
	  "width" => "80%",
	  "height" => "30%",
	  "options" => ""),
);

$feat = "feat1";
$options = my_get_theme_options();
$featured_post = array(
	  "featured" => array(
	  "name" => "featured",   
	  "title" => $options['featured_text'],
	  "description" => __('If YES selected the image of this post will be displayed in the home slideshow.','language'),
	  "type" => "dropdown",	
	  "class" => 'dropdown',
	  "hide_in_search" => 'on',
	  "options" => array("1" => __('No','language'), "2" => __('Yes','language')),
		));

?>
<?php	  
function create_meta_box() {
global $mod1, $mod3, $mod2, $feat, $meta_box, $page;
if( function_exists( 'add_meta_box' ) ) {
add_meta_box($meta_box['id'], $meta_box['title'], 'show', $page, $meta_box['context'], $meta_box['priority']);
add_meta_box( 'new-meta-box1',  __('Vehicle Information','language'), 'display_meta_box', 'gtcd', 'normal', 'core' );
add_meta_box( 'new-meta-box2',  __('Vehicle Specifications','language'), 'display_specifications_box', 'gtcd', 'normal', 'core' );
add_meta_box( 'feat-meta-box',  __('Featured Post','language'), 'display_feat_meta_box', 'post', 'side', 'core' );
}
}

function display_feat_meta_box() {
  global $post,$wpdb, $featured_post, $feat;
?>
<div class="form-wrap">
<?php
//wp_nonce_field( plugin_basename( __FILE__ ), $mod1 . '_wpnonce', false, true );

$output = '';
foreach($featured_post as $feat_post) { 

    $data = get_post_meta($post->ID, $feat, true);  
	$output .= '<div style="font-size:12px;color:#666;font-weight:normal;padding:20p 0x;"><br/>'.$feat_post['description'] .'</div><p style="border-bottom:1px solid #f1f1f1;padding-bottom:3px;"><div style="width:80px;padding:6px 0 20px 5px;font-size:12px;color:#252525; font-style:normal;font-weight:bold;float: left;">' . $feat_post['title'] . ':</div>' . "\n"; 
	 if(($feat_post['type'] == 'dropdown') && (!empty($feat_post['options']))) { // dropdown lists    
    
    $output .= '<select name="' . $feat_post['name'] . '">' . "\n";
    
    if (isset($data[$feat_post['name']])) {
        $output .= '<option selected>'. $data[$feat_post['name']] .'</option>' . "\n";	
    }     
		
    foreach($feat_post['options'] as $dropdown_key => $dropdown_value) {
        $output .= '<option value="' . $dropdown_value . '">' . $dropdown_value . '</option>' . "\n";
    }        
    $output .= '</select>' . "\n";		  	
  }
  $output .= '</p>' ;  
  }   
  echo '<div>' . "\n" . $output . "\n" . '</div></div><br/>' . "\n\n";
}
?>
<?php
function display_meta_box() {
  global $post,$wpdb, $meta_boxes, $mod1;
?>
<div class="form-wrap">
<?php
//wp_nonce_field( plugin_basename( __FILE__ ), $mod1 . '_wpnonce', false, true );

$output = '';
foreach($meta_boxes as $meta_box) { 

    $data = get_post_meta($post->ID, $mod1, true);  
	$output .= '<p style="border-bottom:1px solid #f1f1f1;padding-bottom:3px;"><div style="width:130px;padding:6px 0 0 5px;font-size:12px;color:#252525; font-style:normal;font-weight:bold;float: left;">' . $meta_box['title'] . ':&nbsp; </div>' . "\n"; 
	if($meta_box['type'] == 'text' || $meta_box['type'] == 'range') { // plain text input
      $output .= '<input 4type="text" name="' . $meta_box['name'] . '" value="' . (isset($data[$meta_box['name']]) ? $data[$meta_box['name']] : '') . '" style="margin-top:3px;width:' . $meta_box['width'] . ';" />';     
 	$output .= '<span style="font-size:11px;color:#666; font-style:italic;font-weight:normal;padding-bottom:10px;"> ' .$meta_box['description'] . '</span><br />' . "\n";      
  } else if($meta_box['type'] == 'textarea') { // textarea box
      $output .= '<textarea name="' . $meta_box['name'] . '" style="width:' . $meta_box['width'] . '; height:200px;">' . $data[$meta_box['name']] . '</textarea>'; 
    } else if(($meta_box['type'] == 'checkbox') && (!empty($meta_box['options']))) { // checkboxes
      foreach($meta_box['options'] as $checkbox_value) { 
         if(is_array($data) && $data[$meta_box['name']] != "") { // if array is empty, warnings will be issued, this circumvents it  
          $output .= '<input type="checkbox" name="' . $meta_box['name'] . '[]" value="' . $checkbox_value . '" ' . (isset($data[$meta_box['name']]) && (in_array($checkbox_value, $data[$meta_box['name']])) ? ' checked="checked"' : '') . '/> ' . $checkbox_value . ' &nbsp; ' . "\n";	
         } else {  
          $output .= '<input type="checkbox" name="' . $meta_box['name'] . '[]" value="' . $checkbox_value . '"/> ' . $checkbox_value . ' &nbsp; ' . "\n";	
         }
      }		  			
  } else if(($meta_box['type'] == 'radio') && (!empty($meta_box['options']))) { // radio buttons
  foreach($meta_box['options'] as $radio_value) {
          $output .= '<p style="padding-bottom:10px;display:inline;font-style:normal;"><input type="radio" name="' . $meta_box['name'] . '" value="' . $radio_value . '" ' . (isset($data[$meta_box['name']]) && ($data[$meta_box['name']] == $radio_value) ? ' checked="checked"' : '') . '/> ' . $radio_value . ' &nbsp; </p>' . "\n";	
      }		  	
  }
  
  else if(($meta_box['type'] == 'dropdown') && (!empty($meta_box['options']))) { // dropdown lists    
    
    $output .= '<select name="' . $meta_box['name'] . '">' . "\n";
    
    if (isset($data[$meta_box['name']])) {
        $output .= '<option  selected>'. $data[$meta_box['name']] .'</option>' . "\n";	
    }     
		
    foreach($meta_box['options'] as $dropdown_key => $dropdown_value) {
        $output .= '<option class="level-0" value="' . $dropdown_value . '">' . $dropdown_value . '</option>' . "\n";
    }        
    $output .= '</select><span style="font-size:11px;color:#666; font-style:italic;font-weight:normal;padding-bottom:10px;"> ' . "".$meta_box['description']."</span>\n";		  	
  }
  $output .= "</p>\n\n";  
  }   
  echo '<div>' . "\n" . $output . "\n" . '</div></div>' . "\n\n";
}
?>
<?php
function display_specifications_box() {
  global $post, $feat_boxes, $mod2;
?>
<div class="form-wrap">
<?php
//wp_nonce_field( plugin_basename( __FILE__ ), $mod2 . '_wpnonce', false, true );
$output = '';
foreach($feat_boxes as $feat_box) { 
    $data = get_post_meta($post->ID, $mod2, true);       
	
  $output .= '<p style="border-bottom:1px solid #f1f1f1;padding-bottom:3px;"><div style="width:230px;padding:6px 0 0 5px;font-size:12px;color:#252525; font-style:normal;font-weight:bold;float: left;">' . $feat_box['title'] . ':&nbsp; </div>' . "\n"; 
  if($feat_box['type'] == 'text' || $feat_box['type'] == 'range') { // plain text input
      $output .= '<input type="text" name="' . $feat_box['name'] . '" value="' . (isset($data[$feat_box['name']]) ? $data[$feat_box['name']] : '') . '" style="margin-top:3px;width:' . $feat_box['width'] . ';" />';           
      $output .= '<span style="font-size:11px;color:#666; font-style:italic;font-weight:normal;padding-bottom:10px;"> ' .$feat_box['description'] . '</span><br />' . "\n";     
  }else if($feat_box['type'] == 'textarea') { // textarea box
      $output .= '<textarea name="' . $feat_box['name'] . '" style="width:' . $feat_box['width'] . '; height:100px;">' . $data[$feat_box['name']] . '</textarea>'; 
    }else if(($feat_box['type'] == 'checkbox') && (!empty($feat_box['options']))) { // checkboxes
      foreach($feat_box['options'] as $checkbox_value) { 
         if(is_array($data) && $data[$feat_box['name']] != "") { // if array is empty, warnings will be issued, this circumvents it  
          $output .= '<input type="checkbox" name="' . $feat_box['name'] . '[]" value="' . $checkbox_value . '" ' . (isset($data[$feat_box['name']]) && (in_array($checkbox_value, $data[$feat_box['name']])) ? ' checked="checked"' : '') . '/> ' . $checkbox_value . ' &nbsp; ' . "\n";	
         } else {  
          $output .= '<input type="checkbox" name="' . $feat_box['name'] . '[]" value="' . $checkbox_value . '"/> ' . $checkbox_value . ' &nbsp; ' . "\n";	
         }
      }		  			
  }else if(($feat_box['type'] == 'radio') && (!empty($feat_box['options']))) { // radio buttons        
      foreach($feat_box['options'] as $radio_value) {
          $output .= '<p style="padding-bottom:10px;display:inline;font-style:normal;"><input type="radio" name="' . $feat_box['name'] . '" value="' . $radio_value . '" ' . (isset($data[$feat_box['name']]) && ($data[$feat_box['name']] == $radio_value) ? ' checked="checked"' : '') . '/> ' . $radio_value . ' &nbsp; </p>' . "\n";	
      }		  	
  }else if(($feat_box['type'] == 'dropdown') && (!empty($feat_box['options']))) { // dropdown lists     
    $output .= '<select name="' . $feat_box['name'] . '">' . "\n";
    if (isset($data[$feat_box['name']])) {
        $output .= '<option selected>'. $data[$feat_box['name']] .'</option>' . "\n";	
    }      
		
    foreach($feat_box['options'] as $dropdown_key => $dropdown_value) {
        $output .= '<option value="' . $dropdown_value . '">' . $dropdown_value . '</option>' . "\n";
    }        
    $output .= '</select>' . "\n";		  	
  }
  $output .= "</p>\n\n";  
  }   
  echo '<div>' . "\n" . $output . "\n" . '</div></div>' . "\n\n";
}
add_action( 'admin_menu', 'create_meta_box' );
function save_feat_box( $post_id ) {
    if (!isset($_POST) || count($_POST) == 0) {
      return;
    }
   if ( (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) || !isset($_POST['post_ID']) || $post_id != $_POST['post_ID'])
    return $post_id;
  global $post, $featured_post, $feat;
  foreach( $featured_post as $featured_box ) {
    $bDontUpdate = false;
    $data[ $featured_box[ 'name' ] ] = isset($_POST[ $featured_box[ 'name' ] ]) ? $_POST[ $featured_box[ 'name' ] ] : '';
    if (isset($_POST[ $featured_box[ 'name' ] ]) && is_array($_POST[ $featured_box[ 'name' ] ])) {
      $bDontUpdate = true;
      delete_post_meta($post_id, '_' . $featured_box['name']);
      foreach($_POST[ $$featured_box[ 'name' ] ] as $value) {
        add_post_meta($post_id, '_'.$featured_box['name'], $value);
      }
    }
    if(isset($_POST[ $featured_box[ 'name' ] ]) && $featured_box['type'] == 'range' && preg_match('/[\.,]/',$_POST[$feat_box[ 'name' ]])){
      $_POST[$featured_box[ 'name' ]] = preg_replace('/[\.,]/', '', $_POST[$featured_box[ 'name' ]]);
    }
    if (!$bDontUpdate) {
      update_post_meta( $post_id, '_'.$featured_box['name'], isset($_POST[$featured_box[ 'name' ]]) ? $_POST[$featured_box[ 'name' ]] : '' );
    }
  }
//	if ( !wp_verify_nonce( $_POST[ $mod1 . '_wpnonce' ], plugin_basename(__FILE__) ) )
//		return $post_id;
  if ( !current_user_can( 'edit_post', $post_id ))
    return $post_id;
  update_post_meta( $post_id, $feat, $data );
}
add_action( 'save_post', 'save_feat_box' );
function save_meta_box( $post_id ) {
    if (!isset($_POST) || count($_POST) == 0) {
      return;
    }
   if ( (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) || !isset($_POST['post_ID']) || $post_id != $_POST['post_ID'])
    return $post_id;
  global $post, $meta_boxes, $mod1;
  foreach( $meta_boxes as $meta_box ) {
    $bDontUpdate = false;
    $data[ $meta_box[ 'name' ] ] = isset($_POST[ $meta_box[ 'name' ] ]) ? $_POST[ $meta_box[ 'name' ] ] : '';
    if (isset($_POST[ $meta_box[ 'name' ] ]) && is_array($_POST[ $meta_box[ 'name' ] ])) {
      $bDontUpdate = true;
      delete_post_meta($post_id, '_' . $meta_box['name']);
      foreach($_POST[ $meta_box[ 'name' ] ] as $value) {
        add_post_meta($post_id, '_'.$meta_box['name'], $value);
      }
    }
    if(isset($_POST[ $meta_box[ 'name' ] ]) && $meta_box['type'] == 'range' && preg_match('/[\.,]/',$_POST[$meta_box[ 'name' ]])){
      $_POST[$meta_box[ 'name' ]] = preg_replace('/[\.,]/', '', $_POST[$meta_box[ 'name' ]]);
    }
    if (!$bDontUpdate) {
      update_post_meta( $post_id, '_'.$meta_box['name'], isset($_POST[$meta_box[ 'name' ]]) ? $_POST[$meta_box[ 'name' ]] : '' );
    }
  }
//	if ( !wp_verify_nonce( $_POST[ $mod1 . '_wpnonce' ], plugin_basename(__FILE__) ) )
//		return $post_id;
  if ( !current_user_can( 'edit_post', $post_id ))
    return $post_id;
  update_post_meta( $post_id, $mod1, $data );
}
add_action( 'save_post', 'save_meta_box' );
function save_features_box( $post_id ) {
    if (!isset($_POST) || count($_POST) == 0) {
      return;
    }
   if ( (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) || !isset($_POST['post_ID']) || $post_id != $_POST['post_ID'])
    return $post_id;


   global $post, $feat_boxes, $mod2, $feat;
  
 
  foreach( $feat_boxes as $feat_box ) {
    $bDontUpdate = false;
    $data[ $feat_box[ 'name' ] ] = isset($_POST[ $feat_box[ 'name' ] ]) ? $_POST[ $feat_box[ 'name' ] ] : '';
    if (isset($_POST[ $feat_box[ 'name' ] ]) && is_array($_POST[ $feat_box[ 'name' ] ])) {
      $bDontUpdate = true;
      delete_post_meta($post_id, '_' . $feat_box['name']);
      foreach($_POST[ $feat_box[ 'name' ] ] as $value) {
        add_post_meta($post_id, '_'.$feat_box['name'], $value);
      }
    }
    if(isset($_POST[ $feat_box[ 'name' ] ]) && $feat_box['type'] == 'range' && preg_match('/[\.,]/',$_POST[$feat_box[ 'name' ]])){
      $_POST[$feat_box[ 'name' ]] = preg_replace('/[\.,]/', '', $_POST[$feat_box[ 'name' ]]);
    }
    if (!$bDontUpdate) {
      update_post_meta( $post_id, '_'.$feat_box['name'], isset($_POST[$feat_box[ 'name' ]]) ? $_POST[$feat_box[ 'name' ]] : '' );
    }
  }
  
//	if ( !wp_verify_nonce( $_POST[ $mod2 . '_wpnonce' ], plugin_basename(__FILE__) ) )
//		return $post_id;
  if ( !current_user_can( 'edit_post', $post_id ))
    return $post_id;
  update_post_meta( $post_id, $mod2, $data );
}
add_action( 'save_post', 'save_features_box' );
function generate_years( $from, $to )
{
	$array = array();
	$i = 1;
	for( $number=$from; $number<=$to; $number++ )
	{
		$array[$i] = $number;
		$i++;
		
		$result = array_reverse($array);
		$result_num = array_reverse($array,true);
	

	}
	
	return $result_num;
}
function meta_box_craigslist()
{                                      
    add_meta_box( 'craigslist-meta-box', 
                  'Craigslist Code Generator:',     
                  'meta_box_callback', 
                  'gtcd',              
                  'normal', 
                  'low' );  
}
add_action( 'admin_menu', 'meta_box_craigslist' );
function meta_box_callback( $post )
{	global $options;$fields;$options2;$options3;$symbols;
			  $fields = get_post_meta($post->ID, 'mod1', true);
			  $symbols = get_option('gorilla_symbols');
			  $options = my_get_theme_options();
    $values = get_post_custom( $post->ID );
    $selected = isset( $values['meta_box_craigslist_embed'] ) ? $values['meta_box_craigslist_embed'][0] : '';

    wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );?> 
<p style="border-bottom:1px solid #f1f1f1;padding-bottom:3px;"><div style="height:200px;width:130px;padding:6px 0 0 5px;font-size:12px;color:#252525; font-style:normal;font-weight:bold;float: left;"><?php _e('Craigslist Code:','language');?><br/><br/><span
 style="font-weight:normal!important;font-size:11px;margin-top:15px;font-style:italic;"><?php echo _e('Copy & Paste the generated code into your Craigslist ad.','language');?></span></div></p>
<textarea name="meta_box_craigslist_embed" id="meta_box_craigslist_embed" style="width:80%;height:300px;" ><h1><?php if ( isset($fields['year'])){ echo $fields['year']; echo ' ';}else {  echo ''; }?><?php the_title();?></h1><hr /><b><?php _e('Contact:','language');?></b> <?php echo $symbols['phone']; ?><b><?php _e('Website:','language');?></b> <a href="<?php the_permalink();?>"><?php the_title();?></a><ul><?php if ( isset($fields['price'])){ echo '<li>'.$options['price_text'].': '.$options['currency_text']; echo $fields['price'].'</li>';}else {  echo ''; } ?><?php   if ( isset($fields['miles'])){ echo '<li>'.$options['miles_text'].': '.$fields['miles'].'</li>';}else {  echo ''; }?><?php if ( isset($fields['vehicletype'])){ echo '<li>'.$options['vehicle_type_text'].': '.$fields['vehicletype'].'</li>';}else {  echo ''; }?><?php if ( isset($fields['drive'])){ echo '<li>'.$options['drive_text'].': '.$fields['drive'].'</li>';}else {  echo ''; }?><?php if ( isset($fields['transmission'])){ echo '<li>'.$options['transmission_text'].': '.$fields['transmission'].'</li>';}else {  echo ''; }?></ul></td><td><ul><?php if ( isset($fields['exterior'])){ echo '<li>'.$options['exterior_text'].': '.$fields['exterior'].'</li>';}else {  echo ''; }?><?php if ( isset($fields['interior'])){ echo '<li>'.$options['interior_text'].':'.$fields['interior'].'</li>';}else {  echo ''; }?><?php   if ( isset($fields['epamileage'])){ echo '<li>'.$options['epa_mileage_text'].': '.$fields['epamileage'].'</li>';}else {  echo ''; }?><?php if ( isset($fields['stock'])){ echo '<li>'.$options['stock_text'].': '.$fields['stock'].'</li>';}else {  echo ''; }?><?php if ( isset($fields['vin'])){ echo '<li>'.$options['vin_text'].': '.$fields['vin'].'</li>';}else {  echo ''; }?></ul><br/><a href="<?php the_permalink();?>"><strong><?php _e('VIEW PHOTO GALLERY AND FULL VEHICLE DETAILS','language'); ?></strong></a><br/><p><b><?php _e('Description','language');?></b></p><p><?php $trim_length = 200;$values = get_post_meta($post->ID, 'mod3', true);if (is_array($values)){foreach($values as $value) {add_filter( 'custom_filter', 'wpautop' );echo apply_filters( 'custom_filter', $value );}} ?><p><b><?php _e('Features','language');?></b></p><p></p><?php   if (get_the_terms($post->ID, 'features')) {$taxonomy = get_the_terms($post->ID, 'features');foreach ($taxonomy as $taxonomy_term) {?><li><?php echo $taxonomy_term->name;?></li><?php } } ?><br/><a href="<?php the_permalink();?>"><strong><?php _e('VIEW PHOTO GALLERY AND FULL VEHICLE DETAILS','language'); ?></strong></textarea><?php }
add_action( 'save_post', 'meta_box_craigslist_save' );
function meta_box_craigslist_save( $post_id )
{
    // Bail if we're doing an auto save
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

    // if our nonce isn't there, or we can't verify it, bail
    if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;

    // if our current user can't edit this post, bail
    if( !current_user_can( 'edit_post' ) ) return;

    // now we can actually save the data
    $allowed = array( 
        'a' => array( // on allow a tags
            'href' => array() // and those anchords can only have href attribute
        )
    );

    // Probably a good idea to make sure your data is set

    if( isset( $_POST['meta_box_craigslist_embed'] ) )
        update_post_meta( $post_id, 'meta_box_craigslist_embed', $_POST['meta_box_craigslist_embed'] );
}

//New functions for Gallery
	// Check field upload and add needed actions
	add_action('wp_ajax_rw_delete_file', 'delete_file');		// ajax delete files
	add_action('wp_ajax_rw_save_gallery', 'save_gallery');		// ajax save gallery	
	add_action('wp_ajax_rw_reorder_images', 'reorder_images');	// ajax reorder images

function save_gallery() {
		if (!isset($_POST['post_id'])) die('1');
		if (!wp_verify_nonce($_POST['nonce'], 'AddGalImage')) die('1');
		
		$All_IDS = explode(',',$_POST['Gallery_IDs']);
		$All_IDS = array_unique($All_IDS);
				
		foreach( $All_IDS as $key=>$val ){
			if (intval($val)==0){
				unset($All_IDS[$key]);
			}else{
				wp_update_post( array(
						'ID' => $val,
						'post_parent' => $_POST['post_id']
					)
				);				
			}
		}		
		$All_IDS = implode(',',$All_IDS);
		
		update_post_meta($_POST['post_id'], 'CarsGallery', $All_IDS);
		global $field;
		//wp_delete_attachment($_POST['image_id']);
		$saved = get_post_custom_values('CarsGallery', $_POST['post_id']);
		$saved = explode(',',$saved[0]);
		//Get gallery images from posts table
		if (count($saved)>0){
			foreach( $saved as $image ){
				if(intval($image)>0){
				$AllImages[] = $image;
				$attachmentimage=wp_get_attachment_image($image, 'thumbnail');
				$tmp2='{'.$field['id'].'}[]';
				echo '<li id="item_'.$image.'">'.$attachmentimage.'<a class="delete" href="#del_img" onClick="deletePost('.$image.')" >'. __('Delete','language').'</a>
				<input type="hidden" name="'.$tmp2.'" value="'.$tmp2.'" />
				</li>';
				}
			}
		}
		die();
	}

		
	function delete_file() {
		if (!isset($_POST['image_id'])) die('1');
		if (!isset($_POST['postid'])) die('1');		
		if (!wp_verify_nonce($_POST['nonce'], 'DelGalImage')) die('1');
		$saved = get_post_custom_values('CarsGallery', $_POST['postid']);
		$saved = explode(',',$saved[0]);
		$saved = array_unique($saved);
				
		foreach($saved as $key => $val){
			if ($val == $_POST['image_id']){
				unset($saved[$key]);			
				$saved = implode(',',$saved);
				update_post_meta($_POST['postid'], 'CarsGallery', $saved);			
				//wp_delete_attachment($_POST['image_id']);
				die('0');				
			}
		}
	}

	
	// Ajax callback for reordering images
	function reorder_images() {
		if (!isset($_POST['data'])) die();
		list($order, $post_id, $key, $nonce) = explode('|',$_POST['data']);
		if (!wp_verify_nonce($nonce, 'rw_ajax_reorder')) die('1');
		parse_str($order, $items);
		$items['item'] = array_unique($items['item']);
		$items = implode(',',$items['item']);
		update_post_meta($post_id, 'CarsGallery', $items);					
		die('0');
	}


		
add_action('add_meta_boxes', 'add');
function add() {
add_meta_box( 'gallery', __('Photo Gallery','language'), 'show','gtcd', 'normal', 'high' );
}


	function show(){
		global $wpdb, $post, $AllImages, $field;
		$meta='';
		$size='small';
		$nonce_sort = wp_create_nonce('rw_ajax_reorder');	
		wp_nonce_field(basename(__FILE__), 'rw_meta_box_nonce');
		$blogurl = get_bloginfo('template_url');
		$saved = get_post_custom_values('CarsGallery', get_the_ID());
		$saved = explode(',',$saved[0]);
		$saved = array_unique($saved);
		$all_li = '';
		foreach( $saved as $image ){
			$image = intval($image);
			if ($image>0){							
			$AllImages[] = $image;
			$attachmentimage=wp_get_attachment_image($image, 'thumbnail');
			$tmp2='{'.$field['id'].'}[]';
			$all_li .= '<li id="item_'.$image.'">'.$attachmentimage.'<a class="delete" href="#del_img" onClick="deletePost('.$image.')" >'. __('Delete','language').'</a>
				<input type="hidden" name="'.$tmp2.'" value="'.$tmp2.'" />
				</li>';
			}
		}
				
		?>
            <div style="height:30px !important;" >
            <?php if(count($AllImages)>0){
				$AllImagesImp = implode(',',$AllImages);
				?>
            	<div class="messagebox" id="messageBox">
					<?php echo count($AllImages). __(' images in  gallery','language');?>
                </div>
            <?php }else{
				$AllImagesImp ='';
				?>
            	<div class="messagebox" id="messageBox" style="display:none;">					
                </div>
            <?php 						
				}
			?>
            </div>                
        <?php
		echo '<table class="form-table">';
		echo '<tr><td style="padding:0px !important">';		
		echo "<input type='hidden' class='rw-images-data' value='{$post->ID}|{$field['id']}|$nonce_sort' />";			
		//Get gallery images from posts table
		?>
        <ul class="rw-images rw-upload" id="rw-images-<?php echo $field['id'];?>">
        <?php
			echo $all_li;
		?>
        </ul>        
        <?php
		echo "</td></tr>";
		echo '</table>';
        echo '<div id="tgm-new-media-settings">';
        echo '<p><a href="#" class="tgm-open-media button button-primary" title="' . 
		esc_attr__( 'Upload Images', 'language' ) . '">' . __( 'Upload Images', 'language' ) . '</a></p>';
        echo '<input type="hidden" name="CarsGallery" id="tgm-new-media-image" size="70" value="' . $AllImagesImp . '" />';
        echo '</div>';						
	}
		
add_action( 'admin_enqueue_scripts', 'assets');
function assets() {
  //if ( ! ( 'post' == get_current_screen()->base && 'page' == get_current_screen()->id ) )
	//  return;
  // This function loads in the required media files for the media manager.
  wp_enqueue_media();
  wp_register_script( 'tgm-nmp-media', get_bloginfo('template_url') . '/assets/js/media/media.js', array( 'jquery' ), '1.0.0', true );
  wp_localize_script( 'tgm-nmp-media', 'tgm_nmp_media',
	  array(
		  'title'     => __( 'Upload or Choose Your Custom Image File', 'language' ),
		  'button'    => __( 'Insert Image into Input Field', 'language' ) 
	  )
  );
  wp_enqueue_script( 'tgm-nmp-media' );
}
?>