<?php get_header();

$slides = carbon_get_the_post_meta( 'crb_slides' );
$langages = carbon_get_the_post_meta('langages');
?>




<section class=" py-3 bg-light">
    <main class="container  ">

        <?php if (have_posts()) :  ?>
            <?php  while (have_posts()) : the_post(); ?>

                <article class="row mt-5">
                    <section class=" title_content  col-4 ">
                        <h1 class=" mb-3 "><?php the_title(); ?></h1>
                        <hr/>
                        <h5>Les différents langages:</h5>

                        <?php foreach ($langages as $langage) : ?>
                            <?php $current_langage = get_post($langage['langage'][0]['id']); ?>

                            <?php $post_id=$current_langage->ID; ?>
                            <?= get_the_post_thumbnail( $post_id, 'imgag' ) ; ?>

                        <?php endforeach; ?>


                        <hr/>
                        <h5>textes:</h5>
                        <p><?php the_content(); ?></p>
                        <hr/>
                            <!-- Mise en place des images -->
                            <!--[X] ajouter si pas d'images
                            todo : hover image agrandit.-->

                        <?php if (empty($slides)) : ?>
                        <?php else : ?>
                            <h5>Images:</h5>
                        <div class="picture-box ">
                            <?php foreach ( $slides as $slide ) {
                        $img_url = wp_get_attachment_image_src($slide['image'],$size = 'full');
                        $img_slide = $img_url[0];?>
                            <div class="picture-thumbnail-single" style='background-image:url("<?= $img_slide ; ?>" )'>
                            </div>
                           <?php }; ?>

                        </div>

                        <?php endif; ?>

                    </section>

                    <section class="picture col-8">
                        <img class="picture_size" src="<?php the_post_thumbnail_url(); ?>" alt="">

                    </section>


                </article>





            <?php endwhile; else : ?>
            <p>Aucun élément à afficher</p>
        <?php endif; ?>

    </main>
    <div class="row my-5"></div>
    <div class="row my-5"></div>
    <div class="row my-5"></div>
    <div class="row my-5"></div>
    <div class="row my-5"></div>

</section>

<?php get_footer(); ?>
