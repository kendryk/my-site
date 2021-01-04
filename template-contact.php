<?php
// Template Name: Contact
get_header();
?>

<div class=" py-3 bg-light">
    <main class="container  ">

        <?php if (have_posts()) :  ?>
            <?php  while (have_posts()) : the_post(); ?>

                <h1 class=" mb-3 "><?php the_title(); ?></h1>
                <hr/>
                <?php the_content(); ?>

            <section class="row">
                <div class="col-8 col-md-6">
                    <h3>Vous pouvez me <strong>contacter</strong> </h3>
                    <?= do_shortcode('[contact-form-7   id="'.carbon_get_the_post_meta('form_id').'" title="Formulaire pour me contacter"]'); ?>
                </div>

                <div class="col-4">
                <h3>Mon adresse : </h3>

                <ul class=" list-group">
                    <li class="list-group mb-1 border-bottom">
                        <strong>Adresse/Ville :</strong>
                        <?= carbon_get_the_post_meta('address'); ?></li>

                    <li class="list-group mb-1 border-bottom">
                        <strong>Tel :</strong>
                        <a href="tel:<?= carbon_get_the_post_meta('phone'); ?>">
                            <?= carbon_get_the_post_meta('phone'); ?>
                        </a>
                    </li>

                    <li class="list-group mb-1 border-bottom">
                        <strong>Email :</strong>
                        <a href="mailto:<?= carbon_get_the_post_meta('email'); ?>">
                            <?= carbon_get_the_post_meta('email'); ?>
                        </a>
                </ul>
                    </div>

            </section>

            <?php endwhile; else : ?>
            <p>Aucun élément à afficher</p>
        <?php endif; ?>












    </main>








</div>





















<?php get_footer(); ?>
