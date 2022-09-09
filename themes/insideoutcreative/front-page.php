<?php get_header(); ?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/sections/home.css">
<!-- start of intro section -->
<section class="pt-5 pb-5">
<div class="container">
<div class="row align-items-center">
<div class="col-md-6">
<h5 class="gray-text-1 proxima"><?php the_field('intro_preheading'); ?></h5>
<h3 class="h4 mb-3 gray-text-1"><?php the_field('intro_heading_1'); ?></h3>
<h3 class="h4 mb-1 gray-text-1"><?php the_field('intro_heading_2'); ?></h3>
<p class="gray-text-1" style="line-height:1;"><small><?php the_field('intro_content',false, false); ?></small></p>
</div>
<div class="col-md-6">
<?php $introImage = get_field('intro_image'); echo wp_get_attachment_image($introImage['id'],'full','',['class'=>'w-100 h-auto']); ?>
</div>
</div>
<div class="row align-items-center pt-5">

<div class="col-md-6">
<?php 
$imageContent = get_field('image_or_content_intro');

if($imageContent == 'Image'){
$introImageSecondRow = get_field('intro_image_second_row');
echo '<a href="' . wp_get_attachment_image_url($introImageSecondRow['id'],'full'). '" data-lightbox="image2">';
echo wp_get_attachment_image($introImageSecondRow['id'],'full','',['class'=>'w-100 h-auto',]);
echo '</a>';
} elseif ($imageContent == 'Content'){
if(have_rows('content_second_row')): while(have_rows('content_second_row')): the_row();
$content = get_sub_field('content');
$link = get_sub_field('link');
$link_url = $link['url'];
$link_title = $link['title'];
$link_target = $link['target'] ? $link['target'] : '_self';

echo $content;

if($link):
echo '<a class="btn bg-accent text-white" href="' . esc_url( $link_url ) . '" target="' . esc_attr( $link_target ) . '">' . esc_html( $link_title ) . '</a>';
endif;

endwhile; endif;
}
echo '</div>';
?>
<div class="col-md-6">
<!-- <div class="row justify-content-center">
<?php 
$badgesPhotos = get_field('badges_second_row');
if( $badgesPhotos ): 
foreach( $badgesPhotos as $badgesPhoto ): ?>
<div class="col-6 col col-portfolio mt-3 mb-3 overflow-h">
<div class="position-relative">
<a href="<?php echo wp_get_attachment_image_url($badgesPhoto['id'], 'full'); ?>" data-lightbox="image-set">
<?php echo wp_get_attachment_image($badgesPhoto['id'], 'full','',['class'=>'w-75 h-auto img-portfolio'] ); ?>
</a>
</div>
</div>
<?php endforeach; endif; ?>
</div> -->
<div class="position-relative text-center pt-5 pb-5 pl-4 pr-4 box-shadow bg-accent col-cta">
<div class="text-white pb-4">
<?php the_field('cta_content'); ?>
</div>
<?php 
$CTAlink = get_field('cta_link');
if( $CTAlink ): 
$CTAlink_url = $CTAlink['url'];
$CTAlink_title = $CTAlink['title'];
$CTAlink_target = $CTAlink['target'] ? $CTAlink['target'] : '_self';
?>
<a class="btn bg-white text-accent" href="<?php echo esc_url( $CTAlink_url ); ?>" target="<?php echo esc_attr( $CTAlink_target ); ?>"><?php echo esc_html( $CTAlink_title ); ?></a>
<?php endif; ?>
</div>
</div>
</div>
</div>
</section>
<!-- end of intro section -->
<?php $bigImage = get_field('big_image'); echo wp_get_attachment_image($bigImage['id'],'full','',['class'=>'w-100 h-auto']); ?>
<!-- start of core values -->
<section class="pt-5 pb-5">
<div class="container">
<div class="row align-items-center">
<div class="col-md-6">
<?php $valuesImage = get_field('values_image'); echo wp_get_attachment_image($valuesImage['id'],'full','',['class'=>'w-100 h-auto']); ?>
</div>
<div class="col-md-6 gray-text-1">
<h5 class="proxima mt-3"><?php the_field('values_preheading'); ?></h5>
<h3 class="h4 pb-5"><?php the_field('values_heading'); ?></h3>
<?php $counter = 0; if(have_rows('ordered_list')): while(have_rows('ordered_list')): the_row(); ?>
<div class="row">
<div class="col-lg-1 col-2">
<span class="bg-black text-white number-box d-inline-block text-center" style="width:25px;"><?php     $counter++; echo $counter; ?></span>
</div>
<div class="col-lg-11 col-10 pl-0">
<p class=""><?php the_sub_field('sentence'); ?></p>
</div>
</div>

