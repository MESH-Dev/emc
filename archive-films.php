<?php get_header();

?>

<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>
<main id="content" class="film-library">
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
      <p class="top-callout">Events</p>
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
<?php endwhile; endif;  wp_reset_postdata(); ?>
   <div class="panel filters">
      <div class="container">
         <div class="row">
            <div class="columns-6 offset-by-1">
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
				<div class="columns-4 extra-links">
					<a href="">Educational PSAs</a>
					<a href="">Archives</a>
				</div>
         </div>
      </div>
   </div>
   <div class="filter-bar">
      <div class="panel topics">
         <div class="container">
            <div class="row">
               <div class="columns-11 offset-by-1">
                  <ul class="f-topic-filters">
                     <li data-filter="">All</li>
                     <?php
                              // $categories='';
                              // $separator=", ";
                              // $terms = get_terms([
                              //     'taxonomy' => 'film_topics',
                              //     'hide_empty' => true,
                              // ]);

                              $film_topics = get_terms(['taxonomy' => 'film_topic', 'hide_empty' => false]);

                              //var_dump($terms);
                                 foreach ($film_topics as $topic) {?>

                                   <li data-filter="<?php echo $topic->slug; ?>"><?php echo $topic->name ?></li>
                           <?php } ?>

                  </ul>
						<svg class="scroll" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
							 viewBox="0 0 100 100" style="enable-background:new 0 0 100 100;" xml:space="preserve">
							<style type="text/css">
								.st0{fill:#EED9BD;}
								.st1{fill:#EC742E;}
							</style>
							<polygon class="st1" points="71.9,50.7 71.9,50.7 65.6,44.4 65.6,44.4 34.1,12.9 28.3,18.8 59.7,50.2 28.1,81.8 34.4,88.2
								39.3,83.3 66,56.5 71.9,50.7 "/>
						</svg>
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
                           <input class="" type="text" name="s" value="" placeholder="Search">
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
            //'orderby' => 'meta_value',
            'order' => 'ASC',
            'paged'=>$paged
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

			<!-- <div class="row listing-row">
				<div class="listing-card columns-12">
					<div class="thumbnail columns-7" style="background-image: url('http://emc.bkfk-t5yk.accessdomain.com/wp-content/themes/mesh/img/EMC_MasterLandingPage_HeaderImage.png');">
					</div>
					<div class="item-text columns-5">
						<h4 class="item-title pf">Giving Birth in America: Montana</h4>
						<p class="item-exc first sf">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
						<a class="read-more pf" href="http://example.com">Watch the Film</a>
					</div>
				</div>
			</div>
			<div class="row listing-row">
				<div class="listing-card columns-12">
					<div class="thumbnail columns-7" style="background-image: url('http://emc.bkfk-t5yk.accessdomain.com/wp-content/themes/mesh/img/EMC_MasterLandingPage_HeaderImage.png');">
					</div>
					<div class="item-text columns-5">
						<h4 class="item-title pf">Giving Birth in America: Montana</h4>
						<p class="item-exc sf">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
						<a class="read-more pf" href="http://example.com">Watch the Film</a>
					</div>
				</div>
			</div>
			<div class="row listing-row">
				<div class="listing-card columns-12">
					<div class="thumbnail columns-7" style="background-image: url('http://emc.bkfk-t5yk.accessdomain.com/wp-content/themes/mesh/img/EMC_MasterLandingPage_HeaderImage.png');">
					</div>
					<div class="item-text columns-5">
						<h4 class="item-title pf">Giving Birth in America: Montana</h4>
						<p class="item-exc sf">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
						<a class="read-more pf" href="http://example.com">Watch the Film</a>
					</div>
				</div>-->
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
			</section>
		</div>
	</div>
</main><!-- End of Content -->

<?php get_footer(); ?>
