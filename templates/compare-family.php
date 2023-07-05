<?php /* Template Name: Compare family */

set_query_var( 'ENTRY', 'compare_family' );

get_header(); ?>
    <div id="main-container" class="full-width">
        <h1><?php the_field( 'title' ); ?></h1>
		<?php if ( have_rows( 'products' ) ): ?>
            <div class="container-scroll">
                <section class="products">
					<?php while ( have_rows( 'products' ) ): the_row() ?>
                        <article>
							<?php $link = get_sub_field( 'button' ) ?>
                            <a href="<?php echo $link['url'] ?>" target="<?php echo $link['target'] ?>">
                                <picture>
									<?php $image = get_sub_field( 'image' ) ?>
                                    <source srcset="<?php echo $image['desktop']['url'] ?>" media="(min-width: 800px)">
                                    <img src="<?php echo $image['mobile']['url'] ?>"
                                         alt="<?php echo $image['desktop']['alt'] ?>">
                                </picture>
                                <br>
								<?php $logo = get_sub_field( 'logo' ) ?>
                                <img src="<?php echo $logo['url'] ?>" alt="<?php echo $logo['alt'] ?>" class="logo">
								<?php if ( get_sub_field( 'subtitle' ) ): ?>
                                    <div class="subtitle"><?php the_sub_field( 'subtitle' ); ?></div>
								<?php endif; ?>
                                <div class="content">
                                    <div class="title"><?php the_sub_field( 'title' ); ?></div>
                                    <div class="description"><?php the_sub_field( 'description' ); ?></div>
                                </div>
                                <div class="btn"><?php echo $link['title'] ?></div>
                            </a>
                        </article>
					<?php endwhile; ?>
                </section>
            </div>
		<?php endif; ?>
		<?php if ( have_rows( 'products_compare' ) ): ?>
            <div class="container-scroll">
                <section class="products compare">
					<?php while ( have_rows( 'products_compare' ) ): the_row() ?>
                        <article>
                            <div class="flipper">
                                <div class="front">
                                    <picture>
										<?php $header = get_sub_field( 'header' ) ?>
                                        <source srcset="<?php echo $header['desktop']['url'] ?>"
                                                media="(min-width: 800px)">
                                        <img src="<?php echo $header['mobile']['url'] ?>"
                                             alt="<?php echo $header['desktop']['alt'] ?>">
                                    </picture>
                                    <br>
                                    <div class="sub-title"><?php the_sub_field( 'subtitle' ); ?></div>
									<?php $logo = get_sub_field( 'logo' ) ?>
                                    <img src="<?php echo $logo['url'] ?>" alt="<?php echo $logo['alt'] ?>" class="logo">
                                    <div class="content">
                                        <div class="title"><?php the_sub_field( 'title' ); ?></div>
                                        <div class="description"><?php the_sub_field( 'description' ); ?></div>
                                    </div>
									<?php if ( have_rows( 'features' ) ): ?>
                                        <ul class="features">
											<?php while ( have_rows( 'features' ) ): the_row() ?>
                                                <li>
                                                    <picture>
														<?php $icon = get_sub_field( 'icon' ) ?>
                                                        <img src="<?php echo $icon['url'] ?>"
                                                             alt="<?php echo $icon['alt'] ?>">
                                                    </picture>
                                                    <span><?php the_sub_field( 'text' ); ?></span>
                                                </li>
											<?php endwhile; ?>
											<?php if ( get_sub_field( 'more_specs' ) ): ?>
                                                <li class="more-specs">
                                                    <picture>
														<?php get_template_part( 'content/svg', 'plus' ) ?>
                                                    </picture>
                                                    <span><?php _e( 'Más especificaciones', 'skullcandy' ) ?></span>
                                                </li>
											<?php endif; ?>
                                        </ul>
									<?php endif; ?>
									<?php $link = get_sub_field( 'button' ) ?>
                                    <a href="<?php echo $link['url'] ?>" target="<?php echo $link['target'] ?>"
                                       class="btn">
										<?php echo $link['title'] ?>
                                    </a>
                                </div>
                                <div class="back">
                                    <picture>
										<?php $header_back = get_sub_field( 'header_back' ) ?>
                                        <source srcset="<?php echo $header_back['desktop']['url'] ?>"
                                                media="(min-width: 800px)">
                                        <img src="<?php echo $header_back['mobile']['url'] ?>"
                                             alt="<?php echo $header_back['desktop']['alt'] ?>">
                                    </picture>
									<?php $logo = get_sub_field( 'logo' ) ?>
                                    <img src="<?php echo $logo['url'] ?>" alt="<?php echo $logo['alt'] ?>" class="logo">
                                    <div class="content">
                                        <pre><?php the_sub_field( 'more_specs' ); ?></pre>
                                    </div>
                                    <div class="btn-back">
										<?php get_template_part( 'content/svg', 'close' ) ?>
                                        <span><?php _e( 'Regresar', 'skullcandy' ) ?></span>
                                    </div>
                                    <a href="<?php echo $link['url'] ?>" target="<?php echo $link['target'] ?>"
                                       class="btn">
										<?php echo $link['title'] ?>
                                    </a>
                                </div>
                            </div>
                        </article>
					<?php endwhile; ?>
                </section>
            </div>
		<?php endif; ?>
		<?php if ( have_rows( 'banners' ) ): ?>
            <section class="banners">
				<?php while ( have_rows( 'banners' ) ): the_row(); ?>
                    <article class="banner <?php the_sub_field( 'color' ); ?> align-<?php the_sub_field( 'align' ); ?>">
						<?php $button = get_sub_field( 'button' ); ?>
                        <a href="<?php echo $button['url'] ?>" target="<?php echo $button['target'] ?>">
							<?php $background = get_sub_field( 'background' ) ?>
                            <picture>
                                <source media="(min-width: 800px)" srcset="<?php echo $background['desktop']['url'] ?>">
                                <img src="<?php echo $background['mobile']['url'] ?>"
                                     alt="<?php echo $background['mobile']['alt'] ?>">
                            </picture>
                            <div class="content">
                                <div class="container">
									<?php $image = get_sub_field( 'image' ) ?>
                                    <img src="<?php echo $image['url'] ?>" alt="<?php echo $image['alt'] ?>"
                                         class="logo">
                                    <h1><?php the_sub_field( 'title' ); ?></h1>
                                    <div class="text"><?php the_sub_field( 'text' ); ?></div>
                                    <div class="btn"><?php echo $button['title'] ?></div>
                                </div>
                            </div>
                        </a>
                    </article>
				<?php endwhile; ?>
            </section>
		<?php endif; ?>
    </div>
<?php get_footer();
