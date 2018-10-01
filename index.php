<?php get_header(); ?>

<main class="posts-main" id="content">
	<div class="panel blog-title" style="text-align:center;">
		<div class="container">
			<div class="columns-10 offset-by-1">
				<div class="row">
					<img class="blog-logo" src="<?php echo get_template_directory_uri(); ?>/img/EMC_Illustration_OnTheFrontLines_E_blogheader.png" alt="On the Front Lines">
					<h1 class="sr-only"><?php single_post_title(); ?></h1>
				</div>
			</div>
		</div>
	</div>
	<nav class="filter-bar">
		<div class="container">
			<div class="row">
				<div class="columns-10 offset-by-1">
					<div class="filter-triggers">
						<p class="cta">Explore our news:</p>
						<a class="filter-trigger" id="topicTrigger">Filter by Topic
							<svg class="down-arrow" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" style="enable-background:new 0 0 100 100;" xml:space="preserve">
							  <style type="text/css">
								  .st0{fill:#EED9BD;}
								  .st1{fill:#EC742E;}
							  </style>
							  <polygon class="st1" points="71.9,50.7 71.9,50.7 65.6,44.4 65.6,44.4 34.1,12.9 28.3,18.8 59.7,50.2 28.1,81.8 34.4,88.2
								  39.3,83.3 66,56.5 71.9,50.7 "/>
							</svg>
						</a>
						<a class="filter-trigger" id="searchTrigger">Search
							<svg class="down-arrow" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" style="enable-background:new 0 0 100 100;" xml:space="preserve">
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
		</div>
		<div class="panel topics">
			<div class="">
				<div class="row">
					<div class="columns-12"><!-- columns-10 offset-by-1 -->
						<ul class="topic-filter">
							<li data-filter="">All</li>
								<?php
									$categories='';
									$separator=", ";
									// $terms = get_terms([
									//     'taxonomy' => 'category',
									//     'hide_empty' => true,
									// ]);

									$categories = get_terms('category');

									//var_dump($terms);
										foreach ($categories as $cat) {?>

										  <li data-filter="<?php echo $cat->slug; ?>"><?php echo $cat->name ?></li>
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
		<div class="panel mr-search-filter search-filter">
			<div class="container">
				<div class="row">
					<div class=""><!-- columns-10 offset-by-1 -->
						<div class="search-wrap">
							<div class="search-field">
								<form action="<?php home_url(); ?>" method="get">
									<label class="sr-only" for="search-form">Search</label>
									<input class="" type="text" name="sp" id="search-form" value="" placeholder="Search">
									<button class="submit">
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
	</nav>
	<div class="container">
		<div class="row">
			<div class="columns-10 offset-by-1">
				<?php

				// set the "paged" parameter (use 'page' if the query is on a static front page)
				//$paged = ( get_query_var( 'page' ) ) ? get_query_var( 'page' ) : 1;

				//Remember to use the global $paged instead of trying to use the variable above.
				$args = array(
					'post_type' => 'post',
					'posts_per_page' => 4,
					'paged'=>$paged
				);
				$wp_query = new WP_Query( $args );?>
				<?php if ($wp_query->have_posts()) : ?>
				<section class="panel" id="posts">
				  <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
					 <article class="post">
								 <?php if(has_post_thumbnail() && get_field('override_feature_image_text') == ''){
								 	echo the_post_thumbnail('background-fullscreen');
								 	}elseif(get_field('override_feature_image_text') != ''){
								 	echo '<h2 class="img-override">'.get_field('override_feature_image_text').'</h2>';
								 }
								 ?>
								 <div class="content">
									 <h2 class="listing-display-title"><?php the_title(); ?></h2>


									 <?php echo get_the_excerpt(); ?>
								 </div>
					 </article>
						 <?php endwhile; ?>
			</section>
			<div class="loading hide">
				<div class="loader">
					<svg xmlns:svg="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.0" width="64px" height="64px" viewBox="0 0 128 128" xml:space="preserve">
						<g>
							<circle cx="16" cy="64" r="16" fill="#e59b13" fill-opacity="1"/>
							<circle cx="16" cy="64" r="16" fill="#eebc62" fill-opacity="0.67" transform="rotate(45,64,64)"/>
							<circle cx="16" cy="64" r="16" fill="#f4d59c" fill-opacity="0.42" transform="rotate(90,64,64)"/>
							<circle cx="16" cy="64" r="16" fill="#faebd0" fill-opacity="0.2" transform="rotate(135,64,64)"/>
							<circle cx="16" cy="64" r="16" fill="#fcf3e3" fill-opacity="0.12" transform="rotate(180,64,64)"/>
							<circle cx="16" cy="64" r="16" fill="#fcf3e3" fill-opacity="0.12" transform="rotate(225,64,64)"/>
							<circle cx="16" cy="64" r="16" fill="#fcf3e3" fill-opacity="0.12" transform="rotate(270,64,64)"/>
							<circle cx="16" cy="64" r="16" fill="#fcf3e3" fill-opacity="0.12" transform="rotate(315,64,64)"/>
							<animateTransform attributeName="transform" type="rotate" values="0 64 64;315 64 64;270 64 64;225 64 64;180 64 64;135 64 64;90 64 64;45 64 64" calcMode="discrete" dur="720ms" repeatCount="indefinite"></animateTransform>
						</g>
					</svg>
				</div>
			</div>

		  <nav class="load_more">
			 <?php next_posts_link( 'Load More' ); ?>
			 <div class="arrow-wrap">
				 <!-- <svg class="down-arrow" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" style="enable-background:new 0 0 100 100;" xml:space="preserve">
					<style type="text/css">
						.st0{fill:#EED9BD;}
						.st1{fill:#EC742E;}
					</style>
					<polygon class="st1" points="71.9,50.7 71.9,50.7 65.6,44.4 65.6,44.4 34.1,12.9 28.3,18.8 59.7,50.2 28.1,81.8 34.4,88.2
						39.3,83.3 66,56.5 71.9,50.7 "/>
				 </svg> -->
			 </div>
		  </nav>
			</div>


		   <script type="text/javascript">
		   	  //Move this to the mesh.js file
		  	  jQuery(document).ready(function($){
		  	  	//$rows = <?php echo $wp_query->max_num_pages; ?>;
		  	  		//$cnt=0;
				  $('.load_more a').live('click', function(e){
					  e.preventDefault();
					  var link = $(this).attr('href');
					  //console.log(link+);
					  $('.load_more a').text('Loading More Posts...');
					  $.get(link, function(data) {
					  	//$cnt++;
						  var post = $("#posts .post ", data);
						  $('#posts').append(post);
					  });
					  $('.load_more').load(link+' .load_more a');
					  // if($cnt == $rows){
					  // 	$('.load_more svg').hide();
					  // }
					  //$(this).attr('href', link);
					  //var url = link;
					 //history.pushState(undefined, '', url);
				  });
			  });
		   </script>
		  <?php //}  ?>
		<?php endif; wp_reset_query(); ?>

		</div>
	</div>


</main><!-- End of Content -->

<?php get_footer(); ?>
