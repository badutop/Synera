<?php get_header(); ?>

<section class="mx-auto max-w-content px-5 py-14 sm:px-8 sm:py-20">
	<div class="grid items-center gap-14 lg:grid-cols-2">
		<div class="reveal">
			<p class="text-sm font-semibold uppercase tracking-wide text-primary"><?php t('Notre approche', 'Our approach'); ?></p>
			<h1 class="mt-2 font-display text-4xl font-bold text-ink-900 dark:text-white sm:text-5xl">
				<?php t('Une méthodologie éprouvée, en cinq étapes.', 'A proven methodology, in five steps.'); ?>
			</h1>
			<p class="mt-6 max-w-xl text-lg text-ink-400">
				<?php t(
					"Chaque projet que nous accompagnons suit le même fil conducteur : comprendre avant d'agir, étudier avant de décider, et mesurer avant de conclure.",
					'Every project we support follows the same thread: understand before acting, study before deciding, and measure before concluding.'
				); ?>
			</p>
		</div>
		<div class="reveal aspect-[4/3] overflow-hidden rounded-3xl shadow-soft" style="transition-delay:.15s">
			<img src="<?php echo esc_url(get_theme_file_uri('assets/images/approche.jpeg')); ?>" <?php echo t_attrs(['alt' => ['fr' => "Séance de travail autour d'un tableau blanc", 'en' => 'Working session around a whiteboard']]); ?> class="h-full w-full object-cover" />
		</div>
	</div>
</section>

<section class="mx-auto max-w-content px-5 py-14 sm:px-8">
	<ol class="relative space-y-10 border-l border-ink-100 pl-8 dark:border-white/10 sm:pl-10">
		<?php foreach (synera_approach_steps() as $i => $step) : ?>
			<li class="reveal relative" style="transition-delay:<?php echo esc_attr($i * 0.08); ?>s">
				<span class="absolute -left-[45px] flex h-9 w-9 items-center justify-center rounded-full bg-primary text-white shadow-soft sm:-left-[53px]">
					<?php synera_icon($step['icon'], 'h-4 w-4'); ?>
				</span>
				<div class="rounded-2xl border border-ink-100 bg-white p-6 shadow-card dark:border-white/10 dark:bg-white/[0.03]">
					<span class="font-display text-sm font-semibold text-primary"><?php echo esc_html($step['number']); ?></span>
					<h3 class="mt-1 font-display text-xl font-semibold text-ink-900 dark:text-white"><?php t($step['title_fr'], $step['title_en']); ?></h3>
					<p class="mt-2 text-sm text-ink-400"><?php t($step['desc_fr'], $step['desc_en']); ?></p>
				</div>
			</li>
		<?php endforeach; ?>
	</ol>
</section>

<section class="bg-ink-50 py-14 dark:bg-ink-800/20 sm:py-20">
	<div class="mx-auto max-w-content px-5 sm:px-8">
		<?php get_template_part('template-parts/section-heading', null, [
			'eyebrow_fr' => 'Notre engagement', 'eyebrow_en' => 'Our commitment',
			'title_fr'   => 'Un accompagnement transparent, à chaque étape',
			'title_en'   => 'Transparent support, at every stage',
			'desc_fr'    => "Vous savez toujours où en est votre projet : jalons partagés, points d'étape réguliers et un interlocuteur unique responsable de la cohérence d'ensemble.",
			'desc_en'    => 'You always know where your project stands: shared milestones, regular check-ins, and a single point of contact responsible for overall consistency.',
		]); ?>
	</div>
</section>

<?php get_template_part('template-parts/cta-band'); ?>

<?php get_footer(); ?>
