<div class="container">
    <div class="content-banner align-<?php the_sub_field( 'position' ); ?> theme-<?php the_sub_field( 'color' ) ?>">
        <div class="content">
			<?php if ( get_sub_field( 'image' ) ):
				$image = get_sub_field( 'image' ); ?>
                <img src="<?php echo $image['url'] ?>" alt="<?php echo $image['alt'] ?>" class="image">
			<?php endif;
			if ( get_sub_field( 'title' ) ): ?>
                <h3 class="title"><?php the_sub_field( 'title' ); ?></h3>
			<?php endif;
			if ( get_sub_field( 'text' ) ): ?>
                <p class="text"><?php the_sub_field( 'text' ); ?></p>
			<?php endif;
			if ( get_sub_field( 'button' ) ):
				$button = get_sub_field( 'button' ); ?>
                <a href="<?php echo $button['url'] ?>" class="btn"><?php echo $button['title'] ?></a>
			<?php endif; ?>
        </div>
    </div>
</div>
