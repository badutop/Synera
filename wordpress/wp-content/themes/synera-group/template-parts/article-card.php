<?php
/** @var WP_Post $post_obj */
$post_obj   = $args['post'];
$excerpt_en = get_post_meta($post_obj->ID, 'excerpt_en', true);
$cat_fr     = get_post_meta($post_obj->ID, 'category_fr', true);
$cat_en     = get_post_meta($post_obj->ID, 'category_en', true);
$cover      = get_post_meta($post_obj->ID, 'cover_image_url', true);
$permalink  = get_permalink($post_obj);
$index      = $args['index'] ?? 0;
?>
<a href="<?php echo esc_url($permalink); ?>" class="reveal group block overflow-hidden rounded-2xl border border-ink-100 bg-white shadow-card transition hover:-translate-y-1 dark:border-white/10 dark:bg-white/[0.03]" style="transition-delay:<?php echo esc_attr($index * 0.1); ?>s">
	<div class="aspect-[16/10] overflow-hidden">
		<?php if ($cover) : ?>
			<img src="<?php echo esc_url($cover); ?>" alt="" class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105" />
		<?php elseif (has_post_thumbnail($post_obj)) : ?>
			<?php echo get_the_post_thumbnail($post_obj, 'synera-card', ['class' => 'h-full w-full object-cover transition-transform duration-500 group-hover:scale-105']); ?>
		<?php endif; ?>
	</div>
	<div class="p-6">
		<?php if ($cat_fr) : ?>
			<span class="inline-flex rounded-full bg-primary-50 px-3 py-1 text-xs font-semibold uppercase text-primary dark:bg-primary-500/10"><?php t($cat_fr, $cat_en ?: $cat_fr); ?></span>
		<?php endif; ?>
		<h3 class="mt-3 font-display text-lg font-semibold text-ink-900 group-hover:text-primary dark:text-white">
			<?php t(get_the_title($post_obj), get_post_meta($post_obj->ID, 'title_en', true) ?: get_the_title($post_obj)); ?>
		</h3>
		<p class="mt-2 line-clamp-2 text-sm text-ink-400">
			<?php t(get_the_excerpt($post_obj), $excerpt_en ?: get_the_excerpt($post_obj)); ?>
		</p>
		<div class="mt-4 flex items-center gap-2 text-xs text-ink-400">
			<?php synera_icon('calendar', 'h-3.5 w-3.5'); ?>
			<span><?php echo esc_html(get_the_date('j F Y', $post_obj)); ?></span>
		</div>
	</div>
</a>
