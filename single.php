<?php get_header(); ?>

<?php echo get_template_part('/partials/short-banner-no-video'); ?>

<main id="content" class="blog-single" style="margin-top:9em;">
	<div class="container">
		<div class="row">
			<div class="columns-10 offset-by-1">
				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

					<div class="post">
						<h1><?php //the_title(); ?></h1>

						<?php the_content(); ?>

					</div>
			</div>
		</div>
		<div class="row">
			<div class="columns-2 offset-by-1">
				<h5 class="postinfo">By: <span class="orange"><?php the_author(); ?></span></h5>
				<?php
					$categories='';
					$separator=", ";
					foreach (get_the_terms(get_the_ID(), 'category') as $cat) {
						$categories .= $cat->name . $separator;
					}

				?>
				<h5 class="topcis">Topics: <span class="orange"><?php echo rtrim($categories, $separator); ?></span></h5>
			</div>
			<div class="columns-3 offset-by-5">
				<?php previous_post_link('%link', '< Previous Story'); ?>    <?php next_post_link('%link', 'Next Story >'); ?>
			</div>
		</div>
		<?php //endif; ?>
			<?php endwhile; ?>
	</div>
</main><!-- End of Content -->

<?php get_footer(); ?>
