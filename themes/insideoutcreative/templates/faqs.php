<?php
/**
 * Template Name: FAQs
 */
get_header(); ?>
<link rel="stylesheet" href="<?php echo home_url(); ?>/wp-content/themes/insideoutcreative/css/sections/faqs.css">
<section class="pt-5 pb-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <?php if(have_rows('faqs')): while(have_rows('faqs')): the_row(); ?>
<h3 class="accordion"><?php the_sub_field('title'); ?></h3>
<div class="panel">
  <p><?php the_sub_field('content',false,false); ?></p>
</div>
<?php endwhile; else : endif; ?>

            </div>
        </div>
    </div>
</section>
<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
}
</script>
<?php get_footer(); ?>