<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
  <?php 
  $count=0;
  $args = array(
                                                   'post_type' => 'post',
                                                'post_status' => 'publish',
                                                'orderby' => 'post_views',           
                                                'order' => 'DESC',
      'posts_per_page'=>'3',
       );
       $wp_query = new WP_Query( $args );

      if ( $wp_query->have_posts()) : while ( $wp_query->have_posts()) :  $wp_query->the_post(); 
      $count ++;
      ?>
  
    <div class="carousel-item <?php if($count=="1") {echo 'active';} ?>">
      <a title="<?php the_title() ?>" alt="<?php the_title() ?>" href="<?php the_permalink() ?>">
                            <img style=" width: 100%; height: 450px; " src="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id(),'onecikan')[0]; ?>" 
                            alt="<?php the_title() ?>" title="<?php the_title() ?>">
     
      <div class="carousel-caption d-none d-md-block">
        <p class="yaziboyutu2"><?php the_title(); ?></p>
      </div>
      </a>
    </div>
 
 
  <?php endwhile; ?>
  <?php endif; ?>


  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>