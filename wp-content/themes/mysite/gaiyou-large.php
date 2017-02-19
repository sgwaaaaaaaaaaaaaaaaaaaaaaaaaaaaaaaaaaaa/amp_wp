<article <?php post_class( 'gaiyou-large' ); ?>>
<a href="<?php the_permalink(); ?>">

<div class="thumb" style="background-image: url(<?php echo mythumb( 'large', $post ); ?>)"></div>

<div class="text">
	<h1><?php the_title(); ?></h1>

	<div class="kiji-date">
	<i class="fa fa-clock-o"></i>

	<time datetime="<?php echo get_the_date( 'Y-m-d' ); ?>">
	投稿：<?php echo get_the_date( 'Y年m月d日' ); ?>
	</time>
	</div>

	<?php the_excerpt(); ?>
</div>

</a>
</article>