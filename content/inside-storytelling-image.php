<section class="container <?php the_sub_field( 'type' ); ?>"
         style="background-color: <?php the_sub_field( 'color' ); ?>">
    <picture>
		<?php $image = get_sub_field( 'image' ); ?>
        <source srcset="<?php echo $image['desktop']['url'] ?>" media="(min-width: 800px)">
        <img src="<?php echo $image['mobile']['url'] ?>" alt="<?php echo $image['desktop']['alt'] ?>">
    </picture>
</section>