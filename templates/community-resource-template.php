<?php get_header(); 

/* Template Name: Community Resource Library Template */?>

<main id="content" class="community" style="margin-top:12em;">
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
		<p class="top-callout"><?php echo the_title(); ?></p>
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
	<div class="panel filters">
      <div class="container">
         <div class="row">
            <div class="columns-10 offset-by-1">
              <ul><li>
                     <a class="filter-trigger" id="searchTrigger">
                        <p>Search our commmunity</p>
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
                 </li></ul>
            </div>
         </div>
      </div>
   </div>
   <div class="filter-bar">
      <div class="panel c-search-filter search-filter">
         <div class="container">
            <div class="row">
               <div class="columns-10 offset-by-1">
                  <div class="search-wrap">
                     <div class="search-field">
                        <form action="<?php home_url(); ?>" method="get">
                           <label class="sr-only" for="search-form">Search</label>
                           <input class="" type="text" name="cs" id="search-form" value="" placeholder="Search">
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
	<div class=""><!-- container -->
		<div class="row">
			<nav class="filter-bar">
				<div class="cr-search-filter search-filter">
					<form action="<?php home_url(); ?>" method="get">
						<label for="search">Search Members</label>
						<input type="search" name="s" id="search" placeholder="" value="" /><img src="<?php bloginfo('template_directory'); ?>/assets/img/search.png">
					</form>
				</div>
			</nav>
		</div>
		<div class="container">
			<style>
			.post img{
					width:100%;
					height:auto;
				}

			span.text svg{
				width:20px;
			}
			</style>
			<?php 

			// set the "paged" parameter (use 'page' if the query is on a static front page)
			//$paged = ( get_query_var( 'page' ) ) ? get_query_var( 'page' ) : 1;	

			//Remember to use the global $paged instead of trying to use the variable above.
			$args = array(
				'post_type' => 'community',
				'posts_per_page' => 9,
				'paged'=>$paged
			);
			$wp_query = new WP_Query( $args );?>
			<?php if ($wp_query->have_posts()) : ?>
	 		<section id="posts">
	 			<div class="row">
		    <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
		      <article class="grid-item columns-4 has-background" style="height:0; padding-bottom:33.3333%;">
					<img class="portrait" src='<?php echo the_post_thumbnail_url('large'); ?> ' style="max-width:100%;" />		
								  
							
					<div class="content" style=" margin:0 auto; text-align:center; ">
						
						<h2><?php the_title(); ?></h2>
						<h3>City, Country</h3>

						<?php //the_excerpt(); ?>
					</div>
		      </article>
    		<?php endwhile; ?>
    				</div>
		  	</section>
		  <?php if ( $wp_query->max_num_pages > 1 ) { ?>
		    <nav class="load_more">
		      <?php next_posts_link( 'Load More' ); ?>
		    </nav>
	
			<?php } ?>
		   <script type="text/javascript">
		   	  //Move this to the mesh.js file
		  	  jQuery(document).ready(function($){

				  jQuery('.load_more a').live('click', function(e){
					  e.preventDefault();
					  var link = jQuery(this).attr('href');
					  //console.log(link+);
					  $('.load_more a').html('Loading More Posts...');
					  $.get(link, function(data) {
						  var post = $("#posts .post ", data);
						  //console.log(post);
						  $('#posts').append(post);
					  });
					  $('.load_more').load(link+' .load_more a');
					  var url = link;
					 
				  });
			  });
		   </script>
		  <?php //}  ?>
		<?php endif; wp_reset_query(); ?>
		
		</div>
	</div>


</main><!-- End of Content -->

<?php get_footer(); ?>
