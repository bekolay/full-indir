<?php get_header() ?>






<section id="blog-section" class="asagikaydir">
    <div class="container ">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <div class="">
                        <div class="details-card containeruzunluk">
                            <div class="container">
                    <article>
                        <!-- Post header-->
                        <header class="mb-4">
                            <!-- Post title-->
                            <h1 class="fw-bolder mb-1 yazirenk3"><?php the_title() ?></h1>
                            <!-- Post meta content-->
                            <!-- Post categories-->
                        </header>
                        <!-- Post content-->
                        <section class="mb-5">
                            <div class="yazirenk3"> 
<?php echo $post->post_content ?>
</div>
                        </section>
                    </article>
                            </div>
                        </div>
                    </div>

                </div>
            </div>


            <!--           // RECENT POST===========-->
            <div class="col-lg-4">
                <div class="details-card containeruzunluk">
                    <div class="widget-sidebar">
                        <div class="heading-layout1">
                            <p class="heading-title">Kategoriler</p>
                        </div>
                        <div class="container">
                            <div class="content-widget-sidebar">
                                <div class="widget-sidebar">
                                    <?php $args = array(
                'theme_location'    => 'kategori-menu',
                'depth'             => 2,
                'container'         => '',
                'container_class'   => '',
                'container_id'      => '',
                'menu_class'        => 'template-main-menu',
                'fallback_cb'       => 'wp_bootstrap_navwalker2::fallback',
                'walker'            => new wp_bootstrap_navwalker2());

                                    wp_nav_menu($args);
                                    ?>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>





    <?php get_footer() ?>
