<?php get_header();
/* Template Name: Community Platform Static*/
?>

<main id="content" class="community-grid">
   <div class="welcome-gate interior" style="background-image:url('http://emc.bkfk-t5yk.accessdomain.com/wp-content/themes/mesh/img/EMC_MasterLandingPage_HeaderImage.png');">
   	<!-- <img src="<//?php echo get_template_directory_uri(); ?>/img/everymothercounts_logo_primary_white_40in.png" alt=""> -->
   		<div class="welcome-gate-bg" style="background-image:url('');"></div>
   		<div class="banner-text columns-5 offset-by-1">
   		<p class="top-callout">We invest in the health of women and mothers.</p>
   		<h1 class="page-title heading1">Learn</h1>
   	</div>
   </div>

   <div class="panel filters">
      <div class="container">
         <div class="row">
            <div class="columns-6 offset-by-1">
               <ul>
                  <li class="filter">
                     <a class="filter-trigger" id="searchTrigger">
                        <p>Search Our Community</p>
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
      <div class="panel mr-search-filter search-filter event-search">
         <div class="container">
            <div class="row">
               <div class="columns-10 offset-by-1">
                  <div class="search-wrap">
                     <div class="search-field">
                        <form action="<?php home_url(); ?>" method="get">
                           <label class="sr-only" for="search">Search</label>
                           <input class="" type="text" name="sc" value="" placeholder="Search">
                           <a class="submit" href="#">
                              <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                  viewBox="0 0 100 100" style="enable-background:new 0 0 100 100;" xml:space="preserve">
                                 <style type="text/css">
                                    .st9{fill:#70594C;}
                                 </style>
                                 <polygon class="st9" points="71.9,50.7 71.9,50.7 65.6,44.4 65.6,44.4 34.1,12.9 28.3,18.8 59.7,50.2 28.1,81.8 34.4,88.2
                                    39.3,83.3 66,56.5 71.9,50.7 "/>
                              </svg>
                           </a>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

   <div class="grid-wrap">
      <div class="container">
         
            <?php   $args = array(
            'post_type' => 'community',
            'posts_per_page' => 6,
            //'meta_key' => 'event_start_date',
            //'orderby' => 'meta_value',
            'order' => 'ASC',
            'paged'=>$paged
         );
         $wp_query = new WP_Query( $args );?>
         <?php if ($wp_query->have_posts()) :
         $c_cnt=0;
         ?>
         <div class="row people-row">
         <?php while ($wp_query->have_posts()) : $wp_query->the_post();
            $c_cnt++;
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
            <div class="member columns-3 offset-by-1">
               <div class="thumbnail-block">
                  <div class="overlay">
                     <h6>Sit Tortor Sollicitudin Adipiscing Ligula</h6>
                     <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Nulla vitae elit libero, a pharetra augue. Cras mattis consectetur purus sit amet fermentum.</p>
                  </div>
                  <div class="thumbnail" style="background-image:url('<?php echo get_template_directory_uri() ?>/img/EMC_MasterLandingPage_HeaderImage.png')" style="background-image:url('<?php echo get_template_directory_uri() ?>/img/EMC_MasterLandingPage_HeaderImage.png')">

                  </div>
               </div>
               <h2>Name</h2>
               <p class="heading6">Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
            </div>
             <?php
         if($c_cnt %2 != 0){
            //echo '</div>';
         }
          if($e_cnt %2 == 0){
               echo '</div><div class="row event-grid">';
            }

            endwhile;
         ?>
           <!--  <div class="member columns-3">
               <div class="thumbnail-block">
                  <div class="overlay">
                  </div>
                  <div class="thumbnail" style="background-image:url('<?php echo get_template_directory_uri() ?>/img/EMC_MasterLandingPage_HeaderImage.png')">

                  </div>
               </div>
               <h2>Name</h2>
               <p class="heading6">Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
            </div>
            <div class="member columns-3">
               <div class="thumbnail-block">
                  <div class="overlay">
                  </div>
                  <div class="thumbnail" style="background-image:url('<?php echo get_template_directory_uri() ?>/img/EMC_MasterLandingPage_HeaderImage.png')">

                  </div>
               </div>
               <h2>Name</h2>
               <p class="heading6">Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
            </div>
         </div>
         <div class="row people-row">
            <div class="member columns-3 offset-by-1">
               <div class="thumbnail-block">
                  <div class="overlay">
                  </div>
                  <div class="thumbnail" style="background-image:url('<?php echo get_template_directory_uri() ?>/img/EMC_MasterLandingPage_HeaderImage.png')">

                  </div>
               </div>
               <h2>Name</h2>
               <p class="heading6">Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
            </div>
            <div class="member columns-3">
               <div class="thumbnail-block">
                  <div class="overlay">
                  </div>
                  <div class="thumbnail" style="background-image:url('<?php echo get_template_directory_uri() ?>/img/EMC_MasterLandingPage_HeaderImage.png')">

                  </div>
               </div>
               <h2>Name</h2>
               <p class="heading6">Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
            </div>
            <div class="member columns-3">
               <div class="thumbnail-block">
                  <div class="overlay">
                  </div>
                  <div class="thumbnail" style="background-image:url('<?php echo get_template_directory_uri() ?>/img/EMC_MasterLandingPage_HeaderImage.png')">

                  </div>
               </div>
               <h2>Name</h2>
               <p class="heading6">Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
            </div>
         </div>
         <div class="row people-row">
            <div class="member columns-3 offset-by-1">
               <div class="thumbnail-block">
                  <div class="overlay">
                  </div>
                  <div class="thumbnail" style="background-image:url('<?php echo get_template_directory_uri() ?>/img/EMC_MasterLandingPage_HeaderImage.png')">

                  </div>
               </div>
               <h2>Name</h2>
               <p class="heading6">Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
            </div>
            <div class="member columns-3">
               <div class="thumbnail-block">
                  <div class="overlay">
                  </div>
                  <div class="thumbnail" style="background-image:url('<?php echo get_template_directory_uri() ?>/img/EMC_MasterLandingPage_HeaderImage.png')">

                  </div>
               </div>
               <h2>Name</h2>
               <p class="heading6">Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
            </div>
            <div class="member columns-3">
               <div class="thumbnail-block">
                  <div class="overlay">
                  </div>
                  <div class="thumbnail" style="background-image:url('<?php echo get_template_directory_uri() ?>/img/EMC_MasterLandingPage_HeaderImage.png')">

                  </div>
               </div>
               <h2>Name</h2>
               <p class="heading6">Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
            </div>
         </div>
         <div class="row people-row">
            <div class="member columns-3 offset-by-1">
               <div class="thumbnail-block">
                  <div class="overlay">
                  </div>
                  <div class="thumbnail" style="background-image:url('<?php echo get_template_directory_uri() ?>/img/EMC_MasterLandingPage_HeaderImage.png')">

                  </div>
               </div>
               <h2>Name</h2>
               <p class="heading6">Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
            </div>
            <div class="member columns-3">
               <div class="thumbnail-block">
                  <div class="overlay">
                  </div>
                  <div class="thumbnail" style="background-image:url('<?php echo get_template_directory_uri() ?>/img/EMC_MasterLandingPage_HeaderImage.png')">

                  </div>
               </div>
               <h2>Name</h2>
               <p class="heading6">Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
            </div>
            <div class="member columns-3">
               <div class="thumbnail-block">
                  <div class="overlay">
                  </div>
                  <div class="thumbnail" style="background-image:url('<?php echo get_template_directory_uri() ?>/img/EMC_MasterLandingPage_HeaderImage.png')">

                  </div>
               </div>
               <h2>Name</h2>
               <p class="heading6">Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
            </div>
         </div>
      </div>
   </div> -->
   </section>
   <nav class="load_more">
      <a href="">Load More</a>
   </nav>

   <!-- <script type="text/javascript">
        //Move this to the mesh.js file
    jQuery(document).ready(function($){

        jQuery('.load_more a').live('click', function(e){
           e.preventDefault();
           var link = jQuery(this).attr('href');
           //console.log(link+);
           $('.load_more').html('<span class="loader">Loading More Posts...</span>');
           $.get(link, function(data) {
              var post = $("#emc-resources .row.resource-grid ", data);
              console.log(post);
              $('#emc-resources').append(post);
           });
           $('.load_more').load(link+' .load_more a');
           //var url = link;

        });
    });
   </script> -->

</main>

<?php get_footer(); ?>
