<?php if ( have_rows( 'storytelling' ) ): ?>
    <div class="product-storytelling">
		<?php while ( have_rows( 'storytelling' ) ):
			the_row();
			$bg_color = get_sub_field( 'background_color' );
			$layout   = get_sub_field( 'content' )[0]['acf_fc_layout'];
			?>
            <section class="layout-<?php echo $layout ?>"
				<?php if ( $bg_color ): ?>
                    style="background-color: <?php echo $bg_color ?>"
				<?php endif; ?>
            >
				<?php $background = get_sub_field( 'background' );
				if ( $background['mobile'] ): ?>
                    <picture class="background">
                        <source srcset="<?php echo $background['desktop']['url'] ?>" media="(min-width: 800px)">
                        <img src="<?php echo $background['mobile']['url'] ?>"
                             alt="<?php echo $background['mobile']['alt'] ?>">
                    </picture>
				<?php endif;
				while ( have_rows( 'content' ) ) {
					the_row();
					get_template_part( 'content/product', 'storytelling-' . get_row_layout() );
				} ?>
            </section>
		<?php endwhile; ?>
    </div>
<?php endif;
