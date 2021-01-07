<!-- Footer -->
<footer class=" bg-dark text-white  pt-4">

    <!-- Footer Links -->
    <section class="container text-center text-md-left">
	    <?php if (has_nav_menu('menu-footer')): ?>
        <!-- Footer links -->
        <article class="col-12 row text-center text-md-left mt-3 pb-3">

            <!-- Grid column -->
            <div class="col-2 d-flex flex-column justify-content-around align-items-center ">
               <?php the_custom_logo(); ?>

            </div>
            <!--   Affiche le menu menu-footer -->
            <div class="col-5  ">
            <nav class=" text-white " >
                <div>
			        <?php wp_nav_menu([
				        'theme_location' => 'menu-footer',
				        'depth'             => 2,
				        'container'         => 'div',
				        'container_class'   => 'd-flex justify-content-end ',
				        'container_id'      => '',
				        'menu_class'        => 'list-unstyled',
				        'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
				        'walker'            => new WP_Bootstrap_Navwalker(),
			        ]); ?>

                </div>
            </div>




            <div class="col-5 d-flex justify-content-end ">
                <?php if (is_active_sidebar('footer-sidebar')): ?>
                    <?php dynamic_sidebar('footer-sidebar'); ?>
                <?php endif; ?>
            </div>


        </article>
        <!-- Footer links -->

        <hr>

        <!-- Grid row -->
        <div class="d-flex justify-content-center">

            <!-- Grid column -->
            <div class="col-md-7 col-lg-8">

                <!--Copyright-->
                <p class="text-center text-md-left">© <?= date('Y'); ?> Copyright:
                    <a href="">
                        <strong>  <?php bloginfo('description'); ?></strong>
                    </a>
                </p>



            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-5 col-lg-4 ml-lg-0">

                <!-- Social buttons -->

                <div class=" d-flex justify-content-end">

                    <?php
                        $social= new WP_Query([
                            'post_type' => 'social_network',
                            'order' => 'DESC',
                        ]);
                        ?>

                    <?php while($social->have_posts()) : $social->the_post(); ?>
                        <?php $social_networks = carbon_get_the_post_meta('social-networks'); ?>

                        <?php foreach ($social_networks as $social_network) : ?>

                            <a href=" <?= $social_network['url'];  ?>">
                                <i class="<?= $social_network['icon']['class']; ?> mx-3"></i>
                            </a>
                        <?php endforeach; ?>

                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); // A mettre après une boucle avec WP_Query ?>

                </div>



            </div>
            <!-- Grid column -->

        </div>
        <!-- Grid row -->

    </section>
    <!-- Footer Links -->

</footer>
<!-- Footer -->








<?php endif; ?>
<?php wp_footer(); ?>

</body>
</html>

