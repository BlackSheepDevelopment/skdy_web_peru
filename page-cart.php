<?php set_query_var( 'ENTRY', 'cart' );
get_header(); ?>

    <div id="main-container">
        <h1 class="text-center"><?php the_title(); ?></h1>
		<?php
		if ( have_posts() ) {
			while ( have_posts() ) {
				the_post();
				the_content();
			}
		}
		?>
    </div>

<?php get_footer();
