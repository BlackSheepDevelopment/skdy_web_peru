<?php set_query_var( 'ENTRY', 'mood' );
get_header();
$header = get_field( 'header' ); ?>
    <?php $img = $header['image']; ?>
    <section class="mood-header">
        <picture class="background">
            <source srcset="<?php echo $img['desktop']['url'] ?>" media="(min-width: 800px)">
            <img src="<?php echo $img['mobile']['url'] ?>"
                 alt="<?php echo $img['mobile']['alt'] ?>">
        </picture>
        <div class="btn-wrap">
            <div class="btn" style="background: <?php echo $header['circle_color'] ?>"></div>
        </div>
    </section>
<?php if ( have_rows( 'storytelling' ) ): ?>
    <section class="storytelling">
		<?php while ( have_rows( 'storytelling' ) ):
			the_row();
			$bg_color   = get_sub_field( 'background_color' );
			$layout     = get_sub_field( 'content' )[0]['acf_fc_layout'];
			$background = get_sub_field( 'background' ); ?>
            <section class="layout-<?php echo $layout ?> <?php echo $background ? '' : 'no-bg' ?>"
				<?php if ( $bg_color ): ?>
                    style="background-color: <?php echo $bg_color ?>"
				<?php endif; ?>
            >
				<?php if ( $background['mobile'] ): ?>
                    <picture class="background">
                        <source srcset="<?php echo $background['desktop']['url'] ?>" media="(min-width: 800px)">
                        <img src="<?php echo $background['mobile']['url'] ?>"
                             alt="<?php echo $background['mobile']['alt'] ?>">
                    </picture>
				<?php endif;
				while ( have_rows( 'content' ) ) {
					the_row();
					get_template_part( 'content/mood', 'storytelling-' . get_row_layout() );
				} ?>
            </section>
		<?php endwhile; ?>
    </section>
<?php endif; ?>
    <section class="shop-bundle" style="background-color: <?php the_field( 'primary_color' ); ?>">
		<?php $shop = get_field( 'shop' ); ?>
        <div class="container">
            <h1><?php echo $shop['title'] ?></h1>
			<?php $link = $shop['product']; ?>
            <div class="image">
                <a href="<?php echo $link['url'] ?>" target="<?php echo $link['target'] ?>">
					<?php $image = $shop['image'] ?>
                    <img src="<?php echo $image['url'] ?>" alt="<?php echo $image['alt'] ?>">
                </a>
            </div>
            <div class="btn-wrap">
                <a href="<?php echo $link['url'] ?>" target="<?php echo $link['target'] ?>" class="btn">
					<?php echo $link['title'] ?>
                </a>
            </div>
        </div>
    </section>
<?php get_footer();
