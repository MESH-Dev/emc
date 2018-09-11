<?php get_header(); ?>

<?php echo get_template_part('/partials/short-banner-no-video'); ?>
<main id="content" class="text">

	<div class="container">
		<!-- <div class="row"> -->
			<?php 
				$page_headline = get_field('page_headline');
				$page_callout = get_field('page_callout');
			?>
			<h2 class="headline"><?php echo $page_headline; ?></h2>
			<h3 class="callout"><?php echo $page_callout; ?></h3>
			<?php echo get_template_part('/partials/content-rows'); ?>
		<!-- </div> -->
	</div>

</main><!-- End of Content -->

<?php get_footer(); ?>
