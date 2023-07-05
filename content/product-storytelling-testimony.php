<div class="list-testimonies">
	<?php foreach ( get_sub_field( 'content' ) as $content ): ?>
        <div class="content-testimony">
            <div class="text"><?php echo $content['text']; ?></div>
            <div class="author"><?php echo $content['author']; ?></div>
        </div>
	<?php endforeach; ?>
</div>
