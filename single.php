<?php set_query_var( 'ENTRY', 'singleFeed' );

get_header(); ?>
    <div id="main-container">
        <div class="header-image">
			<?php $header_image = get_field( 'header' ) ?>
            <img src="<?php echo $header_image['url'] ?>" alt="<?php echo $header_image['alt'] ?>">
        </div>
        <div class="feed-info">
            <h1><?php the_title() ?></h1>
            <div class="feed-date"><?php echo date_i18n( 'j \d\e F, Y' ) ?></div>
            <div class="sep"></div>
        </div>
		<?php if ( have_rows( 'blocks' ) ): ?>
            <div class="blocks">
				<?php while ( have_rows( 'blocks' ) ): the_row();
					if ( get_row_layout() == 'text' ): ?>
                        <div class="block text">
							<?php the_sub_field( 'text' ); ?>
                        </div>
					<?php elseif ( get_row_layout() == 'gallery' ): ?>
                        <div class="block gallery">
							<?php while ( have_rows( 'gallery' ) ): the_row();
								$image = get_sub_field( 'image' ); ?>
                                <div class="image">
                                    <img src="<?php echo $image['url'] ?>" alt="<?php echo $image['alt'] ?>">
                                </div>
							<?php endwhile; ?>
                        </div>
					<?php endif; endwhile; ?>
            </div>
		<?php endif; ?>
        <div class="share-on">
            <div class="sep"></div>
            <div>Share on</div>
            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" class="btn-share" target="_blank">
                <img src="<?php echo get_stylesheet_directory_uri() . '/uploads/icon-fb.svg' ?>" alt="Facebook">
            </a>
        </div>
    </div>
<?php get_footer();
