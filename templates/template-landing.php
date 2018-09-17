<?php get_header();
/* Template Name: Landing Page Template */
?>

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
<div class="welcome-gate interior" style="background-image:url('<?php echo get_template_directory_uri(); ?>/img/EMC_MasterLandingPage_HeaderImage.png');">
	<!-- <img src="<//?php echo get_template_directory_uri(); ?>/img/everymothercounts_logo_primary_white_40in.png" alt=""> -->
	<?php if ($vm_url == '' && $vo_url == '' && $vw_url == ""){ ?>
	<div class="welcome-gate-bg" style="background-image:url('<?php echo $background_image_url; ?>');"></div>
	<?php } ?>
	<div class="banner-text columns-5 offset-by-1">
		<p class="top-callout"><?php echo the_title(); ?></p>
		<h1 class="page-title heading1"><?php echo $l_page_callout; ?></h1>
	</div>
	<?php if ($vm_url != '' && $vo_url != '' && $vw_url != ""){ ?>
		<video placeholder="<?php echo $background_image_url; ?>" autoplay="true" loop="true" muted="true">
			<source src ="<?php echo $vm_url; ?>" autoplay="true" loop="true" muted="true">
			<source src ="<?php echo $vo_url; ?>" autoplay="true" loop="true" muted="true">
			<source src ="<?php echo $vw_url; ?>" autoplay="true" loop="true" muted="true">
		</video>
	<?php } ?>
</div>
<?php
	if(have_rows('content_panel')):
		while(have_rows('content_panel')):the_row();
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
						<!-- <p>Asociación Corazón del Agua trains indigenous midwives from high maternal-mortality districts with a 3-year curriculum that incorporates indigenous traditions in the country’s first professional university-level degree program.</p> -->
					</div>
				</div>
			</div>
		</div>
		<?php }
}elseif($panel_type == 'stats'){

	$s_img = get_sub_field('statistic_image');
	$s_img_url = $s_img['sizes']['large'];
	$s_text = get_sub_field('statistic_text');
	$s_background_image = get_sub_field('statstic_image');
	$s_background_image_url = $s_background_image['sizes']['large'];
	$s_callout = get_sub_field('statistic_callout');
	$stat_background = get_sub_field('s_background_image');
	$stat_background_url = $stat_background['sizes']['large'];
	$stat_background_alt = $stat_background['alt'];
	$more_link = get_sub_field('more_link_text');
	$more_link_url = get_sub_field('more_link');
	$external = get_sub_field('external');
	$target = '';
	if($external == true){
		$target = 'target="_blank"';
	}
	?>
	<div class="panel half-img-callout">
	<div class=""><!-- container -->
		<div class="row">
			<div class="columns-6 image">
				<img src="<?php echo get_template_directory_uri(); ?>/img/EMC_ImageStat.png" alt="">
			</div>
			<div class="columns-4 offset-by-1 callout-half" >
				<p class="desc"><?php echo $s_callout; ?></p>
				<div class="cta">
					<?php if($more_link != ''){ ?>
					<a href="<?php echo $more_link_url; ?>">
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
	?>
<div class="panel statistic">
		<div class="container">
			<div class="row">
				<?php if($ib_callout_text != '' && $ib_callout_title != ''){ ?>
				<div class="columns-3 offset-by-1 stats">
					<p class="title"><?php echo $ib_callout_title; ?></p>
					<p class="desc"><?php echo $ib_callout_text; ?></p>
				</div>
				<?php } ?>
			</div>
		</div>
		<div class="content">
			<div class="img-screen">

			</div>
			<!-- <img class="feature-image has-background" style="background-image:url('<?php echo $ip_image_url; ?>')" /> -->
			<img class="feature-image" src="<?php echo $ip_image_url; ?>" />
			<!-- <img class="feature-image" src="<//?php echo $story_img_url; ?>" alt="" style="opacity:0;"> -->
			<!-- </div> -->
		</div>
		<!-- <div class="stat-visual" src="<//?php echo get_template_directory_uri(); ?>/img/Y1WMEo9Q.png" alt="">
			<div class="img-screen">

			</div>
		</div> -->
	</div>
<?php }elseif($panel_type == 'news') {
	$n_title = get_sub_field('news_title');
	$n_excerpt = get_sub_field('news_story_excerpt');
	$n_link = get_sub_field('news_story_link');
	$external = get_sub_field('n_external');

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
								$target = '';
								$external = get_sub_field('gl_external');
								// if($g_cnt %4 == 0){
								// 	echo '</div><div class="row">';
								// }
								?>
						<div class="columns-3 card">
							<?php if($grid_item_link != '') {?>
							<a href="<?php echo $icon_url; ?>" <?php echo $target?>>
							<?php } ?>
								<img class="card-icon" src="<?php echo $icon_url; ?>" alt="<?php echo $icon_alt; ?>">
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
<div class="panel text-grid interior">
		<div class="container">
			<div class="row">
				<div class="columns-10 offset-by-1">
					<?php if (have_rows('cta_grid')):
							while (have_rows('cta_grid')):the_row();
							$cta_title=get_sub_field('cta_title');
							$cta_text=get_sub_field('cta_text');
							$cta_link=get_sub_field('cta_link');
							$cl_external = get_sub_field('cl_external');
							$target='';
							if($cl_external == 'true'){
								$target='target="_blank"';
							}
							?>
					<div class="columns-4">
						<div class="grid-item">
							<?php if ($cta_link != ''){?>
							<a href="<?php echo $cta_link; ?>" <?php echo $target; ?>>
							<?php } ?>

								<p class="heading6"><?php echo $cta_title; ?></p>
								<p class="desc"><?php echo $cta_text; ?></p>
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
								<?php } ?>
							<!-- </div> -->
							<?php if ($cta_link != ''){?>
							</a>
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
								$target = '';
								$cp_external = get_sub_field('cp_external');

								if($cp_external == 'true'){
									$target = 'target="_blank"';
								}
								?>
						<div class="columns-6 cta">
							<a href="<?php echo $cp_link; ?>" <?php echo $target; ?>>
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
<?php } ?>
<?php endwhile; endif; ?>
<!-- End of Content -->

<?php get_footer(); ?>
