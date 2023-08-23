<?php /* Template Name: Inicio */

set_query_var( 'ENTRY', 'home' );

get_header();

$shop_notice = get_field( 'shop_notice', 'general' );
if ( $shop_notice['show'] && $shop_notice['text'] ): ?>
    <div class="shop-notice">
        <a <?php if ( $shop_notice['link'] ): ?>href="<?php echo $shop_notice['link'] ?>" <?php endif; ?>>
			<?php echo $shop_notice['text'] ?>
        </a>
    </div>
<?php endif; ?>
    <div class="main-container`">
		<?php if ( have_rows( 'header' ) ): ?>
            <div id="home-grid">
                <source srcset="<?php echo get_template_directory_uri() ?>/assets/MAIN_BANNER_MOBILE.png"
                        media="(max-width: 550px)"/>
                <img src="<?php echo get_template_directory_uri() ?>/assets/MAIN_BANNER_WEB_DESK.png" alt="Home Grid"
                     class="home-grid">
            </div>
		<?php endif; ?>
		<?php if ( have_rows( 'banners' ) ):
			while ( have_rows( 'banners' ) ): the_row(); ?>
				<?php if ( get_sub_field( 'image_full' ) ): ?>
                    <div class="full-width">
						<?php $full = get_sub_field( 'image_full' ); ?>
                        <a href="<?php echo $full['link']; ?>">
                            <picture>
								<?php $img = $full['image']; ?>
                                <source srcset="<?php echo $img['desktop']['url'] ?>" media="(min-width: 551px)"/>
                                <img src="<?php echo $img['mobile']['url'] ?>"
                                     alt="<?php echo $img['mobile']['alt'] ?>">
                            </picture>
                        </a>
                    </div>
				<?php endif; ?>
			<?php endwhile;
		endif; ?>
		<?php if ( have_rows( 'gallery' ) ): ?>
            <div id="gallery">
				<?php while ( have_rows( 'gallery' ) ): the_row(); ?>
                    <a href="<?php the_sub_field( 'link' ); ?>" class="media">
                        <picture>
							<?php $img = get_sub_field( 'image' ); ?>
                            <source srcset="<?php echo $img['desktop']['url'] ?>" media="(min-width: 551px)"/>
                            <img src="<?php echo $img['mobile']['url'] ?>"
                                 alt="<?php echo $img['mobile']['alt'] ?>">
                        </picture>
						<?php $hover = get_sub_field( 'hover' );
						if ( $hover ): ?>
                            <img src="<?php echo $hover['url'] ?>" alt="<?php echo $hover['alt'] ?>" class="hover">
						<?php endif; ?>
                    </a>
				<?php endwhile; ?>
            </div>
		<?php endif; ?>


    </div>
<?php get_footer();
