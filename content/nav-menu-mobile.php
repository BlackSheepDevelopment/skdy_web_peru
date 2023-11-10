<?php if ( have_rows( 'menu', 'mega_menu' ) ): ?>
    <div id="menu-mobile">
        <div class="menu">
            <section class="container">
                <article>
                    <a href="<?php echo get_home_url() ?>" class="header">Inicio</a>
                </article>
                <article>
                    <?php $ofertas_page = get_page_by_title( 'Ofertas' );
                          $ofertas_id = $ofertas_page -> ID; ?>
                    <a href="https://skullcandy.com.pe/shop/ofertas" class="header header-ofertas">SKULLDAYS</a>
                </article>
                <article>
                    <a href="<?php echo get_permalink(wc_get_page_id( 'shop' )); ?>" class="header">TIENDA</a>
                </article>
                <article>
                    <a href="#" class="header dropdown">
                        <span class="title">CATEGORÍAS</span>
                    </a>
                    <ul>
						<?php while ( have_rows( 'menu', 'mega_menu' ) ): the_row() ?>
                            <li>
								<?php $header = get_sub_field( 'header' ); ?>
                                <a href="<?php echo $header['link'] ?>" class="header dropdown">
                                    <span class="title"><?php echo $header['title'] ?></span>
                                </a>
								<?php if ( have_rows( 'links' ) ): ?>
                                    <ul>
										<?php while ( have_rows( 'links' ) ): the_row() ?>
                                            <li>
												<?php $link = get_sub_field( 'link' ); ?>
                                                <a href="<?php echo $link['url'] ?>"><?php echo $link['title'] ?></a>
                                            </li>
										<?php endwhile; ?>
                                    </ul>
								<?php endif; ?>
                            </li>
						<?php endwhile; ?>
                    </ul>
                </article>
                <article>
                    <a href="#" class="header dropdown">
                        <span class="title"><?php _e( 'Inside Skullcandy', 'skullcandy' ) ?></span>
                    </a>
					<?php while ( have_rows( 'inside_menu', 'mega_menu' ) ): the_row() ?>
                        <ul class="inside">
                            <li>
								<?php $link = get_sub_field( 'link' ); ?>
                                <a href="<?php echo $link['url'] ?>">
									<?php $image = get_sub_field( 'image' ); ?>
                                    <img src="<?php echo $image['mobile']['url'] ?>"
                                         alt="<?php echo $image['mobile']['alt'] ?>"
                                         class="image">
                                    <h2><?php echo $link['title'] ?></h2>
                                </a>
                            </li>
                        </ul>
					<?php endwhile; ?>
                </article>
                <article>
                    <a href="#" class="header dropdown">
                        <span class="title"><?php _e( 'Soporte', 'skullcandy' ) ?></span>
                    </a>
                    <ul>
						<?php while ( have_rows( 'support', 'mega_menu' ) ): the_row() ?>
                            <li>
								<?php $link = get_sub_field( 'link' ); ?>
                                <a href="<?php echo $link['url'] ?>" class="header"
                                   target="<?php echo $link['target'] ?>"><?php echo $link['title'] ?></a>
                            </li>
						<?php endwhile; ?>
                    </ul>
                </article>
                <article>
                    <a href="<?php the_permalink( get_page_by_path( 'comparar' ) ); ?>" class="header">
                        <span class="title"><?php _e( 'Comparar', 'skullcandy' ) ?></span>
                    </a>
                </article>
                <article class="no-border">
                    <a href="<?php echo get_account_url(); ?>" class="nav-icon">
						<?php get_template_part( 'content/nav', 'icon-account-light' ); ?>
                        <span class="title"><?php _e( 'Mi cuenta', 'skullcandy' ) ?></span>
                    </a>
                </article>
                <article class="no-border">
                    <div class="nav-icon">
						<?php get_template_part( 'content/nav', 'icon-search-light' ); ?>
						<?php $shop_url = get_permalink( wc_get_page_id( 'shop' ) ); ?>
                        <form action="<?php echo $shop_url ?>" method="get">
                            <input type="search" name="s" placeholder="<?php _e( 'Búsqueda', 'skullcandy' ) ?>">
                        </form>
                    </div>
                </article>
            </section>
        </div>
    </div>
<?php endif;
