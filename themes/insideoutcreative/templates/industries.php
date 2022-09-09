<?php
/**
 * Template Name: Intro + Child Pages
 */
get_header(); ?>
<link rel="stylesheet" href="<?php echo home_url(); ?>/wp-content/themes/insideoutcreative/css/sections/industries.css">
<!-- start of intro -->
<section class="pt-5 pb-5 bg-accent text-white">
<div class="container">
<div class="row align-items-center">
<div class="col-md-6">
<?php the_field('intro_content'); ?>
</div>
<div class="col-md-6">
<?php 
$image = get_field('intro_image');
if(get_field('image')){ 
echo wp_get_attachment_image($image['id'],'full',"",['class'=>'w-100 h-100 box-shadow']); ?>
<?php } else if(has_post_thumbnail()){
the_post_thumbnail('full',array('class'=>'w-100 h-100 box-shadow'));
} else { ?> 
<?php echo wp_get_attachment_image(51,'full',"",['class'=>'w-100 h-100 box-shadow']); ?>
<?php } ?>
</div>
</div>
</div>
</section>
<!-- end of intro -->
<section class="pt-5 pb-5 bg-accent industries">
<div class="container-fluid">
<div class="row justify-content-center">
<?php
global $post;
$industries = new WP_Query(array(
'posts_per_page' => -1,
'post_parent'    => $post->ID,
'post_type' => 'page'
));

while($industries->have_posts()) {
$industries->the_post(); ?>
<div class="col col-lg-4 col-md-3 col-12 col-industries mt-2 mb-2">
<a href="<?php the_permalink(); ?>">
<div class="position-relative overflow-h">
<div class="overlay position-absolute"></div>
<?php if(has_post_thumbnail()) { 
the_post_thumbnail('full',array('class'=>'w-100 img-industries'));  
} else {
echo wp_get_attachment_image(51,'full','',['class'=>'w-100 img-industries']);
} ?>
<div class="content position-absolute text-white text-center w-100 z-1">
<div class="position-relative">
<h3 class="text-shadow"><?php the_title(); ?></h3>
</div>
</div>
</div>
</a>
</div>
<?php } wp_reset_postdata(); ?>
</div>
</div>
</section>
<?php get_footer(); ?>