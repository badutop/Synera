<?php
$nav_links = synera_nav_links();
$poles     = synera_poles();
$year      = date('Y');
?>
<footer class="border-t border-ink-100 bg-ink-50 dark:border-white/10 dark:bg-ink-800/20">
	<div class="mx-auto max-w-content px-5 py-14 sm:px-8">
		<div class="grid gap-10 md:grid-cols-[1.4fr_1fr_1fr_1.2fr]">
			<div>
				<?php get_template_part('template-parts/logo', null, ['size' => 'md']); ?>
				<p class="mt-4 max-w-xs text-sm text-ink-400">
					SYNERA Group est une société d'intermédiation, d'études et d'accompagnement de projets qui connecte entreprises, investisseurs et institutions aux bons marchés.
				</p>
				<a href="#" class="mt-5 inline-flex h-9 w-9 items-center justify-center rounded-full border border-ink-100 text-ink-700 hover:text-primary dark:border-white/10 dark:text-white" aria-label="LinkedIn SYNERA Group">
					<?php synera_icon('linkedin', 'h-4 w-4'); ?>
				</a>
			</div>

			<div>
				<h3 class="font-display text-sm font-semibold uppercase tracking-wide text-ink-900 dark:text-white">Navigation</h3>
				<ul class="mt-4 space-y-2 text-sm text-ink-400">
					<?php foreach ($nav_links as $link) : ?>
						<li><a href="<?php echo esc_url(home_url($link['href'])); ?>" class="hover:text-primary"><?php echo esc_html($link['label']); ?></a></li>
					<?php endforeach; ?>
				</ul>
			</div>

			<div>
				<h3 class="font-display text-sm font-semibold uppercase tracking-wide text-ink-900 dark:text-white">Nos Solutions</h3>
				<ul class="mt-4 space-y-2 text-sm text-ink-400">
					<?php foreach ($poles as $pole) : ?>
						<li><a href="<?php echo esc_url(home_url('/solutions/#' . $pole['slug'])); ?>" class="hover:text-primary"><?php echo esc_html($pole['title']); ?></a></li>
					<?php endforeach; ?>
				</ul>
			</div>

			<div>
				<h3 class="font-display text-sm font-semibold uppercase tracking-wide text-ink-900 dark:text-white">Contact</h3>
				<ul class="mt-4 space-y-3 text-sm text-ink-400">
					<li class="flex items-start gap-2">
						<?php synera_icon('map-pin', 'h-4 w-4 mt-0.5 shrink-0 text-primary'); ?>
						<span>6, Cité COMICO - VDN, Dakar, Sénégal (siège social)</span>
					</li>
					<li class="flex items-center gap-2">
						<?php synera_icon('mail', 'h-4 w-4 shrink-0 text-primary'); ?>
						<a href="mailto:contact@synera-group.com" class="hover:text-primary">contact@synera-group.com</a>
					</li>
					<li class="flex items-center gap-2">
						<?php synera_icon('phone', 'h-4 w-4 shrink-0 text-primary'); ?>
						<a href="tel:+221777770000" class="hover:text-primary">+221 77 777 00 00</a>
					</li>
				</ul>
			</div>
		</div>

		<div class="mt-12 grid gap-4 rounded-2xl border border-ink-100 bg-white p-6 dark:border-white/10 dark:bg-white/[0.03] sm:grid-cols-[1.4fr_1fr] sm:items-center">
			<div>
				<h3 class="font-display text-base font-semibold text-ink-900 dark:text-white">Restez informés</h3>
				<p class="mt-1 text-sm text-ink-400">Recevez nos analyses de marché et actualités, une fois par mois maximum.</p>
			</div>
			<form id="newsletter-form" class="flex flex-col gap-2 sm:flex-row">
				<label for="newsletter-email" class="sr-only">Votre adresse email</label>
				<input id="newsletter-email" type="email" required placeholder="Votre adresse email" class="w-full rounded-full border border-ink-100 bg-transparent px-4 py-2.5 text-sm dark:border-white/10" />
				<button type="submit" class="shrink-0 rounded-full bg-primary px-5 py-2.5 text-sm font-semibold text-white hover:bg-primary-600">S'inscrire</button>
			</form>
		</div>

		<div class="mt-10 flex flex-col items-center justify-between gap-4 border-t border-ink-100 pt-6 text-xs text-ink-400 dark:border-white/10 sm:flex-row">
			<p>© <?php echo esc_html($year); ?> SYNERA Group. Tous droits réservés. — Réalisé par SmarTek</p>
			<div class="flex gap-4">
				<a href="<?php echo esc_url(home_url('/mentions-legales/')); ?>" class="hover:text-primary">Mentions légales</a>
				<a href="<?php echo esc_url(home_url('/politique-confidentialite/')); ?>" class="hover:text-primary">Politique de confidentialité</a>
			</div>
		</div>
	</div>
</footer>
