<?php
get_header();
// start of child pages of services
global $post;
if (in_array($post->post_parent, [23,25,97,231], true)) { 
    
    wp_enqueue_style('products-single', get_theme_file_uri('/css/sections/products-single.css'));
    wp_enqueue_style('intro', get_theme_file_uri('/css/sections/intro.css'));
   
   
   if ( $post->post_parent ) {
echo '<section><a href="' . get_permalink( $post->post_parent ) . '" class="btn btn-primary position-fixed text-uppercase h1 btn-go-back">Go Back to ' . get_the_title( $post->post_parent ) . '</a></section>';
 } 


if( have_rows('content')):
    echo '<div class="d-flex flex-wrap position-fixed w-100 justify-content-center pr-2 pl-2" style="top:115px;z-index:3;">';
    while(have_rows('content')): the_row();
    
    $shortTitle = get_sub_field('short_title');
    $ID = sanitize_title_with_dashes(get_sub_field('title'));
    
    if($shortTitle):
    echo '<a href="#' . $ID . '" class="btn text-white m-2 pr-3 pl-3" style="text-decoration:none;background:#881600;">' . $shortTitle . '</a>';
    endif;
    
endwhile;
echo '</div>';
endif;




echo '<section class="about-section pt-5 pb-5 position-relative bg-accent texture-bg">';
echo '<div class="background-image"></div>';
echo '<div class="container pt-5 mb-5">';
echo '<div class="row pb-5 mb-5">';
echo '<div class="col-md-5 img--main">';
$image = get_field('main_image');

if($image) {

    echo wp_get_attachment_image($image['id'],'full',"",['class'=>'w-100 h-100']);

} else {
the_post_thumbnail('full',array('class'=>'w-100 h-100'));
}
echo '</div>';
echo '<div class="col-lg-6 col-md-6 sm-text-center about"> ';
echo '<div class="about-first-half">';
echo '<div class="about-before"></div>';
echo '<div class="about-middle"></div>';
echo '</div>';
echo '<div class="about-after"></div>';
echo '<div class="about-details pt-5 pl-4 pr-4">';
echo '<div class="page details">';

echo '<h5 class="">' . get_field('main_title') . '</h5>';
echo '</div>';

the_field('description');

echo '</div>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '</section>';
// <!-- start of repeater field section -->
if( have_rows('content') ):
$bgImage = get_field('background_image');

if($bgImage) {
echo '<section class="pt-5 pb-5" style="background:url(' . $bgImage['url'] . ');background-size:cover;">';
} else {
echo '<section class="pt-5 pb-5" style="background:url(' .  wp_get_attachment_image_url(387,'full') . ');background-size:cover;">';
}
echo '<div class="pt-5 pb-5">';
echo '<div class="container" style="border-top: 40px solid #881600;border-bottom: 40px solid #881600;">';
while ( have_rows('content') ) : the_row();

$contentQuote = get_sub_field('content_or_quote');

if($contentQuote == 'Content'){ 
$ID = sanitize_title_with_dashes(get_sub_field('title'));

echo '<div class="row services-content-row position-relative col-content">';
echo '<div class="position-absolute" id="' . $ID . '" style="top:-217px;left:0;"></div>';
echo '<div class="col-md-6 services-content-text">';

echo '<div class="inner-content p-5">';
echo '<h3>' . get_sub_field('title') . '</h3>';

the_sub_field('content');

echo '</div>';

echo '</div>';

$imageOrContent = get_sub_field('image_or_content');

// if($imageOrContent == 'Image'){
    echo '<div class="col-md-6 p-0 services-content-img">';
    echo '<div class="">';
    $contentImage = get_sub_field('image');
    echo wp_get_attachment_image($contentImage['id'], 'full', "",['class'=>'w-100 h-100']);
    echo get_sub_field('content_other');
    echo '</div>';
    echo '</div>';
// } else {

    if(get_sub_field('content_other')):
    echo '<div class="col-md-6 p-0">';
    echo '<div class="">';
    echo '<div class="inner-content bg-white m-5 p-5">';
    echo get_sub_field('content_other');
    echo '</div>';
    echo '</div>';
    echo '</div>';
    endif;
// }

echo '</div>';
} else {
echo '<div class="row align-items-center position-relative text-white">';
echo '<div class="position-absolute" id="' . get_sub_field('quote_id') . '" style="top:-217px;left:0;"></div>';
echo '<div class="col-md-12 pt-5 pb-5 mb-2">';
echo '<div style="margin-bottom:-1rem;">';

the_sub_field('quote');

echo '</div>';
echo '</div>';
echo '</div>';
echo '<div class="row align-items-center services-content-row position-relative"></div>';
}

endwhile;
echo '</div>';
echo '</div>';
echo '</section>';
endif;
// <!-- end of repeater field section -->
}
// end of child pages of services


// if(is_page(23)){
// get_template_part('partials/services'); 
// }

if(!is_page(23) && (!$post->post_parent == 23) && (!$post->post_parent == 25) && (!$post->post_parent == 97) && (!$post->post_parent == 231)){
if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<section class="pt-5 pb-5">
<div class="container">
<div class="row">
<div class="col-md-12">
<?php the_content(); ?>
</div>
</div>
</div>
</section>
<?php endwhile; else: ?>
<p>Sorry, no posts matched your criteria.</p>

<?php endif; 
}?>
<?php get_footer(); ?>