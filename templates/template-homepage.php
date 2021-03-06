<?php get_header();
/* Template Name: Homepage*/
?>
<script>
			var _pins = {
			<?php $countries = get_field('countries');
			//var_dump ($countries);
			foreach ($countries as $row){
				//var_dump($row['country_lp'][0]);

				?>

				"<?php echo $row['country']['value']; ?>":"\u003ca href=\"<?php echo $row['country_lp'][0]; ?>\"\u003e  \u003cspan\u003e<?php echo $row['country']['label']; ?>\u003c/span\u003e \u003ca a/\u003e",

			<?php } ?>
			};
			</script>
			<?php
		$background_img = get_field('img_fallback');
		$background_image_url = $background_img['sizes']['background-fullscreen'];
		$v_ogg = get_field('video_ogg');
		$vo_url = $v_ogg['url'];
		$v_mp4 = get_field('video_mp4');
		$vm_url = $v_mp4['url'];
		$v_webm = get_field('video_webm');
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
<main id="content" class="home-template">

	<div class="panel callout">
		<div class="container">
			<?php
			//Setup our ACF fields for use in this region
			$intro_callout = get_field('intro_callout');
			$intro_text = get_field('intro_text');
			$map_title = get_field('map_title');
			$map_image = get_field('map_image');
			$map_image_url = $map_image['url'];
			?>

			<div class="intro"><?php echo $intro_text; ?></div>
			<div class="intro-callout"><?php echo $intro_callout; ?></div>
			<p class="heading6"><?php echo $map_title; ?> </p>
			<div class="panel map" style="position:relative;width: 100%; /*height: 600px;*/ background-image:url('<?php //echo $map_image_url; ?>'); background-repeat:no-repeat; background-size:cover; background-position:center center;">
				<!-- <div class="map_wrapper" style="position:relative; background:red;"> -->
					<img src="<?php echo $map_image_url; ?>" style="width:100%;"/>
					<Ul class="pins">
						<li class="pin right usa">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>/united-states">United States</a>
						</li>
						<li class="pin right guatemala">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>/guatemala">Guatemala</a>
						</li>
						<li class="pin left haiti">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>/haiti">Haiti</a>
						</li>
						<li class="pin right india">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>/india">India</a>
						</li>
						<li class="pin left bangladesh">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>/bangladesh">Bangladesh</a>
						</li>
						<!-- <li class="pin left uganda">
							<a href="<//?php echo esc_url( home_url( '/' ) ); ?>/uganda">Uganda</a>
						</li> -->
						<li class="pin left tanzania">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>/tanzania">Tanzania</a>
						</li>
					</ul>
				<!-- </div> -->
			</div>
		</div>
	</div>
	<?php echo get_template_part('/partials/promo-grid'); ?>
	<div class="panel feature">
		<div class="container">
			<div class="row">
				<div class="columns-3 offset-by-1 intro-wrap">
					<div class="intro"><!-- offset-by-1 -->
						<?php
							$s_title = get_field('story_title');
							$s_excerpt = get_field('story_excerpt');
							$s_link = get_field('story_link');
							$external = get_field('external');
							$story_img = get_field('s_image');
							$story_img_url = $story_img['sizes']['background-fullscreen'];
							$story_img_alt = $story_img['alt'];
							$target='';
							if($external == true){
								$target = 'target="_blank"';
							}

							if($s_title != ''){
						?>

						<p class="title"><?php echo $s_title; ?></p>
						<?php if($s_link !="_blank"){ ?>
						<a href="<?php echo $s_link;?>" <?php echo $target; ?>>
						<?php } ?>
							<p class="desc"><?php echo $s_excerpt; ?></p>
							<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
								 viewBox="0 0 100 100" style="enable-background:new 0 0 100 100;" xml:space="preserve">
								<style type="text/css">
									.st0{fill:#EED9BD;}
									.st1{fill:#EC742E;}
								</style>
								<polygon class="st1" points="71.9,50.7 71.9,50.7 65.6,44.4 65.6,44.4 34.1,12.9 28.3,18.8 59.7,50.2 28.1,81.8 34.4,88.2
									39.3,83.3 66,56.5 71.9,50.7 "/>
							</svg>
						<?php if($s_link !="_blank"){ ?>
						</a>
						<?php } } ?>
					</div>
				</div>
			</div>
		</div>
		<div class="content">
			<div class="img-screen">

			</div>
			<?php 
				$img_class= '';
			if($s_title == '' && $s_text == ''){ 
					$img_class = 'has_ig';
				}	
					?>
			<div class="feature-image has-background <?php echo $img_class; ?>">
				<img class="feature-image" src="<?php echo $story_img_url; ?>" alt="<?php echo $story_img_alt; ?>">
				<?php if($s_title == '' && $s_text == ''){  ?>
				<div class="has-background background" style="background-image:url(<?php echo $story_img_url; ?>);">
				<?php } ?>
			</div>
		</div>

	</div>


</main><!-- End of Content -->

<?php get_footer(); ?>
