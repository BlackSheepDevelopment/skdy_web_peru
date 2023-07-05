<?php $link = get_sub_field( 'link' ); ?>
<section
        class="container align-<?php the_sub_field( 'align' ); ?> <?php echo $link ? '' : 'no-link' ?> color-<?php the_sub_field( 'color' ); ?>">
	<?php if ( $link ): ?>
    <a href="<?php echo $link['url'] ?>" target="<?php echo $link['target'] ?>">
		<?php endif; ?>
        <picture>
			<?php $background = get_sub_field( 'background' ); ?>
            <source srcset="<?php echo $background['desktop']['url'] ?>" media="(min-width: 800px)">
            <img src="<?php echo $background['mobile']['url'] ?>" alt="<?php echo $background['desktop']['alt'] ?>">
        </picture>
        <div class="content">
			<?php $image = get_sub_field( 'image' );
			if ( $image ): ?>
                <img src="<?php echo $image['url'] ?>" alt="<?php echo $image['alt'] ?>">
			<?php endif; ?>
			<?php $title = get_sub_field( 'title' );
			if ( $title ): ?>
                <h1><?php echo $title ?></h1>
			<?php endif; ?>
			<?php $text = get_sub_field( 'text' );
			if ( $text ): ?>
                <p><?php echo $text ?></p>
			<?php endif; ?>
			<?php if ( $link ): ?>
                <span class="btn"><?php echo $link['title'] ?></span>
			<?php endif; ?>
        </div>
		<?php if ( $link ): ?>
    </a>
<?php endif; ?>
</section>