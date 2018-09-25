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
        return '<script>,<style>,<br>,<em>,<i>,<ul>,<ol>,<li>,<a>,<p>, <h1>, <h2>, <h3>, <h4>, <h5>, <h6>'; 
    }

if ( ! function_exists( 'wpse_custom_wp_trim_excerpt' ) ) : 

    function wpse_custom_wp_trim_excerpt($wpse_excerpt) {
    $raw_excerpt = $wpse_excerpt;
        if ( '' == $wpse_excerpt ) {

            $wpse_excerpt = get_the_content('');
            $wpse_excerpt = strip_shortcodes( $wpse_excerpt );
            $wpse_excerpt = apply_filters('the_content', $wpse_excerpt);
            $wpse_excerpt = str_replace(']]>', ']]&gt;', $wpse_excerpt);
            //$wpse_excerpt = strip_tags($wpse_excerpt, wpse_allowedtags()); /*IF you need to allow just certain tags. Delete if all tags are allowed */

            //Set the excerpt word count and only break after sentence is complete.
            //__Since we are looking for a rough end-of-sententce point to trim the excerpt
            //__compensate by setting your word count 10-15 words above what you think you
            //__would need.

                $excerpt_word_count = 30;
                $excerpt_length = apply_filters('excerpt_length', $excerpt_word_count); 
                $tokens = array();
                $excerptOutput = '';
                $count = 0;

                $directory = get_template_directory();
                $imgs = '/img/arrow-right.svg';
                $arrow  = $directory.$imgs;
                $arrow_icon = file_get_contents($arrow);
                $arrow_clean = str_replace(array("\r\n", "\r", "\n"), '',$arrow_icon);

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

                //$excerpt_end = ' <a href="'. esc_url( get_permalink() ) . '">' . '&nbsp;&raquo;&nbsp;' . sprintf(__( 'Read more about: %s &nbsp;&raquo;', 'wpse' ), get_the_title()) . '</a>'; 
                $excerpt_end = ' ... <p><a class="more-link" href="'. esc_url( get_permalink() ) . '"><span class="text"><span class="img">'.$arrow_clean.'</span></a></p>';
                $excerpt_more = apply_filters('excerpt_more', $excerpt_end); 

                $pos = strrpos($wpse_excerpt, '</');
                //if ($pos !== false)
                // Inside last HTML tag
                $wpse_excerpt = substr_replace($wpse_excerpt, $excerpt_end, $pos, 0); /* Add read more next to last word */
                //else
                // After the content
                // __Only use this if you need your More content to be in a new paragraph below
                // __your excerpt
                //$wpse_excerpt .= $excerpt_more; /*Add read more in new paragraph */

            return $wpse_excerpt;   

        }
        return apply_filters('wpse_custom_wp_trim_excerpt', $wpse_excerpt, $raw_excerpt);
    }

endif; 

remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'wpse_custom_wp_trim_excerpt'); 
//$wpse_excerpt = strip_tags($wpse_excerpt, wpse_allowedtags());

function custom_excerpt_length( $length ) {
	return 15;
}
//add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function custom_excerpt_more( $more ) {
    return '...';
}
//add_filter( 'excerpt_more', 'custom_excerpt_more' );

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
//add_filter('the_excerpt', 'new_excerpt_more');

/* Display post thumbnail meta box including description */
add_filter( 'admin_post_thumbnail_html', 'post_thumbnail_add_description', 10, 2 );

function post_thumbnail_add_description( $content, $post_id ){
$post = get_post( $post_id );
$post_type = $post->post_type;
$extra = '';
if ( $post_type == 'community') {
  $extra = '<br>Recommended image size 800px x 800px';
}
    $content .= '<p><label for=\"html\">This image will be included on your post archive page.<br>Try to make sure that the focal point for this image is near the center of the photograph (<strong>especially important for member headshots</strong>)'.$extra.'</label></p>';
    return $content;
    return $post_id;
}

