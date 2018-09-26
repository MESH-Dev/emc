<?php get_header();
?>

<?php 
  $separator = ', ';
  $f_topics = get_terms(['taxonomy' => 'film_topic', 'hide_empty' => false]);//'exclude'=>array('archive, educational-psa')
  
  $f_topic = '';                       
  foreach ($f_topics as $t) {
    $f_topic .= '"'.$t->name.'"'.$separator;
  }

  //Get page titles from all of our posts
 
  

  $args2 = array(
  'post_type' => 'films',
  'posts_per_page' => -1,
  //'meta_key' => 'event_start_date',
  // 'orderby' => 'post_date',
  // 'order' => 'DESC',
  'paged'=>$paged
  );

  $page_titles = wp_list_pluck( get_pages($args2), 'post_title' );

  $titles='';
  foreach($page_titles as $title){
    $titles .= '"'.addslashes($title).'"'.$separator;
  }

  $f_excerpt = '';

  $query = new WP_Query( $args2 );

  if ($query->have_posts()) :
    while ($query->have_posts()) : $query->the_post();

      $content = the_content();
      //$excerpt = get_field('custom_excerpt');
      $excerpt = get_post_meta(get_the_ID(), 'custom_excerpt');
      //var_dump($excerpt);

      foreach($excerpt as $e){
        //$e_desc.='"'.addslashes($desc).'"'.$separator;
        $f_excerpt .= $e.' ';

        //$e_desc = implode($e_desc);
      }

  endwhile; endif; wp_reset_postdata();
  //Split up and clean the paragraph content 
  $remove = array('.', '!', ',', '?', '\n', '\r', "\r\n", 'and', 'the', 'in', 'on', 'a', 'but');
  $f_excerpt = str_replace($remove,'', $f_excerpt);
  //var_dump($f_excerpt);
  $f_excerpt = explode(' ', addslashes($f_excerpt));
  $f_excerpt = array_unique($f_excerpt);

  //Loop through our content and add it to an array
  $exc = '';
  foreach($f_excerpt as $e){
    if($e != ''){
      $exc .='"'.$e.'"'.$separator;
    }
  }
?>

<script>
var fc_choices = [];
fc_choices.push(<?php echo $f_topic.$titles.$exc; ?>);

</script>

<?php //if ( have_posts() ) : ?>
  <?php //while ( have_posts() ) : the_post(); ?>
  <?php
   $background_img = get_field('f_background_image', 'options');
   //var_dump($background_img);
   $background_image_url = $background_img['sizes']['short-banner'];
   $background = $background_img['url'];
   $v_ogg = get_field('f_video_ogg', 'options');
   $vo_url = $v_ogg['url'];
   $v_mp4 = get_field('f_video_mp4', 'options');
   $vm_url = $v_mp4['url'];
   $v_webm = get_field('f_video_webm', 'options');
   $vw_url = $v_webm['url'];
   $l_page_callout = get_field('f_banner_callout_text', 'options');
   $title = get_field('f_page_title', 'options');
   $archive_title = post_type_archive_title('',false);
   $page_title = '';
   if($title != '' ){
    $page_title = $title;
   }else{
    $page_title = $archive_title;
   }
?>
<div class="welcome-gate interior" style="background-image:url('<?php echo $background_image_url; ?>">
   <!-- <img src="<//?php echo get_template_directory_uri(); ?>/img/everymothercounts_logo_primary_white_40in.png" alt=""> -->
   <?php if ($vm_url == '' && $vo_url == '' && $vw_url == ""){ ?>
   <!-- <div class="welcome-gate-bg" style="background-image:url('<?php echo $background_image_url; ?>');"></div> -->
   <?php } ?>
   <div class="banner-text columns-5 offset-by-1">

      <p class="top-callout"><?php echo $page_title; ?></p>
      <h1 class="page-title heading1"><?php echo $l_page_callout; ?></h1>
   </div>
   <?php if ($vm_url != '' && $vo_url != '' && $vw_url != ""){ ?>
      <video placeholder="<?php echo $background_image_url; ?>" autoplay="true" loop="true" muted="true">
         <source src ="<?php echo $vm_url; ?>" autoplay="true" loop="true" muted="true">
         <source src ="<?php echo $vo_url; ?>" autoplay="true" loop="true" muted="true">
         <source src ="<?php echo $vw_url; ?>" autoplay="true" loop="true" muted="true">
      </video>
   <?php } ?>
