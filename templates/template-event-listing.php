<?php get_header();
/* Template Name: Event Listing*/
?>
<?php
  $separator = ', ';
  $e_topics = get_terms(['taxonomy' => 'event_topic', 'hide_empty' => false]);
  
  $e_topic = '';
  foreach ($e_topics as $t){
    $e_topic .= '"'.$t->name.'"'.$separator;
    //var_dump($t->name);
  }
  $e_locs = get_terms(['taxonomy' => 'event_location', 'hide_empty' => false]);
  $e_loc = '';
  foreach ($e_locs as $l){
    $e_loc .= '"'.$l->name.'"'.$separator;
  }
   $args2 = array(
            'post_type' => 'events',
            'posts_per_page' => -1,
            'meta_key' => 'event_start_date',
            'orderby' => 'meta_value',
            'order' => 'ASC',
            'paged'=>$paged
         );

        $page_titles = wp_list_pluck( get_pages($args2), 'post_title' );
        //$wp_list = wp_list_pluck( get_pages($args));
        $pages = get_pages($args2);
        $e_desc = '';
        $query = new WP_Query( $args2 );
          if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post();
        $meta = get_post_meta(get_the_ID(), 'event_description');
        
        foreach($meta as $desc){
          $e_desc.='"'.addslashes($desc).'"'.$separator;
        }

        
         endwhile; endif; wp_reset_postdata();

        // $query = new WP_Query( array( 'post_type' => 'events' ) );
        // wp_reset_query();
        // $posts = $query->posts;
        // var_dump($posts);

        // foreach($posts as $post) {
        //     // Do your stuff, e.g.
        //      echo $post->post_title;
        // }
        //var_dump($e_desc);
        $titles='';
        foreach($page_titles as $title){
          $titles .= '"'.addslashes($title).'"'.$separator;
        }
        //var_dump($page_titles);
//print_r( $page_titles );
?>
<script>
var ec_choices = [];
ec_choices.push(<?php echo $e_topic.$e_loc.$titles.$e_desc; ?>);//.$titles
//console.log(ec_choices);
</script>

<main id="content" class="landing">
   <?php
   $background_img = get_field('background_image');
   $background_image_url = $background_img['sizes']['short-banner'];
   $v_ogg = get_field('video_ogg');
   $vo_url = $v_ogg['url'];
   $v_mp4 = get_field('video_mp4');
   $vm_url = $v_mp4['url'];
   $v_webm = get_field('video_webm');
   $vw_url = $v_webm['url'];
   $l_page_callout = get_field('banner_callout_text');
?>
<div class="welcome-gate interior" style="background-image:url('<?php echo $background_image_url; ?>">
   <!-- <img src="<//?php echo get_template_directory_uri(); ?>/img/everymothercounts_logo_primary_white_40in.png" alt=""> -->
   <?php if ($vm_url == '' && $vo_url == '' && $vw_url == ""){ ?>
   <div class="welcome-gate-bg" style="background-image:url('<?php echo $background_image_url; ?>');"></div>
   <?php } ?>
   <div class="banner-text columns-5 offset-by-1">
      <p class="top-callout"><?php echo get_the_title(); ?></p>
      <h1 class="page-title heading1"><?php echo $l_page_callout; ?></h1>
   </div>
   <div class="overlay" aria-hidden="true"></div>
   <?php if ($vm_url != '' && $vo_url != '' && $vw_url != ""){ ?>
      <video placeholder="<?php echo $background_image_url; ?>" autoplay="true" loop="true" muted="true">
         <source src ="<?php echo $vm_url; ?>" autoplay="true" loop="true" muted="true">
         <source src ="<?php echo $vo_url; ?>" autoplay="true" loop="true" muted="true">
         <source src ="<?php echo $vw_url; ?>" autoplay="true" loop="true" muted="true">
      <video>
   <?php } ?>
