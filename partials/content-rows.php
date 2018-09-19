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
				if($cols > 1){
					$col_class='columns-6';
				}
				?>
				<div class="col <?php if(!is_single( 'films' )){ echo $col_class; } ?> <?php if(is_single( 'films' )){echo 'columns-5 offset-by-1 textsection';}?>" >
					<div class="content">
						<?php echo $content; ?>
					</div>
				</div>
		
			<?php endwhile; endif; ?>
		</div>
<?php endwhile; endif;?>