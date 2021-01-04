<?php get_header(); ?>
<div class=" py-3 bg-light">
    <main class="container ">

        <h1>Vos Recherches:</h1>
        <?php if (have_posts()) :  ?>

        <section class="border">

            <?php  while (have_posts()) : the_post(); ?>

                <article class="col">
                    <div class="d-flex">
                        <div>
                        <div class="card-body">
                            <h3 class="card-title"><?php the_title(); ?></h3>
                            <?php the_excerpt(); ?>
                        </div>


                        <div class="card-footer d-flex justify-content-end">
                            <a href="<?php the_permalink(); ?>" class="btn btn-primary">
                                Voir plus
                            </a>
                        </div>
                    </div>

                    </div>
                </article>

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
