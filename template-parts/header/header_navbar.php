<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

    <?php if (has_custom_logo()): ?>
        <?php the_custom_logo(); ?>
    <?php else: ?>
        <?php bloginfo('name'); ?>
    <?php endif; ?>


    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

        <?php
        wp_nav_menu( array(
            'theme_location'    => 'menu-top',
            'depth'             => 2,
            'container'         => 'div',
            'container_class'   => 'collapse navbar-collapse',
            'container_id'      => 'navbarSupportedContent',
            'menu_class'        => 'nav navbar-nav',
            'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
            'walker'            => new WP_Bootstrap_Navwalker(),
        ) );



        ?>


    <?php get_search_form(); ?>

</nav>