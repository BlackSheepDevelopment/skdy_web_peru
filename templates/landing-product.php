<?php /* Template Name: Landing product */

set_query_var( 'ENTRY', 'landing_product' );

get_header(); ?>
    <div id="main-container" class="full-width">
        <div class="heading">
            <picture>
				<?php $background = get_field( 'background' ); ?>
                <source srcset="<?php echo $background['desktop']['url'] ?>" media="(min-width: 800px)"/>
                <img src="<?php echo $background['mobile']['url'] ?>"
                     alt="<?php echo $background['mobile']['alt'] ?>">
            </picture>
            <div class="content">
                <h1><?php the_field( 'title' ); ?></h1>
                <div class="description"><?php the_field( 'description' ); ?></div>
            </div>
        </div>
        <div class="container">
			<?php while ( have_rows( 'content' ) ): the_row();
				$size = get_sub_field( 'size' ); ?>
                <div class="layout type-<?php echo get_row_layout() ?> size-<?php echo $size['width'] ?> <?php echo $size['responsive'] ? 'r-full' : '' ?>">
					<?php if ( get_row_layout() == 'product' ) {
						echo do_shortcode( '[products limit="1 columns="1" ids="' . get_sub_field( 'product' ) . '" ]' );
					} elseif ( get_row_layout() == 'image' ) {
						$link = get_sub_field( 'link' ); ?>
						<?php if ( $link ): ?>
                            <a href="<?php echo $link ?>">
						<?php endif; ?>
                        <picture>
							<?php $image = get_sub_field( 'image' ); ?>
                            <source srcset="<?php echo $image['desktop']['url'] ?>" media="(min-width: 800px)"/>
                            <img src="<?php echo $image['mobile']['url'] ?>"
                                 alt="<?php echo $image['mobile']['alt'] ?>">
                        </picture>
						<?php if ( $link ): ?>
                            </a>
						<?php endif; ?>
					<?php } ?>
                </div>
			<?php endwhile; ?>
            <div class="container__button">
                <a class="container__button__ref" href="<?php the_field('button'); ?>">
                    <button class="container__button__btn">
                        VISITA LA TIENDA
                    </button>   
                </a>
            </div>
        </div>
    </div>
<?php get_footer();
