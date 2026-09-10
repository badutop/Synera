<?php get_header(); ?>

<section class="mx-auto max-w-content px-5 py-14 sm:px-8 sm:py-20">
	<div class="grid items-center gap-14 lg:grid-cols-2">
		<div class="reveal">
			<p class="text-sm font-semibold uppercase tracking-wide text-primary"><?php t('Nos solutions', 'Our solutions'); ?></p>
			<h1 class="mt-2 font-display text-4xl font-bold text-ink-900 dark:text-white sm:text-5xl">
				<?php t("Quatre pôles d'expertise, un accompagnement cohérent.", 'Four areas of expertise, one consistent approach.'); ?>
			</h1>
			<p class="mt-6 max-w-xl text-lg text-ink-400">
				<?php t(
					"Que vous ayez besoin d'un seul de nos pôles ou d'un accompagnement complet, chaque solution est pensée pour s'articuler avec les autres et sécuriser votre trajectoire.",
					'Whether you need a single area of expertise or full end-to-end support, every solution is designed to work with the others and de-risk your trajectory.'
				); ?>
			</p>
		</div>
		<div class="reveal aspect-[4/3] overflow-hidden rounded-3xl shadow-soft" style="transition-delay:.15s">
			<img src="<?php echo esc_url(get_theme_file_uri('assets/images/solutions.jpeg')); ?>" <?php echo t_attrs(['alt' => ['fr' => "Atelier de travail autour d'une stratégie de développement", 'en' => 'Working session around a growth strategy']]); ?> class="h-full w-full object-cover" />
		</div>
	</div>
</section>

<?php foreach (synera_poles() as $i => $pole) : ?>
	<section id="<?php echo esc_attr($pole['slug']); ?>" class="scroll-mt-24 <?php echo $i % 2 === 1 ? 'bg-ink-50 dark:bg-ink-800/20' : ''; ?> py-14 sm:py-20">
		<div class="mx-auto max-w-content px-5 sm:px-8">
			<div class="grid gap-12 lg:grid-cols-2">
				<div class="reveal">
					<span class="inline-flex h-12 w-12 items-center justify-center rounded-xl bg-primary-50 text-primary dark:bg-primary-500/10">
						<?php synera_icon($pole['icon'], 'h-5 w-5'); ?>
					</span>
					<h2 class="mt-4 font-display text-2xl font-bold text-ink-900 dark:text-white sm:text-3xl"><?php t($pole['title_fr'], $pole['title_en']); ?></h2>
					<p class="mt-4 text-base text-ink-400"><?php t($pole['desc_fr'], $pole['desc_en']); ?></p>
					<ul class="mt-6 space-y-3">
						<?php foreach ($pole['benefits_fr'] as $bi => $bfr) : ?>
							<li class="flex items-start gap-2 text-sm text-ink-700 dark:text-ink-100">
								<?php synera_icon('check', 'h-4 w-4 mt-0.5 shrink-0 text-primary'); ?>
								<span><?php t($bfr, $pole['benefits_en'][$bi]); ?></span>
							</li>
						<?php endforeach; ?>
					</ul>
					<a href="<?php echo esc_url(home_url('/contact/?sujet=' . rawurlencode($pole['cta_fr']))); ?>" class="mt-8 inline-flex items-center justify-center rounded-full bg-primary px-6 py-3 text-sm font-semibold text-white shadow-soft transition hover:bg-primary-600">
						<?php t('Discuter de ce besoin', 'Discuss this need'); ?>
					</a>
				</div>

				<div class="reveal" style="transition-delay:.1s">
					<p class="text-sm font-semibold uppercase tracking-wide text-ink-400"><?php t('Notre méthodologie', 'Our methodology'); ?></p>
					<ol class="mt-4 space-y-6 border-l border-ink-100 pl-6 dark:border-white/10">
						<?php foreach ($pole['steps'] as $si => $step) : ?>
							<li class="relative">
								<span class="absolute -left-[31px] flex h-6 w-6 items-center justify-center rounded-full bg-primary text-xs font-semibold text-white"><?php echo esc_html($si + 1); ?></span>
								<h3 class="font-display text-base font-semibold text-ink-900 dark:text-white"><?php t($step['fr'][0], $step['en'][0]); ?></h3>
								<p class="mt-1 text-sm text-ink-400"><?php t($step['fr'][1], $step['en'][1]); ?></p>
							</li>
						<?php endforeach; ?>
					</ol>
				</div>
			</div>
		</div>
	</section>
<?php endforeach; ?>

<section class="mx-auto max-w-content px-5 py-14 sm:px-8">
	<?php get_template_part('template-parts/section-heading', null, [
		'eyebrow_fr' => 'Secteurs transversaux', 'eyebrow_en' => 'Cross-sector expertise',
		'title_fr'   => 'Une expertise qui traverse les secteurs',
		'title_en'   => 'Expertise that spans sectors',
		'align'      => 'center',
	]); ?>
	<div class="mt-8 flex flex-wrap justify-center gap-3">
		<?php foreach (synera_sectors() as $sector) : ?>
			<span class="inline-flex items-center gap-2 rounded-full border border-ink-100 px-4 py-2 text-sm font-medium text-ink-700 dark:border-white/10 dark:text-ink-100">
				<?php synera_icon($sector['icon'], 'h-4 w-4 text-primary'); ?>
				<?php t($sector['title_fr'], $sector['title_en']); ?>
			</span>
		<?php endforeach; ?>
	</div>
	<div class="mt-8 text-center">
		<a href="<?php echo esc_url(home_url('/secteurs/')); ?>" class="text-sm font-semibold text-primary hover:underline">
			<?php t('Découvrir nos secteurs & références →', 'Discover our sectors & references →'); ?>
		</a>
	</div>
</section>

<?php get_template_part('template-parts/cta-band'); ?>

<?php get_footer(); ?>
