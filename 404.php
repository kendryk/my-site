<?php

get_header(); ?>
    <div class="container-fluid">



    <main class="container-fluid my-5  ">
        <section class="row my-5 text-center ">
            <h1 class="fw-bold">
                <?= ( 'Aie !  Dommage ! Cette page est introuvable.' ); ?></h1>
            </header><!-- .page-header -->
        </section>

        <section class="row my-5 ">
            <div class="col-8">
                <img src="<?= get_template_directory_uri(); ?>/images/404.gif"
                     class="img-thumbnail"
                     alt="Not Found">
            </div>

            <div class="col-4 d-flex align-items-center">
                <div>
                    <hr/>
                    <h2>
                        <?= ('Apparemment, rien n’a été trouvé à cette adresse. Essayez avec une recherche ?' ); ?>
                    </h2>
                    <br/>
                    <?php get_search_form(); ?>
                    <hr/>
                </div>


            </div>
        </section>

        <section class="row my-5">

        </section>
    </main>
    </div>
<?php

get_footer();
