<section class="container">
	<?php while ( have_rows( 'feature' ) ): the_row() ?>
		<?php $link = get_sub_field( 'link' ) ?>
        <article class="feature">
            <a href="<?php echo $link['url'] ?>" target="<?php echo $link['target'] ?>">
				<?php $icon = get_sub_field( 'icon' ) ?>
                <img src="<?php echo $icon['url'] ?>" alt="<?php echo $icon['alt'] ?>">
                <div class="content">
					<?php $title = get_sub_field( 'title' );
					if ( $title ): ?>
                        <h1><?php echo $title ?></h1>
					<?php endif; ?>
					<?php $text = get_sub_field( 'text' );
					if ( $text ): ?>
                        <p><?php echo $text ?></p>
					<?php endif; ?>
                    <br>
                    <span><?php echo $link['title'] ?> &gt;</span>
                </div>
            </a>
        </article>
	<?php endwhile; ?>
</section>