// // define the admin_title callback 
// function filter_admin_title( $admin_title, $title ) { 
//     // make filter magic happen here... 
//   global $before_title, $title, $after_title;
//   $before_title = '<label>';
//   $after_title = '</label>';
//     return $after_title.$title.$before_title;
// }; 
         
// add the filter 
//add_filter( 'admin_title', 'filter_admin_title', 10, 2 ); 

// function change_post_titles($admin_title) {
//     global $post, $after_title, $action, $current_screen;
//    // if (is_template('/templates/'))
//     $after_title = '<label>Event Title</label>';
// }
// apply_filters('admin_title', 'change_post_titles');
//function my_endpoint( $request_data ) {

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
  global $wp_query;
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
        $wp_query = new WP_Query( $args ); 
        //var_dump($args);
        $count = $wp_query->found_posts;
        

       if ( $wp_query->have_posts() ) : 
      // Do we have any posts in the databse that match our query?
      // In the case of the home page, this will call for the most recent posts 
      
        //echo '<div class="container '.$profile_class .'" id="project-gallery">';
         while ( $wp_query->have_posts() ) : $wp_query->the_post(); //We set up $the_query on line 144
        // If we have some posts to show, start a loop that will display each one the same way
        
        
         //if (have_rows ('project_gallery')): //Setup the panels between the top/bottom panels
               //Setup variables
               
                $the_title = get_the_title();
                $the_excerpt = get_the_excerpt();
                
                $target = '';

                $directory = get_bloginfo('template_directory');

                $f_override = get_field('override_feature_image_text', $post->ID);
                //$f_image = the_post_thumbnail('large', $post->ID);

                $feature = '';

          if(get_the_post_thumbnail() != '' && get_field('override_feature_image_text', $post->ID) == ''){
					   $feature = get_the_post_thumbnail( 'large');
				  }elseif(get_field('override_feature_image_text', $post->ID) != ''){
				  	//$b = "'bianco-reg'";
				  	$feature = '<h2 class="img-override">'.$f_override.'</h2>';
				  }

          //endif; 
          echo '
          
      		<article class="post">
					'.$feature.'
					<div class="content">
						<h2 class="listing-display-title">'.$the_title.'</h2>

						'.$the_excerpt.'
					</div>
      		</article>

		  ';
         endwhile; 

         // echo '<nav class="load_more results">'
         //  .next_posts_link( 'Load More' ).
         //  '</nav>';
         //
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
       wp_reset_query();
       die();//if this isn't included, you will get funky characters at the end of your query results.
}

add_action('wp_ajax_get_community_members', 'get_community_members');  
add_action('wp_ajax_nopriv_get_community_members', 'get_community_members'); 

