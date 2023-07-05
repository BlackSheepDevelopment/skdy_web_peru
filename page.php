<?php set_query_var( 'ENTRY', 'page' );
get_header(); ?>

    <div id="main-container">
        <h1><?php the_title(); ?></h1>
		<div class="content">
			<?php
			if ( have_posts() ) {
				while ( have_posts() ) {
					the_post();
					the_content();
				}
			}
			?>
        </div>
    </div>

<?php get_footer();
