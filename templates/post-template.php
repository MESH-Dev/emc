<?php get_header();

/* Template Name: Old Post Template */?>

<main id="content" style="margin-top:12em;">
	<style>
	.post img{
			width:100%;
			height:auto;
		}

	span.text svg{
		width:20px;
	}
	</style>
	<h1><?php single_post_title(); ?></h1>
	<div class="container">
		<div class="row">
			<div class="columns-10 offset-by-1">
				<nav class="filter-bar">
					Explore our news
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
					<div class="mr-search-filter search-filter">
						<form action="<?php home_url(); ?>" method="get">
							<label for="search">Search Resources</label>
							<input type="search" name="s" id="search" placeholder="" value="" /><img src="<?php bloginfo('template_directory'); ?>/assets/img/search.png">
						</form>
					</div>
				</nav>
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
		 <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
			<article class="post">
						<?php if(the_post_thumbnail() != ''){
								echo the_post_thumbnail('large');
							  }elseif(get_field('override_feature_image_text') != ''){
								$b = "'bianco-reg'";
								echo '<h2 style="text-align:center; font-size:48px; font-family: '.$b.';">'.get_field('override_feature_image_text').'</h2>';
							  }
						?>
						<div class="content" style="width:60%; margin:0 auto; text-align:center;">
							<h2><?php the_title(); ?></h2>

							<?php the_excerpt(); ?>
						</div>
			</article>
				<?php endwhile; ?>
			  </section>
			</div>
		  <?php //if ( $wp_query->max_num_pages > 1 ) { ?>
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
					  $('.load_more').html('<span class="loader">Loading More Posts...</span>');
					  $.get(link, function(data) {
						  var post = $("#posts .post ", data);
						  console.log(post);
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
