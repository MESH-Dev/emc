<?php get_header(); ?>

<?php 
	$background_img = get_field('background_image');
	$background_image_url = $background_img['sizes']['short-banner'];
	$page_callout = get_field('callout_text');
?>
<div class="welcome-gate interior" style="background-image:url('<?php echo get_template_directory_uri(); ?>/img/EMC_MasterLandingPage_HeaderImage.png');">
	<!-- <img src="<//?php echo get_template_directory_uri(); ?>/img/everymothercounts_logo_primary_white_40in.png" alt=""> -->
	<div class="welcome-gate-bg" style="background-image:url('<?php echo $background_image_url; ?> "></div>
	<div class="banner-text columns-5 offset-by-1">
		<p class="top-callout"><?php echo the_title(); ?></p>
		<h1 class="page-title heading1">Master Landing Page</h1>
	</div>
</div>
<main id="content" class="text">

	<div class="container">
		<!-- <div class="row"> -->
			<?php 
				$page_headline = get_field('page_headline');
				$page_callout = get_field('page_callout');
			?>
			<h2 class="headline"><?php echo $page_headline; ?></h2>
			<h3 class="callout"><?php echo $page_callout; ?></h3>
			<?php if (have_rows('rows')):
					while(have_rows('rows')):the_row();
					?>
					<div class="row">
						<?$cols = count(get_sub_field('columns'));
						if(have_rows('columns')):
							$col_cnt = 0;
							while(have_rows('columns')):the_row(); 
							$col_cnt++;
							$col_class = '';
							$content = get_sub_field('column');
							if($cols> 1){
								$col_class='columns-6';
							}
							?>
							<div class="col <?php echo $col_class; ?>" >
								<?php echo $content; ?>
							</div>
					
						<?php endwhile; endif; ?>
					</div>
			<?php endwhile; endif;?>
		<!-- </div> -->
	</div>

</main><!-- End of Content -->

<?php get_footer(); ?>
