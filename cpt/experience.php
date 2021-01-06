<?php

use Carbon_Fields\Block;
use Carbon_Fields\Container;
use Carbon_Fields\Field;

/**
 * CPT experience
 */
add_action('init', 'experiences_cpt_init');
function experiences_cpt_init(){
    // Créér une nouvelle fonction
    register_post_type('experience', [
        'labels' => [
            'name'                  => _x( 'expériences', 'Post type general name', 'monsite' ),
            'singular_name'         => _x( 'expérience', 'Post type singular name', 'monsite' ),
            'menu_name'             => _x( 'expériences', 'Admin Menu text', 'monsite' ),
            'name_admin_bar'        => _x( 'expérience', 'Add New on Toolbar', 'monsite' ),
            'add_new'               => __( 'Ajouter nouvel expérience', 'monsite' ),
            'add_new_item'          => __( 'Ajouter Nouvel expérience', 'monsite' ),
            'new_item'              => __( 'Nouvel expérience', 'monsite' ),
            'edit_item'             => __( 'Modifier expérience', 'monsite' ),
            'view_item'             => __( 'Voir expérience', 'monsite' ),
            'all_items'             => __( 'Toutes les expériences', 'monsite' ),
            'search_items'          => __( 'Rechercher des expériences', 'monsite' ),
            'parent_item_colon'     => __( 'expérience parent :', 'monsite' ),
            'not_found'             => __( 'Aucune expérience trouvée.', 'monsite' ),
            'not_found_in_trash'    => __( 'Aucune expérience trouvée dans la corbeille.', 'monsite' ),
            'featured_image'        => _x( 'Image à la un expérience', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'monsite' ),
            'set_featured_image'    => _x( 'Définir l\'image à la une', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'monsite' ),
            'remove_featured_image' => _x( 'Supprimer l\'image à la une', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'monsite' ),
            'use_featured_image'    => _x( 'Utiliser comme image à la une', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'monsite' ),
            'archives'              => _x( 'Archives des expériences', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'monsite' ),
            'insert_into_item'      => _x( 'Insérer dans une expérience', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'monsite' ),
            'uploaded_to_this_item' => _x( 'Uploader dans cette expérience', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'monsite' ),
            'filter_items_list'     => _x( 'Filtrer la liste des expériences', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'monsite' ),
            'items_list_navigation' => _x( 'Navigation liste des expériences', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'monsite' ),
            'items_list'            => _x( 'Liste des expériences', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'monsite' ),
        ],
        'menu_icon' => 'dashicons-awards',
        'public' => true,
        'has_archive' => true,
        'rewrite' => ['slug' => 'experience'],
        'supports' => [
            'title',
            'editor',
            'excerpt',


        ],
    ]);

}

/**
 * Ajouter des champs personnalisé (Custom Fields) sur les experiences
 */
add_action('carbon_fields_register_fields', 'experience_register_fields');
function experience_register_fields() {
    Container::make('post_meta', 'Infos expérience')
        ->where('post_type', '=', 'experience') // Le groupe de champs est affiché sur les experiences
        ->add_fields([

            Field::make( 'date', 'crb_event_start_date', __( 'Choisir une date de début' ) )
                ->set_storage_format( 'd F Y' )
                ->set_input_format( 'd F Y', 'd F Y' ),

            Field::make( 'date', 'crb_event_end_date', __( 'Choisir une date de fin' ) )
                ->set_storage_format( 'd F Y' )
                ->set_input_format( 'd F Y', 'd F Y' ),

        ])
    ;

    Block::make( __( 'My Shiny Gutenberg Block' ) )
        ->add_fields( array(
            Field::make( 'text', 'heading', __( 'Block Heading' ) ),
            Field::make( 'rich_text', 'content', __( 'Block Content' ) ),
        ) )
        ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {

            $querry =new WP_Query([
                'post_type'=> 'experience',
                'posts_per_page'=> -1
            ]);
            ?>



            <div class="block">
                <div class="block__heading">
                    <h3><?php echo esc_html( $fields['heading'] ); ?></h3>
                </div><!-- /.block__heading -->

                <div class="block__content">
                    <?php echo apply_filters( 'the_content', $fields['content'] ); ?>
                </div><!-- /.block__content -->
            </div><!-- /.block -->


            <?php while ($querry->have_posts()){$querry->the_post(); ?>

                <?php $date_start = carbon_get_the_post_meta('crb_event_start_date'); ?>
                <?php $date_end = carbon_get_the_post_meta('crb_event_end_date'); ?>


               <div class="experience">
               <div class="timeline">
                   <p> Du
                       <br>
                       <?=  $date_start; ?>
                       <br>

                       <?php if ($date_end === ""): ?>
                           à
                           <br>
                           aujourd'hui

                       <?php else: ?>
                           au
                           <br>
                           <?=  $date_end; ?>

                       <?php endif; ?>

                   </p>
               </div>
               <div class="content">
                   <h4>  <?= the_title() ; ?> </h4>
                   <div class="myExcerpt"><?= the_excerpt(); ?></div>
                   <div class="myContent"><?= the_content(); ?></div>
               </div>

                </div>


            <?php
            wp_reset_postdata();
        }
        } );



}


