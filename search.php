<?php get_header(); ?>


<main id="content">

	<div class="container">
		<div class="row">
			<div class="columns-9">
				<?php if ( have_posts() ) : ?>
					<h1><?php printf( __( 'Search Results for: %s' ), '<span>' . get_search_query() . '</span>' ); ?></h1>

					<?php while ( have_posts() ) : the_post(); ?>

						<div class="columns-8 offset-by-1">
				            <div class="">
				               <h2 class="result-title"><?php the_title(); ?></h2>
				               <p><?php echo the_excerpt(); ?></p>
				               <a class="cta heading6" href="<?php the_permalink(); ?>">
				                  Read More
				                  <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" style="enable-background:new 0 0 100 100;" xml:space="preserve">
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

					<?php endwhile; ?>

				<?php else : ?>
					<h1>Nothing Found</h1>
					<p>Nothing matched your search criteria. Please try again with some different keywords.</p>

					<?php get_search_form(); ?>
				<?php endif; ?>
			</div>
		</div>
	</div>

</main><!-- End of Content -->

<?php get_footer(); ?>
