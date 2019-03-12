<?php get_header();
/* Template Name: Holiday Campaign Page Template */
?>
<!-- Full version of banner with playable video -->
<?php
	$player_type = get_field('h_prim_player_type');
   $background_img = get_field('h_pl_background_image');
   $background_image_url = $background_img['sizes']['background-fullscreen'];
   $v_ogg = get_field('h_pl_video_ogg');
   $vo_url = $v_ogg['url'];
   $v_mp4 = get_field('h_pl_video_mp4');
   $vm_url = $v_mp4['url'];
   $v_webm = get_field('h_pl_video_webm');
   $vw_url = $v_webm['url'];
   $v_type = get_field('h_pl_video_type');
   $l_page_callout = get_field('h_pl_banner_callout_text');
   $ex_link = get_field('h_pl_video_link');
   //$l_page_callout = get_field('banner_callout_text', 305);
   if($player_type == 'playable'){
?>

<div class="welcome-gate large campaign full-video" >
   <!-- <img src="<//?php echo get_template_directory_uri(); ?>/img/everymothercounts_logo_primary_white_40in.png" alt=""> -->
   <?php //if ($vm_url == '' && $vo_url == '' && $vw_url == ""){ ?>
   <div class="welcome-gate-bg" style=" background-image:url('<?php echo $background_image_url; ?>');"></div>
   <?php //} ?>
   <div class="banner-text columns-5 offset-by-1">
     	<p class="top-callout"><?php echo the_title(); ?></p>
		<h1 class="page-title heading1"><?php echo $l_page_callout; ?></h1>
   </div>
   <div class="overlay" aria-hidden="true"></div>
   <? if ($v_type != ''){ ?>
   <div class="player-holder">
			<div class="player-content">
				<?php if ($v_type == 'hosted' || $v_type == 'vimeo'){ ?>
				<img class="play desktop-up <?php if ($v_type == 'vimeo'){echo 'vimeo-button'; }?>" src="<?php echo get_template_directory_uri(); ?>/img/EMC_Playbutton.png">
				<img class="play tablet-down <?php if ($v_type == 'vimeo'){echo 'vimeo-button'; }?>" src="<?php echo get_template_directory_uri(); ?>/img/EMC_Playbutton.png">
				<?php }elseif ($v_type == 'external'){ ?>
				<a href="<?php echo $ex_link; ?>" target="_blank"><img class="" src="<?php echo get_template_directory_uri(); ?>/img/EMC_Playbutton.png"></a>
				<?php } ?>
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
	     	$v_id = get_field('h_pl_vimeo_id');

	     	?>
	     	<div style="padding:56.25% 0 0 0; max-height:100%; position:relative;" data-vimeo-id="<?php echo $v_id; ?>" data-vimeo-defer id="vimeo-vid">
	     		<!-- <iframe src="https://player.vimeo.com/video/<?php echo $v_id; ?>?autoplay=1&amp;color=ffffff&amp;title=0&amp;byline=0&amp;portrait=0" style="position:absolute;top:0;left:0;width:100%;height:100%;" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen>
	     			
	     		</iframe> -->
	     	</div>
	     	<script src="https://player.vimeo.com/api/player.js"></script>
	     	<script>
	     	var options = {
	     		loop: true,
	     		autoplay: true,
	     		color: 'ffffff',
	     		title: false,
	     		byline: false,
	     		//height: '100%',
	     		//width:'100%'

	     	};
	     	var $_vimeo = new Vimeo.Player('vimeo-vid', options);

	     	jQuery('.vimeo-button').click(function(){
	     		
	     		setTimeout(function(){$_vimeo.play();},100);
	     	});
	     	</script>
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
	<? } ?>
</div>
<!-- End full video player version -->
<?php } else { ?>
<!-- Start Autoplay only version of player -->
<?php 
		$background_img = get_field('h_ap_img_fallback');
		$background_image_url = $background_img['sizes']['background-fullscreen'];
		$v_ogg = get_field('h_ap_video_ogg');
		$vo_url = $v_ogg['url'];
		$v_mp4 = get_field('h_ap_video_mp4');
		$vm_url = $v_mp4['url'];
		$v_webm = get_field('h_ap_video_webm');
		$vw_url = $v_webm['url'];
?>
<div class="welcome-gate large">
		<?php if ($vm_url == '' && $vo_url == '' && $vw_url == ""){ ?>
		<div class="welcome-gate-bg" style="background-image:url('<?php echo $background_image_url; ?> "></div>
		<?php } ?>
		<div class="pane">
			<img src="<?php echo get_template_directory_uri(); ?>/img/everymothercounts_logo_primary_white_40in.png" alt="Every Mother Counts logo">
			<div class="overlay" aria-hidden="true"></div>
		</div>

		<?php if ($vm_url != '' && $vo_url != '' && $vw_url != ""){ ?>
			<video placeholder="<?php echo $background_image_url; ?>" autoplay="true" loop="true" muted="true" playsinline>
				<source src ="<?php echo $vm_url; ?>" autoplay="true" loop="true" muted="true" playsinline>
				<source src ="<?php echo $vo_url; ?>" autoplay="true" loop="true" muted="true" playsinline>
				<source src ="<?php echo $vw_url; ?>" autoplay="true" loop="true" muted="true" playsinline>
			</video>
		<?php } ?>
	</div>

<!-- end Autoplay Only version of player --> 
<?php } ?>
<?php
	// $background_img = get_field('background_image');
	// $background_image_url = $background_img['sizes']['short-banner'];
	// $v_ogg = get_field('video_ogg');
	// $vo_url = $v_ogg['url'];
	// $v_mp4 = get_field('video_mp4');
	// $vm_url = $v_mp4['url'];
	// $v_webm = get_field('video_webm');
	// $vw_url = $v_webm['url'];
	$l_page_callout = get_field('banner_callout_text');
	$campaign = get_field('campaign_description');
