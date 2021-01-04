<?php

use Carbon_Fields\Block;
use Carbon_Fields\Container;
use Carbon_Fields\Field;

/**
 * CPT service
 */
add_action('init', 'services_cpt_init');
function services_cpt_init(){
	// Créér une nouvelle fonction
	register_post_type('service', [
		'labels' => [
			'name'                  => _x( 'services', 'Post type general name', 'monsite' ),
			'singular_name'         => _x( 'service', 'Post type singular name', 'monsite' ),
			'menu_name'             => _x( 'services', 'Admin Menu text', 'monsite' ),
			'name_admin_bar'        => _x( 'service', 'Add New on Toolbar', 'monsite' ),
			'add_new'               => __( 'Ajouter nouvel service', 'monsite' ),
			'add_new_item'          => __( 'Ajouter Nouvel service', 'monsite' ),
			'new_item'              => __( 'Nouvel service', 'monsite' ),
			'edit_item'             => __( 'Modifier service', 'monsite' ),
			'view_item'             => __( 'Voir service', 'monsite' ),
			'all_items'             => __( 'Toutes les services', 'monsite' ),
			'search_items'          => __( 'Rechercher des services', 'monsite' ),
			'parent_item_colon'     => __( 'service parent :', 'monsite' ),
			'not_found'             => __( 'Aucune service trouvée.', 'monsite' ),
			'not_found_in_trash'    => __( 'Aucune service trouvée dans la corbeille.', 'monsite' ),
			'featured_image'        => _x( 'Image à la un service', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'monsite' ),
			'set_featured_image'    => _x( 'Définir l\'image à la une', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'monsite' ),
			'remove_featured_image' => _x( 'Supprimer l\'image à la une', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'monsite' ),
			'use_featured_image'    => _x( 'Utiliser comme image à la une', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'monsite' ),
			'archives'              => _x( 'Archives des services', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'monsite' ),
			'insert_into_item'      => _x( 'Insérer dans une service', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'monsite' ),
			'uploaded_to_this_item' => _x( 'Uploader dans ce service', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'monsite' ),
			'filter_items_list'     => _x( 'Filtrer la liste des services', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'monsite' ),
			'items_list_navigation' => _x( 'Navigation liste des services', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'monsite' ),
			'items_list'            => _x( 'Liste des services', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'monsite' ),
		],
		'menu_icon' => 'dashicons-megaphone',
		'public' => true,
		'has_archive' => true,
		'rewrite' => ['slug' => 'service'],
		'supports' => [
		    'title',
            'editor',
            'thumbnail'],
	]);









}


