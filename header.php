<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->

<head>

	<meta charset="utf-8">
	<title><?php bloginfo('name'); ?></title>

	<!-- Meta / og: tags -->
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Mobile Specific Metas
	================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS
	================================================== -->
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />

	<!-- Typography ================================== -->
	<script defer src="https://use.fontawesome.com/releases/v5.2.0/js/all.js" integrity="sha384-4oV5EgaV02iISL2ban6c/RmotsABqE4yZxZLcYMAdG7FAPsyHYAPpywE9PJo+Khy" crossorigin="anonymous"></script>

	<!-- Favicons
	================================================== -->
	<link rel="shortcut icon" href="images/favicon.ico">
	<link rel="apple-touch-icon" href="images/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

	<header>
		<div class="ticker">
			<div class="container">
				<div class="row">
					<p class="text"><span class="ticker-title">Giving Birth in America:</span> The number of women who have lost their lives giving birth in America has nearly doubled in 25 years. Watch the films and take action today.</p>
					<div class="close">
						<a href="#">
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
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img class="main-logo" src="<?php echo get_template_directory_uri(); ?>/img/everymothercounts_logo_Madonna_onecolor_40in.png" alt=""></a>
						<nav class="main-navigation">
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
						<div class="secondary-navigation">
							<ul>
								<li><a href="#">What Can I Do?</a></li>
								<li><a href="#">Donate</a></li>
							</ul>
							<div class="socials">
								<a href="#"><i class="fab fa-twitter"></i></a>
								<a href="#"><i class="fab fa-instagram"></i></a>
								<a href="#"><i class="fab fa-facebook"></i></a>
								<a href="#"><i class="fab fa-youtube"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
