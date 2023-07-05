<div class="content-blade">
    <div class="top">
		<?php $image = get_sub_field( 'image_top' ); ?>
        <picture>
            <source srcset="<?php echo $image['desktop']['url'] ?>" media="(min-width: 800px)">
            <img src="<?php echo $image['mobile']['url'] ?>" alt="<?php echo $image['mobile']['alt'] ?>">
        </picture>
    </div>
    <div class="text"><?php the_sub_field( 'text' ); ?></div>
    <div class="sign">
		<?php $image = get_sub_field( 'image' ); ?>
        <picture>
            <source srcset="<?php echo $image['desktop']['url'] ?>" media="(min-width: 800px)">
            <img src="<?php echo $image['mobile']['url'] ?>" alt="<?php echo $image['mobile']['alt'] ?>">
        </picture>
    </div>
</div>
