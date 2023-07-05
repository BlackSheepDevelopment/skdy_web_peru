<?php set_query_var( 'ENTRY', 'feed' );

get_header();

$args = array(
	'post_type'     => 'post',
	'post_per_page' => - 1
);
$loop = new WP_Query( $args );
?>
    <div id="main-container">
		<?php
		if ( $loop->have_posts() ) :
			$idx = 0; ?>
            <div class="list-feeds">
				<?php while ( $loop->have_posts() ) : $loop->the_post();
					$idx ++;
					if ( $idx == 1 ): ?>
                        <div class="row">
					<?php endif; ?>
                    <div class="feed">
                        <a href="<?php the_permalink(); ?>">
                            <img src="<?php the_post_thumbnail_url( 'full' ); ?>" alt="<?php the_title() ?>">
                            <div class="overlay">
                                <span><?php the_title(); ?></span>
                            </div>
                        </a>
                    </div>
					<?php if ( $idx == 3 ):
                        $idx = 0; ?>
                        </div>
					<?php endif; endwhile ?>
            </div>
		<?php endif;
		wp_reset_postdata(); ?>
    </div>
<?php get_footer();
