<?php get_header();
/* Template Name: Campaign Page Template */
?>

<?php
   $background_img = get_field('cp_background_image');
   $background_image_url = $background_img['sizes']['background-fullscreen'];
   $v_ogg = get_field('cp_video_ogg');
   $vo_url = $v_ogg['url'];
   $v_mp4 = get_field('cp_video_mp4');
   $vm_url = $v_mp4['url'];
   $v_webm = get_field('cp_video_webm');
   $vw_url = $v_webm['url'];
   $v_type = get_field('cp_video_type');
   $l_page_callout = get_field('cp_banner_callout_text');
   $ex_link = get_field('cp_video_link');
   //$l_page_callout = get_field('banner_callout_text', 305);
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
   <div class="player-holder">
			<div class="player-content">
				<?php if ($v_type == 'hosted' || $v_type == 'vimeo'){ ?>
				<img class="play desktop-up <?php if ($v_type == 'vimeo'){echo 'vimeo-button'; }?>" src="<?php echo get_template_directory_uri(); ?>/img/EMC_Playbutton.png">
				<img class="play tablet-down <?php if ($v_type == 'vimeo'){echo 'vimeo-button'; }?>" src="<?php echo get_template_directory_uri(); ?>/img/EMC_Playbutton.png">
				<?php }else{ ?>
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
	     	$v_id = get_field('cp_vimeo_id');

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
?>
<main id="content" class="landing campaign">
<?php
	if(have_rows('campaign_panel')):
		while(have_rows('campaign_panel')):the_row();
			$panel_type=get_sub_field('panel_type');
			$callout_layout = get_sub_field('callout_block_layout');
			$callout_intro = get_sub_field('callout_intro_text');
			$callout_paragraph = get_sub_field('callout_paragraph');
	 if ($panel_type == 'callout'){
	 	if($callout_layout == 'stacked') {?>
<div class="panel callout interior">
	<div class="intro"><?php echo $callout_intro ?></div>
	<div class="heading6"><?php echo $callout_paragraph; ?></div>
</div>
<?php }else{ ?>
<div class="panel offset-text">
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
</div>
<?php }
	}elseif($panel_type == 'partners') {
		//echo 'partners';
		$pb_layout = get_sub_field('partner_block_layout');
		$partner_text = get_sub_field('partner_text');
		$partner_img = get_sub_field('partner_image');
		$partner_img_url = $partner_img['sizes']['large'];
		$partner_img_alt = $partner_img['alt'];
		//echo $pb_layout;
		if( $pb_layout == 'image-second') {
			$partner_text = get_sub_field('partner_text');
			?>
		<div class="panel img-and-wysiwyg image-right">
			<div class="container">
				<div class="row">
					<div class="columns-5 offset-by-1 textsection left-col">
						<?php echo $partner_text; ?>
					</div>
					<div class="columns-4 offset-by-1 right-col">
						<img src="<?php echo $partner_img_url; ?>" alt="<?php echo $partner_img_alt; ?>">
					</div>
				</div>
			</div>
		</div>
		<?php }else{ ?>
		<div class="panel img-and-wysiwyg image-left">
			<div class="container">
				<div class="row">
					<div class="columns-4 offset-by-1 left-col">
						<img src="<?php echo $partner_img_url; ?>" alt="<?php echo $partner_img_alt; ?>">
					</div>
					<div class="columns-5 offset-by-1 textsection right-col">
						<?php echo $partner_text; ?>
					</div>
				</div>
			</div>
		</div>
		<?php }
}elseif($panel_type == 'stats'){

	$s_img = get_sub_field('statistic_image');
	$s_img_url = $s_img['sizes']['large'];
	$s_img_alt = $s_img['alt'];
	$s_text = get_sub_field('statistic_text');
	$s_background_image = get_sub_field('statstic_image');
	$s_background_image_url = $s_background_image['sizes']['large'];
	$s_callout = get_sub_field('statistic_callout');
	$stat_background = get_sub_field('s_background_image');
	$stat_background_url = $stat_background['sizes']['large'];
	$stat_background_alt = $stat_background['alt'];
	$more_link = get_sub_field('more_link_text');
	$more_link_url = get_sub_field('more_link');
	$s_external = get_sub_field('external');
	$s_target = '';
	if($s_external == true){
		$s_target = 'target="_blank"';
	}
	?>
	<div class="panel half-img-callout">
	<div class=""><!-- container -->
		<div class="row">
			<div class="columns-6 image">
				<img src="<?php echo $s_img_url; ?>" alt="<?php echo $s_img_url; ?>">
			</div>
			<div class="columns-4 offset-by-1 callout-half" >
				<p class="desc"><?php echo $s_callout; ?></p>
				<div class="cta">
					<?php if($more_link != ''){ ?>
					<a href="<?php echo $more_link_url; ?>" <?php echo $s_target; ?>>
						<p><?php echo $more_link; ?></p>
						<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
							 viewBox="0 0 100 100" style="enable-background:new 0 0 100 100;" xml:space="preserve">
							<style type="text/css">
								.st0{fill:#EED9BD;}
								.st1{fill:#EC742E;}
							</style>
							<polygon class="st1" points="71.9,50.7 71.9,50.7 65.6,44.4 65.6,44.4 34.1,12.9 28.3,18.8 59.7,50.2 28.1,81.8 34.4,88.2
								39.3,83.3 66,56.5 71.9,50.7 "/>
						</svg>
					</a>
					<?php } ?>
				</div>
				<img src="<?php echo $stat_background_url; ?>" alt="<?php echo $stat_background_alt; ?>">
			</div>
		</div>
	</div>
</div>
<?php }elseif($panel_type == 'story'){
	$story_title = get_sub_field('story_title');
	$story_text = get_sub_field('story_text');
	$story_img = get_sub_field('story_image');
	$story_img_url = $story_img['sizes']['large'];
	$story_img_alt = $story_img['alt'];
	?>
	<div class="panel story">
		<div class="container">
			<div class="row">
				<div class="columns-5 offset-by-1">
					<img src="<?php echo $story_img_url; ?>" alt="<?php echo $story_img_alt; ?>">
					<p class="caption"><?php echo $story_img_alt; ?></p>
				</div>
				<div class="columns-5 wysiwyg-section">
					<p class="heading6 title"><?php echo $story_title; ?></p>
					<p class="wysiwyg"><?php echo $story_text; ?></p>
				</div>
			</div>
		</div>
	</div>
<?php }elseif($panel_type == 'image'){

	$ip_image = get_sub_field('image_panel_image');
	$ip_image_url = $ip_image['sizes']['background-fullscreen'];
	$ip_image_alt = $ip_image['alt'];
	$ib_callout_title = get_sub_field('ib_callout_title');
	$ib_callout_text = get_sub_field('ib_callout_text');
	$ip_overlay  = get_sub_field('remove_overlay');
	$ip_link = get_sub_field('image_panel_callout_link');

	//var_dump($ip_overlay);
	?>
<div class="panel statistic news-ticker">
		<div class="container">
			<div class="row">
				<?php if($ib_callout_text != '' && $ib_callout_title != ''){ ?>
				<div class="columns-3 offset-by-1 stats">
					<p class="title"><?php echo $ib_callout_title; ?></p>
					<?php if ($ip_link != ''){ ?>
					<a href="<?php echo $ip_link; ?>">
					<?php } ?>
					<p class="desc"><?php echo $ib_callout_text; ?></p>
					<?php if ($ip_link != ''){ ?>
					 <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
									 viewBox="0 0 100 100" style="enable-background:new 0 0 100 100;" xml:space="preserve">
									<style type="text/css">
										.st0{fill:#EED9BD;}
										.st1{fill:#EC742E;}
									</style>
									<polygon class="st1" points="71.9,50.7 71.9,50.7 65.6,44.4 65.6,44.4 34.1,12.9 28.3,18.8 59.7,50.2 28.1,81.8 34.4,88.2
										39.3,83.3 66,56.5 71.9,50.7 "/>
								</svg>
					</a>
					<?php } ?>
				</div>
				<?php } ?>
			</div>
		</div>
		<div class="content" >
			<?php if($ip_overlay == true){ ?>
			<div class="img-screen" aria-hidden="true"></div>
			<?php } ?>
			<?php 
				$img_class= '';
			if($ib_callout_text == '' && $ib_callout_title == ''){ 
					$img_class = 'has_ig';
				}	
					?>
			<div class="feature-image has-background <?php echo $img_class; ?>">
				<img src="<?php echo $ip_image_url; ?>">
				<?php if($ib_callout_text != '' && $ib_callout_title != ''){ ?>
				<div class="background has-background" style="background-image:url('<?php echo $ip_image_url; ?>');"></div>
				<?php } ?>
			</div>
			<?php if(have_rows('ticker_links')): ?>
			<div class="marquee3k scroll-ticker" data-speed=".5" data-pausable="true">
				<ul id="webticker">
			<?php while(have_rows('ticker_links')):the_row();
				$t_link = get_sub_field('ticker_link_url');
				$t_link_text = get_sub_field('ticker_link_text');
				
			?>
				<li>
					<a href="<?php echo $t_link; ?><" target="_blank">
						<?php echo $t_link_text; ?>

					</a>
				</li>
			
			<?php endwhile; ?>
		</ul>
	</div>
		<?php endif; ?>
			
		</div>
	</div>
<?php }elseif($panel_type == 'news') {
	$n_title = get_sub_field('news_title');
	$n_excerpt = get_sub_field('news_story_excerpt');
	$n_link = get_sub_field('news_story_link');
	$n_external = get_sub_field('n_external');

	?>
<div class="panel photo-essay">
		<div class="container">
			<div class="row">
				<div class="columns-3 offset-by-1 text-section">
					<p class="heading6"><?php echo $n_title; ?></p>
					<p class="desc"><?php echo $n_excerpt; ?></p>
				</div>
				<div class="columns-7 img-section">
					<?php
						$i_rows = count(get_sub_field('news_story_images'));
						//var_dump($i_rows);
					if (have_rows('news_story_images')):
							$i_cnt = 0;
							$first_loop = 0;
							$t_cnt = 0;
							while(have_rows('news_story_images')):the_row();
							$i_cnt++;
							$n_image = get_sub_field('news_story_image');
							$n_image_url = $n_image['sizes']['large'];
							$n_image_alt = $n_image['alt'];
							$class='';
							if($i_cnt == 1){
								$class='feature';
							}else{
								$class='columns-6';
							}
							if($i_cnt == 1){
								$first_loop++;

							?>
							<img class="feature" src="<?php echo $n_image_url;?>" alt="<?php echo $n_image_alt; ?>">
						<?php }else{
								$t_cnt++;
								if($first_loop == 1){
									$first_loop=0;

									echo '<div class="thumbnails row '.$t_cnt.' '.($t_cnt %2).' '.$first_loop.'">';
								}?>
							<div class="<?php echo $class; ?> <?php echo $t_cnt; ?>">
								<img src="<?php echo $n_image_url;?>" alt="<?php echo $n_image_alt; ?>">
							</div>
							<?php
								if($t_cnt %2 == 0 && $t_cnt+1 != $i_rows){
									echo '</div><div class="thumbnails row '.($t_cnt+1).' '.$i_rows.'">';
								}
								if($t_cnt+1 == $i_rows){
									echo '</div>';
								}
						} ?>
						<!-- </div> -->
					<?php endwhile; endif; ?>

				</div>
			</div>
		</div>
	</div>
<?php }elseif ($panel_type == 'grid') {?>
<div class="panel icon-grid">
		<div class="container">
			<div class="row">
				<div class="columns-10 offset-by-1 grid-cols">
					<!-- <div class="row"> -->
						<?php if(have_rows('grid')):
						$g_cnt = 0;
						?>
						<div class="row">
						<?php
								while(have_rows('grid')):the_row();
								$g_cnt++;
								$icon = get_sub_field('grid_icon');
								$icon_url = $icon['sizes']['large'];
								$icon_alt = $icon['alt'];
								$grid_text = get_sub_field('grid_item_text');
								$grid_item_link = get_sub_field('grid_item_link');
								$gl_external = get_sub_field('gl_external');
								$gl_target='';
								if($gl_external == 'true'){
									$gl_target='target="_blank"';
								}
								// if($g_cnt %4 == 0){
								// 	echo '</div><div class="row">';
								// }
								?>
						<div class="columns-3 card">
							<?php if($grid_item_link != '') {?>
							<a href="<?php echo $grid_item_link; ?>" <?php echo $gl_target?>>
							<?php } ?>
								<?php
								if ($icon_url) {?>
									<img class="card-icon" src="<?php echo $icon_url; ?>" alt="<?php echo $icon_alt; ?>">
								<?php }
								?>
								<div class="content">
									<div class="divider"></div>
									<div class="caption">
										<p><?php echo $grid_text; ?> <?php //echo ($g_cnt%4); ?></p>
									</div>
								</div>
								<?php if($grid_item_link != '') {?>
								</a>
							<?php } ?>
						</div>
						<?php if($g_cnt %4 == 0){
									echo '</div><div class="row">';
								}?>
						<?php //if($g_cnt%4 != 0){ echo '</div>';} ?>
						<?php endwhile; ?>
							</div>
					<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php }elseif($panel_type == 'cta-grid'){?>
<div class="panel text-grid interior special" style="background-color:#97a88f;"><!-- style="background-color:#97a88f;" -->
		<div class="container">
			<div class="row">
				<?php 
					$grid_title = get_sub_field('cta-grid-title');
					$grid_subtitle = get_sub_field('cta-callout-subtitle');
				?>
				<?php if($grid_title != '') { ?>
				<div class="intro">
					<?php echo $grid_title; ?>
				</div>
				<? }
				if($grid_subtitle != '') { ?>
				<div class="heading6 subtitle">
					<?php echo $grid_subtitle; ?>
				</div>
				<?php } ?>
				<div class="columns-10 offset-by-1">
					<?php if (have_rows('cta_grid')):
							while (have_rows('cta_grid')):the_row();
							$cta_img = get_sub_field('cta_image');
							$cta_img_url = $cta_img['sizes']['large'];
							$cta_img_alt = $cta_img['alt'];
							$cta_title=get_sub_field('cta_title');
							$replacers = array('-', ',', '&', '&amp;', '.', ' ');
							
							$cta_text=get_sub_field('cta_text');
							$cta_link=get_sub_field('cta_link');
							//var_dump($cta_link);
							$cta_desc = get_sub_field('cta_description');
							$cl_external = get_sub_field('cl_external');
							$cl_target='';
							if($cl_external == 'true'){
								$cl_target='target="_blank"';
							}
							$popup_title = get_sub_field('popup_title');
							$popup_content = get_sub_field('popup_content');
							//$pop_id2 = strtolower(str_replace($replacers, '-' ,$popup_title) );
							$popup_class = '';
							$wrapper_class = '';
							if($popup_content != ''){
								$popup_class = 'cta-popup-trigger';
								$wrapper_class = 'has_popup';
							}

							$pop_id = '';
							if($cta_title != ''){
								$pop_id = strtolower(str_replace($replacers, '-' ,$cta_title) );
							}else{
								$pop_id = strtolower(str_replace($replacers, '-' ,$popup_title) );
							}
							?>
					<div class="columns-4">
						<div class="grid-item <?php echo $wrapper_class; ?>" id="<?php echo $pop_id; ?>">
							
							<?php if($cta_img != ''){ ?>
								<div class="img-content">
									<img class="card-icon" src="<?php echo $cta_img_url; ?>" alt="<?php echo $cta_img_alt; ?>">
								</div>
							<?php } ?>
							<?php if ($cta_title != ''){ ?>
								
								<p class="heading2 title">
									<?php if ($cta_link != ''){?>
									<a class="<?php echo $popup_class; ?>" id="<?php echo $pop_id; ?>" href="<?php echo $cta_link; ?>" <?php echo $cl_target; ?>>
									<?php } ?>
								<?php echo $cta_title; ?>
								
								<?php if ($cta_link != ''){?>
									
									<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
									 viewBox="0 0 100 100" style="enable-background:new 0 0 100 100;" xml:space="preserve">
									<style type="text/css">
										.st0{fill:#EED9BD;}
										.st1{fill:#EC742E;}
									</style>
									<polygon class="st1" points="71.9,50.7 71.9,50.7 65.6,44.4 65.6,44.4 34.1,12.9 28.3,18.8 59.7,50.2 28.1,81.8 34.4,88.2
										39.3,83.3 66,56.5 71.9,50.7 "/>
								</svg>
								</a>
								<?php } ?>
								</p>
								<?php } ?>
								<?php if ($cta_text != ''){ ?>
								<p class="desc heading4"><?php echo $cta_text; ?></p>
								<?php } ?>
								<?php //if ($cta_link != '' && $popup_content == ''){?>
								<!-- <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
									 viewBox="0 0 100 100" style="enable-background:new 0 0 100 100;" xml:space="preserve">
									<style type="text/css">
										.st0{fill:#EED9BD;}
										.st1{fill:#EC742E;}
									</style>
									<polygon class="st1" points="71.9,50.7 71.9,50.7 65.6,44.4 65.6,44.4 34.1,12.9 28.3,18.8 59.7,50.2 28.1,81.8 34.4,88.2
										39.3,83.3 66,56.5 71.9,50.7 "/>
								</svg> -->
								<?php //} ?>
								<?php if($cta_desc != '') { ?>
								<div class="more-info"><?php echo $cta_desc; ?></div>
								<?php } ?>
							<!-- </div> -->
							<?php if ($cta_link != '' && $popup_content == ''){?>
							</a>
							<?php } ?>
							<?php //if ($popup_content != '') { ?>
							<!-- <a class="<?php echo $popup_class; ?> read-more heading6" id="<?php echo $pop_id; ?>" href="<?php echo $cta_link; ?>" <?php echo $cl_target; ?>>Read more 
								<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
									 viewBox="0 0 100 100" style="enable-background:new 0 0 100 100;" xml:space="preserve">
									<style type="text/css">
										.st0{fill:#EED9BD;}
										.st1{fill:#EC742E;}
									</style>
									<polygon class="st1" points="71.9,50.7 71.9,50.7 65.6,44.4 65.6,44.4 34.1,12.9 28.3,18.8 59.7,50.2 28.1,81.8 34.4,88.2
										39.3,83.3 66,56.5 71.9,50.7 "/>
								</svg>
							</a> -->
							<?php //} ?>
							<?php if($popup_content != ''){ ?>
							<div class="cta-popup hide" data-name="<?php echo $pop_id; ?>">
								<div class="popup-content">
									<div class="wrapper">
										<div class="popup-close">
											<svg class="" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
											 viewBox="0 0 100 100" style="enable-background:new 0 0 100 100;" xml:space="preserve">
												<g>
													<path style="fill:#EB742D;" d="M50.2,56.5L18.6,88.2l-6.3-6.3l31.6-31.6L12.5,18.8l5.9-5.9l31.5,31.5l31.6-31.6l6.3,6.3L56.1,50.7L87.4,82
														l-5.9,5.9L50.2,56.5z"/>
												</g>
											</svg>
										</div>
										<?php if($popup_title != ''){ ?>
										<h2><?php echo $popup_title; ?></h2>
										<?php } ?>
										<div class="popup-text">
											<?php echo $popup_content; ?>
										</div>
									</div>
								</div>
							</div>
							<?php } ?>
						</div>
					</div>
				<?php endwhile; endif; ?>
				</div>
			</div>
		</div>
	</div>
<?php } elseif($panel_type == 'cross-promo'){?>

<div class="panel half-cta">
		<div class="container">
			<div class="row">
				<div class="columns-10 offset-by-1">
					<div class="row">
						<?php if(have_rows('cross_promotional_grid')):
								while(have_rows('cross_promotional_grid')):the_row();
								$cp_text = get_sub_field('cross_promotional_text');
								$cp_link = get_sub_field('cross_promotional_link');
								$cp_target = '';
								$cp_external = get_sub_field('cp_external');

								if($cp_external == 'true'){
									$cp_target = 'target="_blank"';
								}
								?>
						<div class="columns-6 cta">
							<a href="<?php echo $cp_link; ?>" <?php echo $cp_target; ?>>
								<p><?php echo $cp_text; ?></p>
								<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
									 viewBox="0 0 100 100" style="enable-background:new 0 0 100 100;" xml:space="preserve">
									<style type="text/css">
										.st0{fill:#EED9BD;}
										.st1{fill:#EC742E;}
									</style>
									<polygon class="st1" points="71.9,50.7 71.9,50.7 65.6,44.4 65.6,44.4 34.1,12.9 28.3,18.8 59.7,50.2 28.1,81.8 34.4,88.2
										39.3,83.3 66,56.5 71.9,50.7 "/>
								</svg>
							</a>
						</div>
						<?php endwhile; endif; ?>

					</div>
				</div>
			</div>
		</div>
	</div>
<?php }elseif($panel_type == 'text-only'){ ?>

<div class="panel text-only">
		<div class="container">
			<div class="row">
				<?php if(have_rows('two_column_wysiwyg')): ?>
				
				<?php while(have_rows('two_column_wysiwyg')):the_row(); 
					$w_content = get_sub_field('column');
				?>
				<div class="columns-5 offset-by-1 textsection">
					<?php echo $w_content; ?>

				</div>
				<?php endwhile; ?>
				
			<?php endif; ?>
		</div>
	</div>
</div>
				
		<!-- 	</div>
		</div>
	</div> -->

<?php }elseif ($panel_type =='map'){ 
	$map_title = get_sub_field('map_title');
	$map_subtitle = get_field('map_subtitle');
	?>
<div class="panel i-map" id="vmap">
	<?php if($map_title != ''){ ?>
	<div class="intro">
		<?php echo $map_title; ?>
	</div>
	<? }
	if($map_subtitle != '') { ?>
	<div class="heading6">
		<?php echo $map_subtitle; ?>
	</div>
	<?php } ?>
	<?php if(have_rows('map_locations')): ?>
		<div class="location-popups">
			
		<?php while(have_rows('map_locations')):the_row(); 

			$location = get_sub_field('location_title');
			//var_dump($location);
			$location_data = get_field_object('location_title');
			//The value of the select
			$location_name = $location['label'];
			//var_dump($location_data);
			$location_abbr = strtolower($location['value']);
			//var_dump($location);
			$location_content = get_sub_field('location_content');
			//The label of the select
		?>
		<div class="location-popup hide" data-name="<?php echo $location_abbr; ?>">
			<div class="popup-content">
				<div class="wrapper">
					<div class="popup-close">
						<svg class="" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
						 viewBox="0 0 100 100" style="enable-background:new 0 0 100 100;" xml:space="preserve">
							<g>
								<path style="fill:#EB742D;" d="M50.2,56.5L18.6,88.2l-6.3-6.3l31.6-31.6L12.5,18.8l5.9-5.9l31.5,31.5l31.6-31.6l6.3,6.3L56.1,50.7L87.4,82
									l-5.9,5.9L50.2,56.5z"/>
							</g>
						</svg>
					</div>
					<div class="popup-text" >
						<?php echo $location_content; ?>
					</div>
				</div>
			</div>
		</div>
				<?php endwhile;?>
			</div>
			<?php endif; ?>

</div>
<?php }elseif ($panel_type =='i-graphic'){ 
	$ip_image = get_sub_field('image_panel_image');
	$ip_image_url = $ip_image['sizes']['background-fullscreen'];
	$ip_image_alt = $ip_image['alt'];
	$ig_link_img = get_sub_field('infographic_link_img');
	//var_dump($ig_link_img);
	$ig_bubble = $ig_link_img['sizes']['medium'];
	$ig_link = get_sub_field('infographic_link');
	?>
	<div class="panel info-with-link">
		<div class="container">
			<div class="infographic" style="position:relative;">
				<img src='<?php echo $ip_image_url; ?>'>
				<div class="bubble">
					<a href="<?php echo $ig_link; ?>" target="_blank"><img class="bubble-img" src='<?php echo $ig_bubble; ?>'></a>
				</div>
			</div>
			
		</div>
	</div>
<?php } ?>
<?php endwhile; endif; ?>
</div>
<!-- End of Content -->
</main>
<?php get_footer(); ?>
