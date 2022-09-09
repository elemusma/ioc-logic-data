<footer>
<section class="pt-5 pb-5 bg-accent text-center">
<a href="<?php echo home_url(); ?>">
        <?php $logo = get_field('logo','options'); ?>
        <?php echo wp_get_attachment_image($logo['id'],'full',"",['class'=>'h-auto mb-4 logo']); ?>
    </a>
    <?php wp_nav_menu(array(
    'menu' => 'Footer',
    'menu_class'=>'menu d-flex flex-wrap list-unstyled justify-content-center mb-0'
    )); ?>
    <p class="mb-0 text-white mt-4"><strong>Phone:</strong> <a href="tel:+1<?php the_field('phone','options'); ?>" class="text-white"><?php the_field('phone','options'); ?></a> <span class="gray-text">|</span> <strong>Address:</strong> <?php the_field('address','options'); ?> <span class="gray-text">|</span> <strong>Email:</strong> <a href="tel:+1<?php the_field('email','options'); ?>" class="text-white"><?php the_field('email','options'); ?></a></p>
</section>
<section class="pt-3 pb-3">
    <div class="bg-gray1 pt-2 pb-2 text-center">
        <a href="https://insideoutcreative.io" target="_blank" rel="noopener noreferrer" class="gray-text">WEB DESIGN &amp; DEVELOPMENT BY INSIDE OUT CREATIVE</a>
    </div>
</section>
</footer>
<?php if(get_field('footer', 'options')) { the_field('footer', 'options'); } ?>
<?php wp_footer(); ?>
</body>
</html>