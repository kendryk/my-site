<?php

use Carbon_Fields\Widget;
use Carbon_Fields\Field;

class ContactWidget extends Widget {

    public function __construct()
    {
        $this->setup( 'contact_widget',
            'Pour me contacter ',
            'Affiche les informations de Contact',
            array(
                Field::make(
                    'text',
                    'title',
                    'Title'
                )->set_default_value( 'Contact' ),
            ) );
    }

    public function front_end( $args, $instance ) {

        echo $args['before_title'] . $instance['title'] . $args['after_title'];

        $query = new WP_Query([
            'post_type' => 'page',
            'post_status' => 'public',
            'meta_query' => [
                [
                    'key'  => '_wp_page_template',
                    'value' => 'template-contact.php',
                ]
            ]
        ]);
        while ( $query->have_posts() ) : $query->the_post();
            echo '<p>' .  carbon_get_the_post_meta( 'address' ).'</p>',
                '<p>' . carbon_get_the_post_meta( 'email' ) .'</p>',
                '<p>' . carbon_get_the_post_meta( 'phone' ) .'</p>'
            ;

        endwhile;


    }
}
