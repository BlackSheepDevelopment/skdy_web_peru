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
    <div class="main-container">
		<?php if ( have_rows( 'header' ) ): ?>
            <div id="home-grid">
				<?php while ( have_rows( 'header' ) ):
					the_row(); ?>
                    <section data-href="<?php the_sub_field( 'link' ); ?>">
                        <div class="layer">
							<?php if ( get_sub_field( 'title' ) ): ?>
                                <h5><?php the_sub_field( 'title' ); ?></h5>
							<?php endif; ?>
							<?php if ( get_sub_field( 'text' ) ): ?>
                                <p><?php the_sub_field( 'text' ); ?></p>
							<?php endif; ?>
							<?php if ( have_rows( 'call_to_actions' ) ): ?>
                                <div class="cta-wrapper">
									<?php while ( have_rows( 'call_to_actions' ) ): the_row(); ?>
                                        <a href="<?php the_sub_field( 'cta_link' ); ?>"
                                           class="cta"><?php the_sub_field( 'cta_text' ); ?></a>
									<?php endwhile; ?>
                                </div>
							<?php endif; ?>
                        </div>
                        <picture>
							<?php $background = get_sub_field( 'background' ); ?>
                            <source srcset="<?php echo $background['desktop']['url'] ?>" media="(min-width: 551px)"/>
                            <img src="<?php echo $background['mobile']['url'] ?>"
                                 alt="<?php echo $background['mobile']['alt'] ?>">
                        </picture>
                    </section>
				<?php endwhile; ?>
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
