<div class="panel text-grid">
		<div class="container">
			<div class="row">
				<div class=""><!-- columns-10 offset-by-1 -->
					<?php if (have_rows('cta_grid_item')) :
							while(have_rows('cta_grid_item')) : the_row();
								$cta_title = get_sub_field('cta_title');
								$cta_text = get_sub_field('cta_text');
								$cta_link = get_sub_field('cta_link');
					?>

					<div class="columns-4">
						<div class="grid-item">
							<a href="<?php echo $cta_link; ?>">
								<p class="heading6"><?php echo $cta_title; ?></p>
								<p class="desc"><?php echo $cta_text; ?></p>
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
					</div>
				<?php endwhile; endif; ?>
				</div>
			</div>
		</div>
	</div>