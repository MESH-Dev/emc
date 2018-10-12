<?php

//Use this file for wp menus, sidebars, image sizes, loadup scripts.



//enqueue scripts and styles *use production assets. Dev assets are located in  /css and /js
function loadup_scripts() {
   wp_enqueue_script( 'gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.4/TweenMax.min.js', '1.20.4', true );
   wp_enqueue_script( 'scrollmagic', 'http://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/ScrollMagic.js', '2.0.5', true );
   wp_enqueue_script( 'scrollmagic-gsap', 'http://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/plugins/animation.gsap.js', '2.0.5', true );
   if (is_page_template('templates/template-landing.php')) {
      wp_enqueue_script( 'anim-js', get_template_directory_uri().'/js/animations.js', array('jquery'), '1.0.0', true );
   }
   wp_enqueue_script( 'sidr', '//cdn.jsdelivr.net/npm/sidr@2.2.1/dist/jquery.sidr.min.js', array('jquery'), '1.0.0', true );
   wp_enqueue_style( 'sidr-css', '//cdn.jsdelivr.net/npm/sidr@2.2.1/dist/stylesheets/jquery.sidr.bare.css', '1.0.0', true );
   if(is_front_page()){
    wp_enqueue_script( 'vmap-js', get_template_directory_uri().'/js/jquery.vmap.min.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'vmap-world-js', get_template_directory_uri().'/js/jquery.vmap.world.js', array('jquery'), '1.0.0', true );
  }
  wp_enqueue_script( 'ui-js', get_template_directory_uri().'/js/jquery.ui.js', array('jquery'), '1.0.0', true );
  wp_enqueue_script( 'kinetic-js', get_template_directory_uri().'/js/jquery.kinetic.js', array('jquery'), '1.0.0', true );
  wp_enqueue_script( 'mousewheel-js', get_template_directory_uri().'/js/jquery.mousewheel.js', array('jquery'), '1.0.0', true );
  wp_enqueue_script( 'smooth-js', get_template_directory_uri().'/js/smoothdivscroll.js', array('jquery'), '1.0.0', true );
  //wp_enqueue_script( 'ticker-js', get_template_directory_uri().'/js/marquee3k.min.js', array('jquery'), '1.0.0', true );
  wp_enqueue_script( 'autoc-js', get_template_directory_uri().'/js/jquery.auto-complete.min.js', array('jquery'), '1.0.0', true );
  wp_enqueue_script( 'ticker-js', get_template_directory_uri().'/js/marquee3k.min.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'theme-js', get_template_directory_uri().'/js/mesh.js', array('jquery'), '1.0.0', true );
    wp_enqueue_style( 'vmap-css', get_template_directory_uri().'/css/jqvmap.css', array('jquery'), '1.0.0', true );
    wp_enqueue_style( 'autocomplete-style', get_template_directory_uri().'/css/jquery.auto-complete.css', true );
}
add_action( 'wp_enqueue_scripts', 'loadup_scripts' );

// Add Thumbnail Theme Support
add_theme_support('post-thumbnails');
add_image_size('background-fullscreen', 1800, 1200, true);
add_image_size('short-banner', 1800, 600, true);

add_image_size('large', 700, '', true); // Large Thumbnail
add_image_size('medium', 250, '', true); // Medium Thumbnail
add_image_size('small', 120, '', true); // Small Thumbnail
add_image_size('custom-size', 700, 200, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');
add_image_size('square', 800, 800, true);



//Register WP Menus
register_nav_menus(
    array(
        'main_nav' => 'Header and breadcrumb trail heirarchy',
        'social_nav' => 'Social menu used throughout',
        'footer_nav' => 'Footer navigation menu',
        'gateway_nav' => 'Gateway nav in the header'
    )
);

// Register Widget Area for the Sidebar
register_sidebar( array(
    'name' => __( 'Primary Widget Area', 'Sidebar' ),
    'id' => 'primary-widget-area',
    'description' => __( 'The primary widget area', 'Sidebar' ),
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
) );









?>
