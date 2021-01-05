<?php get_header(); ?>
<div class=" py-3 bg-light">
    <main class="container ">

        <h1>Vos Recherches:</h1>
        <hr>
        <hr>
        <?php if (have_posts()) :  ?>

        <section >

            <?php  while (have_posts()) : the_post(); ?>

                <div class="container mb-2">
                    <div class="row ">
                        <div class="col">
                            <h3><?php the_title(); ?></h3>

                        </div>

                    </div>
                    <div class="row ">
                        <div class="col">
                             <?php the_excerpt(); ?>
                        </div>
                        <div class="col">
                            <a href="<?php the_permalink(); ?>"  class="btn btn-primary"> Voir plus</a>
                        </div>

                    </div>
                </div>
                <hr>











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
