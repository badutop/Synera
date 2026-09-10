<?php get_header(); ?>

<section class="bg-ink-50 py-14 dark:bg-ink-800/20 sm:py-20">
	<div class="mx-auto max-w-content px-5 sm:px-8">
		<p class="text-sm font-semibold uppercase tracking-wide text-primary"><?php t('Actualités', 'Insights'); ?></p>
		<h1 class="mt-2 max-w-2xl font-display text-4xl font-bold text-ink-900 dark:text-white"><?php t('Analyses, méthodologie et actualités du groupe.', 'Analysis, methodology and group news.'); ?></h1>
	</div>
</section>

<section class="mx-auto max-w-content px-5 py-14 sm:px-8">
	<?php if (have_posts()) : ?>
		<div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
			<?php
			$i = 0;
			while (have_posts()) :
				the_post();
				get_template_part('template-parts/article-card', null, ['post' => get_post(), 'index' => $i]);
				$i++;
			endwhile;
			?>
		</div>
		<div class="mt-10">
			<?php the_posts_pagination(); ?>
		</div>
	<?php else : ?>
		<p class="text-ink-400"><?php t('Aucun article pour le moment.', 'No articles yet.'); ?></p>
	<?php endif; ?>
</section>

<?php get_template_part('template-parts/cta-band'); ?>

<?php get_footer(); ?>