<?php endwhile; else : endif; ?>
<?php the_field('values_content'); ?>
</div>

</div>
</div>
</section>
<!-- end of core values -->

<!-- start of page links -->
<section class="pt-5 pb-5 page-links">
<div class="container">
<div class="row justify-content-center">
<?php
$featured_posts = get_field('page_links');
if( $featured_posts ): ?>
<?php foreach( $featured_posts as $post ): 
// Setup this post for WP functions (variable must be named $post).
setup_postdata($post); ?>
<a href="<?php the_permalink(); ?>" class="col-md-4 text-center h2 gray-text">
<div class="pt-5 pb-5 bg-gray2 position-relative">
<div class="pt-5 pb-5">
<h3><?php the_title(); ?></h3>
</div>
</div>
</a>
<?php endforeach; ?>
<?php 
// Reset the global post object so that the rest of the page works correctly.
wp_reset_postdata(); ?>
<?php endif; ?>

</div>
</div>
</section>
<!-- end of page links -->
<!-- start of soar to new heights -->
<section class="position-relative">
<?php $newHeightsImage = get_field('new_heights_background'); echo wp_get_attachment_image($newHeightsImage['id'],'full','',['class'=>'w-100 h-100 bg-img position-absolute']); ?>
<div class="white-overlay position-relative" style="height:150px;background:rgba(255,255,255,.5);"></div>
<div class="container pt-5 pb-5">
<div class="row pt-5 pb-5">
<div class="col-md-6 p-5" style="background:rgba(255,255,255,.38);">
<h5 class="proxima"><?php the_field('new_heights_preheading'); ?></h5>
<h3 class="mb-5"><?php the_field('new_heights_heading'); ?></h3>
<p class="mb-0"><?php the_field('new_heights_content'); ?></p>

</div>
</div>
</div>
<div class="white-overlay position-relative" style="height:150px;background:rgba(255,255,255,.5);"></div>
</section>
<!-- end of soar to new heights -->
<!-- start of testimonials -->
<section class="pt-5 pb-5 mb-4 bg-white-soft">
<div class="container">
<div class="row">
<div class="col-md-12 text-center pb-3">
<h3 class="h5 proxima"><?php the_field('testimonials_title'); ?></h3>
</div>
<?php if(have_rows('testimonials')): while(have_rows('testimonials')): the_row(); ?>
<div class="col-md-6 col-testimonial mt-2 mb-2">
<?php echo wp_get_attachment_image(63,'full','',['class'=>'bg-img position-absolute img-quotes']); ?>
<div class="position-relative">
<small class="gray-text-1">
<p><?php the_sub_field('content'); ?></p>
</small>
<div class="row align-items-center">
<div class="col-lg-4 col-5">
<?php $testimonialsImage = get_sub_field('headshot'); echo wp_get_attachment_image($testimonialsImage['id'],'full','',['class'=>'img-testimonial']) ?>
</div>
<div class="col-lg-8 col-7">
<small>
<p><?php the_sub_field('name'); ?><br>
<?php the_sub_field('job_title'); ?></p>
</small>
</div>
</div>
</div>
</div>
<?php endwhile; else : endif; ?>
</div>
</div>
</section>
<!-- end of testimonials -->
<?php get_footer(); ?>