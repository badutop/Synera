<?php
/**
 * "Actualité" custom post type (the Insights / blog section).
 * Title, body and excerpt use WordPress's native fields; category, reading
 * time and cover image are extra meta edited via the meta box below.
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
	add_meta_box('synera_actualite_meta', 'Métadonnées de l\'actualité', 'synera_actualite_meta_box_html', 'actualite', 'side', 'default');
}
add_action('add_meta_boxes', 'synera_actualite_meta_box');

function synera_actualite_meta_box_html(WP_Post $post): void {
	wp_nonce_field('synera_actualite_save', 'synera_actualite_nonce');
	$fields = [
		'category'        => 'Catégorie (ex. "Stratégie")',
		'reading_time'    => 'Temps de lecture (ex. "6 min")',
		'cover_image_url' => "URL de l'image de couverture",
	];
	echo '<style>.synera-field{margin-bottom:14px}.synera-field label{display:block;font-weight:600;margin-bottom:4px}.synera-field input{width:100%}</style>';
	foreach ($fields as $key => $label) {
		$value = get_post_meta($post->ID, $key, true);
		echo '<div class="synera-field"><label for="' . esc_attr($key) . '">' . esc_html($label) . '</label>';
		echo '<input type="text" id="' . esc_attr($key) . '" name="' . esc_attr($key) . '" value="' . esc_attr($value) . '" /></div>';
	}
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

	foreach (['category', 'reading_time', 'cover_image_url'] as $key) {
		if (isset($_POST[$key])) {
			update_post_meta($post_id, $key, sanitize_text_field(wp_unslash($_POST[$key])));
		}
	}
}
add_action('save_post_actualite', 'synera_save_actualite_meta');
