<?php get_header(); ?>

<section class="mx-auto max-w-content px-5 py-14 sm:px-8 sm:py-20">
	<div class="grid items-center gap-14 lg:grid-cols-2">
		<div class="reveal">
			<p class="text-sm font-semibold uppercase tracking-wide text-primary"><?php t('Notre identité', 'Our identity'); ?></p>
			<h1 class="mt-2 font-display text-4xl font-bold text-ink-900 dark:text-white sm:text-5xl">
				<?php t('Un trait d’union, pas un simple intermédiaire.', 'A link, not just an intermediary.'); ?>
			</h1>
			<p class="mt-6 max-w-xl text-lg text-ink-400">
				<?php t(
					"SYNERA Group est né d'un constat simple : les meilleures opportunités de développement international échouent rarement par manque d'ambition, mais par manque de connaissance fine des écosystèmes locaux. Nous avons construit le groupe pour combler cet écart — avec un réseau de contacts qualifiés, une expertise sectorielle transversale, et une exigence méthodologique qui sécurise chaque étape de vos projets.",
					'SYNERA Group was born from a simple observation: the best international growth opportunities rarely fail for lack of ambition, but for lack of a fine-grained understanding of local ecosystems. We built the group to close that gap — with a network of qualified contacts, cross-sector expertise, and a methodological rigor that de-risks every stage of your projects.'
				); ?>
			</p>
		</div>
		<div class="reveal aspect-[4/3] overflow-hidden rounded-3xl shadow-soft" style="transition-delay:.15s">
			<img src="<?php echo esc_url(get_theme_file_uri('assets/images/identite.jpeg')); ?>" <?php echo t_attrs(['alt' => ['fr' => 'Équipe SYNERA Group en réunion de travail', 'en' => 'SYNERA Group team in a work meeting']]); ?> class="h-full w-full object-cover" />
		</div>
	</div>
</section>

<section class="mx-auto max-w-content px-5 py-14 sm:px-8">
	<div class="grid gap-6 sm:grid-cols-2">
		<div class="reveal rounded-2xl border border-ink-100 bg-white p-8 shadow-card dark:border-white/10 dark:bg-white/[0.03]">
			<h2 class="font-display text-xl font-semibold text-ink-900 dark:text-white"><?php t('Notre mission', 'Our mission'); ?></h2>
			<p class="mt-3 text-sm text-ink-400">
				<?php t(
					"Faciliter les échanges commerciaux, l'investissement et le transfert de compétences entre les partenaires que SYNERA Group met en relation, en sécurisant chaque étape par des études rigoureuses et un accompagnement de projet de bout en bout.",
					'To facilitate trade, investment and skills transfer between the partners SYNERA Group connects, by de-risking every step with rigorous studies and end-to-end project support.'
				); ?>
			</p>
		</div>
		<div class="reveal rounded-2xl border border-ink-100 bg-white p-8 shadow-card dark:border-white/10 dark:bg-white/[0.03]" style="transition-delay:.1s">
			<h2 class="font-display text-xl font-semibold text-ink-900 dark:text-white"><?php t('Notre vision', 'Our vision'); ?></h2>
			<p class="mt-3 text-sm text-ink-400">
				<?php t(
					"Devenir la référence en matière d'intermédiation et d'accompagnement de projets à fort impact, en créant des synergies durables et mutuellement bénéfiques entre les acteurs que nous connectons.",
					'To become the reference in intermediation and high-impact project support, by creating durable, mutually beneficial synergies between the players we connect.'
				); ?>
			</p>
		</div>
	</div>
</section>

