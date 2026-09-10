<?php
/**
 * Lightweight bilingual (FR default / EN) helper.
 *
 * The original site toggles language client-side without changing route or
 * reloading data, so both languages are rendered server-side and CSS/JS
 * toggle visibility based on `data-locale` on <html>. This mirrors that
 * behaviour without a translation plugin.
 */

function t(string $fr, string $en, bool $echo = true): string {
	$html = '<span data-lang="fr">' . esc_html($fr) . '</span><span data-lang="en">' . esc_html($en) . '</span>';
	if ($echo) {
		echo $html; // phpcs:ignore -- escaped above.
	}
	return $html;
}

/**
 * Bilingual raw HTML (e.g. paragraphs already containing markup/entities).
 */
function t_html(string $fr, string $en, bool $echo = true): string {
	$html = '<span data-lang="fr">' . $fr . '</span><span data-lang="en">' . $en . '</span>';
	if ($echo) {
		echo $html; // phpcs:ignore -- caller is responsible for the markup passed in.
	}
	return $html;
}

/**
 * Emit a set of attributes that should switch value on language toggle.
 * Usage: <img <?php echo t_attrs(['alt' => ['fr' => 'Texte', 'en' => 'Text']]); ?> ... >
 */
function t_attrs(array $attrs): string {
	$out  = '';
	$json = [];
	foreach ($attrs as $name => $pair) {
		$out         .= sprintf(' %s="%s"', esc_attr($name), esc_attr($pair['fr']));
		$json[$name]  = $pair;
	}
	$out .= ' data-i18n-attr="' . esc_attr(wp_json_encode($json)) . '"';
	return $out;
}

function synera_slugify(string $s): string {
	$s = strtolower($s);
	$s = preg_replace('/[^a-z0-9]+/', '-', $s);
	return trim($s, '-');
}
