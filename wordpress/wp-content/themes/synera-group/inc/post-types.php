<?php
/**
 * "Actualité" custom post type (the FR/EN blog / insights section).
 *
 * The French title/content/excerpt use WordPress's native fields; the
 * English counterparts are stored as post meta and edited via the meta box
 * below, so an editor can update both languages from a single screen.
 */

function synera_register_actualite(): void {
	register_post_type('actualite', [
		'labels' => [
			'name'          => 'Actualités',
			'singular_name' => 'Actualité',
			'add_new_item'  => 'Ajouter une actualité',
			'edit_item'     => "Modifier l'actualité",
			'all_items'     => 'Toutes les actualités',
		],
		'public'       => true,
		'has_archive'  => true,
		'rewrite'      => ['slug' => 'actualites'],
		'supports'     => ['title', 'editor', 'excerpt', 'thumbnail'],
		'menu_icon'    => 'dashicons-media-document',
		'show_in_rest' => true,
	]);
}
add_action('init', 'synera_register_actualite');

function synera_actualite_meta_box(): void {
	add_meta_box('synera_actualite_en', 'English version & metadata', 'synera_actualite_meta_box_html', 'actualite', 'normal', 'high');
}
add_action('add_meta_boxes', 'synera_actualite_meta_box');

function synera_actualite_meta_box_html(WP_Post $post): void {
	wp_nonce_field('synera_actualite_save', 'synera_actualite_nonce');
	$fields = [
		'title_en'        => 'Title (EN)',
		'excerpt_en'      => 'Excerpt (EN)',
		'category_fr'     => 'Category (FR)',
		'category_en'     => 'Category (EN)',
		'reading_time'    => 'Reading time (e.g. "6 min")',
		'cover_image_url' => 'Cover image URL',
	];
	echo '<style>.synera-field{margin-bottom:14px}.synera-field label{display:block;font-weight:600;margin-bottom:4px}.synera-field input,.synera-field textarea{width:100%}</style>';
	foreach ($fields as $key => $label) {
		$value = get_post_meta($post->ID, $key, true);
		echo '<div class="synera-field"><label for="' . esc_attr($key) . '">' . esc_html($label) . '</label>';
		echo '<input type="text" id="' . esc_attr($key) . '" name="' . esc_attr($key) . '" value="' . esc_attr($value) . '" /></div>';
	}
	$content_en = get_post_meta($post->ID, 'content_en', true);
	echo '<div class="synera-field"><label for="content_en">Body (EN) — HTML, one &lt;h3&gt; per heading and &lt;p&gt; per paragraph, matching the French editor content above</label>';
	echo '<textarea id="content_en" name="content_en" rows="14">' . esc_textarea($content_en) . '</textarea></div>';
}

function synera_save_actualite_meta(int $post_id): void {
	if (!isset($_POST['synera_actualite_nonce']) || !wp_verify_nonce($_POST['synera_actualite_nonce'], 'synera_actualite_save')) {
		return;
	}
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return;
	}
	if (!current_user_can('edit_post', $post_id)) {
		return;
	}

	foreach (['title_en', 'excerpt_en', 'category_fr', 'category_en', 'reading_time', 'cover_image_url'] as $key) {
		if (isset($_POST[$key])) {
			update_post_meta($post_id, $key, sanitize_text_field(wp_unslash($_POST[$key])));
		}
	}
	if (isset($_POST['content_en'])) {
		update_post_meta($post_id, 'content_en', wp_kses_post(wp_unslash($_POST['content_en'])));
	}
}
add_action('save_post_actualite', 'synera_save_actualite_meta');