</div>
<main id="content" class="film-library">
   
<?php //endwhile; endif;  wp_reset_postdata(); ?>
   <div class="panel filters">
      <div class="container">
         <div class="row">
            <div class="columns-6 offset-by-1">
               <ul>
                  <li>
                     <p>Explore our films:</p>
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
        <div class="columns-3 offset-by-1 extra-links">
          <ul>
            <li data-filter="educational-psa"><span>Educational PSAs</span></li>
            <li data-filter="archive"><span>Archives</span></li>
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
                  <ul class="f-topic-filters">
                     <li data-filter="">All</li>
                     <?php
                              // $categories='';
                              // $separator=", ";
                              // $terms = get_terms([
                              //     'taxonomy' => 'film_topics',
                              //     'hide_empty' => true,
                              // ]);

                              $film_topics = get_terms(['taxonomy' => 'film_topic', 'hide_empty' => false]);//'exclude'=>array('archive, educational-psa')
                              //var_dump($film_topics);
                              //var_dump($terms);
                                 foreach ($film_topics as $topic) {
                                    //var_dump($topic->slug);
                                    if($topic->slug != 'archive' && $topic->slug != 'educational-psa'){
                                    ?>
                                 
                                   <li data-filter="<?php echo $topic->slug; ?>"><?php echo $topic->name ?></li>
                           <?php }} ?>

                  </ul>
               </div>
            </div>
         </div>
      </div>
      <div class="panel f-search-filter search-filter event-search">
         <div class="container">
            <div class="row">
               <div class="columns-10 offset-by-1">
                  <div class="search-wrap">
                     <div class="search-field">
                        <form action="<?php home_url(); ?>" method="get">
                           <label class="sr-only" for="search">Search</label>
                           <input class="" type="text" name="sf" id="search-form" value="" placeholder="Search">
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
  <div class="panel films-list">
    <div class="container">
       <section id="emc-films">
         <?php 
            $args = array(
            'post_type' => 'films',
            'posts_per_page' => 5,
            //'meta_key' => 'event_start_date',
            'orderby' => 'post_date',
            'order' => 'DESC',
            'paged'=>$paged,
            'tax_query' => array(
            array(
              'taxonomy' => 'film_topic',
              'field'    => 'slug',
              'terms'    => array('educational-psa', 'archive'), 
              'operator' => 'NOT IN',
              ),
            ),
         );
         $wp_query = new WP_Query( $args );?>

         <?php if ($wp_query->have_posts()) :
         //$e_cnt=0;
          while ($wp_query->have_posts()) : $wp_query->the_post();
          $img = get_the_post_thumbnail_url($id, 'large');
          //var_dump($img);
          $id = $post->ID;
          //var_dump($id);
          $custom_excerpt = get_field('custom_excerpt');
          $film_type = get_the_terms($id, 'film_type');
          $type = $film_type[0]->name;
          $film_type ='';
          $excerpt_style = get_field('excerpt_style');
          $ex_class = '';
          if ($excerpt_style == 'bold'){
            $ex_class = 'first';
          }

          // foreach($film_type as $type){
          //   $film_type = $type;
          // }
         ?>

         <div class="row listing-row">
            <div class="listing-card columns-12">
               <div class="thumbnail columns-7" style="background-image: url('<?php echo $img; ?>');">
               </div>
               <div class="item-text columns-5">
                  <h4 class="item-title pf"><?php echo the_title(); ?></h4>
                  <p class="item-exc <?php echo $ex_class; ?> sf"><?php echo $custom_excerpt; ?></p>
                  <a class="read-more pf" href="<?php echo the_permalink(); ?>">Watch the <?php echo $type; ?></a>
               </div>
            </div>
         </div>
      <?php endwhile; endif;  wp_reset_postdata(); ?>
            
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
                    var post = $("#emc-films .row.listing-row ", data);
                    //console.log(post);
                    $('#emc-films').append(post);
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
