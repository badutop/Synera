<?php
/**
 * Block markup helpers + registered patterns.
 *
 * These small generators emit real Gutenberg block comment markup so that
 * page content lives as native, editable blocks (heading/paragraph/list/
 * image/buttons) while purely decorative structure (icon badges, card
 * shells, grid wrappers) is emitted as protected `core/html` so an editor
 * can't accidentally break the layout while changing text.
 *
 * The same helpers are reused by the one-off content migration script
 * (wp eval-file) to build the real per-page content, and by the
 * register_block_pattern() calls below to expose reusable starting points
 * in the editor's pattern inserter.
 */

function synera_json(array $attrs): string {
	if (empty($attrs)) {
		return '';
	}
	return ' ' . wp_json_encode($attrs, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
}

function synera_block_html(string $html): string {
	return "<!-- wp:html -->\n{$html}\n<!-- /wp:html -->\n";
}

function synera_block_heading(string $text, int $level = 2, string $class = '', string $anchor = ''): string {
	$attrs = ['level' => $level];
	if ($class) {
		$attrs['className'] = $class;
	}
	if ($anchor) {
		$attrs['anchor'] = $anchor;
	}
	$id_attr  = $anchor ? ' id="' . esc_attr($anchor) . '"' : '';
	$class_attr = trim('wp-block-heading ' . $class);
	return "<!-- wp:heading" . synera_json($attrs) . " -->\n<h{$level} class=\"{$class_attr}\"{$id_attr}>{$text}</h{$level}>\n<!-- /wp:heading -->\n";
}

function synera_block_paragraph(string $html, string $class = ''): string {
	$attrs      = $class ? ['className' => $class] : [];
	$class_attr = $class ? ' class="' . esc_attr($class) . '"' : '';
	return "<!-- wp:paragraph" . synera_json($attrs) . " -->\n<p{$class_attr}>{$html}</p>\n<!-- /wp:paragraph -->\n";
}

function synera_block_list(array $items, string $class = ''): string {
	$attrs      = $class ? ['className' => $class] : [];
	$class_attr = trim('wp-block-list ' . $class);
	$li         = implode('', array_map(static fn ($i) => "<!-- wp:list-item -->\n<li>{$i}</li>\n<!-- /wp:list-item -->\n", $items));
	return "<!-- wp:list" . synera_json($attrs) . " -->\n<ul class=\"{$class_attr}\">\n{$li}</ul>\n<!-- /wp:list -->\n";
}

function synera_block_image(string $src, string $alt, string $class = ''): string {
	$attrs      = ['sizeSlug' => 'full', 'linkDestination' => 'none'];
	if ($class) {
		$attrs['className'] = $class;
	}
	$class_attr = trim('wp-block-image ' . $class);
	return "<!-- wp:image" . synera_json($attrs) . " -->\n<figure class=\"{$class_attr}\"><img src=\"" . esc_url($src) . '" alt="' . esc_attr($alt) . "\"/></figure>\n<!-- /wp:image -->\n";
}

/**
 * Buttons render with only the native block classes in the saved HTML
 * (`wp-block-button__link wp-element-button`, plus `is-style-outline` on
 * the wrapper for the outline variant) — the visual style comes from CSS
 * in assets/css/input.css targeting those native classes, not from
 * Tailwind utility classes baked into the saved markup. Baking extra
 * classes into an element beyond what the block's own `save()` produces
 * is exactly what causes Gutenberg's "block validation failed" / content
 * recovery prompt, since the editor recomputes the expected HTML from the
 * stored attributes and diffs it against the stored HTML.
 *
 * @param array<int,array{text:string,url:string,style?:string}> $buttons
 */
function synera_block_buttons(array $buttons, string $class = ''): string {
	$inner = '';
	foreach ($buttons as $b) {
		$is_outline = ($b['style'] ?? 'fill') === 'outline';
		$btn_class  = $is_outline ? 'is-style-outline' : '';
		$inner .= "<!-- wp:button" . synera_json($btn_class ? ['className' => $btn_class] : []) . " -->\n<div class=\"wp-block-button {$btn_class}\"><a class=\"wp-block-button__link wp-element-button\" href=\"" . esc_url($b['url']) . '">' . $b['text'] . "</a></div>\n<!-- /wp:button -->\n";
	}
	$attrs      = ['layout' => ['type' => 'flex']] + ($class ? ['className' => $class] : []);
	$class_attr = trim('wp-block-buttons is-layout-flex wp-block-buttons-is-layout-flex ' . $class);
	return "<!-- wp:buttons" . synera_json($attrs) . " -->\n<div class=\"{$class_attr}\">\n{$inner}</div>\n<!-- /wp:buttons -->\n";
}

function synera_block_group(string $inner, string $class = '', string $tag = 'div'): string {
	// A "layout" attribute is required or WordPress's core/group render_callback
	// falls back to legacy markup and wraps $inner in an extra
	// `.wp-block-group__inner-container` div — which breaks any flex/grid
	// utility classes applied to the outer element, since they'd no longer
	// be direct siblings. "constrained" avoids that without imposing its
	// own display/gap rules, leaving our own Tailwind classes in control.
	$attrs      = ['className' => $class, 'tagName' => $tag, 'layout' => ['type' => 'constrained']];
	$class_attr = trim('wp-block-group is-layout-constrained wp-block-group-is-layout-constrained ' . $class);
	return "<!-- wp:group" . synera_json($attrs) . " -->\n<{$tag} class=\"{$class_attr}\">\n{$inner}</{$tag}>\n<!-- /wp:group -->\n";
}

/** Two columns of raw inner block markup, with optional per-column class. */
function synera_block_columns(string $left, string $right, string $left_class = '', string $right_class = ''): string {
	$col = static function (string $inner, string $class): string {
		$class_attr = trim('wp-block-column ' . $class);
		$attrs      = $class ? ['className' => $class] : [];
		return "<!-- wp:column" . synera_json($attrs) . " -->\n<div class=\"{$class_attr}\">\n{$inner}</div>\n<!-- /wp:column -->\n";
	};
	return "<!-- wp:columns -->\n<div class=\"wp-block-columns\">\n" . $col($left, $left_class) . $col($right, $right_class) . "</div>\n<!-- /wp:columns -->\n";
}

/**
 * A protected icon badge (non-editable — pure decoration).
 */
function synera_icon_badge_html(string $icon, string $class = 'flex h-12 w-12 items-center justify-center rounded-xl bg-primary-50 text-primary dark:bg-primary-500/10'): string {
	ob_start();
	echo '<span class="' . esc_attr($class) . '">';
	synera_icon($icon, 'h-5 w-5');
	echo '</span>';
	return (string) ob_get_clean();
}

/* ---------------------------------------------------------------------
 * Composite section builders — one function per repeating section type.
 * ------------------------------------------------------------------- */

/** 2-column hero: eyebrow+title+description(+buttons) | image, with optional stat card overlay. */
function synera_pattern_hero(string $eyebrow, string $title, string $desc, string $image, string $alt, array $buttons = [], ?array $stat = null): string {
	$text = $eyebrow ? synera_block_paragraph($eyebrow, 'text-sm font-semibold uppercase tracking-wide text-primary') : '';
	$text .= synera_block_heading($title, 1, 'font-display text-4xl font-bold text-ink-900 dark:text-white sm:text-5xl');
	$text .= synera_block_paragraph($desc, 'mt-2 max-w-xl text-lg text-ink-400');
	if ($buttons) {
		$text .= synera_block_buttons($buttons, 'mt-4 flex flex-wrap gap-4');
	}
	$left = synera_block_group($text, 'reveal', 'div');

	$img_html = '<div class="aspect-[4/3] overflow-hidden rounded-3xl shadow-soft"><img src="' . esc_url($image) . '" alt="' . esc_attr($alt) . '" class="h-full w-full object-cover"/></div>';
	if ($stat) {
		$img_html .= '<div class="absolute -bottom-6 -left-6 rounded-2xl bg-white p-5 shadow-card dark:bg-ink-800"><p class="font-display text-3xl font-bold text-primary">' . esc_html($stat['value']) . '</p><p class="max-w-[10rem] text-sm text-ink-400">' . esc_html($stat['label']) . '</p></div>';
	}
	$right = synera_block_group(synera_block_html($img_html), 'reveal relative', 'div');

	return synera_block_group($left . $right, 'grid items-center gap-14 lg:grid-cols-2 not-prose', 'div');
}

/** One "pôle" section: icon + title + description + benefits, next to numbered methodology steps. */
function synera_pattern_pole(string $slug, string $icon, string $title, string $desc, array $benefits, array $steps, string $cta_label, string $cta_url): string {
	$left  = synera_block_html(synera_icon_badge_html($icon));
	$left .= synera_block_heading($title, 2, 'mt-4 font-display text-2xl font-bold text-ink-900 dark:text-white sm:text-3xl');
	$left .= synera_block_paragraph($desc, 'mt-4 text-base text-ink-400');
	$left .= synera_block_list($benefits, 'check-list mt-6 space-y-2 text-sm text-ink-700 dark:text-ink-100');
	$left .= synera_block_buttons([['text' => $cta_label, 'url' => $cta_url]], 'mt-8');

	$steps_html = '<p class="text-sm font-semibold uppercase tracking-wide text-ink-400">Notre méthodologie</p><ol class="mt-4 space-y-6 border-l border-ink-100 pl-6 dark:border-white/10">';
	foreach ($steps as $i => $step) {
		$steps_html .= '<li class="relative"><span class="absolute -left-[31px] flex h-6 w-6 items-center justify-center rounded-full bg-primary text-xs font-semibold text-white">' . ($i + 1) . '</span><h3 class="font-display text-base font-semibold text-ink-900 dark:text-white">' . esc_html($step['title']) . '</h3><p class="mt-1 text-sm text-ink-400">' . esc_html($step['desc']) . '</p></li>';
	}
	$steps_html .= '</ol>';
	$right = synera_block_html($steps_html);

	$inner = synera_block_group($left, 'reveal', 'div') . synera_block_group($right, 'reveal', 'div');
	return synera_block_group($inner, 'grid gap-12 lg:grid-cols-2 not-prose', 'div') .
		synera_block_html('<span id="' . esc_attr($slug) . '" class="block scroll-mt-24"></span>');
}

/** Inline badge list of sectors (icon + label), non-editable — used on the Solutions page. */
function synera_pattern_sectors_list(array $sectors): string {
	$badges = '';
	foreach ($sectors as $s) {
		$badges .= '<span class="inline-flex items-center gap-2 rounded-full border border-ink-100 px-4 py-2 text-sm font-medium text-ink-700 dark:border-white/10 dark:text-ink-100">';
		ob_start();
		synera_icon($s['icon'], 'h-4 w-4 text-primary');
		$badges .= (string) ob_get_clean();
		$badges .= esc_html($s['title']) . '</span>';
	}
	return synera_block_html('<div class="flex flex-wrap justify-center gap-3">' . $badges . '</div>');
}

/** A single value/benefit item: icon + title + description, in a 2-col grid cell (card style). */
function synera_pattern_value_item(string $icon, string $title, string $desc): string {
	$inner  = synera_block_html(synera_icon_badge_html($icon));
	$inner .= synera_block_heading($title, 3, 'mt-4 font-display text-lg font-semibold text-ink-900 dark:text-white');
	$inner .= synera_block_paragraph($desc, 'mt-2 text-sm text-ink-400');
	return synera_block_group($inner, 'reveal rounded-2xl border border-ink-100 bg-white p-7 shadow-card dark:border-white/10 dark:bg-ink-900', 'div');
}

/** A value/benefit item as an icon+text row (used on the homepage, no card border). */
function synera_pattern_value_row(string $icon, string $title, string $desc): string {
	$badge = synera_icon_badge_html($icon, 'flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-white text-primary shadow-card dark:bg-ink-900');
	$text  = synera_block_heading($title, 3, 'font-display text-lg font-semibold text-ink-900 dark:text-white');
	$text .= synera_block_paragraph($desc, 'mt-1 text-sm text-ink-400');
	$right = synera_block_group($text, '', 'div');
	return synera_block_group(synera_block_html($badge) . $right, 'reveal flex gap-4', 'div');
}

/** One step of the 5-step approach timeline. */
function synera_pattern_approach_step(string $icon, string $number, string $title, string $desc): string {
	$badge = '<span class="absolute -left-[45px] flex h-9 w-9 items-center justify-center rounded-full bg-primary text-white shadow-soft sm:-left-[53px]">';
	ob_start();
	synera_icon($icon, 'h-4 w-4');
	$badge .= (string) ob_get_clean() . '</span>';

	$inner  = synera_block_html($badge);
	$inner .= synera_block_html('<span class="font-display text-sm font-semibold text-primary">' . esc_html($number) . '</span>');
	$inner .= synera_block_heading($title, 3, 'mt-1 font-display text-xl font-semibold text-ink-900 dark:text-white');
	$inner .= synera_block_paragraph($desc, 'mt-2 text-sm text-ink-400');
	$card = synera_block_group($inner, 'rounded-2xl border border-ink-100 bg-white p-6 shadow-card dark:border-white/10 dark:bg-white/[0.03]', 'div');
	return synera_block_group($card, 'reveal relative', 'div');
}

/** One team member card: avatar initials + name + role + bio. */
function synera_pattern_team_member(string $initials, string $name, string $role, string $bio): string {
	$avatar = '<div class="mx-auto flex h-24 w-24 items-center justify-center rounded-full bg-gradient-brand font-display text-2xl font-bold text-white">' . esc_html($initials) . '</div>';
	$inner  = synera_block_html($avatar);
	$inner .= synera_block_heading($name, 3, 'mt-4 font-display text-base font-semibold text-ink-900 dark:text-white');
	$inner .= synera_block_paragraph($role, 'text-sm font-medium text-primary');
	$inner .= synera_block_paragraph($bio, 'mt-2 text-sm text-ink-400');
	return synera_block_group($inner, 'reveal text-center', 'div');
}

/** One illustrative case study card: sector badge + title + result. */
function synera_pattern_case_study(string $sector, string $title, string $result): string {
	$inner  = synera_block_html('<span class="inline-flex rounded-full bg-primary-50 px-3 py-1 text-xs font-semibold uppercase text-primary dark:bg-primary-500/10">' . esc_html($sector) . '</span>');
	$inner .= synera_block_heading($title, 3, 'mt-3 font-display text-base font-semibold text-ink-900 dark:text-white');
	$inner .= synera_block_paragraph($result, 'mt-2 text-sm text-ink-400');
	return synera_block_group($inner, 'reveal rounded-2xl border border-ink-100 bg-white p-6 shadow-card dark:border-white/10 dark:bg-ink-900', 'div');
}

/** One legal/privacy section with an anchored heading, used with a TOC column. */
function synera_pattern_legal_section(string $anchor, string $heading, array $paragraphs, array $items = [], array $paragraphs_after = []): string {
	$html = synera_block_heading($heading, 2, 'font-display text-xl font-semibold text-ink-900 dark:text-white', $anchor);
	foreach ($paragraphs as $p) {
		$html .= synera_block_paragraph($p, 'mt-3 text-sm text-ink-400');
	}
	if ($items) {
		$html .= synera_block_list($items, 'mt-3 list-disc space-y-1.5 pl-5 text-sm text-ink-400');
	}
	foreach ($paragraphs_after as $p) {
		$html .= synera_block_paragraph($p, 'mt-3 text-sm text-ink-400');
	}
	return synera_block_group($html, 'reveal scroll-mt-28', 'div');
}

/**
 * Full-bleed section wrapper: an outer group carries the background color
 * edge-to-edge, an inner group constrains width to match the site's
 * max-w-content container. Used as the top-level wrapper for every section
 * of page content so alternating backgrounds render full width.
 */
function synera_pattern_section(string $inner, string $bg_class = '', string $inner_class = ''): string {
	$container = synera_block_group($inner, trim('mx-auto max-w-content px-5 sm:px-8 ' . $inner_class), 'div');
	return synera_block_group($container, trim('py-14 sm:py-20 ' . $bg_class), 'div');
}

/* ---------------------------------------------------------------------
 * Registered patterns — reusable starting points in the block inserter.
 * ------------------------------------------------------------------- */

function synera_register_patterns(): void {
	register_block_pattern_category('synera', ['label' => 'Synera Group']);

	register_block_pattern('synera/hero-split', [
		'title'      => 'Synera — Hero (titre + image)',
		'categories' => ['synera'],
		'content'    => synera_pattern_section(synera_pattern_hero(
			'Eyebrow',
			'Titre de la section, percutant et clair.',
			"Une phrase de description qui explique la promesse de la page en une ou deux lignes.",
			get_theme_file_uri('assets/images/accueil.jpeg'),
			"Description de l'image",
			[['text' => 'Discutons de votre projet', 'url' => home_url('/contact/')]]
		)),
	]);

	register_block_pattern('synera/pole-detail', [
		'title'      => 'Synera — Pôle (icône + méthodologie)',
		'categories' => ['synera'],
		'content'    => synera_pattern_section(synera_pattern_pole(
			'exemple',
			'handshake',
			'Titre du pôle',
			"Description du pôle d'expertise : ce qu'il couvre et la valeur qu'il apporte.",
			['Bénéfice concret n°1', 'Bénéfice concret n°2', 'Bénéfice concret n°3'],
			[
				['title' => 'Étape 1', 'desc' => 'Description de la première étape.'],
				['title' => 'Étape 2', 'desc' => 'Description de la deuxième étape.'],
			],
			'Discuter de ce besoin',
			home_url('/contact/')
		)),
	]);

	register_block_pattern('synera/sectors-list', [
		'title'      => 'Synera — Liste de secteurs (badges)',
		'categories' => ['synera'],
		'content'    => synera_pattern_section(synera_pattern_sectors_list([
			['icon' => 'chart-line', 'title' => 'Finance'],
			['icon' => 'cpu', 'title' => 'IT & Technologies'],
		])),
	]);

	register_block_pattern('synera/value-item', [
		'title'      => 'Synera — Valeur (icône + texte)',
		'categories' => ['synera'],
		'content'    => synera_pattern_value_item('shield-check', 'Titre de la valeur', 'Description de la valeur en une ou deux phrases.'),
	]);

	register_block_pattern('synera/team-member', [
		'title'      => 'Synera — Membre de l\'équipe',
		'categories' => ['synera'],
		'content'    => synera_pattern_team_member('PN', 'Prénom Nom', 'Fonction', 'Courte biographie professionnelle.'),
	]);
}
add_action('init', 'synera_register_patterns');
