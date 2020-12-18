<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- Vérifier si un menu a été associée à l'emplacement menu-top dans l'admin -->
<?php if (has_nav_menu('menu-top')): ?>

        <!--affiche le menu-->

<?php get_template_part('template-parts/header/header_navbar', get_post_type()); ?>


<?php endif; ?>