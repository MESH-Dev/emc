<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->

<head>

	<meta charset="utf-8">

	<!-- Meta / og: tags -->
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Mobile Specific Metas
	================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS
	================================================== -->
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	<link rel="stylesheet" type="text/css" href="https://cloud.typography.com/6658256/7936592/css/fonts.css" />

	<!-- Typography ================================== -->
	<script defer src="https://use.fontawesome.com/releases/v5.2.0/js/all.js" integrity="sha384-4oV5EgaV02iISL2ban6c/RmotsABqE4yZxZLcYMAdG7FAPsyHYAPpywE9PJo+Khy" crossorigin="anonymous"></script>

	<!-- Favicons
	================================================== -->
	<link rel="shortcut icon" href="images/favicon.ico">
	<link rel="apple-touch-icon" href="images/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">

	<?php wp_head(); ?>

	<!-- Bugherd - Delete before site is live -->
	<script type='text/javascript'>
		(function (d, t) {
		  var bh = d.createElement(t), s = d.getElementsByTagName(t)[0];
		  bh.type = 'text/javascript';
		  bh.src = 'https://www.bugherd.com/sidebarv2.js?apikey=yxjz33jhnn2bgxyldpsrtg';
		  s.parentNode.insertBefore(bh, s);
		  })(document, 'script');
	</script>

</head>

