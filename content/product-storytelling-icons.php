<div class="container">
    <div class="content-icons">
		<?php while ( have_rows( 'list' ) ): the_row(); ?>
            <div class="item-icon">
				<?php $icon = get_sub_field( 'icon' ); ?>
                <img src="<?php echo $icon['url'] ?>" alt="<?php echo $icon['alt'] ?>">
                <span><?php the_sub_field( 'text' ); ?></span>
            </div>
		<?php endwhile; ?>
    </div>
</div>
