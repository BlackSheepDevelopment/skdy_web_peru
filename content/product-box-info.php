<?php while ( have_rows( 'product_box_info' ) ):
	the_row();
	$image = get_sub_field( 'image' ); ?>
    <div id="box-info" class="box-info">
        <div class="content">
			<?php while ( have_rows( 'content_info' ) ):
				the_row(); ?>
                <div class="info">
					<?php if ( get_row_layout() == 'link' ):
						$link = get_sub_field( 'link' ); ?>
                        <a href="<?php echo $link['url'] ?>"
                           target="<?php echo $link['target'] ?>">
							<?php echo $link['title'] ?>
                        </a>
					<?php elseif ( get_row_layout() == 'content' ): ?>
                        <div class="title"><?php the_sub_field( 'title' ); ?></div>
                        <p class="text"><?php the_sub_field( 'text' ); ?></p>
					<?php endif; ?>
                </div>
			<?php endwhile; ?>
        </div>
        <div class="image">
            <img src="<?php echo $image['url'] ?>" alt="<?php echo $image['alt'] ?>">
        </div>
    </div>
<?php endwhile;
