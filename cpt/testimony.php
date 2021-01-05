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
    // Ajouter une taxonomie pour organiser les employees par métiers
    register_taxonomy('job', ['employee'], [
        'label' => 'Métier',
        'rewrite' => ['slug' => 'métier'],
        'hierarchical' => true
    ]);

}

/**
 * Ajouter des champs personnalisé (Custom Fields) sur les testimony
 */
add_action('carbon_fields_register_fields', 'social_register_fields');
function social_register_fields() {


    Block::make( __( 'Gutenberg social Block' ) )
        ->add_fields( array(
            Field::make( 'text', 'heading', __( 'Block Heading' ) ),
            Field::make( 'rich_text', 'content', __( 'Block Content' ) ),
        ) )
        ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
            ?>

            <div class="block">
                <div class="block__heading">
                    <h3><?= esc_html( $fields['heading'] ); ?></h3>
                </div><!-- /.block__heading -->


                <div class="block__content">
                    <?=apply_filters( 'the_content', $fields['content'] ); ?>
                </div><!-- /.block__content -->
            </div><!-- /.block -->

            <?php $query =new WP_Query([
                'post_type'=> 'testimony',
                'orderby' => 'date',
                'order' => 'DESC',
                'posts_per_page'=> -1
            ]); ?>
            <div class=" d-flex">
            <div class=" col-8 row">
            <?php while($query->have_posts()) : $query->the_post(); ?>

                <div class=" single_service d-flex">

                        <div class=" icon">
                            <img class="img_icon2"  src="<?php the_post_thumbnail_url(); ?>" alt="">
                        </div>
                        <div class=" text-center m-auto" >
                        <div class=" mx-2">
                            <h4><?php the_title(); ?></h4>
                        </div>
                        <div class="mx-2 px-2 ">
                            <?php the_content(); ?>
                        </div>
                        </div>

                </div>




            <?php endwhile; ?>
            <?php wp_reset_postdata(); // A mettre après une boucle avec WP_Query ?>
            </div>

            <aside class=" col-4 ">
                <?php   comments_template(); ?>
            </aside>
            </div>
            <?php

        } );



}
