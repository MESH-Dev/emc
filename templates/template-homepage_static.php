<?php get_header();
/* Template Name: Homepage - Static*/
?>

<main id="content">
	<div class="welcome-gate" style="background-image:url('<?php echo get_template_directory_uri(); ?>/img/mother1.png');">
		<img src="<?php echo get_template_directory_uri(); ?>/img/everymothercounts_logo_primary_white_40in.png" alt="">
	</div>
	<div class="panel callout">
		<p class="intro">Too many mothers around the world don’t have access to essential and equitable maternal healthcare,
and <span class="orange">800 women a day</span> die due to pregnancy or childbirth. - Bianco Serif 18/30</p>
		<p class="heading1">Up to <span class="orange">98%</span> of maternal deaths are preventable.</p>
	</div>
	<div class="panel map">
		<p class="heading6">Leaern About the People and Programs We Support</p>
		<img src="<?php echo get_template_directory_uri(); ?>/img/map1.png" alt="">
	</div>
	<!-- <div class="container">
		<div class="row">
			<div class="columns-9">
				<//?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

					<h1><//?php the_title(); ?></h1>

					<//?php the_content(); ?>

				<//?php endwhile; ?>
			</div>

			<div class="columns-3">


				<//?php get_sidebar(); ?>
			</div>

		</div>
	</div> -->

</main><!-- End of Content -->

<?php get_footer(); ?>
