<?php get_header(); ?>

<section class="mx-auto max-w-content px-5 py-14 sm:px-8 sm:py-20">
	<div class="grid items-center gap-14 lg:grid-cols-2">
		<div class="reveal">
			<p class="text-sm font-semibold uppercase tracking-wide text-primary"><?php t('Contact', 'Contact'); ?></p>
			<h1 class="mt-2 font-display text-4xl font-bold text-ink-900 dark:text-white sm:text-5xl">
				<?php t('Discutons de votre projet.', "Let's talk about your project."); ?>
			</h1>
			<p class="mt-6 max-w-xl text-lg text-ink-400">
				<?php t(
					'Décrivez-nous votre besoin : nos équipes reviennent vers vous sous 48h pour un premier échange sans engagement.',
					"Tell us about your needs: our teams get back to you within 48h for a first, no-obligation conversation."
				); ?>
			</p>
		</div>
		<div class="reveal aspect-[4/3] overflow-hidden rounded-3xl shadow-soft" style="transition-delay:.15s">
			<img src="<?php echo esc_url(get_theme_file_uri('assets/images/contact.jpeg')); ?>" <?php echo t_attrs(['alt' => ['fr' => 'Équipe SYNERA Group à l’écoute de ses clients', 'en' => 'SYNERA Group team listening to clients']]); ?> class="h-full w-full object-cover" />
		</div>
	</div>
</section>

