<?php

use Carbon_Fields\Block;
use Carbon_Fields\Container;
use Carbon_Fields\Field;

/**
 * CPT social
 */
add_action('init', 'social_networks_cpt_init');
function social_networks_cpt_init(){
	// Créér une nouvelle fonction
	register_post_type('social_network', [
		'labels' => [
			'name'                  => _x( 'social_networks', 'Post type general name', 'monsite' ),
			'singular_name'         => _x( 'social_network', 'Post type singular name', 'monsite' ),
			'menu_name'             => _x( 'social_networks', 'Admin Menu text', 'monsite' ),
			'name_admin_bar'        => _x( 'social_network', 'Add New on Toolbar', 'monsite' ),
			'add_new'               => __( 'Ajouter nouveau social_network', 'monsite' ),
			'add_new_item'          => __( 'Ajouter nouveau social_network', 'monsite' ),
			'new_item'              => __( 'nouveau social_network', 'monsite' ),
			'edit_item'             => __( 'Modifier social_network', 'monsite' ),
			'view_item'             => __( 'Voir social_network', 'monsite' ),
			'all_items'             => __( 'Tous les social_networks', 'monsite' ),
			'search_items'          => __( 'Rechercher des social_networks', 'monsite' ),
			'parent_item_colon'     => __( 'social_network parent :', 'monsite' ),
			'not_found'             => __( 'Aucun social_network trouvé.', 'monsite' ),
			'not_found_in_trash'    => __( 'Aucun social_network trouvé dans la corbeille.', 'monsite' ),
			'featured_image'        => _x( 'Image à la une social_network', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'monsite' ),
			'set_featured_image'    => _x( 'Définir l\'image à la une', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'monsite' ),
			'remove_featured_image' => _x( 'Supprimer l\'image à la une', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'monsite' ),
			'use_featured_image'    => _x( 'Utiliser comme image à la une', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'monsite' ),
			'archives'              => _x( 'Archives des social_networks', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'monsite' ),
			'insert_into_item'      => _x( 'Insérer dans un social_network', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'monsite' ),
			'uploaded_to_this_item' => _x( 'Uploader dans ce social_network', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'monsite' ),
			'filter_items_list'     => _x( 'Filtrer la liste des social_networks', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'monsite' ),
			'items_list_navigation' => _x( 'Navigation liste des social_networks', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'monsite' ),
			'items_list'            => _x( 'Liste des social_networks', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'monsite' ),
		],
		'menu_icon' => 'dashicons-networking',
		'public' => true,
		'has_archive' => true,
		'rewrite' => ['slug' => 'social_network'],
		'supports' => [
		    'title',
            'thumbnail',




            ],
	]);


}

/**
 * Ajouter des champs personnalisé (Custom Fields) sur les réseaux_sociaux (post type "recipe")
 */
add_action('carbon_fields_register_fields', 'social_networks_register_fields');
function social_networks_register_fields()
{
    Container::make('post_meta', 'Infos Réseaux sociaux')
        ->where('post_type', '=', 'social_network') // Le groupe de champs est affiché sur les social_networks
        ->add_fields([
            Field::make_complex( 'social-networks', 'Liste des réseaux sociaux')
                ->set_layout('tabbed-vertical')
                ->setup_labels([
                    'plural_name' => 'Réseaux sociaux',
                    'singular_name' => 'Réseau social',
                ])
                ->add_fields([
                    Field::make('icon','icon','icône'),
                    Field::make_text('url', 'URL'),


                ]),
            ])
    ;
}


