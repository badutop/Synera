<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php wp_head(); ?>
</head>
<body <?php body_class('flex min-h-screen flex-col bg-white text-ink-900 dark:bg-ink-900 dark:text-white'); ?>>
<?php wp_body_open(); ?>
<script>
(function () {
	try {
		var locale = localStorage.getItem('synera-locale');
		var theme = localStorage.getItem('synera-theme');
		if (locale === 'en') document.documentElement.setAttribute('data-locale', 'en');
		if (theme === 'dark' || (!theme && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
			document.documentElement.classList.add('dark');
		}
	} catch (e) {}
})();
</script>

<?php get_template_part('template-parts/header'); ?>

<main id="main-content" class="flex-1">
