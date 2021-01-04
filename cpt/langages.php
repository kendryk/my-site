<?php

use Carbon_Fields\Block;
use Carbon_Fields\Container;
use Carbon_Fields\Field;

/**
 * CPT langage
 */
add_action('init', 'translations_cpt_init');
function translations_cpt_init(){
	// Créér une nouvelle fonction
	register_post_type('langage', [
		'labels' => [
			'name'                  => _x( 'languages', 'Post type general name', 'monsite' ),
			'singular_name'         => _x( 'language', 'Post type singular name', 'monsite' ),
			'menu_name'             => _x( 'languages', 'Admin Menu text', 'monsite' ),
			'name_admin_bar'        => _x( 'language', 'Add New on Toolbar', 'monsite' ),
			'add_new'               => __( 'Ajouter nouveau language', 'monsite' ),
			'add_new_item'          => __( 'Ajouter nouveau language', 'monsite' ),
			'new_item'              => __( 'nouveau language', 'monsite' ),
			'edit_item'             => __( 'Modifier language', 'monsite' ),
			'view_item'             => __( 'Voir language', 'monsite' ),
			'all_items'             => __( 'Tous les languages', 'monsite' ),
			'search_items'          => __( 'Rechercher des languages', 'monsite' ),
			'parent_item_colon'     => __( 'language parent :', 'monsite' ),
			'not_found'             => __( 'Aucun language trouvé.', 'monsite' ),
			'not_found_in_trash'    => __( 'Aucun language trouvé dans la corbeille.', 'monsite' ),
			'featured_image'        => _x( 'Image à la une language', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'monsite' ),
			'set_featured_image'    => _x( 'Définir l\'image à la une', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'monsite' ),
			'remove_featured_image' => _x( 'Supprimer l\'image à la une', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'monsite' ),
			'use_featured_image'    => _x( 'Utiliser comme image à la une', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'monsite' ),
			'archives'              => _x( 'Archives des languages', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'monsite' ),
			'insert_into_item'      => _x( 'Insérer dans un language', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'monsite' ),
			'uploaded_to_this_item' => _x( 'Uploader dans ce language', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'monsite' ),
			'filter_items_list'     => _x( 'Filtrer la liste des languages', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'monsite' ),
			'items_list_navigation' => _x( 'Navigation liste des languages', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'monsite' ),
			'items_list'            => _x( 'Liste des languages', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'monsite' ),
		],
		'menu_icon' => 'dashicons-translation',
		'public' => true,
		'has_archive' => true,
		'rewrite' => ['slug' => 'language'],
		'supports' => ['title',  'thumbnail'],
	]);







}