?>
<main id="content" class="landing holiday-campaign">
<?php
	if(have_rows('h_campaign_panel')):
		while(have_rows('h_campaign_panel')):the_row();
			$panel_type=get_sub_field('h_panel_type');
			$callout_layout = get_sub_field('h_2up_block_layout');
			$callout_intro = get_sub_field('callout_intro_text');
			$callout_paragraph = get_sub_field('callout_paragraph');
			
	 //if ($panel_type == 'callout'){
	 	//if($callout_layout == 'stacked') {?>
<!-- <div class="panel callout interior">
	<div class="intro"><?php echo $callout_intro ?></div>
	<div class="heading6"><?php echo $callout_paragraph; ?></div>
</div> -->
<?php //}else{ ?>
<!-- <div class="panel offset-text">
	<div class="container">
		<div class="row">
			<div class="columns-6 offset-by-1 main-col">
				<div class="heading2"><?php echo $callout_intro ?></div>
			</div>
			<div class="columns-4 desc-col">
				<div class="paragraph"><?php echo $callout_paragraph; ?></div>
			</div>
		</div>
	</div>
</div> -->
<?php //}
	//}
	if($panel_type == '2-column') {
		//echo 'partners';
		//$pb_layout = get_sub_field('partner_block_layout');
		//$partner_text = get_sub_field('partner_text');
		$twocol_layout = get_sub_field('h_2up_block_layout');
		$twocol_img = get_sub_field('h_2up_image');
		$twocol_bg_color = get_sub_field('h_2up_background_color');
		$twocol_description = get_sub_field('h_2up_text');
		$twocol_hoverdesc = get_sub_field('h_2up_hover_description');
		$twocol_cta_text = get_sub_field('h_2up_call_to_action_text');
		$twocol_cta_link = get_sub_field('h_2up_call_to_action_link');
		$twocol_img_url = $twocol_img['sizes']['large'];
		$twocol_img_alt = $twocol_img['alt'];
		$two_col_google_data = get_sub_field('h_2up_google_click_description');
		//echo $pb_layout;
		if( $twocol_layout == 'image-second') {
			//$partner_text = get_sub_field('partner_text');
			?>
		<!-- <div class="panel img-and-wysiwyg image-right <?php echo $pb_layout; ?>">
			<div class="container">
				<div class="row">
					<div class="columns-5 offset-by-1 textsection left-col" style="background-color:#FDDAC3;">
						<p><?php echo $twocol_description ?></p>
						<div class="hover">
							<p><?php echo $twocol_hoverdesc; ?></p>
							<p>
								<a href="<?php echo $twocol_cta_link; ?>" data-qa="<?php echo $campaign ?> - <?php echo $google_data; ?>" target="_blank"><?php echo $twocol_cta_text; ?> </a>
						</div>
					</div>
					<div class="columns-4 offset-by-1 right-col">
						<img src="<?php echo $twocol_img_url; ?>" alt="<?php echo $twocol_img_alt; ?>">
					</div>
				</div>
			</div>
		</div> -->
		<div class="row hc listing-row panel">
            <div class="listing-card last">
               <div class="item-text columns-6" style="background-color:#F9B29A;">
					<div class="active">
						<div class="wrapper">
							<div class="content">
								<h3 class="description"><?php echo $twocol_description ?></h3>
							</div>
						</div>
					</div>
						<div class="hover">
							<div class="wrapper">
								<div class="content">
									<h2 class="title"><?php echo $twocol_hoverdesc; ?></h2>
									<h3 class="subtitle">
										<a href="<?php echo $twocol_cta_link; ?>" data-qa="<?php echo $campaign ?> - <?php echo $google_data; ?>" target="_blank"><?php echo $twocol_cta_text; ?> </a>
									</h3>
								</div>
							</div>
						</div>
               		</div>
               <div class="thumbnail columns-6 has-background" style="background-image: url('<?php echo $twocol_img_url; ?>');">
               </div>
            </div>
         </div>
		<?php }else{ ?>
		<!-- <div class="panel img-and-wysiwyg image-left">
			<div class="container">
				<div class="row">
					<div class="columns-4 offset-by-1 left-col">
						<img src="<?php echo $twocol_img_url; ?>" alt="<?php echo $twocol_img_alt; ?>">
					</div>
					<div class="columns-5 offset-by-1 textsection right-col" style="background-color:#FDDAC3;">
						<p><?php echo $twocol_description ?></p>
						<div class="hover">
							<p><?php echo $twocol_hoverdesc; ?></p>
							<p>
								<a href="<?php echo $twocol_cta_link; ?>" data-qa="<?php echo $campaign ?> - <?php echo $google_data; ?>" target="_blank"><?php echo $twocol_cta_text; ?> </a>
						</div>
					</div>
				</div>
			</div>
		</div> -->
		<div class="row hc listing-row panel" style="">
			<div class="listing-card first">
				<div class="thumbnail columns-6 has-background" style="height:520px; background-image: url('<?php echo $twocol_img_url; ?>');">
	           </div>
				<div class="hc item-text columns-6" style="background-color:#F9B29A;">
					<div class="active">
						<div class="wrapper">
							<div class="content">
								<h3 class="description"><?php echo $twocol_description ?></h3>
							</div>
						</div>
					</div>
						<div class="hover">
							<div class="wrapper">
								<div class="content">
									<h2 class="title"><?php echo $twocol_hoverdesc; ?></h2>
									<h3 class="subtitle">
										<a href="<?php echo $twocol_cta_link; ?>" data-qa="<?php echo $campaign ?> - <?php echo $google_data; ?>" target="_blank"><?php echo $twocol_cta_text; ?> </a>
									</h3>
								</div>
							</div>
						</div>
					</div>
	            </div>
	           
	          
            </div>
         </div>
		<?php }
}elseif($panel_type == '3-column'){
	//echo $panel_type;
	// $s_img = get_sub_field('statistic_image');
	// $s_img_url = $s_img['sizes']['large'];
	// $s_img_alt = $s_img['alt'];
	// $s_text = get_sub_field('statistic_text');
	// $s_background_image = get_sub_field('statstic_image');
	// $s_background_image_url = $s_background_image['sizes']['large'];
	// $s_callout = get_sub_field('statistic_callout');
	// $stat_background = get_sub_field('s_background_image');
	// $stat_background_url = $stat_background['sizes']['large'];
	// $stat_background_alt = $stat_background['alt'];
	// $more_link = get_sub_field('more_link_text');
	// $more_link_url = get_sub_field('more_link');
	// $s_external = get_sub_field('external');
	//$three_col_google_data = get_sub_field('h_3up_google_click_description');
	//$three_col_block_type = get_sub_field('block_type');
	$s_target = '';
	if($s_external == true){
		$s_target = 'target="_blank"';
	}

	if(have_rows('3-column_block')):
	?>
	<div class="section hc row">
	<?php
		while(have_rows('3-column_block')):the_row();
			$three_col_google_data = get_sub_field('h_3up_google_click_description');
			$three_col_block_type = get_sub_field('block_type');
			$three_col_bg_color = get_sub_field('h_3up_background_color');
			$three_col_bg_image = get_sub_field('h_block_background_image');
			$three_col_bg_URL = $three_col_bg_image['sizes']['large'];
			$three_col_hover_title_text = get_sub_field('h_3up_hover_title_text');
			$three_col_hover_subtitle_text = get_sub_field('h_3up_hover_subtitle_text');
			$three_col_button_text = get_sub_field('h_button_text');
			$three_col_description = get_sub_field('h_3up_to_block_description');
			$three_col_hover_description = get_sub_field('h_3up_to_hover_description');
			$three_col_cta_text = get_sub_field('h_3up_to_cta_text');
			$three_col_cta_link = get_sub_field('h_3up_to_cta_link');
	?>
	
	<?php if ($three_col_block_type == 'image'){?>
		<div class="hc block image columns-4 no-padding has-background" style="height:400px; background-image:url(<?php echo $three_col_bg_URL; ?>);"><!-- container -->
			<div class="active content">
				<div class="btn">
					<span>
						<?php echo $three_col_button_text; ?>
					</span>
				</div>
			</div>
			<div class="hover">
				<div class="wrapper">
					<div class="content">
						<a href="<?php echo $three_col_cta_link; ?>" target="_blank" data-qa="<?php echo $campaign ?> - <?php echo $three_col_google_data; ?>">
							<h3 class="hc-title"><?php echo $three_col_hover_title_text; ?></h3>
							<h2 class="hc-subtitle"><?php echo $three_col_hover_subtitle_text; ?></h2>
						</a>
					</div>
				</div>
			</div>
		</div>
	<?php }else{ ?>
	<div class="hc block text-only columns-4" style="height:400px; background-color:#F9B29A;"><!-- container -->
			<div class="active">
				<div class="wrapper">
					<div class="content">	
						<h3 class="description"><?php echo $three_col_description; ?></h3>
					</div>
				</div>
			</div>
			<div class="hover">
				<div class="wrapper">
					<div class="content">
						<h2 class="description"><?php echo $three_col_hover_description; ?></h2>
						<a class="cta" href="<?php echo $three_col_cta_link; ?>" target="_blank" data-qa="<?php echo $campaign ?> - <?php echo $three_col_google_data; ?>">
							<?php echo $three_col_cta_text;?>
						</a>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>
<?php endwhile; ?>
</div>
<?php endif; //end 3-column loop ?>
<?php } ?>
<?php endwhile; endif; //end entire loop?>
</div>
<!-- End of Content -->
</main>
<?php get_footer(); ?>
