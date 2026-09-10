<?php
/**
 * Inline Lucide icon helper.
 */

function synera_icon(string $name, string $class = 'h-5 w-5'): void {
	static $cache = [];

	if (!isset($cache[$name])) {
		$path = get_theme_file_path("assets/icons/{$name}.svg");
		$cache[$name] = file_exists($path) ? file_get_contents($path) : '';
	}

	$svg = $cache[$name];
	if (!$svg) {
		return;
	}

	if ($class) {
		$svg = preg_replace('/class="([^"]*)"/', 'class="$1 ' . esc_attr($class) . '"', $svg, 1);
	}

	echo $svg; // phpcs:ignore -- trusted local SVG source, not user input.
}
