<?php get_header(); ?>

    <header class="header-picture px-5 pt-5 pb-0 " style="background-image: url('<?php header_image(); ?>');">
        <div class="container-fluid text-center  ">
            <div class="row">
            <div class="col-6 d-flex flex-column justify-content-center ">
            <?php while (have_posts()) : the_post(); ?>
                <h1><?php the_title(); ?></h1>
                <?php the_content(); ?>
            <?php endwhile; ?>
            </div>
            <div class="col-6 ">
                <img src="<?php the_post_thumbnail_url(); ?>" alt="">
            </div>
            </div>
        </div>


    </header>

    <main>

<!--        mes services:-->

        <div class="service_area">
            <div class="container">
                <div class="row">

                        <div class="section_title mb-3">
                            <h2>Mes Services :</h2>
                        </div>

                </div>
                <section id="services" class="row">
                        <!-- Afficher les services -->
                        <?php
                        $service = new WP_Query([
                            'post_type' => 'service',
                            'orderby' => 'date',
                            'order' => 'DESC',
                        ]);
                        ?>
                        <?php while($service->have_posts()) : $service->the_post(); ?>
                            <?php get_template_part('template-parts/content/content_service', get_post_type()); ?>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); // A mettre après une boucle avec WP_Query ?>
                </section>
            </div>
        </div>



        <!--mes projects -->
        <div class="service_project">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title mb-3">
                        <h3>Mes derniers projets :</h3>
                    </div>
                </div>
            </div>

            <section id="last-Projects">
                    <!-- Afficher la liste des derniers Projects -->
<!--                todo ajouter un slide sur la liste des projets-->
                    <?php
                    $query = new WP_Query([
                        'post_type' => 'project',
                        'orderby' => 'date',
                        'order' => 'DESC',
                        'posts_per_page' => 6

                    ]);
                    ?>
                    <?php while($query->have_posts()) : $query->the_post(); ?>
                        <?php get_template_part('template-parts/content/content_card', get_post_type()); ?>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); // A mettre après une boucle avec WP_Query ?>
            </section>
        </div>
    </div>

<!--        les témoignages-->
        <div class="service_testimonial">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="section_title mb-3">
                            <h2>Les témoignages :</h2>
                        </div>
                    </div>
                </div>

                    <section id="testimonies" ">
                        <!-- Afficher la liste des derniers articles -->
                        <?php
                        $query = new WP_Query([
                            'post_type' => 'testimony',
                            'posts_per_page' => -1
                        ]);
                        ?>

                        <?php while($query->have_posts()) : $query->the_post(); ?>
                            <article class="testimonials-elem d-flex ">
                                <div class="testimonial-elem-profil ">
                                    <?php the_post_thumbnail('profil', ); ?>
                                </div>

                                <div class="testimonials-elem-text ">
                                        <h3><?php the_title(); ?></h3>
                                        <?php the_content(); ?>
                                </div>

                            </article>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); // A mettre après une boucle avec WP_Query ?>
                    </section>

            </div>
        </div>
        <!-- ajout de la sidebar -->

        <aside >

            <?php if (is_active_sidebar('home-sidebar')): ?>
                <?php dynamic_sidebar('home-sidebar'); ?>
            <?php endif; ?>
        </aside>


    </main>
















<?php get_footer(); ?>