<?php
$a = wp_parse_args($args ?? [], [
	'eyebrow_fr' => '',
	'eyebrow_en' => '',
	'title_fr'   => '',
	'title_en'   => '',
	'desc_fr'    => '',
	'desc_en'    => '',
	'align'      => 'left',
]);
$center = $a['align'] === 'center';
?>
<div class="<?php echo $center ? 'mx-auto max-w-2xl text-center' : 'max-w-2xl'; ?>">
	<?php if ($a['eyebrow_fr']) : ?>
		<p class="text-sm font-semibold uppercase tracking-wide text-primary"><?php t($a['eyebrow_fr'], $a['eyebrow_en']); ?></p>
	<?php endif; ?>
	<h2 class="mt-2 font-display text-3xl font-bold text-ink-900 dark:text-white sm:text-4xl"><?php t($a['title_fr'], $a['title_en']); ?></h2>
	<?php if ($a['desc_fr']) : ?>
		<p class="mt-4 text-base text-ink-400"><?php t($a['desc_fr'], $a['desc_en']); ?></p>
	<?php endif; ?>
</div>
