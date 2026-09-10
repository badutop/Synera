<section class="relative overflow-hidden bg-gradient-brand py-16 sm:py-20">
	<div class="pointer-events-none absolute -top-24 -left-24 h-72 w-72 rounded-full bg-white/10 blur-3xl"></div>
	<div class="relative mx-auto max-w-content px-5 text-center sm:px-8">
		<h2 class="font-display text-3xl font-bold text-white sm:text-4xl">
			<?php t('Prêt à explorer de nouveaux marchés ?', 'Ready to explore new markets?'); ?>
		</h2>
		<p class="mx-auto mt-4 max-w-2xl text-base text-white/85">
			<?php t(
				'Parlons de votre projet : nos équipes reviennent vers vous sous 48h pour un premier échange sans engagement.',
				"Let's talk about your project: our teams get back to you within 48h for a first, no-obligation conversation."
			); ?>
		</p>
		<a href="<?php echo esc_url(home_url('/contact/')); ?>" class="mt-8 inline-flex items-center justify-center rounded-full bg-white px-7 py-3 text-sm font-semibold text-primary shadow-soft transition hover:bg-primary-50">
			<?php t('Discutons de votre projet', "Let's talk about your project"); ?>
		</a>
	</div>
</section>
