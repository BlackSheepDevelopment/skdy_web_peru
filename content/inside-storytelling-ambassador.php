<section id="<?php echo sanitize_title( get_sub_field( 'title' ) ) ?>"
         class="container align-<?php the_sub_field( 'align' ); ?> no-link">
    <picture>
		<?php $background = get_sub_field( 'background' ); ?>
        <source srcset="<?php echo $background['desktop']['url'] ?>" media="(min-width: 800px)">
        <img src="<?php echo $background['mobile']['url'] ?>" alt="<?php echo $background['desktop']['alt'] ?>">
    </picture>
    <div class="content">
		<?php $subtitle = get_sub_field( 'subtitle' );
		if ( $subtitle ): ?>
            <h4><?php echo $subtitle ?></h4>
		<?php endif; ?>
		<?php $title = get_sub_field( 'title' );
		if ( $title ): ?>
            <h1><?php echo $title ?></h1>
		<?php endif; ?>
		<?php $text = get_sub_field( 'text' );
		if ( $text ): ?>
            <p><?php echo $text ?></p>
		<?php endif; ?>
    </div>
</section>