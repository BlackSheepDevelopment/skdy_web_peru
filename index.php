<?php get_header(); ?>

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

<?php get_footer();
