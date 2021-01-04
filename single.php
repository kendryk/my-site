<?php get_header(); ?>


<div class=" py-3 bg-light">
    <main class="container  ">



        <?php if (have_posts()) :  ?>
            <?php  while (have_posts()) : the_post(); ?>

                <div class="row mt-5">
                    <div class=" title_content  col-4 ">
                        <h2 class=" mb-3 "><?php the_title(); ?></h2>
                        <hr/>
                        <p><?php the_content(); ?></p>
                    </div>
                    <div class="picture col-8">
                        <img class="picture_size" src="<?php the_post_thumbnail_url(); ?>" alt="">

                    </div>


                </div>





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
