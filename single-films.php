<?php get_header(); ?>

<?php //echo get_template_part('/partials/short-banner-no-video'); ?>
 <?php
   $background_img = get_field('background_image');
   $background_image_url = $background_img['sizes']['short-banner'];
   $v_ogg = get_field('video_ogg');
   $vo_url = $v_ogg['url'];
   $v_mp4 = get_field('video_mp4');
   $vm_url = $v_mp4['url'];
   $v_webm = get_field('video_webm');
   $vw_url = $v_webm['url'];
   //$l_page_callout = get_field('banner_callout_text', 305);
?>
<div class="welcome-gate full-video">
   <!-- <img src="<//?php echo get_template_directory_uri(); ?>/img/everymothercounts_logo_primary_white_40in.png" alt=""> -->
   <?php //if ($vm_url == '' && $vo_url == '' && $vw_url == ""){ ?>
   <div class="welcome-gate-bg" style="background-image:url('<?php //echo $background_image_url; ?>'); background-color:black;>"></div>
   <?php //} ?>
   <div class="banner-text columns-5 offset-by-1">
      <p class="top-callout">Watch</p>
      <h1 class="page-title heading1"><?php echo the_title(); ?></h1>
   </div>
   <div class="player-holder" style="position:absolute; display:table; z-index:5000; height:100%; width:100%; background-color:rgba(0,0,0,.2); background-image:url('<?php echo $background_image_url; ?>'); background-repeat:no-repeat; background-size:cover; " >
			<div class="player-content" style="display: table-cell; vertical-align: middle; height: 100%; text-align: center;">
				<img class="play desktop-up" src="<?php echo get_template_directory_uri(); ?>/img/EMC_playbutton.png">
				<img class="play tablet-down" src="<?php echo get_template_directory_uri(); ?>/img/EMC_playbutton.png">
			</div>
		</div>
   <div class="video-holder" style="position:absolute; top:0px; bottom:50px; right:50px; left:50px; background:red;">
	   <?php if ($vm_url != '' && $vo_url != '' && $vw_url != ""){ ?>
	      <video class="matinee" placeholder="<?php echo $background_image_url; ?>" controls style="position:absolute; z-index: 300; height: auto; max-width: 800px; max-height:600px; min-height:0;">
	         <source src ="<?php echo $vm_url; ?>" >
	         <source src ="<?php echo $vo_url; ?>" >
	         <source src ="<?php echo $vw_url; ?>" >
	      </video>
	   <?php } ?>
		
	</div>
</div>
<main id="content" class="film-single" style="position:relative; z-index:9999; margin-top:9em;">
	<?php ?>
	<div class="container">
		<div class="row">
			<?php echo get_template_part('/partials/content-rows'); ?>
		</div>
		
	</div>
</main><!-- End of Content -->

<?php get_footer(); ?>
