<?php get_header(); ?>

<?php echo get_template_part('/partials/short-banner-no-video'); ?>

<main id="content" class="blog-single" style="margin-top:9em;">
	<div class="container">
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		
		<div class="post">
			<style>
				.post img{
					width:100%;
					height:auto;
				}
			</style>
			<h1><?php //the_title(); ?></h1>
			
			<?php the_content(); ?>
			<h5 class="postinfo">By: <?php the_author(); ?></h5>
			<?php 
				$categories='';
				$separator=", ";
				foreach (get_the_terms(get_the_ID(), 'category') as $cat) {
				   $categories .= $cat->name . $separator;
				}

			?>
			<h5 class="topcs">Topics: <?php echo rtrim($categories, $separator); ?></h5>

		</div>
		<?php previous_post_link('%link', '< Previous Story'); ?>    <?php next_post_link('%link', 'Next Story >'); ?>

<?php //endif; ?>
	<?php endwhile; ?>
	
	</div>
</main><!-- End of Content -->

<?php get_footer(); ?>