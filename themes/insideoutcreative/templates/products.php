<?php
/**
 * Template Name: Products
 */
get_header(); ?>
<link rel="stylesheet" href="<?php echo home_url(); ?>/wp-content/themes/insideoutcreative/css/sections/products.css">
<section class="bg-accent pt-5">
<div class="container">
<div class="row">
<div class="col-12 text-white">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
the_content();
endwhile; else: ?>
<p>Sorry, no posts matched your criteria.</p>
<?php endif; ?>	
</div>	
</div>	
</div>
<div class="container-fluid">

<div class="row pt-5 services-row">
<?php
$counter = 0;
$homepageServices = new WP_Query(array(
'posts_per_page' => -1,
'post_parent'    => 23,
'post_type' => 'page'
));

while($homepageServices->have_posts()) {
$homepageServices->the_post();
$counter++; 
if($counter % 2 == 0): ?>
<div class="col-md-6 p-0 services-col mt-2 mb-2 even-amount">
<a href="<?php the_permalink(); ?>">
<div class="hover-fade position-absolute"></div>
<div class="inner-content position-relative">
<?php the_post_thumbnail('full', array('class'=>'w-100 services-img')); ?>
<div class="inner-content-text position-absolute text-white">
<h3 class="text-uppercase mb-4 text-shadow heading"><?php the_title(); ?></h3>
<!-- <a href="<?php the_permalink(); ?>" class="view-services btn btn-secondary text-uppercase">View Services</a> -->
</div>
</div>
</a>
</div> <!-- end of col -->

<?php else: ?>
    <div class="col-md-6 p-0 services-col mt-2 mb-2 odd-amount">
<a href="<?php the_permalink(); ?>">
<div class="hover-fade position-absolute"></div>
<div class="inner-content position-relative">
<?php the_post_thumbnail('full', array('class'=>'w-100 services-img')); ?>
<div class="inner-content-text position-absolute text-white">
<h3 class="text-uppercase mb-4 text-shadow heading"><?php the_title(); ?></h3>
<!-- <a href="<?php the_permalink(); ?>" class="view-services btn btn-secondary text-uppercase">View Services</a> -->
</div>
</div>
</a>
</div> <!-- end of col -->

<?php endif; ?>

<?php } wp_reset_postdata(); ?>

</div>
</div>
</section>
<?php get_footer(); ?>