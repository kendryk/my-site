<?php get_header();
?>
<div class=" py-3 bg-light">
    <main class="container ">
        <?php if (have_posts()) :  ?>
        <header class="page-header mb-5  ">
            <?php
            the_archive_title( '<h1 class="page-title">', '</h1>' );
            ?>
        </header>
        <section >

            <?php  while (have_posts()) : the_post(); ?>

                <h3 class=" mb-3 "><?php the_title(); ?></h3>
                <hr/>
                <div class="d-flex mb-3">
                    <div class=" col-2 mr-2">
                        <img class="picture_size" src="<?php the_post_thumbnail_url(); ?>" alt="">
                    </div>
                    <div class=" col-6 mr-2">
                        <p><?php the_content(); ?></p>
                    </div>


<!--              --------------------------   Container langages -------------------  -->
                    <div class=" col-4 mr-2">
                        <div class="container">
                            <div class="row row-cols-1">
                                <div class="col"> <h5> Langages:</h5></div>
                            <div>
                            <?php $langages = carbon_get_the_post_meta('langages'); ; ?>
                            <?php foreach ($langages as $langage) : ?>
                            <?php $current_langage = get_post($langage['langage'][0]["id"]); ?>
                            <?php $post_id=$current_langage->ID; ?>
                            <?= get_the_post_thumbnail( $post_id, 'imgag' ) ; ?>

                            <?php endforeach; ?>
                            </div>

                                <hr class="p-2 my-2">

<!--TODO corriger bug si image null mise en prod-->
<!--TODO demande aide sur JS-->
                                <?php $slides = carbon_get_the_post_meta( 'crb_slides' );?>

                                <?php if (empty ($slides)): ?>
                                <?php else : ?>
                                    <div class="col"> <h5>Photos :</h5> </div>
                                    <div>
                                        <?php foreach ( $slides as $slide ) {
                                            $img_url = wp_get_attachment_image_src($slide['image'],$size = 'imgag');
                                            $img_slide = $img_url[0];?>

                                            <img src="<?= $img_slide; ?>"
                                                 class="img_size2"
                                                 alt="">
                                        <?php
                                        }; ?>
                                    </div>

                                <?php endif; ?>

                                <hr class=" p-2 my-2">
                                <a href="<?php the_permalink(); ?>" class="btn btn-primary">Voir plus</a>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endwhile; else : ?>

                <p>Aucun élément à afficher</p>

            <?php endif; ?>
        </section>
    </main>
</div>

<?php get_footer(); ?>
