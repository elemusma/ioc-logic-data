<?php
/**
 * Template Name: Library
 */
get_header(); ?>
<style>
iframe {
width: 100%;
height: 230px;
}
</style>
<section class="pt-5 pb-5">
<div class="container">
<div class="row justify-content-center">
<div class="col-md-12 pb-5">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
the_content();
endwhile; else: ?>
<p>Sorry, no posts matched your criteria.</p>
<?php endif; ?>
</div>
<div class="col-md-12 pb-4" id="videos">
<?php the_field('videos_content'); ?>
</div>
<!-- start of video repeaters -->
<?php if(have_rows('videos')): while(have_rows('videos')): the_row(); ?>
<div class="col-lg-4 col-md-3">
<div class="position-relative library-iframe">
<?php the_sub_field('iframe'); ?>
</div>
</div>
<?php endwhile; else : endif; ?>
<!-- end of video repeaters -->
</div>
</div>
</section>
<section class="pt-5 pb-5">
<div class="container">
<div class="row">
<div class="col-md-12 pb-4" id="articles-brochures">
<?php the_field('articles_&_brochures_content'); ?>
</div>
<!-- start of articles & brochures -->
<?php if(have_rows('articles_brochures')): while(have_rows('articles_brochures')): the_row(); ?>
<div class="col-md-6">
<div class="position-relative articles-brochures">
<?php $file = get_sub_field('file'); ?>
<a href="<?php echo $file['url']; ?>" target="_blank" rel="noopener noreferrer" style="text-decoration:underline;" class="text-accent"><?php echo $file['title']; ?></a>
<?php if(get_sub_field('description')){ ?>
<p class="mb-0"><?php the_sub_field('description'); ?></p>
<?php } ?>
</div>
</div>
<?php endwhile; else : endif; ?>
<!-- end of articles & brochures -->
</div>
</div>
</section>
<section class="pt-5 pb-5">
<div class="container">
<div class="row">
<div class="col-md-12 pb-4" id="tips-techniques">
<?php the_field('tips_&_techniques_content'); ?>
</div>
<!-- start of tips & techniques -->
<?php if(have_rows('tips_techniques')): while(have_rows('tips_techniques')): the_row(); 
$linkYesNo = get_sub_field('link_yes_no');
$fileTips = get_sub_field('file_tips');
$link = get_sub_field('link');
$link_url = $link['url'];
$link_title = $link['title'];
$link_target = $link['target'] ? $link['target'] : '_self';
?>
<div class="col-md-6">
<div class="position-relative articles-brochures">

<?php if($linkYesNo == 'Yes') { ?>
<!-- <a href="<?php echo $fileTips['url']; ?>" target="_blank" rel="noopener noreferrer" style="text-decoration:underline;" class="text-accent"><?php echo $fileTips['title']; ?></a> -->

<a class="text-accent" href="<?php echo esc_url( $link_url ); ?>" rel="noopener noreferrer" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>

<?php if(get_sub_field('description')){ ?>
<p class="mb-0"><?php the_sub_field('description'); ?></p>
<?php } ?>
</div>
</div>
<?php } ?>

<?php if($linkYesNo == 'No') { ?>
<a href="<?php echo $fileTips['url']; ?>" target="_blank" rel="noopener noreferrer" style="text-decoration:underline;" class="text-accent"><?php echo $fileTips['title']; ?></a>
<?php if(get_sub_field('description')){ ?>
<p class="mb-0"><?php the_sub_field('description'); ?></p>
<?php } ?>
</div>
</div>
<?php } ?>

<?php endwhile; else : endif; ?>
<!-- end of tips & techniques -->
</div>
</div>
</section>
<?php get_footer(); ?>