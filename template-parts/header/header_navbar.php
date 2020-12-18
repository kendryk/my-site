<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <?php if (has_custom_logo()): ?>
        <?php the_custom_logo(); ?>
    <?php else: ?>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <a class="navbar-brand" href="#">

            <?php bloginfo('name'); ?>
            <?php endif; ?>

            <?php
            wp_nav_menu( array(
                'theme_location'    => 'menu-top',
                'depth'             => 2,
                'container'         => 'div',
                'container_class'   => 'collapse navbar-collapse',
                'container_id'      => 'bs-example-navbar-collapse-1',
                'menu_class'        => 'nav navbar-nav',
                'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                'walker'            => new WP_Bootstrap_Navwalker(),
            ) );
            ?>

        </a>

        <?php get_search_form(); ?>

    </div>


</nav>

