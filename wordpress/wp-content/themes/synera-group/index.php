<?php get_header(); ?>

<section class="mx-auto max-w-content px-5 py-14 sm:px-8">
	<?php if (have_posts()) :
		while (have_posts()) :
			the_post(); ?>
			<article class="mb-10">
				<h1 class="font-display text-2xl font-bold text-ink-900 dark:text-white"><?php the_title(); ?></h1>
				<div class="prose prose-ink mt-4 max-w-none dark:prose-invert"><?php the_content(); ?></div>
			</article>
		<?php endwhile;
	else : ?>
		<p class="text-ink-400">Aucun contenu trouvé.</p>
	<?php endif; ?>
</section>

<?php get_footer(); ?>