<section class="bg-ink-50 py-14 dark:bg-ink-800/20 sm:py-20">
	<div class="mx-auto max-w-content px-5 sm:px-8">
		<?php get_template_part('template-parts/section-heading', null, [
			'eyebrow_fr' => 'Nos valeurs', 'eyebrow_en' => 'Our values',
			'title_fr'   => 'Ce qui guide chacune de nos décisions',
			'title_en'   => 'What guides every decision we make',
			'desc_fr'    => 'Quatre principes qui structurent notre manière de travailler, projet après projet.',
			'desc_en'    => 'Four principles that shape how we work, project after project.',
		]); ?>
		<div class="mt-10 grid gap-6 sm:grid-cols-2">
			<?php foreach (synera_values() as $i => $value) : ?>
				<div class="reveal rounded-2xl border border-ink-100 bg-white p-7 shadow-card dark:border-white/10 dark:bg-ink-900" style="transition-delay:<?php echo esc_attr($i * 0.08); ?>s">
					<span class="flex h-12 w-12 items-center justify-center rounded-xl bg-primary-50 text-primary dark:bg-primary-500/10">
						<?php synera_icon($value['icon'], 'h-5 w-5'); ?>
					</span>
					<h3 class="mt-4 font-display text-lg font-semibold text-ink-900 dark:text-white"><?php t($value['title_fr'], $value['title_en']); ?></h3>
					<p class="mt-2 text-sm text-ink-400"><?php t($value['desc_fr'], $value['desc_en']); ?></p>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<section class="mx-auto max-w-content px-5 py-14 sm:px-8">
	<?php get_template_part('template-parts/section-heading', null, [
		'eyebrow_fr' => 'Présence géographique', 'eyebrow_en' => 'Geographic presence',
		'title_fr'   => 'Ancrés localement, connectés globalement',
		'title_en'   => 'Locally rooted, globally connected',
		'desc_fr'    => 'Notre siège nous permet de rester au plus près de l’écosystème que nous connectons.',
		'desc_en'    => 'Our head office keeps us close to the ecosystem we connect.',
	]); ?>
	<div class="reveal mt-8 flex max-w-md items-start gap-3 rounded-2xl border border-ink-100 bg-white p-6 shadow-card dark:border-white/10 dark:bg-white/[0.03]">
		<?php synera_icon('map-pin', 'h-5 w-5 mt-0.5 shrink-0 text-primary'); ?>
		<div>
			<p class="font-display text-sm font-semibold text-ink-900 dark:text-white"><?php t('Siège social', 'Head office'); ?></p>
			<p class="mt-1 text-sm text-ink-400"><?php t('6, Cité COMICO - VDN, Dakar, Sénégal', '6, Cité COMICO - VDN, Dakar, Senegal'); ?></p>
		</div>
	</div>
</section>

<section class="bg-ink-50 py-14 dark:bg-ink-800/20 sm:py-20">
	<div class="mx-auto max-w-content px-5 sm:px-8">
		<?php get_template_part('template-parts/section-heading', null, [
			'eyebrow_fr' => 'Équipe dirigeante', 'eyebrow_en' => 'Leadership team',
			'title_fr'   => 'Les personnes derrière SYNERA Group',
			'title_en'   => 'The people behind SYNERA Group',
			'desc_fr'    => 'Une équipe aux expertises complémentaires, unie par une même exigence de résultat.',
			'desc_en'    => 'A team with complementary expertise, united by the same commitment to results.',
		]); ?>
		<div class="mt-10 grid gap-8 sm:grid-cols-2 lg:grid-cols-4">
			<?php foreach (synera_team() as $i => $member) : ?>
				<div class="reveal text-center" style="transition-delay:<?php echo esc_attr($i * 0.08); ?>s">
					<div class="mx-auto flex h-24 w-24 items-center justify-center rounded-full bg-gradient-brand font-display text-2xl font-bold text-white">
						<?php echo esc_html($member['initials']); ?>
					</div>
					<h3 class="mt-4 font-display text-base font-semibold text-ink-900 dark:text-white"><?php t($member['name_fr'], $member['name_en']); ?></h3>
					<p class="text-sm font-medium text-primary"><?php t($member['role_fr'], $member['role_en']); ?></p>
					<p class="mt-2 text-sm text-ink-400"><?php t($member['bio_fr'], $member['bio_en']); ?></p>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<?php get_template_part('template-parts/cta-band'); ?>

<?php get_footer(); ?>
