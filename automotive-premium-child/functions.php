<?php
function my_theme_enqueue_styles() {
        
    //Enqueue the script for having the arrow to go up
    wp_enqueue_script('crunchify',get_stylesheet_directory_uri().'/assets/js/child_script.js', array( 'jquery' ),'', false);
        
    // Enqueue the parent style after bootstrap-css => it will not be overwritten by the bootstrap template css
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css', array('bootstrap-css') );
    // Enqueue the child style after it's parent - array( $parent_style ), -
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

function my_translation() {load_child_theme_textdomain( 'language', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'my_translation' );
?>