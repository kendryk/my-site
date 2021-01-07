<?php

use Carbon_Fields\Block;
use Carbon_Fields\Container;
use Carbon_Fields\Field;

/**
 * CPT projet
 */
add_action('init', 'projects_cpt_init');
function projects_cpt_init(){
	// Créér une nouvelle fonction
	register_post_type('project', [
		'labels' => [
			'name'                  => _x( 'projects', 'Post type general name', 'monsite' ),
			'singular_name'         => _x( 'project', 'Post type singular name', 'monsite' ),
			'menu_name'             => _x( 'projects', 'Admin Menu text', 'monsite' ),
			'name_admin_bar'        => _x( 'project', 'Add New on Toolbar', 'monsite' ),
			'add_new'               => __( 'Ajouter nouvel project', 'monsite' ),
			'add_new_item'          => __( 'Ajouter Nouvel project', 'monsite' ),
			'new_item'              => __( 'Nouvel project', 'monsite' ),
			'edit_item'             => __( 'Modifier project', 'monsite' ),
			'view_item'             => __( 'Voir project', 'monsite' ),
			'all_items'             => __( 'Toutes les projects', 'monsite' ),
			'search_items'          => __( 'Rechercher des projects', 'monsite' ),
			'parent_item_colon'     => __( 'project parent :', 'monsite' ),
			'not_found'             => __( 'Aucune project trouvée.', 'monsite' ),
			'not_found_in_trash'    => __( 'Aucune project trouvée dans la corbeille.', 'monsite' ),
			'featured_image'        => _x( 'Image à la un project', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'monsite' ),
			'set_featured_image'    => _x( 'Définir l\'image à la une', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'monsite' ),
			'remove_featured_image' => _x( 'Supprimer l\'image à la une', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'monsite' ),
			'use_featured_image'    => _x( 'Utiliser comme image à la une', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'monsite' ),
			'archives'              => _x( 'Archives des projects', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'monsite' ),
			'insert_into_item'      => _x( 'Insérer dans une project', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'monsite' ),
			'uploaded_to_this_item' => _x( 'Uploader dans ce project', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'monsite' ),
			'filter_items_list'     => _x( 'Filtrer la liste des projects', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'monsite' ),
			'items_list_navigation' => _x( 'Navigation liste des projects', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'monsite' ),
			'items_list'            => _x( 'Liste des projects', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'monsite' ),
		],


		'menu_icon' => 'dashicons-html',
		'public' => true,
		'has_archive' => true,
		'rewrite' => [
		        'slug' => 'project',
                'with_front'          => true,
                'pages'               => false,
                'feeds'               => false,
            ],
		'supports' => [
		    'title',
		    'editor',
            'thumbnail',
            'excerpt',


        ],
	]);
    // Ajouter une taxonomie pour organiser les Projects par types
    register_taxonomy('projectType', ['project'], [
        'label' => 'Type de projets',
        'rewrite' => ['slug' => 'projectType'],
        'hierarchical' => true
    ]);


}







/**
 * Ajouter des champs personnalisé (Custom Fields) sur les projects
 */
add_action('carbon_fields_register_fields', 'project_register_fields');
function project_register_fields() {
    Container::make('post_meta', 'Infos project')
        ->where('post_type', '=', 'project') // Le groupe de champs est affiché sur les projects
        ->add_fields([
            Field::make('complex', 'crb_slides', 'Slides images')
                ->set_layout( 'tabbed-horizontal' )
                ->add_fields( [
                    Field::make(
                            'image',
                            'image',
                            'Image' ),
                ]),


            Field::make('complex', 'langages', 'Liste des langages')
                ->set_layout('tabbed-horizontal')
                ->setup_labels([
                    'plural_name' => 'Langages',
                    'singular_name' => 'Langage',


                ])
                ->add_fields([
                    Field::make('association', 'langage', 'Langages')
                        ->set_types([
                            [
                                    'type' => 'post',
                                    'post_type' => 'langage']
                        ])
                        ->set_min(1)
                        ->set_max(1),
                ]),


        ])
    ;

    Block::make( __( 'Gutenberg Block' ) )
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

            <?php $project =new WP_Query([
                'post_type'=> 'project',
                'orderby' => 'date',
                'order' => 'DESC',
                'posts_per_page'=> -1
            ]); ?>

<!--                Création des boutons isotopes-->
            <div class="button-group filter-button-group">
            <button data-filter="*" class="btn btn-success m-1">Show all</button>
<!--                boucle avec wp query pour récupérer donnée des langages-->
                <?php $query =new WP_Query(['post_type'=> 'langage', 'posts_per_page'=> -1]); ?>
                <?php foreach( $query->posts as $post ): ?>
                    <?php $post_title=$post->post_title; ?>
                    <?php $post_name=$post->post_name; ?>
                    <button data-filter=".<?=$post_name; ?>"  class="btn btn-info m-1"><?=$post_title; ?></button>
                <?php endforeach; ?>
                <?php wp_reset_postdata(); // A mettre après une boucle avec WP_Query ?>

            </div>


            <div class="button-group filter-button-group">
                <button data-filter="*" class="btn btn-success m-1">Show all</button>
            <?php
                $types = get_terms([ 'taxonomy' => 'projectType','hide_empty' => false ]);?>
                <?php foreach( $types as $type ): ?>

                <button data-filter=".<?=$type->slug; ?>" class="btn btn-info m-1"><?=$type->name; ?></button>

                <?php endforeach; ?>
            </div>


            <!--                Création des grid isotopes-->
            <div class="grid">
                <?php while($project->have_posts()) : $project->the_post(); ?>

                    <a class="grid-item

                    <?php
//                    boucle pour les langages pour chaque projets
                    $langages = carbon_get_the_post_meta( 'langages');
                    foreach ($langages as $langage){
                    $current_langage = get_post($langage['langage'][0]['id']);
                    echo $current_langage->post_name,' ';}

                     $types = get_the_terms(get_the_ID(),'projectType');
                    foreach ($types as $type){
                        echo$type->slug,' ';}

                    ?>

                    " href="<?php the_permalink(); ?>">

                        <div class="card m-2 text-center ">
                            <div>
                                <div class=" img-size p-5 mb-3"
                                     style="background-image:url('<?php the_post_thumbnail_url(); ?>')">
                                </div>
                            </div>
                            <h3><?php the_title(); ?></h3>
                            <div class="d-flex justify-content-around">

<!--                                    boucle sur les langages(image) par projets-->
                            <?php foreach ($langages as $langage) {
                                 $current_langage = get_post($langage['langage'][0]['id']);
                                 $post_id=$current_langage->ID;
                                 echo get_the_post_thumbnail( $post_id, 'imgag' ) ;
                            } ?>

                        </div>
                        </div>
                    </a>

                <?php endwhile; ?>
                <?php wp_reset_postdata(); // A mettre après une boucle avec WP_Query ?>

            </div>


            <?php

        } );



}