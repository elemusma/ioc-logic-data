<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php if(get_field('header', 'options')) { the_field('header', 'options'); } ?>
<?php if(get_field('custom_css')){ ?> 
<style>
<?php the_field('custom_css'); ?>
</style>
<?php } ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php if(get_field('body','options')) { the_field('body','options'); } ?>
<div class="blank-space"></div>
<header class="position-relative pt-3 pb-3 z-3 box-shadow bg-white w-100" style="top:0;left:0;z-index:3;">

<div class="nav">
<div class="container-fluid container-navbar pt-3 pb-3">
<div class="row align-items-center justify-content-center row-navbar">
<div class="col-md-4 col-3 nav-toggler-col text-center">
<small>Menu</small>
<a id="navToggle" class="nav-toggle">
<div>
<div class="line-1"></div>
<div class="line-2"></div>
<div class="line-3"></div>
</div>
</a>
</div>
<div class="col-md-3 col-6 text-center">
<a href="<?php echo home_url(); ?>">
<?php $logo = get_field('logo','options'); ?>
<?php echo wp_get_attachment_image($logo['id'],'full',"",['class'=>'h-auto logo']); ?>
</a>

</div>
<div class="col-lg-4 d-flex flex-wrap align-items-center justify-content-end">
<?php 
wp_nav_menu(array(
'menu' => 'Contact',
'menu_class'=>'menu d-flex flex-wrap list-unstyled justify-content-center mb-0'
));
?>
<a href="tel:+1<?php the_field('phone','options'); ?>" class="pl-5"><?php the_field('phone','options'); ?></a>
</div>
</div> <!-- end of row navbar -->
</div> <!-- end of container-navbar -->
<div class="container-fluid container-nav-items">
<div class="row nav-items closed" id="navItems">
<div id="body-overlay" class="position-absolute"></div>
<div class="col col-lg-3 col-md-6 col-12 slide-menu" id="menuCol1">
<a id="navClose" class="navClose text-black position-relative" style="font-size:2rem;right:-25px;-webkit-text-stroke: 2px white;cursor:pointer;">X</a>
<?php wp_nav_menu(array(
'menu' => 'Main Menu',
'menu_class'=>'menu list-unstyled justify-content-center mb-0 pl-lg-3 mt-md-5'
)); ?>
</div>
<div class="col col-lg-3 col-md-6 col-12 p-0 dropdown-menu-images" id="menuCol2">
<?php $featured_posts = get_field('navigation_menu','options');
if( $featured_posts ): ?>
<?php foreach( $featured_posts as $post ): 
// Setup this post for WP functions (variable must be named $post).
setup_postdata($post); ?>
<div class="col col-12 p-0 col-dropdown-menu-images">
<a href="<?php the_permalink(); ?>">
<div class="overlay position-absolute"></div>
<?php the_post_thumbnail('medium',array('class'=>'w-100 dropdown-menu-images-single')); ?>
<!-- <div class="pt-5 pb-5 bg-gray2 position-absolute"> -->
<div class="position-absolute dropdown-menu-images-content text-center w-100 text-white z-1">
<h3 class=""><?php the_title(); ?></h3>
</div>
<!-- </div> -->

</div>
<?php endforeach; ?>
<?php // Reset the global post object so that the rest of the page works correctly.
wp_reset_postdata(); ?>
<?php endif; ?>

</a>
</div>

</div>
</div> <!-- end of row nav items -->

</div> <!-- end of container-nav-items -->
</header>
<section class="hero position-relative pt-5 pb-5">
<?php 
if(is_page()){
// start of if has_post_thumbnail
if(has_post_thumbnail()){
the_post_thumbnail('full', array('class' => 'h-100 w-100 position-absolute bg-img img-hero'));
} else {
echo wp_get_attachment_image(51,'full','',['class'=>'h-100 w-100 position-absolute bg-img img-hero']);
}
// end of if has_post_thumbnail
} elseif(is_single()){
if(has_post_thumbnail()){
the_post_thumbnail('full', array('class' => 'h-100 w-100 position-absolute bg-img img-hero'));
} else {
echo wp_get_attachment_image(51,'full','',['class'=>'h-100 w-100 position-absolute bg-img img-hero']);
}
// end of if has_post_thumbnail
} else {
echo wp_get_attachment_image(51,'full','',['class'=>'h-100 w-100 position-absolute bg-img img-hero']);
} 
?>
<div class="hero-content position-relative overflow-h text-center text-white pt-5 pb-5">
<div class="multiply position-absolute"></div>
<div class="position-relative">
<?php if(is_front_page()) { ?> 
<h1 class="mb-0">
<div class="mb-4"><?php the_field('top_text'); ?></div>
<div class="row align-items-center justify-content-center">
<div class="col-lg-5 p-0 col-header-left">
<span class="h3"><?php the_field('left_text'); ?></span><br>
<span class="h6"><?php the_field('left_text_sub'); ?></span>
</div>
<div class="col-lg-1">
<span class="divider" style="color:#00bef2;font-size:8rem;">/</span>
</div>
<div class="col-lg-5 p-0 col-header-right">
<span class="h6"><?php the_field('right_text_top'); ?></span><br>
<span class="h3"><?php the_field('right_text'); ?></span>
</div>
</div>
</h1>
<?php } elseif(is_page()){ ?> 
<h1 class="mb-0 h2"><?php the_title(); ?></h1>
<?php } elseif(is_single()){ ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
<h1 class="mb-0 h2"><?php single_post_title(); ?></h1>
</div>
    </div>
</div>

<?php } elseif(is_author()){ ?> 
<h1 class="mb-0 h3">Author:<br><?php the_author(); ?></h1>
<?php } elseif(is_tag()){ ?> 
<h1 class="mb-0 h3"><?php single_tag_title(); ?></h1>
<?php } elseif(is_category()){ ?> 
<h1 class="mb-0 h3"><?php single_cat_title(); ?></h1>
<?php } elseif(is_archive()){ ?> 
<h1 class="mb-0 h3"><?php the_archive_title(); ?></h1>
<?php } ?>
</div>
</div>
</section>