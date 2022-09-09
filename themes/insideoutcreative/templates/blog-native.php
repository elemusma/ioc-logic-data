<?php
/**
 * Template Name: Blog Native
 */
get_header(); ?>

<section class="pt-5 pb-5 body">
<div class="container">
<div class="row">
<div class="col-12">
    <div class="row">
<?php
// the query to set the posts per page to 3
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array('posts_per_page' => 6, 'post_type' => 'post', 'paged' => $paged );
query_posts($args); ?>
<!-- the loop -->
<?php if ( have_posts() ) : while (have_posts()) : the_post(); ?>
<!-- start of col -->
<div class="custom_pages col-md-6 pr-lg-5 col-blog text-white  " style="margin-bottom: 50px;">
  <a href="<?php the_permalink();?>" class="text-white "  target="_blank">

  

  <div class="w-100 blog-content position-relative overflow-h">
  <div class="overlay position-absolute"></div>
  <?php the_post_thumbnail('full',array('class'=>'position-absolute w-100 h-100')); ?>
  <div class="position-relative z-1 p-5">
  <h3 class="h4"><?php the_title(); ?></h3>

  <hr class="border-white">


  <p class=""><?php the_tags('Tags: '); ?>
  <br>
  <?php the_author(); ?></p>
  <a href="<?php the_permalink(); ?>">Read More</a>
  </div>

  </div>

  </a>
  </div>
<!-- end of col --> 
<?php endwhile; ?>
<!-- pagination -->
<div class="col-md-12 text-center pt-5 pb-5">
<?php echo paginate_links(array(
'show_all' => true,
'prev_text' => '&#60;',
'next_text' => '&#62;'
)); ?>
</div>
</div>
</div>

<?php else : ?>
<!-- No posts found -->
<?php endif; ?>
</div>
</div>
</section>

<?php get_footer(); ?>