<footer>
    <section id="subscribe">
        <div class="container">
            <h5>INSCRÍBEME</h5>
            <p>Se el primero en realizar un pedido anticipado de un nuevo producto, escuchar acerca de ofertas y captar
                nuestros próximos conciertos en vivo y episodios de podcasts.</p>
            <label for="subscribe_email" class="sr-only"></label>
            <form action="" class="form">
                <input type="email" id="subscribe_email" placeholder="Correo electrónico">
                <button></button>
            </form>
        </div>
    </section>
    <section class="info">
        <div class="container">
			<?php while ( have_rows( 'menus', 'footer' ) ): the_row() ?>
                <article>
                    <h4><?php the_sub_field( 'title' ); ?></h4>
                    <ul>
						<?php while ( have_rows( 'links' ) ): the_row() ?>
                            <li>
								<?php $link = get_sub_field( 'link' ); ?>
                                <a href="<?php echo $link['url']; ?>"
                                   target="<?php echo $link['target'] ?>"><?php echo $link['title'] ?></a>
                            </li>
						<?php endwhile; ?>
                    </ul>
                </article>
			<?php endwhile; ?>
            <article class="social-links">
                <ul>
					<?php while ( have_rows( 'social_networks', 'footer' ) ): the_row() ?>
                        <li>
							<?php $icon = get_sub_field( 'icon' ); ?>
                            <a href="<?php the_sub_field( 'link' ); ?>" title="<?php echo $icon['label'] ?>">
								<?php get_template_part( 'content/footer', $icon['value'] ); ?>
                            </a>
                        </li>
					<?php endwhile; ?>
                </ul>
            </article>
        </div>
    </section>
    <div class="base">
        <div class="container">
            <div class="links">
                <a href="#">Política de privacidad</a>
                <a href="<?php echo get_permalink( get_page_by_path( 'libro-de-reclamaciones' ) ) ?>" class="icon-link">
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                         x="0px"
                         y="0px"
                         fill="#969696"
                         viewBox="0 0 412.72 412.72" style="enable-background:new 0 0 412.72 412.72;"
                         xml:space="preserve">
                        <g>
                            <g>
                                <path d="M404.72,82.944c-0.027,0-0.054,0-0.08,0h0h-27.12v-9.28c0.146-3.673-2.23-6.974-5.76-8
                                    c-18.828-4.934-38.216-7.408-57.68-7.36c-32,0-75.6,7.2-107.84,40c-32-33.12-75.92-40-107.84-40
                                    c-19.464-0.048-38.852,2.426-57.68,7.36c-3.53,1.026-5.906,4.327-5.76,8v9.2H8c-4.418,0-8,3.582-8,8v255.52c0,4.418,3.582,8,8,8
                                    c1.374-0.004,2.724-0.362,3.92-1.04c0.8-0.4,80.8-44.16,192.48-16h1.2h0.72c0.638,0.077,1.282,0.077,1.92,0
                                    c112-28.4,192,15.28,192.48,16c2.475,1.429,5.525,1.429,8,0c2.46-1.42,3.983-4.039,4-6.88V90.944
                                    C412.72,86.526,409.139,82.944,404.72,82.944z M16,333.664V98.944h19.12v200.64c-0.05,4.418,3.491,8.04,7.909,8.09
                                    c0.432,0.005,0.864-0.025,1.291-0.09c16.55-2.527,33.259-3.864,50-4c23.19-0.402,46.283,3.086,68.32,10.32
                                    C112.875,307.886,62.397,314.688,16,333.664z M94.32,287.664c-14.551,0.033-29.085,0.968-43.52,2.8V79.984
                                    c15.576-3.47,31.482-5.241,47.44-5.28c29.92,0,71.2,6.88,99.84,39.2l0.24,199.28C181.68,302.304,149.2,287.664,94.32,287.664z
                                     M214.32,113.904c28.64-32,69.92-39.2,99.84-39.2c15.957,0.047,31.863,1.817,47.44,5.28v210.48
                                    c-14.354-1.849-28.808-2.811-43.28-2.88c-54.56,0-87.12,14.64-104,25.52V113.904z M396.64,333.664
                                    c-46.496-19.028-97.09-25.831-146.96-19.76c22.141-7.26,45.344-10.749,68.64-10.32c16.846,0.094,33.663,1.404,50.32,3.92
                                    c4.368,0.663,8.447-2.341,9.11-6.709c0.065-0.427,0.095-0.859,0.09-1.291V98.944h19.12L396.64,333.664z"/>
                            </g>
                        </g>
                    </svg>
                    <span>Libro de reclamaciones</span>
                </a>
            </div>
            <div class="copyright">© <?php echo date( 'Y' ) ?> Skullcandy Todos los derechos reservados</div>
			<div class="payment-methods">
				<?php $payments = get_field( 'payment_methods', 'footer' ); ?>
				<img src="<?php echo $payments['url'] ?>" alt="<?php echo $payments['alt'] ?>">
			</div>
        </div>
    </div>
</footer>
<?php get_template_part( 'content/nav', 'menu-mobile' );
if ( is_product() ) :
	global $product;
	if ( $product->is_type( 'variable' ) ) :
		$layout = get_query_var( 'LAYOUT' );

		$background = get_field( 'gallery' );
		$gallery    = array();
		foreach ( $background as $bg ) {
			$image     = $bg['image'];
			$gallery[] = array(
				'mobile'  => $image['mobile']['url'],
				'desktop' => $image['desktop']['url']
			);
		}

		$galleries = array();

		foreach ( get_field( 'media' ) as $media ) {
			$background = $media['gallery'];
			$_gallery   = array();

			foreach ( $background as $bg ) {
				$image      = $bg['image'];
				$_gallery[] = array(
					'mobile'  => $image['mobile']['url'],
					'desktop' => $image['desktop']['url']
				);
			}

			$galleries[] = array(
				'background' => $media['background'],
				'images'     => $_gallery
			);
		}

		$swatches   = array();
		$variations = $product->get_available_variations();
		foreach ( $variations as $variation ) {
			$swatches[] = $variation['image']['url'];
		} ?>
        <script>
            window.gallery_images = <?php echo json_encode( $gallery ); ?>;
            window.galleries = <?php echo json_encode( $galleries ) ?>;
            window.swatches_images = <?php echo json_encode( $swatches ); ?>;
            window.product_layout = '<?php echo $layout ?>';
            jQuery("#product-header .container .summary .extra-links a").click(function (event) {
                event.preventDefault();
                var id = jQuery(this).attr('href');
                jQuery('html, body').animate({
                    scrollTop: jQuery(id).offset().top
                }, 1000);
            });
        </script>
	<?php endif;
endif;
wp_footer() ?>
</body>
</html>