function get_community_members(){
  //$post_topic = $_POST['postTopic'];
  $query = $_POST['query']; //*
 //var_dump($query);
 //Make the search exlusive to entries or clicking the filter
 if ($query == ''): //All posts? No filter
      $args = array(
      'post_type' => 'community',
      'posts_per_page' => 9,
      'post_status' => 'publish',
      'paged' => $paged,
      
      //
      );
 elseif ($query != ''): //All posts? No filter
      $args = array(
      'post_type' => 'community',
      'posts_per_page' => -1,
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
        $c_cnt=0;
        echo '<div class="row people-row">';

       if ( $the_query->have_posts() ) : 
      // Do we have any posts in the databse that match our query?
      // In the case of the home page, this will call for the most recent posts 
      
        //echo '<div class="container '.$profile_class .'" id="project-gallery">';
         while ( $the_query->have_posts() ) : $the_query->the_post(); //We set up $the_query on line 144
        // If we have some posts to show, start a loop that will display each one the same way
        
        
         //if (have_rows ('project_gallery')): //Setup the panels between the top/bottom panels
               //Setup variables
               $c_cnt++;
                $the_title = get_the_title();
                //$the_excerpt = get_the_excerpt();
                //$the_feature = get_the_post_thumbnail_url('')
                $id = $post->ID;
                $the_feature = get_the_post_thumbnail_url($id, 'large');
                $location = get_field('member_location');
                $question = get_field('member_question');
                $answer = get_field('member_answer');
                $div_class = '';
                if($c_cnt % 3 == 1){
                   $div_class = 'offset-by-1';
                }
                $target = '';

                $directory = get_bloginfo('template_directory');

                $f_override = get_field('override_feature_image_text', $post->ID);
                //$f_image = the_post_thumbnail('large', $post->ID);

                $feature = '';

          //       if(the_post_thumbnail($post->ID) != ''){
          // $feature = get_the_post_thumbnail('large');
          // }elseif(get_field('override_feature_image_text', $post->ID) != ''){
          //   $b = "'bianco-reg'";
          //   $feature = '<h2 style="text-align:center; font-size:48px; font-family: '.$b.';">'.$f_override.'</h2>';
          // }

          //endif; 
          echo '
          <div class="member columns-3 '.$div_class.'">
               <div class="thumbnail-block">
                  <div class="overlay">
                     <h6 class="question">'.$question.'</h6>
                     <p class="answer">'.$answer.'</p>
                  </div>
                  <div class="thumbnail" style="background-image:url('.$the_feature.')">

                  </div>
               </div>
               <h2 class="name">'.$the_title.'</h2>
               <p class="heading6 location">'.$location.'.</p>
            </div>
          ';
         endwhile; 
         if($c_cnt %3 == 0){
            echo '</div><div class="row people-row"> <!-- New Row -->';
          };
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

add_action('wp_ajax_get_events', 'get_events');  
add_action('wp_ajax_nopriv_get_events', 'get_events'); 

function get_events(){
  //$post_topic = $_POST['postTopic'];
  $event_topic = $_POST['eventTopic'];
  $event_location = $_POST['eventLocation'];
  $query = $_POST['query']; //*
  //var_dump($query);
  //var_dump($event_location);
  // $page = $_POST['page'];
  // var_dump($page);
  //var_dump($event_topic);
  //var_dump($event_location);

 if ($event_topic == '' && $event_location == '' && $query == ''): //All posts? No filter
      $args = array(
      'post_type' => 'events',
      'posts_per_page' => 6,
      'meta_key' => 'event_start_date',
      'orderby' => 'meta_value',
      'order' => 'ASC',
      'paged'=>$paged,
      //
      );
 elseif ($event_topic != '' ): //Using the filter - Topic filter used
      $args = array(
      'post_type' => 'events',
      'posts_per_page' => -1,
      'meta_key' => 'event_start_date',
      'orderby' => 'meta_value',
      'order' => 'ASC',
      'paged' => $paged,
      'post_status' => 'publish',
      //'s' => $query, //This is an 'and', so the query is effectively stopping here, if not commented out
      'tax_query' => array(
        array(
          'taxonomy' => 'event_topic',
          'field'    => 'slug',
          'terms'    => $event_topic, 
          ),
        ),
      );
      //var_dump($args['paged']);
  elseif ($event_location != '' ): //Using the filter - Topic filter used
  $args = array(
  'post_type' => 'events',
  'posts_per_page' => -1,
  'meta_key' => 'event_start_date',
  'orderby' => 'meta_value',
  'order' => 'ASC',
  'paged'=>$paged,
  'post_status' => 'publish',
  //'s' => $query, //This is an 'and', so the query is effectively stopping here, if not commented out
  'tax_query' => array(
    array(
      'taxonomy' => 'event_location',
      'field'    => 'slug',
      'terms'    => $event_location, 
      ),
    ),
  );
 //Make the search exlusive to entries or clicking the filter
 elseif ($query != ''): //All posts? No filter
      $args = array(
      'post_type' => 'events',
      'posts_per_page' => -1,
      'post_status' => 'publish',
      'meta_key' => 'event_start_date',
      'orderby' => 'meta_value',
      'order' => 'ASC',
      'paged'=>$paged,
      's' => $query
      //
      );

      //var_dump($query);
endif;
        // the query
      //var_dump($query);
      global $wp_query;
      global $paged;

        $wp_query = new WP_Query( $args ); 
        //var_dump($args);
        //$count = $the_query->found_posts;
        

       if ( $wp_query->have_posts() ) : 
      // Do we have any posts in the databse that match our query?
      // In the case of the home page, this will call for the most recent posts 
        $e_cnt=0;
        echo '<div class="row grid-row">';
        //echo '<div class="container '.$profile_class .'" id="project-gallery">';
         while ( $wp_query->have_posts() ) : $wp_query->the_post(); //We set up $the_query on line 144
        // If we have some posts to show, start a loop that will display each one the same way
        
        
         //if (have_rows ('project_gallery')): //Setup the panels between the top/bottom panels
               //Setup variables
               
            $the_title = get_the_title();
            
            $e_cnt++;
            $div_class='';
            $icon = get_field('eo_icon', $post->ID);
            $icon_url = $icon['sizes']['medium'];
            $icon_alt = $icon['alt'];
            $event_desc = get_field('event_description', $post->ID);
            $event_loc = get_field('event_location', $post->ID);
            $event_start = get_field('event_start_date', $post->ID);
            //$event_sd = date('F j, Y', $event_start);
            $event_end = get_field('event_end_date', $post->ID);

            $end='';
            //$dash = htm('&mdash');
            // if($event_end != '' && $event_end != $event_start){
            //   $end =  $dash.$event_end;
            // }
            $event_link_text = get_field('el_text', $post->ID);
            $event_link = get_field('el_link', $post->ID);
            $external = get_field('external', $post->ID);
            $event_tax = get_the_terms(get_the_ID(),'event_topic'); 
            $topic_name='';
            if($event_tax != ''){
               foreach($event_tax as $topic){
                  $topic_name = $topic->name;
               }
            }
            $target = '';
            if($external == true){
               $target='target="_blank"';
            }

            if($e_cnt % 2 != 0){
               $div_class = 'offset-by-1';
            }
                
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
          <div class="columns-5 card '.$div_class.'">
             <div class="row">
                <div class="event-columns-1">
                   <img src="'.$icon_url.'" alt="'.$icon_alt.'">
                </div>
                <div class="event-columns-4">
                   <p class="heading6 date">'.$event_start.'</p>
                   <p class="title">'.$the_title.'</p>
                   <p class="tags">'.$event_loc.' | '. $topic_name .'</p>
                   <div class="excerpt">'.$event_desc.'</div>
                   <a href="'.$event_link.'" '. $target.'>'.$event_link_text.'
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                         viewBox="0 0 100 100" style="enable-background:new 0 0 100 100;" xml:space="preserve">
                        <style type="text/css">
                           .st0{fill:#EED9BD;}
                           .st1{fill:#EC742E;}
                        </style>
                        <polygon class="st1" points="71.9,50.7 71.9,50.7 65.6,44.4 65.6,44.4 34.1,12.9 28.3,18.8 59.7,50.2 28.1,81.8 34.4,88.2
                           39.3,83.3 66,56.5 71.9,50.7 "/>
                     </svg>
                     </a>
                </div>
             </div>
          </div>';

          if($e_cnt %2 == 0){
            echo '</div><div class="row grid-row"> <!-- New Row -->';
          };
         endwhile; 
         // if($e_cnt % 2 == 0){
         //  echo '</div><div class="row grid-row">';
         // };
       else : // Well, if there are no posts to display and loop through, let's apologize to the reader (also your 404 error) 
        
        echo '<article class="post-error">
                <h3 class="404">
                  Your search did not produce any results!</br>
                
                  Please use a different search term, or try something more specific.
                </h3>
              </article>';
       endif; 
       echo '</div> <!--end row-->';
       //wp_reset_postdata();
       // OK, I think that takes care of both scenarios (having posts or not having any posts) 
       // echo '<nav class="load_more results">'
       //    .next_posts_link( 'Load More' ).
       //    '</nav>';
       wp_reset_query();
       die();//if this isn't included, you will get funky characters at the end of your query results.
}

add_action('wp_ajax_get_films', 'get_films');  
add_action('wp_ajax_nopriv_get_films', 'get_films'); 

function get_films(){
  //$post_topic = $_POST['postTopic'];
  $film_topic = $_POST['filmTopic'];
  $query = $_POST['query']; //*
  //var_dump($event_location);
  // $page = $_POST['page'];
  // var_dump($page);
  //var_dump($event_topic);
  //var_dump($event_location);

 if ($film_topic == '' && $query == ''): //All posts? No filter
      $args = array(
      'post_type' => 'films',
      'posts_per_page' => 5,
      'orderby' => 'post_date',
      'order' => 'ASC',
      'paged'=>$paged,
      'post_status' => 'publish',
      'tax_query' => array(
            array(
              'taxonomy' => 'film_topic',
              'field'    => 'slug',
              'terms'    => array('educational-psa', 'archive'), 
              'operator' => 'NOT IN',
              ),
            ),
      //
      );
 elseif ($film_topic != '' ): //Using the filter - Topic filter used
      $args = array(
      'post_type' => 'films',
      'posts_per_page' => -1,
      'orderby' => 'post_date',
      'order' => 'ASC',
      'paged' => $paged,
      'post_status' => 'publish',
      //'s' => $query, //This is an 'and', so the query is effectively stopping here, if not commented out
      'tax_query' => array(
        array(
          'taxonomy' => 'film_topic',
          'field'    => 'slug',
          'terms'    => $film_topic, 
          ),
        ),
      );
      //var_dump($args['paged']);
 //Make the search exlusive to entries or clicking the filter
 elseif ($query != ''): //All posts? No filter
      $args = array(
      'post_type' => 'films',
      'posts_per_page' => -1,
      'post_status' => 'publish',
      'orderby' => 'post_date',
      //'meta_key' => 'event_start_date',
      //'orderby' => 'meta_value',
      'order' => 'ASC',
      'paged'=>$paged,
      's' => $query
      //
      );

      //var_dump($query);
endif;
        // the query
      //var_dump($query);
      global $wp_query;
      global $paged;

        $wp_query = new WP_Query( $args ); 
        //var_dump($args);
        //$count = $the_query->found_posts;
        

       if ( $wp_query->have_posts() ) : 
      // Do we have any posts in the databse that match our query?
      // In the case of the home page, this will call for the most recent posts 
        //$e_cnt=0;
        //echo '<div class="row grid-row">';
        //echo '<div class="container '.$profile_class .'" id="project-gallery">';
         while ( $wp_query->have_posts() ) : $wp_query->the_post(); //We set up $the_query on line 144
        // If we have some posts to show, start a loop that will display each one the same way
        
        
         //if (have_rows ('project_gallery')): //Setup the panels between the top/bottom panels
               //Setup variables
               
            $the_title = get_the_title();
            $the_link = get_the_permalink();
            $excerpt = get_field('custom_excerpt');
            $excerpt_style = get_field('excerpt_style');
            $id = $post->ID;
            $img = get_the_post_thumbnail_url($id, 'large');
            //var_dump($img);
            $film_type = get_the_terms($id, 'film_type');
            $type = $film_type[0]->name;

            $excerpt_style = get_field('excerpt_style');
          $ex_class = '';
          if ($excerpt_style == 'bold'){
            $ex_class = 'first';
          }

          

          //endif; 
          echo 
          '
           <div class="row listing-row">
            <div class="listing-card columns-12">
               <div class="thumbnail columns-7" style="background-image:url('. $img.')";">
               </div>
               <div class="item-text columns-5">
                  <h4 class="item-title pf">'.$the_title.'</h4>
                  <p class="item-exc'.$ex_class.'sf">'.$custom_excerpt.'</p>
                  <a class="read-more pf" href="'.$the_link.'">Watch the '.$type.'</a>
               </div>
            </div>
         </div>
         ';

          if($e_cnt %2 == 0){
            //echo '</div><div class="row grid-row"> <!-- New Row -->';
          };
         endwhile; 
         // if($e_cnt % 2 == 0){
         //  echo '</div><div class="row grid-row">';
         // };
       else : // Well, if there are no posts to display and loop through, let's apologize to the reader (also your 404 error) 
        
        echo '<article class="post-error">
                <h3 class="404">
                  Your search did not produce any results!</br>
                
                  Please use a different search term, or try something more specific.
                </h3>
              </article>';
       endif; 
       //echo '</div> <!--end row-->';
       //wp_reset_postdata();
       // OK, I think that takes care of both scenarios (having posts or not having any posts) 
       // echo '<nav class="load_more results">'
       //    .next_posts_link( 'Load More' ).
       //    '</nav>';
       wp_reset_query();
       die();//if this isn't included, you will get funky characters at the end of your query results.
}

add_action('wp_ajax_get_the_resources', 'get_the_resources');  
add_action('wp_ajax_nopriv_get_resources', 'get_the_resources'); 

function get_the_resources(){
  //$post_topic = $_POST['postTopic'];
  $resource_topic = $_POST['resourceTopic'];
  $resource_type = $_POST['resourceType'];
  $query = $_POST['query']; //*
  //var_dump($event_location);
  // $page = $_POST['page'];
  // var_dump($page);
  //var_dump($event_topic);
  //var_dump($event_location);

 if ($resource_topic == '' && $resource_type == '' && $query == ''): //All posts? No filter
      $args = array(
      'post_type' => 'resources',
      'posts_per_page' => 6,
      //'meta_key' => 'event_start_date',
      //'orderby' => 'meta_value',
      'order' => 'ASC',
      'paged'=>$paged
      //
      );
 elseif ($resource_topic != '' ): //Using the filter - Topic filter used
      $args = array(
      'post_type' => 'resources',
      'posts_per_page' => -1,
      'order' => 'ASC',
      'paged' => $paged,
      'post_status' => 'publish',
      'tax_query' => array(
        array(
          'taxonomy' => 'media_topic',
          'field'    => 'slug',
          'terms'    => $resource_topic, 
          ),
        ),
      );
      //var_dump($args['paged']);
  elseif ($resource_type != '' ): //Using the filter - Topic filter used
  $args = array(
  'post_type' => 'resources',
  'posts_per_page' => -1,
  'order' => 'ASC',
  'paged'=>$paged,
  'post_status' => 'publish',
  'tax_query' => array(
        array(
          'taxonomy' => 'media_type',
          'field'    => 'slug',
          'terms'    => $resource_type, 
          ),
        ),

  );
 //Make the search exlusive to entries or clicking the filter
 elseif ($query != ''): //All posts? No filter
      $args = array(
      'post_type' => 'resources',
      'posts_per_page' => -1,
      'post_status' => 'publish',
      'order' => 'ASC',
      'paged'=>$paged,
      's' => $query
      );

      //var_dump($query);
endif;
        // the query
      //var_dump($query);
      global $wp_query;
      global $paged;

        $wp_query = new WP_Query( $args ); 
        $count = $wp_query->post_count;
        //var_dump($args);
        //$count = $the_query->found_posts;
        

       if ( $wp_query->have_posts() ) : 
      // Do we have any posts in the databse that match our query?
      // In the case of the home page, this will call for the most recent posts 
        $r_cnt=0;
        echo '<div class="row event-grid resource-grid">';
        //echo '<div class="container '.$profile_class .'" id="project-gallery">';
         while ( $wp_query->have_posts() ) : $wp_query->the_post(); //We set up $the_query on line 144
        // If we have some posts to show, start a loop that will display each one the same way
        
        
         //if (have_rows ('project_gallery')): //Setup the panels between the top/bottom panels
               //Setup variables
               
                  $r_cnt++;
                  $id = $post->ID;
                  $the_title = get_the_title();
                 $div_class='';
                 $icon = get_field('resource_icon');
                 $icon_url = $icon['sizes']['medium'];
                 $icon_alt = $icon['alt'];
                 //$event_desc = get_field('event_description');
                 //$event_loc = get_field('event_location');
                 //$event_start = get_field('event_start_date');
                 //$event_sd = date('F j, Y', $event_start);
                 //$event_end = get_field('event_end_date');
                 //$event_link_text = get_field('el_text');
                 $resource_link = get_field('resource_link');
                 //$external = get_field('external');
                 //$event_tax = get_the_terms($id,'event_topic');

                 $r_type = get_the_terms($id, 'media_type')[0]->name;
                 //$r_type = $r_types['media_type']['name'][0];
                 // $topic_name='';
                 // if($event_tax != ''){
                 //    foreach($event_tax as $topic){
                 //       $topic_name = $topic->name;
                 //    }
                 // }
                 // $target = '';
                 // if($external == true){
                 //    $target='target="_blank"';
                 // }

                 if($r_cnt % 2 != 0){
                    $div_class = 'offset-by-1';
                 }

                   $categories='';
                   $separator=", ";
                   foreach (get_the_terms(get_the_ID(), 'media_topic') as $cat) {
                      $categories .= $cat->name . $separator;
                   }

                  $cat_list = rtrim($categories, $separator);
          

          //endif; 
                   //rtrim($categories, $separator)
          echo '
          <div class="columns-5 card '.$div_class.'">
                        <div class="row">
                           <div class="resource-columns-3">
                              <img style="max-width:100%;" src="'.$icon_url.'" alt="'.$icon_alt.'">
                           </div>
                           <div class="resource-columns-7">
                             <p class="heading6 date">'.$cat_list.'</p>
                             <p class="title">
                               <a href="'.$resource_link.'" target="_blank">
                                 <span class="category">'.$r_type.':</span> '.$the_title.'
                               </a>
                             </p>
                           </div>
                        </div>
                     </div>';

          if($r_cnt %2 == 0 && $r_cnt != $count){
                echo '</div><div class="row event-grid resource-grid">';
             }elseif($r_cnt == $count){
              echo '</div>';
             }
         endwhile; 
         // if($e_cnt % 2 == 0){
         //  echo '</div><div class="row grid-row">';
         // };
       else : // Well, if there are no posts to display and loop through, let's apologize to the reader (also your 404 error) 
        
        echo '<article class="post-error">
                <h3 class="404">
                  Your search did not produce any results!</br>
                
                  Please use a different search term, or try something more specific.
                </h3>
              </article>';
       endif; 
       echo '</div> <!--end row-->';
       //wp_reset_postdata();
       // OK, I think that takes care of both scenarios (having posts or not having any posts) 
       // echo '<nav class="load_more results">'
       //    .next_posts_link( 'Load More' ).
       //    '</nav>';
       wp_reset_query();
       die();//if this isn't included, you will get funky characters at the end of your query results.
}

//Can we get this to work for page filter/search results?
// add_action('wp_enqueue_scripts','loadmore_ajaxurl');
// function loadmore_ajaxurl() {

//   global $wp_query;
//   //var_dump($wp_query);

//     $args = array(
//       'post_type' => 'post',
//       'posts_per_page' => 6,
//       // 'meta_key' => 'event_start_date',
//       // 'orderby' => 'meta_value',
//       // 'order' => 'ASC',
//       //'paged'=>$paged,
//       );

//      $the_query = new WP_Query($args);

//   wp_register_script( 'my_loadmore', get_template_directory_uri().'/js/myloadmore.js', array('jquery'), true);


//     wp_localize_script( 'my_loadmore', 'loadmore_params', array(
//     'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
//     'posts' => json_encode( $the_query->query_vars ), // everything about your loop is here
//     'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
//     'max_page' => $the_query->max_num_pages
//   ) );

//       wp_enqueue_script( 'my_loadmore',get_template_directory_uri().'/js/myloadmore.js', array('jquery'),true);

//      }

//      function loadmore_ajax_handler(){

//   // prepare our arguments for the query
//   $args = json_decode( stripslashes( $_POST['query'] ), true );
//   //var_dump($args);
//   //var_dump('Args= '.$args);
//   $args['paged'] = $_POST['page'] + 1; // we need next page to be loaded
//   $args['post_status'] = 'publish';

//   // it is always better to use WP_Query but not here
//   query_posts( $args );

//   // $args = array(
//   //    'post_type' => 'post',
//   //    'posts_per_page' => 5,
//   //    );

//   //  $the_query = new WP_Query($args);

//   if( have_posts() ) :

//     // run the loop
//     while( have_posts() ): the_post();

//       // look into your theme code how the posts are inserted, but you can use your own HTML of course
//       // do you remember? - my example is adapted for Twenty Seventeen theme
//       //get_template_part( 'template-parts/post/content', get_post_format() );
//       // for the test purposes comment the line above and uncomment the below one
//       // the_title();

//       echo '<article class="post row">';
//       echo '<div class="columns-6">';
//       echo '<h2>'.get_the_title(). '</a></h2>';
//       //echo '<p class="postinfo">By '.the_author().' | Categories: '.the_category(', ').' | '. comments_popup_link().'</p>';
//       the_excerpt($post->ID);
//       //echo '<a href="'.get_the_permalink().'">Learn more about our story</a>';
//       echo '</div>';
//       $img_id = get_post_thumbnail_id($post->ID);
//       //var_dump($img_id);
//       $alt = get_post_meta($img_id, '_wp_attachment_image_alt', true);
//       if(has_post_thumbnail($post->ID)){

//         echo '<div class="columns-6 grid-item img" style="background-image:url('.get_the_post_thumbnail_url($post->ID, 'large').');">';
//         //echo '<img class="" alt="'.$alt.'" src="'.get_the_post_thumbnail_url($post->ID, 'large').'" >';
//         echo '</div>';
//       }
//       echo '</article>';


//     endwhile;

//   endif;
//   die; // here we exit the script and even no wp_reset_query() required!
// }

// add_action('wp_ajax_loadmore', 'loadmore_ajax_handler'); // wp_ajax_{action}
// add_action('wp_ajax_nopriv_loadmore', 'loadmore_ajax_handler'); // wp_ajax_nopriv_{action}

add_action( 'admin_head', 'hide_text_editor' );

function hide_text_editor() {
  // Get the Post ID.
  $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
  if( !isset( $post_id ) ) return;

  // Hide the editor on certian pages
   $pgname = get_the_title($post_id);
   $pages = array('Content Tester');
  if(in_array($pgname, $pages)){ 
    remove_post_type_support('page', 'editor');
  }

  // Hide the editor on a page with a specific page template
  // Get the name of the Page Template file.
  $template_file = get_post_meta($post_id, '_wp_page_template', true);
  $templates = array('templates/template-landing.php', 'templates/template-filmlibrary.php', 'templates/template-homepage.php', 'templates/template-event-listing.php', 'single-films.php');


  if(in_array($template_file, $templates)){ // the filename of the page template
    remove_post_type_support('page', 'editor');
  }
}


/**
 * Extend WordPress search to include custom fields
 *
 * https://adambalee.com
 */

/**
 * Join posts and postmeta tables
 *
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_join
 */
function cf_search_join( $join ) {
    global $wpdb;

    if ( is_search() ) {    
        $join .=' LEFT JOIN '.$wpdb->postmeta. ' ON '. $wpdb->posts . '.ID = ' . $wpdb->postmeta . '.post_id ';
    }

    return $join;
}
add_filter('posts_join', 'cf_search_join' );

/**
 * Modify the search query with posts_where
 *
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_where
 */
function cf_search_where( $where ) {
    global $pagenow, $wpdb;

    if ( is_search() ) {
        $where = preg_replace(
            "/\(\s*".$wpdb->posts.".post_title\s+LIKE\s*(\'[^\']+\')\s*\)/",
            "(".$wpdb->posts.".post_title LIKE $1) OR (".$wpdb->postmeta.".meta_value LIKE $1)", $where );
    }

    return $where;
}
add_filter( 'posts_where', 'cf_search_where' );

/**
 * Prevent duplicates
 *
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_distinct
 */
function cf_search_distinct( $where ) {
    global $wpdb;

    if ( is_search() ) {
        return "DISTINCT";
    }

    return $where;
}
add_filter( 'posts_distinct', 'cf_search_distinct' );

?>
