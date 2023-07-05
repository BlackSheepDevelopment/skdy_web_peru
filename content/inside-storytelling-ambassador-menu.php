<div class="container">
    <h1 class="title"><?php the_sub_field( 'title' ); ?></h1>
    <nav>
		<?php foreach ( get_field( 'storytelling' ) as $block ):
			if ( $block['acf_fc_layout'] == 'ambassador' ): ?>
                <a href="#<?php echo sanitize_title( $block['title'] ) ?>">
					<?php echo $block['title'] ?>
                </a>
			<?php endif;
		endforeach; ?>
    </nav>
</div>