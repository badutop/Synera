<?php
/**
 * Synera Group theme bootstrap.
 */

if (!defined('ABSPATH')) {
	exit;
}

define('SYNERA_VERSION', '1.0.0');

require get_theme_file_path('inc/icons.php');
require get_theme_file_path('inc/i18n.php');
require get_theme_file_path('inc/data.php');
require get_theme_file_path('inc/post-types.php');
require get_theme_file_path('inc/contact-form.php');

function synera_setup(): void {
	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');
	add_theme_support('html5', ['search-form', 'gallery', 'caption', 'style', 'script']);
	add_image_size('synera-card', 800, 500, true);
	add_image_size('synera-cover', 1600, 900, true);
}
add_action('after_setup_theme', 'synera_setup');

function synera_assets(): void {
	wp_enqueue_style('synera-style', get_theme_file_uri('assets/css/style.css'), [], SYNERA_VERSION);
	wp_enqueue_script('synera-main', get_theme_file_uri('assets/js/main.js'), [], SYNERA_VERSION, true);
}
add_action('wp_enqueue_scripts', 'synera_assets');

// The theme renders all front-end copy itself (bilingual, hand-built templates);
// disable the block editor's front-end assets and emoji script since they're unused.
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

function synera_body_classes(array $classes): array {
	$classes[] = 'font-sans';
	return $classes;
}
add_filter('body_class', 'synera_body_classes');
