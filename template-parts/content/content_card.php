<article class="card-size mb-3 mx-1">
    <div class="d-flex p-2 ">
        <div>
            <div class="picture-thumbnail" style="background-image:url(<?php the_post_thumbnail_url(); ?>)"></div>
        </div>

        <div>
            <div class="card-body ">

                <h5 class="card-title"><?php the_title(); ?></h5>
                <p class="card-text"><?php the_excerpt(); ?> </p>
            </div>

        </div>

    </div>

        <div class="d-flex justify-content-around p-2 bg-darkblue dezoom">
        <?php display_terms_btn(get_the_ID(), 'projectType'); ?>
        <hr>
        <a href="<?php the_permalink(); ?>" class=" btn btn-primary">
            Voir plus
        </a>
        </div>

</article>
