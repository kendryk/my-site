<!-- Footer -->
<footer class=" bg-dark text-white  pt-4">

    <!-- Footer Links -->
    <section class="container text-center text-md-left">

        <!-- Footer links -->
        <article class="row text-center text-md-left mt-3 pb-3">

            <!-- Grid column -->
            <div class="col mx-auto mt-3">
               <?php the_custom_logo(); ?>
            </div>

                <?php if (is_active_sidebar('footer-sidebar')): ?>
                    <?php dynamic_sidebar('footer-sidebar'); ?>
                <?php endif; ?>



        </article>
        <!-- Footer links -->

        <hr>

        <!-- Grid row -->
        <div class="d-flex justify-content-center">

            <!-- Grid column -->
            <div class="col-md-7 col-lg-8">

                <!--Copyright-->
                <p class="text-center text-md-left">© <?= date('Y'); ?> Copyright:
                    <a href="">
                        <strong>  <?php the_author(); ?>.com</strong>
                    </a>
                </p>



            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-5 col-lg-4 ml-lg-0">

                <!-- Social buttons -->
                <div class="text-center text-md-right">
                    <ul class="list-unstyled list-inline">
                        <li class="list-inline-item">
                            <a class="btn-floating btn-sm rgba-white-slight mx-1">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a class="btn-floating btn-sm rgba-white-slight mx-1">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a class="btn-floating btn-sm rgba-white-slight mx-1">
                                <i class="fab fa-google-plus-g"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a class="btn-floating btn-sm rgba-white-slight mx-1">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                        </li>
                    </ul>
                </div>

            </div>
            <!-- Grid column -->

        </div>
        <!-- Grid row -->

    </section>
    <!-- Footer Links -->

</footer>
<!-- Footer -->









<?php wp_footer(); ?>

</body>
</html>

