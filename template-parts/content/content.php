<article class="col m-4">
    <div class="card ">
        <?php the_post_thumbnail('medium', ['class' => 'm-auto']); ?>
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
</article>


