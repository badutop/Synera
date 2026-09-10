<?php
/**
 * Contact form handler — mirrors the original Next.js API route:
 * validates the payload server-side and emails the submission via wp_mail().
 */

function synera_handle_contact_form(): void {
	check_ajax_referer('synera_contact', 'nonce');

	$name    = isset($_POST['name']) ? sanitize_text_field(wp_unslash($_POST['name'])) : '';
	$email   = isset($_POST['email']) ? sanitize_email(wp_unslash($_POST['email'])) : '';
	$company = isset($_POST['company']) ? sanitize_text_field(wp_unslash($_POST['company'])) : '';
	$subject = isset($_POST['subject']) ? sanitize_text_field(wp_unslash($_POST['subject'])) : '';
	$message = isset($_POST['message']) ? sanitize_textarea_field(wp_unslash($_POST['message'])) : '';

	$errors = [];
	if (mb_strlen($name) < 2) {
		$errors['name'] = 'name_too_short';
	}
	if (!is_email($email)) {
		$errors['email'] = 'invalid_email';
	}
	if ($subject === '') {
		$errors['subject'] = 'subject_required';
	}
	if (mb_strlen($message) < 20) {
		$errors['message'] = 'message_too_short';
	}

	if (!empty($errors)) {
		wp_send_json_error(['errors' => $errors], 400);
	}

	$to      = get_option('admin_email');
	$subject_line = sprintf('[Site web] %s — %s', $subject, $name);
	$body    = "Nom : {$name}\nEmail : {$email}\nSociété : " . ($company ?: '-') . "\nSujet : {$subject}\n\nMessage :\n{$message}";
	$headers = ['Reply-To: ' . $email];

	$sent = wp_mail($to, $subject_line, $body, $headers);

	if (!$sent) {
		wp_send_json_error(['errors' => ['general' => 'send_failed']], 502);
	}

	wp_send_json_success();
}
add_action('wp_ajax_synera_contact', 'synera_handle_contact_form');
add_action('wp_ajax_nopriv_synera_contact', 'synera_handle_contact_form');
