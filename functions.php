<?php

//Add all custom functions, hooks, filters, ajax etc here

include('functions/start.php');

include('functions/clean.php');

//Custon wp-admin logo
function my_custom_login_logo() {
  echo '<style type="text/css">
		        h1 a {
		          background-size: 227px 85px !important;
		          margin-bottom: 20px !important;
		          background-image:url('.get_bloginfo('template_directory').'/images/logo.png) !important; }
		    </style>';
}

if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title'    => 'Global Site Settings',
        'menu_title'    => 'Global Site Settings',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));
}
//Add ajax functionality to pages, all not just in admin
//add_action('wp_enqueue_scripts','loadmore_ajaxurl');
//function loadmore_ajaxurl() {

// function update_locations_map( $post_id ) {
// 	 $post_type = get_post_type($post_id);
//
// 	 if('front_page' == $post_type){
//
// 	 $countries = get_field('countries', $post_id);
// 	 //var_dump $countries;
//
// 	 $abbr = $countries[0]('country');
// 	 $c_link = $countries[0]('country_lp;');
//
// 	 $a = [
// 	 	"id"->$abbr,
// 	 	"marker"->$c_link,
// 	 ];
//
// 	  array_push($arr, $a);
//
// 	  //The file location for the json file we're creating
//         $directory = get_template_directory().'/helpers/locations.json';
//         //Write to our file
//         $myfile = fopen(''.$directory.'', "w") or die("Unable to open file!");
//         fwrite($myfile, $arr);
//         fclose($myfile);
//     }
// }

add_action('save_post', 'update_locations_map', 10, 3);
// function my_endpoint( $request_data ) {

// 	// setup query argument
// 	$args = array(
// 		'post_type' => 'events',
// 	);

// 	// get posts
// 	$posts = get_posts($args);

// 	// add custom field data to posts array
// 	foreach ($posts as $key => $post) {
// 			$posts[$key]->acf = get_fields($post->ID);
// 			$posts[$key]->link = get_permalink($post->ID);
// 			$posts[$key]->image = get_the_post_thumbnail_url($post->ID);
// 	}
// 	return $posts;
// }

// register the endpoint
// add_action( 'rest_api_init', function () {
// 	register_rest_route( 'my_endpoint/v1', '/events/', array(
// 		'methods' => 'GET',
// 		'callback' => 'my_endpoint',
// 		)
// 	);
// }


?>
