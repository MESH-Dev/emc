<?php get_header(); ?>

 <?php
   $background_img = get_field('background_image');
   $background_image_url = $background_img['sizes']['short-banner'];
   $v_ogg = get_field('video_ogg');
   $vo_url = $v_ogg['url'];
   $v_mp4 = get_field('video_mp4');
   $vm_url = $v_mp4['url'];
   $v_webm = get_field('video_webm');
   $vw_url = $v_webm['url'];
   $l_page_callout = get_field('banner_callout_text');
?>
<div class="welcome-gate interior">
   <!-- <img src="<//?php echo get_template_directory_uri(); ?>/img/everymothercounts_logo_primary_white_40in.png" alt=""> -->
   <?php if ($vm_url == '' && $vo_url == '' && $vw_url == ""){ ?>
   <div class="welcome-gate-bg" style="background-image:url('<?php echo $background_image_url; ?>');"></div>
   <?php } ?>
   <div class="banner-text columns-5 offset-by-1">
      <p class="top-callout"><?php the_title(); ?></p>
      <h1 class="page-title heading1"><?php echo $l_page_callout; ?></h1>
   </div>
   <div class="overlay" aria-hidden="true"></div>
   <?php if ($vm_url != '' && $vo_url != '' && $vw_url != ""){ ?>
      <video placeholder="<?php echo $background_image_url; ?>" autoplay="true" loop="true" muted="true">
         <source src ="<?php echo $vm_url; ?>" autoplay="true" loop="true" muted="true">
         <source src ="<?php echo $vo_url; ?>" autoplay="true" loop="true" muted="true">
         <source src ="<?php echo $vw_url; ?>" autoplay="true" loop="true" muted="true">
      <video>
   <?php } ?>
</div>
<main id="content" class="text">

	<div class="container">
		<div class="row">
			<div class="columns-10 offset-by-1">
				<?php
					$page_headline = get_field('page_headline');
					$page_callout = get_field('page_callout');
				?>
				<h2 class="headline"><?php echo $page_headline; ?></h2>
				<h3 class="callout"><?php echo $page_callout; ?></h3>
				<?php echo get_template_part('/partials/content-rows'); ?>
			</div>
		</div>
	</div>

</main><!-- End of Content -->

<?php get_footer(); ?>
