<?php get_header(); ?>

<section class="mx-auto max-w-content px-5 py-14 sm:px-8 sm:py-20">
	<?php while (have_posts()) : the_post(); ?>
		<h1 class="font-display text-4xl font-bold text-ink-900 dark:text-white"><?php the_title(); ?></h1>
		<div class="prose prose-ink mt-6 max-w-none dark:prose-invert"><?php the_content(); ?></div>
	<?php endwhile; ?>
</section>

<?php get_footer(); ?>
