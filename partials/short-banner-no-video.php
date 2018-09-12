<?php
	$background_img = get_field('banner_image');
	$background_image_url = $background_img['sizes']['short-banner'];
	$banner_callout = get_field('banner_callout_text');
?>
<div class="welcome-gate interior" style="background-image:url('<?php echo $background_image_url; ?>')">
	<!-- <img src="<//?php echo get_template_directory_uri(); ?>/img/everymothercounts_logo_primary_white_40in.png" alt=""> -->
	<!-- <div class="welcome-gate-bg" style="background-image:url('<?php echo $background_image_url; ?> "></div> -->
	<div class="banner-text columns-5 offset-by-1">
		<p class="top-callout"><?php echo the_title(); ?></p>
		<h1 class="page-title heading1"><?php echo $banner_callout; ?></h1>
	</div>
</div>
