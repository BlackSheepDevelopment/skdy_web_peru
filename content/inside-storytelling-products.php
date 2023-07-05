<div class="container">
	<?php $title = get_sub_field( 'title' );
	if ( $title ): ?>
        <h3><?php echo $title ?></h3>
	<?php endif; ?>
    <div class="products">
		<?php $products = get_sub_field( 'products' );
		foreach ( $products as $product ):
			$name = get_the_title( $product ); ?>
            <article>
                <a href="<?php echo get_permalink( $product ) ?>">
                    <img src="<?php echo get_the_post_thumbnail_url( $product ) ?>"
                         alt="<?php echo $name ?>">
                    <div class="name"><?php echo $name ?></div>
                </a>
            </article>
		<?php endforeach; ?>
    </div>
</div>