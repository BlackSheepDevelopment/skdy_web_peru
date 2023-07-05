<div class="content-feature">
    <h3 class="title"><?php the_sub_field( 'title' ); ?></h3>
    <p class="text"><?php the_sub_field( 'text' ); ?></p>
</div>
<div class="list-features">
	<?php while ( have_rows( 'features' ) ): the_row(); ?>
        <div class="feature">
			<?php $icon = get_sub_field( 'icon' ); ?>
            <img src="<?php echo $icon['url'] ?>" alt="<?php echo $icon['alt'] ?>">
            <h5 class="title"><?php the_sub_field( 'title' ); ?></h5>
            <p class="text"><?php the_sub_field( 'text' ); ?></p>
        </div>
	<?php endwhile; ?>
</div>
