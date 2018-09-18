<?php get_header(); ?>

<?php //echo get_template_part('/partials/short-banner-no-video'); ?>
 <?php
   $background_img = get_field('background_image');
   $background_image_url = $background_img['sizes']['background-fullscreen'];
   $v_ogg = get_field('video_ogg');
   $vo_url = $v_ogg['url'];
   $v_mp4 = get_field('video_mp4');
   $vm_url = $v_mp4['url'];
   $v_webm = get_field('video_webm');
   $vw_url = $v_webm['url'];
   //$l_page_callout = get_field('banner_callout_text', 305);
?>
<div class="welcome-gate large full-video">
   <!-- <img src="<//?php echo get_template_directory_uri(); ?>/img/everymothercounts_logo_primary_white_40in.png" alt=""> -->
   <?php //if ($vm_url == '' && $vo_url == '' && $vw_url == ""){ ?>
   <div class="welcome-gate-bg" style="background-image:url('<?php //echo $background_image_url; ?>'); background-color:black;>"></div>
   <?php //} ?>
   <div class="banner-text columns-5 offset-by-1">
      <!-- <p class="top-callout">Watch</p> -->
      <h1 class="page-title heading1">Watch<br><strong><?php echo the_title(); ?></strong></h1>
   </div>
   <div class="player-holder" style="position:absolute; display:table; z-index:5000; height:100%; width:100%; background-color:rgba(0,0,0,.2); background-image:url('<?php echo $background_image_url; ?>'); background-repeat:no-repeat; background-size:cover;" >
			<div class="player-content" style="display: table-cell; vertical-align: middle; height: 100%; text-align: center;">
				<img class="play desktop-up" src="<?php echo get_template_directory_uri(); ?>/img/EMC_playbutton.png">
				<img class="play tablet-down" src="<?php echo get_template_directory_uri(); ?>/img/EMC_playbutton.png">
			</div>
		</div>
   <div class="video-holder" style="position:absolute;  background:red;  margin:auto; left: 52px; right: 52px; top: 52px; bottom: 52px; overflow:hidden;">
	   <?php if ($vm_url != '' && $vo_url != '' && $vw_url != ""){ ?>
	      <video class="matinee" placeholder="<?php echo $background_image_url; ?>" playsinline="" preload="true" controls style="margin-top:-2px;position:absolute; z-index: 300;  min-height:0; width:101%; height:auto;" ><!-- height: auto; max-width: 800px; max-height:600px; -->
	         <source src ="<?php echo $vm_url; ?>" type="video/mp4">
	         <source src ="<?php echo $vo_url; ?>" type="video/ogg">
	         <source src ="<?php echo $vw_url; ?>" type="video/webm">
	      </video>
	      <div class="video-controls" style="width:100%; height:50px; background:red;">
	      	<div class="video-controls__play-pause-button video-controls__play-pause-button--paused video-controls__button">
	      		<div class="video-controls__play-icon"></div>
	      		<div class="video-controls__pause-icon"></div>
	      	</div>
	      	<div class="video-controls__trackbar video-controls__trackbar--progress video-controls__trackbar--grab">
	      		<div class="video-controls__trackbar-outer">
	      			<div class="video-controls__trackbar-inner" style="width: 100%;"></div>
	      			<div class="video-controls__trackbar-highlight" style="width: 52.2571%;"></div>
	      			<div class="video-controls__trackbar-cursor" style="left: 100%;"></div>
	      		</div>
	      	</div>
	      	<div class="video-controls__mute-button video-controls__mute-button--unmuted video-controls__button">
	      		<div class="video-controls__muted-icon"></div>
	      		<div class="video-controls__unmuted-icon"></div>
	      	</div>
	      	<div class="video-controls__trackbar video-controls__trackbar--volume video-controls__trackbar--grab">
	      		<div class="video-controls__trackbar-outer">
	      			<div class="video-controls__trackbar-inner" style="width: 100%;"></div>
	      			<div class="video-controls__trackbar-highlight" style="width: 0%;"></div>
	      			<div class="video-controls__trackbar-cursor" style="left: 100%;"></div>
	      		</div>
	      	</div>
	      	<div class="video-controls__fullscreen-button video-controls__fullscreen-button--minimised video-controls__button ">
	      		<div class="video-controls__fullscreen-icon"></div>
	      	</div>
	      </div>
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
