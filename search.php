<?php get_header(); ?>


<main id="content" class="search-results">
	<div class="container field-container">
      <div class="row">
         <div class="columns-10 offset-by-1">
            <svg class="search-icon" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                viewBox="0 0 100 100" style="enable-background:new 0 0 100 100;" xml:space="preserve">
               <style type="text/css">
                  .st0{fill:#EED9BD;}
                  .st1{fill:#EC742E;}
                  .st2{fill:none;}
                  .st3{fill:#B46C4E;}
               </style>
               <path class="st3" d="M82.8,76.9L82.8,76.9L64.1,58.2C68.4,53,71,46.4,71,39.1C71,22.6,57.6,9.2,41.1,9.2S11.2,22.6,11.2,39.1
                  S24.6,69,41.1,69c6.2,0,12.1-1.9,16.9-5.2l19,19l0,0l6.3,6.3l5.9-5.9l0,0L82.8,76.9z M18.3,39.1c0-12.5,10.2-22.7,22.7-22.7
                  s22.7,10.2,22.7,22.7S53.6,61.8,41.1,61.8S18.3,51.6,18.3,39.1z"/>
            </svg>
            <div class="form">
               <input class="heading2" type="text" name="search" value="" placeholder="Search">
               <button class="submit">
                  <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                      viewBox="0 0 100 100" style="enable-background:new 0 0 100 100;" xml:space="preserve">
                     <polygon style="fill:#EB742D;" class="st9" points="71.9,50.7 71.9,50.7 65.6,44.4 65.6,44.4 34.1,12.9 28.3,18.8 59.7,50.2 28.1,81.8 34.4,88.2
                        39.3,83.3 66,56.5 71.9,50.7 "/>
                  </svg>
               </button>
            </div>
         </div>
      </div>
   </div>
	<div class="container results-list">
		<div class="row result">
			<!-- <div class="columns-8 offset-by-1"> -->
				
				<?php if ( have_posts() ) : ?>
				<!-- <div class="columns-8 offset-by-1">
					<h1><?php printf( __( 'Search Results for: %s' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
				</div> -->
					<?php while ( have_posts() ) : the_post(); ?>
					<?php 
						$page_headline = get_field('page_headline', $post->ID);
						$page_callout = get_field('page_callout', $post->ID);

					?>

						<div class="columns-8 offset-by-1">
				            <div class="post">
				               <h2 class="result-title"><?php the_title(); ?></h2>
				               <?php if(get_the_content() != ''){?>
				              		<p><?php echo the_excerpt(); ?></p>
			              		<?php } ?>
				               <?php if($page_headline != ''){ ?>
									<p class="headline"><?php echo $page_headline; ?></p>
				               	<?php } ?>
				              <!--  <a class="cta heading6" href="<?php the_permalink(); ?>">
				                  Read More on this page
				                  <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" style="enable-background:new 0 0 100 100;" xml:space="preserve">
			                     <style type="text/css">
			                        .st0{fill:#EED9BD;}
			                        .st1{fill:#EC742E;}
			                     </style>
			                     <polygon class="st1" points="71.9,50.7 71.9,50.7 65.6,44.4 65.6,44.4 34.1,12.9 28.3,18.8 59.7,50.2 28.1,81.8 34.4,88.2
			                        39.3,83.3 66,56.5 71.9,50.7 "/>
			                  </svg>
				               </a> -->
				            </div>
				         </div>

					<?php endwhile; ?>

				<?php else : ?>
					<h1>Nothing Found</h1>
					<p>Nothing matched your search criteria. Please try again with some different keywords.</p>

					<?php get_search_form(); ?>
				<?php endif; ?>
			<!-- </div> -->
		</div>
	</div>

</main><!-- End of Content -->

<?php get_footer(); ?>
