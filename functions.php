<?php

use Carbon_Fields\Carbon_Fields;
use Carbon_Fields\Container;
use Carbon_Fields\Field;

require_once( 'vendor/autoload.php' );
require_once __DIR__ . '/cpt/langages.php';
require_once __DIR__ . '/cpt/testimony.php';
require_once __DIR__ . '/cpt/project.php';
require_once __DIR__ . '/cpt/service.php';
require_once __DIR__ . '/Widgets/ContactWidget.php';






//Creation des widgets
add_action( 'widgets_init', 'load_widgets' );
function load_widgets() {
    register_widget(ContactWidget::class);

}

add_action('carbon_fields_register_fields', 'contact_register_fields');
function contact_register_fields() {
    Container::make_post_meta('contact-infos', 'Infos Contact')
        ->set_context('side')
        ->set_priority('high')
        ->where('post_template', '=', 'template-contact.php') // Associer les champs au modèle Contact
        ->add_fields([
            Field::make_text('address', 'Adresse'),
            Field::make_text('phone', 'Téléphone'),
            Field::make_text('email', 'Email'),
            Field::make_text('form_id', 'Identifiant du formulaire'),
        ])
    ;
}


add_action( 'after_setup_theme', 'crb_load' );
function crb_load() {
    Carbon_Fields::boot();
}


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
    wp_enqueue_script('slick-js',
        get_template_directory_uri() . '/slick/slick.js',
        ['jquery'],
        wp_get_theme()->get('Version'),
        true // Charger le fichier JS avant la fermeture du body
    );
    wp_enqueue_script('script-js',
        get_template_directory_uri() . '/script.js',
        ['jquery', 'bootstrap-js', 'slick-js'],
        wp_get_theme()->get('Version'),
        true // Charger le fichier JS avant la fermeture du body
    );
}


///-------------------------------mise en place des menu
add_action('after_setup_theme', 'monsite_register_menu');
function monsite_register_menu() {
    register_nav_menu('menu-top', 'Menu principal');
    register_nav_menu('footer', 'Pied de page');
}

//--------------------------------function logo
add_action( 'after_setup_theme', 'monsite_add_theme_support' );
function monsite_add_theme_support() {
    add_theme_support( 'custom-logo', [
        'height' => 100,
        'width' => 400,
        'flex-width' => true,
    ] );

    add_theme_support('html5'); // Générer des balises et attributs HTML5
    add_theme_support('title-tag'); // Générer la balise <title> dans le head
    add_theme_support('post-thumbnails'); // Activer les images à la une
    add_theme_support('custom-header'); // Activer la personnalisation de l'image du header
    add_theme_support('editor-color-palette'); // Activer la coloration
}

/**
 * Ajouter des formats d'image dans WordPress
 */
add_action('after_setup_theme', 'monsite_add_image_sizes');
function monsite_add_image_sizes() {
    add_image_size('card', 268,150,true);
    add_image_size('imgag', 50,50,true);
}

/**
 * supprimer le tag apres le titre dans WordPress
 */

add_filter('document_title_parts', 'monsite_document_title_parts');
function monsite_document_title_parts($title){
    unset($title['tagline']);
    return $title;
}

/**
 * Enregistrer les emplacements des sidebars (widgets)
 */
add_action('widgets_init', 'monsite_register_sidebars');
function monsite_register_sidebars() {
    register_sidebar([
            'id' => 'home-sidebar',
            'name' => 'Page d\'accueil',
            'description' => 'Widget affichés sur la page d\'accueil' ,
            'before_widget' => '<div id="%1$s" class="widget %2$s card m-3 ">',
            'before_title' => '<h3 class="card-header">',
            'after_title' => '</h3> <div class="card-body">',
            'after_widget'  => '</div> </div>',
        ]
    );
    register_sidebar([
            'id' => 'footer-sidebar',
            'name' => 'Page footer',
            'description' => 'Widget affichés sur le footer' ,
            'before_widget' => '<div id="%1$s" class="widget %2$s mx-3">',
            'before_title' => '<h3>',
            'after_title' => '</h3> <div >',
            'after_widget'  => '</div> </div >',
        ]
    );

}






/**
 * Actualiser les permaliens lorsque l'on active le thème
 */
add_action('after_switch_theme', 'monsite_rewrite_flush');
function monsite_rewrite_flush() {
    projects_cpt_init(); // Appeler la fonction qui permet d'ajouter un CPT
    flush_rewrite_rules(); // Actualiser les permaliens
}
function display_terms_btn(int $id, string $taxonomy) {
    $terms = get_the_terms($id, $taxonomy); // Récupérer la liste des valeurs d'une taxonomie pour un type de contenu
    if (is_array($terms)) {
        foreach ($terms as $term) {
            echo '<a href="' . get_term_link($term) . '" class="btn btn-info mx-1">
                        ' . $term->name . '
                    </a>'
            ;
        }
    }
}






//Enleve les erreurs de la page
remove_action( 'shutdown', 'wp_ob_end_flush_all', 1 );