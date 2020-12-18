<?php get_header(); ?>
<div class=" py-3 bg-light">
    <main class="container ">

        <h1>Vos Recherches:</h1>
        <?php if (have_posts()) :  ?>

        <section class="row row-cols-1 row-cols-md-4 g-4">

            <?php  while (have_posts()) : the_post(); ?>


                <?php get_template_part('template-parts/content', get_post_type()); ?>
                </br>

            <?php endwhile; else : ?>

                <p>Aucun Résultat</p>

            <?php endif; ?>
        </section>
    </main>


    <section class=" row my-5"></section>

    <section class="row my-5"></section>

    <section class=" row my-5"></section>

    <section class=" row my-5"></section>

    <section class=" row my-5"></section>
</div>




<?php get_footer(); ?>
