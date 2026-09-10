<?php get_header(); ?>

<section class="mx-auto max-w-content px-5 py-14 sm:px-8 sm:py-20">
	<div class="grid items-center gap-14 lg:grid-cols-2">
		<div class="reveal">
			<h1 class="font-display text-4xl font-bold leading-tight text-balance text-ink-900 dark:text-white sm:text-5xl">
				<?php t("Le trait d'union entre vos ambitions et", 'The link between your ambitions and'); ?>
				<span class="text-primary"> <?php t('de nouveaux marchés', 'new markets'); ?></span>
			</h1>
			<p class="mt-6 max-w-xl text-lg text-ink-400">
				<?php t(
					'SYNERA Group connecte entreprises, investisseurs et institutions aux bons interlocuteurs, sécurise chaque décision par l’étude, et pilote vos projets jusqu’au résultat.',
					'SYNERA Group connects companies, investors and institutions with the right partners, de-risks every decision through rigorous studies, and manages your projects end to end.'
				); ?>
			</p>
			<div class="mt-8 flex flex-wrap gap-4">
				<a href="<?php echo esc_url(home_url('/contact/')); ?>" class="inline-flex items-center justify-center rounded-full bg-primary px-6 py-3 text-sm font-semibold text-white shadow-soft transition hover:bg-primary-600">
					<?php t('Discutons de votre projet', "Let's talk about your project"); ?>
				</a>
				<a href="<?php echo esc_url(home_url('/solutions/')); ?>" class="inline-flex items-center justify-center rounded-full border border-ink-100 px-6 py-3 text-sm font-semibold text-ink-900 transition hover:bg-primary-50 hover:text-primary dark:border-white/10 dark:text-white">
					<?php t('Découvrir nos solutions', 'Discover our solutions'); ?>
				</a>
			</div>
		</div>

		<div class="relative reveal" style="transition-delay:.15s">
			<div class="aspect-[4/3] overflow-hidden rounded-3xl shadow-soft">
				<img src="<?php echo esc_url(get_theme_file_uri('assets/images/accueil.jpeg')); ?>" <?php echo t_attrs(['alt' => ['fr' => "Rencontre d'affaires entre partenaires internationaux", 'en' => 'Business meeting between international partners']]); ?> class="h-full w-full object-cover" />
			</div>
			<div class="absolute -bottom-6 -left-6 rounded-2xl bg-white p-5 shadow-card dark:bg-ink-800">
				<p class="font-display text-3xl font-bold text-primary">4</p>
				<p class="max-w-[10rem] text-sm text-ink-400"><?php t("pôles d'expertise au service de vos projets", 'areas of expertise serving your projects'); ?></p>
			</div>
		</div>
	</div>
</section>

