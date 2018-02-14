<?php
class MyTheme_Customize {
   public static function register ( $wp_customize ) {
      $wp_customize->add_setting( 'text_color',
         array(
            'default' => '#fff',
            'sanitize_callback' => 'sanitize_hex_color',
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'transport' => 'postMessage',
         ) 
      );      
      $wp_customize->add_control( new WP_Customize_Color_Control(
         $wp_customize,
         'mytheme_textcolor',
         array(
            'label' => __( 'Text Color', 'language' ),
            'description' =>  __('Primary theme text color.', 'language' ),
            'section' => 'colors',
            'settings' => 'text_color',
            'priority' => 1, 
         ) 
      ) );
      $wp_customize->add_setting( 'menu_background',
         array(
            'default' => '#111',
            'sanitize_callback' => 'sanitize_hex_color',
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'transport' => 'postMessage',
         ) 
      );      
      $wp_customize->add_control( new WP_Customize_Color_Control(
         $wp_customize,
         'mytheme_menu_back_color',
         array(
            'label' => __( 'Menu Background', 'language' ),
            'description' => __( 'Main menu background color.', 'language' ),
            'section' => 'colors',
            'settings' => 'menu_background',
            'priority' => 2, 
         ) 
      ) );
      $wp_customize->add_setting( 'menu_text_color',
         array(
            'default' => '#fff',
            'sanitize_callback' => 'sanitize_hex_color',
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'transport' => 'postMessage',
         ) 
      );      
      $wp_customize->add_control( new WP_Customize_Color_Control(
         $wp_customize,
         'mytheme_menu_text_color',
         array(
            'label' => __( 'Menu Text', 'language' ),
            'description' => __( 'Main menu text color.', 'language' ),
            'section' => 'colors',
            'settings' => 'menu_text_color',
            'priority' => 3, 
         ) 
      ) );
      $wp_customize->add_setting( 'headers_color',
         array(
            'default' => '#b12a2a',
            'sanitize_callback' => 'sanitize_hex_color',
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'transport' => 'postMessage',
         ) 
      );      
      $wp_customize->add_control( new WP_Customize_Color_Control(
         $wp_customize,
         'mytheme_headers_color',
         array(
            'label' => __( 'Headers Color', 'language' ),
            'section' => 'colors',
            'description' => __( 'Widgets header background color.', 'language' ),
            'settings' => 'headers_color',
            'priority' => 4,
         ) 
      ) );
      $wp_customize->add_setting( 'headers_text_color',
         array(
            'default' => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'transport' => 'postMessage',
         ) 
      );      
      $wp_customize->add_control( new WP_Customize_Color_Control(
         $wp_customize,
         'mytheme_header_text_color',
         array(
            'label' => __( 'Headers Text Color', 'language' ),
            'section' => 'colors',
            'description' => __( 'Widgets header text color.', 'language' ),
            'settings' => 'headers_text_color',
            'priority' => 5,
         ) 
      ) );
      $wp_customize->add_setting( 'search_text_color',
         array(
            'default' => '#cccccc',
            'sanitize_callback' => 'sanitize_hex_color',
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'transport' => 'postMessage',
         ) 
      );      
      $wp_customize->add_control( new WP_Customize_Color_Control(
         $wp_customize,
         'mytheme_search_text_color',
         array(
            'label' => __( 'Search Text Color', 'language' ),
            'section' => 'colors',
            'description' => __( 'Search module text color', 'language' ),
            'settings' => 'search_text_color',
            'priority' => 6,
         ) 
      ) );
      $wp_customize->add_setting( 'search_color_hover',
         array(
            'default' => '#ff0000',
            'sanitize_callback' => 'sanitize_hex_color',
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'transport' => 'postMessage',
         ) 
      );      
      $wp_customize->add_control( new WP_Customize_Color_Control(
         $wp_customize,
         'mytheme_search_color_hover',
         array(
            'label' => __( 'Search Text Color Hover', 'language' ),
            'section' => 'colors',
            'description' => __( 'Search module text color hover', 'language' ),
            'settings' => 'search_color_hover',
            'priority' => 6,
         ) 
      ) );

     $wp_customize->add_setting( 'search_background_color',
         array(
            'default' => '#333333',
            'sanitize_callback' => 'sanitize_hex_color',
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'transport' => 'postMessage',
         ) 
      );      
      $wp_customize->add_control( new WP_Customize_Color_Control(
         $wp_customize,
         'mytheme_search_background_color',
         array(
            'label' => __( 'Search Background Color', 'language' ),
            'section' => 'colors',
             'description' => __( 'Search module background color', 'language' ),
            'settings' => 'search_background_color',
            'priority' => 8,
         ) 
      ) );
      $wp_customize->add_setting( 'widgets_background_color',
         array(
            'default' => 'rgba( 0, 0, 0, 0.2 )',
            'sanitize_callback' => 'sanitize_hex_color',
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'transport' => 'postMessage',
         ) 
      );      
      $wp_customize->add_control( new WP_Customize_Color_Control(
         $wp_customize,
         'mytheme_widget_background_color',
         array(
            'label' => __( 'Widgets Background Color', 'language' ),
            'section' => 'colors',
            'description' => __( 'Widgets background color', 'language' ),
            'settings' => 'widgets_background_color',
            'priority' => 9,
         ) 
      ) );
      $wp_customize->add_setting( 'buttons_background_color',
         array(
            'default' => '#000',
            'sanitize_callback' => 'sanitize_hex_color',
            'type' => 'theme_mod', 
            'capability' => 'edit_theme_options', 
            'transport' => 'postMessage',
         ) 
      );      
      $wp_customize->add_control( new WP_Customize_Color_Control( 
         $wp_customize, 
         'mytheme_buttons_background_color',
         array(
            'label' => __( 'Buttons Background Color', 'language' ),
            'section' => 'colors',
            'description' =>  __('Buttons background color', 'language' ),
            'settings' => 'buttons_background_color', 
            'priority' => 10,
         ) 
      ) );
      $wp_customize->add_setting( 'logo_text_color',
         array(
            'default' => '#fff',
            'sanitize_callback' => 'sanitize_hex_color',
            'type' => 'theme_mod', 
            'capability' => 'edit_theme_options', 
            'transport' => 'postMessage',
         ) 
      );      
      $wp_customize->add_control( new WP_Customize_Color_Control( 
         $wp_customize, 
         'mytheme_logo_text_color',
         array(
            'label' => __( 'Logo text Color', 'language' ),
            'section' => 'colors',
            'description' =>  __('Color of the header text logo', 'language' ),
            'settings' => 'logo_text_color', 
            'priority' => 11,
         ) 
      ) );
      $wp_customize->add_setting( 'blog_title_color',
         array(
            'default' => '#fff',
            'sanitize_callback' => 'sanitize_hex_color',
            'type' => 'theme_mod', 
            'capability' => 'edit_theme_options', 
            'transport' => 'postMessage',
         ) 
      );      
      $wp_customize->add_control( new WP_Customize_Color_Control( 
         $wp_customize, 
         'mytheme_blog_title_color',
         array(
            'label' => __( 'Blog Title Color', 'language' ),
            'section' => 'colors',
            'description' =>  __('color of the blog articles titles', 'language' ),
            'settings' => 'blog_title_color',
            'priority' => 12,
         ) 
      ) );
     $wp_customize->add_setting( 'blog_title_color_hover',
         array(
            'default' => '#fff',
            'sanitize_callback' => 'sanitize_hex_color',
            'type' => 'theme_mod', 
            'capability' => 'edit_theme_options', 
            'transport' => 'postMessage',
         ) 
      );      
      $wp_customize->add_control( new WP_Customize_Color_Control( 
         $wp_customize, 
         'mytheme_blog_title_color_hover',
         array(
            'label' => __( 'Blog Title Color Hover', 'language' ),
            'section' => 'colors',
            'description' =>  __('Color of the blog articles titles hover', 'language' ),
            'settings' => 'blog_title_color_hover',
            'priority' => 13,
         ) 
      ) ); 
      
            
      
              
      
         
	}
public static function header_output() {
      ?> 
	<style type="text/css"> 
		<?php self::generate_css('a.learn-more', 'color', 'headers_text_color'); ?>
		<?php self::generate_css('.selectBox.dropdown .selectBox-label:hover', 'color', 'search_color_hover'); ?>      
		<?php self::generate_css('.blog-post h1 a, a.more-link', 'color', 'blog_title_color'); ?>
		<?php self::generate_css('.blog-post h1 a:hover, a.more-link:hover', 'color', 'blog_title_color_hover'); ?>
		<?php self::generate_css('.site-title a,.site-description', 'color', 'logo_text_color'); ?>  
		<?php self::generate_css('.top-single-bar,.result-car,.overview,.features,#video,#contact,.nav.nav-tabs li a,.blog-comment,h3.price-single,.find-wrapper,.blog-post,.blog-post.common h1', 'background', 'widgets_background_color'); ?>
		<?php self::generate_css('body', 'background-color', 'background_color', '#'); ?>
        <?php self::generate_css('.result-car:hover', 'background-color', 'background_color', '#'); ?>    
        <?php self::generate_css('.tricol-product-list .item-container:hover', 'background', 'background_color', '#'); ?>
        <?php self::generate_css('.container-fluid,.form-group textarea,.contact-form textarea,#contact textarea,.contact-form input[type="text"],input[type="text"]:focus,input[type="number"]:focus,input[type="email"]:focus,input[type="tel"]:focus,.form-group input,.contact-form input[type="email"]', 'background-color', 'background_color', '#'); ?>
        <?php self::generate_css('#sell-your-car select', 'background-color', 'background_color', '#'); ?> 
        <?php self::generate_css('.container-fluid-types', 'background-color', 'find_by_type'); ?> 
        <?php self::generate_css('.container-fluid-header', 'background-color', 'content_header'); ?> 
        <?php self::generate_css('.meta-style,.cars-list li a,#footer .news li a,#footer .col-sm-3,.side-widget a,.vehicle-name,.grid-location,.side-widget,.nav.nav-tabs li a,.overview,#contact,#sell-your-car select,.gt-form h3,.contact-form input[type="text"],.contact-form input[type="email"],.contact-form input[type="phone"],.contact-form textarea,.nav .active a,div label.grunion-field-label.name,div label.grunion-field-label.email,div label.grunion-field-label.phone,div label.grunion-field-label.textarea,.grunion-field-label.email,.grunion-field-label.name,.grunion-field-label.text,.grunion-field-label.textarea,.grunion-field-label.select,.result-car .result-detail-wrapper p.vehicle-name,.result-car .result-detail-wrapper p.miles-style,.result-car .result-detail-wrapper p.vçehicle-name,.result-car .result-detail-wrapper p.car-info,.result-car .result-detail-wrapper p.title-tag,.searchSort,.searchSort a,.blog-comment,#respond h3,#respond label,.blog-post p,.blog-post h1 a,.blog-post h2,.quick-glance li,.refine-nav li p.strong,.refine-nav li,.refine-nav li ul li,.side-widget ul li a,.features-list li,input[type="text"]:focus,input[type="number"]:focus,input[type="email"]:focus,input[type="tel"]:focus,.inventory-right,.inventory-right .location-tag,.inventory-right .stock-inventory,.inventory-right .price-style,.loading-msg .text,.call-us a.phone,.call-us a.font,.contact-form textarea,#contact textarea,.form-group textarea,.contact-form textarea,#contact textarea,.contact-form input[type="text"],input[type="text"]:focus,input[type="number"]:focus,input[type="email"]:focus,input[type="tel"]:focus,.form-group input,.contact-form input[type="email"],div label.grunion-field-label.email:before', 'color', 'text_color'); ?>
		<?php self::generate_css('.featured-bottom h3,.container-fluid.footer h3', 'background', 'headers_color'); ?>
        <?php self::generate_css('.selectBox.dropdown .selectBox-label', 'color', 'search_text_color'); ?>
        <?php self::generate_css('.selectBox.dropdown', 'background', 'search_background_color'); ?>
        <?php self::generate_css('.selectBox.dropdown .selectBox-arrow', 'border-left-color', 'border_widgets_color'); ?>                  
        <?php self::generate_css('nav#menu', 'background', 'menu_background'); ?>
        <?php self::generate_css('.nav.navbar-nav li a', 'color', 'menu_text_color'); ?>
        <?php self::generate_css('.tricol-product-list .item-container', 'background', 'widgets_background_color'); ?>
		<?php self::generate_css('.tricol-product-list .item-container,.selectBox.dropdown,.tricol-product-list .item-container:hover', 'border-color', 'border_widgets_color'); ?>
        <?php self::generate_css('#footer h3,.footer h3,.side-widget h3 a,.side-widget h3,.nav.nav-tabs li.active a,.col-sm-9 .title h1', 'color', 'headers_text_color'); ?>
        <?php self::generate_css('#footer h3,.container-fluid.footer h3,#respond #submit-comment,.side-widget h3', 'background', 'headers_color'); ?>
		<?php self::generate_css('.nav-tabs', 'border-color', 'buttons_background_color'); ?>      
        <?php self::generate_css('.nav.nav-tabs li.active a,.inventory-right .btn-primary,.search-button,.detail-btn,.form-button,.btn-lg.offer,nav#menu .active a,nav#menu a:hover', 'background', 'buttons_background_color'); ?>
		<?php self::generate_css('#contact,#video,.overview,.features', 'border-color', 'widgets_background_color'); ?>                                            
		<?php self::generate_css('.blog-post.financing .selectBox,title h1,.specs,.quick-list,.arrivals-details,.side-widget', 'background', 'widgets_background_color'); ?>
		<?php self::generate_css('div label.gt-title:before,div label.gt-price:before,div label.gt-miles:before,div label.gt-ext:before,div label.gt-int:before,div label.gt-drive:before,div label.gt-vin:before,div label.gt-features:before,.blog-post.financing .selectBox,.blog-post.financing .selectBox .selectBox-label,div label.grunion-field-label.name:before,div label.grunion-field-label.email:before,div label.grunion-field-label.phone:before', 'color', 'buttons_background_color'); ?>
		<?php self::generate_css('div label.grunion-field-label.name:before,div label.grunion-field-label.email:before,div label.grunion-field-label.phone:before,div label.gt-title:before,div label.gt-price:before,div label.gt-miles:before,div label.gt-ext:before,div label.gt-int:before,div label.gt-drive:before,div label.gt-vin:before,div label.gt-features:before', 'border-right-color', 'widgets_background_color'); ?>
		<?php self::generate_css('p.contact-submit input.pushbutton-wide','background', 'headers_color'); ?>
		<?php self::generate_css('a.more-link,','color', 'headers_color'); ?>
	</style> 
      <?php
   }
   public static function live_preview() {
// 	  wp_enqueue_script( 'jetpack-customizer-widget-utils', plugins_url( '/widgets/customizer-utils.js', __FILE__ ), array( 'jquery', 'wp-util' ) );
      wp_enqueue_script( 
           'mytheme-themecustomizer',
           	  get_template_directory_uri().'/assets/customizer/live.js',
           array(  'jquery', 'customize-preview' ),
           '', 
           true 
      );
   }
    public static function generate_css( $selector, $style, $mod_name, $prefix='', $postfix='', $echo=true ) {
      $return = '';
      $mod = get_theme_mod($mod_name);
      if ( ! empty( $mod ) ) {
         $return = sprintf('%s { %s:%s; }',
            $selector,
            $style,
            $prefix.$mod.$postfix
         );
         if ( $echo ) {
            echo $return;
         }
      }
      return $return;
    }
}
add_action( 'customize_register' , array( 'MyTheme_Customize' , 'register' ) );
add_action( 'wp_head' , array( 'MyTheme_Customize' , 'header_output' ) );
add_action( 'customize_preview_init' , array( 'MyTheme_Customize' , 'live_preview' ) );
