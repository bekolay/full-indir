<!doctype html>
<html class="no-js" lang="tr-TR">
<head>
    <!-- Meta Data -->

         <meta charset="<?php bloginfo( 'charset' ); ?>">
         <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
         <?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
         <link rel="alternate" type="application/rss+xml" title="fullindiroyun » beslemesi" href="http://fullindiroyun.com/feed/">

<?php
$schemamarkup = get_post_meta(get_the_ID(), 'schemamarkup', true);
if(!empty($schemamarkup)) {
  echo $schemamarkup;
}
?>



<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php wp_title(); ?></title>
<meta name="author" content="fullindiroyun" />
<meta name="contact" content="torrentcizcom@gmail.com" />  
<meta name="copyright" content="Copyright (c)2022 Bütün haklarımız saklıdır." />
<meta property="og:title" content="<?php wp_title(); ?>" />
<meta name="publisher" content="fullindiroyun.com" />

<meta property="og:locale" content="tr_TR" />

<?php if (is_single() || is_page() ) : if (have_posts() ) : while (have_posts() ) : the_post(); ?>

<meta name="og:url" content="<?php the_permalink(); ?>">

<?php endwhile; endif; elseif (is_home() ): ?>

<meta name="og:url" content="<?php bloginfo('description'); ?>">
<?php endif; ?> 
    

<?php if (is_single() || is_page() ) : if (have_posts() ) : while (have_posts() ) : the_post(); ?>

<meta name="keywords" content="<?php the_title() ?>">

<?php endwhile; endif; elseif (is_home() ): ?>

<meta name="keywords" content="torrent oyun,torrent indir,full torrent indir,sağlam indir,saglam indir">
<?php endif; ?> 
    

    
<?php if (is_single() || is_page() ) : if (have_posts() ) : while (have_posts() ) : the_post(); ?>

<meta name="og:description" content="<?php echo get_the_excerpt();?>">

<?php endwhile; endif; elseif (is_home() ): ?>

<meta name="og:description" content="<?php bloginfo('description'); ?>">
<?php endif; ?>     
    

<?php if (is_single() || is_page() ) : if (have_posts() ) : while (have_posts() ) : the_post(); ?>

<meta property="og:image" content="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id(),'onecikan')[0]; ?>" />    

<?php endwhile; endif; elseif (is_home() ): ?>

<meta property="og:image" content="<?php echo get_template_directory_uri();?>/media/logo.png" />    

<?php endif; ?> 
    
    
    
    
<?php if (is_single() || is_page() ) : if (have_posts() ) : while (have_posts() ) : the_post(); ?>
<link rel="canonical" href="<?php the_permalink(); ?>" type="text/html">
<?php endwhile; endif; elseif (is_home() ): ?>
<link rel="canonical" href="https://fullindiroyun.com" type="text/html">
<?php endif; ?>
    
<?php if (is_single() || is_page() ) : if (have_posts() ) : while (have_posts() ) : the_post(); ?>

<meta name="description" content="<?php echo get_the_excerpt();?>">

<?php endwhile; endif; elseif (is_home() ): ?>

<meta name="description" content="<?php bloginfo('description'); ?>">

<?php endif; ?>
    <meta name="robots" content="">


    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="media/favicon.png">
    
    <!-- siteicerik CSS -->
    <!-- Dependencies CSS -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/assets/bootstrapp/css/bootstrap.min.css" type="text/css">
    


    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/assets/css/app.css" type="text/css">
    
    <!-- Google Web Fonts -->
</head>
<body>
    <div class="">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" title="Ana Sayfa" alt="Ana Sayfa"><?php the_custom_logo(); ?></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class=" navbar-nav me-auto mb-2 mb-lg-0">
                <?php $args = array(
                'theme_location' => 'header-menu',
                'echo' => true,
                'container'         => '',
                'container_class'   => '',
                'container_id'      => '',
                'menu_class'        => 'navbar-nav me-auto mb-2 mb-lg-0',
                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                'walker'            => new wp_bootstrap_navwalker()

                ); 
                wp_nav_menu($args);

                ?>


</ul>
                <form role="search" id="searchform" action="<?php echo get_home_url('/') ?>" method="get" class="d-flex">
                    <input name="s" type="search" class="form-control me-2 yaziboyut1" placeholder="Başlığı yaz..." aria-label="Search">
                    <button href="#header-search" class="btn btn-outline-success" type="submit">Arama</button>
                </form>
            </div>
        </div>
    </nav>
</div>