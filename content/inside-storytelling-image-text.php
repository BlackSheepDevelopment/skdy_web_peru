<section class="container align-<?php the_sub_field( 'align' ); ?> size-<?php the_sub_field( 'size' ); ?>">
    <article>
        <picture>
			<?php $image = get_sub_field( 'image' ); ?>
            <source srcset="<?php echo $image['desktop']['url'] ?>" media="(min-width: 800px)">
            <img src="<?php echo $image['mobile']['url'] ?>" alt="<?php echo $image['desktop']['alt'] ?>">
        </picture>
    </article>
    <article class="content">
        <div class="text">
			<?php the_sub_field( 'text' ); ?>
        </div>
    </article>
</section>