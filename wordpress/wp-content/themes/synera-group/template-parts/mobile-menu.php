<?php $nav_links = synera_nav_links(); ?>
<div id="mobile-menu-backdrop" class="mobile-menu-backdrop fixed inset-0 z-50 bg-ink-900/50 xl:hidden"></div>
<div id="mobile-menu-drawer" class="mobile-menu-drawer fixed inset-y-0 right-0 z-50 flex w-[85%] max-w-sm flex-col bg-white p-6 shadow-soft dark:bg-ink-900 xl:hidden">
	<div class="flex items-center justify-between">
		<?php get_template_part('template-parts/theme-toggle'); ?>
		<button type="button" id="mobile-menu-close" class="inline-flex h-10 w-10 items-center justify-center rounded-full border border-ink-100 text-ink-700 dark:border-white/10 dark:text-white" aria-label="Fermer le menu">
			<?php synera_icon('x', 'h-5 w-5'); ?>
		</button>
	</div>

	<nav class="mt-10 flex flex-col gap-1" aria-label="Mobile">
		<?php foreach ($nav_links as $link) : ?>
			<a href="<?php echo esc_url(home_url($link['href'])); ?>" class="rounded-xl px-4 py-3 text-xl font-medium text-ink-700 hover:bg-primary-50 hover:text-primary dark:text-white dark:hover:bg-white/5">
				<?php echo esc_html($link['label']); ?>
			</a>
		<?php endforeach; ?>
	</nav>

	<a href="<?php echo esc_url(home_url('/contact/')); ?>" class="mt-auto inline-flex items-center justify-center rounded-full bg-primary px-5 py-3 text-sm font-semibold text-white shadow-soft">
		Discutons de votre projet
	</a>
</div>