</div>
   <div class="panel filters">
      <div class="container">
         <div class="row">
            <div class="columns-10 offset-by-1">
               <ul>
                  <li>
                     <p>Explore our events:</p>
                  </li>
                  <li class="filter">
                     <a class="filter-trigger" id="topicTrigger">
                        <p>Filter by topic</p>
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
                  </li>
                  <li class="filter">
                     <a class="filter-trigger" id="locationTrigger">
                        <p>Filter by location</p>
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
                  </li>
                  <li class="filter">
                     <a class="filter-trigger" id="searchTrigger">
                        <p>Search</p>
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
                  </li>
               </ul>
            </div>
         </div>
      </div>
   </div>
   <div class="filter-bar">
      <div class="panel topics">
         <div class="container">
            <div class="row">
               <div class=""><!-- columns-10 offset-by-1 -->
                  <ul class="e-topic-filters">
                     <li data-filter="">All</li>
                     <?php
                              //$categories='';
                              //$separator=", ";
                              // $terms = get_terms([
                              //     'taxonomy' => 'category',
                              //     'hide_empty' => true,
                              // ]);

                              $event_topics = get_terms(['taxonomy' => 'event_topic', 'hide_empty' => false]);

                              //var_dump($terms);
                                 foreach ($event_topics as $topic) {?>

                                   <li data-filter="<?php echo $topic->slug; ?>"><?php echo $topic->name ?></li>
                           <?php } ?>

                  </ul>
               </div>
            </div>
         </div>
      </div>
      <div class="panel locations">
         <div class="container">
            <div class="row">
               <div class="columns-10 offset-by-1">
                  <ul class="e-location-filters">
                     <li data-filter="">All</li>
                      <?php
                              //$categories='';
                              //$separator=", ";
                              // $terms = get_terms([
                              //     'taxonomy' => 'category',
                              //     'hide_empty' => true,
                              // ]);

                              $event_locations = get_terms(['taxonomy' => 'event_location', 'hide_empty' => false]);

                              //var_dump($terms);
                                 foreach ($event_locations as $loc) {?>

                                   <li data-filter="<?php echo $loc->slug; ?>"><?php echo $loc->name ?></li>
                           <?php } ?>
                  </ul>
               </div>
            </div>
         </div>
      </div>
      <div class="panel e-search-filter search-filter event-search">
         <div class="container">
            <div class="row">
               <div class="columns-10 offset-by-1">
                  <div class="search-wrap">
                     <div class="search-field">
                        <form action="<?php echo home_url(); ?>" method="get">
                           <label class="sr-only" for="search-form">Search</label>
                           <input class="" type="text" name="se" id="search-form" value="" placeholder="Search">
                           <button class="submit">
                              <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                  viewBox="0 0 100 100" style="enable-background:new 0 0 100 100;" xml:space="preserve">
                                 <style type="text/css">
                                    .st9{fill:#70594C;}
                                 </style>
                                 <polygon class="st9" points="71.9,50.7 71.9,50.7 65.6,44.4 65.6,44.4 34.1,12.9 28.3,18.8 59.7,50.2 28.1,81.8 34.4,88.2
                                    39.3,83.3 66,56.5 71.9,50.7 "/>
                              </svg>
                           </button>
                        </form>
                     </div>
                  </div>
                  <!-- <form action="<//?php home_url(); ?>" method="get">
                     <label class="sr-only" for="search">Search Resources</label>
                     <input type="search" name="s" id="search" placeholder="" value="" /><img src="<//?php bloginfo('template_directory'); ?>/assets/img/search.png">
                  </form> -->
               </div>
            </div>
         </div>
      </div>
      <!-- <div class="e-search-filter search-filter">
               <form action="<//?php home_url(); ?>" method="get">
                  <label class="sr-only" for="search">Search Resources</label>
                  <input type="search" name="s" id="search" placeholder="" value="" /><img src="<//?php bloginfo('template_directory'); ?>/assets/img/search.png">
               </form>
            </div> -->
   </div>
   <div class="panel events">
      <div class="container">
         <section id="emc-events">
         <!-- <div class="row event-grid"> -->
          <?php   $args = array(
            'post_type' => 'events',
            'posts_per_page' => 6,
            'meta_key' => 'event_start_date',
            'orderby' => 'meta_value',
            'order' => 'ASC',
            'paged'=>$paged
         );
         $wp_query = new WP_Query( $args );?>
         <?php if ($wp_query->have_posts()) :
         $e_cnt=0;
         ?>
         <div class="row event-grid">
         <?php while ($wp_query->have_posts()) : $wp_query->the_post();
            $e_cnt++;
            $div_class='';
            $icon = get_field('eo_icon');
            $icon_url = $icon['sizes']['medium'];
            $icon_alt = $icon['alt'];
            $event_desc = get_field('event_description');
            $event_loc = get_field('event_location');
            $event_start = get_field('event_start_date');
            //$event_sd = date('F j, Y', $event_start);
            $event_end = get_field('event_end_date');
            $event_link_text = get_field('el_text');
            $event_link = get_field('el_link');
            $external = get_field('external');
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

            if($e_cnt %2 == 0){
               //echo '</div><div class="row event-grid">';
            }
         ?>
            <div class="columns-5 card <?php echo $div_class; ?>">
               <div class="row">
                  <div class="event-columns-1">
                     <img src="<?php echo $icon_url; ?>" alt="<?php echo $icon_alt; ?>">
                  </div>
                  <div class="event-columns-4">
                     <p class="heading6 date"><?php echo $event_start; ?> <?php if ($event_end != '' && $event_start != $event_end){ echo ' &mdash; '.$event_end; } ?></p>
                     <p class="title"><?php the_title(); ?></p>
                     <p class="tags"><?php echo $event_loc; ?> | <?php echo $topic_name; ?></p>
                     <div class="excerpt"><?php echo $event_desc; ?></div>
                     <a href="<?php echo $event_link; ?>" <?php echo $target; ?>>
                        <?php echo $event_link_text; ?>
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
            </div>
         <?php
         if($e_cnt %2 != 0){
            //echo '</div>';
         }
          if($e_cnt %2 == 0){
               echo '</div><div class="row event-grid">';
            }

            endwhile;
         ?>
          </div> <!--end row-->
      <?php endif; wp_reset_postdata();?>

   </section>
   <nav class="load_more">
            <?php next_posts_link( 'Load More' ); ?>
          </nav>


         <script type="text/javascript">
              //Move this to the mesh.js file
           jQuery(document).ready(function($){

              jQuery('.load_more a').live('click', function(e){
                 e.preventDefault();
                 var link = jQuery(this).attr('href');
                 //console.log(link+);
                 $('.load_more a').text('Loading More Posts...');
                 $.get(link, function(data) {
                    var post = $("#emc-events .row.event-grid ", data);
                    //console.log(post);
                    $('#emc-events').append(post);
                 });
                 $('.load_more').load(link+' .load_more a');
                 //var url = link;

              });
           });
         </script>
      </div>
   </div>
</main><!-- End of Content -->

<?php get_footer(); ?>
