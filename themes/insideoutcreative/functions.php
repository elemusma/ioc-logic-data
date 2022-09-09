<?php
function logic_data_stylesheets() {
wp_enqueue_style('style', get_stylesheet_uri() );

wp_enqueue_style('nav', get_theme_file_uri('/css/sections/nav.css'));
wp_enqueue_style('hero', get_theme_file_uri('/css/sections/hero.css'));
wp_enqueue_style('blog', get_theme_file_uri('/css/sections/blog.css'));
wp_enqueue_style('btn', get_theme_file_uri('/css/elements/btn.css'));
wp_enqueue_style('bootstrap', get_theme_file_uri('/css/bootstrap.min.css'));
wp_enqueue_style('fonts', get_theme_file_uri('/css/elements/fonts.css'));
wp_enqueue_style('img', get_theme_file_uri('/css/elements/img.css'));
wp_enqueue_style('photo-gallery', get_theme_file_uri('/css/sections/photo-gallery.css'));
wp_enqueue_style('body', get_theme_file_uri('/css/sections/body.css'));
wp_enqueue_style('sidebar', get_theme_file_uri('/css/sections/sidebar.css'));

// fonts
wp_enqueue_style('blair-itc', get_theme_file_uri('/blair-itc-font/stylesheet.css'));
wp_enqueue_style('proxima-nova', get_theme_file_uri('/proxima-nova/proxima-nova.css'));
wp_enqueue_style('aspira-font', get_theme_file_uri('/aspira-font/aspira-font.css'));

}
add_action('wp_enqueue_scripts', 'logic_data_stylesheets');
// for footer
function logic_data_stylesheets_footer() {
	// wp_enqueue_style('style-footer', get_theme_file_uri('/css/style-footer.css'));
	wp_enqueue_style('footer', get_theme_file_uri('/css/sections/footer.css'));
	// owl carousel
	wp_enqueue_style('owl.carousel.min', get_theme_file_uri('/owl-carousel/owl.carousel.min.css'));
	wp_enqueue_style('owl.theme.default', get_theme_file_uri('/owl-carousel/owl.theme.default.min.css'));
	wp_enqueue_style('lightbox-css', get_theme_file_uri('/lightbox/lightbox.min.css'));
	wp_enqueue_script('font-awesome', '//use.fontawesome.com/fff80caa08.js');
	// owl carousel
	wp_enqueue_script('jquery-min', get_theme_file_uri('/owl-carousel/jquery.min.js'));
	wp_enqueue_script('owl-carousel', get_theme_file_uri('/owl-carousel/owl.carousel.min.js'));
	wp_enqueue_script('owl-carousel-custom', get_theme_file_uri('/owl-carousel/owl-carousels.js'));
	wp_enqueue_script('lightbox-min-js', get_theme_file_uri('/lightbox/lightbox.min.js'));
	wp_enqueue_script('lightbox-js', get_theme_file_uri('/lightbox/lightbox.js'));
    // aos
    wp_enqueue_script('aos-js', get_theme_file_uri('/aos/aos.js'));
    wp_enqueue_script('aos-custom-js', get_theme_file_uri('/aos/aos-custom.js'));
    wp_enqueue_style('aos-css', get_theme_file_uri('/aos/aos.css'));
    // general
	wp_enqueue_script('nav-js', get_theme_file_uri('/js/nav.js'));
}
add_action('get_footer', 'logic_data_stylesheets_footer');
function logic_data_menus() {
 register_nav_menus( array(
   'primary' => __( 'Primary Menu' )));
register_nav_menus( array(
'secondary' => __( 'Secondary Menu' )));
 register_nav_menu('new-menu',__( 'Footer Links' ));
 add_theme_support('title-tag');
 add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'logic_data_menus');
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();
}
add_filter('show_admin_bar', '__return_false');

/* Describe what the code snippet does so you can remember later on */
add_action('wp_head', 'bing_yahoo_search_engine');
function bing_yahoo_search_engine(){
?>
<meta name="msvalidate.01" content="6AB55A55D6098F76118CF966DEE7D874" />
<?php
};

function btn_shortcode( $atts, $content = null ) {

$a = shortcode_atts( array(

'class' => '',

'href' => '#',

'style' => '',

'target' => ''

), $atts );

// return '<a class="btn-accent-primary" href="' . esc_attr($a['href']) . '" target="' . esc_attr($a['target']) . '">' . $content . '</a>';

return '<a class="' . esc_attr($a['class']) . '" href="' . esc_attr($a['href']) . '" style="' . esc_attr($a['style']) . '" target="' . esc_attr($a['target']) . '">' . $content . '</a>';

// [button href="#" class="btn btn-lg btn-default" style="font-weight:bold; margin-top:50px; background-color: #999″]Learn More[/button]

}

add_shortcode( 'button', 'btn_shortcode' );