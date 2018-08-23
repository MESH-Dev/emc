<?php get_header(); 
/* Template Name: Homepage*/
?>
<script>
			var _places = {
			<?php $countries = get_field('countries'); 
			//echo $countries; 
			foreach ($countries as $row){ 
				//var_dump($row['country_lp'][0]);
				?>

				"<?php echo $row['country']; ?>":"\u003ca href=\"<?php echo $row['country_lp'][0]; ?>\"\u003e \u003cimg src=\"pk.png\" /\u003e \u003cspan\u003eBRAZIL\u003c/span\u003e \u003ca a/\u003e"

			<?php }
			?>
			};
			</script>
<main id="content">
	<?php 
		$background_img = get_field('img_fallback');
		$bakground_image_url = $background_img['sizes']['background-fullscreen'];
		$v_ogg = get_field('video_ogg');
		$vo_url = $v_ogg['url'];
		$v_mp4 = get_field('video_mp4');
		$vm_url = $v_mp4['url'];
		$v_webm = get_field('video_webm');
		$vw_url = $v_webm['url'];
	?>
	<div class="welcome-gate" style="position:relative; display:table; background-image:url('<?php echo get_template_directory_uri(); ?>/img/mother1.png');">
		<div class="pane" style="display:table-cell; width:100%; height:100%; vertical-align:middle; ">
			<img style="position:relative; z-index:500;" src="<?php echo get_template_directory_uri(); ?>/img/everymothercounts_logo_primary_white_40in.png" alt="">
		</div>
		<?php if ($vm_url != '' && $vo_url != '' && $vw_url != ""){ ?>
			<video style="position:absolute; top:0; width:100%; height:100vh;" autoplay="true" loop="true" muted="true">	
				<source src ="<?php echo $vm_url; ?>" autoplay="true" loop="true" muted="true">
				<source src ="<?php echo $vo_url; ?>" autoplay="true" loop="true" muted="true">
				<source src ="<?php echo $vw_url; ?>" autoplay="true" loop="true" muted="true">
			<video>
		<? } ?>
	</div>
	<div class="container">
		<div class="row">
			<div class="columns-9">
				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

					<!-- <h1><?php //the_title(); ?></h1> -->

					<?php //the_content(); ?>

				<?php endwhile; ?>
			</div>

			<div class="columns-3">

				<!-- Change this to repeater of custom fields -->

		
			</div>
			
			<style>
			    #vmap svg{
			      position: relative;
			      z-index:0;
			    }
			    .jqvmap-pin{
			      z-index:9999;
			      pointer-events:initial;
			    }

			    .jqvmap-region{
			      position:relative;
			      z-index: -1;
			      pointer-events:none;
			    }
			    .jqvmap-region path{
			      position: relative;
			      z-index:1;
			    }
			</style>

			<div class="panel" id="vmap" style="width: 100%; height: 600px;"></div>
				 
			</div>
			
		</div>
	</div>

</main><!-- End of Content -->

<?php get_footer(); ?>
