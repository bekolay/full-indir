<?php get_header() ?>





<section id="blog-section" class="asagikaydir">
    <div class="container ">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <div class="">
                        <div class="details-card containeruzunluk">
                            <div class="container">
                    <article role="main" itemscope itemtype="https://schema.org/NewsArticle" data-title="<?php the_title() ?>" data-type="news" data-id="<?php the_ID() ?>" data-url="<?php the_permalink() ?>"
                         data-description="<?php echo get_the_excerpt();?>" data-keywords data-share="0" data-author="<?php the_author() ?>" 
                         data-category="<?php kategori_ismi() ?>" data-date="<?php the_time( 'Ymd' ); ?>"> 
                    <div >
                    </div>
<meta itemprop="mainEntityOfPage" content="<?php the_permalink() ?>">
<meta itemprop="isFamilyFriendly" content="TRUE">
<meta itemprop="publishingPrinciples" content="https://torrentciz.com/privacy-policy/">
<meta itemprop="dateCreated" content="<?php the_time( 'Y-m-d\T g:i:s+0300' ); ?>">
<meta itemprop="articleSection" content="<?php kategori_ismi() ?>">
<meta itemprop="inLanguage" content="tr-TR">
<meta itemprop="genre" content="news" name="medium">
                        <!-- Post header-->
                        <header class="mb-4">
                            <!-- Post title-->
                            <h1 itemprop="headline" class="fw-bolder mb-1 yazirenk3 text-center" ><?php the_title() ?></h1>
                            <!-- Post meta content-->
                            <div class="text-muted fst-italic mb-2 text-center">Yazı Tarihi : <?php echo get_the_date() ?></div>
                            <!-- Post categories-->
                            <?php $tags = get_the_tags($post -> ID);
                            if (!empty($tags)) {

                             ?>
                            <ul class="related-tag text-center">
                                <?php foreach ($tags as $tag) { ?>
                                    <a class="badge bg-secondary text-decoration-none link-light" alt="<?php the_title() ?>" href="<?php the_permalink() ?>" title="<?php the_title() ?>"><?php echo $tag ->name; ?> </a>
                                <?php } ?>
                            </ul>
                            <?php } ?>
                        <div class="card-block">
                           
                            <div class="bc-icons-2  text-center">

                                <ul class="breadcrumb blue-grey lighten-4  text-center" itemscope="" itemtype="https://schema.org/BreadcrumbList" >
                                    <li class="breadcrumb-item" itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
                                        <a class="black-text" itemprop="item" href="https://torrentciz.com/" title="Torrent oyun indir">Anasayfa</a>
                                        <i class="breadcrumb-item" aria-hidden="true"></i> 
                                        <meta itemprop="position" content="1"> /</li>
                                    <li class="breadcrumb-item" itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
                                        <a title="<?php kategori_ismi() ?>" class="black-text" temprop="item" href="https://torrentciz.com/kategoriler/<?php kategori_ismi() ?>"><?php kategori_ismi() ?></a>
                                        <meta itemprop="position" content="2">
                                        <i class="breadcrumb-item" aria-hidden="true"></i>    /</li>
                                    <li class="breadcrumb-item active" itemprop="name"><?php the_title() ?></li>
                                </ul>
                            </div>
                        </div>
                        </header>
                        <!-- Preview image figure-->
                        <figure class="mb-4"><img class="img-fluid rounded resimyukseklik" src="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id(),'onecikan')[0]; ?>" alt="..." /></figure>
                        <!-- Post content-->
                        <section class="mb-5">
                            <div class="asd yazirenk3"> 
								<h2 class="fw-bolder mb-1 yazirenk3 text-center" ><?php the_title() ?></h2>
								<hr/>
<?php echo $post->post_content ?>
</div>
                        </section>
                    </article>
                    <hr class="yazirenk3" style="border-width: 2px;" />
                    <div class="post-comments">
                        <div class="heading-layout3">
                            <p class="yazirenk3 yaziboyut1 heading-title-md">Yorumlar</p>
                        </div>
                        <div class="comment-box">
<div id="disqus_thread"></div>
<script>
    /**
    *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
    *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
    /*
    var disqus_config = function () {
    this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
    this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
    };
    */
    (function() { // DON'T EDIT BELOW THIS LINE
    var d = document, s = d.createElement('script');
    s.src = 'https://torrentcim-com.disqus.com/embed.js';
    s.setAttribute('data-timestamp', +new Date());
    (d.head || d.body).appendChild(s);
    })();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                        </div>
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
