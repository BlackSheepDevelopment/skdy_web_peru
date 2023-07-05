<?php /* Template Name: Selector */

set_query_var( 'ENTRY', 'selector' );

get_header(); ?>
    <div id="main-container" class="full-width">
        <section class="questions">
			<?php $background = get_field( 'background' ) ?>
            <picture class="background">
                <source media="(min-width: 800px)" srcset="<?php echo $background['desktop']['url'] ?>">
                <img src="<?php echo $background['mobile']['url'] ?>" alt="<?php echo $background['mobile']['alt'] ?>">
            </picture>
            <article class="start">
                <div class="content">
					<?php $start_image = get_field( 'start_image' ) ?>
                    <img src="<?php echo $start_image['url'] ?>" alt="<?php echo $start_image['alt'] ?>">
                    <div class="title"><?php the_field( 'start_title' ); ?></div>
                    <div class="btn"><?php _e( 'Comenzar', 'skullcandy' ) ?></div>
                </div>
            </article>
			<?php $step = 0;
			$total      = count( get_field( 'questions' ) );
			while ( have_rows( 'questions' ) ):
				the_row();
				$step ++; ?>
                <article class="question question-<?php echo $step ?>" style="display: none">
                    <div class="content">
                        <div class="step">Paso <?php echo $step ?> de <?php echo $total ?></div>
                        <div class="title"><?php the_sub_field( 'title' ); ?></div>
                        <br>
                        <div class="options">
							<?php while ( have_rows( 'options' ) ): the_row() ?>
                                <div class="btn"><?php the_sub_field( 'title' ); ?></div>
							<?php endwhile; ?>
                        </div>
                    </div>
                </article>
			<?php endwhile; ?>
        </section>
        <section class="products" style="display: none;">
			<?php while ( have_rows( 'products' ) ):
				the_row(); ?>
				<?php $answers = '';
				while ( have_rows( 'answers' ) ) {
					the_row();
					$answers .= get_sub_field( 'option' );
				} ?>
                <article class="product" id="<?php echo md5( $answers ) ?>" style="display: none">
                    <div class="content">
                        <div class="left">
                            <div class="image">
                                <img src="<?php the_sub_field( 'image' ); ?>" alt="<?php the_sub_field( 'name' ); ?>"
                                     class="thumbnail">
                                <img src="<?php echo get_stylesheet_directory_uri() . '/uploads/shadow.png' ?>"
                                     alt="shadow" class="shadow">
                            </div>
                        </div>
                        <div class="right">
                            <div class="title"><?php the_sub_field( 'name' ); ?></div>
                            <div class="description"><?php the_sub_field( 'description' ); ?></div>
							<?php $product_id = get_sub_field( 'product_id' );
							$_product         = new WC_Product( $product_id ); ?>
                            <div class="price"><?php echo $_product->get_price_html() ?></div>
                            <br>
                            <a href="<?php echo $_product->get_permalink() ?>" class="btn">
								<?php _e( 'Comprar ahora', 'skullcandy' ) ?>
                            </a>
                            <div class="options">
								<?php while ( have_rows( 'answers' ) ): the_row() ?>
                                    <div class="option">
                                        <img src="<?php echo get_stylesheet_directory_uri() . '/uploads/checkmark.png' ?>"
                                             alt="checkmark">
                                        &nbsp;
										<?php the_sub_field( 'option' ); ?>
                                    </div>
								<?php endwhile; ?>
                            </div>
                        </div>
                    </div>
                </article>
			<?php endwhile; ?>
        </section>
    </div>
<?php get_footer();
