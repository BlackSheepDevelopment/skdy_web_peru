<?php /* Template Name: Mi cuenta */

set_query_var( 'ENTRY', 'account' );

get_header(); ?>
<?php if ( is_user_logged_in() ):
	if ( have_posts() ) {
		while ( have_posts() ) {
			the_post();
			the_content();
		}
	}
	?>
<?php else: ?>
    <div id="main-container">
        <h1><?php the_title(); ?></h1>
		<?php
		if ( have_posts() ) {
			while ( have_posts() ) {
				the_post();
				the_content();
			}
		}
		?>
    </div>
<?php endif;
get_footer();
