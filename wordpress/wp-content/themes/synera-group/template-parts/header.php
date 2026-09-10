<?php
$nav_links = synera_nav_links();
$current   = trailingslashit(parse_url(home_url($_SERVER['REQUEST_URI'] ?? '/'), PHP_URL_PATH));
?>
<header id="site-header" class="sticky top-0 z-40 border-b border-transparent bg-white/80 backdrop-blur transition-colors dark:bg-ink-900/80" data-header>
	<div class="mx-auto flex h-20 max-w-content items-center justify-between px-5 sm:px-8">
		<a href="<?php echo esc_url(home_url('/')); ?>" class="shrink-0">
			<?php get_template_part('template-parts/logo', null, ['size' => 'md']); ?>
		</a>

		<nav class="hidden items-center gap-1 xl:flex" aria-label="Primary">
			<?php foreach ($nav_links as $link) :
				$href   = home_url($link['href']);
				$active = trailingslashit(parse_url($href, PHP_URL_PATH)) === $current;
				?>
				<a href="<?php echo esc_url($href); ?>"
					class="rounded-full px-4 py-2 text-sm font-medium transition-colors <?php echo $active ? 'bg-primary text-white shadow-soft' : 'text-ink-700 hover:bg-primary-50 hover:text-primary dark:text-ink-100 dark:hover:bg-white/5'; ?>">
					<?php t($link['fr'], $link['en']); ?>
				</a>
			<?php endforeach; ?>
		</nav>

		<div class="hidden items-center gap-3 xl:flex">
			<?php get_template_part('template-parts/language-toggle'); ?>
			<?php get_template_part('template-parts/theme-toggle'); ?>
			<a href="<?php echo esc_url(home_url('/contact/')); ?>" class="inline-flex items-center justify-center rounded-full bg-primary px-5 py-2.5 text-sm font-semibold text-white shadow-soft transition hover:bg-primary-600">
				<?php t('Discutons de votre projet', "Let's talk about your project"); ?>
			</a>
		</div>

		<div class="flex items-center gap-2 xl:hidden">
			<?php get_template_part('template-parts/theme-toggle'); ?>
			<button type="button" id="mobile-menu-open" class="inline-flex h-10 w-10 items-center justify-center rounded-full border border-ink-100 text-ink-700 dark:border-white/10 dark:text-white" aria-label="Ouvrir le menu">
				<?php synera_icon('menu', 'h-5 w-5'); ?>
			</button>
		</div>
	</div>
</header>

<?php get_template_part('template-parts/mobile-menu'); ?>
