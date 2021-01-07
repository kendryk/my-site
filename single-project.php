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
                        <h1 class="mb-3 "><?php the_title(); ?></h1>
                        <hr/>
                        <h5>Les différents langages et frameworks utilisé:</h5>

                        <?php foreach ($langages as $langage) : ?>
                            <?php $current_langage = get_post($langage['langage'][0]['id']); ?>

                            <?php $post_id=$current_langage->ID; ?>
                            <?= get_the_post_thumbnail( $post_id, 'imgag' ) ; ?>

                        <?php endforeach; ?>


                        <hr/>
                        <?php display_terms_btn(get_the_ID(), 'projectType'); ?>
                        <hr/>

                        <p><?php the_content(); ?></p>
                        <hr/>
                            <!-- Mise en place des images -->
                            <!--[X]do ajouter si pas d'images
                            do : hover image agrandit.-->

                        <?php if (empty($slides)) : ?>
                        <?php else : ?>
                            <h5>Quelques images:</h5>

                        <div>

                            <?php $i = 0; ?>

                            <?php foreach ( $slides as $slide ) {

                        $img_url = wp_get_attachment_image_src($slide['image'],$size = 'full');
                        $img_slide = $img_url[0];?>

                                <img id="myImg-<?= $i ; // Affichage de l'incrément ?>"
                                     src="<?= $img_slide; ?>"
                                     class="img_size"
                                     alt="">

                                <!-- The Modal -->
                                <div id="myModal-<?= $i ; // Affichage de l'incrément ?>" class="modal">

                                    <img class="modal-content" id="img01-<?= $i ; // Affichage de l'incrément ?>">
                                    <div class="caption" id="caption-<?= $i ; // Affichage de l'incrément ?>"></div>

                                <!-- Pied de page modal -->
                                <div  class = "modal-footer" >
                                    <button  id="button-<?= $i ; // Affichage de l'incrément ?>"
                                             type = "button"
                                             class = "btn btn-danger fermeture"
                                    > Fermer
                                    </button >
                                </div >
                                </div>
                           <?php $i ++;
                            }; ?>

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
