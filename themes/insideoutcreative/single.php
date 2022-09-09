<?php get_header(); ?>
<section class="pt-5 pb-5 body">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-9 col-md-12 pr-lg-5">
        <p class="d-flex flex-wrap align-items-center mb-5">
        <?php 
        $author_id = get_the_author_meta('ID'); 
        $profileImage = get_field('profile_image', 'user_'. $author_id); 
        if($profileImage){
        echo wp_get_attachment_image($profileImage['id'],'full','',['class'=>'mr-2','style'=>'border-radius:50%;width:35px;height:35px;']);
        } else {
        ?>
        <span class="user-icon-svg mr-2"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512"><path d="M248 8C111 8 0 119 0 256s111 248 248 248 248-111 248-248S385 8 248 8zm0 96c48.6 0 88 39.4 88 88s-39.4 88-88 88-88-39.4-88-88 39.4-88 88-88zm0 344c-58.7 0-111.3-26.6-146.5-68.2 18.8-35.4 55.6-59.8 98.5-59.8 2.4 0 4.8.4 7.1 1.1 13 4.2 26.6 6.9 40.9 6.9 14.3 0 28-2.7 40.9-6.9 2.3-.7 4.7-1.1 7.1-1.1 42.9 0 79.7 24.4 98.5 59.8C359.3 421.4 306.7 448 248 448z"/></svg></span>
        <?php } ?>
        <?php echo get_the_author_posts_link(); ?><span class="mr-1"></span> | <?php the_time('F jS, Y'); ?></p>
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
the_content();
endwhile; else: ?>
<p>Sorry, no posts matched your criteria.</p>
<?php endif; ?>
<hr>
        </div>
        <div class="col-md-12">
        </div>
        <!-- <?php get_template_part('partials/sidebar'); ?> -->
    </div>
    <div class="row justify-content-center">
    <div class="col-md-7 mt-2 mb-5">
        <?php comments_template(); ?>
        </div>
        <div class="col-md-6">
        <!-- <small>Previous</small> -->
        <h3 class="h5"><?php previous_post_link(); ?></h3>
        </div>
        <div class="col-md-6 text-right">
            <!-- <small>Next</small> -->
        <h3 class="h5"><?php next_post_link(); ?></h3>
        </div>
    </div>
</div>
</section>
<?php get_footer(); ?>