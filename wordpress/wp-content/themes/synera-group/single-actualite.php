<?php
get_header();
the_post();

$title_en    = get_post_meta(get_the_ID(), 'title_en', true) ?: get_the_title();
$cat_fr      = get_post_meta(get_the_ID(), 'category_fr', true);
$cat_en      = get_post_meta(get_the_ID(), 'category_en', true) ?: $cat_fr;
$cover       = get_post_meta(get_the_ID(), 'cover_image_url', true);
$reading_time = get_post_meta(get_the_ID(), 'reading_time', true);
$content_en  = get_post_meta(get_the_ID(), 'content_en', true);
?>

<article class="mx-auto max-w-3xl px-5 py-14 sm:px-8 sm:py-20">
	<a href="<?php echo esc_url(home_url('/actualites/')); ?>" class="inline-flex items-center gap-2 text-sm font-semibold text-primary hover:underline">
		<?php synera_icon('arrow-left', 'h-4 w-4'); ?>
		<?php t('Retour aux actualités', 'Back to insights'); ?>
	</a>

	<?php if ($cat_fr) : ?>
		<span class="mt-6 inline-flex rounded-full bg-primary-50 px-3 py-1 text-xs font-semibold uppercase text-primary dark:bg-primary-500/10"><?php t($cat_fr, $cat_en); ?></span>
	<?php endif; ?>

	<h1 class="mt-4 font-display text-3xl font-bold text-ink-900 dark:text-white sm:text-4xl">
		<?php t(get_the_title(), $title_en); ?>
	</h1>

	<div class="mt-4 flex flex-wrap items-center gap-4 text-sm text-ink-400">
		<span><?php t('Équipe SYNERA Group', 'SYNERA Group Team'); ?></span>
		<span class="flex items-center gap-1.5"><?php synera_icon('calendar', 'h-4 w-4'); ?><?php echo esc_html(get_the_date('j F Y')); ?></span>
		<?php if ($reading_time) : ?>
			<span class="flex items-center gap-1.5">
				<?php synera_icon('clock', 'h-4 w-4'); ?>
				<?php echo esc_html($reading_time); ?> <?php t('de lecture', 'read'); ?>
			</span>
		<?php endif; ?>
	</div>

	<?php if ($cover) : ?>
		<div class="mt-8 aspect-[16/9] overflow-hidden rounded-2xl shadow-soft">
			<img src="<?php echo esc_url($cover); ?>" alt="" class="h-full w-full object-cover" />
		</div>
	<?php elseif (has_post_thumbnail()) : ?>
		<div class="mt-8 aspect-[16/9] overflow-hidden rounded-2xl shadow-soft">
			<?php the_post_thumbnail('synera-cover', ['class' => 'h-full w-full object-cover']); ?>
		</div>
	<?php endif; ?>

	<div class="prose prose-ink mt-10 max-w-none dark:prose-invert" data-lang="fr">
		<?php the_content(); ?>
	</div>
	<div class="prose prose-ink mt-10 max-w-none dark:prose-invert" data-lang="en">
		<?php echo $content_en; // phpcs:ignore -- sanitized with wp_kses_post on save. ?>
	</div>
</article>

<?php get_template_part('template-parts/cta-band'); ?>

<?php get_footer(); ?>
