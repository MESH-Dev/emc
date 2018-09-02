<?php

//Add all custom functions, hooks, filters, ajax etc here

include('functions/start.php');
include('functions/cpt.php');
include('functions/clean.php');

//ini_set( 'mysql.trace_mode', 0 );

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
add_action('wp_head','pluginname_ajaxurl');
function pluginname_ajaxurl() {
    ?>
    <script type="text/javascript">
    var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
    </script>
    <?php
    }


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


//add_action('save_post', 'update_locations_map', 10, 3);



function wpse_allowedtags() {
    // Add custom tags to this string
        return '<script>,<style>,<br>,<em>,<i>,<ul>,<ol>,<li>,<a>,<p>,<img>,<video>,<audio>, <h1>, <h2>, <h3>, <h4>, <h5>, <h6>'; 
    }

if ( ! function_exists( 'wpse_custom_wp_trim_excerpt' ) ) : 

    function wpse_custom_wp_trim_excerpt($wpse_excerpt) {
    $raw_excerpt = $wpse_excerpt;
        if ( '' == $wpse_excerpt ) {

            $wpse_excerpt = get_the_content('');
            $wpse_excerpt = strip_shortcodes( $wpse_excerpt );
            $wpse_excerpt = apply_filters('the_content', $wpse_excerpt);
            $wpse_excerpt = str_replace(']]>', ']]&gt;', $wpse_excerpt);
            $wpse_excerpt = strip_tags($wpse_excerpt, wpse_allowedtags()); /*IF you need to allow just certain tags. Delete if all tags are allowed */

            //Set the excerpt word count and only break after sentence is complete.
                $excerpt_word_count = 75;
                $excerpt_length = apply_filters('excerpt_length', $excerpt_word_count); 
                $tokens = array();
                $excerptOutput = '';
                $count = 0;

                // Divide the string into tokens; HTML tags, or words, followed by any whitespace
                preg_match_all('/(<[^>]+>|[^<>\s]+)\s*/u', $wpse_excerpt, $tokens);

                foreach ($tokens[0] as $token) { 

                    if ($count >= $excerpt_length && preg_match('/[\,\;\?\.\!]\s*$/uS', $token)) { 
                    // Limit reached, continue until , ; ? . or ! occur at the end
                        $excerptOutput .= trim($token);
                        break;
                    }

                    // Add words to complete sentence
                    $count++;

                    // Append what's left of the token
                    $excerptOutput .= $token;
                }

            $wpse_excerpt = trim(force_balance_tags($excerptOutput));

                $excerpt_end = ' <a href="'. esc_url( get_permalink() ) . '">' . '&nbsp;&raquo;&nbsp;' . sprintf(__( 'Read more about: %s &nbsp;&raquo;', 'wpse' ), get_the_title()) . '</a>'; 
                $excerpt_more = apply_filters('excerpt_more', ' ' . $excerpt_end); 

                //$pos = strrpos($wpse_excerpt, '</');
                //if ($pos !== false)
                // Inside last HTML tag
                //$wpse_excerpt = substr_replace($wpse_excerpt, $excerpt_end, $pos, 0); /* Add read more next to last word */
                //else
                // After the content
                $wpse_excerpt .= $excerpt_more; /*Add read more in new paragraph */

            return $wpse_excerpt;   

        }
        return apply_filters('wpse_custom_wp_trim_excerpt', $wpse_excerpt, $raw_excerpt);
    }

endif; 

remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'wpse_custom_wp_trim_excerpt'); 