<section class="mx-auto max-w-content px-5 pb-20 sm:px-8">
	<div class="grid gap-12 lg:grid-cols-[1fr_1.4fr]">
		<div class="reveal space-y-6">
			<div class="flex items-start gap-3">
				<?php synera_icon('map-pin', 'h-5 w-5 mt-0.5 shrink-0 text-primary'); ?>
				<div>
					<p class="font-display text-sm font-semibold text-ink-900 dark:text-white"><?php t('Siège social', 'Head office'); ?></p>
					<p class="text-sm text-ink-400"><?php t('6, Cité COMICO - VDN, Dakar, Sénégal', '6, Cité COMICO - VDN, Dakar, Senegal'); ?></p>
				</div>
			</div>
			<div class="flex items-start gap-3">
				<?php synera_icon('phone', 'h-5 w-5 mt-0.5 shrink-0 text-primary'); ?>
				<div>
					<a href="tel:+221777770000" class="font-display text-sm font-semibold text-ink-900 hover:text-primary dark:text-white">+221 77 777 00 00</a>
					<p class="text-sm text-ink-400"><?php t('Lun – Ven, 9h00 – 18h00', 'Mon – Fri, 9:00am – 6:00pm'); ?></p>
				</div>
			</div>
			<div class="flex items-start gap-3">
				<?php synera_icon('mail', 'h-5 w-5 mt-0.5 shrink-0 text-primary'); ?>
				<a href="mailto:contact@synera-group.com" class="font-display text-sm font-semibold text-ink-900 hover:text-primary dark:text-white">contact@synera-group.com</a>
			</div>
			<div class="flex items-start gap-3">
				<?php synera_icon('linkedin', 'h-5 w-5 mt-0.5 shrink-0 text-primary'); ?>
				<div>
					<p class="font-display text-sm font-semibold text-ink-900 dark:text-white"><?php t('LinkedIn SYNERA Group', 'SYNERA Group on LinkedIn'); ?></p>
					<p class="text-sm text-ink-400"><?php t('(lien à venir)', '(link coming soon)'); ?></p>
				</div>
			</div>
		</div>

		<div class="reveal rounded-2xl border border-ink-100 bg-white p-6 shadow-card dark:border-white/10 dark:bg-white/[0.03] sm:p-8" style="transition-delay:.1s">
			<form id="contact-form" data-ajax-url="<?php echo esc_url(admin_url('admin-ajax.php')); ?>" data-nonce="<?php echo esc_attr(wp_create_nonce('synera_contact')); ?>" class="grid gap-5 sm:grid-cols-2">
				<div>
					<label for="name" class="block text-sm font-medium text-ink-900 dark:text-white"><?php t('Nom complet', 'Full name'); ?></label>
					<input type="text" id="name" name="name" required minlength="2" <?php echo t_attrs(['placeholder' => ['fr' => 'Jean Dupont', 'en' => 'Jean Dupont']]); ?> class="mt-1.5 w-full rounded-xl border border-ink-100 bg-transparent px-4 py-2.5 text-sm dark:border-white/10" />
				</div>
				<div>
					<label for="email" class="block text-sm font-medium text-ink-900 dark:text-white"><?php t('Email professionnel', 'Work email'); ?></label>
					<input type="email" id="email" name="email" required <?php echo t_attrs(['placeholder' => ['fr' => 'jean.dupont@entreprise.com', 'en' => 'jean.dupont@company.com']]); ?> class="mt-1.5 w-full rounded-xl border border-ink-100 bg-transparent px-4 py-2.5 text-sm dark:border-white/10" />
				</div>
				<div>
					<label for="company" class="block text-sm font-medium text-ink-900 dark:text-white">
						<?php t('Société', 'Company'); ?> <span class="font-normal text-ink-400">(<?php t('optionnel', 'optional'); ?>)</span>
					</label>
					<input type="text" id="company" name="company" <?php echo t_attrs(['placeholder' => ['fr' => 'Nom de votre société', 'en' => 'Your company name']]); ?> class="mt-1.5 w-full rounded-xl border border-ink-100 bg-transparent px-4 py-2.5 text-sm dark:border-white/10" />
				</div>
				<div>
					<label for="subject" class="block text-sm font-medium text-ink-900 dark:text-white"><?php t('Sujet', 'Subject'); ?></label>
					<select id="subject" name="subject" required data-i18n-select class="mt-1.5 w-full rounded-xl border border-ink-100 bg-transparent px-4 py-2.5 text-sm dark:border-white/10">
						<option value="" data-fr="Sélectionnez un sujet" data-en="Select a subject">Sélectionnez un sujet</option>
						<?php foreach (synera_poles() as $pole) : ?>
							<option value="<?php echo esc_attr($pole['cta_fr']); ?>" data-fr="<?php echo esc_attr($pole['cta_fr']); ?>" data-en="<?php echo esc_attr($pole['cta_en']); ?>"><?php echo esc_html($pole['cta_fr']); ?></option>
						<?php endforeach; ?>
						<option value="Autre demande" data-fr="Autre demande" data-en="Other request">Autre demande</option>
					</select>
				</div>
				<div class="sm:col-span-2">
					<label for="message" class="block text-sm font-medium text-ink-900 dark:text-white"><?php t('Message', 'Message'); ?></label>
					<textarea id="message" name="message" rows="5" required minlength="20" <?php echo t_attrs(['placeholder' => ['fr' => 'Décrivez votre projet en quelques lignes…', 'en' => 'Describe your project in a few lines…']]); ?> class="mt-1.5 w-full rounded-xl border border-ink-100 bg-transparent px-4 py-2.5 text-sm dark:border-white/10"></textarea>
				</div>
				<div class="sm:col-span-2">
					<button type="submit" class="inline-flex w-full items-center justify-center gap-2 rounded-full bg-primary px-6 py-3 text-sm font-semibold text-white shadow-soft transition hover:bg-primary-600 disabled:opacity-50 sm:w-auto">
						<span data-idle-label><?php t('Envoyer le message', 'Send message'); ?></span>
						<span data-sending-label class="items-center gap-2">
							<?php synera_icon('loader-circle', 'h-4 w-4 animate-spin'); ?>
							<?php t('Envoi en cours…', 'Sending…'); ?>
						</span>
					</button>
					<div data-form-status hidden>
						<p data-status-success class="flex items-center gap-2">
							<?php synera_icon('circle-check', 'h-4 w-4'); ?>
							<?php t('Message envoyé. Notre équipe revient vers vous sous 48h.', 'Message sent. Our team will get back to you within 48h.'); ?>
						</p>
						<p data-status-error class="flex items-center gap-2">
							<?php synera_icon('circle-alert', 'h-4 w-4'); ?>
							<?php t('Une erreur est survenue. Merci de réessayer ou de nous écrire directement.', 'Something went wrong. Please try again or email us directly.'); ?>
						</p>
					</div>
				</div>
			</form>
		</div>
	</div>
</section>

<?php get_footer(); ?>
