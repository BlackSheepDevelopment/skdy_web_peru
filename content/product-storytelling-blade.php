<div class="content-blade">
    <div class="logo">
		<?php $top = get_sub_field( 'image_top' );
		if ( $top ): ?>
            <img src="<?php echo $top['url'] ?>" alt="<?php echo $top['alt'] ?>">
		<?php else: ?>
            <img src="<?php echo get_stylesheet_directory_uri() . '/uploads/logo-white.png' ?>" alt="Skullcandy">
		<?php endif; ?>
    </div>
    <div class="text"><?php the_sub_field( 'text' ); ?></div>
    <div class="sign">
		<?php $image = get_sub_field( 'image' ); ?>
        <img src="<?php echo $image['url'] ?>" alt="<?php echo $image['alt'] ?>">
    </div>
</div>