<section class="mx-auto max-w-content px-5 py-14 sm:px-8">
	<div class="flex flex-wrap items-end justify-between gap-6">
		<?php get_template_part('template-parts/section-heading', null, [
			'eyebrow_fr' => 'Nos solutions', 'eyebrow_en' => 'Our solutions',
			'title_fr'   => 'Quatre pôles, une seule ambition : votre réussite',
			'title_en'   => 'Four areas of expertise, one ambition: your success',
			'desc_fr'    => 'De la mise en relation à l’exécution, nous couvrons chaque étape de votre développement sur un nouveau marché.',
			'desc_en'    => 'From introductions to execution, we cover every stage of your growth in a new market.',
		]); ?>
		<a href="<?php echo esc_url(home_url('/solutions/')); ?>" class="whitespace-nowrap text-sm font-semibold text-primary hover:underline"><?php t('Voir toutes nos solutions', 'See all our solutions'); ?> →</a>
	</div>

	<?php
	$pole_images = [
		'intermediation'          => 'accueil.jpeg',
		'etudes-conseil'          => 'solutions.jpeg',
		'accompagnement-projets'  => 'approche.jpeg',
		'competences-rh'          => 'identite.jpeg',
	];
	?>
	<div class="mt-10 grid grid-cols-2 gap-4 sm:gap-6 lg:grid-cols-4">
		<?php foreach (synera_poles() as $i => $pole) : ?>
			<a href="<?php echo esc_url(home_url('/solutions/#' . $pole['slug'])); ?>" class="reveal group relative block aspect-[3/4] overflow-hidden rounded-2xl shadow-card" style="transition-delay:<?php echo esc_attr($i * 0.06); ?>s">
				<img src="<?php echo esc_url(get_theme_file_uri('assets/images/' . $pole_images[$pole['slug']])); ?>" alt="" class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105" />
				<div class="absolute inset-0 bg-gradient-to-t from-ink-900/90 via-ink-900/20 to-transparent"></div>
				<span class="absolute left-4 top-4 inline-flex h-9 w-9 items-center justify-center rounded-full bg-white/15 text-white backdrop-blur">
					<?php synera_icon($pole['icon'], 'h-4 w-4'); ?>
				</span>
				<div class="absolute inset-x-0 bottom-0 p-4">
					<p class="font-display text-sm font-semibold text-white"><?php t($pole['title_fr'], $pole['title_en']); ?></p>
					<span class="mt-1 inline-block text-xs font-medium text-white/80 group-hover:underline"><?php t('En savoir plus', 'Learn more'); ?></span>
				</div>
			</a>
		<?php endforeach; ?>
	</div>
</section>

<section class="bg-ink-50 py-14 dark:bg-ink-800/20 sm:py-20">
	<div class="mx-auto max-w-content px-5 sm:px-8">
		<?php get_template_part('template-parts/section-heading', null, [
			'eyebrow_fr' => 'Pourquoi SYNERA Group', 'eyebrow_en' => 'Why SYNERA Group',
			'title_fr'   => "Une méthode, pas seulement un carnet d'adresses",
			'title_en'   => 'A method, not just a contact book',
			'desc_fr'    => 'Notre valeur ne se limite pas à notre réseau : elle tient dans la rigueur de nos études et dans notre engagement sur la durée.',
			'desc_en'    => "Our value isn't limited to our network: it lies in the rigor of our studies and our long-term commitment.",
		]); ?>
		<div class="mt-10 grid gap-8 sm:grid-cols-2">
			<?php foreach (synera_values() as $i => $value) : ?>
				<div class="reveal flex gap-4" style="transition-delay:<?php echo esc_attr($i * 0.1); ?>s">
					<span class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-white text-primary shadow-card dark:bg-ink-900">
						<?php synera_icon($value['icon'], 'h-5 w-5'); ?>
					</span>
					<div>
						<h3 class="font-display text-lg font-semibold text-ink-900 dark:text-white"><?php t($value['title_fr'], $value['title_en']); ?></h3>
						<p class="mt-1 text-sm text-ink-400"><?php t($value['desc_fr'], $value['desc_en']); ?></p>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<section class="mx-auto max-w-content px-5 py-14 sm:px-8">
	<h2 class="text-center text-sm font-semibold uppercase tracking-wide text-ink-400"><?php t('Ils nous font confiance', 'Trusted by'); ?></h2>
	<div class="mt-8 grid grid-cols-2 gap-4 sm:grid-cols-3 xl:grid-cols-5">
		<?php foreach (['comsec', 'spintech', 'smartek', 'sierra-logistics', 'watero'] as $partner) : ?>
			<div class="flex h-20 items-center justify-center rounded-xl bg-white shadow-card dark:bg-white/[0.03]">
				<img src="<?php echo esc_url(get_theme_file_uri('assets/images/partners/' . $partner . '.png')); ?>" alt="" class="h-11 max-w-[80%] object-contain" />
			</div>
		<?php endforeach; ?>
	</div>
</section>

<?php get_template_part('template-parts/blog-preview'); ?>

<?php get_template_part('template-parts/cta-band'); ?>

<?php get_footer(); ?>
