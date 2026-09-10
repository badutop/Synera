<?php get_header(); ?>

<section class="mx-auto max-w-content px-5 py-14 sm:px-8 sm:py-20">
	<div class="grid items-center gap-14 lg:grid-cols-2">
		<div class="reveal">
			<p class="text-sm font-semibold uppercase tracking-wide text-primary"><?php t('Secteurs & Références', 'Sectors & References'); ?></p>
			<h1 class="mt-2 font-display text-4xl font-bold text-ink-900 dark:text-white sm:text-5xl">
				<?php t('Une expertise transversale, ancrée dans le concret.', 'Cross-sector expertise, grounded in the concrete.'); ?>
			</h1>
			<p class="mt-6 max-w-xl text-lg text-ink-400">
				<?php t(
					'Nos équipes interviennent sur des secteurs variés, avec la même exigence méthodologique et le même souci du résultat.',
					'Our teams operate across varied sectors, with the same methodological rigor and the same focus on results.'
				); ?>
			</p>
		</div>
		<div class="reveal aspect-[4/3] overflow-hidden rounded-3xl shadow-soft" style="transition-delay:.15s">
			<img src="<?php echo esc_url(get_theme_file_uri('assets/images/secteurs.jpg')); ?>" <?php echo t_attrs(['alt' => ['fr' => "Réunion d'équipe pluridisciplinaire", 'en' => 'Cross-disciplinary team meeting']]); ?> class="h-full w-full object-cover" />
		</div>
	</div>
</section>

<section class="mx-auto max-w-content px-5 py-14 sm:px-8">
	<div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
		<?php foreach (synera_sectors() as $i => $sector) : ?>
			<div class="reveal rounded-2xl border border-ink-100 bg-white p-7 shadow-card transition hover:-translate-y-1 dark:border-white/10 dark:bg-white/[0.03]" style="transition-delay:<?php echo esc_attr($i * 0.06); ?>s">
				<span class="flex h-12 w-12 items-center justify-center rounded-xl bg-primary-50 text-primary dark:bg-primary-500/10">
					<?php synera_icon($sector['icon'], 'h-5 w-5'); ?>
				</span>
				<h3 class="mt-4 font-display text-lg font-semibold text-ink-900 dark:text-white"><?php t($sector['title_fr'], $sector['title_en']); ?></h3>
				<p class="mt-2 text-sm text-ink-400"><?php t($sector['desc_fr'], $sector['desc_en']); ?></p>
			</div>
		<?php endforeach; ?>
	</div>
</section>

<section class="bg-ink-50 py-14 dark:bg-ink-800/20 sm:py-20">
	<div class="mx-auto max-w-content px-5 sm:px-8">
		<?php get_template_part('template-parts/section-heading', null, [
			'eyebrow_fr' => 'Références', 'eyebrow_en' => 'References',
			'title_fr'   => 'Des projets, des résultats',
			'title_en'   => 'Projects, and results',
			'desc_fr'    => 'Un aperçu illustratif de nos interventions — nos références détaillées et témoignages clients seront publiés au fil de nos collaborations.',
			'desc_en'    => "An illustrative overview of our work — detailed references and client testimonials will be published as our collaborations progress.",
		]); ?>
		<div class="mt-10 grid gap-6 sm:grid-cols-3">
			<?php foreach (synera_case_studies() as $i => $case) : ?>
				<div class="reveal rounded-2xl border border-ink-100 bg-white p-6 shadow-card dark:border-white/10 dark:bg-ink-900" style="transition-delay:<?php echo esc_attr($i * 0.1); ?>s">
					<span class="inline-flex rounded-full bg-primary-50 px-3 py-1 text-xs font-semibold uppercase text-primary dark:bg-primary-500/10"><?php t($case['sector_fr'], $case['sector_en']); ?></span>
					<h3 class="mt-3 font-display text-base font-semibold text-ink-900 dark:text-white"><?php t($case['title_fr'], $case['title_en']); ?></h3>
					<p class="mt-2 text-sm text-ink-400"><?php t($case['result_fr'], $case['result_en']); ?></p>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<section class="mx-auto max-w-content px-5 py-14 sm:px-8">
	<?php get_template_part('template-parts/section-heading', null, [
		'eyebrow_fr' => 'Témoignages', 'eyebrow_en' => 'Testimonials',
		'title_fr'   => 'Ce que nos partenaires en disent',
		'title_en'   => 'What our partners say',
		'align'      => 'center',
	]); ?>
	<div class="mx-auto mt-10 max-w-xl rounded-2xl border border-dashed border-ink-100 p-8 text-center dark:border-white/10">
		<?php synera_icon('quote', 'h-6 w-6 mx-auto text-primary/50'); ?>
		<p class="mt-4 text-sm italic text-ink-400">
			<?php t(
				'Témoignage client à venir — cet emplacement sera complété dès qu’un partenaire aura accepté de partager son retour d’expérience.',
				"Client testimonial coming soon — this space will be filled in as soon as a partner agrees to share their feedback."
			); ?>
		</p>
	</div>
</section>

<?php get_template_part('template-parts/cta-band'); ?>

<?php get_footer(); ?>
