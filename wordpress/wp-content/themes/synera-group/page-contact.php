<?php get_header(); ?>

<?php while (have_posts()) : the_post(); ?>
	<?php the_content(); ?>
<?php endwhile; ?>

<section class="mx-auto max-w-content px-5 pb-20 sm:px-8">
	<div class="reveal mx-auto max-w-2xl rounded-2xl border border-ink-100 bg-white p-6 shadow-card dark:border-white/10 dark:bg-white/[0.03] sm:p-8">
		<form id="contact-form" data-ajax-url="<?php echo esc_url(admin_url('admin-ajax.php')); ?>" data-nonce="<?php echo esc_attr(wp_create_nonce('synera_contact')); ?>" class="grid gap-5 sm:grid-cols-2">
			<div>
				<label for="name" class="block text-sm font-medium text-ink-900 dark:text-white">Nom complet</label>
				<input type="text" id="name" name="name" required minlength="2" placeholder="Jean Dupont" class="mt-1.5 w-full rounded-xl border border-ink-100 bg-transparent px-4 py-2.5 text-sm dark:border-white/10" />
			</div>
			<div>
				<label for="email" class="block text-sm font-medium text-ink-900 dark:text-white">Email professionnel</label>
				<input type="email" id="email" name="email" required placeholder="jean.dupont@entreprise.com" class="mt-1.5 w-full rounded-xl border border-ink-100 bg-transparent px-4 py-2.5 text-sm dark:border-white/10" />
			</div>
			<div>
				<label for="company" class="block text-sm font-medium text-ink-900 dark:text-white">Société <span class="font-normal text-ink-400">(optionnel)</span></label>
				<input type="text" id="company" name="company" placeholder="Nom de votre société" class="mt-1.5 w-full rounded-xl border border-ink-100 bg-transparent px-4 py-2.5 text-sm dark:border-white/10" />
			</div>
			<div>
				<label for="subject" class="block text-sm font-medium text-ink-900 dark:text-white">Sujet</label>
				<select id="subject" name="subject" required class="mt-1.5 w-full rounded-xl border border-ink-100 bg-transparent px-4 py-2.5 text-sm dark:border-white/10">
					<option value="">Sélectionnez un sujet</option>
					<?php foreach (synera_poles() as $pole) : ?>
						<option value="<?php echo esc_attr($pole['title']); ?>"><?php echo esc_html($pole['title']); ?></option>
					<?php endforeach; ?>
					<option value="Autre demande">Autre demande</option>
				</select>
			</div>
			<div class="sm:col-span-2">
				<label for="message" class="block text-sm font-medium text-ink-900 dark:text-white">Message</label>
				<textarea id="message" name="message" rows="5" required minlength="20" placeholder="Décrivez votre projet en quelques lignes…" class="mt-1.5 w-full rounded-xl border border-ink-100 bg-transparent px-4 py-2.5 text-sm dark:border-white/10"></textarea>
			</div>
			<div class="sm:col-span-2">
				<button type="submit" class="inline-flex w-full items-center justify-center gap-2 rounded-full bg-primary px-6 py-3 text-sm font-semibold text-white shadow-soft transition hover:bg-primary-600 disabled:opacity-50 sm:w-auto">
					<span data-idle-label>Envoyer le message</span>
					<span data-sending-label class="items-center gap-2">
						<?php synera_icon('loader-circle', 'h-4 w-4 animate-spin'); ?>
						Envoi en cours…
					</span>
				</button>
				<div data-form-status hidden>
					<p data-status-success class="flex items-center gap-2">
						<?php synera_icon('circle-check', 'h-4 w-4'); ?>
						Message envoyé. Notre équipe revient vers vous sous 48h.
					</p>
					<p data-status-error class="flex items-center gap-2">
						<?php synera_icon('circle-alert', 'h-4 w-4'); ?>
						Une erreur est survenue. Merci de réessayer ou de nous écrire directement.
					</p>
				</div>
			</div>
		</form>
	</div>
</section>

<?php get_footer(); ?>
