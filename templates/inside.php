<?php /* Template Name: Inside SKDY */

set_query_var( 'ENTRY', 'inside' );

get_header(); ?>

    <div id="main-container">
		<?php if ( have_rows( 'storytelling' ) ): ?>
            <div class="inside-storytelling">
				<?php while ( have_rows( 'storytelling' ) ): the_row(); ?>
                    <section class="layout-<?php echo get_row_layout() ?>">
						<?php get_template_part( 'content/inside', 'storytelling-' . get_row_layout() ); ?>
                    </section>
				<?php endwhile; ?>
            </div>
		<?php endif; ?>
    </div>
<?php get_footer();
