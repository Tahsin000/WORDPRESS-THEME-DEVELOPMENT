<?php

/*
* My Theme Function
*/

// Theme Title
add_theme_support('title-tag');

// Theme css and kQuery File Calling
function HHJN_css_js_file_calling(){
    wp_enqueue_style( 'HHJN-style', get_stylesheet_uri());

    // ======== bootstrap setup ======== 
    wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.css', array(), '4.5.2', 'all');
    wp_enqueue_style( 'bootstrap');

    // ======== custom setup ======== 
    wp_register_style('custom', get_template_directory_uri() . '/css/custom.css', array(), '1.0.0', 'all');
    wp_enqueue_style( 'custom');

    // ======== jQuery setup ======== 
    wp_enqueue_script( 'jquery');

    // ======== bootstrap setup ======== 
    wp_enqueue_script( 'bootstrap', get_template_directory_uri( ).'./js/bootstrap.min.js', array(), '4.4.1', 'true');

    // ======== main setup ======== 
    wp_enqueue_script( 'main', get_template_directory_uri( ).'./js/main.min.js', array(), '1.0.0', 'true');

}
add_action( 'wp_enqueue_scripts', 'HHJN_css_js_file_calling');


// ========== Theme Function ========
function HHJN_customizar_register($wp_customize){
    $wp_customize->add_section('HHJN_header_area', array(
        'title' =>__('Header Area', 'tahsinabra'),
        'description' => 'if you interested to update your header area, your can do it here.'
    ));
    $wp_customize->add_setting('HHJN_logo', array(
        'default' => get_bloginfo( 'template_directory' ).'./img/logo.png'
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'HHJN_logo', array(
        'label' => 'Logo Upload',
        'description' => 'if you interested to change or update your logo you can do it.',
        'section'=> 'HHJN_header_area',
        'setting'=> 'HHJN_logo',

    )));
}
add_action( 'customize_register', 'HHJN_customizar_register');


// ========== Google Font ========
function HHJN_add_google_font(){
    wp_enqueue_style( 'HHJN_google_font', 'https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600&display=swap', false);
}
add_action('wp_enqueue_scripts', 'HHJN_add_google_font');


// ========== Menu Register ========
register_nav_menu( 'main_menu', __('Main main', 'tahsinabrar'));