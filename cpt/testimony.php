<?php

use Carbon_Fields\Block;
use Carbon_Fields\Container;
use Carbon_Fields\Field;

/**
 * CPT temoignage
 */
add_action('init', 'testimonies_cpt_init');
function testimonies_cpt_init(){
	// Créér une nouvelle fonction
	register_post_type('testimony', [
		'labels' => [
			'name'                  => _x( 'témoignages', 'Post type general name', 'monsite' ),
			'singular_name'         => _x( 'témoignage', 'Post type singular name', 'monsite' ),
			'menu_name'             => _x( 'témoignages', 'Admin Menu text', 'monsite' ),
			'name_admin_bar'        => _x( 'témoignage', 'Add New on Toolbar', 'monsite' ),
			'add_new'               => __( 'Ajouter nouvel témoignage', 'monsite' ),
			'add_new_item'          => __( 'Ajouter Nouvel témoignage', 'monsite' ),
			'new_item'              => __( 'Nouvel témoignage', 'monsite' ),
			'edit_item'             => __( 'Modifier témoignage', 'monsite' ),
			'view_item'             => __( 'Voir témoignage', 'monsite' ),
			'all_items'             => __( 'Toutes les témoignages', 'monsite' ),
			'search_items'          => __( 'Rechercher des témoignages', 'monsite' ),
			'parent_item_colon'     => __( 'témoignage parent :', 'monsite' ),
			'not_found'             => __( 'Aucune témoignage trouvée.', 'monsite' ),
			'not_found_in_trash'    => __( 'Aucune témoignage trouvée dans la corbeille.', 'monsite' ),
			'featured_image'        => _x( 'Image à la un témoignage', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'monsite' ),
			'set_featured_image'    => _x( 'Définir l\'image à la une', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'monsite' ),
			'remove_featured_image' => _x( 'Supprimer l\'image à la une', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'monsite' ),
			'use_featured_image'    => _x( 'Utiliser comme image à la une', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'monsite' ),
			'archives'              => _x( 'Archives des témoignages', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'monsite' ),
			'insert_into_item'      => _x( 'Insérer dans une témoignage', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'monsite' ),
			'uploaded_to_this_item' => _x( 'Uploader dans ce témoignage', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'monsite' ),
			'filter_items_list'     => _x( 'Filtrer la liste des témoignages', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'monsite' ),
			'items_list_navigation' => _x( 'Navigation liste des témoignages', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'monsite' ),
			'items_list'            => _x( 'Liste des témoignages', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'monsite' ),
		],
		'menu_icon' => 'dashicons-testimonial',
		'public' => true,
		'has_archive' => true,
		'rewrite' => ['slug' => 'connaissance'],
		'supports' => [
		    'title',
		    'editor',
            'thumbnail',




        ],
	]);







}


