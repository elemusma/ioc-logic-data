<?php 
/**
 * Template Name: About
 */
get_header();
?>
<link rel="stylesheet" href="<?php echo home_url(); ?>/wp-content/themes/insideoutcreative/css/sections/about.css">
<link rel="stylesheet" href="<?php echo home_url(); ?>/wp-content/themes/insideoutcreative/css/sections/intro.css">
<!-- start of intro -->
<section class="pt-5 pb-5 bg-accent text-white">
<div class="container">
<div class="row align-items-center">
<div class="col-md-6">
<?php the_field('content'); ?>
</div>
<div class="col-md-6">
<?php if(get_field('image')){ 
$image = get_field('image');
echo wp_get_attachment_image($image['id'],'full',"",['class'=>'w-100 h-100 box-shadow']); ?>
<?php } else if(has_post_thumbnail()){
the_post_thumbnail('full',array('class'=>'w-100 h-100 box-shadow'));
} else { ?> 
<?php echo wp_get_attachment_image(26,'full',"",['class'=>'w-100 h-100 box-shadow']); ?>
<?php } ?>
</div>
</div>
</div>
</section>
<!-- end of intro -->

<?php if(have_rows('slides')) : while(have_rows('slides')): the_row(); ?>
<!-- start of full height -->
<section class="pt-5 pb-5 position-relative bg-img d-flex justify-content-center align-items-center full-row">
<?php if(get_sub_field('background_image')){ 
$bgImage = get_sub_field('background_image');
echo wp_get_attachment_image($bgImage['id'],'full',"",['class'=>'w-100 h-100 position-absolute bg-img']); ?>
<?php } else if(has_post_thumbnail()){
the_post_thumbnail('full',array('class'=>'w-100 h-100 position-absolute bg-img'));
} else { ?> 
<?php echo wp_get_attachment_image(26,'full',"",['class'=>'w-100 h-100 position-absolute bg-img']); ?>
<?php } ?>
<div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <div class="inner-content text-white pt-5 pb-5 position-relative">
                <div class="overlay position-absolute"></div>
                <div class="position-relative z-1 pl-5 pr-5">
<?php the_sub_field('content'); ?>
</div>
            </div>
            </div>
        </div>
    </div>
</section>
<!-- end of full height -->
<?php endwhile; else: endif; ?>
<!-- start of team members -->
<section class="about-section our-team pt-5 pb-5 position-relative bg-accent texture-bg">
<div class="background-image"></div>
<div class="container pt-5 mb-5">
    <div class="row mb-5 pb-5 justify-content-center">
        <div class="col-md-9 text-white">
            <?php the_field('team_description'); ?>
        </div>
    </div>

<?php if(have_rows('team_members')): while(have_rows('team_members')): the_row(); ?>
<!-- start of team members -->
<div class="row pb-5 mb-5">
<div class="col-md-5 img--main">
<?php 
$headshot = get_sub_field('headshot');
echo wp_get_attachment_image($headshot['id'],'full',"",['class'=>'w-100 h-100']); ?>
</div>
<div class="col-lg-6 col-md-6 sm-text-center about"> 
<div class="about-first-half">
<div class="about-before"></div>
<div class="about-middle"></div>
</div>
<div class="about-after"></div>
<div class="about-details pt-5 pl-4 pr-4">
<div class="page details">
<h4 class="bodoni"><?php the_sub_field('name'); ?></h4>
<h5 class=""><?php the_sub_field('job_title'); ?></h5>
</div>
<p style="line-height:1.25"><small><?php the_sub_field('bio',false,false); ?></small></p>
</div>
</div>
</div>
<!-- end of team members -->
<?php endwhile; else : endif; ?>

</div>
</section>
<!-- end of team members -->
<?php 

// start of awards
if(have_rows('awards_content')): while(have_rows('awards_content')): the_row();

echo '<section class="pt-5 pb-5 position-relative bg-accent text-white">';
echo '<div class="container">';
echo '<div class="row justify-content-center">';
echo '<div class="col-12 pb-4 text-center">';
echo get_sub_field('content');
echo '</div>';
echo '</div>';

if(have_rows('awards')):

    echo '<div class="row justify-content-center">';

    while(have_rows('awards')): the_row();
    $image = get_sub_field('image');


    echo '<div class="col-md-4">';

    echo wp_get_attachment_image($image['id'],'full','',['class'=>'w-100 h-auto mb-3']);
    echo get_sub_field('award_description');
    echo '</div>';

    endwhile;

    echo '</div>';

endif;

echo '</div>';
echo '</section>';

endwhile; endif;
// end of awards

// start of quote area
if(have_rows('quote_content')): while(have_rows('quote_content')): the_row();

if(get_sub_field('content')){
    echo '<section class="pt-5 pb-5 position-relative bg-accent text-white">';
    echo '<div class="container">';
    echo '<div class="row justify-content-center">';
    echo '<div class="col-md-9 pb-4 text-center">';
    echo get_sub_field('content');
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</section>';
}
endwhile; endif;
// end of quote area

get_footer(); ?>