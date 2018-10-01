<?php get_header();
/* Template Name: Community Resource Library Template */
?>

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
<div class="welcome-gate interior">
   <!-- <img src="<//?php echo get_template_directory_uri(); ?>/img/everymothercounts_logo_primary_white_40in.png" alt=""> -->
   <?php if ($vm_url == '' && $vo_url == '' && $vw_url == ""){ ?>
   <div class="welcome-gate-bg" style="background-image:url('<?php echo $background_image_url; ?>');"></div>
   <?php } ?>
   <div class="banner-text columns-5 offset-by-1">
      <p class="top-callout"><?php the_title(); ?></p>
      <h1 class="page-title heading1"><?php echo $l_page_callout; ?></h1>
   </div>
   <?php if ($vm_url != '' && $vo_url != '' && $vw_url != ""){ ?>
      <video placeholder="<?php echo $background_image_url; ?>" autoplay="true" loop="true" muted="true">
         <source src ="<?php echo $vm_url; ?>" autoplay="true" loop="true" muted="true">
         <source src ="<?php echo $vo_url; ?>" autoplay="true" loop="true" muted="true">
         <source src ="<?php echo $vw_url; ?>" autoplay="true" loop="true" muted="true">
      <video>
   <?php } ?>
</div>

<main id="content" class="community-grid">


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
      <div class="panel cr-search-filter search-filter event-search">
         <div class="container">
            <div class="row">
               <div class="columns-10 offset-by-1">
                  <div class="search-wrap">
                     <div class="search-field">
                        <form action="<?php home_url(); ?>" method="get">
                           <label class="sr-only" for="community-search">Search</label>
                           <input class="" type="text" name="community-search" value="" placeholder="Search">
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
               </div>
            </div>
         </div>
      </div>
   </div>

   <div class="grid-wrap">
      <div class="container">
         <section id="emc-community">
            <?php   $args = array(
            'post_type' => 'community',
            'posts_per_page' => 9,
            //'meta_key' => 'event_start_date',
            //'orderby' => 'meta_value',
            'order' => 'ASC',
            'paged'=>$paged
         );
         $wp_query = new WP_Query( $args );
         $count = $wp_query->post_count;?>
         <?php if ($wp_query->have_posts()) :
         $c_cnt=0;
         ?>
         <div class="row people-row">
         <?php while ($wp_query->have_posts()) : $wp_query->the_post();
            $c_cnt++;
            $div_class='';
            $id = $post->ID;
            $the_feature = get_the_post_thumbnail_url($id, 'square');
            $location = get_field('member_location');
            $question = get_field('member_question');
            $answer = get_field('member_answer');
            // $icon = get_field('eo_icon');
            // $icon_url = $icon['sizes']['medium'];
            // $icon_alt = $icon['alt'];
            // $event_desc = get_field('event_description');
            // $event_loc = get_field('event_location');
            // $event_start = get_field('event_start_date');
            // //$event_sd = date('F j, Y', $event_start);
            // $event_end = get_field('event_end_date');
            // $event_link_text = get_field('el_text');
            // $event_link = get_field('el_link');
            // $external = get_field('external');
            // $event_tax = get_the_terms(get_the_ID(),'event_topic');
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
            $overlay = '';
            if($the_feature != ''){
            	$overlay = 'overlay';
            }
            $div_class='';
            if($c_cnt % 3 == 1){
               $div_class = 'offset-by-1';
            }

            if($c_cnt %2 == 0){
               //echo '</div><div class="row event-grid">';
            }
         ?>
            <div class="member columns-3 <?php echo $div_class; ?>">
            	<div class="content">
	               <div class="thumbnail-block">
	                  <div class="overlay">
	                     <h6 class="question"><?php echo $question; ?></h6>
	                     <p class="answer"><?php echo $answer; ?></p>
	                  </div>
	                  <div class="thumbnail" style="background-image:url('<?php echo $the_feature; ?>')"></div>
	               </div>
	               <h2 class="name"><?php the_title(); ?></h2>
	               <p class="heading6 location"><?php echo $location; ?></p>
               </div>
            </div>
             <?php
         if($c_cnt %2 != 0){
            //echo '</div>';
         }
            if($c_cnt %3 == 0 && $c_cnt != $count){
                 echo '</div><div class="row people-row">';
             }elseif($c_cnt == $count){
               echo '</div>';
             }
            endwhile;
         ?>
         </div> <!--end row-->
      <?php endif; ?>
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
              var post = $("#emc-community .row.people-row ", data);
              console.log(post);
              $('#emc-community').append(post);
           });
           $('.load_more').load(link+' .load_more a');
           //var url = link;

        });
    });
   </script>

</main>

<?php get_footer(); ?>
