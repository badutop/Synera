<?php
/**
 * @param string $size 'sm' | 'md' | 'lg'
 */
$size = $args['size'] ?? 'md';
$sizes = [
	'sm' => ['text' => 'text-base', 'bar' => 'h-3.5'],
	'md' => ['text' => 'text-lg', 'bar' => 'h-4'],
	'lg' => ['text' => 'text-2xl', 'bar' => 'h-6'],
];
$s = $sizes[$size] ?? $sizes['md'];
?>
<span class="inline-flex items-center gap-2 font-display <?php echo esc_attr($s['text']); ?>">
	<span class="font-bold uppercase tracking-wide text-primary">Synera</span>
	<span class="w-px <?php echo esc_attr($s['bar']); ?> bg-primary/60"></span>
	<span class="font-medium text-ink-700 dark:text-ink-100">Group</span>
</span>
