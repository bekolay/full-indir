<footer class="asd1 container-fluid bg-grey py-5 asagikaydir">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="row">
                    <div class="col-md-6 ">
                        <div class="logo-part">
                            <ul>
                                    <?php $args = array(
                                        'theme_location' => 'footer-menu',
                                        'echo' => true,
                                        'fallback_cb' => 'footer-menu',
                                        'depth' => 0,
                                        'walker' => '',
                                        'items_wrap' => '<li>%3$s</>',

                                    );
                                    wp_nav_menu($args);
                                    ?>                              
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="row">
                    <div class="col-md-6 px-4">
                        <p><?php wp_title(); ?></p>
                        <div class="row ">
                            <div class="">
                                    <p class="yazirenk1">Bütün haklarımız Saklıdır..</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo get_template_directory_uri();?>/assets/js/jquery.js"></script>
<script src="<?php echo get_template_directory_uri();?>/assets/js/app.js"></script>
<script src="<?php echo get_template_directory_uri();?>/assets/bootstrapp/js/bootstrap.min.js"></script>
</body>



</html>