<div class="content-model">
	<?php while ( have_rows( 'images' ) ):
		the_row();
		$image = get_sub_field( 'image' );
		?>
        <picture class="image">
			<?php if ( $image['desktop'] ): ?>
                <source srcset="<?php echo $image['desktop']['url'] ?>" media="(min-width: 800px)">
			<?php endif; ?>
            <img src="<?php echo $image['mobile']['url'] ?>" alt="<?php echo $image['mobile']['alt'] ?>">
        </picture>
	<?php endwhile; ?>
</div>
