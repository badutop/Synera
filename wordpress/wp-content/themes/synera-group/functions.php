<?php
/**
 * Synera Groupe theme bootstrap.
 */

if (!defined('ABSPATH')) {
	exit;
}

define('SYNERA_VERSION', '1.0.3');

require get_theme_file_path('inc/icons.php');
require get_theme_file_path('inc/data.php');
require get_theme_file_path('inc/post-types.php');
require get_theme_file_path('inc/email-templates.php');
require get_theme_file_path('inc/contact-form.php');
require get_theme_file_path('inc/patterns.php');

/**
 * Space Grotesk (headings) + Inter (body) — the same pair used by the
 * original Next.js site via next/font/google.
 */
const SYNERA_FONTS_URL = 'https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;600;700&family=Inter:wght@400;500;600;700&display=swap';

function synera_setup(): void {
	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');
	add_theme_support('html5', ['search-form', 'gallery', 'caption', 'style', 'script']);
	add_theme_support('align-wide');
	add_theme_support('editor-styles');
	add_editor_style([SYNERA_FONTS_URL, 'assets/css/style.css']);
	add_image_size('synera-card', 800, 500, true);
	add_image_size('synera-cover', 1600, 900, true);
}
add_action('after_setup_theme', 'synera_setup');

function synera_assets(): void {
	wp_enqueue_style('synera-fonts', SYNERA_FONTS_URL, [], null);
	wp_enqueue_style('synera-style', get_theme_file_uri('assets/css/style.css'), ['synera-fonts'], SYNERA_VERSION);
	wp_enqueue_script('synera-main', get_theme_file_uri('assets/js/main.js'), [], SYNERA_VERSION, true);
}
add_action('wp_enqueue_scripts', 'synera_assets');

remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

function synera_body_classes(array $classes): array {
	$classes[] = 'font-sans';
	return $classes;
}
add_filter('body_class', 'synera_body_classes');

function synera_document_title_separator(): string {
	return ':';
}
add_filter('document_title_separator', 'synera_document_title_separator');

/**
 * Send mail via an authenticated SMTP account instead of PHP's local mail(),
 * which fails SPF checks (the shared hosting's outbound IP isn't covered by
 * the domain's SPF record, only the domain's real mail servers are).
 * Credentials come from constants defined in wp-config.php (never committed).
 *
 * The `wp_mail_from`/`wp_mail_from_name` filters run before WordPress calls
 * PHPMailer::setFrom(), which validates the address immediately and throws
 * if it's malformed (e.g. "wordpress@localhost" on a misconfigured site URL)
 * — that throw happens before `phpmailer_init` fires, so the SMTP override
 * below would never even run. Setting a valid From this way guarantees
 * setFrom() always receives something valid.
 */
function synera_mail_from(): string {
	return defined('SYNERA_SMTP_USER') ? SYNERA_SMTP_USER : 'wordpress@synera-groupe.com';
}
add_filter('wp_mail_from', 'synera_mail_from');

function synera_mail_from_name(): string {
	return 'SYNERA Groupe';
}
add_filter('wp_mail_from_name', 'synera_mail_from_name');

function synera_phpmailer_smtp(PHPMailer\PHPMailer\PHPMailer $phpmailer): void {
	if (!defined('SYNERA_SMTP_USER') || !defined('SYNERA_SMTP_PASS')) {
		return;
	}
	$phpmailer->isSMTP();
	$phpmailer->Host       = defined('SYNERA_SMTP_HOST') ? SYNERA_SMTP_HOST : 'smtp.mail.ovh.ca';
	$phpmailer->Port       = defined('SYNERA_SMTP_PORT') ? SYNERA_SMTP_PORT : 465;
	$phpmailer->SMTPSecure = 'ssl';
	$phpmailer->SMTPAuth   = true;
	$phpmailer->Username   = SYNERA_SMTP_USER;
	$phpmailer->Password   = SYNERA_SMTP_PASS;

	// Embed the logo as an inline attachment (cid:synera-logo) rather than a
	// remote-hosted <img src>: mobile mail apps (Gmail/Outlook) proxy and
	// gate remote images inconsistently with desktop webmail, which can
	// leave the logo not loading on mobile even though the URL is reachable.
	// An embedded image ships with the message, so there's nothing to fetch.
	if (strpos($phpmailer->Body, 'cid:synera-logo') !== false) {
		$logo_path = get_theme_file_path('assets/images/synera-logo-email.png');
		if (file_exists($logo_path)) {
			$phpmailer->addEmbeddedImage($logo_path, 'synera-logo', 'synera-logo-email.png', 'base64', 'image/png');
		}
	}
}
add_action('phpmailer_init', 'synera_phpmailer_smtp');
