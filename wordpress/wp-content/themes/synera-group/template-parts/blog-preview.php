<?php
$latest = new WP_Query([
	'post_type'      => 'actualite',
	'posts_per_page' => 3,
	'orderby'        => 'date',
	'order'          => 'DESC',
]);
if (!$latest->have_posts()) {
	return;
}
?>
<section class="mx-auto max-w-content px-5 py-14 sm:px-8">
	<div class="flex flex-wrap items-end justify-between gap-6">
		<?php get_template_part('template-parts/section-heading', null, [
			'eyebrow_fr' => 'Actualités', 'eyebrow_en' => 'Insights',
			'title_fr'   => 'Nos derniers articles',
			'title_en'   => 'Our latest articles',
			'desc_fr'    => 'Analyses de marché, méthodologie et actualités du groupe.',
			'desc_en'    => 'Market analysis, methodology and group news.',
		]); ?>
		<a href="<?php echo esc_url(home_url('/actualites/')); ?>" class="whitespace-nowrap text-sm font-semibold text-primary hover:underline"><?php t('Toutes les actualités', 'All insights'); ?> →</a>
	</div>

	<div class="mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
		<?php
		$i = 0;
		while ($latest->have_posts()) :
			$latest->the_post();
			get_template_part('template-parts/article-card', null, ['post' => get_post(), 'index' => $i]);
			$i++;
		endwhile;
		wp_reset_postdata();
		?>
	</div>
</section>
