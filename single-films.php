<?php get_header(); ?>

<style>
.callout-link{
	text-align: center;
	margin-bottom:2em;
}
.callout-link a {
  font-family: "Whitney A", "Whitney B";
  font-style: normal;
  font-weight: 700;
  font-size: 1.4rem;
  color: #EB742D;
  letter-spacing: 1.75px;
  line-height: 41px;
  text-transform: uppercase;
  transition: opacity 0.5s ease-in-out;
}
/* line 1244, sass/modules/_modules.scss */
.callout-link a:hover {
  opacity: 0.5;
  text-decoration: none;
}
/* line 1248, sass/modules/_modules.scss */
.callout-link a::after {
  content: '';
  display: inline-block;
  height: 14px;
  width: 7px;
  margin-left: 10px;
  background-image: url("<?php echo get_template_directory_uri(); ?>/img/arrow-right.svg");
  background-position: center;
  background-size: cover;
  background-repeat: no-repeat;
}
</style>

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
   $v_type = get_field('video_type');
   //$l_page_callout = get_field('banner_callout_text', 305);
?>
<div class="welcome-gate large full-video" >
   <!-- <img src="<//?php echo get_template_directory_uri(); ?>/img/everymothercounts_logo_primary_white_40in.png" alt=""> -->
   <?php //if ($vm_url == '' && $vo_url == '' && $vw_url == ""){ ?>
   <div class="welcome-gate-bg" style=" background-image:url('<?php echo $background_image_url; ?>');"></div>
   <?php //} ?>
   <div class="banner-text columns-5 offset-by-1">
      <!-- <p class="top-callout">Watch</p> -->
      <h1 class="page-title heading1">Watch<br><strong><?php echo the_title(); ?></strong></h1>
   </div>
   <div class="overlay" aria-hidden="true"></div>
   <div class="player-holder">
			<div class="player-content">
				<?php //if ($v_type == 'hosted'){ ?>
				<img class="play desktop-up" src="<?php echo get_template_directory_uri(); ?>/img/EMC_Playbutton.png">
				<img class="play tablet-down" src="<?php echo get_template_directory_uri(); ?>/img/EMC_Playbutton.png">
				<?php //}else{ ?>
				<!-- <img class="vimeo_play" src="<?php echo get_template_directory_uri(); ?>/img/EMC_Playbutton.png"> -->
				<?php //} ?>
			</div>
		</div>
   <div class="video-holder">
   	<div class="video-wrapper">
   		<div class="video-close"></div>
	   	<?php 
	   		//$v_type = get_field('video_type');

	   	if ($v_type == 'hosted'){ ?>
	   	<?php if ($vm_url != '' && $vo_url != '' && $vw_url != ""){ ?>
	      <video class="matinee" placeholder="<?php echo $background_image_url; ?>" playsinline="" preload="true" controls ><!-- height: auto; max-width: 800px; max-height:600px; -->
	         <source src ="<?php echo $vm_url; ?>" type="video/mp4">
	         <source src ="<?php echo $vo_url; ?>" type="video/ogg">
	         <source src ="<?php echo $vw_url; ?>" type="video/webm">
	      </video>
	     <?php 
	 		}
	 		}else{ 
	     	$v_id = get_field('vimeo_id');

	     	?>
	     	<div style="padding:56.25% 0 0 0; max-height:100%; position:relative;">
	     		<iframe src="https://player.vimeo.com/video/<?php echo $v_id; ?>?autoplay=1&amp;color=ffffff&amp;title=0&amp;byline=0&amp;portrait=0" style="position:absolute;top:0;left:0;width:100%;height:100%;" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen>
	     			
	     		</iframe>
	     	</div>
	     	<script src="https://player.vimeo.com/api/player.js"></script>
	     	 <?php } ?>
	      <!-- <div class="video-controls" style="width:100%; height:50px; background:red;">
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
	      </div> -->
	  
		</div>
	</div>
</div>

<main id="content" class="film-single" style="position:relative; z-index:1; padding-top:9em;">
	<?php ?>
	<div class="container">
		<div class="row">
			<?php echo get_template_part('/partials/content-rows'); ?>

			<?php 
				// $callout_link_text = get_field('callout_link_text');
				// //var_dump($callout_link_text);
				// //$callout_link = get_field('callout_link');
				// $external = get_field('cc_external');
				// $target= '';
				// if($external == true){

				// }

				//if($callout_link_text != ''){

			?>
			<!-- <div class="callout-link">
				<a href="<?php echo $callout_link; ?>">
					<?php echo $callout_link_text; ?>
				</a>
			</div> -->
			<?php //} ?>

		</div>
		
	</div>
</main><!-- End of Content -->

<script>
// (function ( window, document, undefined ) {

//   /*
//    * Grab all iframes on the page or return
//    */
//   var iframes = document.getElementsByTagName( 'iframe' );

//   /*
//    * Loop through the iframes array
//    */
//   for ( var i = 0; i < iframes.length; i++ ) {

//     var iframe = iframes[i],

//     /*
//        * RegExp, extend this if you need more players
//        */
//     players = /www.youtube.com|player.vimeo.com/;

//     /*
//      * If the RegExp pattern exists within the current iframe
//      */
//     if ( iframe.src.search( players ) > 0 ) {

//       /*
//        * Calculate the video ratio based on the iframe's w/h dimensions
//        */
//       var videoRatio        = ( iframe.height / iframe.width ) * 100;
      
      
//        * Replace the iframe's dimensions and position
//        * the iframe absolute, this is the trick to emulate
//        * the video ratio
       
//       iframe.style.position = 'absolute';
//       iframe.style.top      = '0';
//       iframe.style.left     = '0';
//       iframe.width          = '100%';
//       iframe.height         = '100%';
      
//       /*
//        * Wrap the iframe in a new <div> which uses a
//        * dynamically fetched padding-top property based
//        * on the video's w/h dimensions
//        */
//       var wrap              = document.createElement( 'div' );
//       wrap.className        = 'fluid-vids';
//       wrap.style.width      = '100%';
//       wrap.style.position   = 'relative';
//       wrap.style.paddingTop = videoRatio + '%';
      
//       /*
//        * Add the iframe inside our newly created <div>
//        */
//       var iframeParent      = iframe.parentNode;
//       iframeParent.insertBefore( wrap, iframe );
//       wrap.appendChild( iframe );

//     }

//   }

// })( window, document );
</script>

<?php get_footer(); ?>
