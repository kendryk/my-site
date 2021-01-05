<?php get_header(); ?>

INDEX


<div class=" py-3 bg-light">
    <main class="container  ">


        <?php if (have_posts()) :  ?>
            <?php  while (have_posts()) : the_post(); ?>

                <h1 class=" mb-3 "><?php the_title(); ?></h1>
            <hr/>
                <p><?php the_content(); ?></p>

            <?php endwhile; else : ?>
                <p>Aucun élément à afficher</p>
            <?php endif; ?>

    </main>

    <section class="row my-5"></section>
    <section class="row my-5"></section>
    <section class="row my-5"></section>
    <section class="row my-5"></section>
    <section class="row my-5"></section>

</div>

<?php get_footer(); ?>
