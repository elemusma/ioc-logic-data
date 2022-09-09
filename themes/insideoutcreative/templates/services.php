<?php
/**
 * Template Name: Services
 */
get_header(); ?>
<link rel="stylesheet" href="<?php echo home_url(); ?>/wp-content/themes/insideoutcreative/css/sections/services.css">
<section class="services">
    <div class="container-fluid">
    <?php
$services = new WP_Query(array(
'posts_per_page' => -1,
'post_parent'    => 25,
'post_type' => 'page'
));

while($services->have_posts()) {
$services->the_post(); ?>
        <div class="row align-items-center" id="<?php echo $counter; ?>">
        <div class="col-md-6 p-0">

<?php if(has_post_thumbnail()) { ?> 
<a href="<?php the_post_thumbnail_url('full'); ?>" data-lightbox="image-set">
<?php the_post_thumbnail('full',array('class'=>'w-100 h-100')); ?>
</a>
<?php } else { ?>
<a href="<?php echo wp_get_attachment_image_url(51,'full'); ?>" data-lightbox="image-set">
<?php echo wp_get_attachment_image(51,'full','',['class'=>'w-100 h-100']); ?>
</a>
<?php } ?>
        

        </div>
            <div class="col-xl-6 p-5">
            <div class="content pl-5">
            <h3 class="mb-3"><?php the_title(); ?></h3>
            <p><?php the_field('description',false,false); ?></p>
            <a href="<?php the_permalink(); ?>" class="btn btn-primary bg-accent br-0 b-0">View Service</a>
            </div>
            </div>
        </div>

        <?php } wp_reset_postdata(); ?>

    </div>
</section>
<?php get_footer(); ?>