function custom_excerpt_length( $length ) {
	return 30;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function custom_excerpt_more( $more ) {
    //return '...';
}
add_filter( 'excerpt_more', 'custom_excerpt_more' );

/**
 * Replace the_excerpt "more" text with a link
 *
 */

function new_excerpt_more($more) {
    global $post;
    $directory = get_template_directory();
    $imgs = '/img/arrow-right.svg';
    $arrow  = $directory.$imgs;
    $arrow_icon = file_get_contents($arrow);
    $arrow_clean = str_replace(array("\r\n", "\r", "\n"), '',$arrow_icon);
    return $more . '<p><a class="more-link" href="'. get_permalink($post->ID) . '"><span class="text"><span class="img">'.$arrow_clean.'</span></a></p>';
}
add_filter('the_excerpt', 'new_excerpt_more');

/* Display post thumbnail meta box including description */
add_filter( 'admin_post_thumbnail_html', 'plc_post_thumbnail_add_description', 10, 2 );

function plc_post_thumbnail_add_description( $content, $post_id ){
$post = get_post( $post_id );
$post_type = $post->post_type;
//if ( $post_type == 'post' {
    $content .= "<p><label for=\"html\">This image will be included on your blog post archive page</label></p>";
    return $content;
    return $post_id;
//}
}
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


add_action('wp_ajax_get_post_by_topic', 'get_post_by_topic');  
add_action('wp_ajax_nopriv_get_post_by_topic', 'get_post_by_topic');  //_nopriv_ allows access for both signed in users, and not


function get_post_by_topic(){
  $post_topic = $_POST['postTopic'];
  $query = $_POST['query']; //*
 
 //Make the search exlusive to entries or clicking the filter
 if ($post_topic == '' && $query == ''): //All posts? No filter
      $args = array(
      'post_type' => 'post',
      'posts_per_page' => 4,
      'post_status' => 'publish',
      'paged' => $paged,
      //
      );
 elseif ($post_topic != '' ): //Using the filter - Topic filter used
      $args = array(
      'post_type' => 'post',
      'posts_per_page' => 4,
      'paged' => $paged,
      'post_status' => 'publish',
      //'s' => $query, //This is an 'and', so the query is effectively stopping here, if not commented out
      'tax_query' => array(
        array(
          'taxonomy' => 'category',
          'field'    => 'slug',
          'terms'    => $post_topic, 
          ),
        ),
      );
elseif($query != ''):  //If the search is used
      $args = array(
      'post_type' => 'post',
      'posts_per_page' => 4,
      'paged' => $paged,
      'post_status' => 'publish',
      's' => $query
      //
          
         // ),
        //),
      );
      //var_dump($query);
endif;
        // the query
      //var_dump($query);
        $the_query = new WP_Query( $args ); 
        //var_dump($args);
        $count = $the_query->found_posts;
        

       if ( $the_query->have_posts() ) : 
      // Do we have any posts in the databse that match our query?
      // In the case of the home page, this will call for the most recent posts 
      
        //echo '<div class="container '.$profile_class .'" id="project-gallery">';
         while ( $the_query->have_posts() ) : $the_query->the_post(); //We set up $the_query on line 144
        // If we have some posts to show, start a loop that will display each one the same way
        
        
         //if (have_rows ('project_gallery')): //Setup the panels between the top/bottom panels
               //Setup variables
               
                $the_title = get_the_title();
                $the_excerpt = get_the_excerpt();
                
                $target = '';

                $directory = get_bloginfo('template_directory');

                $f_override = get_field('override_feature_image_text', $post->ID);
                $f_image = the_post_thumbnail('large', $post->ID);

                $feature = '';

                if(the_post_thumbnail($post->ID) != ''){
					$feature = get_the_post_thumbnail('large');
				  }elseif(get_field('override_feature_image_text', $post->ID) != ''){
				  	$b = "'bianco-reg'";
				  	$feature = '<h2 style="text-align:center; font-size:48px; font-family: '.$b.';">'.$f_override.'</h2>';
				  }

          //endif; 
          echo '
          <section id="posts">
      		<article class="post">
					'.$feature.'
					<div class="content" style="width:60%; margin:0 auto; text-align:center;">
						<h2>'.$the_title.'</h2>

						'.$the_excerpt.'
					</div>
      		</article>

		  </section>';
         endwhile; 
         
       else : // Well, if there are no posts to display and loop through, let's apologize to the reader (also your 404 error) 
        
        echo '<article class="post-error">
                <h3 class="404">
                  Your search did not produce any results!</br>
                
                  Please use a different search term, or try something more specific.
                </h3>
              </article>';
       endif; // OK, I think that takes care of both scenarios (having posts or not having any posts) 
       // echo '<nav class="load_more results">'
		     //  .next_posts_link( 'Load More' ).
		    	// '</nav>';
       die();//if this isn't included, you will get funky characters at the end of your query results.
}

function get_community_members(){
  //$post_topic = $_POST['postTopic'];
  $query = $_POST['query']; //*
 
 //Make the search exlusive to entries or clicking the filter
 if ($query != ''): //All posts? No filter
      $args = array(
      'post_type' => 'community',
      'posts_per_page' => 9,
      'post_status' => 'publish',
      'paged' => $paged,
      's' => $query
      //
      );

      //var_dump($query);
endif;
        // the query
      //var_dump($query);
        $the_query = new WP_Query( $args ); 
        //var_dump($args);
        $count = $the_query->found_posts;
        

       if ( $the_query->have_posts() ) : 
      // Do we have any posts in the databse that match our query?
      // In the case of the home page, this will call for the most recent posts 
      
        //echo '<div class="container '.$profile_class .'" id="project-gallery">';
         while ( $the_query->have_posts() ) : $the_query->the_post(); //We set up $the_query on line 144
        // If we have some posts to show, start a loop that will display each one the same way
        
        
         //if (have_rows ('project_gallery')): //Setup the panels between the top/bottom panels
               //Setup variables
               
                $the_title = get_the_title();
                $the_excerpt = get_the_excerpt();
                
                $target = '';

                $directory = get_bloginfo('template_directory');

                $f_override = get_field('override_feature_image_text', $post->ID);
                $f_image = the_post_thumbnail('large', $post->ID);

                $feature = '';

                if(the_post_thumbnail($post->ID) != ''){
          $feature = get_the_post_thumbnail('large');
          }elseif(get_field('override_feature_image_text', $post->ID) != ''){
            $b = "'bianco-reg'";
            $feature = '<h2 style="text-align:center; font-size:48px; font-family: '.$b.';">'.$f_override.'</h2>';
          }

          //endif; 
          echo '
          <section id="posts">
          <article class="post">
          '.$feature.'
          <div class="content" style="width:60%; margin:0 auto; text-align:center;">
            <h2>'.$the_title.'</h2>

            '.$the_excerpt.'
          </div>
          </article>

      </section>';
         endwhile; 
         
       else : // Well, if there are no posts to display and loop through, let's apologize to the reader (also your 404 error) 
        
        echo '<article class="post-error">
                <h3 class="404">
                  Your search did not produce any results!</br>
                
                  Please use a different search term, or try something more specific.
                </h3>
              </article>';
       endif; // OK, I think that takes care of both scenarios (having posts or not having any posts) 
       // echo '<nav class="load_more results">'
         //  .next_posts_link( 'Load More' ).
          // '</nav>';
       die();//if this isn't included, you will get funky characters at the end of your query results.
}


?>
