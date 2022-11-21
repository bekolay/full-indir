<?php get_header() ?>


<div class="container">
    <div class="row">

    </div>
</div>

<section id="blog-section" class="asagikaydir">
    <div class="container ">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <div class="">
                        <div class="details-card containeruzunluk">
                            <div class="container">
                                <div class="row">
                                    <div class="container">
                                        <div class="heading-layout1">
                                            <h1 class="heading-title"><?php  kategori_ismi() ?></h1>
                                        </div>
                                    </div>
                                     <?php
                                while(have_posts() ) : the_post(); ?>
                                    <div class="col-md-4 yukselik">
                                        <a class="cizgikaldir" title="<?php the_title() ?>" alt="<?php the_title() ?>" href="<?php the_permalink(); ?>">
                                            <div class="card-content">
                                                <div class="card-img">
                                                    <img class="anaresimboyut" src="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id())[0]; ?>" alt="<?php the_title() ?>" title="<?php the_title() ?>">
                                                    <span><h4><?php kategori_ismi() ?></h4></span>
                                                </div>
                                                <div class="card-desc">
                                                    <h3><?php the_title() ?></h3>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <?php endwhile; wp_reset_query(); ?>
                                    <?php the_paganation(); ?>


                            </div>
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
