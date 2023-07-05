<?php $rand_id = uniqid(); ?>
<section class="slider" id="<?php echo $rand_id ?>">
	<?php while ( have_rows( 'slide' ) ): the_row(); ?>
		<?php $link = get_sub_field( 'link' ); ?>
        <div class="slide">
			<?php if ( $link ): ?>
            <a href="<?php echo $link['url'] ?>" target="<?php echo $link['target'] ?>">
				<?php endif; ?>
                <picture>
					<?php $background = get_sub_field( 'background' ); ?>
                    <source srcset="<?php echo $background['desktop']['url'] ?>" media="(min-width: 800px)">
                    <img src="<?php echo $background['mobile']['url'] ?>"
                         alt="<?php echo $background['desktop']['alt'] ?>">
                </picture>
                <div class="content">
					<?php if ( get_sub_field( 'title' ) ): ?>
                        <h1><?php the_sub_field( 'title' ); ?></h1>
					<?php endif; ?>
					<?php if ( get_sub_field( 'text' ) ): ?>
                        <p><?php the_sub_field( 'text' ); ?></p>
					<?php endif; ?>
					<?php if ( $link ): ?>
                        <span class="btn"><?php echo $link['title'] ?></span>
					<?php endif; ?>
                </div>
				<?php if ( $link ): ?>
            </a>
		<?php endif; ?>
        </div>
	<?php endwhile; ?>
</section>
<div class="navbar" data-id="#<?php echo $rand_id ?>">
	<?php while ( have_rows( 'slide' ) ): the_row(); ?>
        <div class="slide">
            <picture>
				<?php $thumbnail = get_sub_field( 'thumbnail' ) ?>
                <img src="<?php echo $thumbnail['url'] ?>" alt="<?php echo $thumbnail['url']['alt'] ?>">
            </picture>
        </div>
	<?php endwhile; ?>
</div>