<?php get_header();
/* Template Name: Film Library Template*/
?>

<?php //if ( have_posts() ) : ?>
	<?php //while ( have_posts() ) : the_post(); ?>
<main id="content" class="landing">
   <?php
   $background_img = get_field('background_image', 305);
   $background_image_url = $background_img['sizes']['short-banner'];
   $v_ogg = get_field('video_ogg', 305);
   $vo_url = $v_ogg['url'];
   $v_mp4 = get_field('video_mp4', 305);
   $vm_url = $v_mp4['url'];
   $v_webm = get_field('video_webm', 305);
   $vw_url = $v_webm['url'];
   $l_page_callout = get_field('banner_callout_text', 305);
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
<?php //endwhile; endif;  wp_reset_postdata(); ?>
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
				<div class="columns-3 offset-by-1 extra-links">
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
               <div class="columns-10 offset-by-1">
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
      <div class="panel mr-search-filter search-filter event-search">
         <div class="container">
            <div class="row">
               <div class="columns-10 offset-by-1">
                  <div class="search-wrap">
                     <div class="search-field">
                        <form action="<?php home_url(); ?>" method="get">
                           <label class="sr-only" for="search">Search</label>
                           <input class="" type="text" name="search" value="" placeholder="Search">
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
	<div class="panel films-list">
		<div class="container">
			<div class="row listing-row">
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
				</div>
			</div>
		</div>
	</div>
</main><!-- End of Content -->

<?php get_footer(); ?>