<body <?php body_class(); ?>>
	<div class="modal">
		<div class="modal-body">
			<div class="thumbnail-section" style="background-image:url('<?php echo get_template_directory_uri(); ?>/img/josh-bangaldesh2.png');">
				<svg class="modal-close" id="modalClose" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
					 viewBox="0 0 100 100" style="enable-background:new 0 0 100 100;" xml:space="preserve">
					<style type="text/css">
						.st0{fill:#EED9BD;}
						.st1{fill:#EC742E;}
					</style>
					<g>
						<path class="st0" d="M50.2,56.5L18.6,88.2l-6.3-6.3l31.6-31.6L12.5,18.8l5.9-5.9l31.5,31.5l31.6-31.6l6.3,6.3L56.1,50.7L87.4,82
							l-5.9,5.9L50.2,56.5z"/>
					</g>
				</svg>
			</div>
			<div class="form-section">
				<h5>Become a part of a community committed to caring for mothers everywhere.</h5>
				<form class="" action="" method="post">
					<p>
					  <div class="name-fields first">
							<label class="sr-only">First Name: </label>
							<input type="text" name="first" placeholder="First Name" required />
					  </div>
					  <div class="name-fields">
						 <label class="sr-only">Last Name: </label>
						<input type="text" name="last" placeholder="Last Name" required />
					  </div>
						 <label class="sr-only">Email address: </label>
						<input type="email" name="email" placeholder="Email Address" required />
					</p>
					<input type="submit" value="Sign up for our newsletter" />
				</form>
			</div>
		</div>
		<div class="modal-underlay">

		</div>
	</div>
	<header>
		<?php
			$h_cta = get_field('cta_message', 'option');
			$h_link = get_field('cta_message_link', 'option');
			$h_external = get_field('tc_external', 'option');
			$ticker_color = get_field('cta_background_color', 'option');

			$h_target = '';
			if($h_external == 'true'){
				$h_target='target="_blank"';
			}
		?>
		<div class="ticker" style="background-color:<?php echo $ticker_color; ?>;">
			<div class="container">
				<div class="row ticker-row">
					<div class="text">
						<a href="<?php echo $h_link; ?>" <?php echo $h_target; ?>>

								<?php echo $h_cta; ?>

						</a>
					</div>
					<div class="close">
						<a href="#" id="tickerClose">
							<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
								 viewBox="0 0 100 100" style="enable-background:new 0 0 100 100;" xml:space="preserve">
								<style type="text/css">
									.st0{fill:#EED9BD;}
									.st1{fill:#EC742E;}
								</style>
								<g>
									<path class="st0" d="M50.2,56.5L18.6,88.2l-6.3-6.3l31.6-31.6L12.5,18.8l5.9-5.9l31.5,31.5l31.6-31.6l6.3,6.3L56.1,50.7L87.4,82
										l-5.9,5.9L50.2,56.5z"/>
								</g>
							</svg>
						</a>
					</div>
				</div>
			</div>
		</div>
		<div class="top-nav">
			<div class="container">
				<div class="row">
					<div class="columns-12">
						<!-- <div class="logo">
							<h1 class="site-title"><a href="<//?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><//?php bloginfo( 'name' ); ?></a></h1>
						</div> -->
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
							<!-- <//?php if(is_front_page()){ ?> -->
							<!-- <img class="main-logo" src="<?php echo get_template_directory_uri(); ?>/img/everymothercounts_logo_Madonna_onecolor_40in.png" alt=""> -->
							<!-- <//?php }else{ ?> -->
							<img class="interior main-logo" src="<?php echo get_template_directory_uri(); ?>/img/everymothercounts_logo@3x.png" alt="">
							<img class="interior-mobile main-logo" src="<?php echo get_template_directory_uri(); ?>/img/everymothercounts_logo_Madonna_onecolor_40in.png" alt="">
							<!-- <//?php } ?> -->
						</a>
						<nav class="main-navigation" id="header-main">
							<?php if(has_nav_menu('main_nav')){
										$defaults = array(
											'theme_location'  => 'main_nav',
											'menu'            => 'main_nav',
											'container'       => false,
											'container_class' => '',
											'container_id'    => '',
											'menu_class'      => 'menu',
											'menu_id'         => '',
											'echo'            => true,
											'fallback_cb'     => 'wp_page_menu',
											'before'          => '',
											'after'           => '',
											'link_before'     => '',
											'link_after'      => '',
											'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
											'depth'           => 0,
											'walker'          => ''
										); wp_nav_menu( $defaults );
									}else{
										echo "<p><em>main_nav</em> doesn't exist! Create it and it'll render here.</p>";
									} ?>
						</nav>
						<div class="secondary-navigation" id="header-secondary">
							<?php if(has_nav_menu('gateway_nav')){
										$defaults = array(
											'theme_location'  => 'gateway_nav',
											'menu'            => 'gateway_nav',
											'container'       => false,
											'container_class' => '',
											'container_id'    => '',
											'menu_class'      => 'menu',
											'menu_id'         => '',
											'echo'            => true,
											'fallback_cb'     => 'wp_page_menu',
											'before'          => '',
											'after'           => '',
											'link_before'     => '',
											'link_after'      => '',
											'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
											'depth'           => 0,
											'walker'          => ''
										); wp_nav_menu( $defaults );
									}else{
										echo "<p><em>gateway_nav</em> doesn't exist! Create it and it'll render here.</p>";
									} ?>
							<div class="socials" id="header-social">
								<a href="#"><i class="fab fa-twitter"></i></a>
								<a href="#"><i class="fab fa-instagram"></i></a>
								<a href="#"><i class="fab fa-facebook"></i></a>
								<a href="#"><i class="fab fa-youtube"></i></a>
							</div>
							<a id="mobileMenuTrigger">
								<svg class="menu-icon" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 29 23">
								  <g>
									 <line x1="2" y1="2.5" x2="27" y2="2.5" style="fill: none;stroke: #eb742d;stroke-linecap: square;stroke-miterlimit: 10;stroke-width: 3px"/>
									 <line x1="2" y1="11.5" x2="27" y2="11.5" style="fill: none;stroke: #eb742d;stroke-linecap: square;stroke-miterlimit: 10;stroke-width: 3px"/>
									 <line x1="2" y1="20.5" x2="27" y2="20.5" style="fill: none;stroke: #eb742d;stroke-linecap: square;stroke-miterlimit: 10;stroke-width: 3px"/>
								  </g>
								</svg>
								<svg class="menu-close" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
									 viewBox="0 0 100 100" style="enable-background:new 0 0 100 100;" xml:space="preserve">
									<g>
										<path style="fill:#EB742D;" d="M50.2,56.5L18.6,88.2l-6.3-6.3l31.6-31.6L12.5,18.8l5.9-5.9l31.5,31.5l31.6-31.6l6.3,6.3L56.1,50.7L87.4,82
											l-5.9,5.9L50.2,56.5z"/>
									</g>
								</svg>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
