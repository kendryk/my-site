<?php


//-------------------------------------------------------------------
/**
 * Register Custom Navigation Walker
 */
add_action( 'after_setup_theme', 'register_navwalker' );
function register_navwalker(){
    require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}


//-------------------------------------------------------------------
add_action('wp_enqueue_scripts', 'monsite_enqueue_styles');
function monsite_enqueue_styles() {
    // Chargement des CSS
        wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css');
        wp_enqueue_style('theme-style',
            get_template_directory_uri() . '/style.css',
            ['bootstrap-css'],
            wp_get_theme()->get('Version')
        );
        //----Autre Chargement!!

    // Chargement des JavaScripts
    wp_enqueue_script('bootstrap-js',
        get_template_directory_uri() . '/bootstrap/js/bootstrap.min.js',
        [],
        wp_get_theme()->get('Version'),
        true // Charger le fichier JS avant la fermeture du body
    );
}


///-------------------------------mise en place du menu
add_action('after_setup_theme', 'cookingchef_register_menu');
function cookingchef_register_menu() {
    register_nav_menu('menu-top', 'Menu principal');
}

//--------------------------------function logo
add_action( 'after_setup_theme', 'cookingchef_add_theme_support' );
function cookingchef_add_theme_support() {
    add_theme_support( 'custom-logo', [
        'height' => 100,
        'width' => 400,
        'flex-width' => true,
    ] );
}