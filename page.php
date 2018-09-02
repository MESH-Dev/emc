<?php get_header(); ?>

<?php echo get_template_part('/partials/short-banner-no-video'); ?>
<main id="content" class="text">

	<div class="container">
		<!-- <div class="row"> -->
			<?php 
				$page_headline = get_field('page_headline');
				$page_callout = get_field('page_callout');
			?>
			<h2 class="headline"><?php echo $page_headline; ?></h2>
			<h3 class="callout"><?php echo $page_callout; ?></h3>
			<?php if (have_rows('rows')):
					while(have_rows('rows')):the_row();
					?>
					<div class="row">
						<?php $cols = count(get_sub_field('columns'));
						if(have_rows('columns')):
							$col_cnt = 0;
							while(have_rows('columns')):the_row(); 
							$col_cnt++;
							$col_class = '';
							$content = get_sub_field('column');
							if($cols> 1){
								$col_class='columns-6';
							}
							?>
							<div class="col <?php echo $col_class; ?>" >
								<?php echo $content; ?>
							</div>
					
						<?php endwhile; endif; ?>
					</div>
			<?php endwhile; endif;?>
		<!-- </div> -->
	</div>

</main><!-- End of Content -->

<?php get_footer(); ?>
