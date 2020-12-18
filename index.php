<?php get_header(); ?>



<div class=" py-3 bg-light">
    <main class="container  ">

        <?php if (have_posts()) :  ?>
            <?php  while (have_posts()) : the_post(); ?>
                <?php get_template_part('template-parts/content/content', get_post_type()); ?>
            <?php endwhile; else : ?>
                <p>Aucun élément à afficher</p>
            <?php endif; ?>

    </main>


    <section class=" row my-5"></section>

    <section class="row my-5"></section>

    <section class=" row my-5"></section>

    <section class=" row my-5"></section>

    <section class=" row my-5"></section>



</div>

<?php get_footer(); ?>
