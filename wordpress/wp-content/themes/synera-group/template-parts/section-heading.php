<?php
$a = wp_parse_args($args ?? [], [
	'eyebrow' => '',
	'title'   => '',
	'desc'    => '',
	'align'   => 'left',
]);
$center = $a['align'] === 'center';
?>
<div class="<?php echo $center ? 'mx-auto max-w-2xl text-center' : 'max-w-2xl'; ?>">
	<?php if ($a['eyebrow']) : ?>
		<p class="text-sm font-semibold uppercase tracking-wide text-primary"><?php echo esc_html($a['eyebrow']); ?></p>
	<?php endif; ?>
	<h2 class="mt-2 font-display text-3xl font-bold text-ink-900 dark:text-white sm:text-4xl"><?php echo esc_html($a['title']); ?></h2>
	<?php if ($a['desc']) : ?>
		<p class="mt-4 text-base text-ink-400"><?php echo esc_html($a['desc']); ?></p>
	<?php endif; ?>
</div>
